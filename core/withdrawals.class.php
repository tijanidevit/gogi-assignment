<?php
    include_once 'db.class.php';

    class withdrawals extends DB{

        function add_withdrawal($customer_id,$type,$amount){
            return DB::execute("INSERT INTO withdrawals(customer_id,type,amount) VALUES(?,?,?)", [$customer_id,$type,$amount]);
        }
        function fetch_withdrawals(){
            return DB::fetchAll("SELECT *,withdrawals.id FROM withdrawals
            LEFT OUTER JOIN customers on customers.id = withdrawals.customer_id
            ORDER BY withdrawals.id DESC ", []);
        }

        function fetch_limited_withdrawals($status,$limit){
            return DB::fetchAll("SELECT *,withdrawals.id FROM withdrawals
            LEFT OUTER JOIN customers on customers.id = withdrawals.customer_id
            WHERE status = ? LIMIT $limit
            ORDER BY withdrawals.id DESC ", [$status]);
        }

        function fetch_withdrawal($id){
            return DB::fetch("SELECT * FROM withdrawals WHERE id = ? ",[$id] );
        }
        function delete_withdrawal($id){
            return DB::execute("DELETE FROM withdrawals WHERE id = ? ",[$id] );
        }

        function update_withdrawal_status($status,$id){
            return DB::execute("UPDATE withdrawals SET status = ? WHERE id = ? ", [$status,$id]);
        }
       
        function withdrawals_num(){
            return DB::num_row("SELECT id FROM withdrawals ", []);
        }

        function fetch_customer_withdrawals($status,$customer_id){
            return DB::fetchAll("SELECT *,withdrawals.details,withdrawals.id FROM withdrawals
            LEFT OUTER JOIN customers on customers.id = withdrawals.customer_id
            where status = ? and (amount = ? or profit = ?) ORDER BY withdrawals.id DESC ",[$status,$customer_id,$customer_id]);
        }

        function fetch_customer_last_withdrawal($customer_id){
            return DB::fetch("SELECT *,withdrawals.details,withdrawals.id FROM withdrawals
            where (amount = ? or profit = ?) ORDER BY withdrawals.id DESC LIMIT 1 ",[$customer_id,$customer_id]);
        }

        function customer_withdrawals_num($status,$customer_id){
            return DB::num_row("SELECT DISTINCT *,withdrawals.details,withdrawals.id FROM withdrawals
            where status = ? and (amount = ? or profit = ?) ORDER BY withdrawals.id ASC ",[$status,$customer_id,$customer_id]);
        }
    }
?>