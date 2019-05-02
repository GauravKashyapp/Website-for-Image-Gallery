<html>

<head>

    <meta charset="UTF-8">
    <title>Admin Login Page</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>

    <div class="container">
        <div class="login-box">
            <div class="row">
                <div class="col-md-6">
                    <h2>Login Here</h2>
                    <form action="" method="post">
                        <div class="form-group">
                                <input type="text" name="admin" class="form-control" required placeholder="Enter Username">
                        </div>
                        <div class="form-group">
                                <input type="password" name="admin_password" class="form-control" required placeholder="Enter Password">
                        </div>
                        <input type="submit" name="button1" class="btn btn-primary" value="Log in">
                    </form>
                </div>
            </div>
        </div>
    </div>

    <?php
        session_start();

        
     

    if (isset($_POST['button1'])){
$con = mysqli_connect('localhost','root', '');
mysqli_select_db($con ,'AdminLogin');
$name= mysqli_real_escape_string($con, $_POST['admin']);
$password= mysqli_real_escape_string($con, $_POST['admin_password']);
        
     /*   $name= $_POST['admin'];
$password= $_POST['admin_password'];*/
        
/*$_SESSION['username']=mysqli_query($con, "select username from LoginTable");
$_SESSION['password']= mysqli_query($con, "select password from LoginTable");*/
$s= "select * from LoginTable where username ='$name' && password = '$password'";
$result = mysqli_query($con,$s);
$_SESSION['num'] = mysqli_num_rows($result);
        
    
/*if (!isset($_SESSION['username']))
    header("Location: insert_images.php");
        else{echo "please login to access"*/
            
            
        
if($_SESSION['num']== 1)
{
    header('location: insert_images.php');
    echo "this is insert.php";
}else{
   
    //header('location: login.php');
     echo "username or password is incorrect" ;
}
    }
?>


</body>

</html>
