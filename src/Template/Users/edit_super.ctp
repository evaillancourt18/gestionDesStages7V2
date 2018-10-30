<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Supervisor $supervisor
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li><?= $this->Html->link(__('List Internships'), ['controller' => 'Internships', 'action' => 'index']) ?></li>
        <li> <?= $this->Html->link(__('New Internship'), ['controller' => 'Internships', 'action' => 'add', $user->id]) ?></li>
        
    </ul>
</nav>
<div class="supervisors form large-9 medium-8 columns content">
    <?= $this->Form->create($user) ?>
    <fieldset>
        <legend><?= __('Edit Supervisor') ?></legend>
        <?php 
            $user->phone = str_replace('.', '-', $user->phone);
            $user->cellphone = str_replace('.', '-', $user->cellphone);
            $user->fax = str_replace('.', '-', $user->fax);
        ?>
        <?php
            echo $this->Form->control('gender');
            echo $this->Form->control('first_name');
            echo $this->Form->control('last_name');
            echo $this->Form->control('title');
            echo $this->Form->control('location');
            echo $this->Form->control('address');
            echo $this->Form->control('city');
            echo $this->Form->control('province');
            echo $this->Form->control('postal_code');           
            echo $this->Form->control('phone');
            echo $this->Form->control('extension');
            echo $this->Form->control('cellphone');
            echo $this->Form->control('fax');
            echo $this->Form->control('email');
            echo $this->Form->control('password');
            echo $this->Form->hidden('edit', ['value' => '1']);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
