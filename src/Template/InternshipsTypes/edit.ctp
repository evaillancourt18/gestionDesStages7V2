<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\InternshipsType $internshipsType
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $internshipsType->internship_id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $internshipsType->internship_id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Internships Types'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Internships'), ['controller' => 'Internships', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Internship'), ['controller' => 'Internships', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Types'), ['controller' => 'Types', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Type'), ['controller' => 'Types', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="internshipsTypes form large-9 medium-8 columns content">
    <?= $this->Form->create($internshipsType) ?>
    <fieldset>
        <legend><?= __('Edit Internships Type') ?></legend>
        <?php
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
