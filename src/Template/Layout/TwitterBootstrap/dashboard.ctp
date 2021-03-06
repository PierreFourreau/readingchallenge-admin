<?php
use Cake\Core\Configure;
echo $this->Html->meta(array('name' => 'viewport', 'content' => 'width=device-width, initial-scale=1'));

$this->Html->css('BootstrapUI.dashboard', ['block' => true]);
$this->prepend('tb_body_attrs', ' class="' . implode(' ', array($this->request->controller, $this->request->action)) . '" ');
$this->start('tb_body_start');
?>
<body <?= $this->fetch('tb_body_attrs') ?>>
  <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container-fluid">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#"><?= Configure::read('App.title') ?></a>
      </div>
      <div class="navbar-collapse collapse">
        <!-- <ul class="nav navbar-nav navbar-right visible-xs">
        <?= $this->fetch('tb_sidebar') ?>
      </ul> -->

      <ul class="nav navbar-nav navbar-left">
        <li><?= $this->Html->link('Readingchallenge','/'); ?></li>
        <?php
        if(isset($currentUser)) {
          echo "<li>" . $this->Html->link(__('Propositions'),array('controller'=>'Propositions','action'=>'index')) . "</li>";
          echo "<li>" . $this->Html->link(__('Logs API'),array('controller'=>'Logs','action'=>'index')) . "</li>";
          echo "<li>" . $this->Html->link(__('Logs OVH'), 'https://logs.ovh.net/pierrefourreau.fr/', ['target' => '_blank']) . "</li>";
          echo "<li>" . $this->Html->link(__('Logout'),array('controller'=>'Users','action'=>'logout')) . "</li>";
        }
        else {
          echo $this->Html->link(__('Login'),array('controller'=>'users','action'=>'login'));
        }
        ?>
        <!-- <li><a href="#">Settings</a></li>
        <li><a href="#">Profile</a></li>
        <li><a href="#">Help</a></li> -->
      </ul>
      <!-- <form class="navbar-form navbar-right">
        <input type="text" class="form-control" placeholder="Search...">
      </form> -->

    </div>
  </div>
</div>

<div class="container-fluid">
  <div class="row">
    <div class="col-sm-3 col-md-2 sidebar">
      <?= $this->Html->link(__('Liste des categories'), ['controller' => 'categories', 'action' => 'index']) ?><br/>
      <?= $this->Html->link(__('Liste des propositions'), ['controller' => 'propositions', 'action' => 'index']) ?>
      <?= $this->fetch('tb_sidebar') ?>
    </div>
    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
      <?php
      /**
      * Default `flash` block.
      */
      if (!$this->fetch('tb_flash')) {
        $this->start('tb_flash');
        if (isset($this->Flash))
        echo $this->Flash->render();
        $this->end();
      }
      $this->end();

      $this->start('tb_body_end');
      echo '</body>';
      $this->end();

      $this->append('content', '</div></div></div>');
      echo $this->fetch('content');
