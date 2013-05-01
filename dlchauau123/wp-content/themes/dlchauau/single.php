<?php
/**
 * The Template for displaying all single posts.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */

get_header(); ?>

	<div id="primary" class="site-content">
		<div id="content" role="main">

			<?php while ( have_posts() ) : the_post(); ?>
                <?php if(function_exists('rdfa_breadcrumb')){ rdfa_breadcrumb(); } ?>
				<?php get_template_part( 'content', get_post_format() ); ?>

				<nav class="nav-single">
					<h3 class="assistive-text"><?php _e( 'Post navigation', 'twentytwelve' ); ?></h3>
					<span class="nav-previous"><?php previous_post_link( '%link', '<span class="meta-nav">' . _x( '&larr;', 'Previous post link', 'twentytwelve' ) . '</span> %title' ); ?></span>
					<span class="nav-next"><?php next_post_link( '%link', '%title <span class="meta-nav">' . _x( '&rarr;', 'Next post link', 'twentytwelve' ) . '</span>' ); ?></span>
				</nav><!-- .nav-single -->

<?php
    $categories = get_the_category($post->ID);
    if ($categories)
    {
        $category_ids = array();
        foreach($categories as $individual_category) $category_ids[] = $individual_category->term_id;
 
        $args=array(
        'category__in' => $category_ids,
        'post__not_in' => array($post->ID),
        'showposts'=>5, // Số bài viết bạn muốn hiển thị.
        'caller_get_posts'=>1
        );
        $my_query = new wp_query($args);
        if( $my_query->have_posts() )
        {
            echo '<h3>Bài viết liên quan</h3><ul>';
            while ($my_query->have_posts())
            {
                $my_query->the_post();
                ?>
                <li class="tin-lien-quan"><a href="<?php the_permalink() ?>" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></li>
                <?php
            }
            echo '</ul>';
        }
    }
?>

			<?php endwhile; // end of the loop. ?>

		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>

<?php require_once('botsl.php'); ?>
<?php get_footer(); ?>