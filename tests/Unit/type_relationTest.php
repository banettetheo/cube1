<?php

namespace Tests\Unit;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;
use App\Models\Type_Relation;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Auth;
use RuntimeException;

class type_relationTest extends TestCase
{

    use DatabaseTransactions;

    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_createtype_relation()
    {
       try
       {
        $Cat = [
            'Nom'=>"test_type_ressource",
            'created_at' => now()
        ];

         DB::table('Type_relation')->insert($Cat);
        $this->assertTrue(true);
       }
       catch(RuntimeException $e)
       {
        $this->assertTrue(false);
        echo $e;
       }
    }

    public function test_readtype_relation()
    {

        if(Type_Relation::find(3))
        {
            $this->assertTrue(true);
        }
        else
        {
            $this->assertTrue(false);
        }
    }

    public function test_deletetype_ressource()
    {
        try
        {
            $Cat = [
                'id' => 30,
                'Nom'=>"test_type_ressource",
                'created_at' => now()
            ];
    
             DB::table('Type_relation')->insert($Cat);

             Type_Relation::find(30)->delete();
            $this->assertTrue(true);
        }
        catch(RuntimeException $e)
        {
            $this->assertTrue(false);
        }
    }

    public function test_updatetype_ressource()
    {

        try
        {
            $Cat = Type_Relation::find(2);

            $Cat->Nom = "test_nom_cat";

            $Cat->save();
            $Comm = Type_Relation::find(2);

           if($Comm->Nom == "test_nom_cat")
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