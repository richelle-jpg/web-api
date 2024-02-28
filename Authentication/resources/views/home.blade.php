<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>News Portal | Home Page</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{ asset('css/modern-business.css') }}" rel="stylesheet">

</head>

<body>

    <!-- Navigation -->
    @include('include.header')

    <!-- Page Content -->
    <div class="container">

        <div class="row" style="margin-top: 4%">

            <!-- Blog Entries Column -->
            <div class="col-md-8">

                <!-- Blog Post -->
                @if(isset($pageno))
                @php
                    $no_of_records_per_page = 8;
                    $offset = ($pageno - 1) * $no_of_records_per_page;
                    $total_pages = ceil($total_rows / $no_of_records_per_page);
                @endphp

                @foreach($posts as $row)
                <div class="card mb-4">
                    <img class="card-img-top"
                        src="{{ asset('admin/postimages/' . htmlentities($row['PostImage'])) }}"
                        alt="{{ htmlentities($row['posttitle']) }}">
                    <div class="card-body">
                        <h2 class="card-title">
                            {{ htmlentities($row['posttitle']) }}
                        </h2>
                        <p><!--category-->
                            <a class="badge text-decoration-none link-light"
                                href="{{ route('category', ['catid' => htmlentities($row['cid'])]) }}"
                                style="color:#fff">
                                {{ htmlentities($row['category']) }}
                            </a>
                            <!--Subcategory--->
                            <a class="badge text-decoration-none link-light" style="color:#fff">
                                {{ htmlentities($row['subcategory']) }}
                            </a>
                        </p>
                        <a href="{{ route('news-details', ['nid' => htmlentities($row['pid'])]) }}"
                            class="btn btn-primary">Read More &rarr;</a>
                    </div>
                    <div class="card-footer text-muted">
                        Posted on {{ htmlentities($row['postingdate']) }}
                    </div>
                </div>
                @endforeach

                <!-- Pagination -->
                <ul class="pagination justify-content-center mb-4">
                    <li class="page-item"><a href="{{ route('home', ['pageno' => 1]) }}" class="page-link">First</a>
                    </li>
                    <li class="page-item {{ $pageno <= 1 ? 'disabled' : '' }}">
                        <a href="{{ $pageno <= 1 ? '#' : route('home', ['pageno' => ($pageno - 1)]) }}"
                            class="page-link">Prev</a>
                    </li>
                    <li class="page-item {{ $pageno >= $total_pages ? 'disabled' : '' }}">
                        <a href="{{ $pageno >= $total_pages ? '#' : route('home', ['pageno' => ($pageno + 1)]) }}"
                            class="page-link">Next</a>
                    </li>
                    <li class="page-item"><a href="{{ route('home', ['pageno' => $total_pages]) }}"
                            class="page-link">Last</a></li>
                </ul>
                @endif

            </div>

            
<!-- Bootstrap core JavaScript -->
<script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

</body>

</html>
