<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Homepage</title>
</head>

<body>
	<?php
		/* connects to the database server */
		$con = mysql_connect("localhost", "root", "");
		/* checks if connection to database server is successful */
		if(!$con) die("Cannot connect to server");
		/* connects to the database */
		mysql_select_db("advert", $con);
		/* selects everything in the banner table  */
		$result = mysql_query("SELECT * FROM banner");
	?>
	<table border="1" cellpadding="5">
    	<tr>
	        <th></th>
        	<th>ID</th>
            <th>Title</th>
            <th>Client</th>
            <th>Path</th>
            <th>Link</th>
            <th>Click</th>
            <th>Impression</th>
            <th></th>
            <th></th>
        </tr>
        <?php 
		/* scan through the select result row by row */
		/* and prints out the needed data in HTML table */
		while($fetch = mysql_fetch_row($result)){ ?>
        <tr>
        	<td><a>Edit</a></td>
        	<td><?php echo "$fetch[0]"; ?></td>
        	<td><?php echo "$fetch[2]"; ?></td>
            <td><?php echo "$fetch[3]"; ?></td>
            <td><?php echo "$fetch[1]"; ?></td>
            <td><?php echo "$fetch[5]"; ?></td>
            <td><?php echo "$fetch[6]"; ?></td>
            <td><?php echo "$fetch[7]"; ?></td>
        	<td><a href="Test.php?ID=<?php echo "$fetch[0]"; ?>&Path=<?php echo "$fetch[1]"; ?>">View</a></td>
           	<td><a href="" onClick="confirm('Are you certain you want to delete');">Delete</a></td>
        </tr>
        <?php } ?>
    </table>
</body>
</html>