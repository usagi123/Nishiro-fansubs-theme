<?php get_header(); ?>

<div class="padding-filler3">

</div>

<div class="title">
  <?php
    if(have_posts() ):
      while(have_posts() ): the_post(); ?>
        <h1><a href="<?php the_field('original_page_url'); ?>"><?php the_title(); ?></a></h1>
        <a href="<?php the_field('original_page_url'); ?>"><img id="portrait" src="<?php the_field('release_image'); ?>" alt=""></a>
        <h2><?php the_content(); ?></h2>
      <?php endwhile;
    endif;
  ?>

</div>

<div class="meta_data">
  Added by: <?php the_author(); ?> | On <?php the_date('F j, Y'); ?> at <?php the_time('g:i a'); ?> <br>
</div>

<div class="padding-filler1">

</div>

<?php get_footer(); ?>
