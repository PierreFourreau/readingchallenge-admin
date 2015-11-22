<?php $this->extend('../Layout/TwitterBootstrap/dashboard'); ?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Suggestion'), ['action' => 'edit', $suggestion->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Suggestion'), ['action' => 'delete', $suggestion->id], ['confirm' => __('Are you sure you want to delete # {0}?', $suggestion->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Suggestions'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Suggestion'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Categories'), ['controller' => 'Categories', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Category'), ['controller' => 'Categories', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="suggestions view large-9 medium-8 columns content">
    <h3><?= h($suggestion->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Libelle Fr') ?></th>
            <td><?= h($suggestion->libelle_fr) ?></td>
        </tr>
        <tr>
            <th><?= __('Libelle En') ?></th>
            <td><?= h($suggestion->libelle_en) ?></td>
        </tr>
        <tr>
            <th><?= __('Category') ?></th>
            <td><?= $suggestion->has('category') ? $this->Html->link($suggestion->category->id, ['controller' => 'Categories', 'action' => 'view', $suggestion->category->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($suggestion->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($suggestion->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($suggestion->modified) ?></td>
        </tr>
    </table>
</div>
