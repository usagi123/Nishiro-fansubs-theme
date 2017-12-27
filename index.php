<?php get_header(); ?>

<section class="title">

  <?php
    if ( have_posts() ):
      while( have_posts() ): the_post (); ?>

      <h1><a href="<?php the_field('original_page_url'); ?>"><?php the_title(); ?></a></h1>
      <a href="<?php the_field('original_page_url'); ?>"><img id="post_img" src="<?php the_field('release_image'); ?>" alt=""></a>
      <?php the_content(); ?>
      <div class="index-left">
        <h2>
         <?php if(get_current_user_id() == get_the_author_meta('ID')) : ?>
            <a href="<?php echo get_edit_post_link(); ?>">Edit</a>
        <?php endif; ?>
        </h2>
      </div>

      <div class="index-right">
        <h2>
          <?php the_author(); ?>
        </h2>
      </div>
    <?php endwhile;?>
      <p><?php next_posts_link(); ?></p>
      <p><?php previous_posts_link(); ?></p>
    <?php endif;
  ?>

</section>

<?php get_footer(); ?>
