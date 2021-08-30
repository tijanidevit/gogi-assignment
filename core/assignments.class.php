<?php
    include_once 'db.class.php';

    class assignments extends DB{

        function add_assignment($course_id,$lecturer_id,$title,$question,$instructions,$deadline,$max_grade){
            return DB::execute("INSERT INTO assignments(course_id,lecturer_id,title,question,instructions,deadline,max_grade) VALUES(?,?,?,?,?,?,?)", [$course_id,$lecturer_id,$title,$question,$instructions,$deadline,$max_grade]);
        }
        function fetch_assignments(){
            return DB::fetchAll("SELECT *,assignments.id FROM assignments
            LEFT OUTER JOIN customers on customers.id = assignments.customer_id
            ORDER BY assignments.id DESC ", []);
        }

        function fetch_limited_assignments($status,$limit){
            return DB::fetchAll("SELECT *,assignments.id FROM assignments
            LEFT OUTER JOIN customers on customers.id = assignments.customer_id
            WHERE status = ? LIMIT $limit
            ORDER BY assignments.id DESC ", [$status]);
        }

        function fetch_assignment($id){
            return DB::fetch("SELECT * FROM assignments WHERE id = ? ",[$id] );
        }
        function delete_assignment($id){
            return DB::execute("DELETE FROM assignments WHERE id = ? ",[$id] );
        }

        function update_assignment_status($status,$id){
            return DB::execute("UPDATE assignments SET status = ? WHERE id = ? ", [$status,$id]);
        }
       
        function assignments_num(){
            return DB::num_row("SELECT id FROM assignments ", []);
        }

        function fetch_customer_assignments($status,$customer_id){
            return DB::fetchAll("SELECT *,assignments.details,assignments.id FROM assignments
            LEFT OUTER JOIN customers on customers.id = assignments.customer_id
            where status = ? and (amount = ? or profit = ?) ORDER BY assignments.id DESC ",[$status,$customer_id,$customer_id]);
        }

        function fetch_lecturer_last_assignment($lecturer_id){
            return DB::fetch("SELECT id FROM assignments WHERE lecturer_id = ? DESC LIMIT 1 ",[$lecturer_id]);
        }

        function lecturer_assignments_num($status,$lecturer_id){
            return DB::num_row("SELECT id FROM assignments WHERE lecturer_id = ? ",[$lecturer_id]);
        }
    }
?>