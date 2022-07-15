<?php
$title= 'Success';
require_once 'includes/header.php';
require_once 'db/conn.php';

if(isset($_POST['submit'])){
   


   $fname=$_POST['firstname'];
   $lname=$_POST['lastname'];
   $dob=$_POST['dob'];
   $email=$_POST['email'];
   $contact=$_POST['phone'];
   $speciality=$_POST['speciality'];

   $isSuccess = $crud->insert($fname,$lname,$dob,$email,$contact, $speciality);
      

    if($isSuccess){
        //echo '<h1 class="text-center text-success">REGISTERED</h1>';
        include 'includes/successmessage.php';

    } else{
        //echo '<h1 class="text-center text-danger">REGISTERATION FAILED</h1>';
        include 'includes/errormessage.php';

    }
}


?>   
  

<!---code for POST method
<div class="card" style="width: 18rem;">
  
    <div class="card-body">

       <h5 class="card-title"><?php// echo $_GET['firstname']. '' .$_GET['lastname']; ?></h5>
       <h6 class="card-subtitle mb-2 text-muted"><?php //echo $_GET['speciality']; ?> </h6>
       <p class="card-text">Date of birth:<?php //echo $_GET['dob']; ?></p>
       <p class="card-text">Email provided:<?php// echo $_GET['email']; ?></p>
       <p class="card-text">Cell phone:<?php// echo// $_GET['phone']; ?></p>
      
    </div>
</div>

<?php
//echo $_GET['firstname'];  //supper variable
?>
<br/>
<?php// echo $_GET['lastname']; ?>
<br/>

<?php //echo// $_GET['dob']; ?>
<br/>
<?php //echo $_GET['email']; ?> 
<br/>
<?php //echo $_GET['phone']; ?>
<br/>
<?php //echo $_GET['speciality']; ?> 
---->

<!-- Code for Post method -->
<div class="card" style="width: 18rem;">
  
    <div class="card-body">

       <h5 class="card-title"><?php echo $_POST['firstname']. '' .$_POST['lastname']; ?></h5>
       <h6 class="card-subtitle mb-2 text-muted"><?php echo $_POST['speciality']; ?> </h6>
       <p class="card-text">Date of birth:<?php echo $_POST['dob']; ?></p>
       <p class="card-text">Email provided:<?php echo $_POST['email']; ?></p>
       <p class="card-text">Cell phone:<?php echo $_POST['phone']; ?></p>
      
    </div>
</div>


<br>
<br>
<br>
<br>
<?php
require_once 'includes/footer.php';
?>