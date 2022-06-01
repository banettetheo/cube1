<?php

namespace Tests\Unit;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;
use App\Models\Etat;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Auth;
use RuntimeException;

class etatTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_createEtat()
    {
       try
       {

        $element = [
            "id"=>10,
            'Nom'=>"test",
            'created_at' => now()
        ];
        DB::table('etat')->insert($element);
        

         Etat::find(10)->delete();
        $this->assertTrue(true);
       }
       catch(RuntimeException $e)
       {
        $this->assertTrue(false);
        echo $e;
       }
    }

    public function test_readEtat()
    {

        if(Etat::find(2))
        {
            $this->assertTrue(true);
        }
        else
        {
            $this->assertTrue(false);
        }
    }

    public function test_deleteEtat()
    {
        try
        {
            $element = [
                "id"=>10,
                'Nom'=>"random",
                'created_at' => now()
            ];
            DB::table('etat')->insert($element);

            Etat::find(10)->delete();
            $this->assertTrue(true);
        }
        catch(RuntimeException $e)
        {
            $this->assertTrue(false);
        }
    }

    public function test_updateEtat()
    {
        try
        {
            $element = [
                "id"=>10,
                'Nom'=>"random",
                'created_at' => now()
            ];

            DB::table('etat')->insert($element);

            $Comm = Etat::find(10);

            $Comm->Nom = "test";

            $Comm->save();
            $Comm = Etat::find(10);

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