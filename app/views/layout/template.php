<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Arif iik | kontak : 085289033229">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="<?=base_url()?>assets/images/favicon.png">
    <title><?=$title;?></title>
    <link href="<?=base_url()?>assets/node_modules/wizard/steps.css" rel="stylesheet">
    <!-- This page CSS -->
    <link href="<?=base_url()?>assets/node_modules/datatables/media/css/dataTables.bootstrap4.css" rel="stylesheet">
    <!--Toaster Popup message CSS -->
    <link href="<?=base_url()?>assets/node_modules/toast-master/css/jquery.toast.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="<?=base_url()?>assets/dist/<?=getMode()?>/css/style.min.css" rel="stylesheet">
    <!-- Dashboard 1 Page CSS -->
    <link href="<?=base_url()?>assets/dist/<?=getMode()?>/css/pages/dashboard1.css" rel="stylesheet">
    <!--alerts CSS -->
    <link href="<?=base_url()?>assets/node_modules/sweetalert/sweetalert.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/node_modules/summernote/dist/summernote-bs4.css">
    <link rel="stylesheet" href="<?=base_url()?>assets/node_modules/jquery-file-upload/uploadfile.css">
    <link href="<?=base_url()?>assets/node_modules/nestable/nestable.css" rel="stylesheet" type="text/css" />
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script src="<?=base_url()?>assets/node_modules/jquery/jquery-3.2.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.js"></script>
    <!-- Bootstrap popper Core JavaScript -->
    <script src="<?=base_url()?>assets/node_modules/popper/popper.min.js"></script>
    <script src="<?=base_url()?>assets/node_modules/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="<?=base_url()?>assets/dist/<?=getMode()?>/js/perfect-scrollbar.jquery.min.js"></script>
    <!--Wave Effects -->
    <script src="<?=base_url()?>assets/dist/<?=getMode()?>/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="<?=base_url()?>assets/dist/<?=getMode()?>/js/sidebarmenu.js"></script>

    <script src="<?=base_url()?>assets/node_modules/hchart/code/highcharts.js"></script>
    <script src="<?=base_url()?>assets/node_modules/hchart/code/highcharts-3d.js"></script>
    <script src="<?=base_url()?>assets/node_modules/hchart/code/modules/data.js"></script>
    <script src="<?=base_url()?>assets/node_modules/hchart/code/modules/drilldown.js"></script>
    <script src="<?=base_url()?>assets/node_modules/hchart/code/modules/exporting.js"></script>
    <script src="<?=base_url()?>assets/node_modules/hchart/code/modules/wordcloud.js"></script>
    <script src="<?=base_url()?>assets/node_modules/hchart/code/modules/export-data.js"></script>
    <script src="<?=base_url()?>assets/node_modules/hchart/code/modules/accessibility.js"></script>

    <?php if (getMode()=='dark') { ?>
        <script src="<?=base_url()?>assets/node_modules/hchart/code/themes/gray.js"></script>
        <script type="text/javascript">
            Highcharts.theme = {
            colors: ['#2b908f', '#90ee7e', '#f45b5b', '#7798BF', '#aaeeee', '#ff0066',
                '#eeaaee', '#55BF3B', '#DF5353', '#7798BF', '#aaeeee'],
            chart: {
                backgroundColor: 'rgba(0,0,0,0)',
                style: {
                    fontFamily: 'monospace',
                    font: '20px',
                    color: "#f00",
                    textShadow: false,
                    textOutline: false 
                }
            },
            
        };
        // Apply the theme
        Highcharts.setOptions(Highcharts.theme);
        </script>
    <?php } ?>
