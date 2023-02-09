<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Kategoria;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class KategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        
        Kategoria::truncate();
        
        $seged = new Kategoria();
        $seged->nev = "Gyümölcsök";
        $seged->save();
        
        $first = $seged->id;

        $seged = new Kategoria();
        $seged->nev = "Zöldségek";
        $seged->save();
        $last = $seged->id;

        foreach (DB::table("termekek")->get() as $termek ) {
            DB::table('termekek')->where('id', $termek->id)->update(["kategoriaid"=> rand($first,$last)]);
        }

        Schema::EnableForeignKeyConstraints();
    }
}
