<?php

namespace App\Http\Controllers\API;

use App\Models\Ressources;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\RessourceRepository;


class RessourceController extends Controller
{

    private $ressourceRepository;

    public function __construct(RessourceRepository $ressourceRepository)
    {
      $this->ressourceRepository = $ressourceRepository;
    }
  
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    public function update(Request $request, Ressources $ressources)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ressources  $ressources
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ressources $ressources)
    {
        //
    }
}
