<?php
$loguser = $this->request->session()->read('Auth.User')
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Student $student
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <?php if ($loguser['role'] == 'admin') : ?>
        <li><?= $this->Html->link(__('Edit Student'), ['action' => 'edit', $student->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Student'), ['action' => 'delete', $student->id], ['confirm' => __('Are you sure you want to delete # {0}?', $student->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Students'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Student'), ['action' => 'add']) ?> </li>
    <?php endif;  
    if($loguser['role'] == 'supervisor') :?>
    <li><?= $this->Html->link(__('List Internships'), ['controller' => 'Internships', 'action' => 'index']) ?></li>
<?php endif;?>
    </ul>
</nav>
<div class="students view large-9 medium-8 columns content">
    <h3><?= h($student->first_name . " " . $student->last_name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Phone') ?></th>
            <td><?= h($student->phone) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Grade') ?></th>
            <td><?= $this->Number->format($student->grade) ?></td>
        </tr>
        <?php if($loguser['role'] == 'admin') : ?>
        <tr>
            <th scope="row"><?= __('Student Number') ?></th>
            <td><?= $this->Number->format($student->student_number) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Actif') ?></th>
            <td><?= $student->actif ? __('Yes') : __('No'); ?></td>
        </tr>
        <?php endif; ?>
    </table>
    <?= $this->Form->create('Take this student', ['type' => 'GET', 'url' => ['action'=> 'isTaken', $student['id']]])  ?>
    <?= $this->Form->button('Take this student')  ?>
    <?= $this->Form->end()  ?>
    <div class="row">
        <h4><?= __('Info') ?></h4>
        <?php
         foreach ($files as $file): 
        echo $this->Html->link(__($file['name']), ['action' => 'viewFile', $file['id']]); 
        ?>
        <br/>
        <?php  endforeach; ?>
    </div>
</div>
