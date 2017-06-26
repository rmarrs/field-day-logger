<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Contacts'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Sections'), ['controller' => 'Sections', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Section'), ['controller' => 'Sections', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Bands'), ['controller' => 'Bands', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Band'), ['controller' => 'Bands', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Modes'), ['controller' => 'Modes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Mode'), ['controller' => 'Modes', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="contacts form large-9 medium-8 columns content">
    <?= $this->Form->create($contact) ?>
    <fieldset>
        <legend><?= __('Add Contact') ?></legend>
        <?php
            echo $this->Form->control('callsign');
            echo $this->Form->control('class');
            echo $this->Form->control('sections_abbr', ['options' => $sections]);
            echo $this->Form->control('station');
            echo $this->Form->control('operator_callsign');
            echo $this->Form->control('bands_id', ['options' => $bands]);
            echo $this->Form->control('modes_id', ['options' => $modes]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
