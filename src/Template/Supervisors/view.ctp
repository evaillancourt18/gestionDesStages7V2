<?php
$loguser = $this->request->session()->read('Auth.User')
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Supervisor $supervisor
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li><?= $this->Html->link(__('List Internships'), ['controller' => 'Internships', 'action' => 'index']) ?></li>
        <?php if ($loguser['role'] == 'admin') : ?>
            <li> <?= $this->Html->link(__('List Supervisors'), ['controller' => 'Supervisors', 'action' => 'index']) ?> </li>
            <li> <?= $this->Html->link(__('List Students'), ['controller' => 'Students', 'action' => 'index']) ?></li>			
            <li> <?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
            <li> <?= $this->Html->link(__('New Supervisor Account'), ['controller' => 'Users', 'action' => 'addSuper']) ?></li>
        <?php endif ?>
        <?php if ($loguser == null) : ?>
            <li> <?= $this->Html->link(__('New Student Account'), ['controller' => 'users', 'action' => 'addStudent']) ?></li>
        <?php elseif ($loguser['role'] == 'supervisor') : ?>
            <li> <?= $this->Html->link(__('New Internship'), ['controller' => 'Internships', 'action' => 'add', $loguser['id']]) ?></li>
        <?php endif ?>
    </ul>
</nav>
<div class="supervisors view large-9 medium-8 columns content">
    <h3><?= h($supervisor->title) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Gender') ?></th>
            <td><?= h($supervisor->gender) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('First Name') ?></th>
            <td><?= h($supervisor->first_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Last Name') ?></th>
            <td><?= h($supervisor->last_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Title') ?></th>
            <td><?= h($supervisor->title) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Location') ?></th>
            <td><?= h($supervisor->location) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Address') ?></th>
            <td><?= h($supervisor->address) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('City') ?></th>
            <td><?= h($supervisor->city) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Province') ?></th>
            <td><?= h($supervisor->province) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Postal Code') ?></th>
            <td><?= h($supervisor->postal_code) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Email') ?></th>
            <td><?= h($supervisor->email) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Phone') ?></th>
            <td><?= h($supervisor->phone) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Extension') ?></th>
            <td><?= h($supervisor->extension) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Cellphone') ?></th>
            <td><?= h($supervisor->cellphone) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Fax') ?></th>
            <td><?= h($supervisor->fax) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Internships') ?></h4>
        <?php if (!empty($supervisor->internships)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Title') ?></th>
                <th scope="col"><?= __('Address') ?></th>
                <th scope="col"><?= __('City') ?></th>
                <th scope="col"><?= __('Province') ?></th>
                <th scope="col"><?= __('Postal Code') ?></th>
                <th scope="col"><?= __('Administrative Region') ?></th>
                <th scope="col"><?= __('Actif') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($supervisor->internships as $internships): ?>
            <tr>
                <td><?= h($internships->title) ?></td>
                <td><?= h($internships->address) ?></td>
                <td><?= h($internships->city) ?></td>
                <td><?= h($internships->province) ?></td>
                <td><?= h($internships->postal_code) ?></td>
                <td><?= h($internships->administrative_region) ?></td>
                <?php if(($internships->actif) == 1){
                    $estActif = "Yes";
                }else{
                    $estActif = "No";
                } ?>
                <td><?= h(__($estActif)) ?></td>
                <td><?= h($internships->created) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Internships', 'action' => 'view', $internships->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Internships', 'action' => 'edit', $internships->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Internships', 'action' => 'delete', $internships->id], ['confirm' => __('Are you sure you want to delete # {0}?', $internships->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
