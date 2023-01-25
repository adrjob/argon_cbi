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
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('spouse');
            $table->string('child1');
            $table->string('child2');
            $table->string('child3');
            $table->string('child4');
            $table->string('child5');
            $table->string('child6');
            $table->string('sub_agent');
            $table->string('program_id');
            $table->string('program_name');
            $table->string('status');            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clients');
    }
};
