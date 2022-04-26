<?php

namespace Tests\Unit;
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

    use DatabaseTransactions;

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
        $user = User::factory(['id' => 99])->create();
        $user->save();

        if(User::find(99))
        {
            $this->assertTrue(true);
        }
        else
        {
            $this->assertTrue(false);
        }
    }

    public function test_deleteUser()
    {
        $user = User::factory(['id' => 1])->create();
        echo $user;
        $user->save();

        try
        {
            User::find(1)->delete();
            $this->assertTrue(true);
        }
        catch(RuntimeException $e)
        {
            $this->assertTrue(false);
        }
    }

    public function test_updateUser()
    {
        $user = User::factory(['id' => 1])->create();
        echo $user;
        $user->save();

        try
        {
            $user = User::find(1);

            $user->name = "test";
            $user->email = "test@gmail.com";
            $user->Prenom = "Prenom_test";

            $user->save();

           if($user->name == "test" && $user->email == "test@gmail.com")
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