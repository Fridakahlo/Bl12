<?php
/* Template Name: archive form */
get_header(); 

?>


<div id="content" class="site-content">

  <div class="container">

    <div class="content-left-wrap col-md-9">
      <div id="primary" class="content-area">
        <main id="main" class="site-main" role="main">
          <?php
            $tous_mes_champs = get_post_custom($post_id);
            die('hello');
          ?>
          
          <?php while ( have_posts() ) : the_post(); // standard WordPress loop. ?>
           <h1> <?php the_title(); ?></h1>
           <label> <echo $tous_mes_champs['first_name']; ?> </label>
          <?php endwhile; // end of the loop. ?>

        </main><!-- #main -->
      </div><!-- #primary -->
    </div>
    <div class="sidebar-wrap col-md-3 content-left-wrap">
      <?php get_sidebar(); ?>
    </div>

  </div><!-- .container -->
</div>

<?php get_footer(); ?>
