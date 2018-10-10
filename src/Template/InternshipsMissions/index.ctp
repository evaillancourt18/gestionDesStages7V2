<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\InternshipsMission[]|\Cake\Collection\CollectionInterface $internshipsMissions
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Internships Mission'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Internships'), ['controller' => 'Internships', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Internship'), ['controller' => 'Internships', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Missions'), ['controller' => 'Missions', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Mission'), ['controller' => 'Missions', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="internshipsMissions index large-9 medium-8 columns content">
    <h3><?= __('Internships Missions') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('internship_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('mission_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($internshipsMissions as $internshipsMission): ?>
            <tr>
                <td><?= $internshipsMission->has('internship') ? $this->Html->link($internshipsMission->internship->title, ['controller' => 'Internships', 'action' => 'view', $internshipsMission->internship->id]) : '' ?></td>
                <td><?= $internshipsMission->has('mission') ? $this->Html->link($internshipsMission->mission->name, ['controller' => 'Missions', 'action' => 'view', $internshipsMission->mission->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $internshipsMission->internship_id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $internshipsMission->internship_id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $internshipsMission->internship_id], ['confirm' => __('Are you sure you want to delete # {0}?', $internshipsMission->internship_id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
