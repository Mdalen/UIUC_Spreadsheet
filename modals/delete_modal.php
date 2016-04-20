<?PHP
 //creating the delete modal
  //this will be the only one, and the job id will be filled in when it is called
?>
  <div id="delete_modal" class="modal fade" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
<?PHP
  //adding the header, describing what the action is, and giving a button to exit out
  //from this dialog
?>
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h2 class="modal-title delete-name">ERROR</h2>
        </div>
<?PHP
  //the main body
  //this will contain the warning text to display to the user
?>
        <div class="modal-body">
         <h3>Warning:</h3>
         <h4>This will permanently remove this item from the database.</h4>
         <h4>There is no undoing this action.</h4>
         <h4>Are you sure you want to continue?</h4>
        </div>
<?PHP
  //the footer
  //this will have the options "yes" or "no"
  //as to whether or not the user wants to continue with deleting the record
?>
        <div class="modal-footer">
          <form id="delete-form">
<?PHP
            //a non-editable input to keep track of what job it is that we're deleting
            //this is hidden, and is used only as a reference to be sent off in the form
?>
            <input type="text" name="delete-job-id" id="delete-id" value="something" readonly hidden/>
            <button type="button" class="btn btn-danger btn-delete" id="delete-yes">Yes</button>
<?PHP
            //the no button has no effect on the form, it is just in this div for styling purposes
?>
            <a type="button" class="btn btn-success" data-dismiss="modal">No</a>
          </form>
        </div>

      </div>
    </div>
  </div>