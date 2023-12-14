<?php
    include '../crud_homework/database/database.php';
        $value =[];
        if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['name']) && isset($_POST['age']) && isset($_POST['email']) && isset($_POST['image_url'])){
            $value['name'] = $_POST['name'];
            $value['age'] = $_POST['age'];
            $value['email'] = $_POST['email'];
            $value['image_url'] = $_POST['image_url'];
            createStudent($value);
            header("Location: index.php");
        }
        
?>