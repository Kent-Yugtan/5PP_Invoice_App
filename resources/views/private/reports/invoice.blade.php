@extends('layouts.private')
@section('content-dashboard')
<div class="container-fluid px-4" id="loader_load">
  <ol class="breadcrumb mb-3"></ol>

  <div class="card shadow p-2 mb-1 bg-white rounded">
    <div class="card-header">
      <h1 class="mt-0"><i class="fas fa-file-invoice"></i> Invoice Reports</h1>
    </div>
  </div>

  <div class="row pb-4">
    <div class="col-sm-12 col-md-12 col-lg-12 mb-1">
      <div class="card shadow p-2 mb-1 bg-white rounded" style="height:100%">
        <div class="input-group">
          <div class="form-floating me-3" style="width:20%">
            <input type="text" onblur="(this.type='text')" style="height:50px" class="form-control" id="from" placeholder="Date Filter From">
            <label for="from">Date Filter From</label>
          </div>

          <div class="form-floating me-3" style="width:20%">
            <input type="text" onblur="(this.type='text')" style="height:50px" class="form-control" id="to" placeholder="Date Filter To">
            <label for="to">Date Filter To</label>
          </div>
          <button type="button" class="btn" style=" color:white; background-color: #CF8029;width:20%;height:50px" id="button-submit">Filter</button>
        </div>
      </div>
    </div>

    <div class="col-md-12 col-md-12 col-lg-12">
      <div class="card shadow p-2 mb-1 bg-white rounded" style="height:100%">
        <div class="card-body table-responsive">
          <table id="invoiceReports" style="font-size: 14px;" width="100%" class="display table table-hover">
            <thead>
            </thead>
            <tbody>
            </tbody>
            <tfoot>
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
                <th></th>
              </tr>
            </tfoot>
          </table>
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

        var grossAmount = api
          .column(8, {
            page: 'current'
          })
          .data()
          .reduce(function(a, b) {
            return intVal(a) + intVal(b);
          }, 0);

        var netAmount = api
          .column(9, {
            page: 'current'
          })
          .data()
          .reduce(function(a, b) {
            return intVal(a) + intVal(b);
          }, 0);

        // Update the footer with the calculated values
        $(api.column(1).footer()).html('Total');
        $(api.column(6).footer()).html(PHP(discountAmount).format());
        $(api.column(7).footer()).html(PHP(deductionAmount).format());
        $(api.column(8).footer()).html(PHP(grossAmount).format());
        $(api.column(9).footer()).html(PHP(netAmount).format());

      },
      responsive: true,
      // dom: 'Bfrtip',
      dom: 'lBfrtip',
      // pagingType: 'full_numbers',
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
            columns: [1, 2, 3, 5, 6, 7, 8, 9, 10, 11]
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
            columns: [1, 2, 3, 5, 6, 7, 8, 9, 10, 11]
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
                var valueNode = cell.children('v');
                valueNode.text(PHP(value).format());
                valueNode[0].childNodes[0].nodeValue = PHP(value).format(); // Update existing cell value
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
          title: 'Invoice Reports',
          footer: true,
          exportOptions: {
            modifier: {
              order: 'index',
              page: 'current',
              search: 'applied'
            },
            columns: [1, 2, 3, 5, 6, 7, 8, 9, 10, 11]
          }, // export only current page
          customize: function(doc) {
            //   var col1 = '';
            doc.content[1].table.body.forEach(function(row, rowIndex) {
              if (rowIndex > 0) { // Exclude first row
                row.forEach(function(cell, cellIndex) {
                  if (cellIndex >= 5 && cellIndex <= 8) { // Columns 5, 6, 7, 8
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
            columns: [1, 2, 3, 5, 6, 7, 8, 9, 10, 11]
          }, // export only current page
          autoPrint: false, // disable print dialog
          customize: function(doc) {
            $(doc.document.body).find('table').addClass('display').css('font-size', '12px');
            $(doc.document.body).find('tr:nth-child(odd) td').each(function(index) {
              $(this).css('background-color', '#D0D0D0');
            });
            $(doc.document.body).find('h1').html('<h2> <center>Invoice Reports </h2 > ');
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
          "title": "Invoice #"
        },
        {
          "title": "Profile Name"
        },
        {
          "title": "Status"
        },
        {
          "title": "Position"
        },
        {
          "title": "Discount Type"
        },
        {
          "title": "Discount Amount"
        },
        {
          "title": "Deductions Amount"
        },
        {
          "title": "Gross Amount"
        },
        {
          "title": "Net Amount"
        },
        {
          "title": "Date Created"
        },
        {
          "title": "Due Date"
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
          targets: [6, 7, 8, 9],
          className: 'text-end'
        },
        {
          targets: [10, 11],
          className: 'text-center'
        },
      ],

    });

    $(window).on('load', function() {
      $('div.spanner').addClass('show');

      $('html, body').animate({
        scrollTop: $('#sb-nav-fixed').offset.top
      }, 'smooth');

      setTimeout(function() {
        $("div.spanner").removeClass("show");


        show_data_load()
        from();
        to();
      }, 1500);
    })


    dataTable.buttons().container()
      .appendTo($('.col-sm-12:eq(0)', dataTable.table().container()));



    function from() {
      // START OF THIS CODE FORMAT DATE FROM dd/mm/yyyy to yyyy/mm/dd
      // Get the input field
      var dateInput = $("#from");
      // Set the datepicker options
      dateInput.datepicker({
        dateFormat: "yy/mm/dd",
        onSelect: function(dateText, inst) {
          // Update the input value with the selected date
          dateInput.val(dateText);
        }
      });
      // Set the input value to the current system date in the specified format
      // var currentDate = $.datepicker.formatDate("yy/mm/dd", new Date());
      // dateInput.val(currentDate);
      // END OF THIS CODE FORMAT DATE FROM dd/mm/yyyy to yyyy/mm/dd
    }

    function to() {
      // START OF THIS CODE FORMAT DATE FROM dd/mm/yyyy to yyyy/mm/dd
      // Get the input field
      var dateInput = $("#to");
      // Set the datepicker options
      dateInput.datepicker({
        dateFormat: "yy/mm/dd",
        onSelect: function(dateText, inst) {
          // Update the input value with the selected date
          dateInput.val(dateText);
        }
      });
      // Set the input value to the current system date in the specified format
      // var currentDate = $.datepicker.formatDate("yy/mm/dd", new Date());
      // dateInput.val(currentDate);
      // END OF THIS CODE FORMAT DATE FROM dd/mm/yyyy to yyyy/mm/dd
    }

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
        $("div.spanner").removeClass("show");


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
      axios.get(`${apiUrl}/api/reports/invoiceReport_click?${new URLSearchParams(filter)}`, {
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
              let discountType = item.discount_type ? item.discount_type : "N/A";
              let dollarAmountofDisountTotal = 0;

              if (item.deductions.length > 0) {
                total_deductions = PHP(item.deductions[0].total_deductions).format();
              }

              if (item.discount_type === "Fixed") {
                discountType = item.discount_type;
                dollarAmountofDisountTotal = item.discount_total;
              } else if (item.discount_type === "Percentage") {
                discountType = item.discount_type + " (" + item.discount_amount + "%)";
                dollarAmountofDisountTotal = (item.discount_total * item.peso_rate) ? (item
                  .discount_total * item.peso_rate) : "0.00";
              }


              let newRow = table.row.add([
                item.id,
                item.invoice_no,
                item.profile.user.first_name + " " + item.profile.user.last_name,
                item.invoice_status,
                item.profile.position,
                discountType,
                PHP(dollarAmountofDisountTotal).format(),
                total_deductions ? total_deductions : "0.00",
                PHP(item.converted_amount).format(),
                PHP(item.grand_total_amount).format(),

                moment.utc(item.created_at).tz('Asia/Manila').format('YYYY/MM/DD'),
                moment.utc(item.due_date).tz('Asia/Manila').format('YYYY/MM/DD'),
              ]).draw().node();
              // add class to invoice status cell based on its value
              let invoiceStatusCell = $(newRow).find("td:eq(2)");
              if (item.invoice_status == "Paid") {
                invoiceStatusCell.css("background-color", "#198754");
                invoiceStatusCell.css("border-color", "#198754");
                invoiceStatusCell.css("color", "white");
              } else if (item.invoice_status == "Pending") {
                invoiceStatusCell.css("background-color", "#ffc107");
                invoiceStatusCell.css("border-color", "#ffc107");
                invoiceStatusCell.css("color", "black");
              } else {
                invoiceStatusCell.css("background-color", "#dc3545");
                invoiceStatusCell.css("border-color", "#dc3545");
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
            $('.toast1 .toast-title').html("Invoice Reports");
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
      axios.get(apiUrl + '/api/reports/invoiceReport_load', {
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
              let discountType = item.discount_type ? item.discount_type : "N/A";
              let dollarAmountofDisountTotal = 0;

              if (item.deductions.length > 0) {
                total_deductions = PHP(item.deductions[0].total_deductions).format();
              }

              if (item.discount_type === "Fixed") {
                discountType = item.discount_type;
                dollarAmountofDisountTotal = item.discount_total;
              } else if (item.discount_type === "Percentage") {
                discountType = item.discount_type + " (" + item.discount_amount + "%)";
                dollarAmountofDisountTotal = (item.discount_total * item.peso_rate) ? (item
                  .discount_total * item.peso_rate) : "0.00";
              }


              let newRow = table.row.add([
                item.id,
                item.invoice_no,
                item.profile.user.first_name + " " + item.profile.user.last_name,
                item.invoice_status,
                item.profile.position,
                discountType,
                PHP(dollarAmountofDisountTotal).format(),
                total_deductions ? total_deductions : "0.00",
                PHP(item.converted_amount).format(),
                PHP(item.grand_total_amount).format(),
                moment.utc(item.created_at).tz('Asia/Manila').format('YYYY/MM/DD'),
                moment.utc(item.due_date).tz('Asia/Manila').format('YYYY/MM/DD'),
                // moment(item.due_date).format("L"),
              ]).draw().node();
              // add class to invoice status cell based on its value
              let invoiceStatusCell = $(newRow).find("td:eq(2)");
              if (item.invoice_status == "Paid") {
                invoiceStatusCell.css("background-color", "#198754");
                invoiceStatusCell.css("border-color", "#198754");
                invoiceStatusCell.css("color", "white");
              } else if (item.invoice_status == "Pending") {
                invoiceStatusCell.css("background-color", "#ffc107");
                invoiceStatusCell.css("border-color", "#ffc107");
                invoiceStatusCell.css("color", "black");
              } else {
                invoiceStatusCell.css("background-color", "#dc3545");
                invoiceStatusCell.css("border-color", "#dc3545");
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