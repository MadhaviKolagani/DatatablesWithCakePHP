<h2>Blog posts</h2>
<?php echo $this->Html->link(
    'Add Post',
    array('controller' => 'posts', 'action' => 'add'));?>
<?php echo "\t \t \t";
	echo $this->Html->link(
    'Logout',
    array('controller' => 'users', 'action' => 'logout')
); ?>
<br></br>
<table>
    <tr>
        <th><?php echo $this->Paginator->sort('id'); ?></th>
        <th><?php echo $this->Paginator->sort('title'); ?></th>
		<th>Action</th>
        <th>Created</th>
    </tr>

    <!-- Here is where we loop through our $posts array, printing out post info -->

    <?php foreach ($posts as $post): ?>
    <tr>
        <td><?php echo $post['Post']['id']; ?></td>
        <td>
            <?php echo $this->Html->link($post['Post']['title'],
			array('controller' => 'posts', 'action' => 'view', $post['Post']['id'])); ?>
        </td>
		<td>
            <?php echo $this->Html->link('Edit',
array('controller' => 'posts', 'action' => 'edit', $post['Post']['id'])); ?>
            <?php echo $this->Form->postLink('Delete',
			array('controller' => 'posts', 'action' => 'delete', $post['Post']['id']),
			array('confirm' => 'Are you sure?')); ?>
        </td>
        <td><?php echo $post['Post']['created']; ?></td>
    </tr>
    <?php endforeach; ?>
    <?php unset($post); ?>
</table>