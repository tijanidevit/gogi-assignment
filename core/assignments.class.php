<?php
    include_once 'db.class.php';

    class assignments extends DB{

        function add_assignment($customer_id,$type,$amount){
            return DB::execute("INSERT INTO assignments(customer_id,type,amount) VALUES(?,?,?)", [$customer_id,$type,$amount]);
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

        function fetch_customer_last_assignment($customer_id){
            return DB::fetch("SELECT *,assignments.details,assignments.id FROM assignments
            where (amount = ? or profit = ?) ORDER BY assignments.id DESC LIMIT 1 ",[$customer_id,$customer_id]);
        }

        function customer_assignments_num($status,$customer_id){
            return DB::num_row("SELECT DISTINCT *,assignments.details,assignments.id FROM assignments
            where status = ? and (amount = ? or profit = ?) ORDER BY assignments.id ASC ",[$status,$customer_id,$customer_id]);
        }
    }
?>