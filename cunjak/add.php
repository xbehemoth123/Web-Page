<?php 

include('config/db_connect.php');



$errors = array('title'=>'', 'author'=>'', 'category'=>'', 'year'=>'', 'price'=>''); //, 'genre'=>'');
$title = $author = $category = $price = $year = ''; // = $genre = '';

  if(isset($_POST['submit'])){
    // echo htmlspecialchars($_POST['title']) . '<br />';
    // echo htmlspecialchars($_POST['author']) . '<br />';

    // check email
    if(empty($_POST['title'])){
      $errors['title'] = 'Polje je obvezno <br />';
    } else {
      $title = $_POST['title'];     
    }

   if(empty($_POST['author'])){
      $errors['author'] = 'Polje je obvezno <br />';
    } else {
      $author = $_POST['author'];    
}      
if(empty($_POST['category'])){
      $errors['category'] = 'Polje je obvezno <br />';
    } else {
      $category = $_POST['category'];    
}      
if(empty($_POST['year'])){
      $errors['year'] = 'Polje je obvezno <br />';
    } else {
      $year = $_POST['year'];    
}      
if(empty($_POST['price'])){
      $errors['price'] = 'Polje je obvezno <br />';
    } else {
      $price = $_POST['price'];    
}      


    // if(empty($_POST['genre'])){
    //   $errors['genre'] = 'Polje je obvezno <br />';
    // } else{
    //   $genre = $_POST['genre'];

    //   if(!preg_match('/^([a-zA-Z\-]+)(,\s*[a-zA-Z\s]*)*$/', $genre)){
    //     $errors['genre'] = 'Stevilka ali znak v vnosu';
    //   } 
    // }

    if(array_filter($errors)){
      // errors in form

     
    }
    else {
      // form is valid

      $title = mysqli_real_escape_string($conn, $_POST['title']);
      $author = mysqli_real_escape_string($conn, $_POST['author']);

      //create sql

      $sql = "INSERT INTO books(title, author, category, year, price) VALUES('$title', '$author', '$category', '$year', '$price')";

      // save to db and check
      if(mysqli_query($conn, $sql)){
        // success
        header('Location: index.php');
      } else {
        // error

        echo 'query error ' . mysqli_error($conn);
      }

      header('Location: index.php');
    }

  } // end of check


?>


<!DOCTYPE html>
<html>
  
  <?php include('templates/header.php'); ?>

  <section class="container grey-text">
    <h4 class="center">Dodaj</h4>
    <form class="grey lighten-2" action="add.php" method="POST">
      
      <label>Naslov: </label>
      <input type="text" name="title" value="<?php echo $title ?>">
      <div class="red-text"><?php echo $errors['title']; ?></div>

      <label>Avtor: </label>
      <input type="text" name="author" value="<?php echo $author ?>">
      <div class="red-text"><?php echo $errors['author']; ?></div>

       <label>Kategorija: </label>
      <input type="text" name="category" value="<?php echo $category ?>">
      <div class="red-text"><?php echo $errors['category']; ?></div>

      <label>Letnik: </label>
      <input type="text" name="year" value="<?php echo $year ?>">
      <div class="red-text"><?php echo $errors['year']; ?></div>

      <label>Cena: </label>
      <input type="text" name="price" value="<?php echo $price ?>">
      <div class="red-text"><?php echo $errors['price']; ?></div>

      <div class="center">
        <input type="submit" name="submit" value="Submit" class="btn brand z-depth-0">
      </div>
   

    </form>
  </section>

  <?php include('templates/footer.php'); ?>

</html>