<?php
// Do not delete these lines
	if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Please do not load this page directly. Thanks!');

	if ( post_password_required() )
	{
		echo <<<HTML
	<div class="well">
		<h3>Password Protected</h3>
		<p>This post is password protected. Enter the password to view comments.</p>
	</div>
HTML;
		return;
	}
?>

<?php if (have_comments()): ?>
	<h3><?php comments_number( _e('No Comments'), 'One Comment', _e('% Comments') ); ?></h3>
	
<?php endif; ?>