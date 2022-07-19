<?php

namespace App\Http\Controllers\Administrateur;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Repositories\EtatRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


class UtilisateurController extends Controller
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
        $requestq = Request::create('/api/utilisateurs', 'GET',[]);
        $responseRessources = Route::dispatch($requestq)->getContent();
        $lesUtilisateurs = json_decode($responseRessources, true);
        return view(
            'front-BO.gestion-comptes.index',
            [
                'utilisateurs' => $lesUtilisateurs,
            ]
        );
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
        $current_user = User::where('id',$id)->first();
        if($current_user->Compte_ban==1){
            $current_user->Compte_ban = 0;
        }else{
            $current_user->Compte_ban = 1;
        }
        $current_user->save();

        return redirect()->route('administration.gestion-comptes.index');
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
