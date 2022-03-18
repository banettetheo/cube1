<?php

namespace App\Http\Controllers\API;

use App\Models\Ressources;
use App\Http\Controllers\Controller;
use App\Http\Requests\Ressource\StoreUpdateRessourceRequest;
use App\Http\Requests\Ressource\UpdateRessourceRequest;
use App\Models\Commentaire;
use App\Models\Jointure_ress_utilisateur;
use App\Repositories\Favoris\FavorisRepository;
use App\Repositories\LienRessourceRepository;
use Illuminate\Http\Request;
use App\Repositories\RessourceRepository;
use Exception;
use Illuminate\Support\Facades\Auth;

class RessourceController extends Controller
{

    private $ressourceRepository;
    private $lienRessourceRepository;
    private $favorisRepository;

    public function __construct(RessourceRepository $ressourceRepository, LienRessourceRepository $lienRessourceRepository, FavorisRepository $favorisRepository)
    {
        $this->ressourceRepository = $ressourceRepository;
        $this->lienRessourceRepository = $lienRessourceRepository;
        $this->favorisRepository = $favorisRepository;

    }



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $validated = $request->validate([
            'type' => 'sometimes|int',
            'categorie' => 'sometimes|int',
        ]);

        $lesRessources = $this->ressourceRepository->allPublic();


        $idType = null;
        $idCategorie = null;

        try {
            $idType = $validated['type'];
        } catch (Exception $e) {
        }
        try {
            $idCategorie = $validated['categorie'];
        } catch (Exception $e) {
        }


        if ($idType != null) {
            $lesRessources = $this->ressourceRepository->AllPublicByType($idType);
        }
        if ($idCategorie != null) {
            if ($idType != null) {
                $lesRessources = $this->ressourceRepository->AllPublicByTypeAndCateg($idType, $idCategorie);
            } else {
                $lesRessources = $this->ressourceRepository->AllPublicByCategorie($idCategorie);
            }
        }

        

        return response()->json($lesRessources);
    }



    public function indexUtilisateur(Request $request)
    {
        $authID = auth()->user()->id;
        $result = $this->ressourceRepository->allPrivees($authID);
        if ($request->favoris) {
            $result = $result->merge($this->favorisRepository->whereFavoris($authID));
        }
        if ($request->partagees) {
            $result = $result->merge($this->lienRessourceRepository->findRessourceByIdUser($authID));
        }
        if ($request->mise_de_cote) {
            $result = $result->merge($this->favorisRepository->whereMiseDeCote($authID));
        }

        return response()->json($result);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdateRessourceRequest $request)
    {
        $validated = $request->validated();
        $result = array_merge($validated, ['IdUtilisateur_createur' => auth()->user()->id]);

        Ressources::create($result);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ressources  $ressource
     * @return \Illuminate\Http\Response
     */
    public function show(Ressources $ressource, Request $request)
    {

        $autorisation=false;
        $result =["message" => "Vous n'avez pas la permission"];
        if($ressource->IdEtat==4){
            $autorisation=true;
        }
        elseif(auth('api')->user()!=null){
            $authID=auth('api')->user()->id;
            $createurRessource = $ressource->Utilisateur()->get();
            if($createurRessource[0]['id'] == $authID){
                $autorisation=true;
            }else{
                $lesRessourcesPartages = $this->lienRessourceRepository->findRessourceByIdUser($authID);
                foreach($lesRessourcesPartages as $uneRessource){
                    if($uneRessource['id'] == $ressource->id){
                        $autorisation=true;
                    }
                }
            }
        }

        if($autorisation){
            $result = $this->ressourceRepository->one($ressource);
        }

        // return response()->json($result);
        return response()->json($result);
        // return auth('api')->user();
        ;
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ressources  $ressources
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUpdateRessourceRequest $request, $id)
    {
        $result =["message" => "Vous n'avez pas les droits"];

        $autorisation = false;
        $ressourceAModif = Ressources::find($id);
        $ressource = $this->ressourceRepository->findById($id);
        $validated = $request->validated();
        $idAuth = auth()->user()->id;

        if ($this->ressourceRepository->findCreateur($ressource['id']) == $idAuth) {
            //Si elle est privé, il faut supprimer les liens avec
            $autorisation=true;
        }elseif($this->lienRessourceRepository->findCorrespRessourcesUtilisateurs($idAuth,$id)){
            $autorisation=true;
        }

        if($autorisation){
            $ressourceAModif->update($validated);
            $result =["message" => "Mise à jour effectuée"];
        }
        return response()->json($result);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ressources  $ressources
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $result =["message" => "Vous n'avez pas les droits"];
        $ressource = $this->ressourceRepository->findById($id);
        if ($this->ressourceRepository->findCreateur($ressource['id']) == auth()->user()->id) {
            $lesLiensRessource = $this->lienRessourceRepository->findByIdRessource($id);

            foreach ($lesLiensRessource as $unLienRessource) {
                Jointure_ress_utilisateur::destroy($unLienRessource['id']);
            }
            foreach ($ressource['commentaires'] as $unCommentaire) {
                Commentaire::destroy($unCommentaire['id']);
            }
            Ressources::destroy($id);
            $result =["message" => "Suppression effectuée"];
        }else{
            
        }
        return response()->json($result);

    }
}
