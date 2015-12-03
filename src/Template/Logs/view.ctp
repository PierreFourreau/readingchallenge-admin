<?php $this->extend('../Layout/TwitterBootstrap/dashboard'); ?>
<div class="log view large-9 medium-8 columns content">
  <h3>Log</h3>
  <hr/>
  <?php
  echo "<pre>".($contents)."</pre>";
  echo $this->Html->link(__('Retour'),array('controller'=>'Logs','action'=>'index'));
  ?>
</div>
