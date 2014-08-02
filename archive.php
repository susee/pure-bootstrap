<?php
/**
 * Theme: Pure Bootstrap
 * The archive page template.
 * This is the template that displays an archive month.
 *
 * @package Pure Bootstrap
 * @since   Pure Bootstrap 1.0
 */
get_header(); ?>
  <div class="container main-content default-page">
    <div id="content" class="col-sm-9 col-md-9">
      <?php if ( single_month_title(' ', false) ): ?>
        <h2>Archive: <?php echo single_month_title(' ', false); ?></h2>
      <?php endif; ?>
      <?php while(have_posts()): the_post() ?>
        <div class="col-sm-6 col-md-6">
          <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <div class="thumbnail">
                <div class="crop half-col">
                  <a href="<?php the_permalink(); ?>">
                    <?php get_thumbnail_or_placeholder() ?>
                  </a>
                </div>
              <div class="caption">
                <div class="the-excerpt">
                  <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                  <p><?php the_excerpt(); ?></p>
                </div>
                <div class="post-meta">
                  <div class="entry-date">
                    By<a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" rel="author">
                      <?php printf( __( ' %s', 'pure-bootstrap' ), get_the_author() ); ?>
                    </a> on <?php echo get_the_date(); ?>
                  </div>
                  <div class="post-tags">
                    <?php
                      $posttags = get_the_tags();
                      if ($posttags) {
                        foreach($posttags as $tag) {
                          echo '<small><a href="'.get_tag_link($tag->term_id).'"> <i class="fa fa-tag"></i> '. $tag->name . '</a></small>'; 
                        }
                      }
                    ?>
                  </div>
                </div>
                <div>
                  <p>
                    <a href="<?php the_permalink(); ?>" class="btn btn-sm btn-primary" role="button">read more</a>
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>

      <?php endwhile; ?>
    </div>
    <?php get_sidebar(); ?>
  </div>
<?php get_footer(); ?>