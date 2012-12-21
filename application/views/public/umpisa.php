
	<div class="row-fluid">
		<div class="span6">
			<div class="row-fluid" style="margin-bottom:10px;">
				<div style="margin-left:auto;margin-right:auto" class="ico-bilib">&nbsp;</div>
			</div>

		<?php foreach ($bilib as $item): ?>
			<div class="row-fluid box-spacer">
				<div class="span12 box-bilib">
					<p><?php echo $item->title; ?></p>
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
					<p><?php echo $item->title; ?></p>
				</div>
			</div>
		<?php endforeach; ?>

		</div>
	</div>
