<?php if($games) : ?>
	<?php foreach ($games as $game) : ?>
		<div class="blog-post">
			<h2 class="blog-post-title"><?php echo $game->name; ?></h2>
			<p class="blog-post-meta"><?php echo $game->description; ?></p>
			<p ><img src="<?php echo base_URL(); ?>/images/<?php echo $game->cover; ?>"  class="cover"></p>
			<a class="readmore" href="<?php echo base_URL(); ?>blog/game/<?php echo urlencode($game->id); ?>">More</a>
		</div><!-- /.blog-post -->
	<?php endforeach; ?>
<?php else : ?>
	<p>There are no games yet</p>
<?php endif; ?>
