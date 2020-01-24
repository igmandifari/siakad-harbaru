
<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">

        <title><?=$title?></title>
        <!-- Icons -->
        <!-- The following icons can be replaced with your own, they are used by desktop and mobile browsers -->
        <link rel="shortcut icon" href="<?=base_url('assets/media/favicons/favicon.png')?>">
        <link rel="icon" type="image/png" sizes="192x192" href="<?=base_url('assets/media/favicons/favicon-192x192.png')?>">
        <link rel="apple-touch-icon" sizes="180x180" href="<?=base_url('assets/media/favicons/apple-touch-icon-180x180.png')?>">
        <!-- END Icons -->

        <!-- Page JS Plugins CSS -->
        <link rel="stylesheet" href="<?=base_url('assets/js/plugins/select2/css/select2.min.css')?>">
        <!-- Stylesheets -->
        <!-- Fonts and OneUI framework -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400italic,600,700%7COpen+Sans:300,400,400italic,600,700">
        <link rel="stylesheet" id="css-main" href="<?=base_url('assets/css/oneui.min.css')?>">

    </head>
    <body>
        <!-- Page Container -->
        <div id="page-container">

            <!-- Main Container -->
            <main id="main-container">

                <!-- Page Content -->
                <div class="hero-static d-flex align-items-center">
                    <div class="w-100">
                        <!-- Sign In Section -->
                        <div class="content content-full bg-white">
                            <div class="row justify-content-center">
                                <div class="col-md-8 col-lg-6 col-xl-4 py-4">
                                    <!-- Header -->
                                    <div class="text-center">
                                        <p class="mb-2">
                                            <i class="fa fa-2x fa-circle-notch text-primary"></i>
                                        </p>
                                        <h1 class="h4 mb-1">
                                            Sign In
                                        </h1>
                                        <h2 class="h6 font-w400 text-muted mb-3">
                                            SIAK Harba
                                        </h2>
                                    </div>
                                    <!-- END Header -->

                                    <!-- Sign In Form -->
                                    <!-- jQuery Validation (.js-validation-signin class is initialized in js/pages/op_auth_signin.min.js which was auto compiled from _es6/pages/op_auth_signin.js) -->
                                    <!-- For more info and examples you can check out https://github.com/jzaefferer/jquery-validation -->
                                    <?php if($this->session->flashdata('failed')){?>
                                        <div class="alert alert-danger d-flex align-items-center justify-content-between" role="alert">
                                            <div class="flex-fill mr-3">
                                                <p class="mb-0"><?=$this->session->flashdata('failed')?></p>
                                            </div>
                                            <div class="flex-00-auto">
                                                <i class="fa fa-fw fa-times-circle"></i>
                                            </div>
                                        </div>
                                    <?php } else if($this->session->flashdata('warning')){?>
                                        <div class="alert alert-warning d-flex align-items-center justify-content-between" role="alert">
                                            <div class="flex-fill mr-3">
                                                <p class="mb-0"><?=$this->session->flashdata('warning')?></p>
                                            </div>
                                            <div class="flex-00-auto">
                                                <i class="fa fa-fw fa-exclamation-circle"></i>
                                            </div>
                                        </div>
                                    <?php }?>
                                    <?= form_open ('auth/cek_login','class="js-validation-signin"'); ?>
                                        <div class="py-3">
                                            <div class="form-group">
                                                <input type="text" class="form-control form-control-lg form-control-alt" id="login-username" name="login-username" placeholder="Masukan nama pengguna" required>
                                            </div>
                                            <div class="form-group">
                                                <input type="password" class="form-control form-control-lg form-control-alt" id="login-password" name="login-password" placeholder="Masukan kata sandi" required>
                                            </div>
                                            
                                        </div>
                                        <div class="form-group row justify-content-center mb-0">
                                            <div class="col-md-6 col-xl-5">
                                                <button type="submit" name="submit" class="btn btn-block btn-primary">
                                                    Masuk
                                                </button>
                                            </div>
                                            <div class="col-md-6 col-xl-5">
                                                <button type="button" class="btn btn-block btn-light push"  data-toggle="modal" data-target="#modal-block-small">
                                                    Lupa?
                                                </button>
                                            </div>
                                        </div>
                                        
                                    </form>
                                    <!-- END Sign In Form -->
                                </div>
                            </div>
                        </div>
                        <!-- END Sign In Section -->

                        <!-- Footer -->
                        <div class="font-size-sm text-center text-muted py-3">
                            <strong>OneUI 4.3</strong> &copy; <span data-toggle="year-copy"></span>
                        </div>
                        <!-- END Footer -->
                    </div>
                </div>
                <div class="modal" id="modal-block-small" tabindex="-1" role="dialog" aria-labelledby="modal-block-small" aria-hidden="true" style="display: none;">
            <div class="modal-dialog modal-sm" role="document">
                <div class="modal-content">
                    <div class="block block-themed block-transparent mb-0">
                        <div class="block-header bg-primary-light">
                            <h3 class="block-title"></h3>
                            <div class="block-options">
                                <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                                    <i class="fa fa-fw fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <div class="block-content font-size-sm">
                            <p>Silahkan hubungi operator</p>
                        </div>
                        <div class="block-content block-content-full text-right border-top">
                            <button type="button" class="btn btn-sm btn-light" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-sm btn-primary" data-dismiss="modal"><i class="fa fa-check mr-1"></i>Ok</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
                <!-- END Page Content -->
                
            </main>
            <!-- END Main Container -->
        </div>
        <!-- END Page Container -->

        <script src="<?=base_url('assets/js/oneui.core.min.js')?>"></script>
        <script src="<?=base_url('assets/js/oneui.app.min.js')?>"></script>

        <!-- Page JS Plugins -->
        <script src="<?=base_url('assets/js/plugins/jquery-validation/jquery.validate.min.js');?>"></script>
        <script src="<?=base_url('assets/js/plugins/select2/js/select2.full.min.js');?>"></script>

        <!-- Page JS Code -->
        <script src="<?=base_url('assets/js/pages/op_auth_signin.min.js');?>"></script>
        
       <!-- Page JS Helpers-->
       <script>jQuery(function(){ One.helpers(['select2']); });</script>
    </body>
</html>