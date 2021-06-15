<?php
include_once $_SERVER["DOCUMENT_ROOT"]."//tools//cors.php";

// Cross origin resource sharing
cors();

// Include user.inc.php which handles user related operations
include_once $_SERVER["DOCUMENT_ROOT"]."//db//users.inc.php";

// Start session
session_start();

// Fields that should be in the form
$fields=array("username","password");

// Check if the fields are present in the request
for ($i=0; $i < sizeof($fields); $i++) { 
    $fieldname=$fields[$i];
    
    // If the field doesnot exist{
        // Show error message
        // Send user to signup page
    // }
    if(!array_key_exists($fieldname,$_POST) || !isset($_POST[$fieldname]) || strlen($_POST[$fieldname])<=0){
        // Show form error message
        $_SESSION["msg"]=array(
            "title"=>"Form error",
            "body"=>"One of the field is empty,try again."
        );

        // Send user to signup page
        header("Location:/auth?next=/#signup");

        exit();
        // Break the loop
        break;
    }
}

// Check whether user with same username exists
$unameValid=CheckUsername($_POST["username"]);

if(!$unameValid){
    // Show username exists message and send user to signup page
    $_SESSION["msg"]=array(
        "title"=>"Form error",
        "body"=>"User with same username exists."
    );

    // Send user to signup page
    header("Location:/auth?next=/#signup");

    exit();
}

// User add form
$form=array();

for($i=0;$i<sizeof($fields);$i++){
    $field=$fields[$i];
    $form[$field]=htmlspecialchars($_POST[$field]);
}

// Run signup method defined in users.inc.php
// and get result
$user=Signup($form);

// Show success message
$_SESSION["msg"]=array(
    "title"=>"Signup success",
    "body"=>"Account created successfully and loggedin."
);

// Login
$_SESSION["user"]=$user;

// Redirect
if(array_key_exists("next",$_GET)){
    header("Location:".$_GET["next"]);
}else{
    header("Location:/");
}
?>