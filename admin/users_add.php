<?php

include( 'includes/database.php' );
include( 'includes/config.php' );
include( 'includes/functions.php' );

secure();

if( isset( $_POST['first'] ) )
{
  
  if( $_POST['first'] and $_POST['last'] and $_POST['email'] and $_POST['password'] )
  {
    
    $query = 'INSERT INTO users (
        first,
        last,
        email,
        password,
        active
      ) VALUES (
        "'.mysqli_real_escape_string( $connect, $_POST['first'] ).'",
        "'.mysqli_real_escape_string( $connect, $_POST['last'] ).'",
        "'.mysqli_real_escape_string( $connect, $_POST['email'] ).'",
        "'.md5( $_POST['password'] ).'",
        "'.$_POST['active'].'"
      )';
    mysqli_query( $connect, $query );
    
    set_message( 'User has been added' );
    
  }

  header( 'Location: users.php' );
  die();
  
}

include( 'includes/header.php' );

?>

<section class="add_account">
  <h2>Add Account</h2>
  
  <form method="post" class="form">
    <div class="form__wrapper">
      <label for="first" class="form__label">First Name</label>
      <input type="text" name="first" id="first" class="form__input">
    </div>
    <div class="form__wrapper">
      <label for="last" class="form__label">Last Name</label>
      <input type="text" name="last" id="last" class="form__input">
    </div>
  
    <div class="form__wrapper">
      <label for="email" class="form__label">Email</label>
      <input type="email" name="email" id="email" class="form__input">
    </div>
    <div class="form__wrapper">
      <label for="password" class="form__label">Password</label>
      <input type="password" name="password" id="password" class="form__input">
    </div>

    <div class="form__wrapper">
      <label for="active" class="form__label">Active</label>
      <?php
      $values = array( 'Yes', 'No' );
      echo '<select name="active" id="active" class="form__select">';
      foreach( $values as $key => $value )
      {
        echo '<option value="'.$value.'"';
        echo ' class="form__option">'.$value.'</option>';
      }
      echo '</select>';
      ?>
    </div>
  
    <input type="submit" value="Add User">
  
  </form>
</section>


<?php

include( 'includes/footer.php' );

?>