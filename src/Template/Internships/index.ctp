<?php
$loguser = $this->request->getSession()->read('Auth.User');
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Internship[]|\Cake\Collection\CollectionInterface $internships
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <?php if ($loguser['role'] == 'admin') : ?>
            <li><?= $this->Html->link(__('List Supervisors'), ['controller' => 'Supervisors', 'action' => 'index']) ?></li>
            <li><?= $this->Html->link(__('List Students'), ['controller' => 'Students', 'action' => 'index']) ?></li>			
            <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
            <li><?= $this->Html->link(__('New Supervisor Account'), ['controller' => 'Users', 'action' => 'addSuper']) ?></li>
        <?php endif; ?>
        <?php if ($loguser['role'] == 'supervisor') : ?>
            <li> <?= $this->Html->link(__('New Internship'), ['controller' => 'Internships', 'action' => 'add', $loguser['id']]) ?></li>
        <?php endif ?>
        <?php if ($loguser['role'] == 'student') : ?>
        <li><?= $this->Html->link(__('List of application'), ['controller' => 'InternshipsStudents', 'action' => 'index']) ?></li>
         <?php endif ?>
       
    </ul>
</nav>
<div class="internships index large-9 medium-8 columns content">
    <h3><?= __('Internships') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('title') ?></th>
                <th scope="col"><?= $this->Paginator->sort('address') ?></th>
                <th scope="col"><?= $this->Paginator->sort('city') ?></th>
                <th scope="col"><?= $this->Paginator->sort('province') ?></th>
                <th scope="col"><?= $this->Paginator->sort('postal_code') ?></th>
                <th scope="col"><?= $this->Paginator->sort('administrative_region') ?></th>
                <th scope="col"><?= $this->Paginator->sort('actif') ?></th>
                <th scope="col"><?= $this->Paginator->sort('supervisor_id', ['label' => 'Phone']) ?></th>
                <th scope="col"><?= $this->Paginator->sort('building_type') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($internships as $internship): ?>
                <?php if(($loguser['id'] == $internship['supervisor']->user_id) || $loguser['role'] === 'student' || $loguser['role'] === 'admin') : ?>
                
                <tr>
                    <td><?= h($internship->title) ?></td>
                    <td><?= h($internship->address) ?></td>
                    <td><?= h($internship->city) ?></td>
                    <td><?= h($internship->province) ?></td>
                    <td><?= h($internship->postal_code) ?></td>
                    <td><?= h($internship->administrative_region) ?></td>
                    <td><?= h($internship->actif ? __('Yes') : __('No')); ?></td>
                    <?php $phone = $internship->supervisor->phone; $phone = str_replace('.', '-', $phone) ?>
                    <td><?= $phone ?></td>
                    <td><?= h($internship['buildings_type']->name) ?></td>
                    <td><?= h($internship->created) ?></td> 
                    <td class="actions">
                    
                        <?= $this->Html->link(__('View'), ['action' => 'view', $internship->id]) ?><br/>
                        
                        <?php if($loguser['role'] !== 'student') : ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $internship->id]) ?><br/>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $internship->id], ['confirm' => __('Are you sure you want to delete # {0}?', $internship->id)]) ?><br/>
                        
                        <?= $this->Html->link(__('View Application'), ['controller' => 'InternshipsStudents', 'action' => 'viewApplication', $internship->id]) ?><br/>
                        <?php endif ?>
                    </td>
                </tr>
                <?php endif ?>
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
