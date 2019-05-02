<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>

<body>

    <ul>
        <a href="updateImage.php">Update Images</a>
   
    </ul>






<?php
//error_reporting(0);

session_start();
if($_SESSION['num']== 1)
{
    echo "";
    //header('location: insert_images.php');
} 
else{
   
    header('location: login.php');

}
    

?>

<html>

<body>
    <form action="" method="post" enctype="multipart/form-data">
        <input type="file" name="uploadfile" value="">

        <p><textarea name="imgdesc" cols="60" rows="10" required="required" placeholder="Desciption">
            </textarea></p><br>
        <input type="submit" name="submit" value="Upload File">
        <a href="logout.php">Log out</a>

    </form>
</body>

</html>

<?php

$conn = mysqli_connect('localhost','root', '');
mysqli_select_db($conn ,'AdminLogin');
if(isset($_POST['submit']))
{
    //echo '<pre>';
    //print_R($_FILES);die;
    $imgdesc = $_POST['imgdesc'];
    $file_name = $_FILES["uploadfile"]["name"];
    $temp_name = $_FILES["uploadfile"]["tmp_name"];
    $folder = "images/" .$file_name;
    $file_name1 = explode("." , $file_name);
    $ext = $file_name1[1];
    $allowed = array("JPG","JPEG","jpg","jpeg","png","gif");
   if(in_array($ext,$allowed))
   {
    move_uploaded_file($temp_name,$folder);
    /*echo $file_name;
    echo $imgdesc;
*/
    
    if($file_name != "" && $imgdesc != "")
    {
        
        $query = "INSERT INTO `images_table`(`imgsource`, `imgdesc`) VALUES ('$folder' , '$imgdesc') ";
        $data = mysqli_query($conn,$query);
        
        
    if($data)
        {
        echo "data inserted into database";
        }
    
    else
    {
    //echo $data['imgdesc'];
    echo "all fields are required";
    }

    
    }

   }
    else
    {
     echo "Choose the correct file";
    }
} 
    
?>
    </body>
</html>