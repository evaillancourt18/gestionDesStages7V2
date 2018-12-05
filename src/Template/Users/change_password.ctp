<h3>Change Password</h3>
<?= $this->Form->create($user) ?>
<?= $this->Form->control('password', ['label' => 'New password']) ?>
<?= $this->Form->button('Accept')?>
<?= $this->Form->end() ?>
