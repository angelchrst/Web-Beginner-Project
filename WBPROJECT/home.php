<?php

include "config.php";

session_start();

if(!isset($_SESSION['username'])){
    header("location:login.php");
}

if(isset($_POST['btnsubmit'])) {
	$uname    = $_SESSION['username'];
	$textpost = addslashes($_POST['textpost']);
	// addslashes digunakan agar simbol-simbol seperti single quotation, dan double quotation dapat terbaca

	mysqli_query($conn, "INSERT INTO posts (username,textpost) VALUES ('$uname','$textpost')");

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
			<li><a href="#searchpost">Search</a></li>
			<li><a href="about.php">About Us</a></li>
			<li><a href="logout.php">Logout</a></li>
		</ul>
	</div>
		<div class="container">
		<div class="row">
		<div class="col">
		<div id="content">
		<div class="addpost">
			<form action="home.php" method="post">
				<label for="textpost"><h4>Welcome, <?php echo $_SESSION['name'] ?> !</h4></label><br>
			  	<textarea class="form-control" id="textpost" name="textpost" placeholder="What's on your mind?"></textarea><br>
			  	<input class="btn btn-outline-secondary" type="submit" name="btnsubmit" value="Submit">
			</form> 
		</div>
		<hr>
		<h3>Latest Updates</h3>
		<div class="post">
		<table cellpadding="10">
			<?php 
			$hasil = mysqli_query($conn,"SELECT * FROM posts JOIN akun WHERE akun.username = posts.username ORDER BY date DESC");
    		foreach($hasil as $row){

			?>
			<tr>
    			<td><b><?php echo $row['name']; ?></b></td>
			</tr>
			<tr>
				<td><?php echo $row['textpost']; ?></td>
			</tr>
			<tr>
				<td><i><?php echo $row['date']; ?></i></td>
			</tr>
			<?php
			}

			?>
		</table>
		</div>
		</div>
		</div>
		<div class="col">
			<div id="content">
			<h3>My Posts</h3><br>
			<div class="post">
			<table cellpadding="10">
				<?php 
				$hasil = mysqli_query($conn,"SELECT * FROM posts JOIN akun WHERE akun.username = posts.username ORDER BY date DESC");
    			foreach($hasil as $row){
    			if ($row['username'] == $_SESSION['username']) {
				?>
				<tr>
    				<td><b><?php echo $row['name']; ?></b></td>
				</tr>
				<tr>
					<td><?php echo $row['textpost']; ?></td>
				</tr>
				<tr>
					<td><i><?php echo $row['date']; ?></i></td>
				</tr>
				<tr>
					<td>
					<?php
						if ($row['username'] == $_SESSION['username']) {
					?>
						<a class="btn btn-outline-secondary" href="delete.php?id_post=<?php echo $row['id_post']; ?>" role="button">Delete</a>
						<a class="btn btn-outline-secondary" href="update.php?id_post=<?php echo $row['id_post']; ?>" role="button">Edit</a>
					<?php
						}
					?>
					</td>
				</tr>
				<?php
				}
				}
				?>
			</table>
			</div>
			<hr>
			<h3 id="searchpost">Search Post</h3>
			<form action="search.php">
        	    <input class="form-control" type="text" name="searchbar" placeholder="Search by words..." required><br>
    			<input class="btn btn-outline-secondary" type="submit" value="Search" name="search">
        	</form>
			</div>
		</div>
		</div>
		</div>
	<div id="footer">
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