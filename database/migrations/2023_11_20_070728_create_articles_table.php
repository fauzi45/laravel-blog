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
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->index()->constrained()->onDelete('cascade');
            $table->string('title');
            $table->string('slug');
            $table->longText('desc');
            $table->string('img');
            $table->string('status');
            $table->integer('views')->default(0);
            $table->date('publish_date');
            $table->unsignedBigInteger("user_id");
            $table->timestamps();
            $table->softDeletes();
            $table->foreign("user_id")->on('users')->references("id")->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('articles');
    }
};
