<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->date('born_at');
            $table->string('phone');
            $table->foreignId('grade_id')->constrained();
            $table->foreignId('user_id')->constrained();
            $table->index(['grade_id', 'user_id']);
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
        Schema::table('students', function (Blueprint $table) {
            $table->dropForeign('students_user_id_foreign');
            $table->dropIndex('students_grade_id_user_id_index');
        });
        Schema::dropIfExists('students');
    }
}
