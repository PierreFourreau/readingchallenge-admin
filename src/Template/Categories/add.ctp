<?php $this->extend('../Layout/TwitterBootstrap/dashboard'); ?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Categories'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="categories form large-9 medium-8 columns content">
    <?= $this->Form->create($category, ['enctype' => 'multipart/form-data']) ?>
    <fieldset>
        <legend><?= __('Add Category') ?></legend>
        <?php
            echo $this->Form->label('Niveau')."<br/>";
            echo $this->Form->select('niveau', $niveaux)."<br/><br/>";
            echo $this->Form->input('libelle_fr');
            echo $this->Form->input('libelle_en');
            echo $this->Form->input('description_fr');
            echo $this->Form->input('description_en');
            echo $this->Form->input('image', ['type' => 'file']);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
