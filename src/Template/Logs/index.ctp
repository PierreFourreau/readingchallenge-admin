<?php $this->extend('../Layout/TwitterBootstrap/dashboard'); ?>
<div class="logs index large-9 medium-8 columns content">
  <div class="panel panel-default">
    <div class="panel-heading">Logs de l'API</div>
    <table class="table table-striped" cellpadding="0" cellspacing="0">
      <thead>
        <tr>
          <th>Fichier</th>
          <th class="actions"><?= __('Actions') ?></th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($files as $file): ?>
          <tr>
            <td><?= $file ?></td>
            <td class="actions">
              <?= $this->Html->link(__('Voir'), ['action' => 'view', $file]) ?>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
