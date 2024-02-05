<?php 

include '../core/functions.php';
include '../core/validation.php';
session_start();
$errors=[];
 if (checkRequestMethod('POST') && checkPostInput ('name')) {
    
    foreach ( $_POST as $key => $value ) :
         $$key = sanitizeInput ($value);
        
       endforeach;

    if ( !emptyVal($name) ) {
        $errors [] ="Name Is Required";
    } elseif (!minVal($input,3)) {
        $errors [] ="Name Must Be Greater Than 3";
    }elseif (!maxVal($name,30)) {
        $errors [] ="Name Must Be Smaller Than 30";
    }

    if (empty($errors)) {
        echo "Complated";
    } else {
        $_SESSION['errors']= $errors;
        header('location:../register.php');
        die;
    }
    }else {
     echo "Method Not Support";
 }

?>