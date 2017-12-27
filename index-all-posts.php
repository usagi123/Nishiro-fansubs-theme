<?php
/*
Template Name: Index all posts
*/
?>
<?php
  if ( is_single() ) :
  	get_header( 'header-single' );
  else :
  	get_header();
  endif;

  wp_head();
?>

<section class='title'>
  <h1><?php wp_title(''); ?></h1>
<div class="gridcontainer">

<?php

// Grid Parameters
$counter = 1; // Start the counter
$grids = 6; // Grids per row
$titlelength = 20; // Length of the post titles shown below the thumbnails

// The Query
$args=array (
	'post_type' => 'post',
	'posts_per_page' => -1
	);
$the_query = new WP_Query($args);

// The Loop
while ( $the_query->have_posts() ) :
	$the_query->the_post();

// Show all columns except the right hand side column
if($counter != $grids) :
?>
<div class="griditemleft">
  <h1 class="postimage-title">
    <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
    <?php if (mb_strlen($post->post_title) > $titlelength)
      { echo mb_substr(the_title($before = '', $after = '', FALSE), 0, $titlelength) . ' ...'; }
    else { the_title(); } ?>
    </a>
  </h1>
	<div class="postimage">
		<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><img src="<?php the_field('movie_image_header'); ?>"></a>
	</div><!-- .postimage -->
</div><!-- .griditemleft -->
<?php

// Show the right hand side column
elseif($counter == $grids) :
?>
<div class="griditemright">
  <h1 class="postimage-title">
		<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
		<?php if (mb_strlen($post->post_title) > $titlelength)
			{ echo mb_substr(the_title($before = '', $after = '', FALSE), 0, $titlelength) . ' ...'; }
		else { the_title(); } ?>
		</a>
	</h1>
	<div class="postimage">
		<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><img src="<?php the_field('movie_image_header'); ?>"></a>
	</div><!-- .postimage -->
</div><!-- .griditemright -->

<div class="clear"></div>
<?php
$counter = 0;
endif;
$counter++;
endwhile;
wp_reset_postdata();
?>

</div><!-- .gridcontainer -->
</section>

<?php get_footer(); ?>
