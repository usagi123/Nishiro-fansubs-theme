<?php
  if ( is_search() ) :
  	get_header( 'single' );
  else :
  	get_header();
  endif;
?>

<div class="padding-filler1">

</div>

<section class='meta_data'>
  <h1>Search result for <?php the_search_query(); ?> </h1>

  <?php
    if(have_posts() ):
      while(have_posts() ): the_post(); ?>
        <?php get_template_part('content','search'); ?>
      <?php endwhile;
    endif;
  ?>
</section>

<?php get_footer(); ?>
