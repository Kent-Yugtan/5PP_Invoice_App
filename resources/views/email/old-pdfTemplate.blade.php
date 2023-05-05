<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('/assets/css/styles.css') }}" rel="stylesheet">
    <title>Send Email</title>
    {{-- 
    <style>
        .containerPDF {
            padding: 5px;
        }

        .email {
            max-height: 800em;
            /* width: 100%; */
            padding-right: var(--bs-gutter-x, 0.75rem);
            padding-left: var(--bs-gutter-x, 0.75rem);
            margin-right: auto;
            margin-left: auto;

            border-radius: 10px;
            /* border-top: #d74034 2px solid;
            border-bottom: #d74034 2px solid; */
            box-shadow: 0 2px 18px rgba(0, 0, 0, 0.2);
            font-family: Arial, Helvetica, sans-serif;
            /*
             max-height: 800em;
            max-width: 750px;
            margin: 1rem auto;
            border-radius: 10px;
            border-top: #d74034 2px solid;
            border-bottom: #d74034 2px solid;
            box-shadow: 0 2px 18px rgba(0, 0, 0, 0.2);
            padding: 1.5rem;
            font-family: Arial, Helvetica, sans-serif;
            */
        }

        .email .email-head {
            /* border-bottom: 1px solid rgba(0, 0, 0, 0.2); */
            padding-bottom: 1rem;
        }

        .email .email-head .head-img {
            max-width: 50px;
            display: block;
            margin: 0 auto;
        }

        .email-body .body-text {
            /* padding: 0 0 1rem; */
            text-align: center;
            font-size: 0.5rem;
            /* border-bottom: 1px solid rgba(0, 0, 0, 0.2); */
            padding-bottom: 1rem;
        }

        .email-body .body-text.bottom-text {
            /* padding: 2rem 0 1rem; */
            text-align: center;
            font-size: 0.8rem;
        }

        .email-body .body-text .body-greeting {
            font-weight: bold;
            margin-bottom: 1rem;
        }

        .email-body .body-table {
            text-align: left;
        }

        .email-body .body-table table {
            width: 100%;
            font-size: 1rem;
        }

        .email-body .body-table table .total {
            background-color: hsla(4, 67%, 52%, 0.12);
            border-radius: 0.3rem;
            padding: 10px;
            color: #d74034;
        }

        .email-body .body-table table .item {
            border-radius: 0.3rem;
            /* border: 1px solid #006; */
            color: black;
        }

        .email-body .body-table table th,
        .email-body .body-table table td {
            padding: 3px;
            /* border: 1px solid #006; */
            /* TABLE TD BORDER */
        }

        .email-body .body-table table tr td:last-child {
            text-align: right;
        }

        .email-body .body-table table tr th:last-child {
            text-align: right;
        }

        .email-body .body-table table tr:last-child th:first-child {
            border-radius: 0.3rem 0 0 0.3rem;
        }

        .email-body .body-table table tr:last-child th:last-child {
            border-radius: 0 0.3rem 0.3rem 0;
        }

        .email-footer {
            /* border-top: 1px solid rgba(0, 0, 0, 0.2); */
        }

        .email-footer .footer-text {
            font-size: 0.8rem;
            text-align: center;
            padding-top: 1rem;
        }

        .email-footer .footer-text a {
            color: #d74034;
        }

        .left-radius {
            border-radius: 0px 0.3rem 0.3rem 0px;
            border-radius: 0.3rem 0 0 0.3rem;
            /* border-radius: 8px 0px 0px 8px; */
        }

        .right-radius {
            border-radius: 0.3rem 0px 0px 0.3rem;
            border-radius: 0px 0.3rem 0.3rem 0px;
            /* border-radius: 8px 0px 0px 8px; */
        }

        .email .email-body .body-text .body-table .table3 {
            /* border-bottom: 1px solid rgba(0, 0, 0, 0.2); */
            padding-bottom: 1rem;
        }

        /* .email .email-body .body-text .body-table .table2, */
        .email .email-body .body-text .body-table .table2 tbody tr td {
            /* border-bottom: 1px solid rgba(0, 0, 0, 0.2);
          padding-bottom: 1rem; */
        }

        .email-body .body-text .body-table table tbody tr td a {
            color: black;
            text-decoration: none !important;
        }
    </style> --}}

    {{-- <style>
        .containerPDF {
            padding: 5px;
        }

        .email {
            height: 100%;
            width: 100%;
            margin: 1rem auto;
            border-radius: 10px;
            /* border-top: #d74034 2px solid; */
            /* border-bottom: #d74034 2px solid; */
            box-shadow: 0 2px 18px rgba(0, 0, 0, 0.2);
            padding: 1.5rem;
            font-family: Arial, Helvetica, sans-serif;
        }

        .email .email-head {
            /* border-bottom: 1px solid rgba(0, 0, 0, 0.2); */
            /* padding-bottom: 1rem; */
        }

        .email .email-head .head-img {
            max-width: 50px;
            display: block;
            margin: 0 auto;
        }

        .email-body .body-text {
            /* padding: 0 0 1rem; */
            text-align: center;
            /* font-size: 1.15rem; */
        }

        .email-body .body-text.bottom-text {
            /* padding: 2rem 0 1rem; */
            text-align: center;
            /* font-size: 0.8rem; */
        }

        .email-body .body-text .body-greeting {
            font-weight: bold;
            margin-bottom: 1rem;
        }

        .email-body .body-table {
            text-align: left;
        }

        .email-body .body-table table {
            width: 100%;
            font-size: 1rem;
        }

        .email-body .body-table table .total {
            background-color: hsla(4, 67%, 52%, 0.12);
            border-radius: 0.3rem;
            padding: 10px;
            color: #d74034;
        }

        .email-body .body-table table .item {
            border-radius: 0.3rem;
            /* border: 1px solid #006; */
            color: black;
        }

        .email-body .body-table table th,
        .email-body .body-table table td {
            padding: 3px 0px 3px 0px;
            /* border: 1px solid #006; */
            /* TABLE TD BORDER */
        }

        .email-body .body-table table tr td:last-child {
            text-align: right;
        }

        .email-body .body-table table tr th:last-child {
            text-align: right;
        }

        .email-body .body-table table tr:last-child th:first-child {
            border-radius: 0.3rem 0 0 0.3rem;
        }

        .email-body .body-table table tr:last-child th:last-child {
            border-radius: 0 0.3rem 0.3rem 0;
        }

        .email-footer {
            border-top: 1px solid rgba(0, 0, 0, 0.2);
        }

        .email-footer .footer-text {
            font-size: 0.8rem;
            text-align: center;
            padding-top: 1rem;
        }

        .email-footer .footer-text a {
            color: #d74034;
        }

        .left-radius {
            border-radius: 0px 0.3rem 0.3rem 0px;
            border-radius: 0.3rem 0 0 0.3rem;
            /* border-radius: 8px 0px 0px 8px; */
        }

        .right-radius {
            border-radius: 0.3rem 0px 0px 0.3rem;
            border-radius: 0px 0.3rem 0.3rem 0px;
            /* border-radius: 8px 0px 0px 8px; */
        }

        .email .email-body .body-text .body-table .table3 {
            /* border-bottom: 1px solid rgba(0, 0, 0, 0.2); */
            padding-bottom: 1rem;
        }

        /* .email .email-body .body-text .body-table .table2, */
        .email .email-body .body-text .body-table .table2 tbody tr td {
            /* border-bottom: 1px solid rgba(0, 0, 0, 0.2);
          padding-bottom: 1rem; */
        }

        .email-body .body-text .body-table table tbody tr td a {
            color: black;
            text-decoration: none !important;
        }

        table {
            font-size: 12px !important;
        }

        .table td.fit,
        .table th.fit {
            white-space: nowrap;
        }
    </style> --}}

    <style>
        .email {
            max-height: 800em;
            max-width: 750px;
            margin: 1rem auto;
            border-radius: 10px;
            /* border-top: #d74034 2px solid; */
            /* border-bottom: #d74034 2px solid; */
            box-shadow: 0 2px 18px rgba(0, 0, 0, 0.2);
            padding: 1.5rem;
            font-family: Arial, Helvetica, sans-serif;
        }

        .email .email-head {
            /* border-bottom: 1px solid rgba(0, 0, 0, 0.2); */
            padding-bottom: 1rem;
        }

        .email .email-head .head-img {
            max-width: 50px;
            display: block;
            margin: 0 auto;
        }

        .email-body .body-text {
            padding: 0 0 1rem;
            text-align: center;
            font-size: 1.15rem;
        }

        .email-body .body-text.bottom-text {
            /* padding: 2rem 0 1rem; */
            text-align: center;
            font-size: 0.8rem;
        }

        .email-body .body-text .body-greeting {
            font-weight: bold;
            margin-bottom: 1rem;
        }

        .email-body .body-table {
            text-align: left;
        }

        .email-body .body-table table {
            width: 100%;
            font-size: 1rem;
        }

        .email-body .body-table table .total {
            background-color: hsla(4, 67%, 52%, 0.12);
            border-radius: 0.3rem;
            padding: 20px;
            color: #d74034;
        }

        .email-body .body-table table .item {
            border-radius: 0.3rem;
            /* border: 1px solid #006; */
            color: black;
        }

        .email-body .body-table table th,
        .email-body .body-table table td {
            /* padding: 3px 0px 3px 0px; */
            /* border: 1px solid #006; */
            /* TABLE TD BORDER */
        }

        .email-body .body-table table tr td:last-child {
            text-align: right;
        }

        .email-body .body-table table tr th:last-child {
            text-align: right;
        }

        .email-body .body-table table tr:last-child th:first-child {
            border-radius: 0.3rem 0 0 0.3rem;
        }

        .email-body .body-table table tr:last-child th:last-child {
            border-radius: 0 0.3rem 0.3rem 0;
        }

        .email-footer {
            border-top: 1px solid rgba(0, 0, 0, 0.2);
        }

        .email-footer .footer-text {
            font-size: 0.8rem;
            text-align: center;
            padding-top: 1rem;
        }

        .email-footer .footer-text a {
            color: #d74034;
        }

        .all-radius {
            border-radius: 0.3rem 0.3rem 0.3rem 0.3rem;
            /* border-radius: 8px 0px 0px 8px; */
        }

        .left-radius {
            border-radius: 0px 0.3rem 0.3rem 0px;
            border-radius: 0.3rem 0 0 0.3rem;
            /* border-radius: 8px 0px 0px 8px; */
        }

        .right-radius {
            border-radius: 0.3rem 0px 0px 0.3rem;
            border-radius: 0px 0.3rem 0.3rem 0px;
            /* border-radius: 8px 0px 0px 8px; */
        }

        .email .email-body .body-text .body-table .table3 {
            /* border-bottom: 1px solid rgba(0, 0, 0, 0.2); */
            padding-bottom: 1rem;
        }

        /* .email .email-body .body-text .body-table .table2, */
        .email .email-body .body-text .body-table .table2 tbody tr td {
            /* border-bottom: 1px solid rgba(0, 0, 0, 0.2);
          padding-bottom: 1rem; */
        }

        .email-body .body-text .body-table table tbody tr td a {
            color: black;
            text-decoration: none !important;
        }

        table td,
        table th {
            /* Set font properties for table cells */
            font-family: inherit;
            font-size: inherit;
            font-weight: inherit;
        }
    </style>
