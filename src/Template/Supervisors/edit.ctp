<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Supervisor $supervisor
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $supervisor->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $supervisor->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Supervisors'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Internships'), ['controller' => 'Internships', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Internship'), ['controller' => 'Internships', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="supervisors form large-9 medium-8 columns content">
    <?= $this->Form->create($supervisor) ?>
    <fieldset>
        <legend><?= __('Edit Supervisor') ?></legend>
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
            echo $this->Form->control('email');
            echo $this->Form->control('phone');
            echo $this->Form->control('extension');
            echo $this->Form->control('cellphone');
            echo $this->Form->control('fax');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
