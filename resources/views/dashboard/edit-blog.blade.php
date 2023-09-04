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
                        <h1 class="h3 mb-0 text-gray-800">Edit blog</h1>
                        <div class="dropdown mb-4">
                            <button class="btn btn-danger dropdown-toggle" type="button"
                                id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false">
                                Delete Blog
                            </button>
                            <div class="dropdown-menu animated--fade-in"
                                aria-labelledby="dropdownMenuButton">
                                <h5 align="center" class="mt-2 bold">Are you sure?</h5>
                                <br>
                                <a class="dropdown-item bg-danger" href="{{route('blog.delete',['id' => $blog->id])}}">Delete</a>
                            </div>
                        </div>
                    </div>
                    <form action="{{ route('blog.update', ['id' => $blog->id]) }}" method="post" enctype="multipart/form-data">
                        <input type="hidden" id="_token" name="_token" value="{{ csrf_token() }}" />
                        <input type="hidden" name="author" value="sampleauthor">
                        <input type="text" class="form-control form-control-user mb-4"
                                id="title" name="title" aria-describedby="title"
                                placeholder="Blog title" value="{{$blog->title}}">
                        <img src="{{ url('/storage/blog-banner/'.$blog->image) }}" class="flex-shrink-0" alt="" srcset="">
                        <label for="image">Ignore if you dont want to change image</label>        
                        <input type="file" class="form-control form-control-user mb-4"
                                id="image" name="image" aria-describedby="image"
                                placeholder="Blog image" value="{{$blog->image}}">     
                        @if ($errors->has('image'))
                            <div class="alert alert-danger">
                                {{ $errors->first('image') }}
                            </div>
                        @endif                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                          
                    
                        <textarea id="content" name="content">
                            {!! $blog->content !!}
                        </textarea>
                        
                        <button type="submit" class="btn btn-primary mt-2" >Submit</button><p>Fungsi edit saat ini dalam masa pengembangan</p>
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
                    <a class="btn btn-primary" href="{{route('logout.perform')}}">Logout</a>
                </div>
            </div>
        </div>
    </div>

    @include('dependencies-dashboard.script')
</body>

</html>