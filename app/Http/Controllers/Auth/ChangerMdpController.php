<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Rules\MatchAncienMdp;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class ChangerMdpController extends Controller
{


  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function create()
  {
    return view('auth.changer-mdp');
  }



  /**
   * Store a newly created resource in storage.
   *
   * @return Response
   */
  public function store(Request $request)
  { {
      $request->validate([
        'mdp_actuel' => ['required', new MatchAncienMdp],
        'mdp' => ['required'],
        'confirmation_mdp' => ['same:mdp'],
      ]);

      User::find(auth()->user()->id)->update(['password' => Hash::make($request->mdp)]);

      dd('Password change successfully.');
    }
  }
}
