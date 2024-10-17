<?php get_header(); ?>






<body id="projectsDetails">





  <?php get_template_part('include/header'); ?>





  <div id="wrapper">





    <main>





      <section id="Projects"> 
        <div class="Section"> 
          <div class="Contents widthL">
            <div class="Holder flex">
              <div class="Header">
                <div class="textArea"> 

                  <h2 class="ttl"><?php the_title(); ?></h2>
                  
                  <div class="subttl slideUp">
                    <?php $subttl = SCF::get('subttl'); echo $subttl; ?><br>
                    <?php $freespace = SCF::get('freespace'); echo $freespace; ?>
                  </div>
 
                  <?php if(get_the_post_thumbnail( $id )): ?>
                    <img class="slideUp sp" src="<?php echo get_the_post_thumbnail_url( $post->ID,'full' ); ?>">
                  <?php else: ?>
                  <?php endif; ?>

                  <?php
                    $detailsGP = SCF::get('detailsGP');
                    foreach ($detailsGP as $fields ) {
                    ?>
                    <p class="slideUp"><?php echo nl2br($fields['details']); ?></p>
                  <?php } ?>

                  <ul class="slideUp">
                  <?php
                    $linkArea = SCF::get('linkArea');
                    foreach ($linkArea as $fields ) {
                    ?>
                    <li><a class="targetBlank" href="<?php echo $fields['url']; ?>"><?php echo $fields['medium']; ?></a></li>
                  <?php } ?>
                  </ul>

                </div>
              </div>
            </div>

            <div class="GalleryBlock">
            <?php
            $GalleryGP = SCF::get('GalleryGP');
            foreach ($GalleryGP as $fields ) {
              $imgurl = wp_get_attachment_image_src($fields['Gallery'] , 'full');
            ?>
              <img class="slideUp" src="<?php echo $imgurl[0]; ?>">
            <?php } ?>
            </div>

          </div>
        </div>
      </section>





      <?php get_template_part('include/footer'); ?>





    </main>
  </div>





<?php get_footer(); ?>