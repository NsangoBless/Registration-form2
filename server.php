<?php 
    session_start();
    //initializing variables
    $username="";
    $email ="";
    $errors = array() 
        
    //connect to the database
    $db=mysqli_connect('localhost','root','registration');

    //REGISTER USER
    if(isset($_POST[reg_user])){
        //recieve all input values from the form
        $username=mysqli_real_escape_string($db, $_POST['username']);
        $email=mysqli_real_escape_string($db, $_POST['email']);
        $password1=mysqli_real_escape_string($db, $_POST['password1']);
        $password2=mysqli_real_escape_string($db, $_POST['password2']);
        
        //form validation: ensure that form is correctly filled...
        //by adding (array_push) corresponding errors unto $errors array
        if(empty($username)){ array_push($errors, "Username is required");}
        if(empty($email)){ array_push($errors, "Email is required");}
        if(empty($password1)){ array_push($errors, "Password is required");}
        if($password1 != $password2){
            array_push($errors, "The password does not match")
        }
        //first check the database to make sure
        // a user does  not already exist with thesame username and/or email
        $user_check_query="SELECT * FROM users  WHERE username='$username' OR email='$email' LIMIT 1";
        $result=mysqli_query($db, $user_check_query);
        $user=mysqli_fetch_assoc($result);
        if($user){
            //if user exists
            if($user[username]==$username){

            }
            
            //finally, register user if there are no errors in the form
            if(count($errors==0)){
                $password=md5($password1);//encrypt the password before saving in the database

                $query="INSERT INTO users(username, email, password)
                            VALUES('$username', '$email', '$password')";
                mysqli_query($db, $query);
                $_SESSION['username']=$username;
                $_SESSION['success']="you are successfully logged in";
                header('location: index.php')
                
            }
        }
?>
