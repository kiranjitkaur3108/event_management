<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWishlistsTable extends Migration
{
    public function up()
    {
        Schema::create('wishlists', function (Blueprint $table) {
            $table->id();
            // FK to users table
            $table->unsignedBigInteger('user_id');
            // FK to services table
            $table->unsignedBigInteger('service_id');
            $table->timestamps();

            // indexes & foreign keys (optional but recommended)
            $table->index(['user_id', 'service_id']);
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('service_id')->references('id')->on('services')->onDelete('cascade');

            // optional unique constraint to prevent duplicates:
            $table->unique(['user_id', 'service_id']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('wishlists');
    }
}
