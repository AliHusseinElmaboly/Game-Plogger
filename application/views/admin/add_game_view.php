<div>
	<?php 
		echo validation_errors();
		echo form_open_multipart("blog/submit_add_game");
	?>
	<div class="form-group">
		<?php
			echo form_label("Game Name : ");
			$data = array(
				"name"=> "name",
				"type"=>"text",
				"class" => "form-control",
				"placeholder"=> "Enter Game Name",
				"value"=> ""
			);
			echo form_input($data);
		?>
	</div>

	<div class="form-group">
		<?php
			echo form_label("Game Description : ");
			$data = array(
				"name"=> "description",
				"type"=> "text",
				"class" => "form-control",
				"placeholder"=> "Enter Game Description",
			);
			echo form_textarea($data);
		?>
	</div>

	<div class="form-group">
		<?php
			echo form_label("Category : ");
		?>
		<select name="category" class="form-control">
			<?php foreach($categories as $object) : ?>
				<option  value="<?php echo $object->id; ?>" ><?php echo $object->type; ?></option>	
			<?php endforeach;?>
		</select>
	</div>

	<div class="form-group">
		<?php
			echo form_label("Google play : ");
			$data = array(
				"name"=> "googleplay",
				"type"=>"text",
				"class" => "form-control",
				"placeholder"=> "Enter Google play URL",
				"value"=> ""
			);
			echo form_input($data);
		?>
	</div>

	<div class="form-group">
		<?php
			echo form_label("Itunes : ");
			$data = array(
				"name"=> "itunes",
				"type"=>"text",
				"class" => "form-control",
				"placeholder"=> "Enter Itunes URL",
				"value"=> ""
			);
			echo form_input($data);
		?>
	</div>

	<div class="form-group">
		<?php 
			echo form_label("Cover : ");
				$data = array(
				"name"=> "cover",
				"size"=> "20"
			);
			echo form_upload($data);
		?>
	</div>

	<div class="form-group">
		<?php 
			echo form_label("Screenshot 1: "); 
			$data = array(
				"name"=> "screenshot1",
				"size"=> "20"
			);
			echo form_upload($data);
		?>
	</div>

	<div class="form-group">
		<?php 
			echo form_label("Screenshot 2: ");
			$data = array(
				"name"=> "screenshot2",
				"size"=> "20"
			);
			echo form_upload($data);
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