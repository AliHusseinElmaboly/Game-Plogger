				</div><!-- /.blog-main -->
				<div class="col-sm-3 col-sm-offset-1 blog-sidebar">
					<div>
						<h3>Categories</h3> 
						<?php if($categories): ?>
							<ol class="pager">
								<?php foreach ($categories as $object) :  ?>
									<li><a href="<?php echo base_URL(); ?>blog/games/<?php echo urlencode($object->id); ?>"><?php echo $object->type; ?></a></li>
								<?php endforeach; ?>
							</ol>
						<?php else : ?>
							<p>There are no Categories yet </p>
						<?php endif; ?>
					</div>
				</div><!-- /.blog-sidebar -->
			</div><!-- /.row -->
		</div><!-- /.container -->

		<div class="blog-footer">
			<p>
				<a  href="#">Back to top</a>
			</p>
		</div>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min,js"></script>
		<script src="<?php echo base_URL(); ?>js/bootstrap.js"></script>
	</body>
</html>