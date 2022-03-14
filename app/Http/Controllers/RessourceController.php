<?php 

namespace App\Http\Controllers;

use App\Models\Ressources;
use App\Http\Requests\StoreRessourceRequest;
use App\Repositories\RessourceRepository;

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
  public function store(StoreRessourceRequest $request)
  {
    $validated = $request->validated();

    $ressource = Ressources::create([
      'Titre' => $validated['titre'],
      'Contenue' => $validated['contenu'],
      'IdCategorie' => $validated['idCategorie'],
      'IdUtilisateur_createur' => 1,
      'IdType' => $validated['idType'],
      'Lien_ressources' => $validated['url'],
    ]);
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
    return view ('accueil');

  }
  
}

?>