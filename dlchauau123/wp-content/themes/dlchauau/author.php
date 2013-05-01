<?php
/**
 * The template for displaying Category pages.
 *
 * Used to display archive-type pages for posts in a category.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */

get_header(); ?>

	<section id="primary" class="site-content">
		<div id="content" role="main">
        <?php if(function_exists('rdfa_breadcrumb')){ rdfa_breadcrumb(); } ?>
		<?php if ( have_posts() ) : ?>
			<header class="archive-header">
				<h1 class="archive-title"><?php printf( __( 'Author: <a href="https://plus.google.com/u/0/101388668814399121525?rel=author"">admin</a>', 'twentytwelve' ), '<span>' . single_cat_title( '', false ) . '</span>' ); ?></h1>

			<?php if ( category_description() ) : // Show an optional category description ?>
				<div class="archive-meta"><?php echo category_description(); ?></div>
			<?php endif; ?>
			</header><!-- .archive-header -->

			<?php
			/* Start the Loop */
			while ( have_posts() ) : the_post();

				/* Include the post format-specific template for the content. If you want to
				 * this in a child theme then include a file called called content-___.php
				 * (where ___ is the post format) and that will be used instead.
				 */
				//get_template_part( 'content', get_post_format() );
                
                ?>
                
                <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        		<?php if ( is_sticky() && is_home() && ! is_paged() ) : ?>
        		<div class="featured-post">
        			<?php _e( 'Featured post', 'twentytwelve' ); ?>
        		</div>
        		<?php endif; ?>
        		<div class="entry-header">
                    <?php //the_post_thumbnail(array(200,140)); ?>  
                    <?php echo clean_wp_width_height(get_the_post_thumbnail(get_the_ID(),'medium')); ?>                         
        			<?php if ( is_single() ) : ?>
        			<h1 class="entry-title"><?php the_title(); ?></h1>
        			<?php else : ?>
        			<h2 class="entry-title">
        				<a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'twentytwelve' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark"><?php the_title(); ?></a>
        			</h2>
        			<?php endif; // is_single() ?>
                    
                    
        			<?php twentytwelve_entry_meta(); ?>
        			<?php edit_post_link( __( 'Edit', 'twentytwelve' ), '<span class="edit-link">', '</span>' ); ?>
        			<?php if ( is_singular() && get_the_author_meta( 'description' ) && is_multi_author() ) : // If a user has filled out their description and this is a multi-author blog, show a bio on their entries. ?>
        				<div class="author-info">
        					<div class="author-avatar">
        						<?php echo get_avatar( get_the_author_meta( 'user_email' ), apply_filters( 'twentytwelve_author_bio_avatar_size', 68 ) ); ?>
        					</div><!-- .author-avatar -->
        					<div class="author-description">
        						<h2><?php printf( __( 'About %s', 'twentytwelve' ), get_the_author() ); ?></h2>
        						<p><?php the_author_meta( 'description' ); ?></p>
        						<div class="author-link">
        							<a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" rel="author">
        								<?php printf( __( 'View all posts by %s <span class="meta-nav">&rarr;</span>', 'twentytwelve' ), get_the_author() ); ?>
        							</a>
        						</div><!-- .author-link	-->
        					</div><!-- .author-description -->
        				</div><!-- .author-info -->
        			<?php endif; ?>
   		            <!-- .entry-meta -->
                    
                    <?php if ( is_search() ) : // Only display Excerpts for Search ?>
            		<div class="entry-summary">
            			<?php the_excerpt(); ?>
            		</div><!-- .entry-summary -->
            		<?php else : ?>
            		<div class="entry-content">
                        <?php echo substr(strip_tags($post->post_content), 0, 200).'...';?>
            			<?php //the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'twentytwelve' ) ); ?>
            			<?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'twentytwelve' ), 'after' => '</div>' ) ); ?>
            		</div><!-- .entry-content -->
            		<?php endif; ?>
       
                    
        		</div><!-- .entry-header -->
        
        		
        	</div><!-- #post -->
                
                <?php

			endwhile;

			?>
<?php wp_pagenavi(); ?>
		<?php else : ?>
			<?php get_template_part( 'content', 'none' ); ?>
		<?php endif; ?>

		</div><!-- #content -->
	</section><!-- #primary -->

<?php get_sidebar(); ?>
<?php require_once('botsl.php'); ?>
<?php get_footer(); ?>