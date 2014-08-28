<script language="javascript" type="text/javascript" src="js/jquery-1.4.2.js"></script>
<script language="javascript" type="text/javascript" src="datatables/js/jquery.dataTables.min.js"></script>
<div class="books index">
	<h2><?php echo __('Books'); ?></h2>
	<table id="listBooks" width="100%">
    <thead>
    <tr>
        <th width="30%">Title</th>
        <th width="10%">Author</th>
		<th width="10%">Genre</th>
		<th class="Actions" width="5%">Actions</th>
		<th width="5%"></th>
		<th width="5%"></th>
    </tr>
    </thead>
    <tbody>
	
    </tbody>
</table>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('List Authors'), array('controller' => 'authors', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Author'), array('controller' => 'authors', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Genres'), array('controller' => 'genres', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Genre'), array('controller' => 'genres', 'action' => 'add')); ?> </li>
	</ul>
</div>
<script language="javascript" type="text/javascript">
	$(document).ready(function() {
		$('#listBooks').dataTable({
	    "bProcessing": true,
	    "bServerSide": true,
	    "sAjaxSource": "books/index.json",
	    "aoColumns": [
	        {mData:"Book.name"},
	        {mData:"Author.name"},
	        {mData:"Genre.name"},
			{mData:null, bSearchable: false, bSortable: false},
			{mData:null, bSearchable: false, bSortable: false},
			{mData:null, bSearchable: false, bSortable: false}
	    ],
		"fnCreatedRow": function(nRow, aData, iDataIndex){
			var nRow = $(nRow);
			nRow.find('td:eq(3)').html('<a href="<?php echo Router::url('/')?>Books/view/'+aData.Book.id+'">View</a>');
			nRow.find('td:eq(4)', nRow).html('<a href="<?php echo Router::url('/')?>Books/edit/'+aData.Book.id+'">Edit</a>');
			nRow.find('td:eq(5)', nRow).html('<a href="<?php echo Router::url('/')?>Books/delete/'+aData.Book.id+'">Delete</a>');
    	}	
	});
});
</script>
