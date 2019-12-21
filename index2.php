<?php
$db_host = 'localhost'; // Server Name
$db_user = 'root'; // Username
$db_pass = ''; // Password
$db_name = 'urlshorten_db'; // Database Name
$base_url = 'http://localhost/url_shortner/';

$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
if (!$conn) {
	die ('Failed to connect to MySQL: ' . mysqli_connect_error());	
}

if (isset($_GET['url']) && ($_GET[url] != "")) {
	$url = urldecode($_GET['url']);
	if(filter_var($url, FILTER_VALIDATE_URL)){
		$shortUrl = getShortUrl($url);
	}
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Url Shortner</title>
</head>
<body>
	<center>
		<form>
			<input type="url" name="url" required="" placeholder="Type your URL here"><br><br>
			<input type="text" name="shortcode" required="" placeholder="Type your customised URL"><br><br>
			<input type="submit" name="submit" value="submit">
		</form>
	</center>
	<?php
	function getShortUrl($url)
	{	
		global $conn, $base_url;
		$queryURL = "SELECT * FROM url_shorten WHERE url = '".$url."' ";
		$resultURL = mysqli_query($conn, $queryURL);
		$countURL = mysqli_num_rows($resultURL);
		if ($countURL > 0) {
			$row = mysqli_fetch_assoc($resultURL);
			$ddd = $row['short_code'];
			echo "There's already a shortcode for this URL: '$ddd'";
			return $row['short_code'];
		}else{
			$short_code = checkUniqueId();
			$sql = "INSERT INTO url_shorten (url, short_code, hits) VALUES('$url', '$short_code', '0')";
			$resultSQL = mysqli_query($conn,$sql);
			if ($resultSQL === true) {
				echo "Your short Link is '.$base_url.'/'.$short_code.'";
				return $short_code;
			}else{
				die("UNKOWN ERROR OCCURED");
			}
		}
	}

	function checkUniqueId()
	{	
		global $conn;
		//check if the shortcode has being assigned to another url...if yes....regenerate another unique code
		$shortcode = $_GET['shortcode'];
		$query = "SELECT * FROM url_shorten WHERE short_code = '".$shortcode."' ";
		$result = mysqli_query($conn, $query);
		$count = mysqli_num_rows($result);
		if ($count > 0) {
			echo "Shortcode already chosen";
		}else{
			return $shortcode;
		}
	}

	// code to redirect to the original url
	if (isset($_GET['redirect']) && $_GET['redirect']) {
		$slug = urlencode($_GET['redirect']);
		$url = getRedirectUrl($slug);
		header("location:".$url);
		exit();
	}
	// function to get the original url that will be redirected to
	function getRedirectUrl($slug)
	{
		global $conn;
		$q = "SELECT * FROM url_shorten WHERE short_code = '".addslashes($slug)."' ";
		$res = mysqli_query($conn, $q);
		$c = mysqli_num_rows($res);
		if ($c > 0) {
			$row = mysqli_fetch_assoc($res);
			$idd = $row['id'];
			$hits = $row['hits'] + 1;
			$sqll = "UPDATE url_shorten SET hits = '$hits' WHERE id= $idd";
			$qsql = mysqli_query($conn, $sqll);
			return $row['url'];
		}else{
			die("INVALID LINK");
		}
	}
?>
</body>
</html>

