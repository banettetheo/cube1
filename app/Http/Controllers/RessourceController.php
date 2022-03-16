<?php 

namespace App\Http\Controllers;

use App\Models\Ressources;
use App\Http\Requests\Ressource\StoreUpdateRessourceRequest;
use App\Repositories\RessourceRepository;
use Illuminate\Http\Request;
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
    return view ('ressources/createRessource');
  }

  /**
   * Store a newly created resource in storage.
   *
   * @return Response
   */
  public function store(StoreUpdateRessourceRequest $request)
  {
    $validated = $request->validated();

    $ressource = Ressources::create($validated);
    return redirect()->route('ressources.show',$ressource->id);
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function show($id)
  {
    $ressource =[
      'ressource' => $this->ressourceRepository->findById($id)
    ];

    return view ('ressources/zoomRessource',$ressource);
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function edit($id)
  {
    return view ('ressources/modifRessource');
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function update($id)
  {
    return view ('ressources/zoomRessource');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function destroy($id)
  {
    $request = Request::create('api/ressources/'.$id,'DELETE');
    Route::dispatch($request);

    return redirect()->route('monCompte');

  }
  
}

?>