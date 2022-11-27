<?php
    include('sql/function.php');

    $name = $_POST['nameReg'];
    $email = $_POST['emailReg'];
    $password = $_POST['passwordReg'];

    if(!empty($name) && !empty($email)) {
        $execution = createUser($name,$email,$password);
        if (!$execution) {
            echo json_encode(["message"=>"SUCCESS", "statusCode"=>200]);
        } else {
            echo json_encode(["message"=>"FAILED", "statusCode"=>201]);
        }
    } else {
        echo json_encode(["message"=>"FIELD REQUIRED","statusCode"=>201]);
    }
      
    

    // if (isset($_POST['formData'])) {
        // $name = $_POST['name'];
        // $email = $_POST['email'];
        // $password = $_POST['password'];

    //     $query = "INSERT INTO account_db.users VALUES(NULL,'$name','$email','$password','$name')";
    //     $sql = mysqli_query($conn,$query);
    //     if ($sql) {
    //         echo json_encode(["message"=>"SUCCESS", "statusCode"=>200]);
    //     } else {
    //         echo json_encode(["message"=>"FAILED", "statusCode"=>201]);
    //     }
    // }
?>