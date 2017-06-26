<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\Contact $contact
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Contact'), ['action' => 'edit', $contact->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Contact'), ['action' => 'delete', $contact->id], ['confirm' => __('Are you sure you want to delete # {0}?', $contact->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Contacts'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Contact'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Sections'), ['controller' => 'Sections', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Section'), ['controller' => 'Sections', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Bands'), ['controller' => 'Bands', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Band'), ['controller' => 'Bands', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Modes'), ['controller' => 'Modes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Mode'), ['controller' => 'Modes', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="contacts view large-9 medium-8 columns content">
    <h3><?= h($contact->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Callsign') ?></th>
            <td><?= h($contact->callsign) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Class') ?></th>
            <td><?= h($contact->class) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Section') ?></th>
            <td><?= $contact->has('section') ? $this->Html->link($contact->section->label, ['controller' => 'Sections', 'action' => 'view', $contact->section->abbr]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Station') ?></th>
            <td><?= h($contact->station) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Operator Callsign') ?></th>
            <td><?= h($contact->operator_callsign) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Band') ?></th>
            <td><?= $contact->has('band') ? $this->Html->link($contact->band->title, ['controller' => 'Bands', 'action' => 'view', $contact->band->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Mode') ?></th>
            <td><?= $contact->has('mode') ? $this->Html->link($contact->mode->title, ['controller' => 'Modes', 'action' => 'view', $contact->mode->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($contact->id) ?></td>
        </tr>
    </table>
</div>
