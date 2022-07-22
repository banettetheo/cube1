<?php

namespace App\Http\Controllers\Moderateur;

use App\Http\Controllers\Controller;
use App\Models\Favoris;
use App\Models\Jointure_ress_utilisateur;
use App\Models\Ressources;
use App\Repositories\RessourceRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Tests\Unit\jointure_ress_utilisateurTest;

class RessourceValidationController extends Controller
{

  private $ressourceRepository;

  public function __construct(RessourceRepository $ressourceRepository)
  {
    $this->ressourceRepository = $ressourceRepository;
  }


  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
  {
    if (!Gate::allows('acces-moderateur')) {
      return view('/');
      abort('403');
    } else {
      $ressources = $this->ressourceRepository->findAValider();
      return view('front-FO.ressources.a-valider', [
        "ressources" => $ressources,
      ]);
    }
  }


  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function show($id)
  {
    if (!Gate::allows('acces-moderateur')) {
      return view('/');
      abort('403');
    } else {
      if ($this->ressourceRepository->checkEtat($id, 3)) {
        $ressource = $this->ressourceRepository->findById($id);

        $cote = false;
        $favoris = false;

        $mettreDeCote = Favoris::where([
          ['Utilisateur_id', "=", Auth()->id()],
          ['IdRessources', "=", $id],
          ['Type_favoris_id', "=", 2],
        ])->get()->toArray();
        if ($mettreDeCote != null) {
          $cote = true;
        }
        $mettreEnFavoris = Favoris::where([
          ['Utilisateur_id', "=", Auth()->id()],
          ['IdRessources', "=", $id],
          ['Type_favoris_id', "=", 1],
        ])->get()->toArray();
        if ($mettreEnFavoris != null) {
          $favoris = true;
        }
        return view('ressources/zoomRessource', [
          'ressource' => $ressource,
          'cote' => $cote,
          'favoris' => $favoris,
        ]);
      } else {
        return redirect()->route('/');
      }
    }
  }

  public function valider($id)
  {
    if (!Gate::allows('acces-moderateur')) {
      return view('/');
      abort('403');
    } else {
      if ($this->ressourceRepository->checkEtat($id, 3)) {
        $ressource = Ressources::find($id);
        $this->deletePartage($id);
        $ressource->idEtat = 4;
        $ressource->save();
      }
      return redirect()->route('mon-compte.moderateur.ressources-a-valider.index');
    }
  }


  public function refuser($id)
  {
    if (!Gate::allows('acces-moderateur')) {
      return view('/');
      abort('403');
    } else {
      if ($this->ressourceRepository->checkEtat($id, 3)) {
        $ressource = Ressources::find($id);
        $ressource->idEtat = 5;
        $ressource->save();
      }
      return redirect()->route('mon-compte.moderateur.ressources-a-valider.index');
    }
  }

  private function deletePartage($id_ressource)
  {
    $lesPartages = Jointure_ress_utilisateur::where('idRessource', $id_ressource)->get();
    foreach ($lesPartages as $unPartage) {
      $unPartage->delete();
    }
  }

  public function publier($id){
    $ressource = Ressources::find($id);
    $this->deletePartage($id);
    if($ressource->utilisateur->id == Auth()->id()){
      $ressource->idEtat = 3;
      $ressource->save();
    }
    return redirect()->route('monCompte.index');
  }
}
