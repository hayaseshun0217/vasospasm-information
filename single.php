<?php
  $category = get_the_category();
  $cat_id   = $category[0]->cat_ID;
  $cat_name = $category[0]->cat_name;
  $cat_slug = $category[0]->category_nicename;
?>
<?php
if($cat_slug == "symptom") {
  get_header('symptom');
}elseif($cat_slug == "lp") { ?>




<!DOCTYPE html>
<html lang="ja" prefix="og: http://ogp.me/ns#">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo meta_set('title'); ?></title>
<meta name="description" content="<?php echo meta_set('description'); ?>">
<meta name="keywords" content="<?php echo meta_set('keyword'); ?>">
<meta name="format-detection" content="telephone=no">
<meta name="robots" content="noindex">

<!-- 共通項目 -->
<meta property="og:locale" content="ja_JP" />
<meta property="og:type" content="article" />
<meta property="og:title" content="<?php echo meta_set('title'); ?>" />
<meta property="og:url" content="<?=home_url().$_SERVER["REQUEST_URI"]; ?>" />
<meta property="og:image" content="" />
<meta property="og:site_name"  content="<?php echo get_option('blogname'); ?>" />
<meta property="og:description" content="<?php echo meta_set('description'); ?>" />

<!-- CSS -->
<link href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" rel="stylesheet">

<link rel="stylesheet" href="<?=get_template_directory_uri()?>/normalize.css">
<link rel="stylesheet" href="<?=get_template_directory_uri()?>/symptom/css/common.css">
<?php if ( is_page() ) : ?>
<?php elseif( is_category() ) : ?>
<link rel="stylesheet" href="<?=get_template_directory_uri()?>/symptom/css/home.css">
<?php else : ?>
<!-- <link rel="stylesheet" href="<?=get_template_directory_uri()?>/single.css"> -->
<?php endif; ?>

<link rel="stylesheet" href="<?=get_template_directory_uri()?>/symptom/css/style.css">

<!-- Analytics -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script>
<?php include( STYLESHEETPATH . '/inc/ga.php' ); ?>
</script>
<?php include( STYLESHEETPATH . '/inc/supervisor.php' ); ?>

<!--[if lt IE 9]>
<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->

<script src="<?=get_template_directory_uri()?>/symptom/js/common.js"></script>
<script src="<?=get_template_directory_uri()?>/js/ofi.min.js"></script>
<script src="<?=get_template_directory_uri()?>/js/jquery.matchHeight.js"></script>

<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-N46R222');</script>
<!-- End Google Tag Manager -->

<!-- User Heat Tag -->
<script type="text/javascript">
(function(add, cla){window['UserHeatTag']=cla;window[cla]=window[cla]||function(){(window[cla].q=window[cla].q||[]).push(arguments)},window[cla].l=1*new Date();var ul=document.createElement('script');var tag = document.getElementsByTagName('script')[0];ul.async=1;ul.src=add;tag.parentNode.insertBefore(ul,tag);})('//uh.nakanohito.jp/uhj2/uh.js', '_uhtracker');_uhtracker({id:'uhIuozKuUp'});
</script>
<!-- End User Heat Tag -->

</head>

<body id="top" <?php body_class(); ?>>
<?php include( STYLESHEETPATH . '/inc/ga2.php' ); ?>

<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-N46R222"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->

<?php
} else {
  get_header();
}
?>
<header class="cf">
  <div class="headerTop">
    <div class="inner cf">
      <?php if($cat_slug != "symptom"||$cat_slug != "lp"): ?>
        <h1 class="headerTtl"><?php echo get_post_meta($post->ID,'s-title',TRUE); ?></h1>
      <?php endif; ?>
      <div class="pageTit">これってもしかして、血管の異常収縮？症状から見る原因と改善方法</div>
    </div>
  </div>
  <?php if($cat_slug == "symptom"): ?>
    <div class="headerBtm inner cf">
      <div class="headerLogo"><a href="<?=home_url()?>/symptom/"><img src="<?=get_template_directory_uri()?>/symptom/img/logo/logo.svg" alt="これってもしかして、血管の異常収縮？症状から見る原因と改善方法"></a></div>
      <!--<ul class="snsLink flex04 headerSns pc">
      <li class="fb"><a href="https://www.facebook.com/sharer/sharer.php?u=https://<?= $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"]; ?>" onclick="window.open(this.href, 'FBwindow', 'width=650, height=450, menubar=no, toolbar=no, scrollbars=yes'); return false;"><i class="fab fa-facebook-f"></i></a></li>
      <li class="ln"><a href="http://line.me/R/msg/text/?https://<?= $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"]; ?>" onclick="window.open(this.href, 'LNwindow', 'width=650, height=450, menubar=no, toolbar=no, scrollbars=yes'); return false;"><img src="<?=get_template_directory_uri()?>/symptom/img/ico/ico_line.png" alt="LINE"></a></li>
      <li class="tw"><a href="https://twitter.com/share?url=https://<?= $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"]; ?>" onclick="window.open(this.href, 'TWwindow', 'width=650, height=450, menubar=no, toolbar=no, scrollbars=yes'); return false;"><i class="fab fa-twitter"></i></a></li>
      <li class="gp"><a href="http://getpocket.com/edit?url=https:// <?= $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"]; ?>" onclick="window.open(this.href, 'BMwindow', 'width=650, height=450, menubar=no, toolbar=no, scrollbars=yes'); return false;" target="_blank"><i class="fab fa-get-pocket"></i></a></li>
      <li class="hb"><a href="http://b.hatena.ne.jp/add?url=https://<?= $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"]; ?>" onclick="window.open(this.href, 'BMwindow', 'width=650, height=450, menubar=no, toolbar=no, scrollbars=yes'); return false;" target="_blank"><img src="<?=get_template_directory_uri()?>/symptom/img/ico/ico_hatebu.png" alt="hatebu"></a></li>
      </ul>-->







