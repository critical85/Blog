<?php 

    $table = "users";
    $user_name_key = "username";
    $user_password_key = "password";

    $errors = array('user_name'=>'', 'password'=>'');

    $filter = "";
    $sorted_by = "";
    $order = "DESC";

    if(isset($_POST['login'])){

        // check format of inputs
        if(check_login_input()){
                        
            // create variable username
            $user_name_value = $_POST['user-name-login'];
            $filter = ["$user_name_key"=>"$user_name_value"];

            // check if username exists
            if(select_SQL($table, $filter, $sorted_by)){

                // create variable user (username, password)
                $user_password_value = $_POST['password-login'];
                $filter = ["$user_name_key"=>"$user_name_value", "$user_password_key"=>"$user_password_value"];

                // check if user match password
                if($logged_user = select_SQL($table, $filter, $sorted_by)){

                    // save user as logged
                    $_SESSION['user_id'] = $logged_user[0]['id'];
                    $_SESSION['user_username'] = $logged_user[0]['username'];
                    $_SESSION['user_access'] = $logged_user[0]['access'];

                } else{
                    $errors['password'] = "Wrong password";
                    $_SESSION['user_username'] = "";

                }
                
            } else{
                $errors['user_name'] = "Username does not exist";
                $_SESSION['user_username'] = "";

            }

        }

    }

    if(isset($_POST['log-out'])){
        session_unset();
    }


// fuctions
// ************************************************************************** //

    // checking if username and password are NOT empty
    function check_login_input(){
        global $errors;

        if(empty($_POST['user-name-login'])){
            $errors['user_name'] = "Username is empty";
        }

        if(empty($_POST['password-login'])){
            $errors['password'] = "Password is empty";
        }

        if(!array_filter($errors)){
            return TRUE;
        }
        return FALSE;
    }

?>