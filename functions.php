<?php
/*
 * breadcrumb for category
 */
//パンくずリスト
function the_breadcrumb(){
    global $post;
    $str = '';
        $a1 = '<span itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item" href="';
        $a2 = '"><span itemprop="name">';
        $a3 = '</span></a><meta itemprop="position" content="';
        $b1 = '<span itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><span itemprop="name">';
        $b2 = '</span><meta itemprop="position" content="';
    if(!is_home()&&!is_admin()){ /* !is_admin は管理ページ以外という条件分岐 */
        $str.= '<div id="pankuzu" itemscope itemtype="http://schema.org/BreadcrumbList">';
        if(is_tag()||is_search()) {
            $str.= $a1 . home_url('/symptom/') . $a2 . 'これって血管の異常収縮？症状一覧 ' . $a3 . '1" /></span>&nbsp;&gt;&nbsp;';
        } else {
            $str.= $a1 . home_url() . $a2 . 'TOP' . $a3 . '1" /></span>&nbsp;&gt;&nbsp;';
        }
        if(is_category()) {                             //カテゴリーのアーカイブページ
            $cat = get_queried_object();
            if($cat -> parent != 0){
                $ancestors = array_reverse(get_ancestors( $cat -> cat_ID, 'category' ));
                                $positionNum = 2;
                foreach($ancestors as $ancestor){
                                        $str.= $a1 . get_category_link($ancestor) . $a2 .get_cat_name($ancestor) . $a3 . $positionNum . '" /></span>&nbsp;&gt;&nbsp;';
                                        $positionNum++;
                }
            }
                        $ancestors = null;
                        $position = is_countable($ancestors)?count($ancestors):+2;
            $str.= $b1 . $cat -> name . $b2 . $position . '" /></span>';
        } elseif(is_single()){                          //ブログの個別記事ページ
            $categories = get_the_category($post->ID);
            $cat = $categories[0];
            if($cat -> parent != 0){
                $ancestors = array_reverse(get_ancestors( $cat -> cat_ID, 'category' ));
                                $positionNum = 2;
                foreach($ancestors as $ancestor){
                    $str.= $a1 . get_category_link($ancestor) . $a2 . get_cat_name($ancestor) . $a3 . $positionNum . '" /></span>&nbsp;&gt;&nbsp;';
                                        $positionNum++;
                }
            }
                        $ancestors = null;
                        $position = is_countable($ancestors)?count($ancestors):+2;
                        $str.= $a1 . get_category_link($cat -> term_id). $a2 . $cat-> cat_name . $a3 . $position . '" /></span>&nbsp;&gt;&nbsp;';
                        $position = is_countable($ancestors)?count($ancestors):+3;
            $str.= $b1 . $post -> post_title . $b2 . $position.'" /></span>';
        } elseif(is_page()){                            //固定ページ
            if($post -> post_parent != 0 ){
                $ancestors = array_reverse(get_post_ancestors( $post->ID ));
                                $positionNum = 2;
                foreach($ancestors as $ancestor){
                    $str.= $a1 . get_permalink($ancestor) . $a2 . get_the_title($ancestor) . $a3 . $positionNum . '" /></span>&nbsp;&gt;&nbsp;';
                                        $positionNum++;
                }
            }
                        $ancestors = null;
                        $position = is_countable($ancestors)?count($ancestors):+2;
            $str.= $b1 . $post -> post_title . $b2 . $position.'" /></span>';
        } elseif(is_date()){                            //日付ベースのアーカイブページ
            if(get_query_var('day') != 0){              //年月日別アーカイブ
            $str.= $a1 . get_year_link(get_query_var('year')). $a2 . get_query_var('year') . '年' . $a3 . '2" /></span>&nbsp;&gt;&nbsp;';
                $str.= $a1 . get_month_link(get_query_var('year'), get_query_var('monthnum')). $a2 . get_query_var('monthnum') . '月' . $a3 . '3" /></span>&nbsp;&gt;&nbsp;';
                $str.= $b1 . get_query_var('day'). '日' . $b2 . '4" />';
            } elseif(get_query_var('monthnum') != 0){   //年月別アーカイブ
                $str.= $a1 . get_year_link(get_query_var('year')) . $a2 . get_query_var('year') .'年' . $a3 . '2" /></span>&nbsp;&gt;&nbsp;';
                $str.= $b1 . get_query_var('monthnum') . '月' . $b2 . '3" />';
            } else {                                     //年別アーカイブ
                $str.= $b1 . get_query_var('year') . '年' .  $b2 . '2" />';
            }
                        $str.= '</span>';
        } else {                                                                         //上記以外
             if(is_search()) {                                          //検索結果表示ページ                    
                        // $str.= $b1 . '「'. get_search_query() .'」で検索した結果';
                        $post_tag = $_GET['post_tag'];
                        if ($post_tag == "") {
                            $str .= '記事一覧';
                        } else {
                            $tags = ""; $tag_name = "";
                            foreach($post_tag as $tag) {
                                if ($tag == 'shibire')  { $tag_name = '手足のしびれ'; }
                                if ($tag == 'muneyake') { $tag_name = '胸やけ'; }
                                if ($tag == 'tikatika') { $tag_name = '目がチカチカする'; }
                                if ($tag == 'hakike')   { $tag_name = '吐き気'; }
                                if ($tag == 'keiren')   { $tag_name = 'けいれん'; }
                                if ($tag == 'douki')    { $tag_name = '動悸・息切れ'; }
                                if ($tag == 'zutsuu')   { $tag_name = '頭痛'; }
                                if ($tag == 'miminari') { $tag_name = '耳鳴り'; }
                                if ($tag == 'sonota') { $tag_name = 'その他痛み'; }
                                if ($tag == 'kyoutsuu') { $tag_name = '胸の痛み'; }
                                if ($tag == 'kataijou') { $tag_name = '肩の異常'; }      
                                $tags .= $tag_name. ' ';
                            }
                            $str.= $b1 . '「'. trim($tags) .'」で検索した結果';
                        }
        }elseif(is_author()){                           //投稿者のアーカイブページ
                        $str.= $b1 . '投稿者 : '. get_the_author_meta('display_name', get_query_var('author'));
        } elseif(is_tag()){                             //タグのアーカイブページ
                        $str.= $b1 . 'タグ : '. single_tag_title( '' , false );
        } elseif(is_attachment()){                      //添付ファイルページ
                        $str.= $b1 . $post -> post_title;
        } elseif(is_404()){                             //404 Not Found ページ
                        $str.= $b1 . '404 Not found';                  
        } else{                                     //その他
            $str.= $b1 . wp_title('', true) ;
                }
                        $str.= $b2  . '2" /></span>';
        }
        $str.= "\n".'</div><!-- /#pankuzu -->'."\n";
    }
    echo $str;
}


