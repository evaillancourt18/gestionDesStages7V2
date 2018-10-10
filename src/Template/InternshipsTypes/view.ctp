<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\InternshipsType $internshipsType
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Internships Type'), ['action' => 'edit', $internshipsType->internship_id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Internships Type'), ['action' => 'delete', $internshipsType->internship_id], ['confirm' => __('Are you sure you want to delete # {0}?', $internshipsType->internship_id)]) ?> </li>
        <li><?= $this->Html->link(__('List Internships Types'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Internships Type'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Internships'), ['controller' => 'Internships', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Internship'), ['controller' => 'Internships', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Types'), ['controller' => 'Types', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Type'), ['controller' => 'Types', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="internshipsTypes view large-9 medium-8 columns content">
    <h3><?= h($internshipsType->internship_id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Internship') ?></th>
            <td><?= $internshipsType->has('internship') ? $this->Html->link($internshipsType->internship->title, ['controller' => 'Internships', 'action' => 'view', $internshipsType->internship->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Type') ?></th>
            <td><?= $internshipsType->has('type') ? $this->Html->link($internshipsType->type->name, ['controller' => 'Types', 'action' => 'view', $internshipsType->type->id]) : '' ?></td>
        </tr>
    </table>
</div>
