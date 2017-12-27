<?php
/*
Template Name: Tutorial
*/ ?>

<?php get_header(); ?>

<div class="topic_image">
  <img id="portrait" src="<?php the_field('topic_img_portrait'); ?>" alt="">
  <img id="landscape"src="<?php the_field('topic_img_landscape'); ?>" alt="">
  <?php
    if(have_posts() ):
      while(have_posts() ): the_post(); ?>
        <h1><?php the_title(); ?></h1>
        <h2><?php the_content(); ?></h2>
      <?php endwhile;
    endif;
  ?>
</div>

<?php the_field('contents') ?>

<div class="meta_data">
  Added by: <a href="get_author_posts_url( get_the_author_meta( 'ID' ) );"><?php the_author(); ?></a> | On <?php the_date('F j, Y'); ?> at <?php the_time('g:i a'); ?>
</div>

<div class="padding-filler1">

</div>

<?php comments_template(); ?>

<div class="padding-filler2">

</div>

<?php get_footer(); ?>
