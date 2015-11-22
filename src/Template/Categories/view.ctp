<?php $this->extend('../Layout/TwitterBootstrap/dashboard'); ?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Category'), ['action' => 'edit', $category->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Category'), ['action' => 'delete', $category->id], ['confirm' => __('Are you sure you want to delete # {0}?', $category->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Categories'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Category'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="categories view large-9 medium-8 columns content">
  <h3>Categorie id : <?= h($category->id) ?></h3>
  <table class="table table-striped">
    <tr>
      <th><?= __('Libelle Fr') ?></th>
      <td><?= h($category->libelle_fr) ?></td>
    </tr>
    <tr>
      <th><?= __('Libelle En') ?></th>
      <td><?= h($category->libelle_en) ?></td>
    </tr>
    <tr>
      <th><?= __('Image') ?></th>
      <td><?= h($category->image) ?></td>
    </tr>
    <tr>
      <th><?= __('Id') ?></th>
      <td><?= $this->Number->format($category->id) ?></td>
    </tr>
    <tr>
      <th><?= __('Created') ?></th>
      <td><?= h($category->created) ?></td>
    </tr>
    <tr>
      <th><?= __('Modified') ?></th>
      <td><?= h($category->modified) ?></td>
    </tr>
    <tr>
      <th><?= __('Description Fr') ?></th>
      <td><?= h($category->description_fr) ?></td>
    </tr>
    <tr>
      <th><?= __('Description Fr') ?></th>
      <td><?= h($category->description_en) ?></td>
    </tr>
  </table>

</div>
