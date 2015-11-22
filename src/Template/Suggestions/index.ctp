<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Suggestion'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Categories'), ['controller' => 'Categories', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Category'), ['controller' => 'Categories', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="suggestions index large-9 medium-8 columns content">
    <h3><?= __('Suggestions') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('libelle_fr') ?></th>
                <th><?= $this->Paginator->sort('libelle_en') ?></th>
                <th><?= $this->Paginator->sort('categorie_id') ?></th>
                <th><?= $this->Paginator->sort('created') ?></th>
                <th><?= $this->Paginator->sort('modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($suggestions as $suggestion): ?>
            <tr>
                <td><?= $this->Number->format($suggestion->id) ?></td>
                <td><?= h($suggestion->libelle_fr) ?></td>
                <td><?= h($suggestion->libelle_en) ?></td>
                <td><?= $suggestion->has('category') ? $this->Html->link($suggestion->category->id, ['controller' => 'Categories', 'action' => 'view', $suggestion->category->id]) : '' ?></td>
                <td><?= h($suggestion->created) ?></td>
                <td><?= h($suggestion->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $suggestion->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $suggestion->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $suggestion->id], ['confirm' => __('Are you sure you want to delete # {0}?', $suggestion->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>
