<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Route;

class RelationController extends Controller 
{

  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
  {
     //Récupération des catégories
     $request = Request::create('/api/relations', 'GET', []);
     $responseLesRelations = Route::dispatch($request)->getContent();
 
     $lesRelations = json_decode($responseLesRelations, true);
   
     return view('user/mesRelations',['relations' => $lesRelations]);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return Response
   */
  public function create($id)
  {
    $request = Request::create('/api/utilisateurs/'.$id, 'GET', []);
    $responseUtilisateur = Route::dispatch($request)->getContent();;

    $utilisateur = json_decode($responseUtilisateur, true);
    return view('user/compteUser',['utilisateur' => $utilisateur]);
  }

  /**
   * Store a newly created resource in storage.
   *
   * @return Response
   */
  public function store(Request $request)
  {
    
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function show($id)
  {
    
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function edit($id)
  {
    
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function update($id)
  {
    
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function destroy($id)
  {
    
  }
  
}

?>