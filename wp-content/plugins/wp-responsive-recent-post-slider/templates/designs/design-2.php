 <div class="post-slides">
	<div class="post-content-position">
	
	<!-- Content-left/right -->
	<div class="post-content-left medium-6 columns">
		<?php if($showCategory == "true") { ?>
	<div class="recentpost-categories">		
			<?php echo get_the_category_list( $separator, $parents, $post_id ); ?>
		</div>
	<?php } ?>
		  <h1 class="post-title">
					<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
			</h1>
			<?php if($showDate == "true") {  ?>	
			<div class="post-date">		
				<?php echo get_the_date(); ?>
				</div>				
					<?php } ?>
				<?php if($showContent == "true") {  ?>	
				<div class="post-content">
					<?php $excerpt = get_the_excerpt();?>
					<p><?php echo wprps_limit_words($excerpt,$words_limit); ?>...</p>
				</div>
				<?php } ?>
				</div>
				<div class="post-image-bg">
			<?php the_post_thumbnail('url'); ?>
			</div>
			</div>
	</div>