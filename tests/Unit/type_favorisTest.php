<?php

namespace Tests\Unit;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;
use App\Models\Type_favoris;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Auth;
use RuntimeException;

class type_favorisTest extends TestCase
{

    use DatabaseTransactions;

    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_createtypeFavoris()
    {
       try
       {

        $element = [
            "id"=>10,
            'Nom'=>"test",
            'created_at' => now()
        ];
        DB::table('type_favoris')->insert($element);
        

        type_favoris::find(10)->delete();
        $this->assertTrue(true);
       }
       catch(RuntimeException $e)
       {
        $this->assertTrue(false);
        echo $e;
       }
    }

    public function test_readtypeFavoris()
    {

        if(type_favoris::find(2))
        {
            $this->assertTrue(true);
        }
        else
        {
            $this->assertTrue(false);
        }
    }

    public function test_deletetypeFavoris()
    {
        try
        {
            $element = [
                "id"=>5,
                'Nom'=>"random",
                'created_at' => now()
            ];
            DB::table('type_favoris')->insert($element);

            type_favoris::find(5)->delete();
            $this->assertTrue(true);
        }
        catch(RuntimeException $e)
        {
            $this->assertTrue(false);
        }
    }

    public function test_updatetypeFavoris()
    {
        try
        {
            $element = [
                "id"=>7,
                'Nom'=>"random",
                'created_at' => now()
            ];

            DB::table('type_favoris')->insert($element);

            $Comm = type_favoris::find(7);
            
            $Comm->Nom = "test";

            $Comm->save();
            $Comm = type_favoris::find(7);

           if($Comm->Nom == "test")
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