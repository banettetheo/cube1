<?php

namespace App\Http\Controllers;

use App\Models\Ressources;
use App\Http\Requests\Ressource\StoreUpdateRessourceRequest;
use App\Providers\RouteServiceProvider;
use App\Repositories\RessourceRepository;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Route;

class RessourceController extends Controller
{
  private $ressourceRepository;

  public function __construct(RessourceRepository $ressourceRepository)
  {
    $this->ressourceRepository = $ressourceRepository;
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

    //Récupération des types de ressource
    $request = Request::create('/api/types-ressources', 'GET', []);
    $responseTypesRessources = Route::dispatch($request)->getContent();

    //Récupération des catégories
    $request = Request::create('/api/categories', 'GET', []);
    $responseCategories = Route::dispatch($request)->getContent();


    $lesTypesRessources = json_decode($responseTypesRessources, true);
    $lesCategories = json_decode($responseCategories, true);

    return view('ressources.createRessource', [
      'categories' => $lesCategories,
      'typesRessources' => $lesTypesRessources,
    ]);
  }

  /**
   * Store a newly created resource in storage.
   *
   * @return Response
   */
  public function store(StoreUpdateRessourceRequest $request)
  {

    $validated = $request->validated();
    $dataValide = array_merge($validated, (['IdUtilisateur_createur' => auth()->id()]));
    // if ($request->validator->fails()) {
    //   return Redirect::back()->withErrors($validated);
    // } else {
      $request = Request::create('/api/ressources', 'POST', []);
      $responseTypesRessources = Route::dispatch($request)->getContent();
      return redirect()->intended(RouteServiceProvider::HOME);
    // }
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function show($id)
  {
    $request = Request::create('/api/ressources/' . $id, 'GET', []);
    $responseRessources = Route::dispatch($request)->getContent();
    $laRessource = json_decode($responseRessources, true);


    if ($laRessource != null) {
      if (array_key_exists('message', $laRessource)) {
        return redirect()->intended(RouteServiceProvider::HOME);
      } else {
        return view('ressources/zoomRessource', [
          'ressource' => $laRessource
        ]);
      }
    } else {
      // return redirect()->intended(RouteServiceProvider::HOME);
      return view('ressources/zoomRessource', [
        'ressource' => $laRessource
      ]);
    }
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function edit($id)
  {
    //Récupération de la ressource
    $request = Request::create('/api/ressources/' . $id . '/modifier', 'GET', []);
    $responseRessource = Route::dispatch($request)->getContent();
    $laRessource = json_decode($responseRessource, true);

    if ($laRessource != null) {
      if (array_key_exists('message', $laRessource)) {
        return redirect()->intended(RouteServiceProvider::HOME);
      } else {
        //Récupération des types de ressource
        $request = Request::create('/api/types-ressources', 'GET', []);
        $responseTypesRessources = Route::dispatch($request)->getContent();

        //Récupération des catégories
        $request = Request::create('/api/categories', 'GET', []);
        $responseCategories = Route::dispatch($request)->getContent();


        $lesTypesRessources = json_decode($responseTypesRessources, true);
        $lesCategories = json_decode($responseCategories, true);

        return view('ressources/modifRessource', [
          'ressource' => $laRessource,
          // 'categories' => $lesCategories,
          'categories' => $laRessource,
          'typesRessources' => $lesTypesRessources,
        ]);
      }
    } else {
      // return redirect()->intended(RouteServiceProvider::HOME);
    }
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function update(StoreUpdateRessourceRequest $request, $id)
  {
    $validated = $request->validated();
    if ($request->validator->fails()) {
      return Redirect::back()->withErrors($validated);
    } else {
      $request = Request::create('/api/ressources/' . $id, 'PUT', []);
      Route::dispatch($request);
      return redirect()->route('ressources.show',$id);
    }
    // return redirect()->intended(RouteServiceProvider::HOME);

  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function destroy($id)
  {
    $request = Request::create('api/ressources/' . $id, 'DELETE');
    Route::dispatch($request);

    // return redirect()->intended(RouteServiceProvider::HOME);
  }
}
