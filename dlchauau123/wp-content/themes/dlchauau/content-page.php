<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
?>

	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<header class="entry-header">
		<h1 class="entry-title"><?php the_title(); ?></h1>
	<?php twentytwelve_entry_meta(); ?><g:plusone size="medium"></g:plusone>

    	<div class="fb-like" data-href="<?php the_permalink(); ?>" data-send="true" data-layout="button_count" data-width="100" data-show-faces="true"></div>

    	<div id="fb-root"></div>

    		<script>(function(d, s, id) {

    			var js, fjs = d.getElementsByTagName(s)[0];

    			if (d.getElementById(id)) return;

    			js = d.createElement(s); js.id = id;

    			js.src = "//connect.facebook.net/vi_VN/all.js#xfbml=1&appId=499957860023910";

    			fjs.parentNode.insertBefore(js, fjs);

    		}(document, 'script', 'facebook-jssdk'));

    		</script>
	</header><!-- .entry-header -->

		<div class="entry-content">
			<?php the_content(); ?>
			<?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'twentytwelve' ), 'after' => '</div>' ) ); ?>
		</div><!-- .entry-content -->
		<footer class="entry-meta">
			<?php edit_post_link( __( 'Edit', 'twentytwelve' ), '<span class="edit-link">', '</span>' ); ?>
		</footer><!-- .entry-meta -->
	</article><!-- #post -->
