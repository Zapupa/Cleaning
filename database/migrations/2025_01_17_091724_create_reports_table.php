<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('reports', function (Blueprint $table) {
            $table->id();
            $table->string('address');
            $table->string('contact');
            $table->date('date');
            $table->time('time');
            $table->string('payment');
            $table->foreignId('service_id')
                ->nullOnDelete()
                ->cascadeOnUpdate()
                ->constrained()
                ->nullable();
            $table->foreignId('user_id')
                ->nullOnDelete()
                ->cascadeOnUpdate()
                ->constrained()
                ->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reports');
    }
};
