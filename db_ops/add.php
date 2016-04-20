<?PHP
//check to see if the user accessed this page in the correct way
if(isset($_POST["description"])){
	//open up the database connection
	include 'db_conn.php';

	$add_stmt = $db->prepare('INSERT INTO jobs (designer_id, description, start_date, end_date, bill_date, primary_contact, percent_done, work_status) VALUES (:designId, :description, :start_date, :end_date, :bill_date, :contact, :percent_done, :work_status)');
	


	$add_stmt->bindParam(':designId', $_POST['designer-id']);
	$add_stmt->bindParam(':description', $_POST['description']);
	$add_stmt->bindParam(':start_date', $_POST['start-date']);
	$add_stmt->bindParam(':end_date', $_POST['end-date']);
	$add_stmt->bindParam(':bill_date', $_POST['bill-date']);
	$add_stmt->bindParam(':contact', $_POST['contact']);
	$add_stmt->bindParam(':percent_done', $_POST['percent-done']);
	$add_stmt->bindParam(':work_status', $_POST['work-status']);

	//execute the prepared statement
	$add_stmt->execute();
}else{
	//tell the user that mistakenly tried to access this page that they are not allowed to
	echo("this page cannot be loaded in a browser by itself<br/>");
	echo("please go to the <a href='/spreadsheet'>home page</a> to use this site");
}










