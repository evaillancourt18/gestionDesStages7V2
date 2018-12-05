<h3>Forgot Password</h3>
<?= $this->Form->create('Post', ['action' => 'sendCode']) ?>
<?= $this->Form->control('email') ?>
<?= $this->Form->button('Send code')?>
<?= $this->Form->end() ?>
