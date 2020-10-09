<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {font-family: Arial, Helvetica, sans-serif;}
        p{
            background-color: #afa;
            padding : 10px;
            line-height: 35px;
            margin : 0px;
        }
        h2{
            text-align : center;
            background-color: lightskyblue;
            margin : 0px;
            padding : 10px;
        }
        #wrong{
            color:red;
        }
    </style>
</head>
<body>
    <?php
    //for validation
    $users = ["mostafa","khaldoun","samar","..."];
    $pass = ["mostafa" => 123, "khaldoun" =>12, "samar"=> 88];

    // Check if the sign up form is submitted
     if ( isset( $_POST['signUpSubmit'] ) ) { 

         // retrieve the form data by using the element's name attributes value as key 
        $fullName = $_POST['fullName']; 
        $userName = $_POST['userName']; 
        $password = $_POST['psw'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $birthDay = $_POST['birthDay'];
        $SSNumber = $_POST['SSNumber'];

        //validation if user name is token
        foreach ($users as $user ){
            if(strcasecmp($userName,$user)== 0){
                echo"<p id ='wrong'> user name  token </p>";
                die(""); 
            }
        }

        // display the results
        echo "<h2> Sign up data </h2>"
            ."<p>"
            ."Your name is <b> $fullName </b><br>"
            ."Your user name is <b> $userName </b> <br>"
            ."Your password is <b>$password </b><br>" 
            ."Your email is <b>$email </b><br>" 
            ."Your phone is <b>$phone </b><br>" 
            ."Your birth day is <b>$birthDay </b><br>" 
            ."Your social security number is <b>$birthDay </b><br>"
            ."</p>" ;
    }

    // Check if the log in form is submitted
    elseif( isset($_POST['logInSubmit'])){

        // retrieve the form data by using the element's name attributes value as key 
        $uname = $_POST['uname'];
        $psw = $_POST['psw'];
        
        //validation
        $foundUser = false;
        $foundPas = false;
        foreach ($users as $user) {
            //equal method with ignore case sensitive
            if (strcasecmp($uname,$user)== 0) {
                $foundUser =true;//user found

                //check user's password
                if ($pass[$user]== $psw) {
                    $foundPas = true;//pass found
                }
                else{
                    echo"<p id ='wrong'> password wrong </p>";
                     die("");
                    
                }

                //found the result and didnt found any user
                 break;
            }
        }
        //we didnt find any user
        if ($foundUser == false) {
            echo"<p id ='wrong'> we didnt find any user </p>";
            die("");
        }
        // display the results the ser is exisit with correct pss
        echo "<h2> Log in data </h2>"
            ."<p>"
            ."Your user name is <b> $uname </b> <br>"
            ."Your password is <b>$psw </b><br>" 
            ."</p>" ;
        


    }
?> 

</body>
</html>
