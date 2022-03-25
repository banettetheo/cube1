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

class CommentaireController extends Controller
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $result = "Vous n'avez pas les droits";
        $autorisation = $this->accesRessource($id, true);
        if ($autorisation['autorisation']) {

            $validated = $request->validate([
                'Contenue' => 'required|max:255',
            ]);;

            $validated = array_merge($validated, [
                'IdUser' => auth()->user()->id,
                'IdRessources' => $id
            ]);
            Commentaire::create($validated);
            $result = "Commentaire créé";
        }
        return response()->json(['message' => $result]);
    }


    //Véirifier les accès
    private function accesRessource(int $id, bool $show)
    {
        $ressource = $this->ressourceRepository->findByIdDefault($id);
        $autorisation = false;
        if ($ressource != null) {
            if ($ressource->IdEtat == 4 && $show) {
                $autorisation = true;
            } elseif (auth('api')->user() != null) {
                $authID = auth('api')->user()->id;
                $createurRessource = $ressource->Utilisateur()->get();
                if ($createurRessource[0]['id'] == $authID) {
                    $autorisation = true;
                } else {
                    $lesRessourcesPartages = $this->lienRessourceRepository->findRessourceByIdUser($authID);
                    foreach ($lesRessourcesPartages as $uneRessource) {
                        if ($uneRessource['id'] == $ressource->id) {
                            $autorisation = true;
                        }
                    }
                }
            }
        }
        return [
            'autorisation' => $autorisation,
            'ressource' => $ressource
        ];
    }



    //  Supprimer une relation
    public function destroy($id)
    {
        $result = "Vous n'avez pas les droits";
        $commentaire = Commentaire::findOrFail($id);
        if ($commentaire['IdUser'] == auth()->user()->id && $this->accesRessource($commentaire['IdRessources'], true)) {
            Commentaire::destroy($commentaire['id']);
            $result = "Suppression effectuée";
        }
        return response()->json(["message" => $result]);
    }
}
