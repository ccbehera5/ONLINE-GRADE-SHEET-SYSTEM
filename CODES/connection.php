
        <?php
        $dbhost = 'localhost:3306';
	$dbuser = 'root';
	$dbpass = '';
	$db='fakir';
	$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $db);
	if(! $conn )
	{
		die('Could not connect: ' . mysql_error());
	}
	
	$c2=mysqli_select_db( $conn,'fakir' );
        ?>
    