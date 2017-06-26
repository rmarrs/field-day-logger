<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\Contact[]|\Cake\Collection\CollectionInterface $contacts
  */
	use Cake\View\Helper\SessionHelper;
?>
<?php if($radio_configured) {  ?>
	<div id="radio-configured"> </div>
<?php } ?>
<?= $this->Form->create($contact); ?>

	<div class="row centered">
		<div class="columns large-3">
			<?=  $this->Form->control('modes_id', ['options' => $modes]); ?>
		</div>
		<div class="columns large-3">
			<?=  $this->Form->control('bands_id', ['options' => $bands]); ?>
		</div>
		<div class="columns large-3">
			<?= $this->Form->control('operator_callsign', ['label'=>__('Operator'), 'value'=>$operator_callsign]); ?>
		</div>
		<div class="columns large-3">
			 
		</div>
	</div>

	<div class="row centered">
		<div class="columns large-12 callout" id="add_contact">
			<div class="row">
					<div class="columns large-3 medium-3 small-12">
						<?= $this->Form->control('callsign'); ?>
					</div>
					<div class="columns large-2 medium-2 small-12">
						<?= $this->Form->control('class'); ?>
					</div>
					<div class="columns large-3 medium-3 small-12">
						<?= $this->Form->control('sections_abbr', ['options' => $sections, 'label'=>'Section', 'empty'=>true]); ?>
					</div>
					<div class="columns large-3 medium-3 small-12">
						<br />
						<?= $this->Form->button(__('<i class="fi-plus"></i> Add Contact'), ['class'=>'button', 'escape'=>false]) ?>
					</div>
					<div class="columns large-3 medium-3 small-12" id="add_messages">

					</div>

					<?= $this->Form->control('station_name', ['type'=>'hidden', 'value'=>$station_name]); ?>
			</div>
		</div>
		
	</div>
<?= $this->Form->end() ?>

<div class="row expanded show-for-large">
	<div class="sections columns large-12 medium-12">
		<div class="row column expanded" style="text-align:center;">
			<h4><?= __('Sections'); ?></h4>
			<div class="row expanded align-center centered">
				
				<?php $area = -1; ?>
						<div>
				<?php foreach($sections_worked as $section) : ?>
					<?php if($section->area != $area) : ?>
						<?php $area = $section->area; ?>
						<div style="display:none;"></div>
						</div>
						<div class="columns callout" style="text-align:center;">
						<h5><?= $section->area; ?></h5>
							<?php endif; ?>
							<span class="label small <?= ($section->count > 0) ? "success" : "secondary" ; ?>" alt="<?= $section->description . ' (' . $section->area . ')'; ?>"><?= $section->abbr; ?></span>
							
				<?php endforeach; ?>
				<div style="display:none;"></div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="contacts index large-12 medium-12 content">
		<h3><?= __('Last 50 Contacts') ?> (<?= $contactstotal . ' ' . __('total'); ?>)</h3>
		<table cellpadding="0" cellspacing="0">
			<thead>
				<tr>
					<th scope="col"><?= $this->Paginator->sort('callsign') ?></th>
					<th scope="col"><?= $this->Paginator->sort('class') ?></th>
					<th scope="col"><?= $this->Paginator->sort('sections_abbr', ['label'=>'Section']) ?></th>
					<th scope="col"><?= $this->Paginator->sort('station', ['label'=>'Station ']) ?></th>
					<th scope="col"><?= $this->Paginator->sort('operator_callsign') ?></th>
					<th scope="col"><?= $this->Paginator->sort('bands_id') ?></th>
					<th scope="col"><?= $this->Paginator->sort('modes_id') ?></th>
					<th scope="col" class="actions"><?= __('Actions') ?></th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($contacts as $contact): ?>
				<tr>
					<td><?= h($contact->callsign) ?></td>
					<td><?= h($contact->class) ?></td>
					<td><?= $contact->has('section') ? $contact->section->label : '' ?></td>
					<td><?= h($contact->station_name) ?></td>
					<td><?= h($contact->operator_callsign) ?></td>
					<td><?= $contact->has('band') ? $contact->band->title : '' ?></td>
					<td><?= $contact->has('mode') ? $contact->mode->title : '' ?></td>
					<td class="actions">
						<?= $this->Html->link(__('<i class="fi-pencil"></i> Edit'), ['action' => 'edit', $contact->id], ['class'=>'button small', 'escape'=>false]) ?>
						<?= $this->Form->postLink(__('<i class="fi-trash"></i> Delete'), ['action' => 'delete', $contact->id], ['confirm' => __('Are you sure you want to delete # {0}?', $contact->id), 'class'=>'button small alert', 'escape'=>false]) ?>
					</td>
				</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
		<div class="paginator">
			<ul class="pagination">
				<?= $this->Paginator->first('<< ' . __('first')) ?>
				<?= $this->Paginator->prev('< ' . __('previous')) ?>
				<?= $this->Paginator->numbers() ?>
				<?= $this->Paginator->next(__('next') . ' >') ?>
				<?= $this->Paginator->last(__('last') . ' >>') ?>
			</ul>
			<p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
		</div>
	</div>
</div>


<script>
	$(function(){ 

		function poll() { 
			$.getJSON( "radios/poll", function( data ) {
				if(data.radio) { 
					$('#modes-id').val(data.radio.mode);
					$('#bands-id').val(data.radio.band);
					return true;
				}
			}).fail(function( jqxhr, textStatus, error ) { 
				console.log('failed - ' + error);
				if(error = "SyntaxError: Unexpected token < in JSON at position 0") { 
					error = "Could not read data from radio. Check configuration or disable";
				}
				$('.container').before('<div id="flash" class="callout alert" onclick="this.classList.add(\'hidden\')">' + error + '</div>');
				
			});
		}
	
		if($("#radio-configured").length != 0) { 
			window.setInterval(poll(), 1000);
		}





		$("#callsign").focus();

		

		$("#bands-id").change(function(){dupeCheck(); });
		$("#modes-id").change(function(){dupeCheck(); });
		

		$("#callsign").blur(function(){ dupeCheck(); } );
	});

	

	
</script>