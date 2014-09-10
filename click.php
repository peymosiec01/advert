<?php


	$id = $_POST['ID'];

	echo "Wetin dey shele?<br>";
	
	/* calls the click function for execution passing the required values as parameters */
	Click($id, 2, GetIPAddress(), GetDateTime(), ConnectDB());
	
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
	
	/* function to record banner click */
	function Click($id, $type, $ipaddress, $date, $con){
		
		/* inserts the values into count table */
		$output = "INSERT INTO count VALUES ('$id', '$ipaddress', '$date', '$type')";
		/* executes insert statement */
		mysql_query($output);
		
		/* select click from the banner table*/
		$result = mysql_query("SELECT Click FROM banner WHERE ID = '$id'");
		/* gets the result of the select statement row after row */
		while($fetch = mysql_fetch_row($result)){
			$click = $fetch[0] + 1;
		}
		/* print statement */
		echo "Your Click count : $click<br>";
		/* updates the banner table */
		$ress= "UPDATE banner SET Click = '$click' WHERE ID = '$id'";
		/* executes the update statement */
		$retval = mysql_query($ress, $con);
		/* checks the update statement execution */
		if(! $retval )
		{
			die('Could not update data: ' . mysql_error());
		}

	}
?>