<?php if( in_category(symptom) ) : ?>
<time itemprop="dateModified">最終更新日:<?php the_modified_date('Y年n月j日'); ?></time>&nbsp;&nbsp;<time itemprop="datePublished">投稿日:<?php the_time('Y年n月j日'); ?></time>
<?php else://他のページ ?>
<?php endif; ?>




  <?php elseif($cat_slug == "lp"): ?>
    <div class="headerBtm inner cf">
      <div class="headerLogo"><img src="<?=get_template_directory_uri()?>/symptom/img/logo/logo.svg" alt="これってもしかして、血管の異常収縮？症状から見る原因と改善方法"></div>

  <?php else: ?>
    <div class="headerBtm inner flex05">
      <div class="headerLogo"><a href="<?=home_url()?>/"><img src="<?=get_template_directory_uri()?>/img/logo/logo.svg" alt="知っててよかった！山口大学医学部小林教授が詳しく解説_血管の異常収縮"></a></div>
      <?php include( STYLESHEETPATH . '/inc/g_nav.php' ); ?>
  <?php endif; ?>
    </div>
</header>

<div class="contents">
  <div class="inner cf">
    <div class="main">

         <?php if($cat_slug == "symptom"): ?>
      <div id="pankuzu" >
          <span><a href="/symptom/"><span>これって血管の異常収縮？症状一覧</span></a></span>&nbsp;&gt;&nbsp;<span><span><?php the_title(); ?></span></span>
      </div>
      <?php elseif($cat_slug == "lp"): ?>

      <?php endif; ?>

      <?php if($cat_slug == "symptom"||$cat_slug == "lp") {
        } else {
        echo the_breadcrumb();
      } ?>
      <?php $page = get_post( $page_id ); ?>
      <?php echo replace_body($page->post_content); ?>




  <?php if($cat_slug == "symptom"): ?>




    <?php
    $id_array = array();
    if (get_field('recommend_id1')) {
      $id_array[] = get_field('recommend_id1');
    }
    if (get_field('recommend_id2')) {
      $id_array[] = get_field('recommend_id2');
    }
    if (get_field('recommend_id3')) {
      $id_array[] = get_field('recommend_id3');
    }
    $count = count($id_array);
    if ($count != 0) { ?>


      <div class="mainArchive">

        <p class="ttl">ほかにこんな症状で悩んでいませんか？</p>

          <ul> <?php
            foreach($id_array as $pid) { ?>


              <li class="archive cf">

                <a href="<?php the_permalink($pid); ?>">
                  <div class="imgBox imgFitBox"><?php echo get_the_post_thumbnail($pid); ?></div>
                </a>


                <ul class="tagWrap">
                  <?php $tags = get_the_tags($pid);
                  if ($tags):
                    foreach ($tags as $tag):
                      if ($tag->slug == 'shibire')  { $addClass = 'red'; }
                      if ($tag->slug == 'muneyake') { $addClass = 'lightblue'; }
                      if ($tag->slug == 'tikatika') { $addClass = 'green'; }
                      if ($tag->slug == 'hakike')   { $addClass = 'yellow'; }
                      if ($tag->slug == 'keiren')   { $addClass = ''; }
                      if ($tag->slug == 'douki')    { $addClass = 'pink'; }
                      if ($tag->slug == 'zutsuu')   { $addClass = 'purple'; }
                      if ($tag->slug == 'miminari') { $addClass = 'blue'; }
                      if ($tag->slug == 'sonota') { $addClass = 'lightslategray'; }
                      if ($tag->slug == 'kyoutsuu') { $addClass = 'mediumvioletred'; }
                      if ($tag->slug == 'kataijou') { $addClass = 'saddlebrown'; }
                      $url = get_tag_link($tag->term_id);
                      echo '<li class="tag '. $addClass .'"><a href="'. $url .'">#'. $tag->name .'</a></li>';
                    endforeach;
                  endif; ?>
                </ul>



                <a href="<?php the_permalink($pid); ?>">
                  <p class="txt"><?php echo get_the_title($pid); ?></p>
                </a>
              </li>


            <?php } ?>
        </ul>
      </div>

    <?php } ?>



    <!--
        <?php
        $post_tag = $_GET['post_tag'];
          $args = array(
            'category_name' => 'symptom',
            // 'tag_slug__and' => $post_tag, // AND検索
            'tag_slug__in' => $post_tag, // OR検索
      'post__not_in' => array(326,316),
            'posts_per_page' => '5',
            'paged' => $paged,
          );
          $the_query = new WP_Query($args);
          if($the_query->have_posts()): ?>
            <div class="mainArchive">
            <ul> <?php
            while($the_query->have_posts()) : $the_query->the_post(); ?>
              <li class="archive cf">
                <a href="<?php the_permalink(); ?>">
                  <div class="imgBox imgFitBox"><?php the_post_thumbnail(); ?></div>
                </a>
                <ul class="tagWrap">
                  <?php $tags = get_the_tags();
                  if ($tags):
                    foreach ($tags as $tag):
                      if ($tag->slug == 'shibire')  { $addClass = 'red'; }
                      if ($tag->slug == 'muneyake') { $addClass = 'lightblue'; }
                      if ($tag->slug == 'tikatika') { $addClass = 'green'; }
                      if ($tag->slug == 'hakike')   { $addClass = 'yellow'; }
                      if ($tag->slug == 'keiren')   { $addClass = ''; }
                      if ($tag->slug == 'douki')    { $addClass = 'pink'; }
                      if ($tag->slug == 'zutsuu')   { $addClass = 'purple'; }
                      if ($tag->slug == 'miminari') { $addClass = 'blue'; }
                      $url = get_tag_link($tag->term_id);
                      echo '<li class="tag '. $addClass .'"><a href="'. $url .'">#'. $tag->name .'</a></li>';
                    endforeach;
                  endif; ?>
                </ul>
                <a href="<?php the_permalink(); ?>">
                  <p class="txt"><?php the_title(); ?></p>
                </a>
              </li>
            <?php endwhile;
            wp_reset_postdata(); ?>
            </ul>
          </div>
        <?php endif; ?>
    -->


      <?php include( STYLESHEETPATH . '/inc/symptom_tag.php' ); ?>