</head>

<body>
    <div class="containerPDF">
        <div class="email">
            <div class="email-head">
                <div class="head-img">
                    <?php
                    // Retrieve the image file from the URL
                    $image_url = 'https://invoice.5ppsite.com' . $content['invoice_logo'];
                    // Check if $image_url is not empty
                    if (!empty($image_url)) {
                        $headers = get_headers($image_url);
                    
                        // Check if the URL returns a 404 error
                        if (strpos($headers[0], '404') !== false) {
                            $image_data = null;
                        } else {
                            $image_data = file_get_contents($image_url);
                        }
                    } else {
                        $image_data = null; // Set $image_data to null if $image_url is empty
                    }
                    
                    // Update the <img> tag with the base64-encoded string
                    // Convert the image file into a base64-encoded string
                    $base64_image = base64_encode($image_data);
                    $img_tag = '<img style="width:50px; max-width:100%;" src="data:image/png;base64,' . $base64_image . '">';
                    
                    // Output the updated <img> tag
                    if ($base64_image) {
                        echo $img_tag;
                    }
                    ?>
                    <!-- <img style="width:50px; max-width:100%;" src="https://invoice.5ppsite.com{{ $content['invoice_logo'] }}"> -->
                </div>
            </div>
            <div class="email-body">
                <div class="body-text">
                    <div class="body-table">
                        {{-- <table style="table-layout: fixed; width: 100%">
                            <tr class="item">
                                <th colspan="3" style="word-wrap: break-word;vertical-align: bottom;">
                                    {{ $content['full_name'] }}</th>
                                <th style="vertical-align: bottom;font-size:25px;text-align:end">
                                    <strong>INVOICE</strong>
                                </th>
                            </tr>

                            <tbody>
                                <tr>
                                    <td colspan="2" style="word-wrap: break-word;">
                                        <a>
                                            {{ $content['user_email'] }}
                                        </a>
                                    </td>
                                    <th></th>
                                    <td style="text-align:end;">{{ $content['invoice_no'] }}</td>
                                </tr>
                                <tr>
                                    <td colspan="2" style="word-wrap: break-word">{{ $content['address'] }}
                                        <br>{{ $content['city'] }},
                                        {{ $content['province'] }} <br>
                                        Philippines,{{ $content['zip_code'] }}
                                    </td>
                                    <td></td>
                                    <td></td>
                                </tr>

                                <tr>
                                    <td style="text-align:left;padding-top:15px" colspan="2">Bill To:</td>
                                    <td style="padding-top:15px">Date:</td>
                                    <td style="text-align: end;padding-top:15px">{{ $content['date_created'] }}</td>
                                </tr>

                                <tr>
                                    <th colspan="2" style="text-align:left;word-wrap: break-word">
                                        {{ $content['invoice_title'] }}</th>
                                    <td>Due Date:</td>
                                    <td style="text-align: end;">{{ $content['due_date'] }}</td>
                                </tr>

                                <tr>
                                    <td colspan="2" style="word-wrap: break-word">{{ $content['invoice_email'] }}
                                    </td>

                                    </td>
                                    @if ($content['payment_status'] === 'Paid')
                                        <td class="left-radius" style="color:#198754;vertical-align:top;">
                                            <strong>Invoice
                                                Status:</strong>
                                        </td>
                                        <td class="right-radius"
                                            style="vertical-align:top;color:#198754;text-align: end;">
                                            <strong>{{ $content['payment_status'] }} </strong>
                                        </td>
                                    @elseif($content['payment_status'] === 'Overdue')
                                        <td class="left-radius" style="color:#dc3545;vertical-align:top;">
                                            <strong>Invoice
                                                Status:</strong>
                                        </td>
                                        <td class="right-radius"
                                            style="vertical-align:top;color:#dc3545;text-align: end;">
                                            <strong> {{ $content['payment_status'] }}</strong>
                                        </td>
                                    @else
                                        <td class="left-radius" style="color:#ffc107;vertical-align:top;">
                                            <strong>Invoice
                                                Status:</strong>
                                        </td>
                                        <td class="right-radius"
                                            style="vertical-align:top;color:#ffc107;text-align: end;">
                                            <strong> {{ $content['payment_status'] }}</strong>
                                        </td>
                                    @endif
                                </tr>

                                <tr>
                                    <td colspan="2"
                                        style="word-wrap: break-word;text-align:left;vertical-align:top;">
                                        {!! htmlspecialchars_decode($content['bill_to_address']) !!}
                                    </td>
                                    @if ($content['payment_status'] === 'Paid')
                                        <td style="vertical-align:top;">Date Received:</td>
                                        <td style="vertical-align:top; text-align:end;">{{ $content['date_received'] }}
                                        </td>
                                    @endif
                                </tr>
                                <tr>
                                    <td colspan="2"></td>
                                    <td class="left-radius" style="background-color:#d4d4d4">
                                        <span style=" text-align: left;"> <strong>Balance Due:</strong></span>
                                    </td>
                                    <td class="right-radius" style="background-color:#d4d4d4;text-align: end;">
                                        <span><strong>${{ $content['balance_due'] }}</strong></span>
                                    </td>
                                </tr>
                            </tbody>
                        </table> --}}

                        <table style="table-layout: fixed; width: 100%;">
                            <tr class="item">
                                <td style="font-size:12px">
                                    {{ $content['full_name'] }}
                                </td>
                                <td rowspan="4"
                                    style="font-size:50px;position: relative;
                              bottom: 15px;text-align:end">
                                    INVOICE
                                </td>
                            </tr>

                            <tr>
                                <td style="word-wrap: break-word;text-align:left;font-size:12px">
                                    <a>{{ $content['user_email'] }}</a>
                                </td>

                            </tr>

                            <tr>
                                <td style="word-wrap: break-word;text-align:left;font-size:12px">
                                    {{ $content['address'] }}
                                </td>
                            </tr>

                            <tr>
                                <td style="word-wrap: break-word;text-align:left;font-size:12px">
                                    {{ $content['city'] }}
                                </td>

                            </tr>

                            <tr>
                                <td
                                    style="word-wrap:
                                      break-word;text-align:left;font-size:12px">
                                    {{ $content['province'] }}
                                </td>
                                <td rowspan="2"
                                    style="text-align:end;vertical-align: bottom;;font-size:23px;position: relative;
                              bottom: 32px;">
                                    #{{ $content['invoice_no'] }}
                                </td>
                            </tr>

                            <tr>
                                <td style="word-wrap: break-word;text-align:left;font-size:12px">
                                    Philippines,{{ $content['zip_code'] }}
                                </td>

                            </tr>
                        </table>

                        <table style="table-layout: fixed; width: 100%">
                            {{-- <tr class="item">
                              <th colspan="2" style="word-wrap: break-word;vertical-align: bottom;">
                                  {{ $content['full_name'] }}</th>
                              <th style="vertical-align: bottom;font-size:25px;text-align:end">
                                  <strong>INVOICE</strong>
                              </th>
                          </tr>
                          <tr>
                              <td colspan="2" style="word-wrap: break-word;">
                                  <a>
                                      {{ $content['user_email'] }}
                                  </a>
                              </td>
                              <td style="text-align:end;"># {{ $content['invoice_no'] }}</td>
                          </tr>
  
                          <tr>
                              <td colspan="2" style="word-wrap: break-word">{{ $content['address'] }}
                                  <br>{{ $content['city'] }},
                                  {{ $content['province'] }}<br>
                                  Philippines,{{ $content['zip_code'] }}
                              </td>
  
                          </tr> --}}

                            <tr>
                                <td colspan="2"></td>
                                <td style="vertical-align:top; font-size:12px;text-align: right">
                                    @if ($content['payment_status'] === 'Paid')
                                        Date Received:
                                    @else
                                        <br />
                                    @endif
                                </td>
                                <td style="vertical-align:top; text-align:end;font-size:12px;text-align: end">
                                    @if ($content['payment_status'] === 'Paid')
                                        {{ $content['date_received'] }}
                                    @else
                                        <br />
                                    @endif
                                </td>
                            </tr>

                            <tr>
                                <td style="text-align:left;font-size:12px" colspan="2">Bill To:</td>
                                <td style="font-size:12px;text-align: right">Date:</td>
                                <td style="text-align: end;font-size:12px">{{ $content['date_created'] }}</td>
                            </tr>

                            <tr>
                                <th colspan="2" style="word-wrap: break-word;font-size:12px;text-align: left">
                                    {{ $content['invoice_title'] }}</th>
                                <td style="font-size:12px;text-align: right">Due Date:</td>
                                <td style="text-align: end;font-size:12px">{{ $content['due_date'] }}</td>
                            </tr>

                            <tr>
                                <td colspan="2" style="word-wrap: break-word;font-size:12px">
                                    {{ $content['invoice_email'] }}</td>
                                @if ($content['payment_status'] === 'Paid')
                                    <td class="left-radius"
                                        style="font-size:12px;color:#198754;vertical-align:top;text-align: right">
                                        <strong>Invoice
                                            Status:</strong>
                                    </td>
                                    <td class="right-radius"
                                        style="vertical-align:top;color:#198754;text-align: end;font-size:12px;text-align: end">
                                        <strong>{{ $content['payment_status'] }} </strong>
                                    </td>
                                @elseif($content['payment_status'] === 'Overdue')
                                    <td class="left-radius"
                                        style="color:#dc3545;vertical-align:top;font-size:12px;text-align: right">
                                        <strong>Invoice
                                            Status:</strong>
                                    </td>
                                    <td class="right-radius"
                                        style="vertical-align:top;color:#dc3545;text-align: end;font-size:12px">
                                        <strong> {{ $content['payment_status'] }}</strong>
                                    </td>
                                @else
                                    <td class="left-radius"
                                        style="color:#ffc107;vertical-align:top;font-size:12px;text-align: right">
                                        <strong>Invoice
                                            Status:</strong>
                                    </td>
                                    <td class="right-radius"
                                        style="vertical-align:top;color:#ffc107;text-align: end;font-size:12px">
                                        <strong> {{ $content['payment_status'] }}</strong>
                                    </td>
                                @endif
                            </tr>

                            <tr>
                                <td colspan="2"
                                    style="word-wrap: break-word;text-align:left;vertical-align:top;font-size:12px">
                                    {!! htmlspecialchars_decode($content['bill_to_address']) !!}
                                </td>

                                <td colspan="2">
                                    <div class="all-radius"
                                        style="margin-bottom:30px;width:100%; background-color:#efefef;font-size:12px;text-align:end">
                                        <table style="table-layout: fixed; width: 100%">
                                            <tr>
                                                <td style="font-size:12px;text-align: right"><strong>Balance
                                                        Due:</strong></td>
                                                <td style="font-size:12px;text-align: end">
                                                    <strong>${{ $content['balance_due'] }}</strong>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </td>
                            </tr>
                        </table>

                        <table class="table2" style="table-layout: fixed; width: 100%;margin-top:10px;font-size:12px">
                            <tr style="background-color:#3a3a3a;color:white">
                                {{-- <th style="text-align:left; width: 50%">Description</th>
                                <th style="text-align:right; width: 15%">Quantity</th>
                                <th style="text-align:right; width: 17%">Rate</th>
                                <th class="" style="text-align:right; width: 18%">Amount</th> --}}
                                <th class="left-radius" style="width: 308px;padding-left:10px;">Description</th>
                                <th style="width: 100px;text-align: end;padding-right:10px;">Quantity</th>
                                <th style="width: 100px;text-align: end;padding-right:10px;">Rate</th>
                                <th class="right-radius" style="width: 100px;text-align: end;padding-right:10px;">Amount
                                </th>
                            </tr>
                            <tbody>
                                @foreach ($content['invoice_items'] as $items)
                                    <tr>
                                        <td style="word-wrap: break-word;text-align:left; width: 50%">
                                            {{ $items->item_description }}
                                        </td>
                                        <td style="text-align:right; width: 15%">{{ $items->quantity }}
                                        </td>
                                        <td style="text-align:right; width: 17%">
                                            ${{ number_format($items->rate, 2) }}
                                        </td>
                                        <td style="text-align:right; width: 18%">
                                            ${{ number_format($items->total_amount, 2) }}</td>
                                    </tr>
                                    {{-- <tr>
                                    <td style="word-wrap: break-word;text-align:left;">
                                        {{ $items->item_description }}
                                    </td>
                                    <td style="text-align:right;width: 100px">{{ $items->quantity }}
                                    </td>
                                    <td style="text-align:right;width: 100px">
                                        ${{ number_format($items->rate, 2) }}
                                    </td>
                                    <td style="text-align:right;width: 100px">
                                        ${{ number_format($items->total_amount, 2) }}</td>
                                </tr> --}}
                                @endforeach
                            </tbody>
                        </table>

                        <table class="table3" style="table-layout: fixed; width: 100%;margin-top:10px;font-size:12px">
                            <tbody>
                                <tr>
                                    <td>
                                        @if ($content['quick_invoice'] == 0)
                                            <strong>Description:</strong>
                                        @endif

                                    </td>
                                    <td style="text-align:left;width:235px"><strong>SubTotal:</strong>
                                    </td>
                                    <td style="text-align:end;width:119px">
                                        <strong>${{ $content['sub_total'] }}</strong>
                                    </td>
                                </tr>

                                <tr>
                                    <td style="text-align:left;word-wrap: break-word;width:50%;vertical-align:top;"
                                        rowspan="3">
                                        @if ($content['quick_invoice'] == 0)
                                            {{ $content['invoice_description'] }}
                                        @endif
                                    </td>

                                    @if ($content['discount_total'] > 0)
                                        <td style="text-align:left;"> Discount Type:
                                            @if ($content['discount_type'] === 'Fixed')
                                                <span class="text-muted" id="discountType">
                                                    Fixed
                                                </span>
                                            @else
                                                <span class="text-muted" id="discountAmount">
                                                    Pct. ({{ $content['discount_amount'] }}%)
                                                </span>
                                            @endif
                                        </td>
                                        <td style="text-align:end;"> ${{ $content['discount_total'] }}
                                        </td>
                                    @endif
                                </tr>

                                <tr>
                                    <td style="text-align:left;">Total:</td>
                                    <td style="text-align:end;">${{ $content['balance_due'] }}</td>
                                </tr>

                                <tr>
                                    <td style="text-align:left;">
                                        Converted Amount: P{{ $content['peso_rate'] }}
                                    </td>
                                    <td style="text-align: end;">P{{ $content['converted_amount'] }}
                                    </td>
                                </tr>

                                @if (!empty($content['deductions']))
                                    <tr>
                                        <td style="padding-top:15px"></td>
                                        <td style="text-align:left;padding-top:15px" colspan="2">
                                            <strong>Deductions</strong>
                                        </td>
                                    </tr>

                                    @php
                                        $total_deduction = 0;
                                    @endphp

                                    @foreach ($content['deductions'] as $deduction)
                                        <tr>
                                            <td></td>
                                            <td style="word-wrap: break-word;">
                                                {{ $deduction->profile_deduction_types->deduction_type_name }}</td>
                                            <td style="text-align: end;color:#dc3545;">
                                                P{{ number_format($deduction->amount, 2) }}</td>
                                        </tr>
                                        @php
                                            $total_deduction += $deduction->amount;
                                        @endphp
                                    @endforeach


                                    <tr>
                                        <td></td>
                                        <td><strong>Total Deductions<strong></td>
                                        <td style="text-align:end;color:#dc3545;">
                                            <strong>P{{ number_format($total_deduction, 2) }}<strong>
                                        </td>
                                    </tr>

                                @endif
                                <tr>
                                    <td style="padding-top:15px">
                                        @if ($content['quick_invoice'] == 0)
                                            <strong>Notes:</strong>
                                        @endif
                                    </td>
                                    <td style="padding-top:15px">
                                        <strong>Grand Total:</strong>
                                    </td>
                                    <td style="text-align: end;padding-top:15px">
                                        <strong>P{{ $content['grand_total_amount'] }}</strong>
                                    </td>
                                </tr>

                                @if ($content['quick_invoice'] == 0)
                                    <tr>
                                        <td colspan="3" style="text-align: left;word-wrap: break-word">
                                            {{ $content['notes'] }}</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
</body>

</html>