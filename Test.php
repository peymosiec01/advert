
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>My Advert</title>
<?php

	$id = $_GET['ID'];

	echo "Wetin dey shele?<br>";
	
	/* checks the page is at first load - executes only at fresh load */
	if($_SERVER['REQUEST_METHOD'] != 'POST'){
		Impression($id, 1, GetIPAddress(), GetDateTime(), ConnectDB());
	}

	
	/* function to get the current date and time */
	function GetDateTime(){
		/* sets the time zone*/
		date_default_timezone_set('Africa/Lagos');
		/* sets the date and time format */
		$date = date('Y-m-d H:i:s');
		/* print statement */
		echo "The date and time is : $date<br>";
		return $date; //the value the function returns when called
	}
	
	/* function to get the client/host ip address */
	function GetIPAddress(){
		/* gets the client/host ip address */
		if (getenv('HTTP_X_FORWARDED_FOR')) {
			$pipaddress = getenv('HTTP_X_FORWARDED_FOR');
			$ipaddress = string(getenv('REMOTE_ADDR'));
			/* print statement */
			echo "Your Proxy IP address is : ".$ipaddress. "(via $ipaddress)" ;
		} else {
			$ipaddress = getenv('REMOTE_ADDR');
			/* print statement */
			echo "Your IP address is : $ipaddress<br>";
		}
		return $ipaddress; //the value the function returns when called
	}
	
	/* function to connect to database */
	function ConnectDB(){
		/* print statement */
		echo "Connecting....<br>";
		/* connects to server */
		$con = mysql_connect("localhost", "root", "");
		if(!$con) die("Cannot connect to localhost");
		/* print statement */
		echo "Your localhost connection passed<br>";
		
		/* connects to database */
		mysql_select_db("advert", $con) or die("Unable to connect to database");
		/* print statement */
		echo "Your database connection passed<br>";
		return $con; //the value the function returns when called	
	}
	
	/* function to record banner impression */
	function Impression($id, $type, $ipaddress, $date, $con){
	  /* inserts the values into count table */
	  $output = "INSERT INTO count VALUES ('$id', '$ipaddress', '$date', '$type')";
	  /* executes insert statement */
	  mysql_query($output);
	  
	  /* select impression from the banner table*/
	  $result = mysql_query("SELECT Impression FROM banner WHERE ID = '$id'");
	  /* gets the result of the select statement row after row */
	  while($fetch = mysql_fetch_row($result)){;
		  $impression = $fetch[0] + 1;
	  }
	  /* print statement */
	  echo "Your Impression count : $impression<br>";
  	  /* updates the banner table */
	  $ress= "UPDATE banner SET Impression = '$impression' WHERE ID = '$id'";
	  /* executes the update statement */
	  $retval = mysql_query($ress, $con);
	  /* checks the update statement execution */
	  if(! $retval )
	  {
		die('Could not update data: ' . mysql_error());
	  }
	}
	
?>	
</head>

<body>
<script>
	//ajax function to interact with the server
	function recordClick(ad_id){
		//the image id that is passed to the function is assiigned to a variable
		var id = ad_id;
		
		//for mozilla, safari and others
		if(window.XMLHttpRequest){
			httpRequest = new XMLHttpRequest();
			
		//for ie8 and older
		}else if(window.ActiveXObject){
			try{
				httpRequest = new ActiveXObject("Msxml2.XMLHTTP");
				
			}catch(e)
			{
			}
			try{
				httpRequest = new ActiveXObject("Microsoft.XMLHTTP");
				
			}catch(e)
			{
			}
		}
		if(!httpRequest){
			return false;
		}
	
		var url = "click.php";
		var data = "ID="+id;
		
		//open a new request to the server
		httpRequest.open( "POST", url, true );
		httpRequest.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
		httpRequest.send(data);
	
	}

</script>
<?php 
/* gets the ID passed into the url from home.php */
$passed_id = $_GET['ID'];
/* gets the Path passed into the url from home.php */
$passed_path = $_GET['Path'];
?>

<!--the image tag is used here unlike the previous one where the button is used
	the image source and id is passed from the table view link into the url and gotten above
    the image tag is inside a link
    NB: Note to change the link to a valid path into your C:/wamp/www/ folder-->
<a href="http://localhost/CSC291/Cochins.php"><img name='image' src="<?php echo $passed_path; ?>" onclick="recordClick(<?php echo $passed_id; ?>);" /></a>

</body>
</html>