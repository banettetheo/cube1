<?php 

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Models\Commentaire;
use App\Models\Etat;
use App\Models\Ressources;
use App\Models\Type_ressource;
use App\Models\Utilisateur;
use Illuminate\Http\Request;
use App\Http\Requests\StoreRessourceRequest;

class RessourceController extends Controller 
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


  // /**
  //  * Display a listing of the resource.
  //  *
  //  * @return Response
  //  */
  // public function index()
  // {
  //   return view ('accueil');
  // }

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
  public function store(StoreRessourceRequest $request)
  {
    // $validated = $request->validated();

    // $categorie = $validated['content'];
    // $url = $validated['url'];
    // $type =$validated['content'];
    // $utilisateurID = 1;

    // Ressources::create([
    //   'Titre' => $validated['titre'],
    //   'Contenue' => $validated['content'],
    //   'Categorie' => $validated['categorie'],
    //   'Lien_ressources' => $validated['url'],
    //   'Type' => $validated['url'],
    //   'Utilisateur' => 1
    // ]);
    return view ('ressources/create');
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function show($id)
  {
    // $laRessource = Ressources::findOrFail($id)
    // ->get()
    // ->map(function ($ressource){
    //   return [
    //     'id_ressource' => $ressource->id,
    //     'auteur' => $ressource->Utilisateur->Nom
    //   ];
    // });

    $laRessource = Ressources::findOrFail($id);
    $utilisateur = $laRessource->Utilisateur->only('Nom','Prenom');
    $categorie = $laRessource->Categorie->only('Nom');
    $etat = $laRessource->Etat->only('Nom');
    $typeRessource = $laRessource->Type->only('Nom');
    $lesCommentaires = Commentaire::where('idRessources', $id)
    ->get()
    ->map(function ($commentaire){
      return [
        //'dateCreation' => $Commentaire->id,
        'utilisateur' => $commentaire->Utilisateur->only('Nom','Prenom'),
        'contenu' => $commentaire->Contenue
      ];
    }); 

    return view ('ressources/zoomRessource', [
      'ressource' => $laRessource,
      'utilisateur' => $utilisateur,
      'categorie' => $categorie,
      'etat' => $etat,
      'typeRessource' => $typeRessource,
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