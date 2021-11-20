<?php
require_once('controllers/Controller.php');

class Login extends Controller {

    public function runQuery($sql)  {
        $stmt = self::query($sql);
        return $stmt;
    }

    public function staffLogin($email, $password) {
        $query = "SELECT * FROM staff WHERE email ='$email' AND password='$password'";
        $stmt = self::query($query);
        $stmt->fetch(PDO::FETCH_OBJ);
        if($stmt > 0) {
            $_SESSION['auth']=true;
            $_SESSION['user_session']= $email;   
        }
        return true;
    }
    
}