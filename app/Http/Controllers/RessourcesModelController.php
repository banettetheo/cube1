<?php 

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Models\Etat;
use App\Models\Ressources;
use App\Models\Type_ressource;
use Illuminate\Http\Request;

class RessourcesModelController extends Controller 
{

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
    $utilisateur = Ressources::findOrFail($id);
    $categorie = Categorie::findOrFail($id);
    $type = Type_ressource::findOrFail($id);
    $etat = Etat::findOrFail($id);

    return view ('ressources/zoomRessource', [
      'ressource' => $laRessource,
      'utilisateur' => $utilisateur,
      'categorie' => $categorie,
      'type' => $type,
      'etat' => $etat
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