<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{

    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id('user_id');
            $table->string('first_name', 100); 
            $table->string('last_name', 100); 
            $table->enum('type', ['customer', 'employee']); 
            $table->timestamps(); 
        });
    }

    
    public function down(): void
    {
        Schema::dropIfExists(); 
    }
}
