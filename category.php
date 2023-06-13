<?php get_header(); ?>
<?php
$catid    = get_query_var( 'cat' );
$parents  = get_category_parents( $catid, false, '/', true );
$page_id  = get_page_by_path( $parents );
$page_id  = $page_id->ID;
$post     = get_post( $page_id );
?>
<header class="cf">
  <div class="headerTop">
    <div class="inner cf">
      <h1 class="headerTtl"><?php echo get_post_meta($page_id,'p-title',TRUE); ?></h1>
      <div class="pageTit"><?php the_title(); ?></div>
    </div>
  </div>
  <div class="headerBtm inner flex05">
    <div class="headerLogo"><a href="<?=home_url()?>/"><img src="/wp/wp-content/uploads/main_logo1.png" alt="知っててよかった！山口大学医学部小林教授が詳しく解説_血管の異常収縮"></a></div>
    <?php include( STYLESHEETPATH . '/inc/g_nav.php' ); ?>
  </div>
</header>

<div class="contents">
  <div class="inner">
    <?php the_breadcrumb() ?>
  </div>
  <?php $page = get_post( $page_id ); ?>
  <?php if(isset( $page_id )): ?>
    <?php echo replace_body($post->post_content); ?>
  <?php else: ?>
  <div class="inner cf">
    <div class="main">
      <p><?php echo single_cat_title('', false); ?>の固定ページが設定されておりません。</p>
    </div>
    <?php endif; ?> 
  <?php wp_reset_postdata(); ?>
  <?php get_sidebar(); ?>
  </div><!-- inner -->
</div><!-- contents -->

<?php get_footer(); ?>
</body>
</html>