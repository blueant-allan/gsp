<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title><?php echo $title; ?></title>
        <meta name="description" content="<?php echo $meta_description; ?>">
        <meta name="viewport" content="width=device-width">

        <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->

        <link href="/css/normalize.css" rel="stylesheet">
        <link href="/css/main.css" rel="stylesheet">
		<link href="/css/bootstrap.css" rel="stylesheet">
		<link href="/css/docs.css" rel="stylesheet">
		<link href="/css/styles.css" rel="stylesheet">
		<link href="/css/bootstrap-responsive.min.css" rel="stylesheet">
<?php	foreach ($styles as $style) echo HTML::style('css/'.$style),PHP_EOL; ?>
        <script src="/js/modernizr-2.6.1.min.js"></script>
    </head>
	<body>
		<!--[if lt IE 7]>
            <p class="chromeframe">You are using an outdated browser. <a href="http://browsehappy.com/">Upgrade your browser today</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to better experience this site.</p>
        <![endif]-->

		<?php echo View::factory('blocks/navigation'); ?>

		<div class="container">
			<?php //echo View::factory('blocks/header'); ?>
			<?php echo $content; ?>
		</div>

		<?php echo View::factory('blocks/post'); ?>

		<?php echo View::factory('blocks/footer'); ?>

		<script src="/js/jquery-1.8.2.min.js"></script>
        <script src="/js/plugins.js"></script>
		<script src="/js/bootstrap.min.js"></script>
		<script src="/js/bootstrap-modal.js"></script>
		<script src="/js/application.js"></script>
		<script src="/js/public.js"></script>

<?php	foreach ($scripts as $script) echo HTML::script('js/'.$script),PHP_EOL; ?>
	</body>
</html>