<script language="javascript" type="text/javascript" src="js/jquery-1.11.1.min.js"></script>
<script language="javascript" type="text/javascript" src="datatables_1.10.2/js/jquery.dataTables.min.js"></script>
<div class="books index">
    <h2><?php echo __('Books'); ?></h2>
    <table id="listBooks" width="100%">
        <thead>
            <tr>
                <th  class="secondrow" width="30%">Title</th>
                <th  class="secondrow" width="10%">Author</th>
                <th  class="secondrow" width="10%">Genre</th>
                <th  class="Actions" width="5%">Actions</th>
                <th width="5%"></th>
                <th width="5%"></th>
            </tr>
        </thead>
        <tbody>
        </tbody>
        <tfoot>
            <tr>
                <th width="30%"></th>
                <th width="10%"></th>
                <th width="10%"></th>
                <th class="Actions" width="5%"></th>
                <th width="5%"></th>
                <th width="5%"></th>
            </tr>
        </tfoot>
    </table>
</div>
<div class="actions">
    <h3><?php echo __('Actions'); ?></h3>
    <ul>
		<li><?php echo $this->Html->link(__('New Book'), array('action' => 'add')); ?> </li>
        <li><?php echo $this->Html->link(__('List Authors'), array('controller' => 'authors', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('New Author'), array('controller' => 'authors', 'action' => 'add')); ?> </li>
        <li><?php echo $this->Html->link(__('List Genres'), array('controller' => 'genres', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('New Genre'), array('controller' => 'genres', 'action' => 'add')); ?> </li>
        <li><input name="ExportBtn" id="ExportBtn" type="button" width="140px"  value="Export to CSV"> </li>
    </ul>
</div>
<style type="text/css">
.secondrow {
    font-size: 100%;
}
</style>
<script type="text/javascript">
        // When Page Loads
        $(document).ready(function()
        {
            $('#listBooks thead th').each( function () {
                var title = $('#listBooks thead th').eq( $(this).index() ).text();
                $(this).html( '<input type="text" placeholder="Search '+title+'" />');
            } );
            // Init DataTable
            var asInitVals = new Array();
            var table = $('#listBooks').dataTable({
            "bSortCellsTop": true,
            "bProcessing": true,
            "bServerSide": false,
            "sAjaxSource": "books/index.json",
            "aoColumns": [
                {mData: "Book.name"},
                {mData: "Author.name"},
                {mData: "Genre.name"},
                {mData: null, bSearchable: false, bSortable: false},
                {mData: null, bSearchable: false, bSortable: false},
                {mData: null, bSearchable: false, bSortable: false}
            ],
            "fnCreatedRow": function(nRow, aData, iDataIndex) {
                var nRow = $(nRow);
                nRow.find('td:eq(3)').html('<a href="<?php echo Router::url('/')?>Books/view/' + aData.Book.id + '">View</a>');
                nRow.find('td:eq(4)', nRow).html('<a href="<?php echo Router::url('/')?>Books/edit/' + aData.Book.id + '">Edit</a>');
                nRow.find('td:eq(5)', nRow).html('<a href="<?php echo Router::url('/')?>Books/delete/' + aData.Book.id + '">Delete</a>');
            }
        });
         // Apply the search
       /* table.columns().eq( 0 ).each( function ( colIdx ) {
            $( "input", table.column( colIdx ).header()).on( 'keyup', function () {
           // $('.secondrow', table.column( colIdx )).on( 'keyup', function () {
               table
                    .column( colIdx )
                    .search( this.value )
                    .draw();
            } );
        } );*/
 
        // Handle Btn Clicks
           $('#ExportBtn').click(function() {
                alert("Hello");
                CSVExportDataTable(table,'Full','#listBooks');
            });
        });
 
        // CSV Export Function
        function CSVExportDataTable(table,exportMode,tableElm)
        {   
            // Init
            var csv = '';
            var headers = [];
            var rows = [];
            var dataSeparator = '--';
            var actual_row = '';
      
            // Get table header names
            $(tableElm+' thead tr').find('th').each(function() {
                var text = $(this).text();
                if(text != "") headers.push(text);
            });
            csv += headers.join(dataSeparator) + "\r\n";
      
            // Get table body data
            if (exportMode == 'Full') {
                var totalRows = table.fnSettings().fnRecordsDisplay();
                for (var i = 0; i < totalRows; i++) {
                    var row = table.fnGetData(i);
                    actual_row = row.Author.name + dataSeparator + row.Book.name + dataSeparator +  row.Genre.name ;
                    rows.push(actual_row);
                }
            }
            /*$(tableElm+' tbody tr').each(function(index) {
            var row = table.fnGetData(this);
            //row = strip_tags(row);
            actual_row = row.Author.name + dataSeparator + row.Book.name + dataSeparator +  row.Genre.name ;
            rows.push(actual_row);
            });*/
            
            csv += rows.join("\r\n");
 
            // Proceed if csv data was loaded
            if (csv.length > 0)
            {
                // Ajax Post CSV Data
                $.ajax({
                    type: "POST",
                    url: 'dt_csv_export.php',
                    data: {
                        action: "generate",
                        csv_type: table.attr('id'),
                        csv_data: csv
                    },
                    success: function(download_link) {
                        location.href = download_link;
                    }
                });
            }
        }
</script>