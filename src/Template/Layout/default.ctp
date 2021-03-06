<?php
/**
* CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
* Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
*
* Licensed under The MIT License
* For full copyright and license information, please see the LICENSE.txt
* Redistributions of files must retain the above copyright notice.
*
* @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
* @link          http://cakephp.org CakePHP(tm) Project
* @since         0.10.0
* @license       http://www.opensource.org/licenses/mit-license.php MIT License
*/

$cakeDescription = 'ReadingChallenge admin';
?>
<!DOCTYPE html>
<html>
<head>
  <?= $this->Html->charset() ?>
  <title>
    <?= $cakeDescription ?>:
    <?= $this->fetch('title') ?>
  </title>
  <?= $this->Html->meta('icon') ?>

  <?= $this->fetch('meta') ?>
  <?= $this->fetch('css') ?>
  <?= $this->fetch('script') ?>

  <?= $this->Html->script('bootstrap'); ?>
</head>
<body>
  <?php echo $this->Flash->render(); ?>

  <div class="container">
    <?php echo $this->fetch('content'); ?>
    <hr>
    <footer>
      <?=  $this->Html->link($currentUser['username'],'#');?>
      <p>Développé par <a href="http://pierrefourreau.fr">Pierre Fourreau</a></p>
    </footer>
  </div>
</body>
</html>
