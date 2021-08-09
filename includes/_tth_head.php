<?php
if (!defined('TTH_SYSTEM')) { die('Please stop!'); }
//--
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="language" content="<?php echo TTH_LANGUAGE;?>">
<meta http-equiv="Refresh" content="1800">
<title><?php echo getTitle(); ?></title>
<?php if(getConstant('fb_app_id')!='') echo '<meta property="fb:app_id" content="' . getConstant('fb_app_id') . '">'; ?>
<?php if(getConstant('article_author')!='') echo '<meta property="article:author" content="' . getConstant('article_author') . '">'; ?>
<?php if(getConstant('author_google')!='') echo '<link rel="author" href="https://plus.google.com/u/0/' . getConstant('author_google') . '">'; ?>
<meta name="copyright" content="<?php echo getConstant('meta_copyright'); ?>">
<meta name="author"  content="<?php echo getConstant('meta_author'); ?>">
<meta name="resource-type" content="document">
<meta name="distribution" content="global">
<meta name="robots" content="index, archive, follow, noodp">
<meta name="googlebot" content="index, archive, follow, noodp">
<meta name="msnbot" content="all, index, follow">
<meta name="revisit-after" content="1 days">
<meta name="rating" content="general">
<meta name="google-site-verification" content="4GMuU9TItwZZa6nbEJ2x7FyPz8PeJCrHhWeVGtJOdIU" />
<link rel="shortcut icon" href="<?php echo HOME_URL; ?>/favicon.ico" type="image/x-icon">
<link rel="icon" href="<?php echo HOME_URL; ?>/favicon.ico" type="image/x-icon">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@400;700&family=Roboto:ital,wght@0,300;0,400;0,700;1,400&display=swap" rel="stylesheet">
<link rel="stylesheet" href="<?php echo HOME_URL; ?>/css/bootstrap.min.css">
<link rel="stylesheet" href="<?php echo HOME_URL; ?>/css/main.css">
<link rel="stylesheet" href="<?php echo HOME_URL; ?>/css/date.css">
<link rel="stylesheet" href="<?php echo HOME_URL; ?>/css/slick-theme.css">
<link rel="stylesheet" href="<?php echo HOME_URL; ?>/css/bootstrap-select.css">
<link rel="stylesheet" href="<?php echo HOME_URL; ?>/css/send_alert.css">
<link rel="stylesheet" href="<?php echo HOME_URL; ?>/css/responsive/media.css">
<script src="<?php echo HOME_URL; ?>/js/jquery_3.2.1.js"></script>
<script src="<?php echo HOME_URL; ?>/js/jquery_ui.js"></script>
<script src="<?php echo HOME_URL; ?>/js/popper.min.js"></script>
<script src="<?php echo HOME_URL; ?>/js/bootstrap.min.js"></script>
<script src="<?php echo HOME_URL; ?>/js/bootstrap-select.js"></script>
