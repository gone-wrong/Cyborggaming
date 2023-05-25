<!DOCTYPE html>
<html>
  <title>Edit</title>
  <head>
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">


    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/templatemo-cyborg-gaming.css">
    <link rel="stylesheet" href="assets/css/owl.css">
    <link rel="stylesheet" href="assets/css/animate.css">
    <link rel="stylesheet"href="https://unpkg.com/swiper@7/swiper-bundle.min.css"/>
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
    <style>
      html, body {
      display: flex;
      justify-content: center;
      font-family: Roboto, Arial, sans-serif;
      font-size: 15px;
      }
      form {
      text-align:center;
      }
      input[type=text], input[type=password] {
      width: 100%;
      padding: 16px 8px;
      margin: 8px 0;
      display: inline-block;
      border: 1px solid #ccc;
      box-sizing: border-box;
      }
      .icon {
      font-size: 110px;
      display: flex;
      justify-content: center;
      color: #4286f4;
      }
      button {
      background-color: #4286f4;
      color: white;
      padding: 14px 0;
      margin: 10px 0;
      border: none;
      cursor: grab;
      width: 48%;
      }
      h1 {
      text-align:center;
      fone-size:18;
      }
      button:hover {
      opacity: 0.8;
      }
      .formcontainer {
      text-align: center;
      margin: 24px 50px 12px;
      }
      .container {
      padding: 16px 0;
      text-align:left;
      }
      span.psw {
      float: right;
      padding-top: 0;
      padding-right: 15px;
      }
      /* Change styles for span on extra small screens */
      @media screen and (max-width: 300px) {
      span.psw {
      display: block;
      float: none;
      }
    </style>
  </head>
  <body>
  <div class="most-popular">
    <div class="row">
        <div class="col-lg-12">
        <div class="heading-section">
            <h4>Edit <a href="index.php">"Most Popular Right Now"</a></h4>
        </div>
        <div class="row">
        <?php
            $servername = "localhost";
            $username = "root";
            $password = "";
            $database = "web";
            
            require 'crud/Database.php';
            
            $db = new Database($servername, $username, $password, $database);
            
            //echo "weee databaza";
            
            $result = $db->get_popular();
            
            if ($result->num_rows > 0) {
                $temp = 4;
                while ($row = $result->fetch_assoc()) {

                    if($temp == 0) {
                    echo '</div>';
                    echo '<div class="row">';
                    $temp = 4;
                    }

                    //echo "ID: " . $row["id"]. " - meno: " . $row["meno"]. " - image: " . $row["image"]. " - rating: " . $row["rating"]. " - downloads: " . $row["downloads"];
                    echo '<div class="col-lg-3 col-sm-6">';
                    echo '<div class="item">';
                    echo '<img src="'.$row["image"].'" alt="">';
                    echo '<h4>'.$row["meno"].'<br><span>'.$row["platform"].'</span></h4>';
                    echo '<ul>';
                    echo '<li><i class="fa fa-star"></i> '.$row["rating"].'</li>';
                    echo '<li><i class="fa fa-download"></i> '.$row["downloads"].'</li>';
                    echo '</ul>';
                    echo '<br>';

                    echo    '<form action=crud/delete.php method="post">
                                <button type="submit" name="delete" value="'.$row["id"].'">Vymazať</button>
                            </form>';
                    echo    '<form action=edit.php method="post">
                            <button type="submit" name="id" value="'.$row["id"].'">Editovať</button>
                            </form>';
                    echo '</div>';
                    echo '</div>';
                    $temp--;
                }
            } else {
                echo "prazdna db";
            }
            
            $db->closeConn();
            
            
        ?>
        </div>
        </div>  
    </div>
    </div>
  </body>
</html>