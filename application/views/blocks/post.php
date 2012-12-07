
<div id="post-modal-container" class="modal hide" tabindex="-1" role="dialog">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h3>Mag lagay ng bagong paksa</h3>
			</div>
			<div class="modal-body">
			<?php
				echo Form::open('#',array('id' => 'frmPosting', 'class' => 'form-horizontal'));
				echo '<legend>Kompletuhin ang detalye</legend>';

				echo '<div class="control-group">';
				echo Form::label('category','Palagay',array('class' => 'control-label'));
				echo '<div class="controls">';
				echo Form::label('category-bilib',
						Form::radio('category',1,FALSE,array('id' => 'category-bilib')).'<span class="label label-info">Bilib</span>',
						array('class' => 'radio inline'));

				echo Form::label('category-asar',
						Form::radio('category',2,FALSE,array('id' => 'category-asar')).'<span class="label label-important">Asar</span>',
						array('class' => 'radio inline'));
				echo '</div>';
				echo '</div>';

				echo '<div class="control-group">';
				echo Form::label('title','Pamagat',array('class' => 'control-label'));
				echo '<div class="controls">';
				echo Form::input('title','',array(
					'placeholder' => 'Pamagat',
					'id' => 'title',
					'class' => 'input-xlarge'));
				echo '</div>';
				echo '</div>';

				echo '<div class="control-group">';
				echo Form::label('description','Detalye',array('class' => 'control-label'));
				echo '<div class="controls">';
				echo Form::textarea('description','',array('id'=>'description','rows' => 3,'class' => 'span4'),NULL);
				echo '</div>';
				echo '</div>';


				echo '<div class="control-group">';
				echo Form::label('picture','Larawan',array('class' => 'control-label'));
				echo '<div class="controls">';

				echo Form::label('pictype-upload',
						Form::radio('pictype',1,FALSE,array('id' => 'pictype-upload')).'Mag upload&nbsp;',
						array('class' => 'radio inline'));
				echo Form::file('source',array('id' => 'source'));
				echo '<br>';
				echo Form::label('pictype-link',
						Form::radio('pictype',2,FALSE,array('id' => 'pictype-link')).'I-link (Url) &nbsp;',
						array('class' => 'radio inline'));
				echo Form::input('url','',array('id' => 'url'));

				echo '</div>';
				echo '</div>';

				echo Form::close();
			?>
			</div>
			<div class="modal-footer">
			<?php
				echo Form::button('submit','Save',array('class' => 'btn btn-primary','type' => 'submit','id' => 'btnPostadd'));
				echo Html::anchor('#','Close',array('class' => 'btn','onclick' => "$('#post-modal-container').modal('hide');"));
			?>
			</div>
		</div>