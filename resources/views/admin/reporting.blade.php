@extends('admin.layouts.admin')

@section('title', __('views.admin.reposting.index.title'))

@section('content')

    <div class="row"></div>

    <div class="row">
        <div class="col-md-12" style="margin-bottom: 20px">
            <label for="dates">Dates Range:</label>
            <input type="text" name="dates" id="dates">
        
            <label for="product" style="margin-left: 20px">Select Product:</label>
            <select class="js-example-basic-single" name="product" id="product" multiple="multiple">
                @foreach ($products as $product)
                    <option value="{{ $product->id }}">{{ $product->product_name }}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <h4>Diagram Lingkaran Product</h4>
            <div id="product_price_range">
                <canvas class="canvasChartProduct"></canvas>
            </div>
        </div>
        <div class="col-md-6">
            <h4>Tabel Product Created&Price Range</h4>
            <div id="output"></div>
        </div>
    </div>
@endsection

@section('scripts')
    @parent
    {{ Html::script(mix('assets/admin/js/dashboard.js')) }}

    {{-- Date Range Picker --}}
    <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    {{-- Select2 --}}
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    {{-- ChartJS --}}
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    {{-- PivotTableJS --}}
    <script type="text/javascript" src="https://pivottable.js.org/dist/pivot.js"></script>

    <script>
        $('input[name="dates"]').daterangepicker();

        $(document).ready(function() {
            $('.js-example-basic-single').select2();
        });

        // Chart
        const productPriceRange = {
            _defaults: {
                type: 'pie',
                tooltipFillColor: "rgba(51, 51, 51, 0.55)",
                data: {
                    labels: [
                        '< 100000',
                        '100000 - 500000',
                        '500001 - 1000000',
                        '> 1000000'
                    ],
                    datasets: [{
                        data: [],
                        backgroundColor: [
                            "#59ce8f",
                            "#3498DB",
                            "#9B59B6",
                            "#E74C3C",
                        ],
                        hoverBackgroundColor: [
                            "#36CAAB",
                            "#49A9EA",
                            "#B370CF",
                            "#E95E4F",
                        ]
                    }]
                },
                options: {
                    legend: false,
                    responsive: false
                }
            },
            init: function($el) {
                var self = this;
                $el = $($el);
                $.ajax({
                    url: 'reporting/chart-product',
                    success: function(response) {
                        self._defaults.data.datasets[0].data = [
                            response.less_100000,
                            response._100000_500000,
                            response._500001_1000000,
                            response.more_1000000
                        ];
                        new Chart($el.find('.canvasChartProduct'), self._defaults);
                    }
                });
            }
        };
        productPriceRange.init($('#product_price_range'));

        // Pivot
        $.ajax({
            url: 'reporting/all-data-product',
            success: function(response) {
                $("#output").pivot(
                    response,
                    {
                        rows: ["created_range"],
                        cols: ["price_range"]
                    }
                );
            }
        });
    </script>
@endsection

@section('styles')
    @parent
    {{ Html::style(mix('assets/admin/css/dashboard.css')) }}

    {{-- Date Range Picker --}}
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
    {{-- Select2 --}}
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    {{-- PivotTableJS --}}
    <link rel="stylesheet" type="text/css" href="https://pivottable.js.org/dist/pivot.css">
@endsection
