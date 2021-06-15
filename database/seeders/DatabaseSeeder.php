<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\UredzajiSviAparati;
use App\Models\UtedzajiKategorija;
use App\Models\UtedzajiStanje;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        UtedzajiStanje::insert([
            ['stanje'=>'Novo'],
            ['stanje'=>'Akcija']
        ]);
        UtedzajiKategorija::insert([
            ['kategorija'=>'Mobilna'],
            ['kategorija'=>'Fiksna'],
            ['kategorija'=>'Televizija']
        ]);
        UredzajiSviAparati::insert([
            ['naziv'=>'Samsung',
            'kategorija_id'=>1,
            'stanje_id'=>1,
            'opis'=>'Opis za mobitel',
            'cijena'=>548
        ],
        ['naziv'=>'Tesla',
            'kategorija_id'=>2,
            'stanje_id'=>1,
            'opis'=>'Opis za fiksnu',
            'cijena'=>213
        ],
        ['naziv'=>'Alkatel',
        'kategorija_id'=>3,
        'stanje_id'=>2,
        'opis'=>'Opis za televiziju',
        'cijena'=>312
    ], 
        ]);
        
    }
}