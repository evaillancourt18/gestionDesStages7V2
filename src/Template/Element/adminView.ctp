<h3><?= h(__('Administrator')) ?></h3>
<table class="vertical-table">
    <tr>
        <th scope="row"><?= __('Full name') ?></th>
        <td><?= h($user['admins'][0]->name) ?></td>
    </tr>
    <tr>
        <th scope="row"><?= __('Email') ?></th>
        <td><?= h($user->email) ?></td>
    </tr>
    <tr>
        <th scope="row"><?= __('Phone') ?></th>
        <td><?= h($user['admins'][0]->phone) ?></td>
    </tr>
</table>


