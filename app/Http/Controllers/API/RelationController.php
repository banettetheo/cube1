<?php

namespace App\Http\Controllers\API;

use App\Models\Categorie;
use App\Http\Controllers\Controller;
use App\Repositories\RelationRepository;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;

class RelationController extends Controller
{

    private $relationRepository;
    private $userRepository;

    public function __construct(RelationRepository $relationRepository, UserRepository $userRepository)
    {
        $this->relationRepository = $relationRepository;
        $this->userRepository = $userRepository;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $idUser = auth()->user()->id;
        $lesRelations = $this->relationRepository->all($idUser);
        return response()->json($lesRelations);
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
     * @param  \App\Models\Categorie  $categorie
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        $unUtilisateur = $this->userRepository->getUtilisateur($id);
        return response()->json($unUtilisateur);
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Categorie  $categorie
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Categorie $categorie)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Categorie  $categorie
     * @return \Illuminate\Http\Response
     */
    public function destroy(Categorie $categorie)
    {
        //
    }
}
