<?php

namespace App\Http\Controllers\API;

use App\Models\Type_ressource;
use App\Http\Controllers\Controller;
use App\Repositories\TypeRessourceRepository;
use Illuminate\Http\Request;

class TypeRessourceController extends Controller
{

    private $typeRessource;
    
    public function __construct(TypeRessourceRepository $typeRessource){
        $this->typeRessource=$typeRessource;
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lesTypesRessource = $this->typeRessource->all();
        return response()->json($lesTypesRessource);
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
     * @param  \App\Models\Type_ressource  $type_ressource
     * @return \Illuminate\Http\Response
     */
    public function show(Type_ressource $type_ressource)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Type_ressource  $type_ressource
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Type_ressource $type_ressource)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Type_ressource  $type_ressource
     * @return \Illuminate\Http\Response
     */
    public function destroy(Type_ressource $type_ressource)
    {
        //
    }
}
