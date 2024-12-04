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
        Schema::create('likes', function (Blueprint $table) {
            $table->id();
            // Adds a foreign key to 'user_id', linking it to the users table, and deletes likes if the user is deleted.
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            // Adds a foreign key to 'listing_id', linking it to the listings table, and deletes likes if the listing is deleted.
            $table->foreignId('listing_id')->constrained()->onDelete('cascade');
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
        Schema::dropIfExists('likes');
    }
};
