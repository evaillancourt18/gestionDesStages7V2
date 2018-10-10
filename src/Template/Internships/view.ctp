<?php
$loguser = $this->request->session()->read('Auth.User')
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Internship $internship
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li><?= $this->Html->link(__('List Internships'), ['action' => 'index']) ?> </li>
         <?php if ($loguser['role'] == 'admin') : ?>
            <li> <?= $this->Html->link(__('List Supervisors'), ['controller' => 'Supervisors', 'action' => 'index']) ?> </li>
            <li> <?= $this->Html->link(__('List Students'), ['controller' => 'Students', 'action' => 'index']) ?></li>			
            <li> <?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
            <li> <?= $this->Html->link(__('New Supervisor Account'), ['controller' => 'Users', 'action' => 'addSuper']) ?></li>
        <?php endif ?>
        <?php if ($loguser['role'] == 'supervisor') : ?>
            <li> <?= $this->Html->link(__('New Internship'), ['controller' => 'Internships', 'action' => 'add', $loguser['id']]) ?></li>
            <li><?= $this->Html->link(__('Edit Internship'), ['action' => 'edit', $internship->id]) ?> </li>        
            <li><?= $this->Form->postLink(__('Delete Internship'), ['action' => 'delete', $internship->id], ['confirm' => __('Are you sure you want to delete # {0}?', $internship->id)]) ?> </li>
        <?php endif ?>
        
    </ul>
</nav>
<div class="internships view large-9 medium-8 columns content">
    <h3><?= h($internship->title) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Title') ?></th>
            <td><?= h($internship->title) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Address') ?></th>
            <td><?= h($internship->address) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('City') ?></th>
            <td><?= h($internship->city) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Province') ?></th>
            <td><?= h($internship->province) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Postal Code') ?></th>
            <td><?= h($internship->postal_code) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Administrative Region') ?></th>
            <td><?= h($internship->administrative_region) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Phone') ?></th>
            <?php $phone = $internship->supervisor->phone; $phone = str_replace('.', '-', $phone) ?>
            <td><?= $internship->has('supervisor') ? $this->Html->link($phone, ['controller' => 'Supervisors', 'action' => 'view', $internship->supervisor->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Building Type') ?></th>
            <td><?= h($internship['buildings_type']->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($internship->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Actif') ?></th>
            <td><?= $internship->actif ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Description') ?></th>
            <td><?= h($internship->description) ?></td>
        </tr>        
    </table>
    <div class="related">
        <h4><?= __('Related Missions') ?></h4>
        <?php if (!empty($internship->missions)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Name') ?></th>
            </tr>
            <?php foreach ($internship->missions as $missions): ?>
            <tr>
                <td><?= h($missions->name) ?></td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Types') ?></h4>
        <?php if (!empty($internship->types)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Name') ?></th>
            </tr>
            <?php foreach ($internship->types as $types): ?>
            <tr>
                <td><?= h($types->name) ?></td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
