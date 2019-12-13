<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateViewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('views', function (Blueprint $table) {

            $table->char('id', 30);
            $table->text('name');
            $table->text('description');
            $table->text('tel');
            $table->text('address');
            $table->integer('zipcode');
            $table->text('opentime');
            $table->float('px');
            $table->float('py');

            $table->timestamps();

            // 這個很重要!!
            $table->primary('id');
            $table->collation = 'utf8mb4_general_ci';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('views');
    }
}
