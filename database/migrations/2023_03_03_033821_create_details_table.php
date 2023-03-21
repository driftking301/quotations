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
            $table->string('partnumber');
            $table->string('description')->nullable();
            $table->float('width')->nullable();
            $table->float('length')->nullable();
            $table->float('quantity')->nullable();
            $table->float('factor')->nullable();
            $table->float('laser')->nullable();
            $table->float('custom_price')->nullable();
            $table->longText('holes')->nullable();
            $table->float('welding')->nullable();
            $table->float('press')->nullable();
            $table->float('saw')->nullable();
            $table->float('drill')->nullable();
            $table->float('clean')->nullable();
            $table->float('paint')->nullable();
            $table->float('pipe_thread')->nullable();
            $table->float('pipe_engage')->nullable();
            $table->float('press_setup')->nullable();
            $table->float('total')->nullable();
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
