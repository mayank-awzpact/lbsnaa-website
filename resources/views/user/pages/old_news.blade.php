@include('user.includes.header')

<!-- Page Content -->
<section class="py-4">
    <div class="container">
        <div class="row align-items-center pb-lg-2">
            <!-- Breadcrumb -->
            <div class="col-12 mb-4 mb-lg-0 bg-gray-200 rounded-4 py-2">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb p-2">
                        <li class="breadcrumb-item">
                            <a href="{{ route('home') }}" class="text-danger">Home</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="#" class="text-danger">Academy News</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Academy News</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</section>

<!-- Search Form -->
<div class="contsearch">
    <form id="form2" method="GET" action="{{ route('user.news_old_listing') }}">
        <fieldset>
            <label class="txt">Search by Day/Month/Year:</label>
            <label for="keywords">
                <input type="text" id="Keywords" name="keywords" value="{{ request('keywords') }}" placeholder="Search News">
            </label>

            <label for="year">
    <select name="year" id="year" fdprocessedid="wgb9i">
        @foreach($years as $year)
            <option value="{{ $year }}">{{ $year }}</option>
        @endforeach
    </select>
</label>


            <label for="btn2">
                <input id="btn2" type="submit" value="Submit" class="btn">
            </label>
        </fieldset>
    </form>
</div>

<!-- News Section -->
<section class="py-6">
    <div class="container">
        @if($news->isNotEmpty())
        <div class="row g-4">
            @foreach($news as $slider)
            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
                <!-- Card -->
                <div class="card shadow-lg card-lift h-100">
                    <div class="card-header p-0">
                        <a href="#">
                            <img src="{{ $slider->main_image ? asset($slider->main_image) : asset('assets/images/4.jpg') }}"
                                class="card-img-top" alt="blogpost" style="height: 200px; object-fit: cover;">
                        </a>
                    </div>
                    <!-- Card body -->
                    <div class="card-body d-flex flex-column">
                        <a href="#"
                            class="fs-6 mb-2 fw-semibold d-block text-success">Posted On: {{ \Carbon\Carbon::parse($slider->start_date)->format('d F, Y') }}</a>
                        <h3 class="fs-5">
                            <a href="{{ route('user.newsbyslug', $slider->title_slug) }}" class="text-dark text-decoration-none">
                                {{ $slider->title }}
                            </a>
                        </h3>
                        <p class="text-truncate" style="max-height: 3rem;">{{ $slider->short_description }}</p>
                    </div>
                    <!-- Card footer -->
                    <div class="card-footer bg-white border-0 text-end">
                        <a href="{{ route('user.newsbyslug', $slider->title_slug) }}" class="text-primary">Read More</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        @else
        <h4>No News Found</h4>
        @endif
    </div>
</section>

@include('user.includes.footer')
