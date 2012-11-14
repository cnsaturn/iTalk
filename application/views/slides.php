<!DOCTYPE html>
<!--[if lt IE 7]> <html class="no-js ie6" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js ie7" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js ie8" lang="en"> <![endif]-->
<!--[if gt IE 8]><!-->  <html class="no-js" lang="en"> <!--<![endif]-->
<head>
	<base href="<?php echo base_url('assets');?>/" />

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	
	<title>初创团队工作流与开发模式探讨</title>

	<meta name="description" content="中小团队工作流程与开发模式探讨">
	<meta name="author" content="Saturn">
	<meta name="viewport" content="width=1024, user-scalable=no">
	
	<?php if(ENVIRONMENT == 'development'):?>
	<link rel="stylesheet" href="lib/font-awesome.css">

	<!-- Core and extension CSS files -->
	<link rel="stylesheet" href="lib/core/deck.core.css">
	<link rel="stylesheet" href="lib/extensions/goto/deck.goto.css">
	<link rel="stylesheet" href="lib/extensions/menu/deck.menu.css">
	<link rel="stylesheet" href="lib/extensions/navigation/deck.navigation.css">
	<link rel="stylesheet" href="lib/extensions/status/deck.status.css">
	<link rel="stylesheet" href="lib/extensions/hash/deck.hash.css">
	<link rel="stylesheet" href="lib/extensions/scale/deck.scale.css">
	
	<!-- Style theme. More available in /themes/style/ or create your own. -->
	<link rel="stylesheet" href="lib/themes/style/swiss.css">
	
	<!-- Transition theme. More available in /themes/transition/ or create your own. -->
	<link rel="stylesheet" href="lib/themes/transition/horizontal-slide.css">

	<!-- Rock our own style. -->
	<link rel="stylesheet" href="lib/italk.css">
	
	<script src="lib/modernizr.custom.js"></script>
	<?php else:?>
	<?php echo css('italk.min.css');?>
	<?php echo js('modernizr.custom.min.js');?>
	<?php endif;?>
</head>

<body class="deck-container">

<!-- Begin slides -->
<section class="slide" id="title-slide">
	<h1>初创团队工作流与开发模式探讨</h1>
	<h2>胡杨刚（a.k.a. Saturn）</h2>
	<p>
		<a href="https://github.com/cnsaturn/iTalk"><i class="icon-github"></i> Slides on Github</a> &nbsp;
		<a href="mailto:yangg.hu#gmail.com"><i class="icon-envelope"></i> Me</a> &nbsp;
		<a href="http://codeigniter.org.cn/forums/thread-14689-1-1.html"><i class="icon-time"></i> 2012/11/18</a> &nbsp;
		<a href="http://ku6.com"><i class="icon-globe"></i> ku6.com, Beijing</a> &nbsp;
	</p>
</section>

<!-- deck.navigation snippet -->
<a href="#" class="deck-prev-link" title="Previous">&#8592;</a>
<a href="#" class="deck-next-link" title="Next">&#8594;</a>

<!-- deck.status snippet -->
<p class="deck-status">
	<span class="deck-status-current"></span>
	/
	<span class="deck-status-total"></span>
</p>

<!-- deck.goto snippet -->
<form action="." method="get" class="goto-form">
	<label for="goto-slide">Go to slide:</label>
	<input type="text" name="slidenum" id="goto-slide" list="goto-datalist">
	<datalist id="goto-datalist"></datalist>
	<input type="submit" value="Go">
</form>

<!-- deck.hash snippet -->
<a href="." title="Permalink to this slide" class="deck-permalink">#</a>

<?php if(ENVIRONMENT == 'development'):?>
<script src="<?php echo base_url('assets/lib/jquery.js');?>"></script>
<!-- Deck Core and extensions -->
<script src="lib/core/deck.core.js"></script>
<script src="lib/extensions/hash/deck.hash.js"></script>
<script src="lib/extensions/menu/deck.menu.js"></script>
<script src="lib/extensions/goto/deck.goto.js"></script>
<script src="lib/extensions/status/deck.status.js"></script>
<script src="lib/extensions/navigation/deck.navigation.js"></script>
<script src="lib/extensions/scale/deck.scale.js"></script>
<?php else:?>
<!-- Deck Core and extensions -->
<?php echo js('jquery.min.js');?>
<?php echo js('italk.min.js');?>
<?php endif;?>

<!-- Initialize the deck -->
<script>
$(function() {
	$.deck('.slide');
});
</script>

</body>
</html>