<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('admins', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('image')->nullable();
            $table->string('password');
            $table->string('status')->default('active');
            $table->timestamps();
        });

        if(!Admin::first()){
            $admin = new Admin();
            $admin->name = 'John Doe';
            $admin->email = 'admin@gmail.com';
            $admin->image = 'uploads/website-images/avatar-2023-11-05-08-21-19-9394.jpg';
            $admin->password = Hash::make(1234);
            $admin->status = 'active';
            $admin->save();
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admins');
    }
};
