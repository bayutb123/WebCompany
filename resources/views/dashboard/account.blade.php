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

<style>
    .cropped-ofp {
width: 150px; 
height: 150px; 
object-fit: cover;
object-position: 25% 25%; 
}
</style>

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
                        <h1 class="h3 mb-0 text-gray-800">Account Settings</h1>

                    
                    </div>
                    <div class="row">

                        <!-- Content Column -->
                        <div class="col-lg-4 mb-2 text-center">

                            <!-- Approach -->
                            <img class="rounded-circle cropped-ofp mt-4 mb-4" alt="avatar2" src="{{ url('/storage/profile/'.$user->image) }}" />

                        </div>

                        <div class="col-lg-8 mb-6">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Hi {{ $user->name }}!</h6>
                                </div>
                                <form enctype="multipart/form-data" method="POST" action="{{ route('account.perform') }}" class="m-4 needs-validation" novalidate>
                                    <input type="hidden" id="_token" name="_token" value="{{ csrf_token() }}" />
                                    <div class="col-md-8 position-relative">
                                        <div class="form-outline">
                                          <input type="file" class="form-control" name="image" id="image"/>
                                          <label for="image" class="form-label">Change profile image</label>
                                        </div>
                                        @if ($errors->has('image'))
                                        <span class="text-danger">{{ $errors->first('image') }}</span>
                                        @endif
                                      </div>
                                      <div class="col-md-8 position-relative">
                                        <div class="form-outline">
                                          <input type="text" class="form-control" name="name" id="name" value="{{ $user->name }}" required />
                                          <label for="name" class="form-label">Full name</label>
                                        </div>
                                        @if ($errors->has('name'))
                                        <span class="text-danger">{{ $errors->first('name') }}</span>
                                        @endif
                                      </div>

                                      <div class="col-md-8 position-relative">
                                        <div class="form-outline">
                                          <textarea class="form-control" id="bio" name="bio" required>{{ $user->bio }}</textarea>
                                          <label for="bio" class="form-label">Textarea</label>
                                        </div>
                                        @if ($errors->has('bio'))
                                        <span class="text-danger">{{ $errors->first('bio') }}</span>
                                        @endif
                                      </div>
                                      @if ($response != null)
                                      <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 11">
                                        <div id="liveToast" class="toast hide" role="alert" aria-live="assertive" aria-atomic="true">
                                          <div class="toast-header">
                                            <img src="..." class="rounded me-2" alt="...">
                                            <strong class="me-auto">Bootstrap</strong>
                                            <small>11 mins ago</small>
                                            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                                          </div>
                                          <div class="toast-body">
                                            Hello, world! This is a toast message.
                                          </div>
                                        </div>
                                      </div>
                                      
                                      @endif
                                <div class="col-12 pt-2">
                                  <button class="btn btn-primary" type="submit">Update  Profile</button>
                                </div>
                              </form>
                            
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