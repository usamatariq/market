

<?php // Applied Job | Withdraw Modal
echo'
<div id="withdraw-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
	<div class="modal-dialog modal-sm">		
		<div class="modal-content">
			
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;
				</button>
				<h4 id="withdraw-modal-name-field" class="modal-title"></h4>				
			</div>
			
			<div class="modal-body" style="text-align: center;">
				<h5 class="">Are you sure you want to withdraw?</h5>			
				<form action="Controller/job_unapply.php" method="post">
					<input id="withdraw-modal-id-field" class="hidden" type="" name="id" value=""/>
					<button type="submit" class="btn btn-danger">Withdraw</button>					
					<button type="button" class="btn" data-dismiss="modal">Cancel
					</button>
				</form>
			</div>	
		</div>
	</div>
</div>
';
?>

<?php // Applied Job | Delete Modal
echo'
<div id="deleteApplied-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
	<div class="modal-dialog modal-sm">		
		<div class="modal-content">
			
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;
				</button>
				<h4 id="deleteApplied-modal-name-field" class="modal-title"></h4>
			</div>
			
			<div class="modal-body" style="text-align: center;">
				<h5 class="">Are you sure you want to delete?</h5>			
				<form action="Controller/job_deleteUnapply.php" method="post">
					<input id="deleteApplied-modal-id-field" class="hidden" type="" name="id" value=""/>
					<button type="submit" class="btn btn-danger">Delete</button>					
					<button type="button" class="btn" data-dismiss="modal">Cancel
					</button>
				</form>
			</div>	
		</div>
	</div>
</div>
';
?>

<?php // Posted Job | Delete Modal
echo'
<div id="delete-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
	<div class="modal-dialog modal-sm">		
		<div class="modal-content">
			
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;
				</button>
				<h4 id="delete-modal-name-field" class="modal-title"></h4>
			</div>
			
			<div class="modal-body" style="text-align: center;">
				<h5 class="">Are you sure you want to delete?</h5>			
				<form action="Controller/job_close.php" method="post">
					<input id="delete-modal-id-field" class="hidden" type="" name="id" value=""/>
					<button type="submit" class="btn btn-danger">Delete</button>					
					<button type="button" class="btn" data-dismiss="modal">Cancel
					</button>
				</form>
			</div>	
		</div>
	</div>
</div>
';
?>

<?php // Posted Job | Edit Modal
echo'
<div id="edit-modal" class="modal fade modal-lg" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" >
	<div class="modal-dialog modal-lg">		
		<div class="modal-content col-md-10 col-md-offset-1">
			
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;
				</button>
				<h4 id="edit-modal-name-field" class="modal-title"></h4>
			
			</div>
			
			<div id="edit-modal-body" class="modal-body">
			</div>	
		</div>
	</div>
</div>
';
?>

<?php // Posted Job | Applicant Modal 
echo'
<div id="applicant-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
	<div class="modal-dialog modal-lg">		
		<div class="modal-content">
			
			<div class="modal-header">
				
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;
				</button>
				<h4 id="applicant-modal-name-field" class="modal-title"></h4>
				
			</div>
			
			<div id="applicant-modal-body" class="modal-body" >
			</div>	
		</div>
	</div>
</div>
';
?>

<?php // Posted Job | Remove Modal (Unused)
echo'
<div id="remove-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
	<div class="modal-dialog modal-sm">		
		<div class="modal-content">
			
			<div class="modal-header">		
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;
				</button>
				<h4 id="remove-modal-name-field" class="modal-title"></h4>			
			</div>
			
			<div class="modal-body" style="text-align: center;">
				<h5 class="">Are you Sure you want to remove?</h5>			
				<form action="Controller/job_remove.php" method="post">
					<input id="remove-modal-id-field" class="hidden" type="" name="id" value=""/>
					<button type="submit" class="btn btn-danger">Remove</button>					
					<button type="button" class="btn" data-dismiss="modal">Cancel
					</button>
				</form>
			</div>	
		</div>
	</div>
</div>
';
?>
