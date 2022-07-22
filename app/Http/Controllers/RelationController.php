<?php

namespace App\Http\Controllers;

use App\Http\Requests\Ressource\StoreUpdateRelationRequest;
use App\Models\Relation;
use App\Models\Type_Relation;
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

    return view('user/mesRelations', ['relations' => $lesRelations]);
  }


  /**
   * Show the form for creating a new resource.
   *
   * @return Response
   */
  public function create($id)
  {
    $request = Request::create('/api/utilisateurs/' . $id, 'GET', []);
    $responseUtilisateur = Route::dispatch($request)->getContent();;

    $request = Request::create('/api/relations/types', 'GET', []);
    $responseLesTypes = Route::dispatch($request)->getContent();;

    $request = Request::create('/api/relations', 'GET', []);
    $responseLesRelations = Route::dispatch($request)->getContent();;


    $utilisateur = json_decode($responseUtilisateur, true);
    $lesTypes = json_decode($responseLesTypes, true);
    $lesRelations = json_decode($responseLesRelations, true);


    $relationUser = Type_Relation::findOrFail(5)->only('id', 'Nom');
    $infoRelationUser = [
      'idRelation' => null,
      'idType' => $relationUser['id'],
      'nomType' => $relationUser['Nom']
    ];

    if ($lesRelations != null) {
      foreach ($lesRelations as $uneRelation) {
        if ($uneRelation['utilisateur']['id'] == $id) {
          $infoRelationUser = [
            'idRelation' => $uneRelation['id'],
            'idType' => $uneRelation['typeRelation']['id'],
            'nomType' => $uneRelation['typeRelation']['Nom']
          ];
          break;
        }
      }
    }

    return view('user/compteUser', [
      'utilisateur' => $utilisateur,
      'types' => $lesTypes,
      'relationActuelle' => $infoRelationUser
    ]);
  }

  /**
   * Store a newly created resource in storage.
   *
   * @return Response
   */
  public function store(StoreUpdateRelationRequest $request, $id)
  {
    $request = Request::create('/api/utilisateurs/' . $id, 'POST', []);
    Route::dispatch($request)->getContent();
    return redirect()->route('relations.index');
  }


  /**
   * Update the specified resource in storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function update(StoreUpdateRelationRequest $request, $id)
  {
    $request = Request::create('/api/relations/' . $id, 'PUT', []);
    Route::dispatch($request);
    return redirect()->route('relations.index');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function destroy($id)
  {
    $request = Request::create('/api/relations/' . $id, 'DELETE', []);
    Route::dispatch($request);
    return redirect()->route('relations.index');
  }

  public function ajouter(Request $request, $id)
  {
    $validated = $request->validate([
      'relation_select' => ['required']
    ]);

    if ($validated['relation_select'] != 0) {
      $param = [
        'IdUser1' => Auth()->id(),
        'IdUser2' => $id,
        'IdTypeRelation' => $validated['relation_select']
      ];
      // dd($param);
      $relation = new Relation($param);
      $relation->save();
    } else {
      dd($request);
    }
    return redirect()->route('monCompte.index');
  }

  public function getMesRelations(){
    $mesRelations = Relation::where('IdUser1', Auth()->id())->get()->map(
      function ($relation){
        return [
          "id" => $relation->id,
          "nom" => $relation->user2->name,
          "prenom" => $relation->user2->Prenom,
          "relation" => $relation->IdRelation->Nom,
        ];
      }
    );
    return view('front-FO.relations.relations',[
      "utilisateurs" => $mesRelations,
    ]);
  }
}
