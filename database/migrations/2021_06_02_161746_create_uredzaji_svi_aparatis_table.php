<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\UtedzajiKategorija;
use App\Models\UtedzajiStanje;
use App\Models\UredzajiSviAparati;

class CreateUredzajiSviAparatisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('uredzaji_svi_aparatis', function (Blueprint $table) {
            $table->id();
            $table->string('naziv', 50);
            $table->unsignedBigInteger('kategorija_id');
            $table->foreign('kategorija_id')->references('id')->on('utedzaji_kategorijas');
            $table->unsignedBigInteger('stanje_id');
            $table->foreign('stanje_id')->references('id')->on('utedzaji_stanjes');
            $table->string('opis', 500);
            $table->decimal('cijena', 5, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('uredzaji_svi_aparatis');
    }
}