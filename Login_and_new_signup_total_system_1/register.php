<?php 


    
include_once("db_connect.php");




    
    if(isset($_POST['submit'])){ 

        $user_name = $_POST['user_name'];
        $user_email = $_POST['user_email'];
        $user_password = $_POST['user_password'];
        $user_role = $_POST['user_role'];

        //$new_user_password = md5($user_password);

      


        if($_SERVER["REQUEST_METHOD"] == "POST"){

            //check all input fields are filled
           if(empty($_POST['user_name']) || empty($_POST['user_email']) || empty($_POST['user_password'])){

                echo("<span class='echo'>Please fill all fields!</span>");
            }

                        

               else{
                   
                    //Query for checking existing users
                    $sql2 = "SELECT * FROM user_details WHERE user_name = '$user_name' ";
                    $result2 = mysqli_query($connect,$sql2);
                    $nor2 = mysqli_num_rows($result2);
                    
                    $sql3 = "SELECT * FROM user_details WHERE user_email = '$user_email' ";
                    $result3 = mysqli_query($connect,$sql3);
                    $nor3 = mysqli_num_rows($result3);
                   
                    $sql4 = "SELECT * FROM user_details WHERE  user_password = '$user_password' ";
                    $result4 = mysqli_query($connect,$sql4);
                    $nor4 = mysqli_num_rows($result4);
                   
                //checks for duplicates
                  if($nor2 > 0){
                              echo($user_name.''.' exists<br>');
                                          }
                  if($nor3 > 0){
                              echo($user_email.''.' exists<br>');
                                          }
                  if($nor4 > 0){
                              echo($user_password.''.' exists<br>');
                                          }

                 elseif($nor2 == 0 && $nor3 == 0 && $nor4 == 0){

                                    $sql = "INSERT INTO user_details (user_name,user_email,user_password,user_role)
                                    VALUES ('$user_name','$user_email','$user_password','$user_role')";
                    
                    
                    
                    
                                            if ($connect -> query($sql) == TRUE) {
                                                echo "New record has been added successfully !";
                                            } else {
                                                echo "Error";
                                            }
    
                             }

                }


    


        }

       
 }


 

  

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New registration</title>
    <link rel="stylesheet" href="style_1.css">

</head>
<body>

    <p><a href="home.php">Home</a></p>

    <form action="<?php echo($_SERVER['PHP_SELF'])?>" method="post" >
        <fieldset>
            <legend>Registration form</legend>
                
               <dl>
                   <dt>User name</dt>
                   <dd>
                         <input type="text" name="user_name" id="" placeholder="Enter your name">

                   </dd>

                   <dt>Email</dt>
                   <dd>
                        <input type="email" name="user_email" id="" placeholder="Enter your email">

                   </dd>

                   
                   <dt>Password</dt>
                   <dd>
                        <input type="password" name="user_password" id="" placeholder="Enter a password">

                   </dd>
                   <dt>Select your role</dt>
                   <dd>
                   <input type="radio" name="user_role" value="1" >
                   <label for="role">Admin</label>
                   <input type="radio" name="user_role" value="0" checked>
                   <label for="role">User</label>
                   </dd>
               </dl> 
               <input type="reset" value="Clear">
               <input type="submit" value="Submit" name="submit">
               <p>Existing user<a href="login.php"> Login</a></p>

        </fieldset>
    </form>
</body>
</html>