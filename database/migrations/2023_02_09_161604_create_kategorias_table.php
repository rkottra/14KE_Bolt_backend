<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kategoriak', function (Blueprint $table) {
            $table->id();
            $table->string("nev");
            $table->timestamps();
        });
        Schema::table('termekek', function (Blueprint $table) {
            $table->unsignedBigInteger("kategoriaid")->nullable();
            $table->foreign("kategoriaid")->references('id')->on('kategoriak');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::disableForeignKeyConstraints();

        Schema::table('termekek', function (Blueprint $table) {
            $table->dropForeign(['kategoriaid']);
            $table->dropColumn('kategoriaid');
        });
        Schema::dropIfExists('kategoriak');

        Schema::enableForeignKeyConstraints();

    }
};
