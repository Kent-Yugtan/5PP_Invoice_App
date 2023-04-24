@extends('layouts.private')
@section('content-dashboard')
    <div class="container-fluid container-header" id="loader_load">

        <div class="row" style="padding-top:10px">
            @csrf

            <div class="col-lg-8 bottom10" style="padding-right:5px;padding-left:5px;">
                <form id="invoice_items" class="g-3 needs-validation" novalidate>
                    <div class="card-border shadow bg-white h-100">
                        <div class="card-body">
                            <div style="padding:20px">
                                <!-- <div class="row px-2 pb-3" id="header"> -->
                                <div class="row ">
                                    <div class="col-xl-12 col-md-12 bottom20">
                                        <span class="fs-3 ">Invoice Information</span>
                                    </div>
                                </div>

                                <div class="row">
                                    <input type="text" id="profileId" hidden>
                                    <div class="col-sm-6">
                                        <div class="row">
                                            <div class="col">
                                                <div class="form-group-profile">
                                                    <label for="profile_id" style="color: #A4A6B3;">Profile</label>
                                                    <select class="form-select" id="profile_id" required>
                                                        <option value="" selected disabled>Select Profile</option>
                                                    </select>
                                                    <div class="invalid-feedback">This field is required.</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="row">
                                            <div class="col">
                                                <div class="form-group-profile">
                                                    <label for="due_date" style="color: #A4A6B3;">Due Date</label>
                                                    <input type="text" id="due_date" name="due_date"
                                                        class="datepicker_input form-control" placeholder="Due Date"
                                                        required autocomplete="off">
                                                    <div class="invalid-feedback">This field is required.</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="row">
                                            <div class="col">
                                                <div class="form-group-profile">
                                                    <label for="description" style="color: #A4A6B3;">Description</label>
                                                    <input type="text" placeholder="Description" id="description"
                                                        class="form-control" required>
                                                    <div class="invalid-feedback">This field is required.</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12" id="show_items">
                                        <!-- FOR TABLE INVOICE DESCRIPTION DISPLAY -->
                                    </div>

                                    <!-- <div class="col-6"></div> -->
                                    <div class="col-12">
                                        <div class="row justify-content-end">
                                            <div class="col-sm-4">
                                                <button class="btn "
                                                    style="width:100%;color:white; background-color: #CF8029;"
                                                    id="add_item">Add
                                                    Item</button>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="row">
                                            <div class="col-lg-4" style="display: flex;align-items: start;">
                                                <div>
                                                    <label class="formGroupExampleInput2" style="color: #A4A6B3;">Discount
                                                        Type</label>
                                                    <br>
                                                    <input class="form-check-input" type="radio" name="discount_type"
                                                        id="discount_type" value="Fixed">
                                                    <label class="formGroupExampleInput2">
                                                        Fixed &nbsp; &nbsp;
                                                    </label>
                                                    <input class="discount_type form-check-input" type="radio"
                                                        name="discount_type" id="discount_type" value="Percentage">
                                                    <label class="formGroupExampleInput2">
                                                        Percentage
                                                    </label>
                                                    <!-- <input type="text" id="discount_type" class="form-control" /> -->
                                                </div>
                                            </div>

                                            <div class="col-lg-4">
                                                <div id="col_discount_amount" class="d-none">
                                                    <label for="discount_amount" class="label_discount_amount"
                                                        style="color: #A4A6B3;">Discount
                                                        Amount ($)</label>
                                                    <input type="text" step="any" style="text-align:right;"
                                                        name="discount_amount" id="discount_amount" maxlength="6"
                                                        class="form-control" />
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div id="col_discount_total" class="d-none">
                                                    <label style="color: #A4A6B3;" for="discount_total"
                                                        class="label_discount_total">Discount
                                                        Total ($)</label>
                                                    <input type="text" disabled
                                                        style="text-align:right; border:0px;background-color:white;"
                                                        onkeypress="return onlyNumberKey(event)" name="discount_total"
                                                        id="discount_total" class="form-control" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="row">
                                            <div class="col-sm-12 d-flex justify-content-end w-100">
                                                <div class="topBottom20" style="width: 290px !important;">
                                                    <div class="input-group">
                                                        <label class="d-flex align-items-center" for="sub_total"
                                                            style="color:#A4A6B3">Subtotal ($):
                                                        </label>
                                                        <input type="text"
                                                            style="font-weight: bold; text-align:right;border:none;background-color:white "
                                                            name="sub_total" id="sub_total"
                                                            class="form-control sub_total" readonly>
                                                        <div class="invalid-feedback"
                                                            style="padding-left: 85px;
                                                      ">
                                                            This field is required.</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="row">
                                            <div class="col-12 col-sm-4">
                                                <div>
                                                    <label class="formGroupExampleInput2" style="color: #A4A6B3;">Dollar
                                                        Amount
                                                        ($)</label>
                                                    <input type="text" id="dollar_amount"
                                                        style="font-weight: bold;border:none; text-align:left;background-color:white"
                                                        class="form-control dollar_amount" disabled />

                                                </div>
                                            </div>

                                            <div class="col-12 col-sm-4">
                                                <div>
                                                    <label class="formGroupExampleInput2" style="color: #A4A6B3;">Peso
                                                        Rate
                                                        (Php)</label>
                                                    <input type="text"
                                                        style="font-weight: bold;border:none; text-align:left;background-color:white"
                                                        onkeypress="return onlyNumberKey(event)" id="peso_rate"
                                                        class="form-control" disabled />
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-4">
                                                <div>
                                                    <label style="color: #A4A6B3;" class="formGroupExampleInput2"
                                                        for="form3Example2">Converted
                                                        Amount (Php)</label>
                                                    <input type="text"
                                                        style="font-weight: bold;border:none; text-align:left;background-color:white"
                                                        onkeypress="return onlyNumberKey(event)" id="converted_amount"
                                                        class="form-control converted_amount" disabled />
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="row">
                                            <div class="col">
                                                <span class="fs-3 fw-bold">Deductions</span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12" id="show_deduction_items">
                                    </div>

                                    <div class="col-12">
                                        <div class="row">
                                            <div class="col-sm-12 d-flex justify-content-end">
                                                <div class="input-group" style="width: 290px">
                                                    <label class="d-flex align-items-center fw-bold"
                                                        for="grand_total">Grand Total(Php):</label>
                                                    <input type="text" id="grand_total" class="form-control fw-bold"
                                                        style="text-align:right;border:0;background-color:white;" disabled>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="col-12">
                                            <div class="row">
                                                <div class="col-12 bottom20">
                                                    <label for="floatingTextarea" style="color:#A4A6B3">Notes</label>
                                                    <textarea class="form-control" placeholder="Leave a notes here" id="notes" name="notes"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
            </div>

            <div class="col-lg-4 bottom10 h-12-5 " style="padding-right:5px;padding-left:5px;">
                <div class="card-border shadow bg-white ">
                    <div class="card-body" style="padding-top:1rem;padding-bottom:1rem">
                        <div style="padding:20px">
                            <div class="row ">
                                <div class="col-sm-12 bottom20">
                                    <button type="submit" class="btn w-100"
                                        style="color:White; background-color:#CF8029;">Save</button>
                                </div>
                            </div>
                            <div class="row ">
                                <div class="col-sm-12  ">
                                    <button type="button" id="close_back" class="btn w-100"
                                        style="width:100%;color:#CF8029; background-color: #f3f3f3;">Close</button>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </form>
        </div>
    </div>

    <div style="position: fixed; top: 60px; right: 20px;">
        <div class="toast toast1 toast-bootstrap" role=" alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header">
                <div id="notifyIcon"></div>
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
        let total_deduction_amount = 0
        let x = 0;

        const PHP = value => currency(value, {
            symbol: '',
            decimal: '.',
            separator: ','
        });
        $(document).ready(function() {
            const api = "https://api.exchangerate-api.com/v4/latest/USD";

            $('div.spanner').addClass('show');
            setTimeout(function() {
                $('div.spanner').removeClass('show');
                display_item_rows();
                selectProfile();
            }, 1500)

            $('#due_date').each(function() {
                const datepicker = new Datepicker(this, {
                    'format': 'yyyy/mm/dd',
                });
                $(this).on('changeDate', function() {
                    datepicker.hide();
                });
            });


            var currentPage = window.location.href;
            console.log("CURRENT", currentPage);
            $('#collapseLayouts2 a').each(function() {
                // Compare the href attribute of the link to the current page URL
                if (currentPage.indexOf($(this).attr('href')) !== -1) {
                    // If there is a match, add the "active" class to the link
                    $(this).addClass('active');

                    // Trigger a click event on the parent link to expand the collapsed section
                    $(this).parent().parent().addClass("show");
                    $(this).parent().parent().addClass("active");
                    $('[data-bs-target="#collapseLayouts2"]').addClass('active');
                }
            });

            let toast1 = $('.toast1');
            toast1.toast({
                delay: 3000,
                animation: true
            });

            $('.close').on('click', function(e) {
                e.preventDefault();
                toast1.toast('hide');
            })

            $("#error_msg").hide();
            $("#success_msg").hide();

            $("#col_discount_amount").addClass('d-none');
            $("#col_discount_total").addClass('d-none');
            $(".label_discount_amount").addClass('d-none');
            $(".label_discount_total").addClass('d-none');


            $('input[type=radio][id=discount_type]').change(function() {

                if (subtotal == 0) {
                    $("#col_discount_amount").addClass('d-none');
                    $("#col_discount_total").addClass('d-none');
                    $(".label_discount_amount").addClass('d-none');
                    $(".label_discount_total").addClass('d-none');
                } else {
                    if (this.value == 'Fixed') {
                        //write your logic here
                        // console.log("FIXED");
                        $("#col_discount_amount").removeClass('d-none');
                        $("#col_discount_total").removeClass('d-none');
                        $(".label_discount_amount").removeClass('d-none');
                        $(".label_discount_total").removeClass('d-none');

                        $('#discount_amount').val('0.00');
                        $('#discount_total').val('0.00');

                    } else if (this.value == 'Percentage') {
                        //write your logic here
                        // console.log("PERCENTAGE");
                        $("#col_discount_amount").removeClass('d-none');
                        $("#col_discount_total").removeClass('d-none');
                        $(".label_discount_amount").removeClass('d-none');
                        $(".label_discount_total").removeClass('d-none');

                        $('#discount_amount').val('0.00');
                        $('#discount_total').val('0.00');
                    }
                }
                subtotal();
                Additems_total();
            })

            $('#discount_amount').on('keyup', function() {
                subtotal();
            })

            // FUNCTION FOR KEYUP CLASS DEDUCTIONS FOR DEDUCTIONS
            $('#show_deduction_items').on("keyup", ".multi2", function() {
                DeductionItems_total();
            });

            $('#show_deduction_items').focusout('.multi2', function() {
                let deduction_sum = 0;
                $('#show_deduction_items .deduction_amount').each(function() {
                    let parent = $(this).closest('.row');
                    let deduction_amount = parent.find('.deduction_amount').val();
                    parent.find('.deduction_amount').val(PHP(deduction_amount)
                        .format());
                })
            })

            $('#discount_amount').focusout(function() {
                if ($('#discount_amount').val() == "") {
                    $('#discount_amount').val('0.00');
                } else {
                    let discount_type = $("input[id='discount_type']:checked").val();
                    if (discount_type == 'Percentage') {
                        let discount_amount = $('#discount_amount').val();
                        let newDiscount_amount = discount_amount.replace(/[^\d.]/g,
                            ''); // Remove non-numeric characters
                        $('#discount_amount').val(newDiscount_amount);
                    } else {
                        let discount_amount = $('#discount_amount').val();
                        $('#discount_amount').val(PHP(discount_amount).format());
                    }
                }
                DeductionItems_total();
            })

            $('#show_items').focusout(".multi", function() {
                let invoiceItems_sum = 0;
                $('#show_items .row1').each(function() {
                    let parent = $(this).closest('.row1');
                    let quantity = parent.find('.quantity').val();
                    let rate = parent.find('.rate').val();
                    let amount = parent.find('.amount').val();

                    parent.find('.quantity').val(PHP(quantity).format());
                    parent.find('.rate').val(PHP(rate).format());
                    parent.find('.amount').val(PHP(amount).format());
                })
                DeductionItems_total();
            })

            function subtotal() {
                let discount_type = $("input[id='discount_type']:checked").val();
                let discount_amount = $('#discount_amount').val();
                let newDiscount_amount = discount_amount.replace(/[^\d.]/g, ''); // Remove non-numeric characters
                let discount_total = $('#discount_total').val();
                let sub_total = $('#sub_total').val();
                var sum = 0;

                $('#show_items .amount').each(function() {
                    sum += Number($(this).val().replace(/[^\d.]/g, ''));
                });

                if (discount_type == 'Fixed') {
                    $('#discount_total').val(PHP(parseFloat(newDiscount_amount * 1) ? parseFloat(
                            newDiscount_amount * 1) : 0)
                        .format());

                    let sub_total = (sum - $('#discount_total').val().replace(/[^\d.]/g, ''));
                    $('#sub_total').val(PHP(sub_total).format());
                    let dollar_amount = $('#sub_total').val();
                    $('#dollar_amount').val(PHP(dollar_amount).format());
                    DeductionItems_total()

                } else if (discount_type == 'Percentage') {

                    let percentage = parseFloat(((newDiscount_amount ? newDiscount_amount : 0) / 100) * sum);
                    $('#discount_total').val(PHP(percentage).format());
                    let sub_total = (parseFloat(sum) - parseFloat(percentage));
                    $('#sub_total').val(PHP(sub_total).format());
                    $('#dollar_amount').val(PHP(sub_total).format());
                    DeductionItems_total()
                }
                getResults_Converted();
            }

            // FUNCTION FOR DISPLAY RESULTS AND CONVERTED AMOUNT
            function getResults_Converted() {
                fetch(`${api}`)
                    .then(currency => {
                        return currency.json();
                    }).then(displayResults);
            }

            // FUNCTION FOR DISPLAY RESULTS AND CONVERTED AMOUNT
            function displayResults(currency) {
                let dollar_amount = $("#dollar_amount").val().replaceAll(',', '');
                let peso_rate = 0;
                let converted_amount = 0;
                let fromRate = currency.rates['USD'];
                let toRate = currency.rates['PHP'];
                peso_rate = (toRate / fromRate);
                converted_amount = ((toRate / fromRate) * dollar_amount);
                $('#peso_rate').val(PHP(parseFloat(peso_rate)).format());
                $('#converted_amount').val(PHP(parseFloat(converted_amount)).format());

                // $('#grand_total').val((converted_amount - total_deduction_amount).toFixed(
                //     2));
            }

            // FUNCTION FOR KEYUP CLASS MULTI INPUTS FOR ADD ITEMS
            $('#show_items').on("keyup", ".multi", function() {
                let sub_total = 0;
                let parent = $(this).closest('.row');
                let quantity = parent.find('.quantity').val().replaceAll(',', '');
                let rate = parent.find('.rate').val().replaceAll(',', '');
                let newQuantity = quantity.replace(/[^\d.]/g, '');
                let newRate = rate.replace(/[^\d.]/g, '');

                sub_total = parseFloat(newQuantity * newRate);
                parent.find('.amount').val(PHP(sub_total).format());
                // getResults_Converted();
                Additems_total();
                subtotal();
            });

            // FUNCTION FOR DISPLAYING SUBTOTAL AMOUNT AND DOLLAR AMOUNT
            function Additems_total() {
                var sum = 0;
                let converted_amount = 0;
                $('#show_items .amount').each(function() {
                    sum += Number($(this).val().replace(/[^\d.]/g, ''));
                });

                $('#sub_total').val(PHP(parseFloat(sum)).format());
                $('#dollar_amount').val(PHP(parseFloat(sum)).format());
            }

            // FUNCTION FOR CALCUTAION DEDUCTIONS
            function DeductionItems_total() {
                var deduction_sum = 0;
                let converted_amount = 0;
                let dollar_amount = 0;
                let converted_amount_input = 0;
                let peso_rate = 0;
                let grand_total = 0;

                $('#show_deduction_items .deduction_amount').each(function() {
                    deduction_sum += Number($(this).val().replace(/[^\d.]/g, ''));
                })

                $('#show_items .amount').each(function() {
                    converted_amount += Number($(this).val().replace(/[^\d.]/g, ''));
                });

                peso_rate = $('#peso_rate').val().replaceAll(',', '') ? $('#peso_rate').val()
                    .replaceAll(
                        ',', '') :
                    0;
                dollar_amount = $('#dollar_amount').val().replaceAll(',', '') ? $('#dollar_amount')
                    .val()
                    .replaceAll(',', '') : 0;
                converted_amount_input = parseFloat(dollar_amount * peso_rate);
                grand_total =
                    parseFloat(converted_amount_input - deduction_sum);
                $('#grand_total').val(PHP(grand_total).format());
                // console.log("grand_total", grand_total);
            }

            // FUNCTION CLICK FOR REMOVING INVOICE ITEMS ROWS
            $(document).on('click', '.remove_items', function(e) {
                e.preventDefault();
                let parent = $(this).closest('.row');
                let sub_total = parent.find('.sub_total').val();
                let row_item = $(this).parent().parent().parent();
                if (row_item) {
                    $.confirm({
                        columnClass: 'col-sm-4',
                        icon: 'fa fa-warning',
                        draggable: false,

                        title: 'Are you sure?',
                        content: '<div class="row"><div class="col text-center"><img class="" src="{{ asset('images/Delete.png') }}" style="width: 50%; padding:10px" /></div></div><div class="row"><div class="col text-center"><label>Do you really want to delete these record? This process cannot be undone.<label></div></div>',
                        autoClose: 'Cancel|5000',
                        buttons: {
                            removeDeductions: {
                                btnClass: 'btn btn-danger',
                                text: 'Confirm',
                                action: function() {
                                    $(row_item).remove();
                                    if ($('#show_items > .row').length === 1) {
                                        $('#show_items > .row').find('.col-remove-item')
                                            .removeClass('d-none')
                                            .addClass(
                                                'd-none');
                                    }
                                    getResults_Converted();
                                    Additems_total();
                                    subtotal();
                                    DeductionItems_total();
                                    x--;
                                }
                            },
                            Cancel: function() {}
                        },
                        onClose: function() {
                            // before the modal is hidden.
                        },
                    });
                }
            });

            // FUNCTION CLICK FOR REMOVING INVOICE DEDUCTIONS ROWS
            $(document).on('click', '.remove_deductions', function(e) {
                e.preventDefault();
                let parent = $(this).closest('.row');
                let row_item = $(this).parent().parent().parent();
                if (row_item) {
                    $.confirm({
                        columnClass: 'col-sm-4',
                        icon: 'fa fa-warning',
                        draggable: false,

                        title: 'Are you sure?',
                        content: '<div class="row"><div class="col text-center"><img class="" src="{{ asset('images/Delete.png') }}" style="width: 50%; padding:10px" /></div></div><div class="row"><div class="col text-center"><label>Do you really want to delete these record? This process cannot be undone.<label></div></div>',
                        autoClose: 'Cancel|5000',
                        buttons: {
                            removeDeductions: {
                                btnClass: 'btn btn-danger',
                                text: 'Confirm',
                                action: function() {
                                    $(row_item).remove();
                                    getResults_Converted();
                                    Additems_total();
                                    subtotal();
                                    DeductionItems_total();
                                    x--;
                                }
                            },
                            Cancel: function() {}
                        },
                        onClose: function() {
                            // before the modal is hidden.
                        },
                    })
                }

            });

            // FUNCTION CLICK FOR DISPLAY INVOICE ITEM ROWS
            $("#add_item").click(function(e) {
                e.preventDefault();
                display_item_rows()
            });

            // INITIALIZE DISPLAY ITEM ROWS
            function display_item_rows() {
                let max_fields = 5;
                if (x < max_fields) {
                    let wrapper = $('#show_items');
                    add_rows = '';
                    add_rows += '<div class="row row1">';
                    add_rows += '<div class="col-lg-4 ">';
                    add_rows += '<div class="form-group-profile">';
                    // add_rows += '<div class="form-floating form-group">';
                    add_rows += '<label for="item_description" style="color:#A4A6B3">Item Desctiption</label>';
                    add_rows +=
                        '<input type="text" name="item_description" placeholder="Item Description" id="item_description" class="form-control item_description" required/>';
                    // add_rows += '</div>';
                    add_rows += '<div class="invalid-feedback">This field is required.</div>';
                    add_rows += '</div>';
                    add_rows += '</div>';

                    add_rows += '<div class="col-lg-2">';
                    // add_rows += '<div class="form-floating form-group">';
                    add_rows += '<div class="form-group-profile">';
                    add_rows += '<label for="quantity" style="color:#A4A6B3">Quantity</label>';
                    add_rows +=
                        '<input type="text" step="any" maxlength="4" placeholder="Quantity" name="quantity" id="quantity" style="text-align:right;" class="form-control multi quantity"  />';
                    // add_rows += '</div>';
                    // add_rows += '<div class="invalid-feedback">This field is required.</div>';
                    add_rows += '</div>';
                    add_rows += ' </div>';

                    add_rows += '<div class="col-lg-3">';
                    add_rows += '<div class="form-group-profile">';
                    // add_rows += '<div class="form-floating form-group">';
                    add_rows += '<label for="rate" style="color:#A4A6B3">Rate</label>';
                    add_rows +=
                        '<input type="text" step="any" name="rate" placeholder="Rate" id="rate" style="text-align:right;" class="form-control multi rate" maxlength="6" />';
                    // add_rows += '</div>';
                    // add_rows += '<div class="invalid-feedback">This field is required.</div>';
                    add_rows += '</div>';
                    add_rows += '</div>';

                    add_rows += '<div class="col-lg-2 bottom20">';
                    add_rows +=
                        '<label for="amount" style="color:#A4A6B3;display:grid;justify-content:end">Amount</label>';
                    add_rows +=
                        '<input type="text" style="text-align:right;border:none;background-color:white" readonly name="amount" id="amount" class="form-control amount" />';

                    add_rows += '</div>';

                    add_rows +=
                        '<div class="col-lg-1 topbottom20 " style="display:flex;justify-content:center">';
                    add_rows += '<div class="col-remove-item d-none" >';
                    // add_rows += '<label></label>';
                    add_rows +=
                        '<button class="btn remove_items " ><i class="fa fa-trash" style="color:red"></i></button>';
                    add_rows += '</div>';
                    add_rows += '</div>';

                    add_rows += '</div>'
                    $(wrapper).append(add_rows);

                    if ($('#show_items > .row').length > 1) {
                        $('#show_items > .row').each(function() {
                            $(this).find('.col-remove-item').removeClass('d-none');
                        })
                    } else {
                        $('#show_items > .row').find('.col-remove-item').removeClass('d-none').addClass(
                            'd-none');
                    }
                    x++;
                }
            }

            // ONLY NUMBERS FOR NUMBER INPUTS
            function onlyNumberKey(evt) {
                // Only ASCII character in that range allowed
                var ASCIICode = (evt.which) ? evt.which : evt.keyCode
                if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57))
                    return false;
                return true;
            }

            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var invoice_items = document.querySelectorAll('.needs-validation')
            // Loop over them and prevent submission
            Array.prototype.slice.call(invoice_items)
                .forEach(function(form) {
                    form.addEventListener('submit', function(event) {
                        if (!form.checkValidity()) {
                            event.preventDefault()
                            event.stopPropagation()
                        }
                        form.classList.add('was-validated')
                    }, false)
                })

            // ADD INVOICE SUBMIT BUTTON
            $('#invoice_items').submit(function(e) {
                e.preventDefault();

                // CONDITION IF THERE IS BLANK ROW
                $('#show_items .row1').each(function() {
                    let parent = $(this).closest('.row1');
                    let row_item = $(this).parent();
                    let item_rate = $(this).find('.rate').val();
                    let item_qty = $(this).find('.quantity').val();

                    if (item_rate == "" && item_qty == "") {

                        // console.log("row_item", parent);

                        if ($('#show_items > .row').length === 1) {
                            $('#show_items > .row').find('.col-remove-item')
                                .removeClass(
                                    'd-none')
                                .addClass(
                                    'd-none');
                        } else {
                            $(parent).remove();
                        }
                    }
                    x--;
                });

                let profile_id = $('#profileId').val();
                // let invoice_no = $('#invoice_no').val();
                // INVOICE TABLE
                let due_date = $('#due_date').val();
                let description = $('#description').val();
                let invoice_subtotal = $('#sub_total').val().replaceAll(',', '');
                let peso_rate = $('#peso_rate').val().replaceAll(',', '')
                let invoice_converted_amount = $('#converted_amount').val().replaceAll(',', '');
                let invoice_discount_type = $('#discount_type:checked').val();
                let invoice_discount_amount = $('#discount_amount').val().replaceAll(',', '');
                let invoice_discount_total = $('#discount_total').val().replaceAll(',', '');
                let invoice_total_amount = $('#grand_total').val().replaceAll(',', '');
                let invoice_notes = $('#notes').val();

                // INVOICE ITEMS TABLE
                let invoiceItems = [];
                $('#show_items .row').each(function() {
                    let item_description = $(this).find('.item_description').val() ? $(
                            this)
                        .find(
                            '.item_description').val() : "";
                    let item_rate = $(this).find('.rate').val().replaceAll(',', '') ? $(
                            this)
                        .find(
                            '.rate').val().replaceAll(',', '') : 0;
                    let item_qty = $(this).find('.quantity').val() ? $(this)
                        .find('.quantity').val() : 0;
                    let item_total_amount = $(this).find('.amount').val().replaceAll(
                            ',', '') ?
                        $(
                            this).find('.amount')
                        .val().replaceAll(',', '') : "0.00";

                    invoiceItems.push({
                        item_description,
                        item_rate,
                        item_qty,
                        item_total_amount,
                    })
                });

                // DEDUCTIONS TABLE
                let Deductions = [];
                $('#show_deduction_items .row').each(function() {
                    let profile_deduction_type_id = $(this).find('.profile_deduction_type_id')
                        .val();
                    let deduction_type_name = $(this).find('.deduction_type_name').val();
                    let deduction_amount = $(this).find('.deduction_amount').val().replaceAll(',',
                        '');

                    Deductions.push({
                        profile_deduction_type_id,
                        deduction_type_name,
                        deduction_amount,
                    })
                });

                let data = {
                    profile_id: profile_id,
                    due_date: due_date,
                    description: description,
                    peso_rate: peso_rate ? peso_rate : 0,
                    sub_total: invoice_subtotal,
                    converted_amount: invoice_converted_amount ? invoice_converted_amount : 0,
                    discount_type: invoice_discount_type,
                    discount_amount: invoice_discount_amount ? invoice_discount_amount : 0,
                    discount_total: invoice_discount_total ? invoice_discount_total : 0,
                    grand_total_amount: invoice_total_amount ? invoice_total_amount : 0,
                    notes: invoice_notes,
                    invoiceItems,
                    Deductions,
                }

                console.log("DATA", data);
                axios.post(apiUrl + "/api/createinvoice2", data, {
                    headers: {
                        Authorization: token
                    },
                }).then(function(response) {
                    let data = response.data;
                    if (data.success) {
                        // console.log("SUCCES", data.success);
                        $("div.spanner").addClass("show");
                        setTimeout(function() {
                            $("div.spanner").removeClass("show");
                            $('#invoice_items').trigger('reset'); // reset the form
                            $('#show_deduction_items').empty();
                            $('textarea').val('');
                            $('#dataTable_deduction tbody').empty();
                            $(".label_discount_amount").addClass('d-none');
                            $(".label_discount_total").addClass('d-none');
                            $("#discount_amount").addClass('d-none');
                            $("#discount_total").addClass('d-none');
                            $('input').removeClass('is-invalid');
                            $('input, select').removeClass('is-invalid');
                            $('.invalid-feedback').remove();
                            $('#notifyIcon').html(
                                '<i class="fa-solid fa-check" style="color:green"></i>');
                            $('.toast1 .toast-title').html('Success');
                            $('.toast1 .toast-body').html(response.data.message);
                            $('html,body').animate({
                                scrollTop: $('#sb-nav-fixed').offset().top
                            }, 'slow');
                            toast1.toast('show');
                            $('#invoice_items').trigger('reset');
                            $('#invoice_items').removeClass('was-validated');
                            $('#show_items').empty();
                            display_item_rows();
                        }, 1500)

                    }
                }).catch(function(error) {
                    console.log("error.response.data.errors", error.response.data.errors);
                    // if () {
                    //     $('input').removeClass('is-invalid');
                    //     $('input, select').removeClass('is-invalid');
                    //     $('.invalid-feedback').remove();
                    //     var errors = error.response.data.errors;
                    //     var errorContainer = $('#error-container');
                    //     errorContainer.empty();
                    //     console.log("errors", errors)

                    //     for (var key in errors) {
                    //         var inputName = key.replace('_', ' ');
                    //         inputName = inputName.charAt(0).toUpperCase() + inputName.slice(1);
                    //         var errorMsg = errors[key][0];
                    //         $('#' + key).addClass('is-invalid');
                    //         $('#' + key).parent().append(
                    //             '<span class="invalid-feedback">This field is required.</span>');
                    //     }
                    // } else {
                    //     $('input').removeClass('is-invalid');
                    //     $('input, select').removeClass('is-invalid');
                    //     $('.invalid-feedback').remove();
                    // }
                    // console.log("errors", error);
                    // if (error.response.data.errors) {
                    //   let errors = error.response.data.errors;
                    //   let fieldnames = Object.keys(errors);

                    //   Object.values(errors).map((item, index) => {
                    //     fieldname = fieldnames[0].split('_');
                    //     fieldname.map((item2, index2) => {
                    //       fieldname['key'] = capitalize(item2);
                    //       return ""
                    //     });
                    //     fieldname = fieldname.join(" ");

                    //     $('.toast1 .toast-title').html(fieldname);
                    //     $('.toast1 .toast-body').html(Object.values(errors)[
                    //       0].join(
                    //       "\n\r"));
                    //   })
                    //   setTimeout(function() {
                    //     $('div.spanner').removeClass('show');
                    //     toast1.toast('show');
                    //   }, 1500);
                    // }
                });

            });

            $('#close_back').on('click', function(e) {
                e.preventDefault();
                $('html,body').animate({
                    scrollTop: $('#sb-nav-fixed').offset().top
                }, 'slow');
                $('div.spanner').addClass('show');
                setTimeout(function() {
                    $('div.spanner').removeClass('show');
                    $('#invoice_items').trigger('reset'); // reset the form
                    $("#discount_amount").addClass('d-none');
                    $('#show_deduction_items').empty();
                    $('#dataTable_deduction tbody').empty();
                    location.href = apiUrl + "/invoice/current"
                }, 1500)
            });

            function capitalize(s) {
                if (typeof s !== 'string') return "";
                return s.charAt(0).toUpperCase() + s.slice(1);
            }

            $("#profile_id").on('change', function() {
                let id = $('#profile_id').val(); //USER ID ang g.kuha
                $('#show_deduction_items').empty();
                axios
                    .get(apiUrl + '/api/invoice/check_profile/' + id, {
                        headers: {
                            Authorization: token,
                        },
                    }).then(function(response) {
                        let data = response.data;
                        if (data.success) {
                            let deduction_count = data.data.profile_deduction_types.length;
                            console.log("profile_deduction_types", data);
                            $("#profileId").val(data.data.id);

                            if (deduction_count > 0) {
                                data.data.profile_deduction_types.map((item) => {
                                    add_rows = '';
                                    add_rows += '<div class="row">';
                                    add_rows += '<div class="col-sm-6">';
                                    add_rows += '<div class="form-group w-100">';
                                    add_rows +=
                                        '<input type="text" class="profile_deduction_type_id" value=' +
                                        item.id +
                                        ' hidden>';
                                    add_rows +=
                                        '<label for="deduction_type_name" style="color:#A4A6B3">Deduction Type</label>';
                                    add_rows +=
                                        '<input type="text" class="form-control deduction_type_name" id="deduction_type_name" name="deduction_type_name" value="' +
                                        item.deduction_type_name + '" readonly>';
                                    // add_rows +=
                                    //   '<select class="form-control deduction_type_name" id="deduction_type_name" name="deduction_type_name">';
                                    // add_rows += '<option value=' + item.deduction_type_name +
                                    //   '>' + item.deduction_type_name + '</option> ';
                                    // add_rows += '</select>';

                                    add_rows += '</div>';
                                    add_rows += '</div>';

                                    add_rows += '<div class="col-sm-5">';
                                    add_rows += '<div class="form-group ">';
                                    add_rows +=
                                        '<label for="deduction_amount" style="color:#A4A6B3">Deduction Amount (Php)</label>';
                                    add_rows +=
                                        '<input type="text" value="' + PHP(item
                                            .amount)
                                        .format() +
                                        '" style="text-align:right;" id="deduction_amount" maxlength="6" name="deduction_amount" class="form-control multi2 deduction_amount" />';
                                    add_rows += '</div>';
                                    add_rows += '</div>';

                                    add_rows +=
                                        '<div class="col-sm-1 col-remove-deductions d-flex justify-content-center align-items-center" >';
                                    add_rows +=
                                        '<button type="button" class="btn remove_deductions" ><i class="fa fa-trash pe-1" style="color:red"></i></button>';
                                    add_rows += '</div>';


                                    add_rows += '</div>';

                                    $('#show_deduction_items').append(add_rows);
                                    return '';
                                })

                                // $('#profile_id').val(data.data.id);

                                // getResults_Converted();
                                // Additems_total();
                                // subtotal();
                            }
                            DeductionItems_total();
                        }

                    }).catch(function(error) {
                        console.log("error", error);
                    });
            })

            function selectProfile() {
                axios.get(apiUrl + '/api/show_profile', {
                    headers: {
                        Authorization: token,
                    },
                }).then(function(response) {
                    let data = response.data;
                    if (data.success) {
                        console.log("SUCCESS", data);
                        if (data.data.length > 0) {
                            data.data.map((item) => {
                                let option = '';
                                option += '<option value=' + item.id + ' >' + item.full_name +
                                    '</option>';
                                $('#profile_id').append(option);
                            })
                        } else {
                            $("#profile_id").append(
                                '<option disabled value="" >No Data</option>'
                            );
                        }
                    }

                }).catch(function(error) {
                    console.log("ERROR", error);
                })
            }
        });
    </script>
@endsection
