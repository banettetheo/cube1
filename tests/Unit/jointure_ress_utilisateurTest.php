<?php

namespace Tests\Unit;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;
use App\Models\Jointure_ress_utilisateur;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Auth;
use RuntimeException;

class jointure_ress_utilisateurTest extends TestCase
{

    use DatabaseTransactions;

    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_createJRU()
    {
       try
       {
        $comm = Jointure_ress_utilisateur::factory()->create();
        $comm->save();
        $this->assertTrue(true);
       }
       catch(RuntimeException $e)
       {
        $this->assertTrue(false);
        echo $e;
       }
    }

    public function test_readCommentaire()
    {

        if(Jointure_ress_utilisateur::find(35))
        {
            $this->assertTrue(true);
        }
        else
        {
            $this->assertTrue(false);
        }
    }

    public function test_deleteJRU()
    {
        try
        {
            Jointure_ress_utilisateur::find(3)->delete();
            $this->assertTrue(true);
        }
        catch(RuntimeException $e)
        {
            $this->assertTrue(false);
        }
    }

    public function test_updateJRU()
    {

        try
        {
            $Comm = Jointure_ress_utilisateur::find(5);

            $Comm->IdUtilisateur = 2;
            $Comm->IdRessource = 3;


            $Comm->save();
            $Comm = Jointure_ress_utilisateur::find(5);

           if($Comm->IdUtilisateur == 2 && $Comm->IdRessource == 3)
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