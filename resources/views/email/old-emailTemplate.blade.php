<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('/assets/css/styles.css') }}" rel="stylesheet">
    <title>Send Email</title>

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
    <div class="email">
        <div class="email-head">
            <div class="head-img">
                @if ($content['invoice_logo'])
                    <img style="width: 50px; max-width: 100%;"
                        src="https://invoice.5ppsite.com{{ $content['invoice_logo'] }}"
                        onerror="this.onerror=null;this.src=''">
                @endif
            </div>
        </div>

        <div class="email-body">
            <div class="body-text">
                <div class="body-table">
                    <table style="table-layout: fixed; width: 100%;font-size:12px">
                        <tbody>
                            <tr>
                                <td class="scope" style="font-size:12px">
                                    {{ $content['full_name'] }}
                                </td>
                                <td class="scope"rowspan="4">
                                    <div
                                        style="font-size:50px;position: relative;
                              bottom: 15px;text-align:end">
                                        INVOICE
                                    </div>
                                </td>
                            </tr>

                            <tr>
                                <td class="scope" style="word-wrap: break-word;text-align:start;font-size:12px">
                                    <a>{{ $content['user_email'] }}</a>
                                </td>

                            </tr>

                            <tr>
                                <td class="scope" style="word-wrap: break-word;text-align:start;font-size:12px">
                                    {{ $content['address'] }}
                                </td>
                            </tr>

                            <tr>
                                <td class="scope" style="word-wrap: break-word;text-align:start;font-size:12px">
                                    {{ $content['city'] }}
                                </td>

                            </tr>

                            <tr>
                                <td class="scope"
                                    style="word-wrap:
                                    break-word;text-align:start;font-size:12px">
                                    {{ $content['province'] }}
                                </td>
                                <td class="scope" rowspan="2"
                                    style="text-align:end;vertical-align: bottom;;font-size:23px;position: relative;
                            bottom: 32px;">
                                    #{{ $content['invoice_no'] }}
                                </td>
                            </tr>

                            <tr>
                                <td class="scope" style="word-wrap: break-word;text-align:start;font-size:12px">
                                    Philippines,{{ $content['zip_code'] }}
                                </td>

                            </tr>
                        </tbody>
                    </table>

                    <table style="table-layout: fixed; width: 100%;font-size:12px">
                        <tbody>
                            <tr>
                                @if ($content['payment_status'] === 'Paid')
                                    <td colspan="2" class="scope"
                                        style="vertical-align:top; font-size:12px;text-align: end;width:500px">
                                        Date Received:
                                    @else
                                        <br />

                                    </td>
                                @endif

                                <td class="scope"
                                    style="vertical-align:top; text-align:end;font-size:12px;text-align: end">
                                    @if ($content['payment_status'] === 'Paid')
                                        {{ $content['date_received'] }}
                                    @else
                                        <br />
                                    @endif
                                </td>
                            </tr>

                            <tr>
                                <td class="scope" style="text-align:left;font-size:12px;width:235px">Bill To:</td>
                                <td class="scope" style="font-size:12px;text-align: end">Date:</td>
                                <td class="scope" style="text-align: end;font-size:12px">
                                    {{ $content['date_created'] }}</td>
                            </tr>

                            <tr>
                                <td class="scope" style="word-wrap: break-word;font-size:12px">
                                    <strong> {{ $content['invoice_title'] }}</strong>
                                </td>
                                <td class="scope" style="font-size:12px;text-align: end">Due Date:</td>
                                <td class="scope" style="text-align: end;font-size:12px">{{ $content['due_date'] }}
                                </td>
                            </tr>

                            <tr>
                                <td class="scope" style="word-wrap: break-word;font-size:12px">
                                    {{ $content['invoice_email'] }}</td>
                                @if ($content['payment_status'] === 'Paid')
                                    <td class="scope" class="left-radius"
                                        style="font-size:12px;color:#198754;vertical-align:top;text-align: end">
                                        <strong>Invoice
                                            Status:</strong>
                                    </td>
                                    <td class="scope" class="right-radius"
                                        style="vertical-align:top;color:#198754;text-align: end;font-size:12px;text-align: end">
                                        <strong>{{ $content['payment_status'] }} </strong>
                                    </td>
                                @elseif($content['payment_status'] === 'Overdue')
                                    <td class="scope" class="left-radius"
                                        style="color:#dc3545;vertical-align:top;font-size:12px;text-align: end">
                                        <strong>Invoice
                                            Status:</strong>
                                    </td>
                                    <td class="scope" class="right-radius"
                                        style="vertical-align:top;color:#dc3545;text-align: end;font-size:12px">
                                        <strong> {{ $content['payment_status'] }}</strong>
                                    </td>
                                @else
                                    <td class="scope" class="left-radius"
                                        style="color:#ffc107;vertical-align:top;font-size:12px;text-align: end">
                                        <strong>Invoice
                                            Status:</strong>
                                    </td>
                                    <td class="scope" class="right-radius"
                                        style="vertical-align:top;color:#ffc107;text-align: end;font-size:12px">
                                        <strong> {{ $content['payment_status'] }}</strong>
                                    </td>
                                @endif
                            </tr>
                        </tbody>
                    </table>

                    <table style="table-layout: fixed; width: 100%;font-size:12px">
                        <tbody>
                            <tr>
                                <td class="scope"
                                    style="word-wrap: break-word;text-align:left;vertical-align:top;font-size:12px">
                                    {!! htmlspecialchars_decode($content['bill_to_address']) !!}
                                </td>

                                <td class="scope" style="width:350px;">
                                    <div class="all-radius"
                                        style="height:25px;width:100%;margin-bottom:30px;background-color:#efefef;font-size:12px;text-align:end;display: inline-flex;justify-content: space-between;align-items:center">
                                        <label style="width:148px"><strong>Balance Due:</strong></label>

                                        <label
                                            style="margin-right:10px"><strong>${{ $content['balance_due'] }}</strong></label>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>


                    {{-- <table class="table3" style="table-layout: fixed; width: 100%font-size:12px">
                        <tbody>
                            <tr>
                                <td colspan="2" class="scope"
                                    style="vertical-align:top; font-size:12px;text-align: end">
                                    @if ($content['payment_status'] === 'Paid')
                                        Date Received:
                                    @else
                                        <br />
                                    @endif
                                </td>

                                <td class="scope"
                                    style="vertical-align:top; text-align:end;font-size:12px;text-align: end">
                                    @if ($content['payment_status'] === 'Paid')
                                        {{ $content['date_received'] }}
                                    @else
                                        <br />
                                    @endif
                                </td>
                            </tr>

                            <tr>
                                <td class="scope" style="text-align:left;font-size:12px" colspan="2">Bill To:</td>
                                <td class="scope" style="font-size:12px;text-align: end">Date:</td>
                                <td class="scope" style="text-align: end;font-size:12px">
                                    {{ $content['date_created'] }}
                                </td>
                            </tr>

                            <tr>
                                <td class="scope" colspan="2" style="word-wrap: break-word;font-size:12px">
                                    <strong> {{ $content['invoice_title'] }}</strong>
                                </td>
                                <td class="scope" style="font-size:12px;text-align: end">Due Date:</td>
                                <td class="scope" style="text-align: end;font-size:12px">{{ $content['due_date'] }}
                                </td>
                            </tr>

                            <tr>
                                <td class="scope" colspan="2" style="word-wrap: break-word;font-size:12px">
                                    {{ $content['invoice_email'] }}</td>
                                @if ($content['payment_status'] === 'Paid')
                                    <td class="scope" class="left-radius"
                                        style="font-size:12px;color:#198754;vertical-align:top;text-align: end">
                                        <strong>Invoice
                                            Status:</strong>
                                    </td>
                                    <td class="scope" class="right-radius"
                                        style="vertical-align:top;color:#198754;text-align: end;font-size:12px;text-align: end">
                                        <strong>{{ $content['payment_status'] }} </strong>
                                    </td>
                                @elseif($content['payment_status'] === 'Overdue')
                                    <td class="scope" class="left-radius"
                                        style="color:#dc3545;vertical-align:top;font-size:12px;text-align: end">
                                        <strong>Invoice
                                            Status:</strong>
                                    </td>
                                    <td class="scope" class="right-radius"
                                        style="vertical-align:top;color:#dc3545;text-align: end;font-size:12px">
                                        <strong> {{ $content['payment_status'] }}</strong>
                                    </td>
                                @else
                                    <td class="scope" class="left-radius"
                                        style="color:#ffc107;vertical-align:top;font-size:12px;text-align: end">
                                        <strong>Invoice
                                            Status:</strong>
                                    </td>
                                    <td class="scope" class="right-radius"
                                        style="vertical-align:top;color:#ffc107;text-align: end;font-size:12px">
                                        <strong> {{ $content['payment_status'] }}</strong>
                                    </td>
                                @endif
                            </tr>

                            <tr>
                                <td class="scope" colspan="2"
                                    style="word-wrap: break-word;text-align:left;vertical-align:top;font-size:12px">
                                    {!! htmlspecialchars_decode($content['bill_to_address']) !!}
                                </td>

                                <td class="scope" class="all-radius"
                                    style="margin-bottom:30px;width:100%; background-color:#efefef;font-size:12px;text-align:end">
                                    <label class="scope" style="font-size:12px;text-align: end">
                                        <strong>Balance
                                            Due:</strong>
                                    </label>
                                    <label class="scope" style="font-size:12px;text-align: right">
                                        <strong>${{ $content['balance_due'] }}</strong>
                                    </label>

                                </td>
                            </tr>
                        <tbody>
                    </table> --}}

                    <table class="table2" style="table-layout: fixed; width: 100%;margin-top:10px;font-size:12px">
                        <tr style="background-color:#3a3a3a;color:white;border-color:#3a3a3a">
                            <th class="left-radius" style="width: 308px;padding-left:10px;">Description</th>
                            <th style="width: 100px;text-align: end;padding-right:10px;">Quantity</th>
                            <th style="width: 100px;text-align: end;padding-right:10px;">Rate</th>
                            <th class="right-radius" style="width: 100px;text-align: end;padding-right:10px;">Amount
                            </th>
                        </tr>
                        <tbody>
                            @foreach ($content['invoice_items'] as $items)
                                <tr>
                                    <td class="scope" style="word-wrap: break-word;padding-left:10px;">
                                        {{ $items->item_description }}
                                    </td>
                                    <td class="scope" style="text-align:end;;padding-right:10px;">
                                        {{ $items->quantity }}</td>
                                    <td class="scope" style="text-align:end;;padding-right:10px;">
                                        ${{ number_format($items->rate, 2) }}
                                    </td>
                                    <td class="scope" style="text-align:end;;padding-right:10px;">
                                        ${{ number_format($items->total_amount, 2) }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <table class="table3" style="table-layout: fixed; width: 100%;margin-top:10px;font-size:12px">
                        {{-- <tbody>
                            <tr>
                                <td valign="top">
                                    <table>
                                        <tr>
                                            <td style="text-align: left">
                                                @if ($content['quick_invoice'] == 0)
                                                    <strong>Description:</strong>
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="text-align: left">
                                                @if ($content['quick_invoice'] == 0)
                                                    {{ $content['invoice_description'] }}
                                                @endif
                                            </td>
                                        </tr>

                                        @if ($content['quick_invoice'] == 0)
                                            <tr>
                                                <td style="text-align: left;padding-top:47px">
                                                    <strong>
                                                        Notes
                                                    </strong>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2" style="text-align: start;word-wrap: break-word">
                                                    {{ $content['notes'] }}
                                                </td>
                                            </tr>
                                        @endif
                                    </table>
                                </td>
                                <td>
                                    <table>
                                        <tr>
                                            <td class=" scope" style="text-align:start;"><strong>SubTotal:</strong></td>
                                            <td class="scope" style="text-align:end;">
                                                <strong>${{ $content['sub_total'] }}</strong>
                                            </td>
                                        </tr>

                                        @if ($content['discount_total'] > 0)
                                            <tr>
                                                <td class="scope" style="text-align:start;"> Discount Type:
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
                                                <td class="scope" style="text-align:end;">
                                                    ${{ $content['discount_total'] }}</td>
                                            </tr>
                                        @endif

                                        <tr>
                                            <td class="scope" style="text-align:start;"><strong>Total:</strong></td>
                                            <td class="scope" style="text-align:end;">
                                                <strong>
                                                    ${{ $content['balance_due'] }}
                                                </strong>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td style="text-align: start;">Converted Amount:
                                                ₱{{ $content['peso_rate'] }}
                                            </td>
                                            <td style="text-align: end;">
                                                ₱{{ $content['converted_amount'] }}
                                            </td>
                                        </tr>

                                        @if (!empty($content['deductions']))
                                            <tr>
                                                <td style="text-align:start;padding-top:15px" colspan="2">
                                                    <strong>Deductions</strong>
                                                </td>
                                            </tr>

                                            @php
                                                $total_deduction = 0;
                                            @endphp

                                            @foreach ($content['deductions'] as $deduction)
                                                <tr>
                                                    <td style="word-wrap: break-word;text-align:start">
                                                        {{ $deduction->profile_deduction_types->deduction_type_name }}
                                                    </td>
                                                    <td style="text-align: end;color:#dc3545;">
                                                        ₱{{ number_format($deduction->amount, 2) }}</td>
                                                </tr>
                                                @php
                                                    $total_deduction += $deduction->amount;
                                                @endphp
                                            @endforeach


                                            <tr>
                                                <td class="text-start"><strong>Total Deductions<strong></td>
                                                <td style="text-align:end;color:#dc3545;">
                                                    <strong>₱{{ number_format($total_deduction, 2) }}<strong>
                                                </td>
                                            </tr>
                                        @endif

                                        <tr>
                                            <td style="text-align:start">
                                                <strong>Grand Total:</strong>
                                            </td>
                                            <td style="text-align: end;padding-top:15px">
                                                <strong>₱{{ $content['grand_total_amount'] }}</strong>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>

                        </tbody> --}}
                        <tbody>
                            <tr>
                                <td class="scope">
                                    @if ($content['quick_invoice'] == 0)
                                        <strong>Description:</strong>
                                    @endif

                                </td>
                                <td class="scope" style="text-align:start;width:235px"><strong>SubTotal:</strong>
                                </td>
                                <td class="scope" style="text-align:end;width:119px">
                                    <strong>${{ $content['sub_total'] }}</strong>
                                </td>
                            </tr>

                            <tr>
                                <td class="scope"
                                    style="text-align:left;word-wrap: break-word;width:50%;vertical-align:top;"
                                    rowspan="3">
                                    @if ($content['quick_invoice'] == 0)
                                        {{ $content['invoice_description'] }}
                                    @endif
                                </td>

                                @if ($content['discount_total'] > 0)
                                    <td class="scope" style="text-align:start;"> Discount Type:
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
                                    <td class="scope" style="text-align:end;"> ${{ $content['discount_total'] }}
                                    </td>
                                @endif
                            </tr>

                            <tr>
                                <td class="scope" style="text-align:start;">Total:</td>
                                <td class="scope" style="text-align:end;">${{ $content['balance_due'] }}</td>
                            </tr>

                            <tr>
                                <td><strong>Converted Amount: ₱{{ $content['peso_rate'] }}</strong></td>
                                <td style="text-align: end;"><strong>₱{{ $content['converted_amount'] }}</strong></td>
                            </tr>

                            @if (!empty($content['deductions']))
                                <tr>
                                    <td style="padding-top:15px"></td>
                                    <td style="text-align:start;padding-top:15px" colspan="2">
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
                                            ₱{{ number_format($deduction->amount, 2) }}</td>
                                    </tr>
                                    @php
                                        $total_deduction += $deduction->amount;
                                    @endphp
                                @endforeach


                                <tr>
                                    <td></td>
                                    <td><strong>Total Deductions<strong></td>
                                    <td style="text-align:end;color:#dc3545;">
                                        <strong>₱{{ number_format($total_deduction, 2) }}<strong>
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
                                    <strong>₱{{ $content['grand_total_amount'] }}</strong>
                                </td>
                            </tr>

                            @if ($content['quick_invoice'] == 0)
                                <tr>
                                    <td colspan="3" style="text-align: start;word-wrap: break-word">
                                        {{ $content['notes'] }}</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
