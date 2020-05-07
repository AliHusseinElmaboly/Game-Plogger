<div>
	<?php 
		echo validation_errors();
		echo form_open("blog/submit_add_category");
	?>
	<div class = "form-group">
		<?php
			echo form_label("Category Name : ");
			$data = array(
				"name"=> "name",
				"id"=> "category",
				"type"=>"text",
				"placeholder"=> "Enter Category",
				"value"=> ""
			);
			echo form_input($data);
		?>
	</div>

	<div class = "form-group">
		<?php
			$extra ="class =\"btn btn-default\"";
			echo form_submit("submit","submit",$extra);
		?>
		<a href="<?php echo base_URL();?>blog/admin" class="btn btn-default">Cancel</a>

	</div>
	<?php
		echo form_close();
	?>
</div>