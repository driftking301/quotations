<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        schema::create('details', function(Blueprint $table) {
            $table->engine = "InnoDB";
            $table->bigIncrements('id');
            $table->bigInteger('quotation_id')->unsigned();
            $table->string('description');
            $table->float('width');
            $table->float('length');
            $table->integer('quantity');
            $table->string('bar');
            $table->string('laser');
            $table->string('welding');
            $table->string('press');
            $table->string('saw');
            $table->string('drill');
            $table->string('clean');
            $table->string('paint');
            $table->string('pipethread');
            $table->string('pipeengage');
            $table->string('presssetup');
            $table->float('total');
            $table->timestamps();
            $table->foreign('quotation_id')
                ->references('id')
                ->on('quotations')
                ->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('details');
    }
};
