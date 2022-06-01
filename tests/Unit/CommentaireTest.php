<?php

namespace Tests\Unit;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;
use App\Models\Commentaire;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Auth;
use RuntimeException;

class CommentaireTest extends TestCase
{

    use DatabaseTransactions;

    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_createCommentaire()
    {
       try
       {
        $comm = Commentaire::factory()->create();
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

        if(Commentaire::find(35))
        {
            $this->assertTrue(true);
        }
        else
        {
            $this->assertTrue(false);
        }
    }

    public function test_deleteCommentaire()
    {
        try
        {
            Commentaire::find(3)->delete();
            $this->assertTrue(true);
        }
        catch(RuntimeException $e)
        {
            $this->assertTrue(false);
        }
    }

    public function test_updateCommentaire()
    {

        try
        {
            $Comm = Commentaire::find(5);

            $Comm->Contenue = "test_contenue";

            $Comm->save();
            $Comm = Commentaire::find(5);

           if($Comm->Contenue == "test_contenue")
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