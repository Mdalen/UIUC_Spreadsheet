<?PHP
  //creating an add modal
  //this will be a one time thing
  //it will be passed arguments from the calling button to make up for this
?>
  <div id="add_modal" class="modal fade" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
<?PHP
  //adding the header
  //it descripes which designer gets the new addition
  //and gives a button to exit the dialog
?>
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h2 class="modal-title" id="add-name-replace">ERROR</h2>
        </div>
<?PHP
  //adding the body
  //this is the meat of this modal, with a form to submit to the ajax call 
  //which will create the new database entry
?>
        <div class="modal-body">
          <form id="add-form" class="form-horizontal" role="form">
<?PHP
          //the name or description of the job
?>
          <div class="form-group">
            <label class="control-label col-sm-2" for="description">Description</label>
            <div class="col-sm-10">
              <input type="text" class="job_desc_field form-control" name="add_description"/>
            </div>
          </div>
<?PHP
          //the primary contact, who the job is for
?>
          <div class="form-group">
            <label class="control-label col-sm-2" for="contact">Contact</label>
            <div class="col-sm-10">
              <input type="text" class="job_cont_field form-control" name="add_contact"/>
            </div>
          </div>
<?PHP
          //the input for the starting date of the job
?>
          <div class="start_date form-group">
            <label class="control-label col-sm-2" for="start_date">Start Date</label>
            <div class="col-sm-10"><input type="date" class="form-control" name="add_start_date"/></div>
          </div>
<?PHP
          //the input for the end date(if applicable)
?>
          <div class="end_date form-group">
            <label class="control-label col-sm-2" for="end_date">End Date (N/A)</label>
            <div class="col-sm-10"><input type="date" class="form-control" name="add_end_date"/></div>
          </div>
<?PHP
          //the input for the bill date(if aplicable)
?>
          <div class="bill_date form-group">
            <label class="control-label col-sm-2" for="bill_date">Billed On (N/A)</label>
            <div class="col-sm-10"><input type="date" class="form-control" name="add_bill_date"/></div>
          </div>
<?PHP
          //the input for the percent the work is done(default is 0)
?>
          <div class="percent_done form-group">
            <label class="control-label col-sm-2" for="percent_done">Percent Done</label>
            <div class="col-sm-10"><input type="number" class="form-control" name="add_percent_done" min="0" max="100"/></div>
          </div>
<?PHP
          //the input for the current status of the work
          //drop down of possible conditions(in progress, on hold, etc)
?>
          <div class="work_status form-group"><label class="control-label col-sm-2" for="add_work_status">Work Status</label>
            <div class="col-sm-10">
              <select name="work_status" id="add-work-status" class="form-control">
                <option value="in_progress">In Progress</option>
                <option value="on_hold">On Hold</option>
                <option value="waiting_on_billing">Waiting on Billing</option>
                <option value="done">Completed</option>
              </select>
            </div>
          </div>
<?PHP
          //and that is the end of the form
?>
          </form>
       </div>

        <div class="modal-footer">
<?PHP
        //the submit button for the form
?>
          <input type="text" id="add-design-id" readonly hidden>
          <button type="button" id="add-submit" class="btn btn-default">Add Record</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        </div>
      </div>
    </div>
  </div>
