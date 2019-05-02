<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

       
       <style>
        div.gallery {
            border: 1px solid #ccc;
        }

        div.gallery:hover {
            border: 1px solid #777;
        }

        div.gallery img {
            width: 100%;
            height: auto;
        }

        div.desc {
            padding: 15px;
            text-align: center;
        }

        * {
            box-sizing: border-box;
        }

        .responsive {
            padding: 0 6px;
            float: left;
            width: 24.99999%;
        }

        @media only screen and (max-width: 700px) {
            .responsive {
                width: 49.99999%;
                margin: 6px 0;
            }
        }

        @media only screen and (max-width: 500px) {
            .responsive {
                width: 100%;
            }
        }

        .clearfix:after {
            content: "";
            display: table;
            clear: both;
        }

    </style>
    <style>
        ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
        }

        li {
            display: inline;
        }

    </style>
</head>

<body>

    <h2>Responsive Image Gallery</h2>
    <?php
$conn = mysqli_connect('localhost','root', '');
mysqli_select_db($conn ,'AdminLogin');
    $res = mysqli_query($conn , "SELECT * FROM images_table")
        ?>
    <?php 
 while($row = mysqli_fetch_array($res))
        {

    #echo "<table>";
     #echo"<tr>";
        ?>
    <div class="responsive">
        <div class="gallery">
                <a href= "update.php?imgId=<?php echo $row['id']?>"><img src="<?php echo $row['imgsource']  ?>" alt="Cinque Terre">
                </a>
                <div class="desc"> <?php  echo $row['imgdesc'] ?> </div>
        </div>

    </div>
    <?php } 
       /* $_SESSION['imgid'] = $_GET["imgId"];*/
     ?>

    <!--<div class="responsive">
  <div class="gallery">
    <a target="_blank" href="img_forest.jpg">
      <img src="img_forest.jpg" alt="Forest" width="600" height="400">
    </a>
    <div class="desc">Add a description of the image here</div>
  </div>
</div>

<div class="responsive">
  <div class="gallery">
    <a target="_blank" href="img_lights.jpg">
      <img src="img_lights.jpg" alt="Northern Lights" width="600" height="400">
    </a>
    <div class="desc">Add a description of the image here</div>
  </div>
</div>

<div class="responsive">
  <div class="gallery">
    <a target="_blank" href="img_mountains.jpg">
      <img src="img_mountains.jpg" alt="Mountains" width="600" height="400">
    </a>
    <div class="desc">Add a description of the image here</div>
  </div>
</div>-->

    <div class="clearfix"></div>



</body>

</html>
