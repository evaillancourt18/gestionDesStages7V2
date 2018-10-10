<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
		<li><?= $this->Html->link(__('List Supervisors'), ['controller' => 'Supervisors','action' => 'index']) ?></li>
		<li><?= $this->Html->link(__('List Internships'), ['controller' => 'Internships', 'action' => 'index']) ?></li>
		<li><?= $this->Html->link(__('List Students'), ['controller' => 'Students','action' => 'index']) ?></li>			
		<li><?= $this->Html->link(__('List Users'), ['controller' => 'Users','action' => 'index']) ?></li>
		<li><?= $this->Html->link(__('New Supervisor Account'), ['controller' => 'Users', 'action' => 'addSuper']) ?></li>
    </ul>
</nav>
<div class="users form large-9 medium-8 columns content">
    <?= $this->Form->create($user) ?>
    <fieldset>
        <legend><?= __('Edit administrator') ?></legend>
        <?php
            echo $this->Form->control('name');
            echo $this->Form->control('phone');            
            echo $this->Form->control('email', ['type' => 'email']);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
