<?php

namespace App\Http\Controllers\Administrateur;

use App\Http\Controllers\Controller;
use App\Http\Requests\Administration\CategorieRequest;
use App\Models\Categorie;
use Illuminate\Http\Request;

class CategorieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //dd(Categorie::all());
        // $lesCategories = Categorie::all()->map(
        $lesCategories = Categorie::withTrashed()->get()
        ->map(
            function ($uneCategorie) {
                $categ = [
                    'id' => $uneCategorie['id'],
                    'nom' => $uneCategorie['Nom'],
                ];
                $updatedAt = $uneCategorie['updated_at'];
                $deletedAt = $uneCategorie['deleted_at'];

                

                $update = (!empty($updatedAt)?$updatedAt:"/");
                $delete = (!empty($deletedAt)?$deletedAt:"/");
                  $data = [
                      'updated_at' => $update,
                      'deleted_at' => $delete,
                  ];

            $result = array_merge($categ, $data);                  
                return $result;
            }
        );
        return view('front-BO/gestion-catalogues/categories', [
            'categories' => $lesCategories,
        ]);
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategorieRequest $request)
    {
        $validated = $request->validated();
        $laCateg = new Categorie($validated);
        $laCateg->save();
        return redirect()->route('administration.gestion-catalogues.categories.index');
    }




    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategorieRequest $request, $id)
    {
        $validated = $request->validated();
        $laCateg = Categorie::find($id);
        $laCateg->update($validated);
        return redirect()->route('administration.gestion-catalogues.categories.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $laCateg = Categorie::find($id);
        $laCateg->delete();
        return redirect()->route('administration.gestion-catalogues.categories.index');
    }

    public function restore($id)
    {
        $laCateg = Categorie::onlyTrashed()->where('id',$id)->first();
        $laCateg->restore();
        return redirect()->route('administration.gestion-catalogues.categories.index');
    }
}
