<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEloadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('eloads', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('contact');
            $table->decimal('load_amount', 10, 2);
            $table->decimal('purchase_amount', 10, 2)->nullable();
            $table->string('keyword');
            $table->integer('menu_number')->nullable();
            $table->string('network');
            $table->tinyInteger('status')->default(1);     
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
        Schema::dropIfExists('eloads');
    }
}
