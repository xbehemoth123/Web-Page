<?php 

include('config/db_connect.php');

//query for all books
$sql = 'SELECT title, author FROM books ORDER BY created_at';

// make query get result
$result = mysqli_query($conn, $sql);

// fetch result as array
 $books = mysqli_fetch_all($result, MYSQLI_ASSOC);

// free result from memory
mysqli_free_result($result);

//close connection
mysqli_close($conn);

 // print_r(explode(',', $books[0]['genre']));

?>

<!DOCTYPE html>
<html>
	
	<?php include('templates/header.php'); ?>

	<h4 class="center grey-text">Knjige</h4>

	<div class="container">
		<div class="row">
			<?php foreach($books as $book){ ?>
				<div class="col s6 m2 l2">
					<div class="card z-depth-1">
						<div class="card-content center">
							<h6><?php echo htmlspecialchars($book['title']); ?></h6>
							<div><p>by </p><?php echo htmlspecialchars($book['author']); ?></div>						 

						</div>
						<div class="card-action left-align"></div>
						<a class="brand-text" href="#">more info</a>
					</div>
				</div>
			<?php } ?>
		</div>	
	</div>

	<?php include('templates/footer.php'); ?>

</html>