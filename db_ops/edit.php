<?PHP
//check to see if the user accessed this page in the correct way
if(isset($_POST['description'])){
	//open up the database connection
	include 'db_conn.php';

	$edit_stmt = $db->prepare('UPDATE jobs SET description = :description, 
										start_date = :start, 
										end_date = :end, 
										bill_date = :bill, 
										primary_contact = :contact, 
										percent_done = :percent, 
										work_status = :status 
								 WHERE job_id = :jobid');

	//set the end date variable to null if it is empty
	if($_POST['end-date']==""){
		$end = 'NULL';
	}else{
		$end = $_POST['end-date'];
	}

	if($_POST['percent-done']==""){
		$percent = 'NULL';
	}else{
		$percent = $_POST['percent-done'];
	}

	if($_POST['bill-date']==""){
		$bill = 'NULL';
	}else{
		$bill = $_POST['bill-date'];
	}

	//set the remaining variables that have been checked
	$description = $_POST['description'];
	$contact = $_POST['contact'];
	$start =	$_POST['start-date'];
	$status = $_POST['work-status'];

	$job_id = $_POST['job-id'];

	$edit_stmt->bindValue(':description', $description);
	$edit_stmt->bindValue(':contact', $contact);
	$edit_stmt->bindValue(':start', $start);
	$edit_stmt->bindValue(':end', $end);
	$edit_stmt->bindValue(':bill', $bill);
	$edit_stmt->bindValue(':percent', $percent);
	$edit_stmt->bindValue(':status', $status);

	$edit_stmt->bindValue(':jobid', $job_id);

	$edit_stmt->execute();
}else{
	//tell the user that mistakenly tried to access this page that they are not allowed to
	echo("this page cannot be loaded in a browser by itself<br/>");
	echo("please go to the <a href='/spreadsheet'>home page</a> to use this site");
}









