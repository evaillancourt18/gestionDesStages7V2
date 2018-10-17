<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Internshipsstudent $internshipsstudent
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Internshipsstudent'), ['action' => 'edit', $internshipsstudent->internship_id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Internshipsstudent'), ['action' => 'delete', $internshipsstudent->internship_id], ['confirm' => __('Are you sure you want to delete # {0}?', $internshipsstudent->internship_id)]) ?> </li>
        <li><?= $this->Html->link(__('List Internshipsstudents'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Internshipsstudent'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Internships'), ['controller' => 'Internships', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Internship'), ['controller' => 'Internships', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Students'), ['controller' => 'Students', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Student'), ['controller' => 'Students', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="internshipsstudents view large-9 medium-8 columns content">
    <h3><?= h($internshipsstudent->internship_id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Internship') ?></th>
            <td><?= $internshipsstudent->has('internship') ? $this->Html->link($internshipsstudent->internship->title, ['controller' => 'Internships', 'action' => 'view', $internshipsstudent->internship->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Student') ?></th>
            <td><?= $internshipsstudent->has('student') ? $this->Html->link($internshipsstudent->student->id, ['controller' => 'Students', 'action' => 'view', $internshipsstudent->student->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($internshipsstudent->id) ?></td>
        </tr>
    </table>
</div>
