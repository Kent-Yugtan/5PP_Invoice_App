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
                <div id='notifyIcon'></div>
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
                $("div.spanner").removeClass("show");
                show_data_load()
            }, 1500);

            var path = window.location.pathname;
            var segments = path.split('/');
            $('#' + segments[1] + segments[2]).addClass('active');
            // console.log("SEGMENT", segments[1] + segments[2]);

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

                    //computing column Total of the current page only
                    var StillProccessing = api
                        .column(5, {
                            page: 'current'
                        })
                        .data()
                        .reduce(function(a, b) {
                            return intVal(a) + intVal(b);
                        }, 0);

                    var Processed = api
                        .column(6, {
                            page: 'current'
                        })
                        .data()
                        .reduce(function(a, b) {
                            return intVal(a) + intVal(b);
                        }, 0);


                    $(api.column(1).footer()).html('Total');
                    $(api.column(5).footer()).html(Number(
                            parseFloat(StillProccessing).toFixed(2))
                        .toLocaleString(
                            'en-US', {
                                style: 'currency',
                                currency: 'USD'
                            }));

                    $(api.column(6).footer()).html(Number(
                            parseFloat(Processed).toFixed(2))
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
                            columns: [1, 2, 3, 5, 6, 7]
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
                            columns: [1, 2, 3, 5, 6, 7]
                        },
                        footer: true,
                        customize: function(xlsx) {
                            var sheet = xlsx.xl.worksheets['sheet1.xml'];
                            var lastRow = $('row', sheet).last();

                            lastRow.children('c').each(function(index) {
                                var cell = $(this);
                                if (index >= 5 && index <= 7) {
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
                            columns: [1, 2, 3, 5, 6, 7]
                        },
                        // export only current page
                        customize: function(doc) {
                            //   var col1 = '';
                            doc.content[1].table.body.forEach(function(row, rowIndex) {
                                if (rowIndex > 0) { // Exclude first row
                                    row.forEach(function(cell, cellIndex) {
                                        if (cellIndex >= 5 && cellIndex <=
                                            7) { // Columns 5, 6, 7, 8
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
                            columns: [1, 2, 3, 5, 6, 7]
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
                        "title": "Date",
                        "className": "fit"
                    },
                    {
                        "title": "Invoice #",
                        "className": "fit"
                    },
                    {
                        "title": "Description",
                        "className": "fit"
                    },
                    {
                        "title": "Status",
                        "className": "fit"
                    },
                    {
                        "title": "Still Processing",
                        "className": "fit text-end"
                    },
                    {
                        "title": "Processed",
                        "className": "fit"
                    },
                    {
                        "title": "Running Balance",
                        "className": "fit"
                    },

                ],
                order: [
                    [1, 'asc']
                ],
                "columnDefs": [{
                        orderable: false,
                        targets: [0, 1, 2, 3, 4, 5, 6, 7]
                    }, // Disable sorting for columns 0, 2, 3, 4 , 5 ,6, and 7
                    {
                        targets: [0],
                        visible: false,
                        searchable: false,
                    },
                    {
                        targets: [5, 6, 7],
                        className: 'text-end'
                    },
                    {
                        targets: [4],
                        className: 'text-center'
                    },
                ],

            });

            dataTable.buttons().container()
                .appendTo($('.col-sm-12:eq(0)', dataTable.table().container()));


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
                var originalText = $('#button-submit').html();
                $('#button-submit').html(
                    `<span id="button-spinner" class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...`
                );
                $('div.spanner').addClass('show');
                setTimeout(function() {
                    $('#button-submit').html(originalText);
                    $("div.spanner").removeClass("show");
                    show_data_click();
                }, 1500);

            });

            function show_data_click(filters) {
                let from = $('#from').val();
                let to = $('#to').val();

                let filter = {
                    fromDate: from ? from : '',
                    toDate: to ? to : '',
                    ...filters
                }
                axios.get(`${apiUrl}/api/reports/soa_click?${new URLSearchParams(filter)}`, {
                    headers: {
                        Authorization: token,
                    },
                }).then(function(response) {
                    let data = response.data;
                    if (data.success) {
                        let table = $('#invoiceReports').DataTable();
                        table.clear().draw();
                        if (data.data.length > 0) {
                            console.log("success", data);
                            data.data.map((item) => {
                                let total_deductions = 0;
                                let discountType = item.discount_type ? item.discount_type :
                                    "N/A";
                                let dollarAmountofDisountTotal = 0;

                                if (item.deductions.length > 0) {
                                    total_deductions = PHP(item.deductions[0]
                                            .total_deductions)
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

                                let paidAmount =
                                    0; // Variable to store the sum of paid amounts

                                let newRow = table.row.add([
                                    item.id,
                                    moment.utc(item.created_at).tz('Asia/Manila')
                                    .format(
                                        'YYYY/MM/DD'),
                                    item.invoice_no,
                                    item.description,
                                    item.invoice_status,
                                    (item.invoice_status !== "Paid") ?
                                    // If invoice_status is not "Paid"
                                    Number(parseFloat(item.sub_total).toFixed(2))
                                    .toLocaleString('en-US', {
                                        style: 'currency',
                                        currency: 'USD'
                                    }) :
                                    '0.00',
                                    (item.invoice_status === "Paid") ?
                                    // If invoice_status is "Paid"
                                    Number(parseFloat(item.sub_total).toFixed(2))
                                    .toLocaleString('en-US', {
                                        style: 'currency',
                                        currency: 'USD'
                                    }) :
                                    '0.00',
                                    null
                                ]).draw().node();



                                // Update the running balance for each row
                                table.rows().every(function() {
                                    let data = this.data();
                                    if (data[4] ===
                                        "Paid") { // Check the status column
                                        paidAmount += parseFloat(data[6].replace(
                                            /[^0-9.-]+/g, ""
                                        )); // Add the amount to the running balance
                                    }
                                    if (data[4] !==
                                        "Paid") { // Check the status column
                                        data[7] =
                                            '0.00'; // Set the last column to '0.00' for non-paid rows
                                    } else {
                                        data[7] = Number(paidAmount.toFixed(2))
                                            .toLocaleString('en-US', {
                                                style: 'currency',
                                                currency: 'USD'
                                            }); // Update the last column with the running balance for paid rows
                                    }
                                    this.data(data); // Update the row data
                                });

                                // Redraw the table to reflect the updated running balance
                                table.draw();

                                // Redraw the table to reflect the updated running balance
                                table.draw();

                                // add class to invoice status cell based on its value
                                let invoiceStatusCell = $(newRow).find("td:eq(3)");
                                if (item.invoice_status == "Paid") {
                                    invoiceStatusCell.css("background-color", "#198754");
                                    // invoiceStatusCell.css("border-color", "#198754");
                                    invoiceStatusCell.css("color", "white");
                                } else if (item.invoice_status == "Pending") {
                                    invoiceStatusCell.css("background-color", "#ffc107");
                                    // invoiceStatusCell.css("border-color", "#ffc107");
                                    invoiceStatusCell.css("color", "black");
                                } else if (item.invoice_status == "Cancelled") {
                                    invoiceStatusCell.css("background-color", "#A4A6B3");
                                    // invoiceStatusCell.css("border-color", "#A4A6B3");
                                    invoiceStatusCell.css("color", "white");
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
                            $('#notifyIcon').html(
                                '<i class="fa-solid fa-x" style="color:#dc3545"></i>');
                            $('.toast1 .toast-title').html('Error');
                            $('.toast1 .toast-body').html(Object.values(errors)[
                                    0]
                                .join(
                                    "\n\r"));
                        })
                        toast1.toast('show');
                        setTimeout(function() {
                            location.reload(true);
                        }, 1500);
                    }
                });
            }

            function show_data_load() {
                axios.get(apiUrl + '/api/reports/soa', {
                    headers: {
                        Authorization: token,
                    },
                }).then(function(response) {
                    let data = response.data;
                    if (data.success) {
                        let table = $('#invoiceReports').DataTable();
                        table.clear().draw();
                        if (data.data.length > 0) {
                            console.log("success", data);
                            data.data.map((item) => {
                                let total_deductions = 0;
                                let discountType = item.discount_type ? item.discount_type :
                                    "N/A";
                                let dollarAmountofDisountTotal = 0;

                                if (item.deductions.length > 0) {
                                    total_deductions = PHP(item.deductions[0]
                                            .total_deductions)
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

                                let paidAmount =
                                    0; // Variable to store the sum of paid amounts

                                let newRow = table.row.add([
                                    item.id,
                                    moment.utc(item.created_at).tz('Asia/Manila')
                                    .format(
                                        'YYYY/MM/DD'),
                                    item.invoice_no,
                                    item.description,
                                    item.invoice_status,
                                    (item.invoice_status !== "Paid") ?
                                    // If invoice_status is not "Paid"
                                    Number(parseFloat(item.sub_total).toFixed(2))
                                    .toLocaleString('en-US', {
                                        style: 'currency',
                                        currency: 'USD'
                                    }) :
                                    '0.00',
                                    (item.invoice_status === "Paid") ?
                                    // If invoice_status is "Paid"
                                    Number(parseFloat(item.sub_total).toFixed(2))
                                    .toLocaleString('en-US', {
                                        style: 'currency',
                                        currency: 'USD'
                                    }) :
                                    '0.00',
                                    null
                                ]).draw().node();



                                // Update the running balance for each row
                                table.rows().every(function() {
                                    let data = this.data();
                                    if (data[4] ===
                                        "Paid") { // Check the status column
                                        paidAmount += parseFloat(data[6].replace(
                                            /[^0-9.-]+/g, ""
                                        )); // Add the amount to the running balance
                                    }
                                    if (data[4] !==
                                        "Paid") { // Check the status column
                                        data[7] =
                                            '0.00'; // Set the last column to '0.00' for non-paid rows
                                    } else {
                                        data[7] = Number(paidAmount.toFixed(2))
                                            .toLocaleString('en-US', {
                                                style: 'currency',
                                                currency: 'USD'
                                            }); // Update the last column with the running balance for paid rows
                                    }
                                    this.data(data); // Update the row data
                                });

                                // Redraw the table to reflect the updated running balance
                                table.draw();

                                // Redraw the table to reflect the updated running balance
                                table.draw();

                                // add class to invoice status cell based on its value
                                let invoiceStatusCell = $(newRow).find("td:eq(3)");
                                if (item.invoice_status == "Paid") {
                                    invoiceStatusCell.css("background-color", "#198754");
                                    // invoiceStatusCell.css("border-color", "#198754");
                                    invoiceStatusCell.css("color", "white");
                                } else if (item.invoice_status == "Pending") {
                                    invoiceStatusCell.css("background-color", "#ffc107");
                                    // invoiceStatusCell.css("border-color", "#ffc107");
                                    invoiceStatusCell.css("color", "black");
                                } else if (item.invoice_status == "Cancelled") {
                                    invoiceStatusCell.css("background-color", "#A4A6B3");
                                    // invoiceStatusCell.css("border-color", "#A4A6B3");
                                    invoiceStatusCell.css("color", "white");
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
