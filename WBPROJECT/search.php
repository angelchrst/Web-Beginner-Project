<?php
include "config.php";

?>

<!DOCTYPE html>
<html>
<head>
	<title>CHRYSUNTHEMOON</title>
	<link rel="stylesheet"
	href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/design.css">
	<style>
		table tr td {
			text-align: left;
		}
	</style>
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
	<div id="content" style="margin-bottom: 70px;">
		<h3 id="searchpost">Search Post</h3>
		<form action="search.php">
            <input class="form-control" type="text" name="searchbar" placeholder="Search by words..." required><br>
    		<input class="btn btn-outline-secondary" type="submit" value="Search" name="search">
        </form><br><br>
		<table cellpadding="10">
		<?php
		if(isset($_GET['searchbar'])){
		$search = $_GET['searchbar'];
		echo "<h3>Search result : ".$search."</h3>";
		}

		if(isset($_GET['searchbar'])){
			$search = $_GET['searchbar'];
			$hasil = mysqli_query($conn,"SELECT * FROM posts JOIN akun WHERE akun.username = posts.username AND posts.textpost like '%".$search."%'");
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
			}
			?>
		</table>
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