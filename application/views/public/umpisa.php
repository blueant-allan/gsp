<?php
$session      = Session::instance()->get('user',NULL);
$user_picture = ($session) ? $session['picture'] : 'none.jpeg';
//Helper_Util::pr($session);
?>

	<div class="row-fluid">
		<div class="span6">
			<div class="row-fluid" style="margin-bottom:10px;">
				<div style="margin-left:auto;margin-right:auto" class="ico-bilib">&nbsp;</div>
			</div>

		<?php foreach ($bilib as $item): ?>
			<div class="row-fluid box-spacer">
				<div class="span12 box-bilib">
				<?php
					echo '<div class="thumbnail">';
					echo '<div class="caption">';
					echo Html::anchor(
						'http://facebook.com/'.$item->user->username,
						Html::image($item->user->picture,array('style' => 'height:40px;margin-right:5px;')).$item->user->name,
						array(
							'title'  => 'View profile',
							'target' => '_blank'));

					if ($item->created == $item->modified)
					{
						echo '<p style="margin:0 45px;" class="muted">created ',date('F d, Y',  strtotime($item->created)),'</p>';
					}
					else
					{
						echo '<p style="margin:0 45px;" class="muted">modified ',date('F d, Y',  strtotime($item->modified)),'</p>';
					}

					echo '<hr style="margin:3px 0;"><strong>',$item->title,'</strong> - ',$item->description;
					echo '</div>';
					echo Html::image(Helper_Piktyur::ENDPOINT.Helper_Piktyur::RESOURCE_PHOTO.$item->picture);
					echo '</div>';

					echo '<div class="yellow-highlight">';
					echo Html::anchor('#','Sawsaw',array(
						'class'   => 'bcomment alink',
						'data-id' => $item->id
					));
					echo '</div>';

					echo '<div id="sawsaw-pane-',$item->id,'" class="yellow-highlight" style="display:none">';
					echo Html::image($user_picture,array('id' => 'uuid-'.$item->id,'style' => 'height:40px;margin-right:5px;'));
					echo Form::input('commento','',array(
						'id' => 'comment-f-uid-'.$item->id,
						'class' => 'comment-f'
					));
					echo '</div>';
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
					echo '<div class="thumbnail">';
					echo '<div class="caption">';
					echo Html::anchor(
						'http://facebook.com/'.$item->user->username,
						Html::image($item->user->picture,array('style' => 'height:40px;margin-right:5px;')).$item->user->name,
						array(
							'title'  => 'View profile',
							'target' => '_blank'));

					if ($item->created == $item->modified)
					{
						echo '<p style="margin:0 45px;" class="muted">created ',date('F d, Y',  strtotime($item->created)),'</p>';
					}
					else
					{
						echo '<p style="margin:0 45px;" class="muted">modified ',date('F d, Y',  strtotime($item->modified)),'</p>';
					}

					echo '<hr style="margin:3px 0;"><strong>',$item->title,'</strong> - ',$item->description;
					echo '</div>';
					echo Html::image(Helper_Piktyur::ENDPOINT.Helper_Piktyur::RESOURCE_PHOTO.$item->picture);
					echo '</div>';

					echo '<div class="yellow-highlight">';
					echo Html::anchor('#','Sawsaw',array(
						'class' => 'acomment alink',
						'data-id' => $item->id
					));
					echo '</div>';
				?>
				</div>
			</div>
		<?php endforeach; ?>

		</div>
	</div>