/*
* body_classにページスラッグ名を含ませたりオリジナルのclassを追加&タブレットとスマホの場合のクラスも追加
*/
function pagename_class($classes = '') {
  if (is_page()) { //slugを追加
    $page = get_page(get_the_ID());
    $classes[] = $page->post_name;
  } elseif (is_category() || is_single()) { //slugを追加
    $category = get_the_category();
    $classes[] = $category[0]->slug;
  }
  return $classes;
}
add_filter('body_class','pagename_class');


//Pagenation
function pagination($pages = '', $range = 3)
{
  $showitems = ($range * 2)+1;//表示するページ数（５ページを表示）

  global $paged;//現在のページ値
  if(empty($paged)) $paged = 1;//デフォルトのページ

  if($pages == '') {
    global $wp_query;
    // print_r($wp_query);
    $pages = $wp_query->max_num_pages;//全ページ数を取得
    if(!$pages)//全ページ数が空の場合は、１とする
    {
      $pages = 1;
    }
  }

  if(1 != $pages)//全ページが１でない場合はページネーションを表示する
  {
  echo "<div class=\"archivePagenav\">\n";
  echo "<ul class=\"list\">\n";
  //Prev：現在のページ値が１より大きい場合は表示
  if($paged > 1) echo "<li class=\"prev\"><a href='".get_pagenum_link($paged - 1)."'>PREV</a></li>\n";

  for ($i=1; $i <= $pages; $i++) {
    if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems )) {
      //三項演算子での条件分岐
      echo ($paged == $i)? "<li class=\"current\">".$i."</li>\n":"<li><a href='".get_pagenum_link($i)."'>".$i."</a></li>\n";
    }
  }

  //Next：総ページ数より現在のページ値が小さい場合は表示
  if ($paged < $pages) echo "<li class=\"next\"><a href=\"".get_pagenum_link($paged + 1)."\">NEXT</a></li>\n";
  echo "</ul>\n";
  echo "</div>\n";
  }
}

// 絞り込み検索で search.php を読む
// function search_no_keywords() {
//   if (isset($_GET['s']) && empty($_GET['s'])) {
//     include(TEMPLATEPATH . '/search.php');
//     exit;
//   }
// }
// add_action('template_redirect', 'search_no_keywords');

//ショートコードを使ったphpファイルの呼び出し方法
function my_php_Include($params = array()) {
    extract(shortcode_atts(array('file' => 'default'), $params));
    ob_start();
    include(STYLESHEETPATH . "/$file.php");
    return ob_get_clean();
}
add_shortcode('phpinclude', 'my_php_Include');


function my_dequeue_plugin_files(){
  wp_dequeue_style('normalize');
  wp_dequeue_style('common');
  wp_dequeue_style('single');
  wp_dequeue_style('style');

}
add_action( 'wp_enqueue_scripts', 'my_dequeue_plugin_files', 9999);
add_action('wp_head', 'my_dequeue_plugin_files', 9999);

function my_enqueue_plugin_files(){
  wp_enqueue_style('normalize');
  wp_enqueue_style('common');
  wp_enqueue_style('single');
  wp_enqueue_style('style');


}
add_action('wp_footer', 'my_enqueue_plugin_files');

//サムネイル画像
function thumb_src(){
  if( is_category() ) {
    $catid    = get_query_var( 'cat' );
    $parents  = get_category_parents( $catid, false, '/', true );
    $page_id  = get_page_by_path( $parents );
    $page_id  = $page_id->ID;
    $thumb_id = get_post_thumbnail_id($page_id);
    $thumb_img = wp_get_attachment_image_src($thumb_id, 'thumbnail');
    $thumb_src = $thumb_img[0];
    if ( $thumb_src ){
      echo esc_url( $thumb_src );
    }
  } else {
    $thumb_src = get_the_post_thumbnail_url( get_the_ID(),'thumbnail' );
    if ( $thumb_src ){
      echo esc_url( $thumb_src );
    }
  }
}

touch( get_stylesheet_directory() . '/sidebar-test.php' );
touch( get_stylesheet_directory() . '/page-mechanism-2.php' );
touch( get_stylesheet_directory() . '/header-test.php' );
touch( get_stylesheet_directory() . '/footer-test.php' );
touch( get_stylesheet_directory() . '/page-epa--2.php' );
touch( get_stylesheet_directory() . '/page-supervisor-2.php' );
