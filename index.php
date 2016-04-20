<!DOCTYPE html>
<html lang="en">
<head>
  <title>Design Group Project List</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
  <link rel="stylesheet" href="spreadsheet_style_1.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="bootstrap/js/bootstrap.min.js"></script>

  <link rel="icon" type="image/png" sizes="96x96" href="icon/favicon.ico">
</head>
<body>

<div class="container-fluid header-container">

	<div class="row">
		<div class="col-sm-12 header"><h2 class="header_text">Design Group Project List</h2></div>
	</div>
</div>

<div class="container-fluid">
<?php

  //grab the connection and save it to $db
  //everything is handled by the script
  //you just need to include db_conn and db_info in the directory and include db_conn
  include 'db_ops/db_conn.php';

  //create the statement to grab all the designers from the designer table
  $stmt = $db->query('SELECT * FROM designers');

  //grab all the rows from the previous statement
  $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

  //set an incremented variable to keeo track of which designer we're on
  $designer_loop_num = 1;

  foreach ($rows as $row){

  	//combine the first and last name
  	//for ease of displaying later on
  	$full_name = $row['first_name'].' '.$row['last_name'];

  	//assign variables to keep track of the first and last names
  	//in case we need to use them later on
  	$first_name = $row['first_name'];
  	$last_name = $row['last_name'];
  	$designer_id=$row['designer_id'];

  	//break down which designer it is
  	//and use that information to assign the proper class to the rows we make
  	switch($designer_loop_num){
  		case 1:
  			$color = 'red_div';
  			break;
  		case 2:
  			$color = 'blue_div';
  			break;
  		case 3:
  			$color = 'green_div';
  			break;
  		case 4:
  			$color = 'yellow_div';
  			break;
  		case 5:
  			$color = 'orange_div';
  			break;
  		default:
  			$color = 'purple_div';
  	}
    $designer_loop_num++;
  //the first two rows will be sticky at the top once they are scrolled past
  //when one is sticky, and another needs to be, the old one will go away

  //the first row, with only the designer's first and last name
  //this will be only done once per designer
?>
<div id="section_<?PHP echo($designer_id);?>">
  <div class="row <?PHP echo($color);?>">
    <div class="spacer col-sm-1 resize_element"></div>
      <div class="col-sm-10 header resize_base"><h2 class="header_text"><?PHP echo($full_name);?></h2></div>
 	  <div class="spacer col-sm-1 resize_element"></div>
  </div>

<?php
  //the second row, with the headers for the different parts of the table
 	//this is also only executed once per designer
?>
 	<div class="row text-center <?PHP echo($color);?>">
    <div class="spacer col-sm-1 resize_element"></div>
 	  <div class="col-sm-2 header resize_element"><h4 class="header_text">Project Description</h4></div>
 	  <div class="col-sm-1 header resize_element"><h4 class="header_text"> Start Date </h4></div>
 	  <div class="col-sm-1 header resize_element"><h4 class="header_text"> End Date </h4></div>
 	  <div class="col-sm-1 header resize_element"><h4 class="header_text"> Date Billed </h4></div>
 	  <div class="col-sm-2 header resize_element"><h4 class="header_text"> Primary Contact </h4></div>
 	  <div class="col-sm-1 header resize_base"><h4 class="header_text"> Percent Completion </h4></div>
 	  <div class="col-sm-1 header resize_element"><h4 class="header_text"> Work Status </h4></div>
  	<div class="col-sm-1 header resize_element"><h4 class="header_text"> Actions </h4></div>
 	  <div class="spacer col-sm-1 resize_element"></div>
 	</div>


 <?php
  //now come the part that is repeated over and over
 	//first, we grab every job with that matches the current designer
 	$job_stmt = $db->query('SELECT * FROM jobs WHERE designer_id= '.$row['designer_id']);
 	//then we get all of the rows, and give it a different name
 	//we will still need $row[] for the designer rows, so we need something else
 	$job_rows = $job_stmt->fetchAll(PDO::FETCH_ASSOC);

 	//then, we call a foreach on the results and build a row for each of the returned rows

 	//the for index and even/odd string is simply to keep track of, and make pretty zebra tables
 	$for_index=0;
 	$even_or_odd='even';
 	foreach($job_rows as $job_row){
 		//code that will separate them into even and odd rows for a nice looking zebra table
 		if($for_index%2==0){
 			$even_or_odd='even';
 		}
 		else{
 			$even_or_odd='odd';
 		}
?>
 		<div class="row text-center <?PHP echo($color." ");?> <?PHP echo($even_or_odd);?>" id="row_<?PHP echo($job_row['job_id']);?>">
      <div class="spacer col-sm-1 resize_element"></div>
 		  <div class="col-sm-2 resize_base "><p class="bold"id="description_<?PHP echo($job_row['job_id']);?>"><?PHP echo($job_row['description']);?><br/></p></div>
 		  <div class="col-sm-1 resize_element "><p id="start_<?PHP echo($job_row['job_id']);?>"><?PHP echo($job_row['start_date']);?></p></div>
 		  <div class="col-sm-1 resize_element "><p id="end_<?PHP echo($job_row['job_id']);?>"><?PHP echo($job_row['end_date']);?></p></div>
 		  <div class="col-sm-1 resize_element "><p id="bill_<?PHP echo($job_row['job_id']);?>"><?PHP echo($job_row['bill_date']);?></p></div>
 		  <div class="col-sm-2 resize_element "><p id="contact_<?PHP echo($job_row['job_id']);?>"><?PHP echo($job_row['primary_contact']);?></p></div>
 		  <div class="col-sm-1 resize_element "><p class="badge" id="percent_<?PHP echo($job_row['job_id']);?>"><?PHP echo($job_row['percent_done']);?>%</p></div>
 		  <div class="col-sm-1 resize_element "><p id="status_<?PHP echo($job_row['job_id']);?>"><?PHP echo($job_row['work_status']);?></p></div>
 		  <div class="col-sm-1 resize_element">
        <a href="#edit_modal" data-toggle="modal" data-name="<?PHP echo($full_name);?>" data-job-id="<?PHP echo($job_row['job_id']);?>" class="btn btn-primary btn-xs">Edit</a>
 		    <a href="#delete_modal" data-toggle="modal" data-name="<?PHP echo($full_name);?>" data-job-id="<?PHP echo($job_row['job_id']);?>" class="btn btn-primary btn-xs">Delete</a>
      </div>
 		  <div class="spacer col-sm-1 resize_element"></div>
    </div>

    <?PHP
 		$for_index++;
 	}
 	//the last row of each designer's section
 	//this is the add button, while will bring up a menu to add an entry into the pseudo-table.
 	//this is only done once per designer
  ?>
 	<div class="row text-center <?PHP echo($color);?>" id="add_button_<?PHP echo($designer_id);?>">
    <div class="spacer col-sm-1 resize_element"></div>
   	<div class="resize_base col-sm-10 header">
      <a href="#add_modal" data-toggle="modal" data-name="<?PHP echo($full_name);?>" data-designer="<?PHP echo($designer_id);?>" class="btn btn-primary btn-lg add-btn">Add a job for <?PHP echo($full_name);?></a>
    </div>
    <div class="spacer col-sm-1 resize_element"></div>
  </div>
</div>

<?PHP
 	//creating the edit modal for each of the designers
 	//this will be their personal edit modal, for their jobs
 }

include "modals/add_modal.php";

include "modals/edit_modal.php";

include "modals/delete_modal.php";
?>

</div>

<script src="index_script.js"></script>

</body>
</html>
