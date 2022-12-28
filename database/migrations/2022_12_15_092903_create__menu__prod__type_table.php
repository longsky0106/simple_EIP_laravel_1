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
        Schema::create('Menu_Prod_Type', function (Blueprint $table) {
            $table->id();
            $table->string('prod_type_name', 250)->nullable();
            $table->string('prod_type_rem', 250)->nullable();
            $table->integer('pct_menu_1')->nullable();
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
        Schema::dropIfExists('Menu_Prod_Type');
    }
};
