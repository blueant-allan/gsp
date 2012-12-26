
	<div class="row-fluid">
		<div class="span6">
			<div class="row-fluid" style="margin-bottom:10px;">
				<div style="margin-left:auto;margin-right:auto" class="ico-bilib">&nbsp;</div>
			</div>

		<?php foreach ($bilib as $item): ?>
			<div class="row-fluid box-spacer">
				<div class="span12 box-bilib">
				<?php
					echo '<p>';
					echo '<strong>',$item->title,'</strong> by ';
					echo  Html::anchor(
							'http://www.facebook.com/'.$item->user->username,
							empty($item->user->name) ? 'Unknown' : $item->user->name,
							array(
								'title'  => 'View profile',
								'target' => '_blank'));
					echo '</p>';
					echo '<p>',$item->description,'</p>';
					echo Html::image($item->picture,array('style' => 'width:320px;'));
				?>
				</div>
			</div>
		<?php endforeach; ?>
		</div>

		<div class="span6">
			<div class="row-fluid" style="margin-bottom:10px;">
				<div style="margin-left:auto;margin-right:auto" class="ico-asar">&nbsp;</div>
			</div>

		<?php foreach ($asar as $item): ?>
			<div class="row-fluid box-spacer">
				<div class="span12 box-asar">
				<?php
					echo '<p>';
					echo '<strong>',$item->title,'</strong> by ';
					echo  Html::anchor(
							'http://www.facebook.com/'.$item->user->username,
							empty($item->user->name) ? 'Unknown' : $item->user->name,
							array(
								'title'  => 'View profile',
								'target' => '_blank'));
					echo '</p>';
					echo '<p>',$item->description,'</p>';
					echo Html::image($item->picture,array('style' => 'width:320px;'));
				?>
				</div>
			</div>
		<?php endforeach; ?>

		</div>
	</div>
