<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\InternshipsMission $internshipsMission
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $internshipsMission->internship_id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $internshipsMission->internship_id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Internships Missions'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Internships'), ['controller' => 'Internships', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Internship'), ['controller' => 'Internships', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Missions'), ['controller' => 'Missions', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Mission'), ['controller' => 'Missions', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="internshipsMissions form large-9 medium-8 columns content">
    <?= $this->Form->create($internshipsMission) ?>
    <fieldset>
        <legend><?= __('Edit Internships Mission') ?></legend>
        <?php
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
