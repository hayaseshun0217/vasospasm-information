<!DOCTYPE html>
<html lang="ja" prefix="og: http://ogp.me/ns#">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo meta_set('title'); ?></title>
<meta name="description" content="<?php echo meta_set('description'); ?>">
<meta name="keywords" content="<?php echo meta_set('keyword'); ?>">
<meta name="format-detection" content="telephone=no">



<!-- 共通項目 -->
<meta property="og:locale" content="ja_JP" />
<meta property="og:type" content="article" />
<meta property="og:title" content="<?php echo meta_set('title'); ?>" />
<meta property="og:url" content="<?=home_url().$_SERVER["REQUEST_URI"]; ?>" />
<meta property="og:image" content="" />
<meta property="og:site_name"  content="<?php echo get_option('blogname'); ?>" />
<meta property="og:description" content="<?php echo meta_set('description'); ?>" />

<!-- CSS -->
<link href="https://fonts.googleapis.com/earlyaccess/sawarabimincho.css" rel="stylesheet">
<link href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" rel="stylesheet">

<link rel="stylesheet" href="<?=get_template_directory_uri()?>/normalize.css">
<link rel="stylesheet" href="<?=get_template_directory_uri()?>/common.css">
<link rel="stylesheet" href="<?=get_template_directory_uri()?>/module.css">
<?php if ( is_home() || is_front_page() ) : ?>
<link rel="stylesheet" href="<?=get_template_directory_uri()?>/index.css">
<?php elseif( is_category() ) : ?>
<link rel="stylesheet" href="<?=get_template_directory_uri()?>/category.css">
<?php else : ?>
<link rel="stylesheet" href="<?=get_template_directory_uri()?>/single.css">
<?php endif; ?>
<link rel="stylesheet" href="<?=get_template_directory_uri()?>/edit.css">

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

<script src="<?=get_template_directory_uri()?>/js/common.js"></script>
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
<!--aaaaaaaaaaaa-->
<?php wp_head() ?>
</head>
<body id="top" <?php body_class(); ?>>
<?php include( STYLESHEETPATH . '/inc/ga2.php' ); ?>

<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-N46R222"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->