</head>
<?php  if (getMode()=='light') { ?>
    <body class="skin-green-dark fixed-layout">
<?php }else{ ?>
    <body class="skin-default-dark fixed-layout">
<?php } ?>
<!--  -->
    
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="loader">
            <div class="loader__figure"></div>
            <p class="loader__label">Proses</p>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar">
            <nav class="navbar top-navbar navbar-expand-md navbar-dark">
                <?php include 'header.php'; ?>
            </nav>
        </header>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <aside class="left-sidebar">
            <?php include 'sidebar.php'; ?>
        </aside>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <h4 class="text-themecolor"><?=strtoupper('Page '.$this->uri->segment(1));?></h4>
                    </div>
                    <div class="col-md-7 align-self-center text-right">
                        <div class="d-flex justify-content-end align-items-center">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                                <li class="breadcrumb-item active"><?=ucwords($this->uri->segment(1));?></li>
                            </ol>
                            <!-- <button type="button" class="btn btn-info d-none d-lg-block m-l-15"><i class="fa fa-plus-circle"></i> Create New</button> -->
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                
                <!-- ============================================================== -->
                <!-- Over Visitor, Our income , slaes different and  sales prediction -->
                <!-- ============================================================== -->
                <div class="row">
                    <?php echo $contents; ?>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- footer -->
        <!-- ============================================================== -->
        <footer class="footer">
            <?php include 'footer.php'; ?>
        </footer>
        <!-- ============================================================== -->
        <!-- End footer -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    
   
    <!--stickey kit -->
    <script src="<?=base_url()?>assets/node_modules/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <script src="<?=base_url()?>assets/node_modules/sparkline/jquery.sparkline.min.js"></script>
    <!--Custom JavaScript -->
    <script src="<?=base_url()?>assets/dist/<?=getMode()?>/js/custom.min.js"></script>
    <!-- ============================================================== -->
    <!-- This page plugins -->
    <!-- ============================================================== -->
    <!-- Popup message jquery -->
    <script src="<?=base_url()?>assets/node_modules/toast-master/js/jquery.toast.js"></script>
    <!-- Chart JS -->
    <script src="<?=base_url()?>assets/node_modules/toast-master/js/jquery.toast.js"></script>
    <!-- This is data table -->
    <script src="<?=base_url()?>assets/node_modules/datatables/datatables.min.js"></script>
    <script src="<?=base_url()?>assets/node_modules/nestable/jquery.nestable.js"></script>
    <script src="<?=base_url()?>assets/node_modules/jquery-file-upload/jquery.uploadfile.min.js"></script>
    <script src="<?=base_url()?>assets/node_modules/sweetalert/sweetalert.min.js"></script>
    <!-- start - This is for export functionality only -->
    <!-- end - This is for export functionality only -->
    <script>
      $(function () {
        $("#example1").DataTable();
        $('#example2').DataTable({
          "paging": true,
          "lengthChange": false,
          "searching": true,
          "ordering": true,
          "info": true,
          "autoWidth": false,
          "language": {
            "search": "Filter records:"
          }
        });

        $('#example3').DataTable({
          "paging": false,
          "lengthChange": false,
          "searching": false,
          "ordering": false,
          "info": false,
          "autoWidth": false,
          "pageLength": 200,
          "language": {
            "emptyTable": " "
          }
        });

        $('#mastersiswa').DataTable({
          "paging": false,
          "lengthChange": false,
          "searching": true,
          "ordering": false,
          "info": false,
          "autoWidth": false,
          "pageLength": 200
        });

        $('#example5').DataTable({
          "paging": true,
          "lengthChange": false,
          "searching": false,
          "info": false,
          "autoWidth": false,
          "pageLength": 200,
          "order": [[ 5, "desc" ]]
        });

        $('#example99').DataTable({
          "aLengthMenu":[[45,90,115,220],[45,90,115,220]],
          "pageLength": 90,
          "paging": false,
          "searching": false,
          "autoWidth": true,
          "info": false,
        });

        /** add active class and stay opened when selected */
      
      });
    </script>
    <script src="<?=base_url()?>assets/node_modules/wizard/jquery.steps.min.js"></script>
    
    <script>
        //Custom design form example
        $(".tab-wizard").steps({
            headerTag: "h6",
            bodyTag: "section",
            transitionEffect: "slideLeft",
            titleTemplate: '<span class="step">#index#</span> #title#',
            autoFocus: true,
            enableKeyNavigation: false,
            labels: {
                finish: "Submit"
            },
            onFinished: function (event, currentIndex) {
                var formData = $(this).serialize();
                console.log(formData);
                $.ajax({
                    url: '<?=base_url()?>admin/ajax/saveproduk',
                    type: 'POST',
                    dataType: 'json',
                    data: formData,
                })
                .done(function() {
                     
                    swal({
                      title: "Sukses!",
                      text: "Data berhasil diproses!",
                      type: "success",
                      showConfirmButton: false
                    }); 
                    setTimeout(function () {
                        window.location.href = "<?=base_url()?>produk/indeks";
                    }, 2000);
                })
                .fail(function() {
                    
                    swal({
                      title: "Opss!",
                      text: "Data gagal diproses!",
                      type: "error",
                      showConfirmButton: false
                    });
                    setTimeout(function () {
                        window.location.href = "<?=base_url()?>produk/indeks";
                    }, 2000);
                });
            }
        });
    </script>
    <script src="<?=base_url()?>assets/node_modules/summernote/dist/summernote-bs4.min.js"></script>
    <script>
    $(function() {

        $('.summernote').summernote({
            height: 250, // set editor height
            minHeight: null, // set minimum height of editor
            maxHeight: null, // set maximum height of editor
            focus: true // set focus to editable area after initializing summernote
        });

        $('.inline-editor').summernote({
            airMode: true
        });

    });
    </script>
    <script type="text/javascript">
        function confirms(id) {
            var ids = $('#'+id).data('code');
            var t  = $('#'+id).data('doc');
            swal({
                title: 'Apa anda yakin?',
                text: "data yang dihapus tidak akan bisa kembali lagi!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, hapus!',
            })
            .then(
                function (isConfirm) {
                    if (isConfirm.value) {
                      $.ajax({
                            url: "<?=base_url()?>admin/ajax/hapus_data",
                            type: 'POST',
                            dataType: 'json',
                            data: {ids: ids, tbl:t}
                        })
                        .done(function() {
                            $('#'+id).closest("tr").remove();
                        })
                        .fail(function() {
                            swal("Terjadi kesalahan!","","error");
                        });
                    }else{
                        swal("Data batal dihapus!");
                    }
                }
            );
        }
    </script>

</body>

</html>