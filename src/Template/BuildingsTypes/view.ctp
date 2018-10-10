<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\BuildingsType $buildingsType
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Buildings Type'), ['action' => 'edit', $buildingsType->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Buildings Type'), ['action' => 'delete', $buildingsType->id], ['confirm' => __('Are you sure you want to delete # {0}?', $buildingsType->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Buildings Types'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Buildings Type'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="buildingsTypes view large-9 medium-8 columns content">
    <h3><?= h($buildingsType->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($buildingsType->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($buildingsType->id) ?></td>
        </tr>
    </table>
</div>
