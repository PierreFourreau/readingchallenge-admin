<?php $this->extend('../Layout/TwitterBootstrap/dashboard'); ?>
<div class="categories index large-9 medium-8 columns content">
  <?= $this->Html->link('Add', array('action' => 'add'), array('class'=>'btn btn-primary', 'escape' => false)); ?>
  <br/><br/>
  <div class="panel panel-default">
    <div class="panel-heading">Toutes les suggestions</div>
    <table class="table table-striped" cellpadding="0" cellspacing="0">
      <thead>
        <tr>
          <th><?= $this->Paginator->sort('id') ?></th>
          <th><?= $this->Paginator->sort('libelle_fr') ?></th>
          <th><?= $this->Paginator->sort('libelle_en') ?></th>
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
