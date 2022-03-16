<?php

namespace App\Http\Controllers\API;

use App\Models\Ressources;
use App\Http\Controllers\Controller;
use App\Http\Requests\Ressource\StoreUpdateRessourceRequest;
use App\Http\Requests\Ressource\UpdateRessourceRequest;
use App\Models\Commentaire;
use App\Models\Jointure_ress_utilisateur;
use App\Repositories\LienRessourceRepository;
use Illuminate\Http\Request;
use App\Repositories\RessourceRepository;


class RessourceController extends Controller
{

    private $ressourceRepository;
    private $lienRessourceRepository;

    public function __construct(RessourceRepository $ressourceRepository, LienRessourceRepository $lienRessourceRepository)
    {
      $this->ressourceRepository = $ressourceRepository;
      $this->lienRessourceRepository = $lienRessourceRepository;
    }
  
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lesRessources = $this->ressourceRepository->all();
        return response()->json($lesRessources);
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
        $laRessource =[
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
        
        foreach($lesLiensRessource as $unLienRessource){
            Jointure_ress_utilisateur::destroy($unLienRessource['id']);
        }
         foreach($ressource['commentaires'] as $unCommentaire){
            Commentaire::destroy($unCommentaire['id']);
        }
        Ressources::destroy($id);
    }
}
