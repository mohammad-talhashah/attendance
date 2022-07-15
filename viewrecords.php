<?php
$title= 'View Records';
require_once 'includes/header.php';
require_once 'db/conn.php';

$results= $crud->getAttendess();
?>    

<table class="table">
    <tr>
        <th>#</th>
        <th>First name</th>
        <th>Last name</th>
        <th>Date of birth</th>
        <th>Speciality</th>
        <th>Actions</th>
    </tr>
    <?php
    //opening while loop
    while($r = $results->fetch(PDO::FETCH_ASSOC))  
    { ?> 
    <tr>
        <td><?php echo $r['attendee_id'] ?></td>
        <td><?php echo $r['firstname'] ?></td>
        <td><?php echo $r['lastname'] ?></td>
        <td><?php echo $r['dateofbirth'] ?></td>
        <td><?php echo $r['name'] ?></td>
        <td>
            <a href="view.php?id=<?php echo $r['attendee_id']?>" class="btn btn-primary">View</a>
            <a href="edit.php?id=<?php echo $r['attendee_id']?>" class="btn btn-warning">Edit</a>
            <a onclick="return confirm('are you sure you want to delete?');" href="delete.php?id=<?php echo $r['attendee_id']?>" class="btn btn-danger">Delete</a>
        </td>
        
    </tr>
    

    <?php } ?>






</table>



<br>
<br>
<br>
<br>

<?php
require_once 'includes/footer.php';
?>