<?php endif; ?>

    </div>


    <?php if($cat_slug == "symptom") {
      get_sidebar('symptom');
    } else if($cat_slug == "lp") {

    } else {
      get_sidebar();
    } ?>
  </div><!-- inner -->
</div><!-- contents -->

<?php if($cat_slug == "symptom") {
  get_footer('symptom');
} else if($cat_slug == "lp") { ?>
<footer class="footer">
  <div class="retop fixed"><a href="#top">TOP</a></div>
  <div class="footerTop inner cf">
    <div class="fTLeft">
      <div class="footerLogo"><img src="<?=get_template_directory_uri()?>/symptom/img/logo/logo.svg" alt="これってもしかして、血管の異常収縮？症状から見る原因と改善方法"></div>
    </div>
    <div class="menseki">
      <p>免責事項：記事の内容については細心の注意を払っておりますが、文献上からわかる症状のひとつの解釈にすぎません。医療上の詳しい内容やご自身の症状で気になることがある場合は、医師などの専門家に相談するか、医療機関への受診をしていただきますよう、お願いいたします。（2019年12月）</p>
    </div>
  </div>
  <div class="footerBtm">
    <div class="inner">
      <p class="copyright">Copyright &copy; これってもしかして、血管の異常収縮？症状から見る原因と改善方法　<span>All Rights Reserved.</span></p>
    </div>
  </div>
</footer>
<?php } else {
  get_footer();
} ?>
<?php wp_footer(); ?>
</body>
</html>