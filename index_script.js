$(function(){

	//a function to resize the elements on the psuedo-table based on the size of their sister elements
	//now we can also do this for anything else that we want to mark for resizing
	function resizeElements(){
		$(".resize_element").each(function(){
			var height = $(this).parent().children(".resize_base").height();
			$(this).height(height);
		});
	}


	//the functions for the delete modal
	//the method to pass information to the delete modal when it is called to open
	$("#delete_modal").on("show.bs.modal", function(e){
		var fullName = $(e.relatedTarget).data("name");
		var job_id = $(e.relatedTarget).data("job-id");

		$(".delete-name").html("Deleting entry from "+fullName);
		$("#delete-id").val(job_id);
	});

	//the method to handle when the yes buton is clicked
	//it sends out an ajax call, and if successful, it hides the row referenced in the delete call
	$("#delete-yes").click(function(){
		//it grabs the value from the job id hidden field
		var sendId = $("input[name=delete-job-id]").val();
		
		$.ajax(
			{url:"db_ops/delete.php", 
			data: {"job-id": sendId},
			type: "post",
			success: function(result){
				location.reload();
			}});
	});

	//the functions for the edit modal
	//the method to pass the information to the mdal and set it when it is clicked
	$("#edit_modal").on("show.bs.modal", function(e){
		//getting the info from the call
		var edit_fullName = $(e.relatedTarget).data("name");
		var edit_job_id = $(e.relatedTarget).data("job-id");
		
		//filling in the elements on the modal
		$("#edit-name-replace").html("Editing an entry for "+edit_fullName);
		$("#edit-job-id").val(edit_job_id);

		//we get the values of that row that was selected 
		var desc_val = $("#description_"+edit_job_id).text();
		var contact_val = $("#contact_"+edit_job_id).text();
		var start_val = $("#start_"+edit_job_id).text();
		var end_val = $("#end_"+edit_job_id).text();
		var bill_val = $("#bill_"+edit_job_id).text();
		var percent_val = parseInt($("#percent_"+edit_job_id).text().replace("%", ""), 10);
		var status_val = $("#status_"+edit_job_id).text();

		
		//now, we populate the fields in the form
		$("#edit-description").val(desc_val);
		$("#edit-contact").val(contact_val);
		$("#edit-start").val(start_val);
		$("#edit-end").val(end_val);
		$("#edit-bill").val(bill_val);
		$("#edit-percent").val(percent_val);
		$("#edit-status").val(status_val);
	});

	//the method to handle the Change button being clicked
	//it sends out an ajax call, and if successful, it will change the information in the desired row to what was in the form
	$("#edit-submit").click(function(){
		var edit_description = $("#edit-description").val();
		var edit_contact = $("#edit-contact").val();
		var edit_start = $("#edit-start").val();
		var edit_end = $("#edit-end").val();
		var edit_bill = $("#edit-bill").val();
		var edit_percent = $("#edit-percent").val();
		var edit_status = $("#edit-status").val();

		var edit_job_id = $("#edit-job-id").val();

		if(edit_description!=""&&edit_contact!=""&&edit_start!=""&&edit_status!=""){
			$.ajax({
				url: "db_ops/edit.php",
				type: "post",
				data: {"description": edit_description,
						"contact": edit_contact,
						"start-date": edit_start,
						"percent-done": edit_percent,
						"work-status": edit_status,
						"end-date": edit_end,
						"bill-date": edit_bill,
						"job-id" : edit_job_id},
				success: function(result){
					location.reload();
			}});
		}else{
			alert("You need to have a description, contact, start date, and work status to submit this form.");
		}


	});

	//the functions for the add modal 
	//the method to pass information to the modal when it is called
	$("#add_modal").on("show.bs.modal", function(e){
		var add_fullName = $(e.relatedTarget).data("name");
		var add_design_id = $(e.relatedTarget).data("designer");
		

		$("#add-name-replace").html("Adding an entry for "+add_fullName);
		$("#add-design-id").val(add_design_id);
	});

	//the method to handle the add button being clicked
	//it will send out an ajaxa call, and on success it will create a new row in the proper division with the specified information
	$("#add-submit").click(function(){
		var add_description = $("input[name=add_description]").val();
		var add_contact = $("input[name=add_contact]").val();
		var add_start_date = $("input[name=add_start_date]").val();
		var add_end_date = $("input[name=add_end_date]").val();
		var add_bill_date = $("input[name=add_bill_date").val();
		var add_percent_done = $("input[name=add_percent_done]").val();
		var add_work_status = $("#add-work-status option:selected").text();

		var add_design_id = $("#add-design-id").val();

		if(add_end_date==""){add_end_date="NULL"}
		if(add_bill_date==""){add_bill_date="NULL"}
		
		if(add_description!=""&&add_contact!=""&&add_start_date!=""&&add_work_status!=""){
			$.ajax({
				url: "db_ops/add.php",
				type: "post",
				data: {"description": add_description,
						"contact": add_contact,
						"start-date": add_start_date,
						"designer-id": add_design_id,
						"percent-done": add_percent_done,
						"work-status": add_work_status,
						"end-date": add_end_date,
						"bill-date": add_bill_date},
				success: function(result){
					location.reload();
				}});
		}else{
			alert("You need to include a description, contact, start date, and work status to add a project.");
		}
	});

	//calling the resize function after every time the window size is changed
	resizeElements();
	$(window).resize(resizeElements());
});