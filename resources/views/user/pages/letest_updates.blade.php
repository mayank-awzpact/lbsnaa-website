@include('user.includes.header')

@if(isset($nav_page))

  <!-- Page Content -->
  <section class="py-4">
    <div class="container">
        <div class="row align-items-center pb-lg-2">
                <!-- image -->
                <div class="mb-4 mb-lg-0 bg-gray-200 rounded-4 py-2">
                    <nav aria-label="breadcrumb ">
                        <ol class="breadcrumb p-2">
                          <li class="breadcrumb-item">
                          <a href="{{ route('home')}}" style="color: #af2910;">Home</a>
                          </li>
                          <li class="breadcrumb-item">
                            <a href="#" style="color: #af2910;">{{$nav_page->menutitle}}</a>
                          </li>
                        </ol>
                      </nav>
                </div>
        </div>
    </div>
</section>

<section class="py-1">
    <div class="container">
        <div class="row">
            <div class="col-xl-12 col-md-12 col-12">
                <div class="mb-6 mb-lg-8">
                    <h2 class="h1 fw-bold text-primary">
                    {{$nav_page->menutitle}}
                    </h2>
                </div>
            </div>
        </div>
       
        <p><?= $nav_page->content ?></p>
    </div>
</section>


@else
    <h4>Does not exist</h4>
@endif


@include('user.includes.footer')