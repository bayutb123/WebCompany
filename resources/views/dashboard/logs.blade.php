<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Dashboard | {{ $user->name }}</title>

    @include('dependencies-dashboard.link')

</head>
<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        @include('layout-dashboard.sidebar')

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                @include('layout-dashboard.nav')

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Blog</h1>
                        
                    </div>

                    
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">All Blogs</h6>
                        </div>

                        <div class="col-auto mx-2 mt-4">
                            <label class="sr-only" for="searchForActivity">Search</label>
                            <div class="input-group mb-2">
                              <div class="input-group-prepend">
                                <div class="input-group-text"><i class="fa fa-search"></i></div>
                              </div>
                              <input type="text" class="form-control"  id="searchForActivity" onkeyup="searchForActivity()" placeholder="Search Activity Message">
                            </div>
                          </div>
                      
                        <div class="card-body">

                            <div class="table-responsive">

                                <table class="table table-bordered" id="activity" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Time</th>
                                            <th>Author</th>
                                            <th>Log Message</th>
                                        </tr>
                                    </thead>    
                                    <tfoot>
                                        <tr>
                                            <th>Time</th>
                                            <th>Author</th>
                                            <th>Log Message</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @foreach($logs as $log)
                                        <tr>
                                            <td>{{ $log->created_at }}</td>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $log->log_message }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            @include('layout-dashboard.footer')
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="{{route('logout.perform')}}">Logout</a>
                </div>
            </div>
        </div>
    </div>
    @include('dependencies-dashboard.script')
</body>

</html>