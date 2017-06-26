<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\Mode $mode
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Mode'), ['action' => 'edit', $mode->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Mode'), ['action' => 'delete', $mode->id], ['confirm' => __('Are you sure you want to delete # {0}?', $mode->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Modes'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Mode'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="modes view large-9 medium-8 columns content">
    <h3><?= h($mode->title) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Title') ?></th>
            <td><?= h($mode->title) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($mode->id) ?></td>
        </tr>
    </table>
</div>
