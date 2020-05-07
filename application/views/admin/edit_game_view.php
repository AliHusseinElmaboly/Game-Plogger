<div>
	<?php 
		echo validation_errors();
		$game_id = $game->id;
		echo form_open_multipart("blog/submit_edit_game/".$game_id);
	?>
	<div class = "form-group">
		<?php
			echo form_label("Game Name : ");
			$data = array(
				"name"=> "name",
				"type"=>"text",
				"class"=>"form-control",
				"placeholder"=> "Enter Game Name",
				"value"=> $game->name
			);
			echo form_input($data);
		?>
	</div>


	<div class = "form-group">
		<?php
			echo form_label("Game Description : ");
			$data = array(
				"name"=> "description",
				"type"=>"text",
				"class"=>"form-control",
				"placeholder"=> "Enter Game Description",
				"value"=> $game->description
			);
			echo form_textarea($data);
		?>
	</div>


	<div class="form-group">
		<?php
			echo form_label("Category : ");
		?>
		<select name="category" class="form-control">
			<?php foreach($categories as $category) :?>
				<?php 
					if($post->category == $category->id)
					{
						$selected = 'selected';
					}
					else
					{
						$selected = '';
					}
				?>
				<option  value="<?php echo $category->id; ?>"  <?php echo $selected; ?>> <?php echo $category->type; ?></option>	
			<?php endforeach; ?>

		</select>
	</div>	

	<div class = "form-group">
		<?php
			echo form_label("Google play : ");
			$data = array(
				"name"=> "googleplay",
				"type"=>"text",
				"class"=>"form-control",
				"placeholder"=> "Enter Google play URL",
				"value"=> $game->googleplay
			);
			echo form_input($data);
		?>
	</div>


	<div class = "form-group">
		<?php
			echo form_label("Itunes : ");
			$data = array(
				"name"=> "itunes",
				"type"=>"text",
				"class"=>"form-control",
				"placeholder"=> "Enter Itunes URL",
				"value"=> $game->itunes
			);
			echo form_input($data);
		?>
	</div>

	<div class = "form-group">
		<?php
			$extra = "class =\"btn btn-default\"";
			echo form_submit("submit","submit",$extra);
		?>
		<a href="<?php echo base_URL();?>blog/admin" class="btn btn-default">Cancel</a>
		<a href="<?php echo base_URL();?>blog/delete_game/<?php echo $game_id; ?>">Delete</a>
	</div>
	<?php
		echo form_close();
	?>
</div>