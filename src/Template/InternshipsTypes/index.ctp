<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\InternshipsType[]|\Cake\Collection\CollectionInterface $internshipsTypes
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Internships Type'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Internships'), ['controller' => 'Internships', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Internship'), ['controller' => 'Internships', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Types'), ['controller' => 'Types', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Type'), ['controller' => 'Types', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="internshipsTypes index large-9 medium-8 columns content">
    <h3><?= __('Internships Types') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('internship_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('type_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($internshipsTypes as $internshipsType): ?>
            <tr>
                <td><?= $internshipsType->has('internship') ? $this->Html->link($internshipsType->internship->title, ['controller' => 'Internships', 'action' => 'view', $internshipsType->internship->id]) : '' ?></td>
                <td><?= $internshipsType->has('type') ? $this->Html->link($internshipsType->type->name, ['controller' => 'Types', 'action' => 'view', $internshipsType->type->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $internshipsType->internship_id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $internshipsType->internship_id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $internshipsType->internship_id], ['confirm' => __('Are you sure you want to delete # {0}?', $internshipsType->internship_id)]) ?>
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
