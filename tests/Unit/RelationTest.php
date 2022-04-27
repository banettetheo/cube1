<?php

namespace Tests\Unit;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;
use App\Models\Relation;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Auth;
use RuntimeException;

class RelationTest extends TestCase
{

    use DatabaseTransactions;

    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_createRelation()
    {
       try
       {
        $comm = Relation::factory()->create();
        $comm->save();
        $this->assertTrue(true);
       }
       catch(RuntimeException $e)
       {
        $this->assertTrue(false);
        echo $e;
       }
    }

    public function test_readRelation()
    {

        if(Relation::find(35))
        {
            $this->assertTrue(true);
        }
        else
        {
            $this->assertTrue(false);
        }
    }

    public function test_deleteRelation()
    {
        try
        {
            Relation::find(3)->delete();
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
            $Comm = Relation::find(5);

            $Comm->IdTypeRelation = 1;
            $Comm->IdUser1 = 3;
            $Comm->IdUser2 = 4;

            $Comm->save();
            $Comm = Relation::find(5);

           if($Comm->IdTypeRelation == 1 && $Comm->IdUser1 == 3 && $Comm->IdUser2 == 4)
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