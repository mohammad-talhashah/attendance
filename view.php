<?php

 $title= 'view Record';
 require_once 'includes/header.php';
 require_once 'db/conn.php';
 

  //get attendee by id
   if(!isset($_GET['id']))
  {
    //echo "<h1 class='text-danger'>Please Try Again</h1>";
    include 'includes/errormessage.php';
    
  }else{
    $id= $_GET['id'];
    $results= $crud->getdetails($id);

  
  

?>


<div class="card" style="width: 18rem;">
 <div class="card-body">

       <h5 class="card-title"><?php echo $results['firstname']. '' .$results['lastname']; ?></h5>
       <h6 class="card-subtitle mb-2 text-muted"><?php echo $results['name']; ?> </h6>
       <p class="card-text">Date of birth:<?php echo $results['dateofbirth']; ?></p>
       <p class="card-text">Email provided:<?php echo $results['emailadress']; ?></p>
       <p class="card-text">Cell phone:<?php echo $results['contactno']; ?></p>
      
  </div>
</div>  

          <a href="viewrecords.php" class="btn btn-info">Back to list</a>
          <a href="edit.php?id=<?php echo $results['attendee_id']?>" class="btn btn-warning">Edit</a>
          <a onclick="return confirm('are you sure you want to delete?');" href="delete.php?id=<?php echo $results['attendee_id']?>" 
          class="btn btn-danger">Delete</a>
<?php } ?>






<br>
<br>
<br>
<?php
require_once 'includes/footer.php';
?>