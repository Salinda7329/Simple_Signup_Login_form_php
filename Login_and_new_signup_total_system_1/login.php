
<?php 

//include process.php page
include("db_connect.php");

if(isset($_POST['btn_submit'])){

    $user_name = $_POST['user_name'];
    $user_password = $_POST['user_password'];

        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            //Check for matching records from database
            $sql = "SELECT * FROM user_details WHERE user_name = '$user_name' && user_password = '$user_password'";
            $result = mysqli_query($connect,$sql);
            $nor = mysqli_num_rows($result);

                if($nor > 0){

                    echo("Done");
                    $row =mysqli_fetch_assoc($result);

                      if($row['user_role'] == 1){
                        header('location:admin.php');
                      }
                      elseif($row['user_role'] == 0){
                        header('location:user.php');
                      }
                }
            else{

                echo("ERROR!");
            }

        }
 
}

?>

<html lang="en">
<head>
    <title>Document</title>
    <link rel="stylesheet" href="style_1.css">
</head>
<body>
    
    <p><a href="home.php">Home</a></p>

    <form action="<?php echo($_SERVER['PHP_SELF']) ?>" method="post" >
        <fieldset>
            <legend>Enter details for login</legend>
            <label for="">User name</label>
            <input type="text" name="user_name" >
            <label for="">Password</label>
            <input type="text" name="user_password" >
            <input type="submit" name="btn_submit">
            <input type="reset" value="Clear">
        </fieldset>
    </form>
</body>
</html>
