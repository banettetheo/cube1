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
        
        
        $idType=null;
        $idCategorie=null;

        try{
            $idType = $validated['type'];
            $idCategorie = $validated['categorie'];
        }catch(Exception $e){}
        

        if($idType!=null){
            $lesRessources = ($this->ressourceRepository->AllPublicByType($idType));
        }
        if($idCategorie!=null){
            $lesRessources = ($this->ressourceRepository->findByICategorie($idCategorie));
        }
         
        
        return $lesRessources;
        // return response()->json($lesRessources);
    }



    public function indexUtilisateur(Request $request)
    {
        $authID = auth()->user()->id;
        $result = $this->ressourceRepository->allPartages($authID);
        if ($request->favori) {
            $result = $result->merge($this->favorisRepository->whereFavoris($authID));
        }
        if ($request->partagee) {
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

        Ressources::create($validated);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ressources  $ressource
     * @return \Illuminate\Http\Response
     */
    public function show(Ressources $ressource)
    {
        $laRessource = [
            'ressource' => $this->ressourceRepository->one($ressource)
        ];
        return response()->json($laRessource);
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
        $ressource = Ressources::find($id);
        $validated = $request->validated();

        $ressource->update($validated);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ressources  $ressources
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ressource = $this->ressourceRepository->findById($id);
        $lesLiensRessource = $this->lienRessourceRepository->findByIdRessource($id);

        foreach ($lesLiensRessource as $unLienRessource) {
            Jointure_ress_utilisateur::destroy($unLienRessource['id']);
        }
        foreach ($ressource['commentaires'] as $unCommentaire) {
            Commentaire::destroy($unCommentaire['id']);
        }
        Ressources::destroy($id);
    }
}
