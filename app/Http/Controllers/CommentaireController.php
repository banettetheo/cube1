<?php 

namespace App\Http\Controllers;

use App\Models\Commentaire;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class CommentaireController extends Controller 
{


  /**
   * Store a newly created resource in storage.
   *
   * @return Response
   */
  public function store(Request $request, $id)
  {
     //Récupération des ressources
     $request = Request::create('/api/commentaires/'. $id, 'POST', []);
     $responseRessources = Route::dispatch($request)->getContent();

    return redirect()->route('ressources.show', $id);
  }



  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function destroy(Request $request, $id)
  {
      $ressource = Commentaire::findOrFail($id)->only('IdRessources');
        //Récupération des ressources
        $request = Request::create('/api/commentaires/'. $id, 'DELETE', []);
        $responseRessources = Route::dispatch($request);
   
       return redirect('ressources/'.$ressource['IdRessources']); 
      //  return redirect()->to("");
  }
  
}

?>