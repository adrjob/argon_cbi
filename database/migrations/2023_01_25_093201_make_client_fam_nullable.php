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
        Schema::table('clients', function (Blueprint $table) {
            $table->string('spouse')->nullable()->change();
            $table->string('child1')->nullable()->change();
            $table->string('child2')->nullable()->change();
            $table->string('child3')->nullable()->change();
            $table->string('child4')->nullable()->change();
            $table->string('child5')->nullable()->change();
            $table->string('child6')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('clients', function (Blueprint $table) {
            //
        });
    }
};
