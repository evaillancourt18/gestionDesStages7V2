<h3><?= h(__('Student account')) ?></h3>
<table class="vertical-table">
    <tr>
        <th scope="row"><?= __('Student Number') ?></th>
        <td><?= h($user['students'][0]->student_number) ?></td>
    </tr>
    <tr>
        <th scope="row"><?= __('First Name') ?></th>
        <td><?= h($user['students'][0]->first_name) ?></td>
    </tr>
    <tr>
        <th scope="row"><?= __('Last Name') ?></th>
        <td><?= h($user['students'][0]->last_name) ?></td>
    </tr>
    <tr>
        <th scope="row"><?= __('Email') ?></th>
        <td><?= h($user->email) ?></td>
    </tr>
    <tr>
        <th scope="row"><?= __('Phone') ?></th>
        <?php $phone = $user['students'][0]->phone; $phone = str_replace('.', '-', $phone)?>
        <td><?= h($phone) ?></td>
    </tr>
    <tr>
        <th scope="row"><?= __('Grade') ?></th>
        <td><?= h($user['students'][0]->grade) ?></td>
    </tr>
     <tr>
        <th scope="row"><?= __('Additional information') ?></th>
        <td><?= h($user['students'][0]->info) ?></td>
    </tr>
</table>