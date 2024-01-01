<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('accounts_user', function (Blueprint $table) {
            $table->boolean('is_admin')->nullable();
            $table->enum('status', ['accepted', 'invited', 'pending'])->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('accounts_user', function (Blueprint $table) {
            //
        });
    }
};
