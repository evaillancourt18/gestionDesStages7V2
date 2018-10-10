<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\InternshipsMission $internshipsMission
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Internships Mission'), ['action' => 'edit', $internshipsMission->internship_id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Internships Mission'), ['action' => 'delete', $internshipsMission->internship_id], ['confirm' => __('Are you sure you want to delete # {0}?', $internshipsMission->internship_id)]) ?> </li>
        <li><?= $this->Html->link(__('List Internships Missions'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Internships Mission'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Internships'), ['controller' => 'Internships', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Internship'), ['controller' => 'Internships', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Missions'), ['controller' => 'Missions', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Mission'), ['controller' => 'Missions', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="internshipsMissions view large-9 medium-8 columns content">
    <h3><?= h($internshipsMission->internship_id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Internship') ?></th>
            <td><?= $internshipsMission->has('internship') ? $this->Html->link($internshipsMission->internship->title, ['controller' => 'Internships', 'action' => 'view', $internshipsMission->internship->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Mission') ?></th>
            <td><?= $internshipsMission->has('mission') ? $this->Html->link($internshipsMission->mission->name, ['controller' => 'Missions', 'action' => 'view', $internshipsMission->mission->id]) : '' ?></td>
        </tr>
    </table>
</div>
