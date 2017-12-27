<section class='search-result'>

  <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
  <p>
    <?php
      $content = get_the_content('Read more');
      print $content;
    ?><br>
    <small>Category: <?php the_category(' '); ?> | <?php the_tags(); ?> | Posted: <?php the_date('F j, Y'); ?> at <?php the_time('g:i a'); ?></small>
  </p>
</section>
