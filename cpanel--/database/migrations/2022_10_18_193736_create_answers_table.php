<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnswersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('answers', function (Blueprint $table) {
            $table->id();
            $table->text('answer');
            $table->foreignId('homework_id')->on('id')->refences('homeworks');
            $table->foreignId('student_id')->constrained();
            $table->foreignId('grade_id')->constrained();
            $table->foreignId('teacher_id')->constrained();
            $table->index(['grade_id', 'teacher_id', 'student_id', 'homework_id']);
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
        Schema::dropIfExists('answers');
    }
}
