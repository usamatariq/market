<div id="postjob" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" >
<div class="modal-dialog modal-sm">
<div class="modal-content col-md-10 col-md-offset-1">
	<div class="modal-header ">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel"><b>Rent Item</b></h4>
    </div>
    
	<div class="modal-body">
		<form name="jobform" action="/danceseen/JOB/Controller/job_add.php" method="post">
			<div class="" style="">

				<div id="jobTitleinput" class="form-group jobTitleinput">	
					<b>Item</b> 	
					<input id="jobTitle" type="text" class="form-control form-control-job jobTitle" name="job_title" placeholder="What are you renting">
				</div>
			
				<div id="jobTypeinput" class="form-group">
				<b>Category</b>	<select type="text" class="form-control form-control-job" name="job_type"   >
						  <option value="1">Electronics</option>
						  <option value="2">Computer & Accessories</option>
						  <option value="3">Tools & Equipment</option>
						  <option value="9">Others</option>
						</select>				
				</div>
					
				
				<div id ="" class="form-group">
					<b>Rental</b>	
						<div class="input-group">
									<div class="input-group-addon">S$</div>	
									<input id="jobPayInput" type="text" class="form-control form-control-job" name="job_pay">
									<div class="input-group-addon">/</div>
									<select id="" type="text" class="form-control form-control-job" name="">
										<option value="0">day</option>
										<option value="1">week</option>
										<option value="2">month</option>
									</select>
						</div>						
				</div>
				
				<div id ="" class="form-group">
					<b>Deposit</b>	
						<div class="input-group">
									<div class="input-group-addon">S$</div>	
									<input id="" type="text" class="form-control form-control-job" name="" placeholder="">
						</div>						
				</div>
				
				<!--
				<div class="col-xs-6 padding-none" style="padding-left:15px;">
				<div id="jobClose" class="form-group">
					<b>Closing Date  </b><span class="hidden badge-round">?</span> 
						
						<input id="jobCloseInput" type="text" class="hidden form-control form-control-job" name="job_enddate" "autocomplete="off">
						
						<fieldset disabled><input id="jobCloseShow" type="text" class="form-control form-control-job"></fieldset>
						
				</div>
				</div>
				-->
				
				<div class="col-xs-6 padding-none" >
				<div class="form-group">
					<b>Area</b> 	
						<input type="text" class="form-control form-control-job" name="job_venue" placeholder="">
				</div>
				</div>
				
				<div class="col-xs-6 padding-none" style="padding-left:15px;">
				<div class="form-group">
					<b>Location</b> 	<fieldset disabled><input type	="text" value="Singapore" class="form-control form-control-job"></fieldset>
				</div>
				</div>
				
				<div class="form-group" id="jobDescription">				
					<b>Description</b> <textarea class="form-control" id="jobDescriptionInput" rows="5" name="job_description" style="width:100%" placeholder="Tell us more about your item!"></textarea>			
				</div>
			</div>
			
			<div class="checkbox" id="jobTerms">
				<label>
				  <input name="terms" id="jobTermsInput" type="checkbox" value="haha">I agree to the <a href="/danceseen/terms.php" target="_blank">Terms & Conditions</a>
				</label>
			</div>
			<div>
			<input id="job_post" type="button" class="button button-default btn btn-success" value="List Item" onclick="submitForm(this.form);setFormSubmitting2();"/>
			</div>
			
		</form>	
    </div>
      
</div>
</div>
</div>
<script type='text/javascript' src="/danceseen/js/job_validation.js"></script>
<script type='text/javascript' src="/danceseen/js/job_alert.js"></script>
<script type='text/javascript' src="/danceseen/js/date_pick.js"></script>
