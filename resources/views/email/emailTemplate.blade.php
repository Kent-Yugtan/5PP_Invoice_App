<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Send Email</title>

</head>
<style>
    /* Styles for desktop */
    @media only screen and (min-width: 600px) {
        .container {
            width: 600px;
            margin: 0 auto;
        }
    }

    /* Styles for mobile */
    @media only screen and (max-width: 599px) {
        .container {
            width: 100%;
            box-sizing: border-box;
        }

        #table0 tr td {
            min-width: 0px !important;
        }

        #table1 tr td {
            min-width: 0px !important;
        }

        #table2 tr td {
            min-width: 0px !important;
        }


    }
</style>

<body style="background-color:#efefef;font-family: Open Sans, sans-serif;font-weight:400;line-height:1.4;color:#000;">
    {{-- background-color:#efefef --}}
    {{-- @if ($content['for'] == 'Profile')
        <table style="width: 100%;background-color:white">
            <tr>
                <td>
                    <p style="font-weight:bold">Subject: Invoice #{{ $content['invoice_no'] }}</p>
                    <br />
                    <p>Hi {{ $content['full_name'] }},</p>
                    <p>I hope you’re doing well!</p>
                    <p>I’ve attached invoice #{{ $content['invoice_no'] }} for Service/Goods due on
                        {{ $content['due_date'] }}.</p>
                    <p>Please let me know if you have any questions regarding in this invoice.</p>
                    <p>Thank you.</p>
                    <br />
                    <p>Best,</p>
                    <p>Justin Clegg,</p>
                    <p>CEO</p>
                    <p>5 Pints Productions, LLC.</p>
                </td>
            </tr>
        </table>
    @endif
    @if ($content['for'] == 'Admin')
        <table style="width: 100%;background-color:white">
            <tr>
                <td>
                    <p style="font-weight:bold">Subject: Invoice #{{ $content['invoice_no'] }} Settlement
                    </p>
                    <br />
                    <p>Hi {{ $content['admin_email_fullname'] }},</p>
                    <p>I hope you’re doing well!</p>
                    <p>Please settle this invoice #{{ $content['invoice_no'] }} for Service/Goods due on
                        {{ $content['due_date'] }}.</p>
                    <p>Thank you.</p>

                    <br />
                    <p>Click this link to settle this invoice.</p>
                </td>
            </tr>
        </table>
    @endif --}}
    <div class="container" style="padding-top:20px">
        <table id="table0"
            style="margin:10px auto 10px;padding:20px;background-color:#fff;-webkit-border-radius:5px;-moz-border-radius:5px;border-radius:5px;-webkit-box-shadow:0 1px 5px rgba(0,0,0,.12),0 1px 2px rgba(0,0,0,.24);-moz-box-shadow:0 1px 3px rgba(0,0,0,.12),0 1px 2px rgba(0,0,0,.24);box-shadow:0 1px 3px rgba(0,0,0,.12),0 1px 10px rgba(0,0,0,.24);">
            <thead>
                @if ($content['invoice_logo'])
                    <tr>
                        <th colspan="3" style="text-align:center;">
                            <img style="width: 50px; max-width: 100%;"
                                src="https://invoice.5ppsite.com{{ $content['invoice_logo'] }}"
                                onerror="this.onerror=null;this.src=''">
                        </th>
                    </tr>
                @endif
            </thead>
            <tbody>
                <tr>
                    <td style="height:5px"></td>
                </tr>

                <tr>
                    <td style="width:50%;vertical-align:top">
                        <p style="font-size:12px;margin:0 0 1px 0;"><span style="display:inline-block;min-width:150px">
                                {{ $content['full_name'] }}</span></p>

                        <p style="font-size:12px;margin:0 0 1px 0;">
                            <a style="display:inline-block;color:black;text-decoration:none !important;">
                                {{ $content['user_email'] }}
                            </a>
                        <p style="font-size:12px;margin:0 0 1px 0;"><span style="display:inline-block;min-width:150px">
                                {{ $content['address'] }}</span></p>
                        <p style="font-size:12px;margin:0 0 1px 0;"><span style="display:inline-block;min-width:150px">
                                {{ $content['city'] }}</span></p>
                        <p style="font-size:12px;margin:0 0 1px 0;"><span style="display:inline-block;min-width:150px">
                                {{ $content['province'] }}</span></p>
                        <p style="font-size:12px;margin:0 0 1px 0;"><span style="display:inline-block;min-width:150px">
                                Philippines,{{ $content['zip_code'] }}</span></p>
                    </td>

                    <td colspan="" style="padding-bottom:20px">
                        <p style="text-align:right;margin:0">
                            <span style="font-weight:bold;font-size:40px;display:inline-block;min-width:150px">
                                INVOICE</span>
                        </p>
                        <p style="text-align:right;margin:0">
                            <span style="font-size:20px;display:inline-block;min-width:150px">
                                #{{ $content['invoice_no'] }}</span>
                        </p>
                    </td>
                </tr>

                <tr>
                    <td style="height:5px"></td>
                </tr>


                <tr>
                    <td style="vertical-align:top;padding-top:23px">
                        <p style="font-size:12px;margin:0 0 1px 0;"><span style="display:inline-block;">
                                Bill To:</span></p>
                        <p style="font-weight:bold;font-size:12px;margin:0 0 1px 0;"><span
                                style="display:inline-block;">
                                {{ $content['invoice_title'] }}</span></p>
                        <p style="font-size:12px;margin:0 0 1px 0;">
                            <a style="display:inline-block;color:black;text-decoration:none !important;">
                                {{ $content['invoice_email'] }}
                            </a>
                        </p>
                        <p style="font-size:12px;margin:0 0 1px 0;"><span style="display:inline-block;">
                                {!! htmlspecialchars_decode($content['bill_to_address']) !!}</span></p>
                    </td>

                    <td style="vertical-align:top;margin:20px 0 0 0">
                        <table id="table1"
                            style="width:100%;font-size:12px;margin:0 0 1px 0;border-collapse:collapse;">
                            <tbody>
                                <tr>
                                    <td style="text-align:right;"> <span style="display:inline-block;">
                                            Date:
                                        </span></td>
                                    <td style="text-align:right;min-width: 120px;"> <span style="display:inline-block;">
                                            {{ $content['date_created'] }}
                                        </span></td>
                                </tr>

                                <tr>
                                    <td style="text-align:right;"> <span style="display:inline-block;">
                                            Due Date:
                                        </span></td>
                                    <td style="text-align:right;min-width: 120px;"> <span style="display:inline-block;">
                                            {{ $content['due_date'] }}
                                        </span></td>
                                </tr>

                                <tr>
                                    @if ($content['payment_status'] === 'Paid')
                                        <td style="text-align:right;">
                                            <span style="font-weight:bold;display:inline-block;color:#198754;">
                                                Invoice Status:
                                            </span>
                                        </td>
                                        <td style="text-align:right;min-width: 120px;">
                                            <span style="font-weight:bold;display:inline-block;color:#198754;">
                                                {{ $content['payment_status'] }}
                                            </span>
                                        </td>
                                    @elseif($content['payment_status'] === 'Overdue')
                                        <td style="text-align:right;">
                                            <span style="font-weight:bold;display:inline-block;color:#dc3545;">
                                                Invoice Status:
                                            </span>
                                        </td>
                                        <td style="text-align:right;min-width: 120px;">
                                            <span style="font-weight:bold;display:inline-block;color:#dc3545;">
                                                {{ $content['payment_status'] }}
                                            </span>
                                        </td>
                                    @else
                                        <td style="text-align:right;">
                                            <span style="font-weight:bold;display:inline-block;color:#ffc107;">
                                                Invoice Status:
                                            </span>
                                        </td>
                                        <td style="text-align:right;min-width: 120px;">
                                            <span style="font-weight:bold;display:inline-block;color:#ffc107;">
                                                {{ $content['payment_status'] }}
                                            </span>
                                        </td>
                                    @endif
                                </tr>

                                @if ($content['payment_status'] === 'Paid')
                                    <tr>
                                        <td style="text-align:right;">
                                            <span style="display:inline-block;">
                                                Date Received:
                                            </span>
                                        </td>
                                        <td style="text-align:right;min-width: 120px;">
                                            <span style="display:inline-block;">
                                                {{ $content['date_received'] }}
                                            </span>
                                        </td>
                                @endif

                                <tr>
                                    <td
                                        style="border-top-left-radius: 5px;border-bottom-left-radius: 5px;text-align:right;height:22px;background-color:#efefef;font-weight:bold">
                                        <span style="display:inline-block;">
                                            Balance Due:
                                        </span>
                                    </td>
                                    <td
                                        style="min-width: 120px;border-top-right-radius: 5px;border-bottom-right-radius: 5px;text-align:right;height:22px;background-color:#efefef;font-weight:bold">
                                        <span style="display:inline-block;">
                                            ${{ $content['balance_due'] }}
                                        </span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>


                <tr>
                    <td style="height:5px"></td>
                </tr>


                <tr>
                    <td colspan="2">
                        <table id="table2"
                            style="width:100%;font-size:12px;margin:0 0 1px 0;border-collapse:collapse;">
                            <tbody style="padding:5px;">
                                <tr style="background-color:#3a3a3a;color:white;">
                                    <td
                                        style="border-top-left-radius: 5px;border-bottom-left-radius: 5px;padding-left:5px;text-align:left;min-width:280px;height:25px">
                                        <span style="display:inline-block;">
                                            Description
                                        </span>
                                    </td>
                                    <td style="padding-right:5px;text-align:right;min-width:98px;height:25px">
                                        <span style="display:inline-block;">
                                            Quantity
                                        </span>
                                    </td>
                                    <td style="padding-right:5px;text-align:right;min-width:98px;height:25px">
                                        <span style="display:inline-block;">
                                            Rate
                                        </span>
                                    </td>
                                    <td
                                        style="border-top-right-radius: 5px;border-bottom-right-radius: 5px;padding-right:5px;text-align:right;min-width:98px;height:25px">
                                        <span style="display:inline-block;">
                                            Amount
                                        </span>
                                    </td>
                                </tr>

                                @foreach ($content['invoice_items'] as $items)
                                    <tr>
                                        <td style="padding-left:5px;text-align:left;min-width:280px;height:25px">
                                            <span style="display:inline-block;">
                                                {{ $items->item_description }}
                                            </span>
                                        </td>
                                        <td style="padding-right:5px;text-align:right;min-width:98px;height:25px">
                                            <span style="display:inline-block;">
                                                {{ $items->quantity }}
                                            </span>
                                        </td>
                                        <td style="padding-right:5px;text-align:right;min-width:98px;height:25px">
                                            <span style="display:inline-block;">
                                                ${{ number_format($items->rate, 2) }}
                                            </span>
                                        </td>
                                        <td style="padding-right:5px;text-align:right;min-width:98px;height:25px">
                                            <span style="display:inline-block;">
                                                ${{ number_format($items->total_amount, 2) }}
                                            </span>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </td>
                </tr>

                <tr>
                    <td style="height:5px"></td>
                </tr>

                <tr>
                    <td style="width:50%;vertical-align:top">
                        @if ($content['quick_invoice'] == 0)
                            <p style="font-weight:bold;font-size:12px;margin:0 0 1px 0;">
                                <span style="display:inline-block;min-width:150px">
                                    Description
                                </span>
                            </p>

                            <p style="font-size:12px;margin:0 0 1px 0;">
                                <span style="display:inline-block;min-width:150px">
                                    {{ $content['invoice_description'] }}
                                </span>
                            </p>
                        @endif

                        @if ($content['quick_invoice'] == 0)
                            <p style="font-weight:bold;font-size:12px;margin:56px 0 6px 0;">
                                <span style="display:inline-block;min-width:150px">
                                    Notes:
                                </span>
                            </p>

                            <p style="font-size:12px;margin:0 0 1px 0;">
                                <span style="display:inline-block;min-width:150px">
                                    {!! htmlspecialchars_decode($content['notes']) !!}
                                </span>
                            </p>
                        @endif

                    </td>

                    <td style="width:50%;vertical-align:top;margin:20px 0 0 0">
                        <table style="width:100%;font-size:12px;margin:0 0 1px 0;">
                            <tbody>
                                <tr>
                                    <td style="font-weight:bold;text-align:left;min-width:130px">
                                        <span style="display:inline-block;">
                                            SubTotal:
                                        </span>
                                    </td>
                                    <td style="font-weight:bold;text-align:right;">
                                        <span style="display:inline-block;">
                                            ${{ $content['sub_total'] }}
                                        </span>
                                    </td>
                                </tr>

                                @if ($content['discount_total'] > 0)
                                    <tr>
                                        <td style="text-align:left;min-width:130px">
                                            Discount Type:
                                            @if ($content['discount_type'] === 'Fixed')
                                                <span style="display:inline-block;">
                                                    Fixed
                                                </span>
                                            @else
                                                <span style="display:inline-block;">
                                                    Pct. ({{ $content['discount_amount'] }}%)
                                                </span>
                                            @endif
                                        </td>
                                        <td style="text-align:right;">
                                            <span style="display:inline-block;">
                                                ${{ $content['discount_total'] }}
                                            </span>
                                        </td>
                                    </tr>
                                @endif

                                <tr>
                                    <td style="text-align:left;min-width:130px">
                                        <span style="display:inline-block;">
                                            Total:
                                        </span>
                                    </td>

                                    <td style="text-align:right;">
                                        <span style="display:inline-block;">
                                            ${{ $content['balance_due'] }}
                                        </span>
                                    </td>
                                </tr>

                                {{-- <tr>
                                    <td style="font-weight:bold;text-align:left;min-width:130px">
                                        <span style="display:inline-block;">
                                            Converted Amount: ₱{{ $content['peso_rate'] }}
                                        </span>
                                    </td>
                                    <td style="font-weight:bold;text-align:right;">
                                        <span style="display:inline-block;">
                                            ₱{{ $content['converted_amount'] }}
                                        </span>
                                    </td>
                                </tr> --}}

                                @if (!empty($content['deductions']))
                                    <tr>
                                        <td style="padding-top:15px;font-weight:bold;text-align:left;min-width:130px">
                                            <span style="display:inline-block;">
                                                Deductions
                                            </span>
                                        </td>
                                    </tr>

                                    @php
                                        $total_deduction = 0;
                                    @endphp

                                    @foreach ($content['deductions'] as $deduction)
                                        <tr>
                                            <td style="word-wrap: break-word;text-align:left;min-width:130px">
                                                <span style="display:inline-block;">
                                                    {{ $deduction->profile_deduction_types->deduction_type_name }}
                                                </span>
                                            </td>

                                            <td style="text-align: right;color:#dc3545;">
                                                <span style="display:inline-block;">
                                                    ₱{{ number_format($deduction->amount, 2) }}
                                                </span>
                                            </td>
                                        </tr>
                                        @php
                                            $total_deduction += $deduction->amount;
                                        @endphp
                                    @endforeach


                                    <tr>
                                        <td style="font-weight:bold;text-align:left;min-width:130px">
                                            <span style="display:inline-block;">
                                                Total Deductions
                                            </span>
                                        </td>
                                        <td style="font-weight:bold;text-align:right;color:#dc3545;">
                                            <span style="display:inline-block;">
                                                ₱{{ number_format($total_deduction, 2) }}
                                            </span>
                                        </td>
                                    </tr>
                                @endif

                                <tr>

                                    <td style="padding-top:15px">
                                        <strong>Grand Total:</strong>
                                    </td>
                                    <td style="text-align: right;padding-top:15px">
                                        <strong>${{ $content['balance_due'] }}</strong>
                                    </td>
                                </tr>


                            </tbody>
                        </table>
                    </td>
                </tr>

                @if ($content['for'] == 'Admin')
                    <tr>
                        <td colspan="2">
                            <p style="text-align: right">
                                <a target="_blank"
                                    href="{{ $content['action_link'] }}/{{ $content['token'] }}?invoice_id={{ $content['invoice_id'] }}&for={{ $content['for'] }}"
                                    style="color: #FFF; border-color: #CF8029; border-style: solid; border-width: 10px 18px; background-color: #CF8029; display: inline-block; text-decoration: none; border-radius: 3px; box-shadow: 0 2px 3px rgba(0, 0, 0, 0.16); -webkit-text-size-adjust: none; box-sizing: border-box;">View
                                    Invoice Admin</a>
                            </p>
                        </td>
                    </tr>
                @endif

                @if ($content['for'] == 'Profile')
                    <tr>
                        <td colspan="2">
                            <p style="text-align: right">
                                <a target="_blank"
                                    href="{{ $content['action_link'] }}/{{ $content['token'] }}?invoice_id={{ $content['invoice_id'] }}&for={{ $content['for'] }}"
                                    style="color: #FFF; border-color: #CF8029; border-style: solid; border-width: 10px 18px; background-color: #CF8029; display: inline-block; text-decoration: none; border-radius: 3px; box-shadow: 0 2px 3px rgba(0, 0, 0, 0.16); -webkit-text-size-adjust: none; box-sizing: border-box;">View
                                    Invoice Profile</a>
                            </p>
                        </td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>

</body>

</html>
