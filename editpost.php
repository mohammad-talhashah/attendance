<?php

require_once 'db/conn.php';

//get values from post operation
if(isset($_POST['submit'])){
   
//extracr values from post array

    $id=$_POST['id'];
    $fname=$_POST['firstname'];
    $lname=$_POST['lastname'];
    $dob=$_POST['dob'];
    $email=$_POST['email'];
    $contact=$_POST['phone'];
    $speciality=$_POST['speciality'];

    //calling crud function
    $results= $crud->editattendee($id,$fname,$lname,$dob,$email,$contact,$speciality);
    //Redirect to index.php
    if($results){
        header( "Location: viewrecords.php");
    }else{
        echo "Error";
    }
 
    
       
}else{
    echo "error";
} 
     


?>