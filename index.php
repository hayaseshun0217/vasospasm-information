<?php get_header(); ?>
<?php
$page_id = get_page_by_path( 'top-page' , 'lp_epa' );


$page    = get_post( $page_id );
?>
<header class="cf">
  <div class="headerTop">
    <div class="inner cf">
		<h1 class="headerTtl"><?php echo get_post_meta($page->ID,'p-title',TRUE); ?></h1>
    </div>
  </div>
  <div class="headerBtm inner flex05">
    <div class="headerLogo"><img src="/wp/wp-content/uploads/main_logo2.png" alt="知っててよかった！山口大学小林教授が詳しく解説_血管の異常収縮"></div>
    <?php include( STYLESHEETPATH . '/inc/g_nav.php' ); ?>
  </div>
</header>

<div class="contents">
  <?php $page = get_post( $page_id ); ?>
  <?php echo replace_body($page->post_content); ?>
    <?php get_sidebar(); ?>
	</div><!-- inner -->
</div><!-- contents -->

<?php get_footer(); ?>
<?php wp_footer(); ?>
</body>
</html>
