<?php

get_header(); ?>

<div id="content" class="site-content">

  <div class="container">

   <!--  <div class="content-left-wrap col-md-9">
      <div id="primary" class="content-area"> -->
        <main id="main" class="site-main" role="main">

          <h1>Annuaire</h1>
          
          <?php while ( have_posts() ) : the_post(); // standard WordPress loop. ?>
          
            <!-- <h3><?php the_title(); ?></h3> -->
            
            <div class="total_area">

              <div class="image_member">
                <img class="image_femme" src="/image-femme.jpeg" alt="woman" width="200" height="200">
              </div>

              <div class="text_member">

                <div class="company_name">
                    <h2 class="company"><?php echo get_post_meta( $post->ID, '_company_name', true ); ?></h2>
                </div>

                <div class="member_presentation">
                    <h3 class="fname"><?php echo get_post_meta( $post->ID, '_first_name', true ); ?></h3>
                    <h3 class="lname"><?php echo get_post_meta( $post->ID, '_last_name', true ); ?></h3>
                    <p class="separator">|</p>
                    <h3 class="ptitle"><?php echo get_post_meta( $post->ID, '_professional_title', true ); ?></h3>
                </div>

                <div class="description">
                  <p class="desc"><?php echo get_post_meta( $post->ID, '_description', true ); ?></p>
                </div>

                <div class="tel">
                  <p class="telephone"><?php echo get_post_meta( $post->ID, '_phone_number', true ); ?></p>
                </div>

                <div class="mail">
                  <p><?php echo get_post_meta( $post->ID, '_email', true ); ?></p>
                </div>
              
              </div>

            </div>

          <?php endwhile; // end of the loop. ?>

        </main><!-- #main -->
      </div><!-- #primary -->
    </div>
 <!--  </div>
</div> -->

<?php get_footer(); ?>
