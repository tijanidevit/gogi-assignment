<?php
    include_once 'db.class.php';

    class assignment_submissions extends DB{

        function add_assignment_submission($customer_id,$type,$amount){
            return DB::execute("INSERT INTO assignment_submissions(customer_id,type,amount) VALUES(?,?,?)", [$customer_id,$type,$amount]);
        }
        function fetch_assignment_submissions(){
            return DB::fetchAll("SELECT *,assignment_submissions.id FROM assignment_submissions
            LEFT OUTER JOIN customers on customers.id = assignment_submissions.customer_id
            ORDER BY assignment_submissions.id DESC ", []);
        }

        function fetch_limited_assignment_submissions($status,$limit){
            return DB::fetchAll("SELECT *,assignment_submissions.id FROM assignment_submissions
            LEFT OUTER JOIN customers on customers.id = assignment_submissions.customer_id
            WHERE status = ? LIMIT $limit
            ORDER BY assignment_submissions.id DESC ", [$status]);
        }

        function fetch_assignment_submission($id){
            return DB::fetch("SELECT * FROM assignment_submissions WHERE id = ? ",[$id] );
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

        function fetch_customer_assignment_submissions($status,$customer_id){
            return DB::fetchAll("SELECT *,assignment_submissions.details,assignment_submissions.id FROM assignment_submissions
            LEFT OUTER JOIN customers on customers.id = assignment_submissions.customer_id
            where status = ? and (amount = ? or profit = ?) ORDER BY assignment_submissions.id DESC ",[$status,$customer_id,$customer_id]);
        }

        function fetch_customer_last_assignment_submission($customer_id){
            return DB::fetch("SELECT *,assignment_submissions.details,assignment_submissions.id FROM assignment_submissions
            where (amount = ? or profit = ?) ORDER BY assignment_submissions.id DESC LIMIT 1 ",[$customer_id,$customer_id]);
        }

        function customer_assignment_submissions_num($status,$customer_id){
            return DB::num_row("SELECT DISTINCT *,assignment_submissions.details,assignment_submissions.id FROM assignment_submissions
            where status = ? and (amount = ? or profit = ?) ORDER BY assignment_submissions.id ASC ",[$status,$customer_id,$customer_id]);
        }
    }
?>