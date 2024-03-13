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
        Schema::create('technologies', function (Blueprint $table) {
            // $table->unsignedBigInteger('technology_id')->nullable();
            // $table->foreign('technology_id')->references('id')->on('technologies');
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Schema::table('projects', function (Blueprint $table) {
        //     if (Schema::hasColumn('projects', 'technology_id')) {
        //         $table->dropForeign(['technology_id']);
        //         $table->dropColumn('technology_id');
        //     }
        // });
        Schema::disableForeignKeyConstraints(); // Disabilita i vincoli di chiave esterna
        Schema::dropIfExists('technologies');
        Schema::enableForeignKeyConstraints(); // Riabilita i vincoli di chiave esterna
 
    }
};
