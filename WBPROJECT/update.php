<?php
include "config.php";

$id_post = $_GET['id_post'];

if(isset($_POST['btnupdate'])){
	$id_post = $_POST['id_post'];
    $textpost = addslashes($_POST['textpost']);

    mysqli_query($conn, "UPDATE posts SET textpost = '$textpost' WHERE id_post = '$id_post' ");
    header("location:home.php");
   
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>CHRYSUNTHEMOON</title>
	<link rel="stylesheet"
	href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/design.css">
	</head>
<body>
	<div id="header">
		<h1 id="header_text">Chrysunthemoon</h1>
	</div>
	<div id="navbar">
		<ul>
			<li><a href="home.php">Home</a></li>
			<li><a href="about.php">About Us</a></li>
			<li><a href="logout.php">Logout</a></li>
		</ul>
	</div>
	<div class="container">
	<div class="col-md">
	<div id="content">
		<h1>Edit Post</h1>
		<?php
   			$hasil = mysqli_query($conn,"SELECT * FROM posts WHERE id_post = '$id_post' ");

   			foreach($hasil as $hsl){

   		?>
   		<form action="update.php" method="post">
   			<input type="hidden" value="<?php echo $hsl['id_post']; ?>" name="id_post">
   			<textarea class="form-control" type="text" id="textpost" name="textpost"><?php echo $hsl['textpost'] ?></textarea><br>
   			<button class="btn btn-outline-secondary" name="btnupdate" value="Update">Update</button>
   			<a class="btn btn-outline-secondary" href="home.php">Cancel Edit</a>
		</form> 

		<?php
			}
		?>
	</div>
	</div>
	</div>
	<div id="footer" style="position: fixed;">
		<h4>FIND US</h4>
		<p>
			<a href="https://laviestunfilm.tumblr.com/" target="_blank" class="fa fa-tumblr"></a>
			<a href="https://www.instagram.com/angelchrst/" target="_blank" class="fa fa-instagram"></a>
			<a href="https://id.pinterest.com/cheristee/" target="_blank" class="fa fa-pinterest"></a>
		</p>
		<a>Copyright &copy; 2021 by : Angelia Christy (1910512015)</a>
	</div>
</body>
</html>