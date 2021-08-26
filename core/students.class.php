<?php
    include_once 'db.class.php';

    class Students extends DB{

        function register($matric_no,$fullname,$image,$email,$phone,$password){
            return DB::execute("INSERT INTO students(matric_no,fullname,image,email,phone,password) VALUES VALUES(?,?,?,?,?,?)", [$matric_no,$fullname,$image,$email,$phone,$password]);
        }
        
        function fetch_students(){
            return DB::fetchAll("SELECT * FROM students ORDER BY name ASC",[]);
        }
        function fetch_student($email){
            return DB::fetch("SELECT * FROM students WHERE email = ? OR id = ?",[$email,$email] );
        }
        function fetch_student_rating($id){
            return DB::fetch("SELECT student_rating FROM students WHERE id = ? ",[$id] );
        }
        function update_student($country,$phone,$btc_wallet,$ltc_wallet,$eth_wallet,$id){
            return DB::execute("UPDATE students SET country =?,phone =?, btc_wallet =?, ltc_wallet =?, eth_wallet =? WHERE id = ? ", [$country,$phone,$btc_wallet,$ltc_wallet,$eth_wallet,$id]);
        }
        function update_password($password,$id){
            return DB::execute("UPDATE students SET password =? WHERE id = ? ", [$password,$id]);
        }
        function update_balance($balance,$id){
            return DB::execute("UPDATE students SET balance =? WHERE id = ? ", [$balance,$id]);
        }
        function students_num(){
            return DB::num_row("SELECT id FROM students ", []);
        }

        function check_email_existence($email){
            return DB::num_row("SELECT id FROM students WHERE email = ? ", [$email]);
        }

        function login($email,$password){
            if (DB::num_row("SELECT id FROM students WHERE email = ?  AND password = ? ", [$email,$password]) > 0) {
                return true;
            }
            else{
                return false;
            }
        }

        ###### student's Transactions
        function create_student_account($student_id,$wallet_address){
            return DB::fetchAll("SELECT *,savings.id FROM savings
            JOIN students on students.id = savings.student_id
            WHERE savings.student_id = ? AND status = ?
            ORDER BY savings.id DESC ",[$student_id,$status]);
        }


        function fetch_student_savings($student_id,$status){
            return DB::fetchAll("SELECT *,savings.id FROM savings
            JOIN students on students.id = savings.student_id
            WHERE savings.student_id = ? AND status = ?
            ORDER BY savings.id DESC ",[$student_id,$status]);
        }


        function fetch_student_savings($student_id,$status){
            return DB::fetchAll("SELECT *,savings.id FROM savings
            JOIN students on students.id = savings.student_id
            WHERE savings.student_id = ? AND status = ?
            ORDER BY savings.id DESC ",[$student_id,$status]);
        }

        function fetch_student_savings_sum($student_id){
            return DB::fetch("SELECT sum(amount) AS total_amount,sum(profit) AS total_profit FROM savings
            WHERE savings.student_id = ?
            ORDER BY savings.id DESC ",[$student_id]);
        }

        function fetch_limited_student_savings($student_id,$limit){
            return DB::fetchAll("SELECT *,savings.id FROM savings
            JOIN students on students.id = savings.student_id
            WHERE savings.student_id = ?
            ORDER BY savings.id DESC LIMIT $limit",[$student_id]);
        }

        function student_status_savings_num($student_id,$status){
            return DB::num_row("SELECT savings.id FROM savings WHERE savings.student_id = ? AND status = ? ",[$student_id,$status]);
        }

        function student_savings_num($student_id){
            return DB::num_row("SELECT savings.id FROM savings WHERE savings.student_id = ? ",[$student_id]);
        }

        function fetch_student_withdrawals($student_id){
            return DB::fetchAll("SELECT *,withdrawals.id FROM withdrawals
            JOIN students on students.id = withdrawals.student_id
            WHERE withdrawals.student_id = ?
            ORDER BY withdrawals.id DESC ",[$student_id]);
        }

        function fetch_limited_student_withdrawals($student_id,$limit){
            return DB::fetchAll("SELECT *,withdrawals.id FROM withdrawals
            JOIN students on students.id = withdrawals.student_id
            WHERE withdrawals.student_id = ?
            ORDER BY withdrawals.id DESC LIMIT $limit ",[$student_id]);
        }

        function student_withdrawals_num($student_id){
            return DB::num_row("SELECT withdrawals.id FROM withdrawals WHERE withdrawals.student_id = ? ",[$student_id]);
        }
    }
?>