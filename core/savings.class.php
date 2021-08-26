<?php
    include_once 'db.class.php';

    class savings extends DB{

        function add_saving($customer_id,$type,$amount,$profit){
            return DB::execute("INSERT INTO savings(customer_id,type,amount,profit) VALUES(?,?,?,?)", [$customer_id,$type,$amount,$profit]);
        }
        function fetch_savings($status){
            return DB::fetchAll("SELECT *,savings.id,savings.created_at FROM savings
            LEFT OUTER JOIN customers on customers.id = savings.customer_id
            where status = ? 
            ORDER BY savings.id DESC ",[$status]);
        }

        function fetch_limited_savings($status,$limit){
            return DB::fetchAll("SELECT *,savings.id,savings.created_at FROM savings
            LEFT OUTER JOIN customers on customers.id = savings.customer_id
            WHERE status = ?
            ORDER BY savings.id DESC LIMIT $limit", [$status]);
        }

        function fetch_saving($id){
            return DB::fetch("SELECT * FROM savings WHERE id = ? ",[$id] );
        }
        function delete_saving($id){
            return DB::execute("DELETE FROM savings WHERE id = ? ",[$id] );
        }

        function update_saving_status($status,$id){
            return DB::execute("UPDATE savings SET status = ? WHERE id = ? ", [$status,$id]);
        }
       
        function savings_num(){
            return DB::num_row("SELECT id FROM savings ", []);
        }

        function check_saving_existence($saving){
            if (DB::num_row("SELECT id FROM savings WHERE saving = ?", [$saving]) > 0){
                return true;
            }
            else{
                return false;
            }
        }


        function saving_product_nums($saving_id){
            return DB::num_row("SELECT products.id FROM products WHERE products.saving_id = ?",[$saving_id]);
        }

        function saving_active_product_nums($saving_id){
            return DB::num_row("SELECT products.id FROM products WHERE products.saving_id =? AND products.status  = 1",[$saving_id]);
        }


        function fetch_customer_savings($status,$customer_id){
            return DB::fetchAll("SELECT *,savings.details,savings.id FROM savings
            LEFT OUTER JOIN customers on customers.id = savings.customer_id
            where status = ? and (amount = ? or profit = ?) ORDER BY savings.id DESC ",[$status,$customer_id,$customer_id]);
        }

        function fetch_customer_last_saving($customer_id){
            return DB::fetch("SELECT *,savings.details,savings.id FROM savings
            where (amount = ? or profit = ?) ORDER BY savings.id DESC LIMIT 1 ",[$customer_id,$customer_id]);
        }

        function customer_savings_num($status,$customer_id){
            return DB::num_row("SELECT DISTINCT *,savings.details,savings.id FROM savings
            where status = ? and (amount = ? or profit = ?) ORDER BY savings.id ASC ",[$status,$customer_id,$customer_id]);
        }
    }
?>