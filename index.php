<?php get_header(); ?>
	<div class="span10">
	<?php if (have_posts()) : ?>
		<?php while (have_posts()) : the_post(); ?>
			<div class="well" id="post-<?php the_ID(); ?>">
				<h3><a href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a></h3>
				<?php the_content( __('Continue reading') . '&#8216;' . the_title('', '', false) . '&#8217; &raquo;' ); ?>
				
				<p>
					<?php
						if (function_exists('bootstrap_the_category')) { bootstrap_the_category(); }
						else { the_category(' '); }
					?>
				<?php the_tags('', ' ', '<br />'); ?></p>
				<p class="pull-right"><?php comments_popup_link(__('View Comments &raquo;'), __('View Comments &raquo;'), __('View Comments &raquo;'), 'btn btn-small'); ?></p>
				<small><?php the_time(get_option('date_format').' @ '.get_option('time_format')) ?>&nbsp;<?php _e('by') ?>&nbsp;<a href="<?php the_author_url(); ?>"><?php the_author() ?></a></small>
			</div>
		<?php endwhile; ?>
		
		<?php if (function_exists('wp_pagenavi')): ?>
			<?php wp_pagenavi(); ?>
		<?php else: ?>
			<ul class="pager pull-left span3">
				<li><?php next_posts_link(__('Older')) ?></li>
				<li><?php previous_posts_link(__('Newer')) ?></li>
			</ul>
		<?php endif; ?>
	<?php else : ?>
		<div class="well">
			<h2><?php _e('Not Found') ?></h2>
			<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
		</div>
	<?php endif; ?>
	</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>