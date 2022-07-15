<?php
$title= 'Edit Record';
require_once 'includes/header.php';
require_once 'db/conn.php';

$results= $crud->getspecialities();
if(!isset($_GET['id']))
{
    //echo "ERROR";
    include 'includes/errormessage.php';
    header("Location: viewrecords.php");
}else{
    $id=$_GET['id'];
    $attendee= $crud->getdetails($id);



?>    


<h1 class="text-center"> Edit Record</h1>

<form method="post" action="editpost.php"> 
    <?php //by changing method the behaviour of form would be entirely different, eg: get to post?>
<input type="hidden" name="id" value= "<?php echo $attendee['attendee_id'] ?>"    />
   


  <div class="form-group">
      <label for="First name" class="form-label">First Name</label>
      <input type="text" class="form-control" value="<?php echo $attendee['firstname'] ?>"  id="firstname" name="firstname">
      <div id="first" class="form-text">Enter your name same as documents</div>
  </div>

  <div class="form-group">
      <label for="Last name" class="form-label">Last Name</label>
      <input type="text" class="form-control"  value="<?php echo $attendee['lastname'] ?>" id="lastname" name="lastname" >
      <div id="last" class="form-text">Enter your name same as documents</div>
  </div>

  <div class="form-group">
      <label for="dob" class="form-label">Date Of Birth</label>
      <input type="date" class="form-control"  value="<?php echo $attendee['dateofbirth'] ?>" id="dob" name="dob">
      <div id="dob" class="form-text">Enter your birth date</div>
  </div>

  <div class="form-group">
      <label for="speciality" class="form-label" >Area of expertise</label>
      <select class="form-control"  value="<?php echo $attendee['speciality_id'] ?>" id="speciality" name="speciality">

      <?php while($r = $results->fetch(PDO::FETCH_ASSOC)) { ?>
        
          <option value="<?php echo $r['speciality_id'] ?>" 
          <?php if($r['speciality_id']==$attendee['speciality_id']) echo 'selected'   ?>> 
          
          
          <?php echo $r['name']; ?>
         </option>
          <?php } ?>
        </select>
      
  </div>

  <div class="form-group">
     <label for="email" class="form-label">Email address</label>
     <input type="email" class="form-control"  value="<?php echo $attendee['emailadress'] ?>" id="email" aria-describedby="EmailHelp" name="email">
     <div id="EmailHelp" class="form-text">We'll never share your email with anyone else.</div>
  </div>
  
  <div class="form-group">
     <label for="phone" class="form-label">Contact number</label>
     <input type="text" class="form-control"  value="<?php echo $attendee['contactno'] ?>" id="phone" aria-describedby="PhonelHelp" name="phone">
     <div id="Phone Help" class="form-text">We'll never share your contact with anyone else.</div>
  </div>

  <a href="viewrecords.php" class="btn btn_default">Leave</a>
  <button type="submit" class="btn btn-success btn-block" name="submit">Save changes</button>
      </form>

<?php } ?>


<br>
<br>
<br>
<br>
<br>
<?php
require_once 'includes/footer.php';
?>