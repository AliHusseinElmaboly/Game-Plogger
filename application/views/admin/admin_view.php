<!-- ADMIN CONTENT -->
<table class="table table-striped">
		
		<?php if($games): ?>

		<tr>
			<th>Game Name</th>
			<th>Category</th>
			<th>Description</th>
			<th>Cover</th>
			<th>ScreenShot 1</th>
			<th>ScreenShot 2</th>
			<th>Google play</th>
			<th>Itunes</th>
		</tr>
		<?php foreach($games as $game) : ?>
				<tr>
					<td><a href="<?php echo base_URL(); ?>blog/edit_game/<?php echo $game->id; ?>"><?php echo $game->name; ?></a></td>
					<td><?php echo $game->type; ?></td>
					<td><?php echo $game->description; ?></td>
					<td><img src="<?php echo base_URL(); ?>/images/<?php echo $game->cover; ?>"  style="width:100px;height:100px;" /></td>
					<td><img src="<?php echo base_URL(); ?>/images/<?php echo $game->screenshot1; ?>"  style="width:100px;height:100px;" /></td>
					<td><img src="<?php echo base_URL(); ?>/images/<?php echo $game->screenshot2; ?>"  style="width:100px;height:100px;"/></td>
					<?php	if(!empty( $game->googleplay)) : ?>
					<td><button class="button" onclick="window.open('<?php echo $game->googleplay; ?>','_blank','resizable=yes')">Googleplay</button></td>
					<?php endif;?>
					<?php	if(!empty( $game->itunes)) : ?>
					<td><button class="button" onclick="window.open('<?php echo $game->itunes; ?>','_blank','resizable=yes')">Itunes</button></td>
					<?php endif;?>
				</tr>


			<?php endforeach; ?>
		<?php else : ?>
			<p>There are no games yet</p>
		<?php endif; ?>
</table>

<table class="table table-striped">

		<?php if($categories): ?>
			<tr>
				<th>Category Name</th>
			</tr>
			<?php foreach($categories as $category) : ?>
				<tr>
					<td><a href="<?php echo base_URL(); ?>blog/edit_category/<?php echo $category->id; ?>"><?php echo $category->type; ?></a></td>
				</tr>
			<?php endforeach; ?>
		<?php else : ?>
			<p>There are no Categories yet</p>
		<?php endif; ?>
</table>