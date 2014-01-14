<div class="artists form">
  	<?php echo $this->Form->create('Artist'); ?>
		<fieldset>
			<legend><?php echo __('Add Artist'); ?></legend>

			<div class="form-group">
		    	<label for="inputEmail3" class="col-sm-2 control-label">Name</label>
		    	<div class="col-sm-10">
		      		<input type="text" class="form-control" id="inputName3" placeholder="Name" name="data[Artist][name]">
		    	</div>
		 	 </div>
		</fieldset>
		<div class="form-group">
	    	<div class="col-sm-offset-2 col-sm-10">
	      		<button type="submit" class="btn btn-default">Submit</button>
	    	</div>
	  	</div>
	</form>
</div>
