<?php
/*
Template Name: Index all pages
*/ ?>

<?php get_header(); ?>

<section class="title">

  <?php
    if ( have_posts() ):
      while( have_posts() ): the_post (); ?>

      <h1><a href="<?php the_field('original_page_url'); ?>"><?php the_title(); ?></a></h1>
      <img src="<?php the_field('release_image'); ?>" alt="">
      <p><?php the_content(); ?></p>

    <?php endwhile;?>
      <p><?php next_posts_link(); ?></p>
      <p><?php previous_posts_link(); ?></p>
    <?php endif;
  ?>

</section>

<?php get_footer(); ?>
