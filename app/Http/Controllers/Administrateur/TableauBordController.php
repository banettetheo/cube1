<?php

namespace App\Http\Controllers\Administrateur;

use App\Http\Controllers\Controller;
use App\Models\Ressources;
use App\Repositories\EtatRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


class TableauBordController extends Controller
{


    private $etatRepository;

    public function __construct(EtatRepository $etatRepository)
    {
      $this->etatRepository = $etatRepository;
    }

    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lesRessources = Ressources::all();
        $nbRessources= count($lesRessources);

        $cptJaime = 0;
        $cptVues = 0;
        foreach($lesRessources as $uneRessource){
            $cptJaime += $uneRessource['Nombre_like'];
            $cptVues += $uneRessource['Nombre_vue'];
        }
        return view('front-BO.tableaux-bord.index',[
            'nbRessources'=> $nbRessources,
            'nbJaimes'=> $cptJaime,
            'nbVues'=> $cptVues,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
