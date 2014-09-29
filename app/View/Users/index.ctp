<h2>Users</h2>
<?php echo $this->Html->link(
    'Add User',
    array('controller' => 'users', 'action' => 'add')
); ?>
<br></br>
<table>
    <tr>
        <!-- <th><?php echo $this->Paginator->sort('Id'); ?></th>
        <th><?php echo $this->Paginator->sort('Title'); ?></th> -->
		<th>Id</th>
        <th>Username</th>
		<th>Action</th>
        <th>Created</th>
    </tr>

    <!-- Here is where we loop through our $users array, printing out user info -->

    <?php foreach ($users as $user): ?>
    <tr>
        <td><?php echo $user['User']['id']; ?></td>
        <td>
            <?php echo $this->Html->link($user['User']['username'],
			array('controller' => 'users', 'action' => 'view', $user['User']['id'])); ?>
        </td>
		<td>
            <?php echo $this->Html->link('Edit',
array('controller' => 'users', 'action' => 'edit', $user['User']['id'])); ?>
            <?php echo $this->Form->postLink('Delete',
			array('controller' => 'users', 'action' => 'delete', $user['User']['id']),
			array('confirm' => 'Are you sure?')); ?>
        </td>
        <td><?php echo $user['User']['created']; ?></td>
    </tr>
    <?php endforeach; ?>
    <?php unset($user); ?>
</table>