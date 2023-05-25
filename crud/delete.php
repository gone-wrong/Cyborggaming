<?php
require_once("Database.php");

$db = new Database("localhost", "root", "", "web");

if(isset($_POST['delete'])){
    try{
        $sql = 'DELETE FROM popular WHERE id='.$_POST['delete'];
        $oput = $db->conn->query($sql);
        if ($oput) {
            echo "Vymazané úspešne";
            header( "refresh:2;URL=../delete.php");
        } else {
            echo "Ups: " . $db->conn->error;
        }
    } catch(Exception $e) {
        echo "Error: " . $e->getMessage();
    }
    
}

$db->closeConn();


?>