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
                DATE_FORMAT(event_date, '%M %d %Y') as event_date_formated,
                event_time, 
                TIME_FORMAT(event_time, '%h:%i %p') as event_time_formated,
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
<<<<<<< HEAD

        DB::statement("
            CREATE VIEW calendars_act_vw  AS
            (
                select idcalendar, 
                school_year, 
                begin_dt, 
                end_dt
                from calendars
                where is_active = 1
                and ((curdate() between begin_dt and end_dt)
                or begin_dt>= curdate())
                order by begin_dt
            )
        ");

        DB::statement("
            CREATE VIEW menu_items_vw  AS
            select iditem, 
            item_name, 
            description, 
            price, 
            nutrition_facts, 
            menu_items.idcategory,
            category,
            image
            from menu_items
            INNER JOIN categories
            on (menu_items.idcategory = categories.idcategory)
        ");
=======
>>>>>>> Daphne
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
<<<<<<< HEAD
        DB::statement("DROP VIEW IF EXISTS calendars_act_vw");
        DB::statement("DROP VIEW IF EXISTS menu_items_vw");
=======
>>>>>>> Daphne
    }
}
