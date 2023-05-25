<?php
require_once("Database.php");

$db = new Database("localhost", "root", "", "web");

if(isset($_POST['edit'])){

    $data = [
        'id' => $_POST["id"],
        'meno' => $_POST["meno"],
        'platform' => $_POST["platform"],
        'image' => $_POST["image"],
        'rating' => $_POST["rating"],
        'downloads' => $_POST["downloads"],
    ];

    foreach($data as $key => $value) {
        try {
            if(!empty($value) && $key != "id") {
                $sql = "UPDATE popular SET $key = '$value' WHERE id = $data[id]";
                $yea = $db->conn->query($sql);
                if ($yea) {
                    echo $key." editované úspešne";
                    echo "<br>";
                } else {
                    echo "Ups: " . $db->conn->error;
                }
            }  
        } catch(Exception $e) {
            echo "Error: " . $e->getMessage();
        }
        
    }
    header("refresh:2;URL=../delete.php");

}

$db->closeConn();
?>