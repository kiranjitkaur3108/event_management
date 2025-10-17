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
        // This method creates the 'contacts' table.
        Schema::create('contacts', function (Blueprint $table) {
            // Primary key ID for the table (e.g., 1, 2, 3...)
            $table->id();

            // Store the visitor's name (required, max 255 chars)
            $table->string('name', 255);

            // Store the visitor's email address (required, max 255 chars).
            $table->string('email', 255)->index();

            // Store the message content. 'text' is used for longer strings.
            $table->text('message');

            // Adds 'created_at' and 'updated_at' columns for timestamps.
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
        // This method drops (deletes) the 'contacts' table if the migration is rolled back.
        Schema::dropIfExists('contacts');
    }
};
