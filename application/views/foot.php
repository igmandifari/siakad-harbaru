<!-- Footer -->
<footer id="page-footer" class="bg-body-light">
                <div class="content py-3">
                    <div class="row font-size-sm">
                        <div class="col-sm-6 order-sm-2 py-1 text-center text-sm-right">
                            Crafted with <i class="fa fa-heart text-danger"></i> by <a class="font-w600" href="https://1.envato.market/ydb" target="_blank">pixelcave</a>
                        </div>
                        <div class="col-sm-6 order-sm-1 py-1 text-center text-sm-left">
                            <a class="font-w600" href="https://1.envato.market/xWy" target="_blank">OneUI 4.3</a> &copy; <span data-toggle="year-copy"></span>
                        </div>
                    </div>
                </div>
            </footer>
            <!-- END Footer -->

        </div>
        <!-- END Page Container -->

        <!--
            OneUI JS Core

            Vital libraries and plugins used in all pages. You can choose to not include this file if you would like
            to handle those dependencies through webpack. Please check out assets/_es6/main/bootstrap.js for more info.

            If you like, you could also include them separately directly from the assets/js/core folder in the following
            order. That can come in handy if you would like to include a few of them (eg jQuery) from a CDN.

            assets/js/core/jquery.min.js
            assets/js/core/bootstrap.bundle.min.js
            assets/js/core/simplebar.min.js
            assets/js/core/jquery-scrollLock.min.js
            assets/js/core/jquery.appear.min.js
            assets/js/core/js.cookie.min.js

        -->
         <script src="<?=base_url('assets/js/oneui.core.min.js');?>"></script>
        
        

        <!--
            OneUI JS

            Custom functionality including Blocks/Layout API as well as other vital and optional helpers
            webpack is putting everything together at assets/_es6/main/app.js
        -->
        <script src="<?=base_url('assets/js/oneui.app.min.js');?>"></script>
        <!-- Page JS Plugins -->
        <script src="<?=base_url('assets/js/plugins/datatables/jquery.dataTables.min.js');?>"></script>
        <script src="<?=base_url('assets/js/plugins/datatables/dataTables.bootstrap4.min.js');?>"></script>
        <script src="<?=base_url('assets/js/plugins/es6-promise/es6-promise.auto.min.js');?>"></script>
        <script src="<?=base_url('assets/js/plugins/sweetalert2/sweetalert2.min.js');?>"></script>
        <script src="<?=base_url('assets/js/plugins/jquery-bootstrap-wizard/bs4/jquery.bootstrap.wizard.min.js');?>"></script>
        <script src="<?=base_url('assets/js/plugins/jquery-validation/jquery.validate.min.js');?>"></script>


        <!-- Page JS Code -->
        <script src="<?=base_url('assets/js/plugins/select2/js/select2.full.min.js');?>"></script>
        <script src="<?=base_url('assets/js/pages/be_tables_datatables.min.js');?>"></script>
         <script src="<?=base_url('assets/js/pages/be_forms_wizard.min.js');?>"></script>

        <!-- Page JS Helpers-->
       <script>
            jQuery(function(){
                jQuery("#btn-rec-nik").click(function(){
                    jQuery("#wargabelajar_nomor_induk").val(jQuery("#rec_nik").val());
                });
                jQuery("#btn-rec-nik-tutor").click(function(){
                    jQuery("#tutor_nomor_induk").val(jQuery("#rec_nik").val());
                });
                $("#tahunajaran").change(function(){
                    var id=this.value;
                    $.ajax({
                        type:'POST',
                        url:'<?php echo base_url('dasbor/setTahunajaran');?>',
                        data:{tahunajaran_id:id},
                        success:function(data){
                            location.reload();
                        }

                    });
                });

                One.helpers(['select2']);

                 // Dialog confirmation delete start
                    jQuery("#table").on("click",".hapus",function(){
                       
                        var id = $(this).parents("tr").attr("id");
                        Swal.fire({
                            title:"Peringatan",
                            text:"Apakah kamu benar ingin menghapus ini?",
                            type:"warning",
                            showCancelButton:!0,
                            customClass:{
                                confirmButton:"btn btn-danger m-1",
                                cancelButton:"btn btn-secondary m-1"
                            },
                            buttonsStyling:false,
                            confirmButtonText:"Ya, hapus ini!",
                            html:!1,
                            preConfirm:function(Swal){
                                return new Promise(function(Swal){
                                    setTimeout(function(){
                                        Swal()},
                                        50)}
                                    )}
                            }).then(function(n){
                                n.value?$.ajax({
                                        url: '<?php echo base_url().$this->uri->segment(1).'/'.'hapus/';?>'+id,
                                        type: 'DELETE',
                                        error: function() {
                                            Swal.fire("Oops...", "Terjadi kesalahan", "error");
                                        },success: function(data) {
                                            $("#"+id).remove();
                                            Swal.fire(
                                                "Berhasil",
                                                "Data berhasil dihapus.",
                                                "success");
                                        }}):"cancel"===n.dismiss&&Swal.fire(
                                        "Dibatalkan",
                                        "Tenang, data masih ada :)",
                                        "error")
                            })
                })
    
                 // End Dialog confirmation 

                 // Dialog confirmation delete rombel 
                    $(".hapus-rombel").on("click",function(){
                       
                        var id = $(this).parents("tr").attr("id");
                        Swal.fire({
                            title:"Peringatan",
                            text:"Apakah kamu benar ingin menghapus ini?",
                            type:"warning",
                            showCancelButton:!0,
                            customClass:{
                                confirmButton:"btn btn-danger m-1",
                                cancelButton:"btn btn-secondary m-1"
                            },
                            buttonsStyling:false,
                            confirmButtonText:"Ya, hapus ini!",
                            html:!1,
                            preConfirm:function(Swal){
                                return new Promise(function(Swal){
                                    setTimeout(function(){
                                        Swal()},
                                        50)}
                                    )}
                            }).then(function(n){
                                n.value?$.ajax({
                                        url: '<?php echo base_url('kelas/rombel_hapus/');?>'+id,
                                        type: 'DELETE',
                                        error: function() {
                                            Swal.fire("Oops...", "Terjadi kesalahan", "error");
                                        },success: function(data) {
                                            $("#"+id).remove();
                                            Swal.fire(
                                                "Berhasil",
                                                "Data berhasil dihapus.",
                                                "success");
                                        }}):"cancel"===n.dismiss&&Swal.fire(
                                        "Dibatalkan",
                                        "Tenang, data masih ada :)",
                                        "error")
                            })
                })
    
                 // End Dialog confirmation rombel 

                 // Dialog confirmation delete rombel det
                    $(".hapus-rombel-det").on("click",function(){
                       
                        var id = $(this).parents("tr").attr("id");
                        Swal.fire({
                            title:"Peringatan",
                            text:"Apakah kamu benar ingin menghapus ini?",
                            type:"warning",
                            showCancelButton:!0,
                            customClass:{
                                confirmButton:"btn btn-danger m-1",
                                cancelButton:"btn btn-secondary m-1"
                            },
                            buttonsStyling:false,
                            confirmButtonText:"Ya, hapus ini!",
                            html:!1,
                            preConfirm:function(Swal){
                                return new Promise(function(Swal){
                                    setTimeout(function(){
                                        Swal()},
                                        50)}
                                    )}
                            }).then(function(n){
                                n.value?$.ajax({
                                        url: '<?php echo base_url('kelas/rombel_det_hapus/');?>'+id+'/<?php echo $this->uri->segment(3);?>',
                                        type: 'DELETE',
                                        error: function() {
                                            Swal.fire("Oops...", "Terjadi kesalahan", "error");
                                        },success: function(data) {
                                            $("#"+id).remove();
                                            Swal.fire(
                                                "Berhasil",
                                                "Data berhasil dihapus.",
                                                "success");
                                        }}):"cancel"===n.dismiss&&Swal.fire(
                                        "Dibatalkan",
                                        "Tenang, data masih ada :)",
                                        "error")
                            })
                })
    
                 // End Dialog confirmation rombel det

                 // Dialog confirmation jadwal tahun
                    $(".hapus-jadwal").on("click",function(){
                       
                        var id = $(this).parents("tr").attr("id");
                        Swal.fire({
                            title:"Peringatan",
                            text:"Apakah kamu benar ingin menghapus ini?",
                            type:"warning",
                            showCancelButton:!0,
                            customClass:{
                                confirmButton:"btn btn-danger m-1",
                                cancelButton:"btn btn-secondary m-1"
                            },
                            buttonsStyling:false,
                            confirmButtonText:"Ya, hapus ini!",
                            html:!1,
                            preConfirm:function(Swal){
                                return new Promise(function(Swal){
                                    setTimeout(function(){
                                        Swal()},
                                        50)}
                                    )}
                            }).then(function(n){
                                n.value?$.ajax({
                                        url: '<?php echo base_url('jadwal/delTahun/');?>'+id,
                                        type: 'DELETE',
                                        error: function() {
                                            Swal.fire("Oops...", "Terjadi kesalahan", "error");
                                        },success: function(data) {
                                            $("#"+id).remove();
                                            Swal.fire(
                                                "Berhasil",
                                                "Data berhasil dihapus.",
                                                "success");
                                        }}):"cancel"===n.dismiss&&Swal.fire(
                                        "Dibatalkan",
                                        "Tenang, data masih ada :)",
                                        "error")
                            })
                })
    
                 // End Dialog confirmation jadwal tahun
        });
    </script>
        
    </body>
</html>