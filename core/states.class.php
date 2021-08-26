<?php
    include_once 'db.class.php';

    class States extends DB{

        function add_state($state){
            return DB::execute("INSERT INTO states(state) VALUES(?)", [$state]);
        }
        function fetch_states(){
            return DB::fetchAll("SELECT * FROM states ORDER BY state ",[]);
        }
        function fetch_limited_states($limit){
            return DB::fetchAll("SELECT * FROM states ORDER BY state LIMIT $limit ",[]);
        }
        function fetch_state($id){
            return DB::fetch("SELECT * FROM states WHERE id = ? ",[$id] );
        }
        function delete_state($id){
            return DB::execute("DELETE FROM states WHERE id = ? ",[$id] );
        }
        function update_state($state,$id){
            return DB::execute("UPDATE states SET state = ?  WHERE id = ? ", [$state,$id]);
        }
       
        function states_num(){
            return DB::num_row("SELECT id FROM states ", []);
        }


        function check_state_existence($state){
            if (DB::num_row("SELECT id FROM states WHERE state = ?", [$state]) > 0){
                return true;
            }
            else{
                return false;
            }
        }

        function check_edit_state_existence($state,$id){
            if (DB::num_row("SELECT id FROM states WHERE state = ? AND id <> ? ", [$state,$id]) > 0) {
                return true;
            }
            else{
                return false;
            }
        }


        function fetch_state_products($state_id){
            return DB::fetchAll("SELECT *,products.id FROM products
            JOIN states on states.id = products.state_id
            WHERE products.state_id = ? AND  products.status = 1
            ORDER BY products.id DESC ",[$state_id]);
        }

        function fetch_paginated_state_products($sort_by, $records_per_page,$offset,$state_id){
            return DB::fetchAll("SELECT *,products.id FROM products
            JOIN states on states.id = products.state_id
            WHERE products.state_id = ? AND  products.status = 1 $sort_by
            LIMIT $records_per_page OFFSET $offset ",[$state_id]);
        }


        

        function state_contestants_num($state_id){
            return DB::num_row("SELECT contestants.id FROM contestants WHERE contestants.state_id = ?",[$state_id]);
        }



        function state_active_product_nums($state_id){
            return DB::num_row("SELECT products.id FROM products WHERE products.state_id =? AND products.status  = 1",[$state_id]);
        }
    }
?>