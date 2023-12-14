<?php 
    include_once "./database/database.php";
    if(deleteStudent($id)){
        header("Location: index.php");
    }

        

?>
