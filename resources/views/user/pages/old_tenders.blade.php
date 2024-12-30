@include('user.includes.header')



<!-- Page Content -->
<section class="py-2">
    <div class="container">
        <!-- Breadcrumb -->
        <div class="row align-items-center pb-lg-2 mb-4">
            <div class="col-12">
                <div class="bg-gray-200 rounded-4 py-2">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb p-2 mb-0">
                            <li class="breadcrumb-item">
                                <a href="{{ route('home') }}" style="color: #af2910;">Home</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Tenders</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <div class="contsearch">
            <form id="form2" method="GET" action="{{ route('user.tenders_archive') }}">
                <fieldset>
                    <label class="txt">Search :</label>
                    <label for="keywords">
                        <input type="text" id="Keywords" name="keywords" value="{{ request('keywords') }}"
                            placeholder="Keywords Search">
                    </label>

                    <label for="year">
                        <select name="year" id="year">
                            @foreach($years as $year)
                            <option value="{{ $year }}" @if($year==request('year')) selected @endif>{{ $year }}</option>
                            @endforeach
                        </select>
                    </label>



                    <label for="btn2">
                        <input id="btn2" type="submit" value="Submit" class="btn">
                    </label>
                    <label for="btn-reset">
                <a href="{{ route('user.tenders_archive') }}" id="btn-reset" class="btn btn-secondary">Reset</a>
            </label>
                </fieldset>
            </form>
        </div>
        <!-- Tenders Card -->
        <div class="card bg-white border-0 rounded-4 shadow-sm mb-4">
            <div class="card-body p-4">
                <div class="d-flex justify-content-between align-items-center border-bottom pb-3 mb-3">
                    <h4 class="fw-semibold fs-18 mb-0">Tenders</h4>
                </div>

                <!-- Table Section -->
                <div class="table-responsive">
                    <table class="table table-striped align-middle">
                        <thead class="table-light">
                            <tr class="text-center">
                                <th>#</th>
                                <th>Tender Title</th>
                                <th>Publish Date</th>
                                <th>Last Date</th>
                                <th>Document</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(count($query) > 0)
                            @foreach($query as $key => $value)
                            <tr class="text-center">
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $value->title }}</td>
                                <td>{{ \Carbon\Carbon::parse($value->publish_date)->format('d F, Y, H:i A') }}</td>
                                <td>{{ \Carbon\Carbon::parse($value->expiry_date)->format('d F, Y, H:i A') }}</td>
                                <td>
                                    @if(!empty($value->file))
                                    <a href="{{ asset('storage/tender/'.$value->file) }}"
                                        class="btn btn-sm btn-outline-primary" target="_blank">Download</a>
                                    @else
                                    <span class="text-muted">N/A</span>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                            @else
                            <tr>
                                <td colspan="5" class="text-center text-muted">No records found</td>
                            </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>






@include('user.includes.footer')