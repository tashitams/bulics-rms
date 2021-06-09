<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGradeSubjectTable extends Migration
{
    
    public function up()
    {
        Schema::create('grade_subject', function (Blueprint $table) {
            $table->foreignId('grade_id')->constrained();
            $table->foreignId('subject_id')->constrained();
        });
    }

    
    public function down()
    {
        Schema::dropIfExists('grade_subject');
    }
}
