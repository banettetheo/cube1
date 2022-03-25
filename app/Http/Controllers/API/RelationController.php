<?php

namespace App\Http\Controllers\API;

use App\Models\Categorie;
use App\Http\Controllers\Controller;
use App\Http\Requests\Ressource\StoreUpdateRelationRequest;
use App\Models\Commentaire;
use App\Models\Jointure_ress_utilisateur;
use App\Models\Relation;
use App\Models\Type_Relation;
use App\Models\User;
use App\Repositories\LienRessourceRepository;
use App\Repositories\RelationRepository;
use App\Repositories\RessourceRepository;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;

class RelationController extends Controller
{

    private $relationRepository;
    private $userRepository;
    private $lienRessourceRepository;
    private $ressourceRepository;

    public function __construct(RelationRepository $relationRepository, UserRepository $userRepository, LienRessourceRepository $lienRessourceRepository, RessourceRepository $ressourceRepository)
    {
        $this->relationRepository = $relationRepository;
        $this->userRepository = $userRepository;
        $this->lienRessourceRepository = $lienRessourceRepository;
        $this->ressourceRepository = $ressourceRepository;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $idUser = auth()->user()->id;
        $lesRelations = $this->relationRepository->all($idUser);
        return response()->json($lesRelations);
    }

    public function indexUtilisateurs()
    {
        if (auth()->user()->Admin || auth()->user()->SuperAdmin) {

            $lesRelations = $this->relationRepository->allUsers();
            return response()->json($lesRelations);
        }
        return response()->json(['message'=> "Vous n'avez pas les droits"]);
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdateRelationRequest $request, $id)
    {
        $result = "L'opération a échouée";
        if ($id != null) {
            $validated = $request->validated();
            if (User::find($id) != null) {
                if ($this->relationRepository->verifExistanceRelation(auth()->id(), $id)->isEmpty()) {
                    $dataValide = array_merge($validated, ([
                        'IdUser1' => auth()->id(),
                        'IdUser2' => $id
                    ]));
                    Relation::create($dataValide);
                    $result = "Une nouvelle relation vient d'être créée";
                } else {
                    $result = "Une relation existe déjà";
                }
            } else {
                $result = "L'utilisateur n'existe pas";
            }
        }
        return ["message" => $result];
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Categorie  $categorie
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        $unUtilisateur = $this->userRepository->getUtilisateur($id);
        return response()->json($unUtilisateur);
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Categorie  $categorie
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUpdateRelationRequest $request, $id)
    {
        $result = ["message" => "Vous n'avez pas les droits"];

        $autorisation = false;
        $relationAModif = Relation::find($id);
        $validated = $request->validated();
        $idAuth = auth()->user()->id;

        if ($this->relationRepository->getUtilisateurRelation($id) == $idAuth) {
            $autorisation = true;
        }

        if ($autorisation) {
            $relationAModif->update($validated);
            $result = ["message" => "Mise à jour effectuée"];
        }

        return response()->json($result);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Categorie  $categorie
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $result = "Vous n'avez pas les droits";
        $idAuth = auth()->user()->id;
        $laRelation  = Relation::find($id);

        if ($laRelation != null) {
            $idUtilisateur2  = $laRelation['IdUser2'];

            if ($this->relationRepository->getUtilisateurRelation($id) == $idAuth) {
                $lesRessourcesPartageesUtilisateur = $this->lienRessourceRepository->findRessourceByIdUser($idUtilisateur2);

                foreach ($lesRessourcesPartageesUtilisateur as $uneRessource) {
                    if ($this->ressourceRepository->findCreateur($uneRessource['id']) == $idAuth) {
                        foreach ($uneRessource['commentaires'] as $unCommentaire) {
                            //Si le commentaire appartient à l'utilisateur de la relation
                            if ($unCommentaire['utilisateur']['id'] == $idUtilisateur2) {
                                Commentaire::destroy($unCommentaire['id']);
                            }
                        }
                        //On supprime chaque lien de partage
                        $lesIdLiens = $this->lienRessourceRepository->getLienByUserAndRess($idUtilisateur2, $uneRessource['id']);
                        foreach ($lesIdLiens as $unIdLien) {
                            Jointure_ress_utilisateur::destroy($unIdLien);
                        }
                    }
                }
                //On supprime la relation
                Relation::destroy($laRelation['id']);
                $result = "Suppression efffectué";
            }
        } else {
            $result = "Cette relation n'existe pas";
        }
        return response()->json(['message' => $result]);
    }



    public function showType()
    {
        return response()->json($this->relationRepository->getAllTypes());
    }
}
