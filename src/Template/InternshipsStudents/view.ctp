<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\InternshipsStudent $internshipsStudent
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Internships Student'), ['action' => 'edit', $internshipsStudent->internship_id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Internships Student'), ['action' => 'delete', $internshipsStudent->internship_id], ['confirm' => __('Are you sure you want to delete # {0}?', $internshipsStudent->internship_id)]) ?> </li>
        <li><?= $this->Html->link(__('List Internships Students'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Internships Student'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Internships'), ['controller' => 'Internships', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Internship'), ['controller' => 'Internships', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Students'), ['controller' => 'Students', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Student'), ['controller' => 'Students', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="internshipsStudents view large-9 medium-8 columns content">
    <h3><?= h($internshipsStudent->internship_id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Internship') ?></th>
            <td><?= $internshipsStudent->has('internship') ? $this->Html->link($internshipsStudent->internship->title, ['controller' => 'Internships', 'action' => 'view', $internshipsStudent->internship->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Student') ?></th>
            <td><?= $internshipsStudent->has('student') ? $this->Html->link($internshipsStudent->student->id, ['controller' => 'Students', 'action' => 'view', $internshipsStudent->student->id]) : '' ?></td>
        </tr>
    </table>
</div>
