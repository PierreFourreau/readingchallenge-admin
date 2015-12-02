<?php $this->extend('../Layout/TwitterBootstrap/dashboard'); ?>
<div class="categories index large-9 medium-8 columns content">
  <h3>Liste des catégories du challenge</h3>
  <hr/>
  <?= $this->Html->link('Add', array('action' => 'add'), array('class'=>'btn btn-primary', 'escape' => false)); ?>
  <br/><br/>
  <div class="panel panel-default">
    <div class="panel-heading">Categories</div>
    <table class="table table-striped" cellpadding="0" cellspacing="0">
      <thead>
        <tr>
          <th><?= $this->Paginator->sort('id') ?></th>
          <th><?= $this->Paginator->sort('libelle_fr') ?></th>
          <th><?= $this->Paginator->sort('libelle_en') ?></th>
          <th class="image"><?= $this->Paginator->sort('image') ?></th>
          <th class="created"><?= $this->Paginator->sort('created') ?></th>
          <th class="modified"><?= $this->Paginator->sort('modified') ?></th>
          <th class="actions"><?= __('Actions') ?></th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($categories as $category): ?>
          <tr>
            <td><?= $this->Number->format($category->id) ?></td>
            <td><?= h($category->libelle_fr) ?></td>
            <td><?= h($category->libelle_en) ?></td>
            <td class="image"><?= h($category->image) ?></td>
            <td class="created"><?= h($category->created) ?></td>
            <td class="modified"><?= h($category->modified) ?></td>
            <td class="actions">
              <?= $this->Html->link(__('View'), ['action' => 'view', $category->id]) ?>
              <?= $this->Html->link(__('Edit'), ['action' => 'edit', $category->id]) ?>
              <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $category->id], ['confirm' => __('Are you sure you want to delete # {0}?', $category->id)]) ?>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
  <div class="paginator">
    <ul class="pagination">
      <?= $this->Paginator->prev('< ' . __('previous')) ?>
      <?= $this->Paginator->numbers() ?>
      <?= $this->Paginator->next(__('next') . ' >') ?>
    </ul>
    <p><?= $this->Paginator->counter() ?></p>
  </div>
</div>
