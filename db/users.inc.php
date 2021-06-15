<?php
include_once $_SERVER["DOCUMENT_ROOT"]."//db//connection.inc.php";

// Method to check whether the username exists
function CheckUsername($uname){
    $db=Db();

    // Our database query
    $query=mysqli_query($db,"SELECT * FROM `users` WHERE `username`='$uname' LIMIT 1");

    // User matching the username
    $user=mysqli_fetch_assoc($query);

    return $user==null;
}

// Method to signup
function Signup($form){
    $fieldString="";
    $valueString="";

    for($i=0;$i<sizeof(array_keys($form));$i++) {
        $field=array_keys($form)[$i];
        $value=$form[$field];

        $fieldString.="`$field`";
        if($field!="password"){
            $valueString.="'$value'";
        }else{
            $hash=password_hash($value,PASSWORD_DEFAULT);
            $valueString.="'$hash'";
        }

        if($i!=(sizeof(array_keys($form))-1)){
            $fieldString.=",";
            $valueString.=",";
        }
    }

    // Initialize our database
    $db=Db();

    // Insert into our database
    mysqli_query($db,"INSERT INTO `users`($fieldString) VALUES($valueString)");

    // The users id
    $userId=mysqli_insert_id($db);

    return mysqli_fetch_assoc(mysqli_query($db,"SELECT * FROM `users` WHERE `id`=$userId LIMIT 1"));
}

function authenticate($form){
    $username=$form["username"];
    $password=$form["password"];

    $db=Db();

    $user=mysqli_query($db,"SELECT * FROM `users` WHERE `username`='$username' LIMIT 1");
    $user=mysqli_fetch_assoc($user);

    if($user==null){
        return null;
    }

    $IsPasswordCorrect=password_verify($password,$user["password"]);

    if(!$IsPasswordCorrect){
        return null;
    }else{
        return $user;
    }
}

function getUserById($id){
    $db=Db();

    $query=mysqli_query($db,"SELECT * FROM `users` WHERE `id`=$id LIMIT 1");

    return mysqli_fetch_assoc($query);
}

?>