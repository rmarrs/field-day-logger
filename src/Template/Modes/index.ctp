<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\Mode[]|\Cake\Collection\CollectionInterface $modes
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Mode'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="modes index large-9 medium-8 columns content">
    <h3><?= __('Modes') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('title') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($modes as $mode): ?>
            <tr>
                <td><?= $this->Number->format($mode->id) ?></td>
                <td><?= h($mode->title) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $mode->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $mode->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $mode->id], ['confirm' => __('Are you sure you want to delete # {0}?', $mode->id)]) ?>
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
