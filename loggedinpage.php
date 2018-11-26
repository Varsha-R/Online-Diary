<?php

	session_start();	

	$diaryContent = "";

	if(array_key_exists("id", $_COOKIE)) {
		
		$_SESSION['id'] = $_COOKIE['id'];
	}

	if(array_key_exists("id", $_SESSION)) {
		
		//echo "<p>Logged in! <a href='index.php?logout=1'>Log out!</a></p>";
		include("connection.php");
		$query = "SELECT diary from users WHERE id = ".mysqli_real_escape_string($link, $_SESSION['id'])." LIMIT 1";
		$row = mysqli_fetch_array(mysqli_query($link, $query));
		$diaryContent = $row['diary'];
	}
	else {
		
		header("Location: index.php");
	}

	include("header.php");
?>

<nav class="navbar navbar-dark bg-dark navbar-fixed-top">
	
  <a class="navbar-brand" href="#" id="NavBar">OnlineDiary</a>
  
    <div class="pull-xs-right">
	
		<a href='index.php?logout=1'><button class="btn btn-success-outline" type="submit">Log Out</button></a>
	
	</div>

</nav>


<div class="container-fluid" id="containerLoggedInPage">
	
		<textarea id="diary" class="form-control"><?php echo $diaryContent; ?></textarea>
		
</div>
		
<?php

	include("footer.php");
?>