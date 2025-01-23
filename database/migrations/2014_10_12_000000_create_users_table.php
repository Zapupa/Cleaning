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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('middlename');
            $table->string('lastname');
            $table->string('login');
            $table->string('tel');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('role')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });

        DB::table('users')->insert([
            [
                'name' => "admin",
                'middlename' => "admin",
                'lastname' => "admin",
                'login' => "adminka",
                'tel' => "admin",
                'email' => "admin@gmail.com",
                'password' => '$2y$12$UsEl1W8OkSbTKV6/v8uoW.qlOal2KUkKObh.CFsxiy.CIofz319o2',
                'role' => "admin",
            ],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
