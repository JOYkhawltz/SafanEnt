<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMachinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('machines', function (Blueprint $table) {
            $table->id();
            $table->foreignId('dept_id')->constrained('departments');
            $table->string('OEM');
            $table->string('make');
            $table->string('model');
            $table->string('lubricant_name');
            $table->string('lubricant_type');
            $table->string('category');
            $table->string('equipment');
            $table->string('machine_owner');
            $table->text('address');
            $table->text('email_id');
            $table->text('mobile');
            $table->text('PTCL');
            $table->text('ext');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('machines');
    }
}
