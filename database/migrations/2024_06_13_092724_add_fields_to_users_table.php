<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldsToUsersTable extends Migration
{
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('photo')->nullable();
            $table->text('address')->nullable();
            $table->enum('role', ['admin', 'agent', 'user'])->default('user');
            $table->enum('status', ['active', 'inactive'])->default('active');
        });
    }

    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('photo');
            $table->dropColumn('address');
            $table->dropColumn('role');
            $table->dropColumn('status');
        });
    }
}
