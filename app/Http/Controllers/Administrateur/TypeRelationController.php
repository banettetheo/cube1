<?php

namespace App\Http\Controllers\Administrateur;

use App\Http\Controllers\Controller;
use App\Http\Requests\Administration\RelationRequest;
use App\Models\Type_Relation;
use Illuminate\Http\Request;

class TypeRelationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lesRelations = Type_Relation::withTrashed()->get()
        ->map(
            function ($lesRelations) {
                $relations = [
                    'id' => $lesRelations['id'],
                    'nom' => $lesRelations['Nom'],
                ];
                $updatedAt = $lesRelations['updated_at'];
                $deletedAt = $lesRelations['deleted_at'];

                

                $update = (!empty($updatedAt)?$updatedAt:"/");
                $delete = (!empty($deletedAt)?$deletedAt:"/");
                  $data = [
                      'updated_at' => $update,
                      'deleted_at' => $delete,
                  ];

            $result = array_merge($relations, $data);                  
                return $result;
            }
        );
        return view('front-BO/gestion-catalogues/relations', [
            'relations' => $lesRelations,
        ]);
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RelationRequest $request)
    {
        $validated = $request->validated();
        $laRelation = new Type_Relation($validated);
        $laRelation->save();
        return redirect()->route('administration.gestion-catalogues.relations.index');
    }




    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RelationRequest $request, $id)
    {
        $validated = $request->validated();
        $laRelation = Type_Relation::find($id);
        $laRelation->update($validated);
        return redirect()->route('administration.gestion-catalogues.relations.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $laRelation = Type_relation::find($id);
        $laRelation->delete();
        return redirect()->route('administration.gestion-catalogues.relations.index');
    }

    public function restore($id)
    {
        $laRelation = Type_Relation::onlyTrashed()->where('id',$id)->first();
        $laRelation->restore();
        return redirect()->route('administration.gestion-catalogues.relations.index');
    }
}
