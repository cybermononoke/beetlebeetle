<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('emails', function (Blueprint $table) {
            $table->id();
            $table->foreignId('parent_id')->nullable()->constrained('emails')->onDelete('cascade');
            $table->string('to');
            $table->string('from');
            $table->string('subject');
            $table->text('content');
            $table->enum('folder', ['inbox', 'junk', 'draft', 'starred', 'deleted']);
            $table->boolean('image')->default(false);
            $table->boolean('starred')->default(false);
            $table->boolean('deleted')->default(false);
            $table->boolean('read')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('emails');
    }
};
