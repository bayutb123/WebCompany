<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Dashboard | Admin</title>

    @include('dependencies-dashboard.link')

</head>



<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        @include('layout-dashboard.sidebar')
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                @include('layout-dashboard.nav')
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    
                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800">Compose a blog</h1>
                    <form action="{{ route('compose.perform') }}" method="post" enctype="multipart/form-data">
                        <input type="hidden" id="_token" name="_token" value="{{ csrf_token() }}" />
                        <input type="hidden" name="user_id" value="{{ $user->id }}">
                        <input type="hidden" name="log_type" value="Blog Post">
                        <input type="hidden" id="message" name="log_message" value="">
                        <input type="hidden" name="author" value="{{ $user->name }}">
                        <input type="text" onkeyup="streamValue()" class="form-control form-control-user mb-4"
                                id="title" name="title" aria-describedby="title"
                                placeholder="Blog title">
                        @if ($errors->has('title'))
                            <div class="alert alert-danger">
                                {{ $errors->first('title') }}
                            </div>
                        @endif

                        <select class="form-control form-control-user mb-4" id="category" name="category">
                            <option value="" disabled>Choose a category</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category }}">{{ $category }}</option>
                            @endforeach

                       <input type="file" class="form-control form-control-user mb-4"
                                id="image" name="image" aria-describedby="image"
                                placeholder="Blog image">             
                        @if ($errors->has('image'))
                            <div class="alert alert-danger">
                                {{ $errors->first('image') }}
                            </div>
                        @endif                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                          
                    
                        <textarea id="editorcontent" name="content">
                            
                        </textarea>
                        
                        <button type="submit" class="btn btn-primary mt-2">Submit</button>
                    </form>
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
                    <a class="btn btn-primary" href="{{ route('logout.perform') }}">Logout</a>
                </div>
            </div>
        </div>
    </div>

    
  @include('dependencies-dashboard.script')

  <script>
    function streamValue() {
      // Get the source and target input elements by their IDs
      var sourceInput = document.getElementById('title');
      var targetInput = document.getElementById('message');
  
      // Get the value from the source input
      var sourceValue = sourceInput.value;
  
      // Set the value of the target input to be the same as the source value
      targetInput.value = sourceValue;
    }
  </script>

</body>

</html>