	<div class="span2"> <!-- @TODO:  -->
		<div class="well sidebar-nav">
			<?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar()): ?>
				<ul class="nav nav-list">
					<li class="nav-header"><?php _e('Archives') ?></li>
					<?php wp_get_archives('type=monthly'); ?>
				</ul>
				
				<ul class="nav nav-list">
					<li class="nav-header"><?php _e('Categories') ?></li>
					<?php wp_list_categories('orderby=name&title_li='); ?>
				</ul>
				
				<ul class="nav nav-list">
					<li class="nav-header"><?php _e('Meta') ?></li>
					<?php wp_register(); ?>
					<li><?php wp_loginout(); ?></li>
					<li><a href="http://validator.w3.org/check/referer" title="<?php _e('This page validates as XHTML 1.0 Transitional') ?>">Valid <abbr title="eXtensible HyperText Markup Language">XHTML</abbr></a></li>
					<li><a href="http://gmpg.org/xfn/"><abbr title="<?php _e('XHTML Friends Network') ?>">XFN</abbr></a></li>
					<li><a href="http://wordpress.org/" title="<?php _e('Powered by WordPress, state-of-the-art semantic personal publishing platform.')?> ">WordPress</a></li>
					<?php wp_meta(); ?>
				</ul>
			<?php endif; ?>
		</div>
	</div>
