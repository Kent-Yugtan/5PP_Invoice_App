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
            border-top: #d74034 2px solid;
            border-bottom: #d74034 2px solid;
            box-shadow: 0 2px 18px rgba(0, 0, 0, 0.2);
            padding: 1.5rem;
            font-family: Arial, Helvetica, sans-serif;
        }

        .email .email-head {
            border-bottom: 1px solid rgba(0, 0, 0, 0.2);
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
            font-size: 1.1rem;
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
            border-bottom: 1px solid rgba(0, 0, 0, 0.2);
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
    </style>
</head>

<body>
    <div class="email">
        <div class="email-head">
            <div class="head-img">
                <img style="width:50px; max-width:100%;"
                    src="https://invoice.5ppsite.com{{ $content['invoice_logo'] }}">
            </div>
        </div>

        <div class="email-body">
            <div class="body-text">
                <div class="body-table">
                    <table style="table-layout: fixed; width: 100%">
                        <tr class="item">
                            <th colspan="2" style="word-wrap: break-word;vertical-align: bottom;">
                                {{ $content['full_name'] }}</th>
                            <th></th>
                            <th style="vertical-align: bottom;">
                                <h1 style="text-align: end;vertical-align: bottom;"><strong>INVOICE</strong></h1>
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
                                    {{ $content['province'] }} Philippines,
                                    {{ $content['zip_code'] }}
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
                                <th colspan="2" style="word-wrap: break-word">{{ $content['invoice_title'] }}</th>
                                <td>Due Date:</td>
                                <td style="text-align: end;">{{ $content['due_date'] }}</td>
                            </tr>

                            <tr>
                                <td colspan="2" style="word-wrap: break-word">{{ $content['bill_to_address'] }}</td>
                                @if ($content['payment_status'] === 'Paid')
                                    <td class="left-radius" style="color:#198754;vertical-align:top;"><strong>Invoice
                                            Status:</strong></td>
                                    <td class="right-radius" style="vertical-align:top;color:#198754;text-align: end;">
                                        <strong>{{ $content['payment_status'] }} </strong>
                                    </td>
                                @elseif($content['payment_status'] === 'Overdue')
                                    <td class="left-radius" style="color:#dc3545;vertical-align:top;"><strong>Invoice
                                            Status:</strong></td>
                                    <td class="right-radius" style="vertical-align:top;color:#dc3545;text-align: end;">
                                        <strong> {{ $content['payment_status'] }}</strong>
                                    </td>
                                @else
                                    <td class="left-radius" style="color:#ffc107;vertical-align:top;"><strong>Invoice
                                            Status:</strong></td>
                                    <td class="right-radius" style="vertical-align:top;color:#ffc107;text-align: end;">
                                        <strong> {{ $content['payment_status'] }}</strong>
                                    </td>
                                @endif
                            </tr>

                            <tr>
                                <td colspan="2" style="text-align:start;word-wrap: break-word;vertical-align:top;">
                                    {{-- <!-- {{ $content['address'] }} <br>{{ $content['city'] }},
                                      {{ $content['province'] }} Philippines,
                                      {{ $content['zip_code'] }} --> --}}
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
                                    <span style=" text-align: start;"> <strong>Balance Due:</strong></span>
                                </td>
                                <td class="right-radius" style="background-color:#d4d4d4;text-align: end;">
                                    <span><strong>${{ $content['balance_due'] }}</strong></span>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <table class="table2" style="table-layout: fixed; width: 100%;margin-top:10px">
                        <tr style="background-color:#515964;color:white">
                            <th style="width: 308px;" class="">Description</th>
                            <th style="width: 100px;text-align: end;">Quantity</th>
                            <th style="width: 100px;text-align: end;">Rate</th>
                            <th class="" style="width: 100px;text-align: end;">Amount</th>
                        </tr>
                        <tbody>
                            @foreach ($content['invoice_items'] as $items)
                                <tr>
                                    <td class="scope" style="word-wrap: break-word">{{ $items->item_description }}
                                    </td>
                                    <td class="scope" style="text-align:end;">{{ $items->quantity }}</td>
                                    <td class="scope" style="text-align:end;">${{ number_format($items->rate, 2) }}
                                    </td>
                                    <td class="scope" style="text-align:end;">
                                        ${{ number_format($items->total_amount, 2) }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <table class="table3" style="table-layout: fixed; width: 100%;margin-top:10px">
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
                                                    <td style="text-align: end;color:red;">
                                                        ₱{{ number_format($deduction->amount, 2) }}</td>
                                                </tr>
                                                @php
                                                    $total_deduction += $deduction->amount;
                                                @endphp
                                            @endforeach


                                            <tr>
                                                <td class="text-start"><strong>Total Deductions<strong></td>
                                                <td style="text-align:end;color:red;">
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
                                <td class="scope" style="text-align:start;width:235px"><strong>SubTotal:</strong></td>
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
                                    <td class="scope" style="text-align:end;"> ${{ $content['discount_total'] }}</td>
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
                                        <td style="text-align: end;color:red;">
                                            ₱{{ number_format($deduction->amount, 2) }}</td>
                                    </tr>
                                    @php
                                        $total_deduction += $deduction->amount;
                                    @endphp
                                @endforeach


                                <tr>
                                    <td></td>
                                    <td><strong>Total Deductions<strong></td>
                                    <td style="text-align:end;color:red;">
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
