<?php

include( 'includes/database.php' );
include( 'includes/config.php' );
include( 'includes/functions.php' );

secure();

if( isset( $_POST['school'] ) )
{
  
  if( $_POST['school'])
  {
    
    $query = 'INSERT INTO educations (
        school,
        school_url,
        major,
        major_url,
        degree,
        start_date,
        end_date
      ) VALUES (
         "'.mysqli_real_escape_string( $connect, $_POST['school'] ).'",
         "'.mysqli_real_escape_string( $connect, $_POST['school_url'] ).'",
         "'.mysqli_real_escape_string( $connect, $_POST['major'] ).'",
         "'.mysqli_real_escape_string( $connect, $_POST['major_url'] ).'",
         "'.mysqli_real_escape_string( $connect, $_POST['degree'] ).'",
         "'.mysqli_real_escape_string( $connect, $_POST['start_date'] ).'",
         "'.mysqli_real_escape_string( $connect, $_POST['end_date'] ).'"
      )';
    mysqli_query( $connect, $query );
    
    set_message( 'Education has been added' );
    
  }
  
  header( 'Location: educations.php' );
  die();
  
}

include( 'includes/header.php' );

?>

<h2>Add Education</h2>

<form method="post">
  
  <label for="school">School:</label>
  <input type="text" name="school" id="school">
    
  <br>
  
  <label for="school_url">School URL:</label>
  <input type="text" name="school_url" id="school_url">
  
  <br>

  <label for="major">Major:</label>
  <input type="text" name="major" id="major">
    
  <br>
  
  <label for="major_url">Major URL:</label>
  <input type="text" name="major_url" id="major_url">

  <br>

  <label for="degree">Degree:</label>
  <input type="text" name="degree" id="degree">
  
  <br>
  
  <label for="start_date">Start Date:</label>
  <input type="date" name="start_date" id="start_date">
  
  <br>

  <label for="end_date">End Date:</label>
  <input type="date" name="end_date" id="end_date">
  
  <br>
  
  
  <input type="submit" value="Add Education">
  
</form>

<p><a href="educations.php"><i class="fas fa-arrow-circle-left"></i> Return to Education List</a></p>


<?php

include( 'includes/footer.php' );

?>