@extends('layouts.private')
@section('content-dashboard')
    {{-- CHARTS --}}
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>
    <div class="container-fluid container-header" id="loader_load">

        <div class="row" style="padding-top:10px">
            <div class="col-sm-12">
                <div class="row">
                    <div class="col-sm-4 bottom10" style="padding-right:8px;padding-left:8px;">
                        <input type="text" onblur="(this.type='text')" style="height:50px" class="form-control"
                            id="from" placeholder="Date Filter From">
                    </div>

                    <div class="col-sm-4 bottom10" style="padding-right:8px;padding-left:8px;">
                        <input type="text" style="height:50px" onblur="(this.type='text')" class="form-control"
                            id="to" placeholder="Date Filter To">
                    </div>

                    <div class="col-sm-4 bottom10" style="padding-right:8px;padding-left:8px;">
                        <button type="button" class="btn w-100" style=" color:white; background-color: #CF8029;height:50px"
                            id="button-submit">Filter</button>
                    </div>
                </div>
            </div>
        </div>



        <div class="row">
            <div class="col-md-12 bottom10" style="padding-right:5px;padding-left:5px;">
                <div class="card-border shadow bg-white h-100">
                    <div class="card-body">
                        <div style="padding:20px" id="container1"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div style="position: fixed; top: 60px; right: 20px;z-index:9999">
        <div class="toast toast1 toast-bootstrap " role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header">
                <div><i class="fa fa-newspaper-o"> </i></div>
                <div><strong class="mr-auto m-l-sm toast-title">Notification</strong></div>
                <div>
                    <button type="button" class="ml-2 mb-1 close float-end" data-dismiss="toast" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
            <div class="toast-body">
                Hello, you can push notifications to your visitors with this toast feature.
            </div>
        </div>
    </div>


    <script type="text/javascript">
        const PHP = value => currency(value, {
            symbol: '',
            decimal: '.',
            separator: ','
        });

        function tableLoader() {
            var originalText = $('#container1').html();
            $('#container1').html(
                `<div id="contentSpinner">
                <span id="button-spinner" style="color:#CF8029;width:150px;height:150px" class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                </div>
                `
            );
            $('#container1').addClass('d-flex');
            $('#container1').addClass('justify-content-center');
            $('#container1').css('padding', '117px');
            $('#contentSpinner').css('width', '150px');
            $('#contentSpinner').css('height', '150px');
            setTimeout(function() {
                $('#container1').removeClass('d-flex');
                $('#container1').removeClass('justify-content-center');
                $('#container1').css('padding', '0px');
                $('#contentSpinner').css('width', '0px');
                $('#contentSpinner').css('height', '0px');
                $('#container1').html(originalText);
            }, 1500);
        }

        $(document).ready(function() {
            tableLoader();
            $('div.spanner').addClass('show');
            setTimeout(function() {
                $('div.spanner').removeClass('show');
                show_data_load();
            }, 1500);

            $('#button-submit').on('click', function(e) {
                e.preventDefault();
                $('div.spanner').addClass('show');

                setTimeout(function() {
                    $('div.spanner').removeClass('show');
                    show_data_load();
                }, 1500);

            });

            function show_data_load(filters) {
                let from = $('#from').val();
                let to = $('#to').val();
                let filter = {
                    fromDate: from ? from : '',
                    toDate: to ? to : '',
                    ...filters
                }

                axios.get(`${apiUrl}/api/reports/analytics_load?${new URLSearchParams(filter)}`, {
                    headers: {
                        Authorization: token,
                    },
                }).then(function(response) {
                    let data = response.data;
                    if (data.success) {
                        if (data.data.length > 0) {
                            console.log('data-Item', data.data);
                            data.data.map((item, index) => {

                                Highcharts.chart('container1', {
                                    chart: {
                                        type: 'bar'
                                    },
                                    title: {
                                        text: 'Invoice Payment Analytics',
                                        align: 'left'
                                    },
                                    subtitle: {
                                        text: 'Source: <a ' +
                                            'href="https://invoice.5ppsite.com/"' +
                                            'target="_blank">invoice.5ppsite.com</a>',
                                        align: 'left'
                                    },
                                    xAxis: {
                                        categories: data.data.map(item => item.full_name),
                                        title: {
                                            text: null
                                        },
                                        gridLineWidth: 1,
                                        lineWidth: 0
                                    },
                                    yAxis: {
                                        min: 0,
                                        title: {
                                            text: '',
                                            align: 'low'
                                        },
                                        labels: {
                                            overflow: 'justify'
                                        },
                                        gridLineWidth: 0
                                    },
                                    tooltip: {
                                        valueSuffix: '(Php)'
                                    },
                                    plotOptions: {
                                        bar: {
                                            borderRadius: '50%',
                                            dataLabels: {
                                                enabled: true
                                            },
                                            groupPadding: 0.3,
                                            colorByPoint: true, // Enable color per point
                                            colors: [
                                                '#CF8029'
                                            ] // Specify the desired colors
                                        },


                                    },
                                    legend: {
                                        layout: 'vertical',
                                        align: 'right',
                                        verticalAlign: 'top', // Adjust the vertical alignment of the legend
                                        x: -40, // Move the legend to the right side
                                        y: 5, // Move the legend up or down based on your requirement
                                        floating: true,
                                        borderWidth: 1,
                                        backgroundColor: Highcharts.defaultOptions.legend
                                            .backgroundColor || '#FFFFFF',
                                        shadow: true,
                                        // itemStyle: {
                                        //     color: '#CF8029'
                                        // },

                                    },
                                    credits: {
                                        enabled: false
                                    },
                                    series: [{
                                        name: 'Total Converted Amount',
                                        data: data.data.map(item => item
                                            .total_converted_amount),
                                    }]


                                });
                            });
                        }

                    }
                }).catch(function(error) {
                    console.log("error", error);
                });
            }

            var path = window.location.pathname;
            var segments = path.split('/');
            var id = '#' + segments[1] + segments[2];
            $(id).addClass('active');

            $('#from').each(function() {
                const datepicker = new Datepicker(this, {
                    'format': 'yyyy/mm/dd',
                });
                $(this).on('changeDate', function() {
                    datepicker.hide();
                });
            });

            $('#to').each(function() {
                const datepicker = new Datepicker(this, {
                    'format': 'yyyy/mm/dd',
                });
                $(this).on('changeDate', function() {
                    datepicker.hide();
                });
            });


            let toast1 = $('.toast1');
            toast1.toast({
                delay: 3000,
                animation: true,

            });

            $('.close').on('click', function(e) {
                e.preventDefault();
                toast1.toast('hide');
            });
            $("#error_msg").hide();
            $("#success_msg").hide();

            function capitalize(s) {
                if (typeof s !== 'string') return "";
                return s.charAt(0).toUpperCase() + s.slice(1);
            }
        })
    </script>
@endsection
