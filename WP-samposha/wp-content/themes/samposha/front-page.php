<?php get_header(); ?>






<body id="topPage">





  <?php get_template_part('include/loading'); ?>





  <?php get_template_part('include/header'); ?>





  <div id="wrapper">





    <section id="KV">
      <div class="Section deviceHeight">
        <div class="Contents widthL">
          <h1 class="Header fontJP">
            <div class="row">つくるまちをつくる。</div>
            <div class="row">そだつ店がそだつ。</div>
            <div class="row">つづける人とつづける。</div>
          </h1>
          <div class="bg"> 
            <div class="img bgAnim"></div>
          </div>
        </div>
      </div>
    </section>





    <main>





      <section id="Copy">
        <div class="Section">
          <div class="Contents widthM fontJP">
            <p class="fontAnim">あらゆるものがインターネットで<br class="sp">手に入るようになったいま、<br>人は、まちに一歩も出ていかなくても、<br class="sp">生きていけるようになりました。</p>
            <p class="fontAnim">それでも、きっと、散歩が必要です。<br>身体だけではなく、<br class="sp">心の健康のためにも。</p>
            <p class="fontAnim">それでは、わざわざ散歩に<br class="sp">出かけたくなるようなまちは、<br>どんなまちか？</p>
            <p class="fontAnim">私たち散歩社は、<br class="sp">「つくるまち」だと考えます。<br>オープンして完成、ではなく、<br>そこにいる人たちが、<br class="sp">何かをつくり続けているようなまち。</p>
            <p class="fontAnim">「つくるまち」には<br class="sp">「そだつ店」があります。<br>チェーン店のように確立された<br class="sp">ビジネスモデルはないけれど、<br>個人による小さな挑戦が<br class="sp">いつも繰り返され、<br>訪れる人たちの応援のもと、<br class="sp">少しずつそだっていくような店。</p>
            <p class="fontAnim">そして、そこには<br class="sp">「つづける人」がいます。<br>ずっと昔からまちに関わりつづけている人。何十年もお店をつづけている人。<br>そこに新しい価値をつくって、そうしたまちの歴史の流れに、交わっていく人。</p>
            <p class="fontAnim">つくるまちをつくる。<br>そだつ店とそだつ。<br>つづける人とつづける。</p>
            <p class="fontAnim">それがわたしたち、散歩社の役割です。</p>
          </div>
        </div>
      </section>





      <section id="About"> 
        <div class="Section"> 
          <div class="Contents widthM">
            <h2>ABOUT US </h2>
            <div class="Holder flex">
              <p class="slideLeft">散歩社は、「つくるまちをつくる。そだつ店とそだつ。つづける人とつづける。」<br>をコンセプトに、空間づくり、まちづくりを行うマイクロデベロッパーです。<br>鉄道会社やデベロッパー、自治体などからのご依頼を受け、個性あるお店を増やし、<br>小～中規模の物件や、エリアの価値を上げるお手伝いをします。<br>お店のスタートアップを応援することや、<br>まちのコミュニケーションを活性化しそれらをコンテンツ化することも得意としています。</p>
              <a class="moreBtn slideRight" href="<?php echo home_url(); ?>/about">READ MORE</a>
            </div>
          </div>
        </div>
      </section>





      <section id="Service"> 
        <div class="Section"> 
          <div class="Contents widthM">
            <h2>SERVICE</h2>
            <div class="Holder flex">
              <div class="textArea slideLeft">
                <p>小～中規模の物件およびエリアの<br>総合プロデュース事業（マイクロディベロップメント事業）</p>
                <ul> 
                  <li>コンセプト設計、コンテンツディレクション、クリエイティブディレクション</li>
                  <li>マスターリース／サブリース、リーシング営業</li>
                  <li>店舗プロデュース・運営</li>
                  <li>エリアコミュニケーション</li>
                  <li>イベントの企画・運営</li>
                  <li>紙、ウェブなど制作物のディレクション・制作</li>
                  <li>展示空間の演出・什器制作・インストール</li>
                </ul>
                <p>店舗運営者向けの講座・メディア事業</p>
              </div>
              <div class="imgArea slideRight"><img src="<?php bloginfo('template_url'); ?>/assets/img/serviceImg.jpg"></div>
            </div>
          </div>
        </div>
      </section>





      <section id="Projects"> 
        <div class="Section"> 
          <div class="Contents widthM">
            <h2>PROJECTS</h2>

            <div class="Holder flex">

              <?php $args = array(
                'post_type' => 'projects',
                'posts_per_page' => -1,
                'exclude' => get_the_ID()
              );
              $posts = get_posts( $args );
              if( $posts ) : foreach( $posts as $post ) : setup_postdata( $post ); ?>

              <a class="Block slideUp" href="<?php the_permalink(); ?>">
                <div class="imgArea">
                  <?php if(get_the_post_thumbnail( $id )): ?>
                  <div class="img" style="background-image: url('<?php echo get_the_post_thumbnail_url( $post->ID,'full' ); ?>');"></div>
                  <?php else: ?>
                  <?php endif; ?>
                </div>
                <div class="textArea"> 
                  <div class="ttl"><?php the_title(); ?></div>
                  <div class="subttl">
                    <?php $subttl = SCF::get('subttl'); echo $subttl; ?><br>
                    <?php $freespace = SCF::get('freespace'); echo $freespace; ?>
                  </div>
                  <p><?php $copy = SCF::get('copy'); echo nl2br($copy); ?></p>
                </div>
              </a>


              <?php endforeach; ?>
              <?php else : //記事が無い場合 ?>

              <?php endif;
              wp_reset_postdata(); //クエリのリセット ?>

            </div>
          </div>
        </div>
      </section>





      <section id="News"> 
        <div class="Section"> 
          <div class="Contents widthM">
            <h2>NEWS</h2>
            <div class="Holder slideUp"></div>
          </div>
        </div>
      </section>




      <?php get_template_part('include/footer'); ?>




      
    </main>
  </div>





<?php get_footer(); ?>