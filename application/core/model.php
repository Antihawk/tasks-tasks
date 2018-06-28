<?php

class Model
{    
	public function login_data($username, $password){
                
        include_once "application/config/config.php";
        $GLOBALS['error'] = "empty_error";
        
        if (empty($username) || empty($password)) {
            $error = "Username or Password is invalid";
        }
        else{
            $username = stripslashes($username);
            $password = stripslashes($password);
            $username = mysqli_real_escape_string($connection, $username);
            $password = mysqli_real_escape_string($connection, $password);
            
            $query_login = mysqli_query($connection, "SELECT * FROM `users` WHERE password='$password' AND login='$username' AND group_name='admin'");
            
            $rows_login = mysqli_num_rows($query_login);
            if ($rows_login == 1){
                $_SESSION['user_name'] = $username;
                $GLOBALS['error'] = "empty_error";
            }
            else {
                $GLOBALS['error'] = "Имя пользователя или пароль указаны неверно!";
            }
            mysqli_close($connection);
        }
    }
    
    public function login_exit(){
        if (isset($_SESSION['user_name'])){
            session_unset();
            session_destroy();
        }
    }
        
	public function get_data()
	{
		// todo
	}
}

?>