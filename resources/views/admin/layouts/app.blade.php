<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Event Planing Management</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('backend') }}/plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bbootstrap 4 -->
    <link rel="stylesheet"
        href="{{ asset('backend') }}/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{ asset('backend') }}/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- JQVMap -->
    <link rel="stylesheet" href="{{ asset('backend') }}/plugins/jqvmap/jqvmap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('backend') }}/dist/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ asset('backend') }}/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <link rel="stylesheet" href="{{ asset('backend') }}/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet"
        href="{{ asset('backend') }}/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{ asset('backend') }}/plugins/daterangepicker/daterangepicker.css">
    <!-- summernote -->
    <link rel="stylesheet" href="{{ asset('backend') }}/plugins/summernote/summernote-bs4.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('backend/plugins/toastr/toastr.css') }}">
    <script src="{{ asset('backend') }}/plugins/jquery/jquery.min.js"></script>
    <link rel="stylesheet" href="{{ asset('backend/plugins/select2/css/select2.css') }}">
    <script src="{{ asset('backend/plugins/select2/js/select2.js') }}"></script>

    <style>
        .active {
            background: linear-gradient(to right, #e3ac15, #e61dd9);
            border-radius: 8px !important
        }

        [class*=sidebar-dark-] {
            background: #5a08e9
        }

      
    </style>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i
                            class="fas fa-bars"></i></a>
                </li>
            </ul>
            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <strong>Welcome, {{ auth()->user()->name }}</strong>
                <a href="{{ route('logout') }}" class="btn btn-sm btn-danger ml-3 mr-3">

                    Logout

                </a>

            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        @include('admin.layouts.sidebar')

        <!-- Content Wrapper. Contains page content -->
        @yield('content')
        <!-- /.content-wrapper -->

        @include('admin.layouts.footer')

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->

    <!-- jQuery UI 1.11.4 -->
    <script src="{{ asset('backend') }}/plugins/jquery-ui/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('backend') }}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- ChartJS -->
    <script src="{{ asset('backend') }}/plugins/chart.js/Chart.min.js"></script>
    <!-- Sparkline -->
    <script src="{{ asset('backend') }}/plugins/sparklines/sparkline.js"></script>
    <!-- JQVMap -->
    <script src="{{ asset('backend') }}/plugins/jqvmap/jquery.vmap.min.js"></script>
    <script src="{{ asset('backend') }}/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
    <!-- jQuery Knob Chart -->
    <script src="{{ asset('backend') }}/plugins/jquery-knob/jquery.knob.min.js"></script>
    <!-- daterangepicker -->
    <script src="{{ asset('backend') }}/plugins/moment/moment.min.js"></script>
    <script src="{{ asset('backend') }}/plugins/daterangepicker/daterangepicker.js"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="{{ asset('backend') }}/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
    <!-- Summernote -->
    <script src="{{ asset('backend') }}/plugins/summernote/summernote-bs4.min.js"></script>
    <!-- overlayScrollbars -->
    <script src="{{ asset('backend') }}/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('backend') }}/dist/js/adminlte.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="{{ asset('backend') }}/dist/js/pages/dashboard.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{ asset('backend') }}/dist/js/demo.js"></script>
    <script src="{{ asset('backend') }}/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="{{ asset('backend') }}/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="{{ asset('backend') }}/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="{{ asset('backend') }}/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="{{ asset('backend/plugins/toastr/toastr.min.js') }}"></script>

    <script>
        $(function() {
            $('.textarea').summernote()
            $('a,.btn').tooltip();
            $('.select2').select2()
            $("#example1").DataTable({
                "responsive": true,
                "autoWidth": false,
            });
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });

        $(".form").submit(function(e) {
            e.preventDefault();
            var data = new FormData(this);
            var url = $(this).attr("action");
            // alert(data)
            add_update(data, url)
        });



        function add_update(data, url) {
            $.ajax({
                type: "post",
                url: url,
                data: data,
                processData: false,
                contentType: false,
                beforeSend: function() {
                    $(".btn_save").html(
                        `<div class="spinner-border spinner-border-sm"></div> Loading...`
                    ).attr('disabled', true);
                },
                complete: function() {
                    $(".btn_save").html("Save").attr('disabled', false);
                }
            }).done(function(response) {

                toastr.options = {
                    "closeButton": true,
                    "progressBar": true
                }
                toastr.success(response.message);
                setTimeout(() => {
                    location.reload()
                }, 2000);
            }).fail(function(response) {

                console.log(response.responseJSON.message)
                toastr.options = {
                    "closeButton": true,
                    "progressBar": true
                }
                toastr.error(response.responseJSON.message);
            });
        }

        $('.uploadFile').on('change', function() {
            const previewContainer = $(this).next('.imagePreview');
            console.log(previewContainer)
            previewContainer.empty();

            const files = $(this)[0].files;
            if (files.length === 0) return;

            for (let i = 0; i < files.length; i++) {
                const file = files[i];
                const reader = new FileReader();

                reader.onload = function(e) {
                    const imageSrc = e.target.result;
                    const previewHtml = `
                    <div class="col-md-2">
                        <div class="position-relative">
                            <img src="${imageSrc}" class="img-thumbnail preview-image" alt="Image Preview">
                            <button type="button" class="close delete-image" aria-label="Delete" data-index="${i}">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    </div>
                `;
                    previewContainer.append(previewHtml);
                };

                reader.readAsDataURL(file);
            }
        });

        // Handle delete button click
        $('.imagePreview').on('click', '.delete-image', function() {
            const index = $(this).data('index');
            const fileInput = $('.uploadFile')[0];
            const files = fileInput.files;
            const newFiles = [];

            for (let i = 0; i < files.length; i++) {
                if (i !== index) {
                    newFiles.push(files[i]);
                }
            }

            // Create a new FileList object with the remaining files
            const newFileList = new DataTransfer();
            newFiles.forEach((file) => {
                newFileList.items.add(file);
            });

            // Set the new FileList as the value of the input element
            fileInput.files = newFileList.files;

            // Remove the corresponding image preview
            $(this).closest('.col-md-2').remove();
        });
    </script>

    <script>
        @if ($message = Session::get('success'))
            toastr.options = {
                "closeButton": true,
                "progressBar": true
            }
            toastr.success("{{ $message }}");
        @endif

        @if ($message = Session::get('error'))
            toastr.options = {
                "closeButton": true,
                "progressBar": true
            }
            toastr.error("{{ $message }}");
        @endif
    </script>
    @if ($errors->any())
        <script>
            @foreach ($errors->all() as $error)
                toastr.error('{{ $error }}', Error, {
                    CloseButton: true,
                    ProgressBar: true
                });
            @endforeach
        </script>
    @endif
</body>

</html>
