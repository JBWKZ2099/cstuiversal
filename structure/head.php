<?php
  include( "php/header.lib.php" );
  $ogtags = array(
		"home" => array(
				"description" => $description,
				"url" => substr($path, 0, -1),
				// "image" => $path."assets/img/home/isonow.png",
				"image" => "http://placehold.it/500x500.png?text=500x500.jpg",
				"site_name" => $description,
    ),
	);

	$_SESSION["whatsapp"] = "https://api.whatsapp.com/send?phone=5215543315214";
?>
<link rel="shortcut icon" href="<?php Times::fileTime("assets/img/favicon.ico") ?>"/>
<meta charset="UTF-8">
<title> <?php echo $env->APP_NAME; ?> | <?php echo $view_name; ?> </title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">

<meta property="og:title" content="<?php echo $env->APP_NAME." | ".$view_name; ?>"> <meta property="og:type" content="page">
<meta property="og:description" content="<?php echo $ogtags[$which]["description"]; ?>">
<meta property="og:url" content="<?php echo $ogtags[$which]["url"]; ?>">
<meta property="og:image" content="<?php echo $ogtags[$which]["image"]; ?>">
<meta property="og:site_name" content="<?php echo $ogtags[$which]["site_name"]; ?>">

<link rel="canonical" href="<?php echo $ogtags[$which]["url"]; ?>"/>
<meta name="description" content="<?php echo $ogtags[$which]["description"]; ?>">

<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<?php /* CSS Tags */ ?>
<?php /*Bootstrap css minified*/ ?>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<?php /*FormValidation v0.8.1 */ ?>
<link rel="stylesheet" href="assets/js/formvalidation/dist/css/formValidation.min.css">
<?php /*Style Core*/ ?>
<link rel="stylesheet" href="<?php Times::fileTime("assets/css/core.css"); ?>">
<?php /*Style Custom*/ ?>
<link rel="stylesheet" href="<?php Times::fileTime("assets/css/custom.css"); ?>">