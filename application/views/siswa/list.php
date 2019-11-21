<div class="block">
    <div class="block-header">
            <h3 class="block-title">Table <small>Sementara</small></h3>
    </div>
        <div class="dataTables_wrapper dt-bootstrap4 no-footer">
            <div class="block-content block-content-full">
                <!-- DataTables init on table by adding .js-dataTable-full class, functionality is initialized in js/pages/be_tables_datatables.min.js which was auto compiled from _es6/pages/be_tables_datatables.js -->
            
                <table id="mytable" class="table table-striped table-bordered table-hover table-full-width dataTable" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>NO</th>
                            <th>ID</th>
                            <th>NIS</th>
                            <th>NISN</th>
                            <th>NAMA</th>
                            <th>TANGGAL LAHIR</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
 </div>





    <!-- <script>
        $(document).ready(function() {
            var t = $('#mytable').DataTable( {
                "ajax": '< site_url('siswa/data'); ?>',
                "order": [[ 2, 'asc' ]],
                "columns": [
                    {
                        "data": null,
                        "width": "50px",
                        "sClass": "text-center",
                        "orderable": false,
                    },
                    {
                        "data": "siswa_id",
                        "width": "120px",
                        "sClass": "text-center",
                    },
                    { "data": "siswa_nis" },
                    { "data": "siswa_nisn" },
                    { "data": "siswa_nama" },
                    { "data": "siswa_tanggal_lahir", "width": "150px" },
                    { "data": "aksi","width": "75px" },
                ]
            } );
               
            t.on( 'order.dt search.dt', function () {
                t.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
                    cell.innerHTML = i+1;
                } );
            } ).draw();
        } );
    </script> -->
