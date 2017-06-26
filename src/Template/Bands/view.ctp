<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\Band $band
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Band'), ['action' => 'edit', $band->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Band'), ['action' => 'delete', $band->id], ['confirm' => __('Are you sure you want to delete # {0}?', $band->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Bands'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Band'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="bands view large-9 medium-8 columns content">
    <h3><?= h($band->title) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Title') ?></th>
            <td><?= h($band->title) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($band->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Frequency Start') ?></th>
            <td><?= $this->Number->format($band->frequency_start) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Frequency End') ?></th>
            <td><?= $this->Number->format($band->frequency_end) ?></td>
        </tr>
    </table>
</div>
