<?php get_header(); ?>
                <?php
                    if ( have_posts() ) {
                        while ( have_posts() ) :
                            the_post();
                            ?>
                                <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                                    <h2 class="entry-title"><?php the_title(); ?></h2>
                                    <div class="entry-content">
                                        <?php the_content(); ?>
                                    </div><!-- .entry-content -->
                                </div><!-- #post-<?php the_ID(); ?> -->
                        <?php endwhile;
                    }; // end of the loop. ?>
<?php get_footer(); ?>