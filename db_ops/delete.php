<?PHP
//check if the proper variables have been set through post
//to prevent a user from coming in from an outside site
if (isset($_POST["job-id"])){
	//first, open up the database and store it in $db
	include 'db_conn.php';
	//then, make the statement we are about to use
	//there is no user input to mess with, so prepared statements are not needed
	$del_stmt = $db->prepare('DELETE FROM jobs WHERE job_id = :jobid');
	$del_stmt->bindParam(':jobid', $_POST['job-id']);
	//then we execute it, and it deletes the entry at the specified id in the database
	$del_stmt->execute();
}else{
	//tell the user that mistakenly tried to access this page that they are not allowed to
	echo("this page cannot be loaded in a browser by itself<br/>");
	echo("please go to the <a href='index.php'>home page</a> to use this site");
}