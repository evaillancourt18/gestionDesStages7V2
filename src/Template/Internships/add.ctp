<?php
$loguser = $this->request->session()->read('Auth.User')
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Internship $internship
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li><?= $this->Html->link(__('List Internships'), ['action' => 'index']) ?></li>
         <?php if ($loguser['role'] == 'admin') : ?>
            <li><?= $this->Html->link(__('List Supervisors'), ['controller' => 'Supervisors', 'action' => 'index']) ?></li>
            <li><?= $this->Html->link(__('List Students'), ['controller' => 'Students', 'action' => 'index']) ?></li>			
            <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
            <li><?= $this->Html->link(__('New Supervisor Account'), ['controller' => 'Users', 'action' => 'addSuper']) ?></li>
        <?php endif; ?>
    </ul>
</nav>
<div class="internships form large-9 medium-8 columns content">
    <?= $this->Form->create($internship) ?>
    <fieldset>
        <legend><?= __('Add Internship') ?></legend>
        <?php
        echo $this->Form->control('title');
        echo $this->Form->control('address');
        echo $this->Form->control('city');
        echo $this->Form->control('province');
        echo $this->Form->control('postal_code');
        echo $this->Form->control('administrative_region');
        echo $this->Form->control('description', ['type' => 'text']);
        echo $this->Form->hidden('actif', ['value' => '1']);
        echo $this->Form->hidden('supervisor_id', ['value' => $supervisor[0]->id]);
        echo $this->Form->input('buildingType_id', [
            'type' => 'select',
            'multiple' => false,
            'options' => $buildingsTypes,
            'keyField' => 'id',
            'required' => 'required'
                ]);
        echo $this->Form->control('missions._ids', [
            'options' => $missions,
            'id' => 'magicselect',
            'type' => 'select',
            'multiple' => 'checkbox'
        ]);
        //echo $this->Form->control('missions._ids', ['options' => $missions]);
        //echo $this->Form->control('types._ids', ['options' => $types]);
        echo $this->Form->control('types._ids', [
            'options' => $types,
            'id' => 'magicselect',
            'type' => 'select',
            'multiple' => 'checkbox'
        ]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
