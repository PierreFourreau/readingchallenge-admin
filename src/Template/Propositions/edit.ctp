<?php $this->extend('../Layout/TwitterBootstrap/dashboard'); ?>

<div class="propositions form large-9 medium-8 columns content">
    <?= $this->Form->create($proposition) ?>
    <fieldset>
        <legend><?= __('Edit proposition') ?></legend>
        <?php
            echo $this->Form->input('libelle_fr');
            echo $this->Form->input('libelle_en');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
