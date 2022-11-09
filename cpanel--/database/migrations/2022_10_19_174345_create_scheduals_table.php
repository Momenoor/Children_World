<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSchedualsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('scheduals', function (Blueprint $table) {
            $table->id();
            $table->foreignId('grade_id')->constrained();
            $table->date('date');
            $table->text('subject1');
            $table->text('subject2');
            $table->text('subject3');
            $table->text('subject4');
            $table->text('subject5');
            $table->text('subject6');
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
        Schema::dropIfExists('scheduals');
    }
}
