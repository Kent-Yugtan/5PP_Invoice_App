@extends('layouts.private')
@section('content-dashboard')
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
                        <div class="table-responsive" style="padding:20px">
                            <table id="invoiceReports" style="font-size: 14px;" width="100%"
                                class="display table table-hover">
                                <thead>
                                </thead>
                                <tbody>
                                </tbody>
                                <tfoot align="right">
                                    <tr>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
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

        $(document).ready(function() {

            $('div.spanner').addClass('show');
            setTimeout(function() {
                $('div.spanner').removeClass('show');
                show_data_load()
            }, 1500);


            var currentPage = window.location.href;
            $('#collapseLayouts3 a').each(function() {
                // Compare the href attribute of the link to the current page URL
                if (currentPage.indexOf($(this).attr('href')) !== -1) {
                    // If there is a match, add the "active" class to the link
                    $(this).addClass('active');

                    // Trigger a click event on the parent link to expand the collapsed section
                    $(this).parent().parent().addClass("show");
                    $(this).parent().parent().addClass("active");
                    $('[data-bs-target="#collapseLayouts3"]').addClass('active');
                }
            });

            var dataTable = $('#invoiceReports').DataTable({
                "footerCallback": function(row, data, start, end, display) {
                    var api = this.api();
                    // converting to interger to find total
                    var intVal = function(i) {
                        return typeof i === 'string' ?
                            i.replace(/[\$,]/g, '') * 1 :
                            typeof i === 'number' ?
                            i : 0;
                    };

                    // computing column Total of the current page only
                    var discountAmount = api
                        .column(6, {
                            page: 'current'
                        })
                        .data()
                        .reduce(function(a, b) {
                            return intVal(a) + intVal(b);
                        }, 0);

                    var deductionAmount = api
                        .column(7, {
                            page: 'current'
                        })
                        .data()
                        .reduce(function(a, b) {
                            return intVal(a) + intVal(b);
                        }, 0);

                    var grand_total = api
                        .column(8, {
                            page: 'current'
                        })
                        .data()
                        .reduce(function(a, b) {
                            return intVal(a) + intVal(b);
                        }, 0);

                    // var netAmount = api
                    //     .column(9, {
                    //         page: 'current'
                    //     })
                    //     .data()
                    //     .reduce(function(a, b) {
                    //         return intVal(a) + intVal(b);
                    //     }, 0);

                    // Update the footer with the calculated values
                    $(api.column(1).footer()).html('Total');
                    $(api.column(6).footer()).html(Number(
                            parseFloat(discountAmount).toFixed(2))
                        .toLocaleString(
                            'en-US', {
                                style: 'currency',
                                currency: 'PHP'
                            }));
                    $(api.column(7).footer()).html(Number(
                            parseFloat(deductionAmount).toFixed(2))
                        .toLocaleString(
                            'en-US', {
                                style: 'currency',
                                currency: 'PHP'
                            }));
                    $(api.column(8).footer()).html(Number(
                            parseFloat(grand_total).toFixed(2))
                        .toLocaleString(
                            'en-US', {
                                style: 'currency',
                                currency: 'USD'
                            }));

                },
                // dom: 'Bfrtip',
                // pagingType: 'full_numbers',
                responsive: true,
                dom: 'lBfrtip',
                "language": {
                    "paginate": {
                        "previous": "&laquo;",
                        "next": "&raquo;"
                    }
                },
                buttons: [{
                        extend: 'csvHtml5',
                        filename: 'CSV-' + new Date().toLocaleDateString(),
                        text: "CSV",
                        className: 'btn  ms-2',
                        exportOptions: {
                            modifier: {
                                page: 'current',
                                search: 'applied'
                            },
                            columns: [1, 2, 3, 5, 6, 7, 8, 9, 10]
                        },
                        footer: true,
                    },
                    {
                        extend: 'excelHtml5',
                        filename: 'Excel-' + new Date().toLocaleDateString(),
                        text: "EXCEL",
                        className: 'btn   ',
                        messageTop: 'Invoice Report',
                        title: '',
                        exportOptions: {
                            modifier: {
                                page: 'current',
                                search: 'applied'
                            },
                            columns: [1, 2, 3, 5, 6, 7, 8, 9, 10]
                        },
                        footer: true,
                        customize: function(xlsx) {
                            var sheet = xlsx.xl.worksheets['sheet1.xml'];
                            var lastRow = $('row', sheet).last();

                            lastRow.children('c').each(function(index) {
                                var cell = $(this);
                                if (index >= 1 && index <= 4) {
                                    // Format columns 2-5 as currency and align right
                                    var value = parseFloat(cell.text());
                                    cell.attr('s', '5');
                                    cell.attr('t', 'n');
                                    // var valueNode = cell.children('v');
                                    // valueNode.text(PHP(value).format());
                                    // valueNode[0].childNodes[0].nodeValue = PHP(value).format(); // Update existing cell value
                                    cell.attr('s', '2'); // Align right
                                    cell.attr('t', 'n');
                                }
                            });

                        }


                    }, {
                        extend: 'pdfHtml5',
                        text: "PDF",
                        filename: 'PDF-' + new Date().toLocaleDateString(),
                        className: 'btn btn-success ',
                        title: 'Invoice Report',
                        footer: true,
                        exportOptions: {
                            modifier: {
                                order: 'index',
                                page: 'current',
                                search: 'applied'
                            },
                            columns: [1, 2, 3, 5, 6, 7, 8, 9, 10]
                        }, // export only current page
                        customize: function(doc) {
                            //   var col1 = '';
                            doc.content[1].table.body.forEach(function(row, rowIndex) {
                                if (rowIndex > 0) { // Exclude first row
                                    row.forEach(function(cell, cellIndex) {
                                        if (cellIndex >= 1 && cellIndex <=
                                            8) { // Columns 5, 6, 7, 8
                                            cell.alignment = 'right';
                                        }
                                    });
                                }
                            });
                            doc.pageOrientation = 'landscape';
                            doc.pageSize = 'A4'; // set orientation to landscape
                        },

                    }, {
                        extend: 'print',
                        text: "PRINT",
                        filename: 'Print-' + new Date().toLocaleDateString(),
                        className: 'btn btn-info  ',
                        footer: true,
                        exportOptions: {
                            modifier: {
                                order: 'index',
                                page: 'current',
                                search: 'applied'
                            },
                            columns: [1, 2, 3, 5, 6, 7, 8, 9, 10]
                        }, // export only current page
                        autoPrint: false, // disable print dialog
                        customize: function(doc) {
                            $(doc.document.body).find('table').addClass('display').css('font-size',
                                '12px');
                            $(doc.document.body).find('tr:nth-child(odd) td').each(function(index) {
                                $(this).css('background-color', '#D0D0D0');
                            });
                            $(doc.document.body).find('h1').html(
                                '<h2> <center>Invoice Report </h2 > ');
                            var style = $('<style>@page {size: landscape;} </style>');
                            $(doc.document.head).append(style);

                        },
                    }
                ],
                "createdRow": function(row, data, dataIndex) {
                    $(row).css('height', '50px');
                    $(row).find('td').css('vertical-align', 'middle');
                },
                "columns": [{
                        "title": "invoice_id"
                    },
                    {
                        "title": "Invoice #",
                        "className": "fit"
                    },
                    {
                        "title": "Profile Name",
                        "className": "fit"
                    },
                    {
                        "title": "Status",
                        "className": "fit"
                    },
                    {
                        "title": "Position",
                        "className": "fit"
                    },
                    {
                        "title": "Discount Type",
                        "className": "fit text-end"
                    },
                    {
                        "title": "Discount Amount",
                        "className": "fit"
                    },
                    {
                        "title": "Deductions Amount",
                        "className": "fit"
                    },
                    {
                        "title": "Grand Total",
                        "className": "fit"
                    },
                    {
                        "title": "Date Created",
                        "className": "fit"
                    },
                    {
                        "title": "Due Date",
                        "className": "fit"
                    }
                ],
                order: [
                    [1, 'desc']
                ],
                "columnDefs": [{
                        targets: [0, 4],
                        visible: false,
                        searchable: false,
                    },
                    {
                        targets: [6, 7, 8, 9, 10],
                        className: 'text-end'
                    },
                    {
                        targets: [4],
                        className: 'text-center'
                    },
                ],

            });

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

            $('#button-submit').on('click', function(e) {
                e.preventDefault();
                $('div.spanner').addClass('show');

                setTimeout(function() {
                    $('div.spanner').removeClass('show');
                    show_data_click();
                }, 1500);

            });

            function show_data_click(filters) {
                let from = $('#from').val();
                let to = $('#to').val();

                let filter = {
                    fromDate: from,
                    toDate: to,
                    ...filters
                }
                console.log("success click",
                    filter);
                axios.get(`${apiUrl}/api/userReports/userInvoiceReport_click?${new URLSearchParams(filter)}`, {
                    headers: {
                        Authorization: token,
                    },
                }).then(function(response) {
                    let data = response.data;
                    if (data.success) {
                        let table = $('#invoiceReports').DataTable();
                        table.clear().draw();
                        if (data.data.length > 0) {
                            console.log("success click", data);
                            data.data.map((item) => {


                                let total_deductions = 0;
                                let discountType = item.discount_type ? item.discount_type : "N/A";
                                let dollarAmountofDisountTotal = 0;

                                if (item.deductions.length > 0) {
                                    total_deductions = PHP(item.deductions[0].total_deductions)
                                        .format();
                                }

                                if (item.discount_type === "Fixed") {
                                    discountType = item.discount_type;
                                    dollarAmountofDisountTotal = item.discount_total;
                                } else if (item.discount_type === "Percentage") {
                                    5
                                    discountType = item.discount_type + " (" + item
                                        .discount_amount + "%)";
                                    dollarAmountofDisountTotal = (item.discount_total * item
                                        .peso_rate) ? (item
                                        .discount_total * item.peso_rate) : "0.00";
                                }

                                let newRow = table.row.add([
                                    item.id,
                                    item.invoice_no,
                                    item.profile.user.first_name + " " + item.profile.user
                                    .last_name,
                                    item.invoice_status,
                                    item.profile.position,
                                    discountType,
                                    PHP(dollarAmountofDisountTotal).format(),
                                    total_deductions ? total_deductions : "0.00",
                                    // PHP(item.converted_amount).format(),
                                    Number(parseFloat(item.sub_total).toFixed(2))
                                    .toLocaleString(
                                        'en-US', {
                                            style: 'currency',
                                            currency: 'USD'
                                        }),
                                    moment.utc(item.created_at).tz('Asia/Manila').format(
                                        'YYYY/MM/DD'),
                                    moment.utc(item.due_date).tz('Asia/Manila').format(
                                        'YYYY/MM/DD'),
                                    // moment(item.due_date).format("L"),
                                ]).draw().node();
                                // add class to invoice status cell based on its value
                                let invoiceStatusCell = $(newRow).find("td:eq(2)");
                                if (item.invoice_status == "Paid") {
                                    invoiceStatusCell.css("background-color", "#198754");
                                    // invoiceStatusCell.css("border-color", "#198754");
                                    invoiceStatusCell.css("color", "white");
                                } else if (item.invoice_status == "Pending") {
                                    invoiceStatusCell.css("background-color", "#ffc107");
                                    // invoiceStatusCell.css("border-color", "#ffc107");
                                    invoiceStatusCell.css("color", "black");
                                } else {
                                    invoiceStatusCell.css("background-color", "#dc3545");
                                    // invoiceStatusCell.css("border-color", "#dc3545");
                                    invoiceStatusCell.css("color", "white");
                                }

                            })
                        }
                    }
                }).catch(function(error) {
                    console.log("error", error);
                    if (error.response.data.errors) {
                        let errors = error.response.data.errors;
                        let fieldnames = Object.keys(errors);
                        Object.values(errors).map((item, index) => {
                            fieldname = fieldnames[0].split('_');
                            fieldname.map((item2, index2) => {
                                fieldname['key'] = capitalize(item2);
                                return ""
                            });
                            fieldname = fieldname.join(" ");
                            $('.toast1 .toast-title').html("Invoice Report");
                            $('.toast1 .toast-body').html(Object.values(errors)[
                                    0]
                                .join(
                                    "\n\r"));
                        })
                        toast1.toast('show');
                    }
                });
            }

            function show_data_load() {

                axios.get(apiUrl + '/api/userReports/userInvoiceReport_load', {
                    headers: {
                        Authorization: token,
                    },
                }).then(function(response) {
                    let data = response.data;
                    if (data.success) {
                        let table = $('#invoiceReports').DataTable();
                        table.clear().draw();
                        if (data.data.length > 0) {
                            console.log("success invoice", data);
                            data.data.map((item) => {
                                let total_deductions = 0;
                                let discountType = item.discount_type ? item.discount_type : "N/A";
                                let dollarAmountofDisountTotal = 0;

                                if (item.deductions.length > 0) {
                                    total_deductions = PHP(item.deductions[0].total_deductions)
                                        .format();
                                }

                                if (item.discount_type === "Fixed") {
                                    discountType = item.discount_type;
                                    dollarAmountofDisountTotal = item.discount_total;
                                } else if (item.discount_type === "Percentage") {
                                    discountType = item.discount_type + " (" + item
                                        .discount_amount + "%)";
                                    dollarAmountofDisountTotal = (item.discount_total * item
                                        .peso_rate) ? (item
                                        .discount_total * item.peso_rate) : "0.00";
                                }


                                let newRow = table.row.add([
                                    item.id,
                                    item.invoice_no,
                                    item.profile.user.first_name + " " + item.profile.user
                                    .last_name,
                                    item.invoice_status,
                                    item.profile.position,
                                    discountType,
                                    PHP(dollarAmountofDisountTotal).format(),
                                    total_deductions ? total_deductions : "0.00",
                                    // PHP(item.converted_amount).format(),
                                    Number(parseFloat(item.sub_total).toFixed(2))
                                    .toLocaleString(
                                        'en-US', {
                                            style: 'currency',
                                            currency: 'USD'
                                        }),
                                    moment.utc(item.created_at).tz('Asia/Manila').format(
                                        'YYYY/MM/DD'),
                                    moment.utc(item.due_date).tz('Asia/Manila').format(
                                        'YYYY/MM/DD'),
                                    // moment(item.due_date).format("L"),
                                ]).draw().node();
                                // add class to invoice status cell based on its value
                                let invoiceStatusCell = $(newRow).find("td:eq(2)");
                                if (item.invoice_status == "Paid") {
                                    invoiceStatusCell.css("background-color", "#198754");
                                    // invoiceStatusCell.css("border-color", "#198754");
                                    invoiceStatusCell.css("color", "white");
                                } else if (item.invoice_status == "Pending") {
                                    invoiceStatusCell.css("background-color", "#ffc107");
                                    // invoiceStatusCell.css("border-color", "#ffc107");
                                    invoiceStatusCell.css("color", "black");
                                } else {
                                    invoiceStatusCell.css("background-color", "#dc3545");
                                    // invoiceStatusCell.css("border-color", "#dc3545");
                                    invoiceStatusCell.css("color", "white");
                                }
                            })
                        }
                    }
                }).catch(function(error) {
                    console.log("error", error);
                });
            }

            function capitalize(s) {
                if (typeof s !== 'string') return "";
                return s.charAt(0).toUpperCase() + s.slice(1);
            }
        })
    </script>
@endsection
