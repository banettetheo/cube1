<?php

namespace Tests\Unit;

use App\Models\Commentaire;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Auth;
use RuntimeException;

class UserTest extends TestCase
{

    use RefreshDatabase;

    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_createUser()
    {
       try
       {
        $user = User::factory()->create();
        $user->save();
        $this->assertTrue(true);
       }
       catch(RuntimeException $e)
       {
        $this->assertTrue(false);
        echo $e;
       }
    }

    public function test_readUser()
    {

        if(User::find(19))
        {
            $this->assertTrue(true);
        }
        else
        {
            $this->assertTrue(false);
        }
    }

    public function test_updateUser()
    {

        try
        {
            $user = User::find(4);

            $user->name = "test";
            $user->email = "test@gmail.com";
            $user->Prenom = "Prenom_test";

            $user->save();
            $user = User::find(4);

           if($user->name == "test" && $user->email == "test@gmail.com" && $user->Prenom == "Prenom_test")
           {
            $this->assertTrue(true);
           }
           else
           {
            $this->assertTrue(false);
           }
            
        }
        catch(RuntimeException $e)
        {
            $this->assertTrue(false);
        }
    }
}