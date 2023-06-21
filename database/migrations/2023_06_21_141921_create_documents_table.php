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
        Schema::create('documents', function (Blueprint $table) {
            $table->id('idDoc');
            $table->string('nomDoc');
            $table->string('formatDoc');
            $table->date('dateVersion');
            $table->integer('numeroVersion');
            $table->integer('taille');
            $table->foreignIdFor('App\Models\Service')->constrained()->cascadeOnUpdate();
            $table->foreignIdFor('App\Models\User')->constrained()->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('documents');
    }
};
