<?php
session_start();

include_once $_SERVER["DOCUMENT_ROOT"]."//db//users.inc.php";
include_once $_SERVER["DOCUMENT_ROOT"]."//tools//cors.php";

// Cross origin resource sharing
cors();

// fields that should be there in the form
$fields=array(
    "username",
    "password"
);

// Form to be inserted into the database
$form=array();

// Check whether fields are there in the from submitted by user
for ($i=0; $i < sizeof($fields); $i++) { 
    $fieldname=($fields)[$i];

    if(!array_key_exists($fieldname,$_POST) || !isset($_POST[$fieldname]) || strlen($_POST[$fieldname])<=0){
        // Show form error message
        $_SESSION["msg"]=array(
            "title"=>"Form error",
            "body"=>"One of the field is empty,try again."
        );

        // Send user to login page
        header("Location:/auth?next=/#login");

        exit();
        // Break the loop
        break;
    }else{
        $form[$fieldname]=$_POST[$fieldname];
    }
}

// Authenticate
$user=authenticate($form);

if($user!=null){
    $_SESSION["user"]=$user;

    $_SESSION["msg"]=array(
        "title"=>"Login",
        "body"=>"Logged successfully as ".$user["username"]." !"
    );

    if(array_key_exists("next",$_GET)){
        header("Location:".$_GET["next"]);
    }else{
        header("Location:/");
    }
}else{
    $_SESSION["msg"]=array(
        "title"=>"Form error",
        "body"=>"Invalid credentials!"
    );
    header("Location:".$_SERVER["HTTP_REFERER"]);
}
?>