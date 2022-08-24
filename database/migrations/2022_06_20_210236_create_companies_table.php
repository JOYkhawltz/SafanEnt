<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sector_id')->constrained('sectors');
            // $table->foreign('sector_id')->references('id')->on('sectors');
            $table->string('company_name');
            $table->string('owner');
            $table->string('designation');
            $table->float('GST');
            $table->integer('number_of_units')->default(0);
            $table->text('address');
            $table->text('NTN');
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
        Schema::dropIfExists('companies');
    }
}
