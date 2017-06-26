<h2>Configure Station</h2>
<div class="row">
<?= $this->Form->create(); ?>
    <div class="columns">
    <?= $this->Form->control('station_name', ['value' => $currents['station_name']]); ?>
    </div>

    <div class="columns">
        <?= $this->Form->control('club_call', ['value' => $currents['club_call']]); ?>
    </div>

    <div class="columns">
        <?= $this->Form->control('class', ['value' => $currents['class']]); ?>
    </div>

    <div class="columns">
        <?= $this->Form->control('section', ['value' => $currents['section'], 'options'=>$sections, 'empty'=>true]); ?>
    </div>
    
	<div class="columns">
        <?= $this->Form->control('radio', ['type'=>'select', 'options'=>$radios, 'empty'=>'-- Disabled --', 'value'=>$currents['radio']]); ?>
    </div>

	<div class="columns" id="divcivaddress" style="display:none;">
		<?= $this->Form->control('civ_address', ['value'=>$currents['civ_address']]); ?>
	</div>
	<div class="columns">
		<?= $this->Form->control('port_speed', ['default'=>19200, 'value'=>$currents['port_speed']]); ?>
	</div>
    <div class="columns">
        <?= $this->Form->control('com_port', ['default'=>19200, 'value'=>$currents['com_port']]); ?>
    </div>

	<div class="columns">
		<div class="row">
			<div class="columns large-6">
        		<?= $this->Form->button(__('Submit'), ['class'=>'button']) ?>
        	</div>
        	<div class="columns large-6">
        		<?= $this->Html->link('Cancel', ['controller'=>'contacts'], ['class'=>'button secondary']); ?>
        	</div>
        </div>
    </div>

</div>

<script>
$(function(){
   
    if($("#radio").find("option:selected").html().indexOf('Icom') >= 0) { 
    	
    		$("#divcivaddress").show();
    }

    $('#radio').change(function(){
        if($(this).find("option:selected").html().indexOf('Icom') >= 0) { 
            $("#divcivaddress").show();
        } else { 
        	$("#divcivaddress").hide();
            $("#civ-address").val(null);
        }
        //console.log($(this).val());
    });


});
</script>