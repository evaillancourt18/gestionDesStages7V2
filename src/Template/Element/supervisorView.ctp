<h3><?= h(__('Supervisor account')) ?></h3>
<table class="vertical-table">
    <tr>
        <th scope="row"><?= __('Gender') ?></th>
        <td><?= h($user['supervisors'][0]->gender) ?></td>
    </tr>
    <tr>
        <th scope="row"><?= __('First Name') ?></th>
        <td><?= h($user['supervisors'][0]->first_name) ?></td>
    </tr>
    <tr>
        <th scope="row"><?= __('Last Name') ?></th>
        <td><?= h($user['supervisors'][0]->last_name) ?></td>
    </tr>
    <tr>
        <th scope="row"><?= __('Location') ?></th>
        <td><?= h($user['supervisors'][0]->last_name) ?></td>
    </tr>
    <tr>
        <th scope="row"><?= __('City') ?></th>
        <td><?= h($user['supervisors'][0]->city) ?></td>
    </tr>
     <tr>
        <th scope="row"><?= __('Adress') ?></th>
        <td><?= h($user['supervisors'][0]->address) ?></td>
    </tr>
    <tr>
        <th scope="row"><?= __('Postal Code') ?></th>
        <td><?= h($user['supervisors'][0]->city) ?></td>
    </tr>
    <tr>
        <th scope="row"><?= __('Phone') ?></th>
        <?php $phone = $user['supervisors'][0]->phone; $phone = str_replace('.', '-', $phone) ?>
        <td><?= h($phone) ?></td>
    </tr>
    <tr>
        <th scope="row"><?= __('Extension') ?></th>
        <td><?= h($user['supervisors'][0]->extension) ?></td>
    </tr>
    <tr>
        <th scope="row"><?= __('Cellphone') ?></th>
        <?php $cellphone = $user['supervisors'][0]->cellphone; $cellphone = str_replace('.', '-', $cellphone) ?>
        <td><?= h($cellphone) ?></td>
    </tr>
    <tr>
        <th scope="row"><?= __('Fax') ?></th>
        <?php $fax = $user['supervisors'][0]->fax; $fax = str_replace('.', '-', $fax) ?>
        <td><?= h($fax) ?></td>
    </tr>
    <tr>
        <th scope="row"><?= __('Email') ?></th>
        <td><?= h($user->email) ?></td>
    </tr>
</table>