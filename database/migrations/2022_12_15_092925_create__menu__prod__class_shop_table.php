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
        Schema::create('Menu_Prod_Class_shop', function (Blueprint $table) {
            $table->id();
            $table->integer('shop_menu1_index');
            $table->string('shop_menu2_name', 250);
            $table->integer('spec_menu_class_index');
            $table->integer('pct_menu2_id');
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
        Schema::dropIfExists('Menu_Prod_Class_shop');
    }
};
