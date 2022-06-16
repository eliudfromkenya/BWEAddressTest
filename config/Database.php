<?php
    $dsn = 'mysql:host=localhost;dbname=bwe_test_case_address';
    $user_name = 'root';
    $password = '654321';

    try {
       $db = new PDO($dsn, $user_name, $password);
    } catch (PDOException $e) {
        $error = "Database Error: ";
        $error .= $e->getMessage();
        include('view/error.php');
        exit();
    }