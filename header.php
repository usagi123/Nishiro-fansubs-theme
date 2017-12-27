<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php bloginfo('title'); ?></title>
    <?php wp_head(); ?>
</head>

<body>
    <div id="wrapper">
      <section class="banner">
          <img src="https://i.imgur.com/vsjydYA.jpg" alt>
      </section>

      <header>
        <div class="header-inner">
          <nav>
              <ul>
                  <?php wp_nav_menu(array('theme_location'=>'primary')); ?>
              </ul>
          </nav>
        </div>
      </header>
