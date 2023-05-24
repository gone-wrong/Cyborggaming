<?php
require_once("Database.php");

$db = new Database("localhost", "root", "", "web");

if(isset($_POST['insert'])){
   
    $data = [
        'meno' => $_POST["meno"],
        'platform' => $_POST["platform"],
        'image' => $_POST["image"],
        'rating' => $_POST["rating"],
        'downloads' => $_POST["downloads"],
    ];
    
    if(empty($data["meno"])|| empty($data["platform"]) || empty($data["image"]) || empty($data["rating"]) || empty($data["downloads"])){
        echo 'Všetky polia musia byť vyplnené';
    }else{
        $sql = "INSERT INTO popular (meno, platform, image, rating, downloads) VALUES ('{$data["meno"]}', '{$data["platform"]}', '{$data["image"]}', '{$data["rating"]}', '{$data["downloads"]}')";
        $result = $db->conn->query($sql);
        header( "refresh:2;URL=../index.php");
        
        if ($result) {
            echo "úspešne vložené";
        } else {
            echo "niečo je zle :/ " . $db->conn->error;
        }
    }
}

$db->closeConn();


?>