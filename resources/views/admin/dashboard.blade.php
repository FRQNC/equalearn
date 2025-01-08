@extends('layouts.admin-layout')
@section('content')
    <div class="pagetitle">
        <h1>Dashboard for {{ \Carbon\Carbon::createFromDate($year, $month)->translatedFormat('F Y') }} </h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('landing') }}">Home</a></li>
                <li class="breadcrumb-item active">Dashboard </li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <!-- Filter Bulan dan Tahun -->
    <div class="row mb-3">
        <div class="col-md-6">
            <form action="{{ route('dashboard') }}" method="GET" class="d-flex align-items-center">
                <label for="month" class="me-2">Month:</label>
                <select name="month" id="month" class="form-select me-2">
                    @foreach (range(1, 12) as $m)
                        <option value="{{ $m }}" {{ $m == $month ? 'selected' : '' }}>
                            {{ \Carbon\Carbon::create()->month($m)->translatedFormat('F') }}
                        </option>
                    @endforeach
                </select>

                <label for="year" class="me-2">Year:</label>
                <select name="year" id="year" class="form-select me-2">
                    @foreach (range(date('Y') - 5, date('Y') + 5) as $y)
                        <option value="{{ $y }}" {{ $y == $year ? 'selected' : '' }}>
                            {{ $y }}
                        </option>
                    @endforeach
                </select>

                <button type="submit" class="btn btn-primary">Filter</button>
            </form>
        </div>
    </div>

    <section class="section dashboard">
        <div class="row">

            <!-- Left side columns -->
            <div class="col-lg-12">
                <div class="row">

                    <!-- Sales Card -->
                    <div class="col-xxl-4 col-md-6">
                        <div class="card info-card sales-card">

                            <div class="card-body">
                                <h5 class="card-title">Post <span>| this Month</span><span></span></h5>

                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-envelope"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>{{ $post_count }}</h6>

                                    </div>
                                </div>
                            </div>

                        </div>
                    </div><!-- End Sales Card -->

                    <!-- Revenue Card -->
                    <div class="col-xxl-4 col-md-6">
                        <div class="card info-card revenue-card">
                            <div class="card-body">
                                <h5 class="card-title">User <span>| who posted this Month</span></h5>

                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-people"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>{{ $unique_users_count }}</h6>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div><!-- End Revenue Card -->

                    <!-- Customers Card -->
                    <div class="col-xxl-4 col-xl-12">

                        <div class="card info-card customers-card">
                            <div class="card-body">
                                <h5 class="card-title">Topic <span>| this Month</span></h5>

                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-chat-text-fill"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>{{ $topic_count }}</h6>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div><!-- End Customers Card -->

                    <!-- Reports -->
                    <div class="col-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Topics Distribution</h5>

                                <!-- Pie Chart for Topics -->
                                <div id="topicsPieChart"></div>

                                <script>
                                    document.addEventListener("DOMContentLoaded", () => {
                                        new ApexCharts(document.querySelector("#topicsPieChart"), {
                                            series: {!! json_encode($topics->map(fn($topic) => $topic->post_count)->toArray()) !!},
                                            chart: {
                                                height: 350,
                                                type: 'pie',
                                            },
                                            labels: {!! json_encode($topics->map(fn($topic) => $topic->name)->toArray()) !!},
                                            colors: ['#ff5733', '#33ff57', '#3357ff', '#f3ff33', '#a833ff', '#ff33b5', '#33f7ff'],
                                            responsive: [{
                                                breakpoint: 480,
                                                options: {
                                                    chart: {
                                                        width: 300
                                                    },
                                                    legend: {
                                                        position: 'bottom'
                                                    }
                                                }
                                            }]
                                        }).render();
                                    });
                                </script>
                                <!-- End Pie Chart for Topics -->
                            </div>
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Grades Distribution</h5>

                                <!-- Pie Chart for Grades -->
                                <div id="gradesPieChart"></div>

                                <script>
                                    document.addEventListener("DOMContentLoaded", () => {
                                        new ApexCharts(document.querySelector("#gradesPieChart"), {
                                            series: {!! json_encode($grades->map(fn($grade) => $grade->post_count)->toArray()) !!},
                                            chart: {
                                                height: 350,
                                                type: 'pie',
                                            },
                                            labels: {!! json_encode($grades->map(fn($grade) => $grade->name)->toArray()) !!},
                                            colors: ['#ffa500', '#00ff7f', '#6495ed', '#ffc0cb', '#ffffe0', '#dda0dd', '#b0c4de'],
                                            responsive: [{
                                                breakpoint: 480,
                                                options: {
                                                    chart: {
                                                        width: 300
                                                    },
                                                    legend: {
                                                        position: 'bottom'
                                                    }
                                                }
                                            }]
                                        }).render();
                                    });
                                </script>
                                <!-- End Pie Chart for Grades -->
                            </div>
                        </div>
                    </div>
                    <!-- End Reports -->

                </div>
            </div><!-- End Left side columns -->
        </div>
    </section>
@endsection
