<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="utf-8">
    <meta name="language" content="ja">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta http-equiv="Content-Type" content="application/xhtml+xml; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <meta name="format-detection" content="telephone=no">

    <link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/assets/css/app.min.css">
    <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/assets/css/vendor/reset.min.css">

    <?php if (  is_front_page() ||  is_home() ) : ?>
    <link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/assets/css/loading.min.css">
    <?php endif; ?>
    
    <!-- favicon -->
    <link rel="apple-touch-icon" sizes="57x57" href="<?php bloginfo('template_url'); ?>/assets/img/favicon/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="<?php bloginfo('template_url'); ?>/assets/img/favicon/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="<?php bloginfo('template_url'); ?>/assets/img/favicon/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="<?php bloginfo('template_url'); ?>/assets/img/favicon/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="<?php bloginfo('template_url'); ?>/assets/img/favicon/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="<?php bloginfo('template_url'); ?>/assets/img/favicon/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="<?php bloginfo('template_url'); ?>/assets/img/favicon/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="<?php bloginfo('template_url'); ?>/assets/img/favicon/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="<?php bloginfo('template_url'); ?>/assets/img/favicon/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192" href="<?php bloginfo('template_url'); ?>/assets/img/favicon/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php bloginfo('template_url'); ?>/assets/img/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="<?php bloginfo('template_url'); ?>/assets/img/favicon/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php bloginfo('template_url'); ?>/assets/img/favicon/favicon-16x16.png">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="<?php bloginfo('template_url'); ?>/assets/img/favicon/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
    
    <!-- adobe fonts -->
    <script>
      (function(d) {
      var config = {
      kitId: 'lhy2cor',
      scriptTimeout: 3000,
      async: true
      },
      h=d.documentElement,t=setTimeout(function(){h.className=h.className.replace(/\bwf-loading\b/g,"")+" wf-inactive";},config.scriptTimeout),tk=d.createElement("script"),f=false,s=d.getElementsByTagName("script")[0],a;h.className+=" wf-loading";tk.src='https://use.typekit.net/'+config.kitId+'.js';tk.async=true;tk.onload=tk.onreadystatechange=function(){a=this.readyState;if(f||a&&a!="complete"&&a!="loaded")return;f=true;clearTimeout(t);try{Typekit.load(config)}catch(e){}};s.parentNode.insertBefore(tk,s)
      })(document);
    </script>

    <?php wp_head(); ?>

  </head>
</html>
