<?php
/**
  * @var \App\View\AppView $this
  */
?>
<div class="contacts form large-5 medium-8 columns row align-center">
    <?= $this->Form->create($contact) ?>
    <fieldset>
        <legend><?= __('Edit Contact') ?></legend>
        <?php
            echo $this->Form->control('callsign');
            echo $this->Form->control('class');
            echo $this->Form->control('sections_abbr', ['options' => $sections]);
            echo $this->Form->control('station_name');
            echo $this->Form->control('operator_callsign');
            echo $this->Form->control('bands_id', ['options' => $bands]);
            echo $this->Form->control('modes_id', ['options' => $modes]);
        ?>
    </fieldset>
    <div class="row">
        <div class="columns large-3">
            <?= $this->Form->button(__('Submit'), ['class'=>'button']) ?>
        </div>
        <div class="columns large-3">
            <?= $this->Html->link(__('Cancel'), ['action'=>'index'], ['class'=>'button secondary']) ?>
        </div>
    <?= $this->Form->end() ?>
</div>
