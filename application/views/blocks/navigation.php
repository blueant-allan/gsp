<?php
$session = Session::instance()->get('user',NULL);
?>

	<div class="navbar navbar-fixed-top">
		<div class="navbar-inner">
			<div class="container">
				<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</a>
				<a class="brand" href="../"><strong>ganitosapinas.com</strong></a>
				<div class="nav-collapse" id="main-menu">
					<ul class="nav pull-right" id="main-menu-right">
					<?php
						if ($session)
						{
							echo '<li>';
							echo Html::anchor('#',Html::image($session['picture'],array('style' => 'height:23px;margin-right:5px;')).$session['name']);
							echo '</li>';
						}
					?>

					<?php if ($session): ?>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">Aksyon <b class="caret"></b></a>
							<ul class="dropdown-menu">
								<li><?php echo HTML::anchor('/','<i class="icon-home"></i>&nbsp;Home'); ?></li>
								<li><?php echo HTML::anchor('#post-modal-container','<i class="icon-pencil"></i>&nbsp;Mag lagay ng bagong paksa',array('id' => 'postModal')); ?></li>
								<li class="divider"></li>
								<li><?php echo HTML::anchor('logout','<i class="icon-user"></i>&nbsp;Logout'); ?></li>
							</ul>
						</li>
					<?php else: ?>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">Aksyon <b class="caret"></b></a>
							<ul class="dropdown-menu">
								<li><?php echo HTML::anchor('facebook','<i class="icon-lock"></i>&nbsp;Mag login sa Facebook'); ?></li>
								<li><?php echo HTML::anchor('facebook','<i class="icon-user"></i>&nbsp;Gumawa nga account sa Facebook'); ?></li>
							</ul>
						</li>
					<?php endif; ?>
					</ul>

					<!--ul class="nav pull-right" id="main-menu-right">
						<li><a rel="tooltip" target="_blank" href="#" title="Showcase of Bootstrap sites &amp; apps">Link 1 <i class="icon-share-alt"></i></a></li>
						<li><a rel="tooltip" target="_blank" href="#" title="Marketplace for premium Bootstrap templates">Link 2 <i class="icon-share-alt"></i></a></li>
					</ul-->

				</div>
			</div>
		</div>
	</div>
