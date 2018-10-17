<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Internshipsstudent[]|\Cake\Collection\CollectionInterface $internshipsStudents
 */
$loguser = $this->request->getSession()->read('Auth.User')
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Internships'), ['controller' => 'Internships', 'action' => 'index']) ?></li>
        
		<?php if($loguser['role'] != 'student') : ?><li><?= $this->Html->link(__('List Internships'), ['controller' => 'Internships', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Internship'), ['controller' => 'Internships', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Students'), ['controller' => 'Students', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Student'), ['controller' => 'Students', 'action' => 'add']) ?></li>
		<?php endif; ?>
	</ul>
</nav>
<div class="internshipsStudents index large-9 medium-8 columns content">
    <h3><?= __('Internships Students') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                
                <th scope="col"><?= $this->Paginator->sort('internship_id') ?></th>
                <?php if($loguser['role'] != 'student') :?>
				<th scope="col"><?= $this->Paginator->sort('student_id') ?></th>
                <?php endif; ?>
				<th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($internshipsStudents as $internshipsStudent): ?>
            <tr>
			 <?php if($loguser['role'] == 'student' && $loguser['id'] === $internshipsStudent->student->user_id) {?>
                <td><?= $internshipsStudent->has('internship') ? $this->Html->link($internshipsStudent->internship->title, ['controller' => 'Internships', 'action' => 'view', $internshipsStudent->internship->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $internshipsStudent->internship_id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $internshipsStudent->id], ['confirm' => __('Are you sure you want to delete # {0}?', $internshipsStudent->internship_id)]) ?>
                </td>
				 <?php }else{ ?> 
				 <td><?= $internshipsStudent->has('internship') ? $this->Html->link($internshipsStudent->internship->title, ['controller' => 'Internships', 'action' => 'view', $internshipsStudent->internship->id]) : '' ?></td>
                <td><?= $internshipsStudent->has('student') ? $this->Html->link($internshipsStudent->student->id, ['controller' => 'Students', 'action' => 'view', $internshipsStudent->student->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $internshipsStudent->internship_id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $internshipsStudent->id], ['confirm' => __('Are you sure you want to delete # {0}?', $internshipsStudent->internship_id)]) ?>
                </td>
				 <?php } ?>
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
