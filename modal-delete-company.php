
<div id="delete_company<?php echo $id; ?>" class="modal modal-delete modal-fixed-footer modal-delete">
    <div class="modal-content">
      <h5>Are you sure you want to delete this company?</h5>
    </div>
    <div class="modal-footer">
    <a class="waves-effect waves-light btn green" href="delete-company.php<?php echo '?id=' . $id; ?>"><i class="fa fa-check" aria-hidden="true"></i>&nbsp;Yes</a>
			<button class="modal-close waves-effect waves-light btn red" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times" aria-hidden="true"></i>&nbsp;Close</button>
    </div>
  </div>

