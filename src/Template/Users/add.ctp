<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li><?= $this->Html->link(__('List Internships'), ['controller' => 'Internships', 'action' => 'index']) ?></li>
    </ul>
</nav>
<div class="users form large-9 medium-8 columns content">
    <?= $this->Form->create($user) ?>
    <fieldset>
        <legend><?= __('Create new student account') ?></legend>
        <?php           
            echo $this->Form->control('student_number');
            echo $this->Form->control('last_name');
            echo $this->Form->control('first_name');
            echo $this->Form->control('phone');            
            echo $this->Form->control('grade');
            echo $this->Form->hidden('role', ['value' => 'student']);
            echo $this->Form->hidden('actif', ['value' => '1']);
            echo $this->Form->control('email', ['type' => 'email']);
            echo $this->Form->control('password');
            echo $this->Form->control('info', ['type' => 'text']);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
