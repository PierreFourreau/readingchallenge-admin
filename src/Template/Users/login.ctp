<!-- src/Template/Users/login.ctp -->

<?php $this->extend('../Layout/TwitterBootstrap/signin'); ?>

<div class="users form">
<?= $this->Flash->render('auth') ?>
<?= $this->Form->create() ?>
    <fieldset>
        <legend><?= __("Merci de rentrer vos nom d'utilisateur et mot de passe") ?></legend>
        <?= $this->Form->input('username') ?>
        <?= $this->Form->input('password') ?>
    </fieldset>
<?= $this->Form->button('Se Connecter', ['class' => 'btn-primary']); ?>
<?= $this->Form->end() ?>
</div>
