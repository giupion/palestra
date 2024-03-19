<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCourseIdToActivitiesTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('activities', function (Blueprint $table) {
            $table->unsignedBigInteger('course_id'); // Aggiungi la colonna course_id come unsignedBigInteger
            $table->foreign('course_id')->references('id')->on('courses'); // Aggiungi una chiave esterna per collegare la colonna course_id alla tabella courses
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('activities', function (Blueprint $table) {
            $table->dropForeign(['course_id']); // Rimuovi la chiave esterna prima di eliminare la colonna
            $table->dropColumn('course_id'); // Elimina la colonna course_id
        });
    }
}


