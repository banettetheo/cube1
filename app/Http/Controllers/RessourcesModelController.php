<?php 

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Models\Commentaire;
use App\Models\Etat;
use App\Models\Ressources;
use App\Models\Type_ressource;
use App\Models\Utilisateur;
use Illuminate\Http\Request;

class RessourcesModelController extends Controller 
{
  protected $ressource;
  protected $categorie;
  protected $etat;
  protected $typeRessource;
  protected $utilisateur;

  public function __construct(Ressources $ressource, Categorie $categorie, Etat $etat, Type_ressource $typeRessource, Utilisateur $utilisateur)
  {
      $this->ressource = $ressource;
      $this->categorie = $categorie;
      $this->etat = $etat;
      $this->typeRessource = $typeRessource;
      $this->utilisateur = $utilisateur;
  }


  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
  {
    return view ('accueil');
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return Response
   */
  public function create()
  {
    return view ('ressources/createRessource'); 
  }

  /**
   * Store a newly created resource in storage.
   *
   * @return Response
   */
  public function store(Request $request)
  {
    return view ('ressources/zoomRessource');
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function show($id)
  {
    $laRessource = Ressources::findOrFail($id);
    $utilisateur = Utilisateur::findOrFail($laRessource->IdUtilisateur_createur);
    $categorie = Categorie::findOrFail($laRessource->IdCategorie);
    $etat = Etat::findOrFail($laRessource->IdEtat);
    $typeRessource = Type_ressource::findOrFail($laRessource->IdType);
    $lesCommentaires = Commentaire::where('idRessources', $id)->get(); 

    return view ('ressources/zoomRessource', [
      'ressource' => $laRessource,
      'utilisateur' => $utilisateur,
      'categorie' => $categorie->Nom,
      'etat' => $etat->Nom,
      'typeRessource' => $typeRessource->Nom,
      'commentaires' => $lesCommentaires
    ]);
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function edit($id)
  {
    return view ('ressources/modifRessource');
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function update($id)
  {
    return view ('ressources/zoomRessource');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function destroy($id)
  {
    return view ('accueil');

  }
  
}

?>