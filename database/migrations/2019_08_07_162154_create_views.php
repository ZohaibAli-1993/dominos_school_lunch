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
                idevent,
                IFNULL((select distinct 1 from orders e
                  where events.idevent = e.idevent ),0) as has_order
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
                students.last_name,
                parents.first_name as parent_first_name, 
                parents.last_name as parent_last_name
                from schools
                inner join classrooms 
                      on (schools.idschool = classrooms.idschool)
                inner join students   
                      on (students.idclassroom = classrooms.idclassroom)
                inner join parents   
                      on (students.idparent = parents.idparent)                      
                order by schools.idschool, classrooms.idclassroom, students.first_name,
                students.last_name

            )
        ");

        DB::statement("
            CREATE VIEW parents_students_vw  AS
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
                students.last_name,
                parents.first_name as parent_first_name, 
                parents.last_name as parent_last_name,
                parents.email
                from schools
                inner join classrooms 
                      on (schools.idschool = classrooms.idschool)
                inner join students   
                      on (students.idclassroom = classrooms.idclassroom)
                inner join parents   
                      on (students.idparent = parents.idparent)                      
                order by schools.idschool, parents.first_name,
                parents.last_name,
                classrooms.idclassroom, students.first_name,
                students.last_name

            )
        ");    

        DB::statement("
            CREATE VIEW students_vw  AS
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
                students.last_name,
                parents.first_name as parent_first_name, 
                parents.last_name as parent_last_name,
                parents.email
                from schools
                inner join classrooms 
                      on (schools.idschool = classrooms.idschool)
                inner join students   
                      on (students.idclassroom = classrooms.idclassroom)
                inner join parents   
                      on (students.idparent = parents.idparent)                      
                order by schools.idschool, students.first_name,
                students.last_name, parents.first_name,
                parents.last_name,
                classrooms.idclassroom 

            )
        ");     

        DB::statement("
            CREATE VIEW events_orders_vw  AS
            (
                select
                orders.idevent,
                orders.idorder,
                events.event_name, 
                events.event_date, 
                events.cutoff_date, 
                events.event_time, 
                schools.idschool, 
                schools.school_name, 
                classrooms.idclassroom, 
                classrooms.classroom, 
                classrooms.description, 
                students.idstudent, 
                students.idparent, 
                students.first_name, 
                students.last_name,
                parents.first_name as parent_first_name, 
                parents.last_name as parent_last_name
                from orders
                inner join schools
                      on (schools.idschool = orders.idschool)
                inner join events
                      on (events.idevent = orders.idevent)
                inner join classrooms 
                      on (orders.idclassroom = classrooms.idclassroom)
                inner join students   
                      on (orders.idclassroom = students.idclassroom)
                inner join parents   
                      on (students.idparent = parents.idparent)                      
                order by schools.idschool, events.event_date, 
                events.event_name, classrooms.idclassroom, 
                students.first_name, students.last_name

            )
        ");                 

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

        DB::statement("
            CREATE VIEW menu_selected_vw  AS
            select c.idevent,
            a.iditem, 
            item_name, 
            description, 
            price, 
            nutrition_facts, 
            a.idcategory,
            category,
            image,
            IFNULL((select 1 from event_items b
            where a.iditem = b.iditem and c.idevent = b.idevent),0) as is_selected,
            IFNULL((select b.final_price from event_items b
            where a.iditem = b.iditem and c.idevent = b.idevent),0) as final_price,
            IFNULL((select distinct 1 from orders_items d, orders e
            where a.iditem = d.iditem and c.idevent = e.idevent and 
                  d.idorder = e.idorder),0) as has_order
            from menu_items_vw a, events c
            order by c.idevent, a.iditem
        ");

        DB::statement("
            CREATE VIEW store_events_vw  AS
            select
            s.idstore,
            e.event_date,
            e.idevent,
            e.idschool
            from events e, schools s
            where (e.idschool = s.idschool)
            order by s.idstore, e.event_date, e.idevent 
        ");

        DB::statement("
            CREATE VIEW max_capacity_vw  AS
            select
            st.idstore,
            st.event_date,
            count(st.idevent) as total_events,
            s.store_max_events
            from store_events_vw st, setups s
            where s.id = 1
            group by st.idstore,
            st.event_date
            having count(st.idevent) >= store_max_events
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
        DB::statement("DROP VIEW IF EXISTS parents_students_vw");
        DB::statement("DROP VIEW IF EXISTS students_vw");
        DB::statement("DROP VIEW IF EXISTS events_orders_vw");
        DB::statement("DROP VIEW IF EXISTS calendars_act_vw");
        DB::statement("DROP VIEW IF EXISTS menu_items_vw");
        DB::statement("DROP VIEW IF EXISTS menu_selected_vw");
        DB::statement("DROP VIEW IF EXISTS store_events_vw");
        DB::statement("DROP VIEW IF EXISTS max_capacity_vw");
    }
}
