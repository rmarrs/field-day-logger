<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\Section $section
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Section'), ['action' => 'edit', $section->abbr]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Section'), ['action' => 'delete', $section->abbr], ['confirm' => __('Are you sure you want to delete # {0}?', $section->abbr)]) ?> </li>
        <li><?= $this->Html->link(__('List Sections'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Section'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="sections view large-9 medium-8 columns content">
    <h3><?= h($section->abbr) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Abbr') ?></th>
            <td><?= h($section->abbr) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Area') ?></th>
            <td><?= h($section->area) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Description') ?></th>
            <td><?= h($section->description) ?></td>
        </tr>
    </table>
</div>
