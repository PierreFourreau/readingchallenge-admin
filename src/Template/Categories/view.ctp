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
  <?php
  if($category->image != null) {
    echo $this->Html->image($category->image, ['class'=>'thumbnail']);
  }
  else {
    echo "Aucune image sélectionnée.";
  }
  ?>
  <div class="panel panel-default">
    <div class="panel-heading">Categorie id : <?= h($category->id) ?></div>
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
  <br/><br/>

  <?= $this->Html->link('Add suggestion', array('controller'=>'suggestions', 'action' => 'add', $category->id), array('class'=>'btn btn-primary', 'escape' => false)); ?>
  <?php
  if(count($category['suggestions']) == 0) {
    echo "<b>Aucune suggestions</b>";
  }
  else {

    ?>
    <br/><br/>
    <div class="panel panel-default">
      <div class="panel-heading">Suggestions</div>
      <table class="table table-striped">
        <tr>
          <th><?= __('Id') ?></th>
          <th><?= __('Libelle Fr') ?></th>
          <th><?= __('Libelle En') ?></th>
          <th><?= __('Action') ?></th>
        </tr>
        <?php foreach($category['suggestions'] as $suggestion) {?>
          <tr>
            <td><?= h($suggestion->id) ?></td>
            <td><?= h($suggestion->libelle_fr) ?></td>
            <td><?= h($suggestion->libelle_en) ?></td>
            <td><?= $this->Form->postLink(__('Delete'), ['controller'=>'suggestions', 'action' => 'delete', $suggestion->id], ['confirm' => __('Are you sure you want to delete # {0}?', $category->id)]) ?></td>
          </tr>
          <?php } ?>
        </table>
      </div>
      <?php
    }
    ?>
  </div>
