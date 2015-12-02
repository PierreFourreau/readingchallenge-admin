<?php $this->extend('../Layout/TwitterBootstrap/dashboard'); ?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Suggestions'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Categories'), ['controller' => 'Categories', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Category'), ['controller' => 'Categories', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="suggestions form large-9 medium-8 columns content">
    <?= $this->Form->create($suggestion) ?>
    <fieldset>
        <legend><?= __('Add Suggestion') ?></legend>
        <?php
            echo $this->Form->input('libelle_fr');
            echo $this->Form->input('libelle_en');
            if(isset($this->request->pass) && isset($this->request->pass[0])) {
echo $this->Form->input('categorie_id', ['options' => $categories, 'default' => $this->request->pass[0] != null ? $this->request->pass[0] : '']);
            }
            else {
            echo $this->Form->input('categorie_id', ['options' => $categories]);

            }
        ?>
    </fieldset>
    <?= $this->Form->button('Submit', ['class' => 'btn-primary']) ?>
    <?= $this->Form->end() ?>
</div>
