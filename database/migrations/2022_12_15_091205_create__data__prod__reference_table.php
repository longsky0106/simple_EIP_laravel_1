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
        Schema::create('Data_Prod_Reference', function (Blueprint $table) {
            $table->id();
            $table->string('Model', 20);
            $table->string('SK_NO1', 30);
            $table->string('SK_NO2', 30)->nullable()->default('');
            $table->string('SK_NO3', 30)->nullable()->default('');
            $table->string('SK_NO4', 30)->nullable()->default('');
            $table->string('HDMI', 10)->default('');
            $table->string('DisplayPort', 10)->default('');
            $table->string('DVI', 10)->default('');
            $table->string('VGA', 10)->default('');
            $table->string('USB-C(Data)', 10)->default('');
            $table->string('USB-A', 10)->default('');
            $table->string('RJ45', 10)->default('');
            $table->string('SD Slot', 10)->default('');
            $table->string('Micro SD Slot', 10)->default('');
            $table->string('Audio', 10)->default('');
            $table->string('Audio(TRRS)', 10)->default('');
            $table->string('BC 1.2', 10)->default('');
            $table->string('USB-C(5V/1.5A)', 10)->default('');
            $table->string('PD', 10)->default('');
            $table->float('Price', 10, 2)->default(9999);
            $table->float('Suggested Price', 10, 2)->default(0);
            $table->float('Cost Price', 10, 2)->default(0);
            $table->char('Main_Product', 10)->default('');
            $table->char('Mark1', 10);
            $table->char('Mark2', 10);
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
        Schema::dropIfExists('Data_Prod_Reference');
    }
};
