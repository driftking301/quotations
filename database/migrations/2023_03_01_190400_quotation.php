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
        Schema::create('quotations', function (Blueprint $table){
            $table->engine="InnoDB";
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('client');
            $table->date('date');
            $table->string('description');
            $table->decimal('laser', 5, 2);
            $table->decimal('weld', 5, 2);
            $table->decimal('press', 5, 2);
            $table->decimal('saw', 5, 2);
            $table->decimal('drilling', 5, 2);
            $table->decimal('cleaning', 5, 2);
            $table->decimal('painting', 5, 2);
            $table->decimal('pipe_thread', 5, 2);
            $table->decimal('pipe_engage', 5, 2);
            $table->decimal('press_setup', 5, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
