<?php $this->extend('../Layout/TwitterBootstrap/dashboard'); ?>

<div class="propositions form large-9 medium-8 columns content">
    <?= $this->Form->create($proposition) ?>
    <fieldset>
        <legend><?= __('Edit proposition') ?></legend>
        <?php
            echo $this->Form->input('libelle_fr');
            echo $this->Form->input('libelle_en');
            echo $this->Form->input('url_fr');
            echo $this->Form->input('url_en');
            echo $this->Form->label('Language : ' . $proposition['user_language']) . '<br/><br/>';
            echo 'Si email non conforme, vous pouvez vider le champs...';
            echo $this->Form->input('user_email');
        ?>
    </fieldset>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
