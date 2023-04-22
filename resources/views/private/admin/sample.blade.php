<div class="d-none" id="selectInactive">
    <div class="input-group" style="width:145px !important">
        <select id="tbl_showing_inactivePages" class="form-select">
            <option value="10">10</option>
            <option value="25">25</option>
            <option value="50">50</option>
            <option value="75">75</option>
            <option value="100">100</option>
        </select>
        <span class="input-group-text border-0">/Page</span>
    </div>
</div>

let pageSize = 10; // initial page size

$('#tbl_showing_pendingInvoicePages').on('change', function() {
let pages = $(this).val();
pageSize = pages; // update page size variable
// Call the pendingInvoices() function with updated filters
pendingInvoices({
page_size: pages
});
})

let filter = {
page_size: pageSize,
page: page ? page : 1,
...filters,
}

$('#selectPending').removeClass('d-none');

$('#selectPending').addClass('d-none');

selectEmailConfigs

tbl_showing_emailConfigsPages
