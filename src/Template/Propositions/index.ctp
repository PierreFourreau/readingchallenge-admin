<?php $this->extend('../Layout/TwitterBootstrap/dashboard'); ?>
<div class="propositions index large-9 medium-8 columns content">
  <br/><br/>
  <div class="panel panel-default">
    <div class="panel-heading">Propositions des utilisateurs</div>
    <table class="table table-striped" cellpadding="0" cellspacing="0">
      <thead>
        <tr>
          <th><?= $this->Paginator->sort('id') ?></th>
          <th><?= $this->Paginator->sort('libelle_fr') ?></th>
          <th><?= $this->Paginator->sort('libelle_en') ?></th>
          <th><?= $this->Paginator->sort('url_fr') ?></th>
          <th><?= $this->Paginator->sort('url_en') ?></th>
          <th><?= $this->Paginator->sort('user_language') ?></th>
          <th><?= $this->Paginator->sort('user_email') ?></th>
          <th><?= $this->Paginator->sort('categorie_id') ?></th>
          <th class="created"><?= $this->Paginator->sort('created') ?></th>
          <th class="actions"><?= __('Actions') ?></th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($propositions as $proposition): ?>
          <tr>
            <td><?= $this->Number->format($proposition->id) ?></td>
            <td><?= h($proposition->libelle_fr) ?></td>
            <td><?= h($proposition->libelle_en) ?></td>
            <td><?= h($proposition->url_fr) ?></td>
            <td><?= h($proposition->url_en) ?></td>
            <td><?= h($proposition->user_language) ?></td>
            <td><?= h($proposition->user_email) ?></td>
            <td><?= h($proposition->categorie->libelle_fr) ?></td>
            <td class="created"><?= h($proposition->created) ?></td>
            <td class="actions">
              <?= $this->Html->link(__('Edit'), ['action' => 'edit', $proposition->id]) ?> /
              <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $proposition->id], ['confirm' => __('Are you sure you want to delete # {0}?', $proposition->id)]) ?> /
              <?= $this->Html->link(__('Valider'), ['action' => 'validate', $proposition->id], ['confirm' => __('Are you sure you want to validate and insert to suggestions # {0}?', $proposition->id)]) ?>
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
