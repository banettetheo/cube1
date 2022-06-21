<?php

namespace App\Http\Controllers\Administrateur;

use App\Http\Controllers\Controller;
use App\Http\Requests\Administration\RelationRequest;
use App\Http\Requests\Administration\RessourceRequest;
use App\Models\Type_ressource;
use Illuminate\Http\Request;

class TypesRessourceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lesRessources = Type_ressource::withTrashed()->get()
        ->map(
            function ($lesRessources) {
                $ressources = [
                    'id' => $lesRessources['id'],
                    'nom' => $lesRessources['Nom'],
                ];
                $updatedAt = $lesRessources['updated_at'];
                $deletedAt = $lesRessources['deleted_at'];

                

                $update = (!empty($updatedAt)?$updatedAt:"/");
                $delete = (!empty($deletedAt)?$deletedAt:"/");
                  $data = [
                      'updated_at' => $update,
                      'deleted_at' => $delete,
                  ];

            $result = array_merge($ressources, $data);                  
                return $result;
            }
        );
        return view('front-BO/gestion-catalogues/ressources', [
            'ressources' => $lesRessources,
        ]);
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RessourceRequest $request)
    {
        $validated = $request->validated();
        $laRessource = new Type_ressource($validated);
        $laRessource->save();
        return redirect()->route('administration.gestion-catalogues.ressources.index');
    }




    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RessourceRequest $request, $id)
    {
        $validated = $request->validated();
        $laRessource = Type_ressource::find($id);
        $laRessource->update($validated);
        return redirect()->route('administration.gestion-catalogues.ressources.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $laRessource = Type_ressource::find($id);
        $laRessource->delete();
        return redirect()->route('administration.gestion-catalogues.ressources.index');
    }

    public function restore($id)
    {
        $laRessource = Type_ressource::onlyTrashed()->where('id',$id)->first();
        $laRessource->restore();
        return redirect()->route('administration.gestion-catalogues.ressources.index');
    }
}
