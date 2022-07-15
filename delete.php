<?php
require_once 'db/conn.php';
if(!$_GET['id'])
{
    //echo "erroR";
    include 'includes/errormessage.php';
    header("Location: viewrecords.php");

}else
{
    //Get id values
    $id=$_GET['id'];

    //calling crud function
    $results=$crud->deleteattendee($id);

    //redirect to list
    if($results)
    {
        header("Location: viewrecords.php");
    }else{
        echo 'Invalid';
    }
}



?>