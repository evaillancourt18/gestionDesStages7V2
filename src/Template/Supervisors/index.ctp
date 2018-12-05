<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Supervisor[]|\Cake\Collection\CollectionInterface $supervisors
 */
$loguser = $this->request->getSession()->read('Auth.User');
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li><?= $this->Html->link(__('List Internships'), ['controller' => 'Internships', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Students'), ['controller' => 'Students', 'action' => 'index']) ?></li>			
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Supervisor Account'), ['controller' => 'Users', 'action' => 'addSuper']) ?></li>
    </ul>
</nav>
<div class="supervisors index large-9 medium-8 columns content">
    <h3><?= __('Supervisors') ?></h3>

     <?php 

        if($loguser['role'] === 'admin') {
            echo $this->Html->link($this->Form->button('Active'), array('action' => 'index', 'active'), array('escape'=>false)); 
            echo "\r\n";
            echo $this->Html->link($this->Form->button('Inactive'), array('action' => 'index', 'inactive'), array('escape'=>false)); 
            echo "\r\n";
            echo $this->Html->link($this->Form->button('All'), array('action' => 'index'), array('escape'=>false));
        }
    ?>

    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('first_name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('last_name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('title') ?></th>
                <th scope="col"><?= $this->Paginator->sort('location') ?></th>
                <th scope="col"><?= $this->Paginator->sort('address') ?></th>
                <th scope="col"><?= $this->Paginator->sort('city') ?></th>
                <th scope="col"><?= $this->Paginator->sort('province') ?></th>
                <th scope="col"><?= $this->Paginator->sort('postal_code') ?></th>
                <th scope="col"><?= $this->Paginator->sort('phone') ?></th>
                <th scope="col"><?= $this->Paginator->sort('extension') ?></th>
                <th scope="col"><?= $this->Paginator->sort('cellphone') ?></th>
                <th scope="col"><?= $this->Paginator->sort('fax') ?></th>
                <th scope="col"><?= $this->Paginator->sort('email') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($supervisors as $supervisor): ?>
                <tr>
                    <td><?= h($supervisor->first_name) ?></td>
                    <td><?= h($supervisor->last_name) ?></td>
                    <td><?= h($supervisor->title) ?></td>
                    <td><?= h($supervisor->location) ?></td>
                    <td><?= h($supervisor->address) ?></td>
                    <td><?= h($supervisor->city) ?></td>
                    <td><?= h($supervisor->province) ?></td>
                    <td><?= h($supervisor->postal_code) ?></td>
                    <?php 
                        $phone = $supervisor->phone;
                        $cellphone = $supervisor->cellphone;
                        $fax = $supervisor->phone;
                        $phone = str_replace('.', '-', $phone);
                        $cellphone = str_replace('.', '-', $cellphone); 
                        $fax = str_replace('.', '-', $fax); 
                    ?>
                    <td><?= h($phone) ?></td>
                    <td><?= h($supervisor->extension) ?></td>
                    <td><?= h($cellphone) ?></td>
                    <td><?= h($fax) ?></td>
                    <td><?= h($supervisor->email) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $supervisor->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $supervisor->id]) ?>
    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $supervisor->id], ['confirm' => __('Are you sure you want to delete # {0}?', $supervisor->id)]) ?>
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
