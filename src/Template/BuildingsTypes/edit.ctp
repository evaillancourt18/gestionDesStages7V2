<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\BuildingsType $buildingsType
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $buildingsType->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $buildingsType->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Buildings Types'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="buildingsTypes form large-9 medium-8 columns content">
    <?= $this->Form->create($buildingsType) ?>
    <fieldset>
        <legend><?= __('Edit Buildings Type') ?></legend>
        <?php
            echo $this->Form->control('name');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
