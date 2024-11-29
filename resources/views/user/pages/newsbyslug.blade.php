@include('user.includes.header')

@if(isset($news))

  <!-- Page Content -->
  <section class="py-4">
    <div class="container">
        <div class="row align-items-center pb-lg-2">
                <!-- image -->
                <div class="mb-4 mb-lg-0 bg-gray-200 rounded-4 py-2">
                    <nav aria-label="breadcrumb ">
                        <ol class="breadcrumb p-2">
                          <li class="breadcrumb-item">
                            <a href="#" style="color: #af2910;">Home</a>
                          </li>
                          <li class="breadcrumb-item">
                            <a href="#" style="color: #af2910;">Academy News</a>
                          </li>
                          <li class="breadcrumb-item active" aria-current="page">{{$news->title}}</li>
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
                    {{$news->title}}
                    </h2>
                    <p class="mb-0 lead">Posted On: {{date('d M, Y',strtotime($news->start_date))}}</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-3 col-md-6 col-12">
                <div class="card mb-4 card-hover border">
                    <a href="#!">
                        <img src="https://www.lbsnaa.gov.in/upload/photogallery/media/667277bc2730dA03A0258.JPG" alt="writing" class="img-fluid w-100 rounded-top-3">
                    </a>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 col-12">
                <div class="card mb-4 card-hover border">
                    <a href="#!">
                        <img src="https://www.lbsnaa.gov.in/upload/photogallery/media/667277bc2730dA03A0258.JPG" alt="writing" class="img-fluid w-100 rounded-top-3">
                    </a>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 col-12">
                <div class="card mb-4 card-hover border">
                    <a href="#!">
                        <img src="https://www.lbsnaa.gov.in/upload/photogallery/media/667277bc2730dA03A0258.JPG" alt="writing" class="img-fluid w-100 rounded-top-3">
                    </a>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 col-12">
                <div class="card mb-4 card-hover border">
                    <a href="#!">
                        <img src="https://www.lbsnaa.gov.in/upload/photogallery/media/667277bc2730dA03A0258.JPG" alt="writing" class="img-fluid w-100 rounded-top-3">
                    </a>
                </div>
            </div>
        </div>
        <p>{{$news->description}}</p>
    </div>
</section>


@else
    <h4>News does not exist</h4>
@endif


@include('user.includes.footer')