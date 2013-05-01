<?php
/**
 * The template for displaying the footer.
 *
 * Contains footer content and the closing of the
 * #main and #page div elements.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
?>
	</div></div><!-- #main .wrapper -->

<div id="botsl-wrap">
    <div class="main-botsl">
        <?php if ( is_active_sidebar( 'botsl-module' ) ) : ?>
            <?php dynamic_sidebar( 'botsl-module' ); ?>
   	    <?php endif; ?>
    </div>
</div>
