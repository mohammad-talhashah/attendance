<?php
class crud{
    private $db;
    //constructor
    function __construct($conn){
        $this->db=$conn;

    }
    //function to added a record into a database
    public function insert($fname,$lname,$dob,$email,$contact,$speciality){
     try{
          $sql="INSERT INTO attendee (firstname,lastname,dateofbirth,emailadress,contactno,speciality_id) 
           VALUES(:fname,:lname,:dob,:email,:contact,:speciality)";
          $stmt = $this->db->prepare($sql);

           //bind all placeholders to the actual values
           $stmt->bindparam(':fname', $fname);
           $stmt->bindparam(':lname', $lname);
           $stmt->bindparam(':dob', $dob);
           $stmt->bindparam(':email', $email);
           $stmt->bindparam(':contact', $contact);
           $stmt->bindparam(':speciality', $speciality);

             $stmt->execute();
             return true;
    
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
      }   

    } 
    public function getAttendess()
    {
        try{
            $sql ="SELECT * FROM `attendee` a inner join specialities s on a.speciality_id= s.speciality_id order by attendee_id";
        $results= $this->db->query($sql);
        return $results;

        } catch(PDOException $e)
        {
           echo $e->getMessage();
            return false;      
        }
    }

    

    public function getdetails($id)
    {
        try{
            $sql= "SELECT * FROM attendee a inner join specialities s on a.speciality_id= s.speciality_id where attendee_id= :id" ;
        $stmt= $this->db->prepare($sql);
        $stmt->bindparam(':id', $id);
        $stmt->execute();
        $results= $stmt->fetch();
        return $results;

        }catch(PDOException $e)
        {
            echo $e->getMessage();
            return false;   
        }
    }

    public function getspecialities()
    {
        try{
            $sql ="SELECT * FROM `specialities`";
        $results= $this->db->query($sql);
        return $results;
        }catch(PDOException $e){
            echo $e->getMessage();
            return false;

        }
    }

    public function editattendee($id,$fname,$lname,$dob,$email,$contact,$speciality)
    {
        try{
                 
            $sql= "UPDATE `attendee` SET `firstname`=:fname,`lastname`=:lname,`dateofbirth`=:dob,
             `emailadress`=:email,`contactno`=:contact,`speciality_id`=:speciality WHERE attendee_id= :id ";

            $stmt = $this->db->prepare($sql);

             //bind all placeholders to the actual values
            $stmt->bindparam(':id', $id);
            $stmt->bindparam(':fname', $fname);
            $stmt->bindparam(':lname', $lname);
            $stmt->bindparam(':dob', $dob);
            $stmt->bindparam(':email', $email);
            $stmt->bindparam(':contact', $contact);
            $stmt->bindparam(':speciality', $speciality);

                $stmt->execute();
                return true;
        }
        catch(PDOException $e) {
            echo $e->getMessage();
            return false;
        }

        



       
    }    

    public function deleteattendee($id)
    {
        try{
            $sql= "DELETE from attendee where attendee_id= :id";
            $stmt= $this->db->prepare($sql);
            $stmt->bindparam(':id',$id);
            $stmt->execute();
            return true;
            
        }catch(PDOException $e)
        {
            echo $e->getMessage();
            return false;

        }
      

    }

}

?>