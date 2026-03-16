<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('client_intakes', function (Blueprint $table) {
            $table->id();
            $table->uuid('submission_uuid');
            $table->string('name');
            $table->string('email');
            $table->string('phone')->nullable();
            $table->string('portfolio_value');
            $table->string('objective');
            $table->string('horizon');
            $table->string('archetype');
            $table->string('concern');
            $table->text('notes')->nullable();
            $table->string('lead_score')->default('Normal');
            $table->string('ai_status')->default('pending');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('client_intakes');
    }
};

