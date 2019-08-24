<?php

use Illuminate\Database\Seeder;
use App\Ator;

class AtoresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Ator::create([
            "nome" => "Abirosvaldo"
        ]);
        Ator::create([
            "nome" => "Djorge"
        ]);
        Ator::create([
            "nome" => "Deschamps"
        ]);
    }
}
