<?php $this->extend('../Layout/TwitterBootstrap/dashboard'); ?>
<div class="suggestions view large-9 medium-8 columns content">
    <h3>Suggestion</h3>
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
            <th><?= __('Url fr') ?></th>
            <td><?= h($suggestion->url_fr) ?></td>
        </tr>
        <tr>
            <th><?= __('Url en') ?></th>
            <td><?= h($suggestion->url_en) ?></td>
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
