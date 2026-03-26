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
        Schema::create('agents', function (Blueprint $table) {
            $table->id();
            $table->string('email')->unique();
            $table->string('photo')->nullable();
            $table->string('password');
            $table->string('phone')->nullable();
            $table->string('address')->nullable();
            $table->string('country')->nullable();
            $table->string('state')->nullable();
          
            $table->string('company')->nullable();
            $table->string('designation')->nullable();
            $table->text('bio')->nullable();

            $table->string('website')->nullable();
            $table->string('facebook')->nullable();
            $table->string('linkedin')->nullable();
            $table->string('tiktok')->nullable();
            $table->string('instagram')->nullable();

            $table->string('license_number')->nullable();
            $table->decimal('rating', 2, 1)->default(0);
            $table->integer('total_properties')->default(0);

            $table->string('token')->nullable();
            $table->string('status')-> default(0)->comment('0=pending, 1= active, 2=suspended');

            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('agents');
    }
};
