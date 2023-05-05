<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Send Email</title>

</head>
<style>
    table td {
        /* padding: 3px 0px 3px 0px; */
        /* border: 1px solid #006; */
        /* TABLE TD BORDER */
    }
</style>

<body style="font-family: Open Sans, sans-serif;font-weight:400;line-height:1.4;color:#000;">
    <table style="max-width:500px;margin:10px auto 10px;background-color:#fff;padding:20px;">
        <thead>
            @if ($content['invoice_logo'])
                <tr>
                    <th colspan="3" style="text-align:center;">
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

                    <p style="font-size:12px;margin:0 0 1px 0;"><span style="display:inline-block;min-width:150px">
                            {{ $content['user_email'] }}</span></p>

                    <p style="font-size:12px;margin:0 0 1px 0;"><span style="display:inline-block;min-width:150px">
                            {{ $content['address'] }}</span></p>
                    <p style="font-size:12px;margin:0 0 1px 0;"><span style="display:inline-block;min-width:150px">
                            {{ $content['city'] }}</span></p>
                    <p style="font-size:12px;margin:0 0 1px 0;"><span style="display:inline-block;min-width:150px">
                            {{ $content['province'] }}</span></p>
                    <p style="font-size:12px;margin:0 0 1px 0;"><span style="display:inline-block;min-width:150px">
                            Philippines,{{ $content['zip_code'] }}</span></p>
                </td>

                <td colspan="2">
                    {{-- <p style="text-align:right;margin:0 0 22px 0 ">
                        <span style="font-weight:bold;font-size:40px;display:inline-block;min-width:150px">
                            INVOICE
                        </span>
                        <span style="font-size:20px;display:inline-block;min-width:150px">
                            #{{ $content['invoice_no'] }}
                        </span>
                    </p> --}}
                    <table style="width:100%;font-size:12px;margin:0 0 18px 0;border-collapse:collapse;">
                        <tbody>
                            <tr>
                                <td style="text-align:right;">
                                    <span style="font-weight:bold;font-size:40px;display:inline-block;min-width:150px">
                                        INVOICE
                                    </span>
                                </td>
                            </tr>

                            <tr>
                                <td style="text-align:right;">
                                    <span style="font-size:20px;display:inline-block;min-width:150px">
                                        #{{ $content['invoice_no'] }}
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
                <td style="vertical-align:top;padding-top:23px">
                    <p style="font-size:12px;margin:0 0 1px 0;"><span style="display:inline-block;">
                            Bill To:</span></p>
                    <p style="font-weight:bold;font-size:12px;margin:0 0 1px 0;"><span style="display:inline-block;">
                            {{ $content['invoice_title'] }}</span></p>
                    <p style="font-size:12px;margin:0 0 1px 0;"><span style="display:inline-block;">
                            {{ $content['invoice_email'] }}</span></p>
                    <p style="font-size:12px;margin:0 0 1px 0;"><span style="display:inline-block;">
                            {!! htmlspecialchars_decode($content['bill_to_address']) !!}</span></p>
                </td>

                <td style="vertical-align:top;margin:20px 0 0 0">
                    <table style="width:100%;font-size:12px;margin:0 0 1px 0;border-collapse:collapse;">
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
                    <table style="width:100%;font-size:12px;margin:0 0 1px 0;border-collapse:collapse;">
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
                                {{ $content['notes'] }}
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

                            <tr>
                                <td style="font-weight:bold;text-align:left;min-width:130px">
                                    <span style="display:inline-block;">
                                        Converted Amount: P{{ $content['peso_rate'] }}
                                    </span>
                                </td>
                                <td style="font-weight:bold;text-align:right;">
                                    <span style="display:inline-block;">
                                        P{{ $content['converted_amount'] }}
                                    </span>
                                </td>
                            </tr>

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
                                                P{{ number_format($deduction->amount, 2) }}
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
                                            P{{ number_format($total_deduction, 2) }}
                                        </span>
                                    </td>
                                </tr>
                            @endif

                            <tr>

                                <td style="padding-top:15px">
                                    <strong>Grand Total:</strong>
                                </td>
                                <td style="text-align: right;padding-top:15px">
                                    <strong>P{{ $content['grand_total_amount'] }}</strong>
                                </td>
                            </tr>


                        </tbody>
                    </table>
                </td>
            </tr>
        </tbody>
    </table>
</body>

</html>
