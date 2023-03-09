<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

use App\Models\Termek;
use App\Models\Kategoria;


class TermekModelTest extends TestCase
{
    use RefreshDatabase;
    protected $seed = true;

    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_example()
    {
        $this->setName("Létezik-e a Termek osztály?");
        $this->assertTrue(class_exists("App\Models\Termek"), "A Termek osztály nem létezik");
    }
    
    public function test_Termek_Mukodik()
    {
        $this->setName("Termek osztály mezői elérhetőek-e?");

        $termek = Termek::get()[0];
        $this->assertIsNumeric($termek->ar);
        $this->assertIsNumeric($termek->kedvezmeny);
    
        $this->assertIsString($termek->nev);
        $this->assertIsString($termek->leiras);
        
    }

    public function test_Termek_kategoriaStimmel()
    {
        $this->setName("Első termék kategória id-ja benne van-e a kategóriák tábla id-jai között?");

        $termek = Termek::with("kategoria")->get()[0];
        $kategoriak = Kategoria::select("id")->get();
        $this->assertContains($termek->kategoriaid, Kategoria::select("id")->pluck('id'));
    }

    public function test_ujTermek()
    {
        $this->setName("Új termék felvétele sikerül?");

        $ujtermek = new Termek();
        $ujtermek->nev = "körte";
        $ujtermek->leiras = "";
        $ujtermek->ar = 0;
        $ujtermek->kedvezmeny = 0;
        $ujtermek->kepUrl = "";
        $ujtermek->save();

        $termek = Termek::where(["id" => $ujtermek->id])->get()[0];

        $this->assertEquals($termek->nev, "körte");
    }
  
}
