<?php

use App\Models\Taxes;
use Illuminate\Database\Seeder;

class TaxSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Taxes::create([
            "type" => "A",
            "tax" => 6
        ]);

        Taxes::create([
            "type" => "B",
            "tax" => 8
        ]);

        Taxes::create([
            "type" => "C",
            "tax" => 4
        ]);
    }
}
