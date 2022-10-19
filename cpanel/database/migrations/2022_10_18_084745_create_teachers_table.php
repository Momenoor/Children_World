<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeachersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teachers', function (Blueprint $table) {
            $table->id();
            $table->string('phone');
            $table->string('specialization');
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
        Schema::table('teachers', function (Blueprint $table) {
            $table->dropForeign('teachers_user_id_foreign');
            $table->dropIndex('teachers_grade_id_user_id_index');
        });
        Schema::dropIfExists('teachers');
    }
}
