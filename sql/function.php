<?php
    include('../database.php');

    function createUser($name, $email, $password) {
        global $connDB;
        $query = "CALL createUser('$name','$email','$password')";
        $result = mysqli_query($connDB, $query);
        if($result) {
            $sqlResult = mysqli_fetch_array($result);
            return $sqlResult[0][0];
        } else {
            return mysqli_error($connDB);
        }
    }
?>