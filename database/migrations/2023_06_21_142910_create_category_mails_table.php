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
        Schema::create('category_mails', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor('App\Models\Category')->constrained()->cascadeOnUpdate();
            $table->foreignIdFor('App\Models\Mail')->constrained()->cascadeOnUpdate();
            $table->date('dateAjout');
          
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('category_mails');
    }
};
