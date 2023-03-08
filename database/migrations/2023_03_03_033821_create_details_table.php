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
            $table->string('partnumber')->nullable();
            $table->string('description')->nullable();
            $table->float('width')->nullable();
            $table->float('length')->nullable();
            $table->integer('quantity')->nullable();
            $table->string('bar')->nullable();
            $table->string('laser')->nullable();
            $table->string('welding')->nullable();
            $table->string('press')->nullable();
            $table->string('saw')->nullable();
            $table->string('drill')->nullable();
            $table->string('clean')->nullable();
            $table->string('paint')->nullable();
            $table->string('pipethread')->nullable();
            $table->string('pipeengage')->nullable();
            $table->string('presssetup')->nullable();
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
