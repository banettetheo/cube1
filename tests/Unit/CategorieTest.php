<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;
use App\Models\Categorie;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Auth;
use RuntimeException;

class CategorieTest extends TestCase
{

    use DatabaseTransactions;

    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_createCategorie()
    {
        try {
            $Cat = categorie::factory()->create();
            $Cat->save();
            $this->assertTrue(true);
        } catch (RuntimeException $e) {
            $this->assertTrue(false);
            echo $e;
        }
    }

    public function test_readCategorie()
    {

        if (Categorie::find(3)) {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
    }

    public function test_deleteCategorie()
    {
        try {
            Categorie::find(1)->delete();
            $this->assertTrue(true);
        } catch (RuntimeException $e) {
            $this->assertTrue(false);
        }
    }

    public function test_updateCategorie()
    {

        try {
            $Cat = Categorie::find(2);

            $Cat->Nom = "test_nom_cat";

            $Cat->save();
            $Comm = Categorie::find(2);

            if ($Comm->Nom == "test_nom_cat") {
                $this->assertTrue(true);
            } else {
                $this->assertTrue(false);
            }
        } catch (RuntimeException $e) {
            $this->assertTrue(false);
        }
    }
}
