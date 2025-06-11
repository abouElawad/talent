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

      $Services=0;
        Schema::create('groups_students', function (Blueprint $table) {


            $table->foreignId('group_id')
                    ->constrained('groups')
                    ->cascadeOnDelete();

            $table->foreignId('user_id')
                    ->constrained('users')
                    ->cascadeOnDelete();

            $table->primary(['user_id','group_id']);

            $table->integer('count')->nullable();
            $table->double('price')->nullable();
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('groups_students');
    }
};
