<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateViews extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        DB::statement("
            CREATE VIEW events_vw AS
            (
                select 
                idschool,
                event_date, 
                year(event_date) as year_event, 
                month(event_date) as month_event,
                day(event_date) as day_event,
                event_time, 
                event_name,
                idevent
                from events
                where is_active = 1
                order by idschool, event_date
            )
        ");

        DB::statement("
            CREATE VIEW classrooms_students_vw  AS
            (
                select
                schools.idschool, 
                schools.school_name, 
                classrooms.idclassroom, 
                classrooms.classroom, 
                classrooms.description, 
                students.idstudent, 
                students.idparent, 
                students.first_name, 
                students.last_name
                from schools
                inner join classrooms 
                      on (schools.idschool = classrooms.idschool)
                inner join students   
                      on (students.idclassroom = classrooms.idclassroom)
            )
        ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

        DB::statement("DROP VIEW IF EXISTS events_vw");
        DB::statement("DROP VIEW IF EXISTS classrooms_students_vw");
    }
}
