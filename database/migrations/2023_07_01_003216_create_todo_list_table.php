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
        Schema::create('todo_list', function (Blueprint $table) {
            $table->id();
            $table->text("note")->nullable();
            $table->string("title",150);
            $table->dateTime("start");
            $table->dateTime("end");
            $table->string("code");
            $table->foreignId("user_id")->constrained("users");
            $table->string("created_by");
            $table->boolean("status")->default(1);
            $table->integer("num_repet");
            $table->string("type_repet");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('todo_list');
    }
};
