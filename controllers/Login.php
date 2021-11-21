<?php
require_once('controllers/Controller.php');

/**
 * Login class for authentification form in controller auth().
 * For ViewIndex.
 */
class Login extends Controller {

    /**
     * Function to run sql query.
     */
    public function runQuery($sql)  {
        $stmt = self::query($sql);
        return $stmt;
    }

    /**
     * Function to get staff login by email and password.
     */
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