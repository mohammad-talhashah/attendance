<?php
$title= 'index';
require_once 'includes/header.php';
require_once 'db/conn.php';

$results= $crud->getspecialities();
?>    


<h1 class="text-center"> Registration form of Workshop</h1>

<form method="post" action="success.php"> <?php //by changing method the behaviour of form would be entirely different, eg: get to post?>
   


  <div class="form-group">
      <label for="First name" class="form-label">First Name</label>
      <input required type="text" class="form-control" id="firstname" name="firstname">
      <div id="first" class="form-text">Enter your name same as documents</div>
  </div>

  <div class="form-group">
      <label for="Last name" class="form-label">Last Name</label>
      <input required type="text" class="form-control" id="lastname" name="lastname" >
      <div id="last" class="form-text">Enter your name same as documents</div>
  </div>

  <div class="form-group">
      <label for="dob" class="form-label">Date Of Birth</label>
      <input required type="date" class="form-control" id="dob" name="dob">
      <div id="dob" class="form-text">Enter your birth date</div>
  </div>

  <div class="form-group">
      <label for="speciality" class="form-label" >Area of expertise</label>
      <select class="form-control" id="speciality" name="speciality">

      <?php while($r = $results->fetch(PDO::FETCH_ASSOC)) { ?>
        
          <option value="<?php echo $r['speciality_id'] ?>"> <?php echo $r['name']; ?> </option>
          <?php } ?>
        </select>
      
  </div>

  <div class="form-group">
     <label for="email" class="form-label">Email address</label>
     <input required type="email" class="form-control" id="email" aria-describedby="EmailHelp" name="email">
     <div id="EmailHelp" class="form-text">We'll never share your email with anyone else.</div>
  </div>
  
  <div class="form-group">
     <label for="phone" class="form-label">Contact number</label>
     <input type="text" class="form-control" id="phone" aria-describedby="PhonelHelp" name="phone">
     <div id="Phone Help" class="form-text">We'll never share your contact with anyone else.</div>
  </div>

  <button type="submit" class="btn btn-primary btn-block" name="submit">Submit</button>




<?php
require_once 'includes/footer.php';
?>