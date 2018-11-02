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
        
		<?php if($loguser['role'] == 'admin') : ?><li><?= $this->Html->link(__('List Internships'), ['controller' => 'Internships', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Internship'), ['controller' => 'Internships', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Students'), ['controller' => 'Students', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Student'), ['controller' => 'Students', 'action' => 'add']) ?></li>
		<?php endif; ?>
	</ul>
</nav>
<div class="internshipsStudents index large-9 medium-8 columns content">
    <h3><?= __('View Application') ?></h3>
    <h3><?= $internships['title'] ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('student_id') ?></th>    
                <?php if($loguser['role'] != 'supervisor') :?>
				<th scope="col"><?= $this->Paginator->sort('internship_id') ?></th>
                <?php endif; ?>
			</tr>
        </thead>
        <tbody>
        <?php $pasPostuler=true;  ?>
            <?php foreach ($internshipsStudents as $internshipsStudent): ?>
            <tr>
			 <?php if($loguser['role'] == 'supervisor' && $internshipsStudent->internship->id == $internships['id']) {?>
                <td><?= $internshipsStudent->has('student') ? $this->Html->link(($internshipsStudent->student->first_name . " " . $internshipsStudent->student->last_name), ['controller' => 'Students', 'action' => 'view', $internshipsStudent->student->id]) : '' ?></td>
                 <td class="actions">
                    <?= $this->Form->postLink(__('Convoquer'), ['action' => 'convoquer', $internshipsStudent->id]) ?>
                    <?php $pasPostuler = false ?>
                </td>
				 <?php }else if($loguser['role'] == 'admin'){ ?> 
                    <?php $pasPostuler = false ?>
                    <td><?= $internshipsStudent->has('student') ? $this->Html->link($internshipsStudent->student->id, ['controller' => 'Students', 'action' => 'view', $internshipsStudent->student->id]) : '' ?></td>
                 <td><?= $internshipsStudent->has('internship') ? $this->Html->link($internshipsStudent->internship->title, ['controller' => 'Internships', 'action' => 'view', $internshipsStudent->internship->id]) : '' ?></td>
                
				 <?php } ?>
            </tr>
            <?php endforeach; ?>
            <?php if($pasPostuler){ ?>
                <p><?= __('There is no application yet.') ?></p>
            <?php } ?>
        </tbody>
    </table>
</div>
