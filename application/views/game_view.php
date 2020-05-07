<div class="blog-post">
	<h2 class="blog-post-title"><?php echo $game->name; ?></h2>
	<p class="blog-post-meta"><?php echo $game->description; ?></p>
	<div>
	<img src="<?php echo base_URL(); ?>/images/<?php echo $game->cover; ?>"  class="cover">
	</div>
	<img src="<?php echo base_URL(); ?>/images/<?php echo $game->screenshot1; ?>"  class="screenshot">
	<img src="<?php echo base_URL(); ?>/images/<?php echo $game->screenshot2; ?>"  class="screenshot">
	<div >
	<?php	if(!empty( $game->googleplay) && $device_os == "android") : ?>
		<button class="button" onclick="window.open('<?php echo $game->googleplay; ?>','_blank','resizable=yes')">Download Now</button>
	<?php endif;?>
	<?php	if(!empty( $game->itunes) && $device_os == "ios") : ?>
		<button class="button" onclick="window.open('<?php echo $game->itunes; ?>','_blank','resizable=yes')">Download Now</button>
	<?php endif;?>
	</div>
</div><!-- /.blog-post -->