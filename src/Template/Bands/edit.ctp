<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $band->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $band->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Bands'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="bands form large-9 medium-8 columns content">
    <?= $this->Form->create($band) ?>
    <fieldset>
        <legend><?= __('Edit Band') ?></legend>
        <?php
            echo $this->Form->control('title');
            echo $this->Form->control('frequency_start');
            echo $this->Form->control('frequency_end');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
