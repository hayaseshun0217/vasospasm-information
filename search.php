<?php $paged = get_query_var('paged') ? get_query_var('paged') : 1 ; ?>
<?php get_header('symptom'); ?>
<header class="cf">
  <div class="headerTop">
    <div class="inner cf">
      <h1 class="headerTtl">これってもしかして、血管の異常収縮？症状から見る原因と改善方法</h1>
      <div class="pageTit"><?php the_title(); ?></div>
    </div>
  </div>
  <div class="headerBtm inner cf">
    <div class="headerLogo"><a href="<?=home_url()?>/symptom/"><img src="<?=get_template_directory_uri()?>/symptom/img/logo/logo.svg" alt="知っててよかった！山口大学医学部小林教授が詳しく解説_血管の異常収縮"></a></div>
    <!--<ul class="snsLink flex04 headerSns pc">
      <li class="fb"><a href="https://www.facebook.com/sharer/sharer.php?u=https://<?= $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"]; ?>" onclick="window.open(this.href, 'FBwindow', 'width=650, height=450, menubar=no, toolbar=no, scrollbars=yes'); return false;"><i class="fab fa-facebook-f"></i></a></li>
      <li class="ln"><a href="http://line.me/R/msg/text/?https://<?= $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"]; ?>" onclick="window.open(this.href, 'LNwindow', 'width=650, height=450, menubar=no, toolbar=no, scrollbars=yes'); return false;"><img src="<?=get_template_directory_uri()?>/symptom/img/ico/ico_line.png" alt="LINE"></a></li>
      <li class="tw"><a href="https://twitter.com/share?url=https://<?= $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"]; ?>" onclick="window.open(this.href, 'TWwindow', 'width=650, height=450, menubar=no, toolbar=no, scrollbars=yes'); return false;"><i class="fab fa-twitter"></i></a></li>
      <li class="gp"><a href="http://getpocket.com/edit?url=https:// <?= $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"]; ?>" onclick="window.open(this.href, 'BMwindow', 'width=650, height=450, menubar=no, toolbar=no, scrollbars=yes'); return false;" target="_blank"><i class="fab fa-get-pocket"></i></a></li>
      <li class="hb"><a href="http://b.hatena.ne.jp/add?url=https://<?= $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"]; ?>" onclick="window.open(this.href, 'BMwindow', 'width=650, height=450, menubar=no, toolbar=no, scrollbars=yes'); return false;" target="_blank"><img src="<?=get_template_directory_uri()?>/symptom/img/ico/ico_hatebu.png" alt="hatebu"></a></li>
	</ul>-->
  </div>
</header>

<div class="contents">
  <div class="inner cf">
		
    <div class="main">
<?php the_breadcrumb() ?>
      <?php include( STYLESHEETPATH . '/inc/symptom_tag.php' ); ?>
      
      <div class="mainArchive">
        <p class="ttl"><img src="<?=get_template_directory_uri()?>/symptom/img/txt/txt_ichiran.png" alt="記事一覧"></p>
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

				<?php
					//Pagenation 
					if (function_exists("pagination")) {
            $pages = $the_query->max_num_pages;//全ページ数を取得
            if(!$pages) { $pages = 1; }
						pagination($pages);
          }
				?>
      </div>



<div class="adminBox">
  <div class="adminBoxInner flex05">
    <p class="ttl"><img src="<?=get_template_directory_uri()?>/symptom/img/txt/txt_admin.png" alt="運営者情報" class="pc"><span class="sp">運営者情報</span></p>
    <p class="txt">これってもしかして、血管の異常収縮？症状から見る原因と改善方法は機能性食品の研究開発を行うオリエンタルバイオ株式会社がメディカルライターに委託し、制作・運用をしております。
記事の内容については最新の注意を払っておりますが、文献上からわかる症状のひとつの解釈にすぎません。医療上の詳しい内容やご自身の症状で気になることがある場合は、医師などの専門家に相談するか、医療機関への受診をしていただきますよう、お願いいたします。</p>
  </div>
</div>
      
    </div><!-- main -->
  <?php get_sidebar('symptom'); ?>
  </div><!-- inner -->
</div><!-- contents -->

<?php get_footer('symptom'); ?>
</body>
</html>
