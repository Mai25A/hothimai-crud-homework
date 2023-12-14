<?php
/**
 * Connect to database
 */
function db() {
    $host     = 'localhost'; // Because MySQL is running on the same computer as the web server
    $database = 'web_a'; // Name of the database you use (you need first to CREATE DATABASE in MySQL)
    $username    = 'root'; // Default username to connect to MySQL is root
    $password = ''; // Default password to connect to MySQL is empty
    try{
        $conn = new PDO("mysql:host=$host;dbname=$database",$username,$password);
        //setAttribute
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conn;
    }catch(PDOException $e){
      echo "connect fail".$e->getMessage();
    }
    
}
/**
 * Create new student record
 */
function createStudent($value) {
    $conn = db();
    $sql = ("INSERT INTO `student` (`name`,`age`,`email`,`profile`) value (?,?,?,?);");
    $result = $conn->prepare($sql); // chuan bij cau truy vấn
    $result->bindParam(1, $value['name']); //gán 1 tham số bằng 1 biến, nhét biến vào trong dòng $sql
    $result->bindParam(2, $value['age']);
    $result->bindParam(3, $value['email']);
    $result->bindParam(4, $value['image_url']);
    $result->execute();
    

}

/**
 * Get all data from table student
 */
function selectAllStudents() {
    $conn = db();
    $sql = "SELECT * FROM `student`;";
  $result = $conn->query($sql);
  $students = $result->fetchAll(PDO::FETCH_ASSOC); // lấy dữ liệu ra, fetcjAll sẽ trả về một mảng chứa tất cả các hàng trong bảng của kết quả trả về
  return $students;

}

/**
 * Get only one on record by id 
 */
function selectOnestudent($id) {
  $conn = db();
  $sql = "SELECT * FROM `student` WHERE `id` = $id;";
  $result = $conn->query($sql);
  $students = $result->fetchAll(PDO::FETCH_ASSOC); // lấy dữ liệu ra, fetcjAll sẽ trả về một mảng chứa tất cả các hàng trong bảng của kết quả trả về
  return $students;

}

/**
 * Delete student by id
 */
function deleteStudent($id) {
  $conn = db();
  $sql = "DELETE FROM `student` WHERE `id` = :id;";
  $result = $conn->prepare($sql);
  $result ->bindParam(':id',$id);
  $dt = $result->execute();
  return $dt;
}


/**
 * Update students
 * 
 */
function updateStudent($value, $id) {
  $conn = db();
  
    $sql = "UPDATE `student` SET `name`=:name, `age`=:age, `email`=:email,`profile`=:image_url WHERE `id` = :id;";
    //var_dump($dt);
    $dt = $conn->prepare($sql);
      $dt->bindParam(':id',$id);
      $dt->bindParam(':name',$value['name']);
      $dt->bindParam(':age',$value['age']);
      $dt->bindParam(':email',$value['email']);
      $dt->bindParam(':image_url',$value['image_url']);
      $result = $dt->execute();
      return $result;
  
  // $sql = "UPDATE `student` SET your_column = '$newValue' WHERE id = '$id';";
}
