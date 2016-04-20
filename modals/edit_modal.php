<?PHP
  //creating a modal for the editing function
  //this is a one-time thing 
  //the information about what the designer and the job are is passed when the button calls it
?>
<div id="edit_modal" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
<?PHP 
	//adding the header
	//this will simply show what designer you are editing
	//the job for and give the user a box to exit out of the modal
?>
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
          		<h2 class="modal-title" id="edit-name-replace">ERROR</h2>
			</div>
<?PHP
	//the body of the edit modal
	//this will be populated with a set of inputs that resemble the add modal
	//except they are pre-filled for the user from what the entry in the table is
	//it will keep track of the job id and send all of the information to the database to be overwritten
	//everything will be changed if it is changed on this form
?>
			<div class="modal-body">
				<form class="form-horizontal">
					<div class="form-group">
			            <label class="control-label col-sm-2" for="edit-description">Description</label>
			            <div class="col-sm-10">
			              <input type="text" class="job_desc_field form-control" id="edit-description" name="edit-description"/>
			            </div>
			        </div>

			        <div class="form-group">
			            <label class="control-label col-sm-2" for="edit-contact">Contact</label>
			            <div class="col-sm-10">
			              <input type="text" class="job_cont_field form-control" id="edit-contact" name="edit-contact"/>
			            </div>
			        </div>

			         <div class="form-group">
			            <label class="control-label col-sm-2" for="edit-start">Start Date</label>
			            <div class="col-sm-10">
			              <input type="date" class="job_start_field form-control" id="edit-start" name="edit-start"/>
			            </div>
			        </div>

			         <div class="form-group">
			            <label class="control-label col-sm-2" for="edit-end">End Date</label>
			            <div class="col-sm-10">
			              <input type="date" class="job_end_field form-control" id="edit-end" name="edit-end"/>
			            </div>
			        </div>

			         <div class="form-group">
			            <label class="control-label col-sm-2" for="edit-bill">Bill Date</label>
			            <div class="col-sm-10">
			              <input type="date" class="job_bill_field form-control" id="edit-bill" name="edit-bill"/>
			            </div>
			        </div>

			         <div class="form-group">
			            <label class="control-label col-sm-2" for="edit-percent">Percent Done</label>
			            <div class="col-sm-10">
			              <input type="number" class="job_percent_field form-control" id="edit-percent" name="edit-percent"/>
			            </div>
			        </div>

			        <div class="work_status form-group"><label class="control-label col-sm-2" for="edit-status">Work Status</label>
			            <div class="col-sm-10">
			              <select name="edit-status" id="edit-status" class="form-control">
			                <option value="In Progress">In Progress</option>
			                <option value="On Hold">On Hold</option>
			                <option value="Waiting on Billing">Waiting on Billing</option>
			                <option value="Completed">Completed</option>
			              </select>
			            </div>
			        </div>
			    </form>
			</div>

<?PHP
	//the footer of the edit modal
	//this will be two different buttons like the add modal
	//a cancel button that will dismiss the modal
	//and a submit button that will post the changes to the database
?>
			<div class="modal-footer">
			 	<input type="text" id="edit-job-id" hidden readonly >
          		<button type="button" id="edit-submit" class="btn btn-default">Submit Changes</button>
          		<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
			</div>
<?PHP
	//closing off the modal
?>
		</div>
	</div>
</div>