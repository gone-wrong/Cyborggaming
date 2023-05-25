<!DOCTYPE html>
<html>
  <title>Edit form</title>
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
            <h4>Editovanie záznamu</h4>
        </div>
        <div class="row">
        <?php
            $servername = "localhost";
            $username = "root";
            $password = "";
            $database = "web";
            
            require 'crud/Database.php';
            
            $db = new Database($servername, $username, $password, $database);
            $id = $_POST['id'];
            echo $id;

            try {   
                $id = $_POST['id'];
                $sql = "SELECT * FROM popular WHERE id = $id";
                $result = $db->conn->query($sql);
                $row = $result->fetch_assoc();
                
                echo '<div class="item">';
                echo '<img src="'.$row["image"].'" alt="">';
                echo '<h4>'.$row["meno"].'<br><span>'.$row["platform"].'</span></h4>';
                echo '<ul>';
                echo '<li><i class="fa fa-star"></i> '.$row["rating"].'</li>';
                echo '<li><i class="fa fa-download"></i> '.$row["downloads"].'</li>';
                echo '</ul>';
                echo '</div>';

            } catch(Exception $e) {
                echo "Error: " . $e->getMessage();
            }

            $db->closeConn();
        ?>

        </div>
        </div>  
    </div>
    </div>
    <form action="crud/edit.php" method="POST">
      <h1>Insert popular game</h1>
      <div class="formcontainer">
      <div class="container">
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
        <label for="meno"><strong>Meno</strong></label>
        <input type="text" placeholder="Zadaj nové meno hry" name="meno">
        <label for="platform"><strong>Platforma</strong></label>
        <input type="text" placeholder="Zadaj novú platformu" name="platform">
        <label for="image"><strong>Cesta k obrázku</strong></label>
        <input type="text" placeholder="Zadaj novú cestu k obrázku" name="image">
        <label for="rating"><strong>Hodnotenie</strong></label>
        <input type="text" placeholder="Zadaj nové hodnotenie" name="rating">
        <label for="downloads"><strong>Stiahnutia</strong></label>
        <input type="text" placeholder="Zadaj nový počet stiahnutí" name="downloads">
      </div>
      <button type="submit" name="edit"><strong>EDIT</strong></button>
    </form>
  </body>
</html>