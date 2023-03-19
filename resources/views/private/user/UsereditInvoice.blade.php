@extends('layouts.user')
@section('content-dashboard')
<div class="container-fluid px-4">
  <h1 class="mt-0">Edit Invoice</h1>
  <ol class="breadcrumb mb-3"></ol>
  <div class="row">
    <div class="col-6 px-2 w-75">
      <div class="card shadow px-5 p-2 bg-white rounded " style="width: 100%; height:90%; ">
        <div class="row">
          <div class="col-6 pt-5  fw-bolder">
            <div id="user_fullname"></div>
            <div class="pt-3" id="user_email"></div>
          </div>
          <div class="col-6 pt-5  fw-bolder " style="text-align:end">
            <h2> INVOICES </h2>
            <div class="text-muted" id="user_invoice_no"></div>
          </div>
        </div>

        <div class="row pt-3">
          <div class="col-6">
            <div id="user_address"></div>
            <div id="user_city-province"></div>
            <div id="user_zip_code"></div>
          </div>
        </div>

        <div class="row pt-3">
          <div class="col-6 ">
            <span class="text-muted"> Bill To:</span>
          </div>

          <div class="col-3" style="text-align: right;">
            <span class="text-muted"> Date: </span>
          </div>

          <div class="col-3 " style="text-align: right;">
            <div id="user_date_created"></div>
          </div>
        </div>

        <div class="row">
          <div class="col-6 ">
            <span> (5Ppints Production) </span>
          </div>

          <div class="col-3" style="text-align: right;">
            <span class="text-muted"> Due Date: </span>
          </div>

          <div class="col-3" style="text-align: right;">
            TO BE ASK
          </div>
        </div>

        <div class="row">
          <div class="col-6 ">
            <span>(5ppints@gmail.com)</span>
          </div>

        </div>

        <div class="row pt-3">
          <div class="col-4">
            <span>
              (4094 South Power Road
              Suite 103-197
              Mesa, AZ 85212)
            </span>
          </div>
          <div class="col-2"></div>
          <div class="col-6">
            <div class="rounded-3" style="height:50px;background-color:#A4A6B3;display:flex;align-items:center">
              <div class="col-6" style="text-align: right;">
                <h5>
                  <span>
                    Balance Due:
                  </span>
                </h5>
              </div>

              <div class="col-6" style="text-align: right;">
                <h5>
                  <span class="me-3">$100.00</span>
                </h5>
              </div>
            </div>
          </div>
        </div>

        <div class="row pt-3">
          <div class="col-12 table-responsive">
            <table class="table">
              <thead class="thead-dark" style="border-radius:5px;background-color: black;color:white">
                <tr>

                  <th class="scope">Description</th>
                  <th class="scope" style="text-align:end">Quantity</th>
                  <th class="scope" style="text-align:end">Rate</th>
                  <th class="scope" style="text-align:end">Amount</th>
                </tr>
              </thead>
              <tbody class="px-3">
                <tr>
                  <td class="scope">Joshua Payment for 12/09/2022 </td>
                  <td class="scope" style="text-align:end">1</td>
                  <td class="scope" style="text-align:end">$100.00</td>
                  <td class="scope" style="text-align:end">$100.00</td>
                </tr>
                <tr>
                  <td class="scope"> Joshua Payment for 12/09/2022 </td>
                  <td class="scope" style="text-align:end">1</td>
                  <td class="scope" style="text-align:end">$100.00</td>
                  <td class="scope" style="text-align:end">$100.00</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
        <div class="row">
          <div class="col mx-3">
          </div>
          <div class="col-md-auto">
            <medium> Subtotal: </medium>
          </div>
          <div class="col col-lg-2 mx-3 h6" style="text-align:end">
            100$
          </div>
        </div>
        <div class=" row">
          <div class="col mx-3">

          </div>
          <div class="col-md-auto">
            <medium> Subtotal PHP: </medium>
          </div>
          <div class="col col-lg-2 mx-3 h6" style="text-align:end">
            P5602.00
          </div>

        </div>

        <div class=" row">
          <div class="col mx-3">
          </div>
          <div class="col-md-auto">
            <h5> Deductions </h5>
          </div>
          <div class="col col-lg-2 mx-3" style="text-align:end">
          </div>
        </div>
        <div class="row">
          <div class="col mx-3">

          </div>
          <div class="col-md-auto">
            <small class="text-muted"> SSS </small>
          </div>
          <div class="col col-lg-2 mx-3 h6" style="text-align:end;color:red;">
            P-200
          </div>
        </div>
        <div class="row">
          <div class="col mx-3">
          </div>
          <div class="col-md-auto">
            <small class="text-muted"> Phil-Health </small>
          </div>
          <div class="col col-lg-2 mx-3 h6" style="text-align:end;color:red;">
            P-100
          </div>
        </div>
        <div class="row">
          <div class="col mx-3">
          </div>
          <div class="col-md-auto">
            <small class="text-muted"> Pag-ibig </small>
          </div>
          <div class="col col-lg-2 mx-3 h6" style="text-align:end;color:red;">
            P-100
          </div>
        </div> <br><br><br><br>
        <div class=" row">
          <div class="col mx-3">
          </div>
          <div class="col-md-auto">
            <h4> Grand Total </h4>
          </div>
          <div class="col col-lg-2 mx-3" style="text-align:end">
          </div>
        </div>
        <div class=" row " style="margin-bottom:300px">
          <div class="col mx-3">
          </div>
          <div class="col-md-auto">
            <medium class="h6"> Total: </medium>
          </div>
          <div class="col col-lg-2 mx-3 h6" style="text-align:end ">
            P5202.00
          </div>
        </div>

      </div>
    </div>

    <div class="col-6 px-2 w-25">
      <div class="card shadow p-2 mb-5 bg-white rounded pt-10" style="width: 100%; height:35%">
        <!-- <div class="card-header">Profile Information</div> -->
        <div class="row">
          <div class="col g-5">
            <div class="pb-1 pt-3">
              <button type="button" class="btn btn-secondary w-100" style=" color:White; background-color:green; ">Paid
                Invoice</button>
            </div>
            <div>
              <button type="button" class="btn btn-secondary w-100" style=" color:White; background-color:gray; ">Cancel
                Invoice</button>
            </div>
            <div class="pt-1">
              <button type="button" class="btn btn-secondary w-100" style=" color:White; background-color:red; ">Delete
                Invoice</button>
            </div>
          </div>
        </div>

        <div class="row ">
          <div class="col g-5">
            <div class="pb-1">
              <button type="button" class="btn btn-secondary w-100" style=" color:White; background-color:#CF8029; ">Download</button>
            </div>
            <div>
              <button type="button" class="btn btn-secondary w-100" style=" color:White; background-color:#CF8029; ">Edit Invoice</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


@endsection