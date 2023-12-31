<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Blog Details</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  @include('dependencies.link')
</head>



<body>

  <!-- ======= Header ======= -->
  @include('layout.nav')

  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>Blog Details</h2>
          <ol>
            <li><a href="{{ route('home.page') }}">Home</a></li>
            <li><a href="{{ route('blog.page') }}">Blog</a></li>
            <li>Blog Details</li>
          </ol>
        </div>

      </div>
    </div><!-- End Breadcrumbs -->

    <!-- ======= Blog Details Section ======= -->
    <section id="blog" class="blog">
      <div class="container" data-aos="fade-up">

        <div class="row g-5">

          <div class="col-lg-8">

            <article class="blog-details">

              <div class="post-img">
                <img src="{{asset('storage/blog-banner/'.$blog->image)}}" alt="" class="img-fluid">
              </div>

              <h2 class="title">{{$blog->title}}</h2>

              <div class="meta-top">
                <ul>
                  <li class="d-flex align-items-center"><i class="bi bi-person"></i> <a href="#">{{ $authorname }}</a></li>
                  <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a href="#"><time datetime="2020-01-01">{{ $blog->created_at }}</time></a></li>
                </ul>
              </div><!-- End meta top -->

              <div class="content">
                
                
                {!! $blog->content !!}
                


              </div><!-- End post content -->

              {{-- <div class="meta-bottom">
                <i class="bi bi-folder"></i>
                <ul class="cats">
                  <li><a href="#">Business</a></li>
                </ul>

                <i class="bi bi-tags"></i>
                <ul class="tags">
                  <li><a href="#">Creative</a></li>
                  <li><a href="#">Tips</a></li>
                  <li><a href="#">Marketing</a></li>
                </ul>
              </div><!-- End meta bottom --> --}}

            </article><!-- End blog post -->

          </div>

          <div class="col-lg-4">

            <div class="sidebar">

              {{-- <div class="sidebar-item search-form">
                <h3 class="sidebar-title">Search</h3>
                <form action="#" class="mt-3">
                  <input id="searchText" type="text">
                  <button onclick="search()">Search</button>
                </form>
              </div><!-- End sidebar search formn--> --}}

              {{-- <div class="sidebar-item categories">
                <h3 class="sidebar-title">Categories</h3>
                <ul class="mt-3">
                  <li><a href="#">General <span>(25)</span></a></li>
                  <li><a href="#">Lifestyle <span>(12)</span></a></li>
                  <li><a href="#">Travel <span>(5)</span></a></li>
                  <li><a href="#">Design <span>(22)</span></a></li>
                  <li><a href="#">Creative <span>(8)</span></a></li>
                  <li><a href="#">Educaion <span>(14)</span></a></li>
                </ul>
              </div><!-- End sidebar categories--> --}}

              <div class="sidebar-item recent-posts">
                <h3 class="sidebar-title">Recent Posts</h3>

                <div class="mt-3">

                  @foreach ($recentblogs as $recentblog)
                  <div class="post-item">
                    <img src="{{asset('storage/blog-banner/'.$recentblog->image)}}" alt="" class="flex-shrink-0">
                    <div>
                      <h4><a href="{{ route('blog.single', ['id' => $recentblog->id])}}">{{$recentblog->title}}</a></h4>
                      <time datetime="2020-01-01">{{$recentblog->created_at}}</time>
                    </div>
                  </div><!-- End recent post item-->
                  @endforeach

                </div>

              </div><!-- End sidebar recent posts-->

              {{-- <div class="sidebar-item tags">
                <h3 class="sidebar-title">Tags</h3>
                <ul class="mt-3">
                  <li><a href="#">App</a></li>
                  <li><a href="#">IT</a></li>
                  <li><a href="#">Business</a></li>
                  <li><a href="#">Mac</a></li>
                  <li><a href="#">Design</a></li>
                  <li><a href="#">Office</a></li>
                  <li><a href="#">Creative</a></li>
                  <li><a href="#">Studio</a></li>
                  <li><a href="#">Smart</a></li>
                  <li><a href="#">Tips</a></li>
                  <li><a href="#">Marketing</a></li>
                </ul>
              </div><!-- End sidebar tags--> --}}

            </div><!-- End Blog Sidebar -->

          </div>
        </div>

      </div>
    </section><!-- End Blog Details Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  @include('layout.footer')
  <!-- End Footer -->

  <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <div id="preloader"></div>

  @include('dependencies.script')

</body>

</html>