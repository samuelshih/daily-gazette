 <div class="post-slides">
	<div class="post-overlay">
	<div class="post-image-bg">
		<?php the_post_thumbnail('url'); ?>
	</div>
	<?php if($showCategory == "true") { ?>
	<div class="recentpost-categories">		
			<?php echo get_the_category_list( $separator, $parents, $post_id ); ?>
		</div>
	<?php } ?>
	<div class="post-short-content">
	<div class="item-meta bottom">
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
		</div>
		</div>
	</div>