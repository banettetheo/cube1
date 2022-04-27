<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Support\Facades\DB;
use Illuminate\Auth;

class ConnexionTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_co()
    {
        if(DB::connection()) {
            // connection is made
            echo "YYYEEESSSS ça marche : " . DB::connection()->getDatabaseName();
            $this->assertTrue(true);
        }
        else{
            $this->assertTrue(false);
        }
    }

    public function test_co_KO()
    {
        $co = null;
        if($co == DB::connection())
        {
            // erreur devrai pas y'avoir de co
            $this->assertTrue(false);
        }
        else{
            echo "KO ça marche" . $co;
            $this->assertFalse(false);
        }
    }
}