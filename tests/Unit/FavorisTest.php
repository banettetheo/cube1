<?php

namespace Tests\Unit;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;
use App\Models\Favoris;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Auth;
use RuntimeException;

class FavorisTest extends TestCase
{

    use DatabaseTransactions;

    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_createFavoris()
    {
       try
       {
        $comm = Favoris::factory()->create();
        $comm->save();
        $this->assertTrue(true);
       }
       catch(RuntimeException $e)
       {
        $this->assertTrue(false);
        echo $e;
       }
    }

    public function test_readFavoris()
    {

        if(Favoris::find(35))
        {
            $this->assertTrue(true);
        }
        else
        {
            $this->assertTrue(false);
        }
    }

    public function test_deleteFavoris()
    {
        try
        {
            Favoris::find(3)->delete();
            $this->assertTrue(true);
        }
        catch(RuntimeException $e)
        {
            $this->assertTrue(false);
        }
    }

    public function test_updateFavoris()
    {

        try
        {
            $Comm = Favoris::find(5);

            $Comm->Type_favoris_id = 2;

            $Comm->save();
            $Comm = Favoris::find(5);

           if($Comm->Type_favoris_id == 2)
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