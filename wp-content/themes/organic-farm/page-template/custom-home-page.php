<?php
/**
 * Template Name: Custom Home Page
 */
get_header(); ?>

<main id="content">
  <?php if( get_theme_mod('organic_farm_slider_arrows') != ''){ ?>
    <section id="slider">
      <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel"> 
        <?php
          for ( $i = 1; $i <= 4; $i++ ) {
            $mod =  get_theme_mod( 'organic_farm_post_setting' . $i );
            if ( 'page-none-selected' != $mod ) {
              $organic_farm_slide_post[] = $mod;
            }
          }
           if( !empty($organic_farm_slide_post) ) :
          $args = array(
            'post_type' =>array('post','page'),
            'post__in' => $organic_farm_slide_post
          );
          $query = new WP_Query( $args );
          if ( $query->have_posts() ) :
            $i = 1;
        ?>
        <div class="carousel-inner" role="listbox">
          <?php  while ( $query->have_posts() ) : $query->the_post(); ?>
          <div <?php if($i == 1){echo 'class="carousel-item active"';} else{ echo 'class="carousel-item"';}?>>
            <img src="<?php esc_url(the_post_thumbnail_url('full')); ?>"/>
            <div class="carousel-caption">
              <h2 class="text-left"><?php the_title();?></h2>
              <div class="home-btn text-left my-4">
                <a class="py-3 px-4" href="<?php the_permalink(); ?>"><?php echo esc_html('Read More','organic-farm'); ?></a>
              </div>
            </div>
          </div>
          <?php $i++; endwhile;
          wp_reset_postdata();?>
        </div>
        <?php else : ?>
        <div class="no-postfound"></div>
          <?php endif;
        endif;?>
          <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon p-3" aria-hidden="true"><i class="fas fa-angle-left"></i></span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon p-3" aria-hidden="true"><i class="fas fa-angle-right"></i></span>
          </a>
      </div>
      <div class="clearfix"></div>
    </section>
  <?php }?>

  <?php if( get_theme_mod('organic_farm_middle_sec_settigs') != ''){ ?>
    <section id="middle-sec">
      <div class="container">
        <div class="row">
          <?php
            for ( $organic_farm_s = 1; $organic_farm_s <= 3; $organic_farm_s++ ) {
              $mod =  get_theme_mod( 'organic_farm_middle_sec_settigs' . $organic_farm_s );
              if ( 'page-none-selected' != $mod ) {
                $organic_farm_post[] = $mod;
              }
            }
             if( !empty($organic_farm_post) ) :
            $args = array(
              'post_type' =>array('post','page'),
              'post__in' => $organic_farm_post
            );
            $query = new WP_Query( $args );
            if ( $query->have_posts() ) :
              $organic_farm_s = 1;
          ?>
          <?php  while ( $query->have_posts() ) : $query->the_post(); ?>
            <div class="col-lg-4 col-md-4">
              <div class="inner-box p-3 text-center text-md-left text-lg-left">
                <div class="row">
                  <div class="col-lg-4 col-md-12">
                    <img src="<?php esc_url(the_post_thumbnail_url('full')); ?>"/>
                  </div>
                  <div class="col-lg-8 col-md-12 pl-lg-0">
                    <h4><a href="<?php the_permalink(); ?>"><?php the_title();?></a></h4>
                    <p class="mb-0"><?php $excerpt = get_the_excerpt(); echo esc_html( organic_farm_string_limit_words( $excerpt, 8 )); ?></p>
                  </div>
                </div>
              </div>
            </div>
          <?php $organic_farm_s++; endwhile;
          wp_reset_postdata();?>
          <?php else : ?>
          <div class="no-postfound"></div>
            <?php endif;
          endif;?>
        </div>
      </div>
    </section>
  <?php }?>

  <?php if( get_theme_mod('organic_farm_product_box_page') != ''){ ?>
    <section id="product-box" class="my-5">
      <div class="container">
        <?php
          $mod =  get_theme_mod( 'organic_farm_product_box_page' );
          if ( 'page-none-selected' != $mod ) {
            $organic_farm_product_page[] = $mod;
          }
          if( !empty($organic_farm_product_page) ) :
          $args = array(
            'post_type' =>array('page'),
            'post__in' => $organic_farm_product_page
          );
          $query = new WP_Query( $args );
          if ( $query->have_posts() ) :
        ?>
        <?php  while ( $query->have_posts() ) : $query->the_post(); ?>
          <h3 class="text-center mb-3"><?php the_title(); ?></h3>
          <div class="ico-border my-4 mx-auto"><i class="fab fa-envira text-center"></i></div>        
          <?php the_content(); ?>
        <?php $s++; endwhile;
        wp_reset_postdata();?>
        <?php else : ?>
        <div class="no-postfound"></div>
          <?php endif;
        endif;?>
      </div>
    </section>
  <?php }?>
</main>

<?php get_footer(); ?>