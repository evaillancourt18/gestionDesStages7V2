<?php
$loguser = $this->request->session()->read('Auth.User');
$role = $loguser['role'];
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <?php
        $editAction = 'edit';
        if ($user->role == 'supervisor') :
            $editAction = 'editSuper';
        elseif ($user->role == 'student') :
            $editAction = 'editStudent';
        endif;
        ?>
        <li><?= $this->Html->link(__('List Internships'), ['controller' => 'Internships', 'action' => 'index']) ?></li>   
        <?php if ($role === 'admin') : ?>
            <li><?= $this->Html->link(__('List Supervisors'), ['controller' => 'Supervisors', 'action' => 'index']) ?></li>           
            <li><?= $this->Html->link(__('List Students'), ['controller' => 'Students', 'action' => 'index']) ?></li>			
            <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>			
            <li><?= $this->Html->link(__('New Supervisor Account'), ['controller' => 'Users', 'action' => 'addSuper']) ?></li>
        <?php endif ?>       
        <?php if ($role === 'supervisor') : ?>
            <li> <?= $this->Html->link(__('New Internship'), ['controller' => 'Internships', 'action' => 'add', $loguser['id']]) ?></li>
        <?php endif ?>
        <?php if ($role === 'student') : ?>
            <li> <?= $this->Html->link(__('New File'), ['controller' => 'Files', 'action' => 'add']) ?></li>
            <li> <?= $this->Html->link(__('View File'), ['controller' => 'Files', 'action' => 'index',""]) ?></li>
        
        <?php endif ?>
        <li><?= $this->Html->link(__('Edit account'), ['controller' => 'Users', 'action' => $editAction, $user->id]) ?></li>
    </ul>
</nav>
<div class="users view large-9 medium-8 columns content">
    <?php
    if ($user->role === 'student') :
        echo $this->element('studentView', [$user]);
    elseif ($user->role === 'admin') :
        echo $this->element('adminView', [$user]);
    elseif ($user->role === 'supervisor') :
        echo $this->element('supervisorView', [$user]);
    endif;
    ?>
</div>

