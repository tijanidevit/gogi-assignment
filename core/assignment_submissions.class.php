<?php
    include_once 'db.class.php';

    class assignment_submissions extends DB{

        function add_assignment_submission($student_id,$type,$amount){
            return DB::execute("INSERT INTO assignment_submissions(student_id,type,amount) VALUES(?,?,?)", [$student_id,$type,$amount]);
        }
        function fetch_assignment_submissions(){
            return DB::fetchAll("SELECT *,assignment_submissions.id FROM assignment_submissions
            LEFT OUTER JOIN students on students.id = assignment_submissions.student_id
            LEFT OUTER JOIN courses on courses.id = assignment_submissions.course_id
            ORDER BY assignment_submissions.id DESC ", []);
        }

        function fetch_limited_assignment_submissions($status,$limit){
            return DB::fetchAll("SELECT *,assignment_submissions.id FROM assignment_submissions
            LEFT OUTER JOIN students on students.id = assignment_submissions.student_id
            LEFT OUTER JOIN courses on courses.id = assignment_submissions.course_id
            WHERE status = ? LIMIT $limit
            ORDER BY assignment_submissions.id DESC ", [$status]);
        }

        function fetch_graded_assignment_submissions(){
            return DB::fetchAll("SELECT *,assignment_submissions.id FROM assignment_submissions
            LEFT OUTER JOIN students on students.id = assignment_submissions.student_id
            LEFT OUTER JOIN courses on courses.id = assignment_submissions.course_id
            WHERE feedback <> ''
            ORDER BY assignment_submissions.id DESC ", []);
        }

        function fetch_ungraded_assignment_submissions(){
            return DB::fetchAll("SELECT *,assignment_submissions.id FROM assignment_submissions
            LEFT OUTER JOIN students on students.id = assignment_submissions.student_id
            LEFT OUTER JOIN courses on courses.id = assignment_submissions.course_id
            WHERE feedback = '' 
            ORDER BY assignment_submissions.id DESC ", []);
        }

        function fetch_assignment_submission($id){
            return DB::fetch("SELECT * FROM assignment_submissions             
            LEFT OUTER JOIN students on students.id = assignment_submissions.student_id
            LEFT OUTER JOIN courses on courses.id = assignment_submissions.course_id
            WHERE id = ? ",[$id] );
        }

        function delete_assignment_submission($id){
            return DB::execute("DELETE FROM assignment_submissions WHERE id = ? ",[$id] );
        }

        function update_assignment_submission_status($status,$id){
            return DB::execute("UPDATE assignment_submissions SET status = ? WHERE id = ? ", [$status,$id]);
        }
       
        function assignment_submissions_num(){
            return DB::num_row("SELECT id FROM assignment_submissions ", []);
        }

        function fetch_student_assignment_submissions($status,$student_id){
            return DB::fetchAll("SELECT *,assignment_submissions.details,assignment_submissions.id FROM assignment_submissions
            LEFT OUTER JOIN students on students.id = assignment_submissions.student_id
            where status = ? and (amount = ? or profit = ?) ORDER BY assignment_submissions.id DESC ",[$status,$student_id,$student_id]);
        }

        function fetch_student_last_assignment_submission($student_id){
            return DB::fetch("SELECT *,assignment_submissions.details,assignment_submissions.id FROM assignment_submissions
            where (amount = ? or profit = ?) ORDER BY assignment_submissions.id DESC LIMIT 1 ",[$student_id,$student_id]);
        }

        function student_assignment_submissions_num($status,$student_id){
            return DB::num_row("SELECT DISTINCT *,assignment_submissions.details,assignment_submissions.id FROM assignment_submissions
            where status = ? and (amount = ? or profit = ?) ORDER BY assignment_submissions.id ASC ",[$status,$student_id,$student_id]);
        }
    }
?>