<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Modes'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="modes form large-9 medium-8 columns content">
    <?= $this->Form->create($mode) ?>
    <fieldset>
        <legend><?= __('Add Mode') ?></legend>
        <?php
            echo $this->Form->control('title');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
