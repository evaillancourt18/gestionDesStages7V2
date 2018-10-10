<?php $loguser = $this->request->session()->read('Auth.User') ?>

<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <?php if($loguser) :?>
            <li><?= $this->Html->link(__('List Internships'), ['controller' => 'Internships', 'action' => 'index']) ?></li>
        <?php endif?>    
        <?php if ($loguser['role'] == 'admin') : ?>
            <li> <?= $this->Html->link(__('List Supervisors'), ['controller' => 'Supervisors', 'action' => 'index']) ?> </li>
            <li> <?= $this->Html->link(__('List Students'), ['controller' => 'Students', 'action' => 'index']) ?></li>			
            <li> <?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
            <li> <?= $this->Html->link(__('New Supervisor Account'), ['controller' => 'Users', 'action' => 'addSuper']) ?></li>
        <?php endif ?>
        <?php if ($loguser == null) : ?>
            <li> <?= $this->Html->link(__('New Student Account'), ['controller' => 'users', 'action' => 'addStudent']) ?></li>
        <?php elseif ($loguser['role'] == 'supervisor') : ?>
            <li> <?= $this->Html->link(__('New Internship'), ['controller' => 'Internships', 'action' => 'add', $loguser['id']]) ?></li>
        <?php endif ?>
    </ul>
</nav>
<div class="users index large-9 medium-8 columns content">
    <?= $this->Html->image('cMontmorency.png', ['alt' => 'CMontmorency']); ?>
</div>
