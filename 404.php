<?php get_header(); ?>
<header class="cf">
  <div class="headerTop">
    <div class="inner cf">
      <h1 class="headerTtl"><?php echo get_post_meta($page->ID,'p-title',TRUE); ?></h1>
    </div>
  </div>
  <div class="headerBtm inner flex05">
    <div class="headerLogo"><a href="<?=home_url()?>/"><img src="<?=get_template_directory_uri()?>/img/logo/logo.svg" alt="医師と専門家が詳しく解説 血管の異常収縮の危険性"></a></div>
    <?php include( STYLESHEETPATH . '/inc/g_nav.php' ); ?>
  </div>
</header>

<div class="contents">
  <div class="inner cf">
    <div class="main">
      <div id="page">
        <h1>404 Not Found</h1>
        <p>お探しのページが見つかりませんでした。</p>
        <p><a href="<?php echo home_url(); ?>/">トップページへ戻る</a></p> 
      </div>
    </div>
    <?php get_sidebar(); ?>
  </div><!-- inner -->
</div><!-- contents -->

<?php get_footer(); ?>
</body>
</html>
