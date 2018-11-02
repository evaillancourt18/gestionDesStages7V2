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
        <li><?= $this->Html->link(__('List Internships'), ['controller' => 'Internships', 'action' => 'index']) ?></li>
        <?php if($role === 'admin') :?>
            <li><?= $this->Html->link(__('List Supervisors'), ['controller' => 'Supervisors', 'action' => 'index']) ?></li>
            <li><?= $this->Html->link(__('List Students'), ['controller' => 'Students', 'action' => 'index']) ?></li>
            <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
            <li><?= $this->Html->link(__('New Supervisor Account'), ['controller' => 'Users', 'action' => 'addSuper']) ?></li>
        <?php elseif($user->role === 'supervisor') :?>
            <li> <?= $this->Html->link(__('New Internship'), ['controller' => 'Internships', 'action' => 'add', $user->id]) ?></li>
        <?php endif ?>       
    </ul>
</nav>
<div class="users form large-9 medium-8 columns content">
    <?= $this->Form->create($user) ?>
    <fieldset>
        <legend><?= __('Edit student') ?></legend>
        <?php
        echo $this->Form->hidden('student_number');
        echo $this->Form->control('last_name');
        echo $this->Form->control('first_name');
        echo $this->Form->control('phone');
        echo $this->Form->control('grade');
        echo $this->Form->hidden('email', ['type' => 'email']);
        echo $this->Form->control('info', ['type' => 'text', 'label' => __('Additional information')]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
