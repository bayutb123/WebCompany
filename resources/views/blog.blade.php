<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Blogs | WebCompany</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  @include('dependencies.link')
</head>

<style>
  .max-lines {
  text-overflow: ellipsis;
  word-wrap: break-word;
  overflow: hidden;
  max-height: 3.6em;
  line-height: 1.8em;
}
.blog-banner {
  height: 100%;
}

.banner-container {
  height: 200px;
  align-content: center;
  overflow: hidden;
}
.clear : hover {
  background-color: red;
}
</style>
<body>

  <!-- ======= Header ======= -->
  @include('layout.nav')

  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>Blog</h2>
          <ol>
          <li><a href="{{ route('home.page') }}">Home</a></li>
            <li>Blog</li>
          </ol>
        </div>

      </div>
    </div><!-- End Breadcrumbs -->

    <!-- ======= Blog Section ======= -->
    <section id="blog" class="blog">
      <div class="container" data-aos="fade-up">
        <div class="row g-5">
          <div class="col-lg-8">

            <div class="row gy-4 posts-list">

              @foreach ($blogs as $blog)
              <div class="col-lg-6">
                <article class="d-flex flex-column">
                  
                  <div class="post-img banner-container">
                    <img src="{{ asset('/storage/blog-banner/'.$blog->image) }}" class="img-thumbnail" alt="">
                  </div>
                  
                  <h2 class="title">
                    <a href="{{ route('blog.single', ['id' => $blog->id]) }}">{{ $blog->title }}</a>
                    <span class="badge text-bg-primary my-2 mx-2">{{ $blog->category }}</span>
                  </h2>

                  <div class="meta-top">
                    <ul>
                      <li class="d-flex align-items-center"><i class="bi bi-person"></i> <a href="blog-details.html">{{ $blog->author }}</a></li>
                      <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a href="blog-details.html"><time datetime="2022-01-01">{{ $blog->created_at }}</time></a></li>
                    </ul>
                  </div>

                  

                </article>
              </div>
              @endforeach<!-- End post list item -->

              <div class="blog-pagination">
                <ul class="justify-content-center">
                  {{ $blogs->links('vendor.pagination.bootstrap-5') }}
                </ul>
              </div><!-- End blog pagination -->

            </div><!-- End blog posts list -->

            

          </div>

          <div class="col-lg-4">
            <div class="sidebar">

              <div class="sidebar-item search-form">
                <h3 class="sidebar-title">Search</h3>
                <form action="" class="mt-3">
                  <input type="text">
                  <button type="submit"><i class="bi bi-search"></i></button>
                </form>
              </div><!-- End sidebar search formn-->

              <div class="sidebar-item tags">
                <h3 class="sidebar-title">Category</h3>
                <ul class="mt-3">
                  @foreach ($categories as $category)
                  <li>
                    <a href="{{ route('blog.category', ['category' => $category->category]) }}">{{ $category->category }}</a>
                  </li>
                  @endforeach
                  <li class="btn-bg-danger">
                    <a href="{{ route('blog.page') }}">x</a>
                  </li>
                </ul>
              </div><!-- End sidebar tags-->


              <div class="sidebar-item recent-posts">
                <h3 class="sidebar-title">Recent Posts</h3>
                <div class="mt-3">
                  @foreach ($recentblogs as $recentblog)
                  <div class="post-item">
                    <img src="{{ asset('storage/blog-banner/'.$recentblog->image) }}" alt="" class="flex-shrink-0">
                    <div>
                      <h4 class="max-lines" ><a href="{{ route('blog.single', ['id' => $recentblog->id]) }}">{{ $recentblog->title }}</a></h4>
                      <time datetime="2020-01-01">{{ $recentblog->created_at }}</time>
                    </div>
                  </div><!-- End recent post item-->
                  @endforeach

                </div>

              </div><!-- End sidebar recent posts-->

            </div><!-- End Blog Sidebar -->

          </div>
        </div>
      </div>
    </section><!-- End Blog Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  @include('layout.footer')
  <!-- End Footer -->

  <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <div id="preloader"></div>
  

  @include('dependencies.script')

</body>

</html>