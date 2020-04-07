<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
		Schema::create('imports', function (Blueprint $table) {
			$table->bigIncrements('id');
			$table->string('countrycode', 2)->nullable();
			$table->string('salutation', 10)->nullable();
			$table->string('firstname', 30)->nullable();
			$table->string('lastname', 50)->nullable();
			$table->boolean('export')->default(0);
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
		Schema::dropIfExists('imports');
    }
}
