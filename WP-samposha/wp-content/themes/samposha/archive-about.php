<?php
/*
Template Name:ABOUT
*/

get_header();
?>






<body id="aboutPage">





  <?php get_template_part('include/header'); ?>





  <div id="wrapper">





    <section id="KV">
      <div class="Section deviceHeight">
        <div class="Contents widthL">
          <div class="bg"> 
            <div class="img bgAnim"></div>
          </div>
        </div>
      </div>
    </section>





    <main>




    
      <section id="Member">
        <div class="Section">
          <div class="Contents widthM">
            <h2>MEMBER</h2>
            <div class="Holder flex">

              <?php $args = array(
                'post_type' => 'member',
                'posts_per_page' => -1,
                'exclude' => get_the_ID()
              );
              $posts = get_posts( $args );
              if( $posts ) : foreach( $posts as $post ) : setup_postdata( $post ); ?>

              <div class="Block slideUp">
                <div class="imgArea">
                  <?php if(get_the_post_thumbnail( $id )): ?>
                    <div class="img" style="background-image: url('<?php echo get_the_post_thumbnail_url( $post->ID,'full' ); ?>')" data-img="<?php echo get_the_post_thumbnail_url( $post->ID,'full' ); ?>"></div>
                  <?php else: ?>
                    <div class="img" style="background-image: url('<?php bloginfo('template_url'); ?>/assets/img/aboutMemberNoimg.jpg')" data-img="<?php bloginfo('template_url'); ?>/assets/img/aboutMemberNoimg.jpg"></div>
                  <?php endif; ?>
                </div>
                <div class="textArea">
                  <div class="name" data-nameEN="<?php $nameEN = SCF::get('nameEN'); echo $nameEN; ?>"><?php the_title(); ?></div>
                  <div class="pos"><?php $position = SCF::get('position'); echo $position; ?></div>
                  <p><?php $details = SCF::get('details'); echo nl2br($details); ?></p>
                </div>
              </div>

              <?php endforeach; ?>
              <?php else : //記事が無い場合 ?>

              <?php endif;
              wp_reset_postdata(); //クエリのリセット ?>
           

            </div>
          </div>
        </div>
      </section>





      <?php get_template_part('include/footer'); ?>





    </main>
  </div>





  <div class="deviceHeight" id="popup">
    <div class="Section flexC">
      <div class="Contents widthM flex">
        <div class="img" style="background-image: url('<?php bloginfo('template_url'); ?>/assets/img/aboutMember01.jpg')"></div>
        <div class="textArea">
          <div class="name flex">
            <div class="JP">小野 裕之</div>
            <div class="EN">Hiroyuki Ono</div>
          </div>
          <div class="pos">代表取締役CEO</div>
          <p>1984年岡山県生まれ。中央大学総合政策学部卒。<br>ソーシャルデザインをテーマにしたウェブマガジン「greenz.jp」を運営する<br>NPO法人グリーンズの経営を6年務めた後、同法人のソーシャルデザインや<br>まちづくりに関わる事業開発・再生のプロデュース機能をO&G合同会社として分社化、代表に就任。<br>greenz.jpビジネスアドバイザー。ジュエリーブランドSIRI SIRI共同代表。<br>おむすびスタンド ANDON共同オーナー。下北沢のまちづくり会社 散歩社 代表取締役。<br>西粟倉のベンチャーsonraku社外取締役。発酵デザインラボ株式会社 取締役CFO。</p>
        </div>
        <div class="btn moreBtn">CLOSE</div>
      </div>
    </div>
  </div>





<?php get_footer(); ?>