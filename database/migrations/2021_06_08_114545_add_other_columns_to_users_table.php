<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddOtherColumnsToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('nickname')->nullable();
            $table->string('surname')->nullable();
            $table->string('phone')->nullable();
            $table->string('avatar')->nullable();
            $table->tinyInteger('sex')->nullable();
            $table->boolean('agree_email_notify')->default(0);
            $table->string('email')->nullable()->change();
            $table->string('password')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('nickname');
            $table->dropColumn('surname');
            $table->dropColumn('phone');
            $table->dropColumn('avatar');
            $table->dropColumn('sex');
            $table->dropColumn('agree_email_notify');
            $table->string('email')->nullable(false)->change();
            $table->string('password')->nullable(false)->change();
        });
    }
}
