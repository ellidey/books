<?php

use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->integer('role_id')->default(0);
            $table->string('password');
            $table->timestamps();
        });

        User::create([
            'name' => 'admin',
            'email' => 'admin@admin.admin',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'role_id' => 1
        ]);

        User::create([
            'name' => 'reader',
            'email' => 'reader@reader.reader',
            'email_verified_at' => now(),
            'password' => Hash::make('password')
        ]);

        User::create([
            'name' => 'writer',
            'email' => 'writer@writer.writer',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'role_id' => 2
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
