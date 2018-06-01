$(document).ready(function () {
    $('.serialSave').click(function (e) {
        serial = [];
        var missing = $('#itemSet').data('missing');
        var btn = '#' + $('#itemSet').data('btn');
        var selected = $('.itemCheckboxes:checked').length;
        if (selected > missing) {
            alert('You have selected too many serial. Remove ' + (selected - missing) + ' serial to continue.');
        } else if (selected < missing) {
            alert('You neeed to select ' + (missing - selected) + ' more serial to continue.');
        } else {
            $(btn).remove();
            $('#reconSerialSelect').modal('toggle');
            if (localStorage.getItem('serial') !== null) {
                serial = JSON.parse(localStorage.getItem('serial'));
            }
            $("input[name^=serial]:checked").each(function () {
                serial.push($(this).val());
            });
            localStorage.setItem('serial', JSON.stringify(serial));


        }
        var visible = $('.serial-btn:visible');
        if (visible.length === 0) {
            $('#reconcile-btn').removeAttr('hidden');
            $('#compare-btn').attr('hidden', 'hidden');
        }

    });
    $('#reconSerialSelect').on('show.bs.modal', function (e) {
        btn = $(e.relatedTarget).attr('id');
        $status = $('#serialTab').find('.active').data('status');
        id = $(e.relatedTarget).data('id');
        $missing = $(e.relatedTarget).data('missing');
        if ($status === 1) {
            item_name = [];
            serial = [];
            $.ajax({
                url: "Inventory/getRecSerial/" + id,
                method: "POST",
                dataType: 'JSON',
                success: function (data) {
                    for (i = 0; i <= data.length - 1; i++) {
                        item_name.push('<input name="serial[]" class="itemCheckboxes" type="checkbox" value=' + data[i].serial + '>' + data[i].serial + '<br>');

                    }

                    $('#items').html('<div id="itemSet" data-btn=' + btn + ' data-missing=' + $missing + '><h4>' + data[0].item_name + '</h4>' + item_name.join('') + '</div>');
                }
            });
        }

    })
    $('.AcceptReturn').on('show.bs.modal', function (e) {
        f = $(e.relatedTarget).data('func');
        $('#returnAct').attr('onclick', f);
    });
//load data dash
    setInterval(function () {
        /*$("#tUser").load("inventory/totalUser");
        $("#itemsrec").load("inventory/itemsReceived");
        $("#itemsiss").load("inventory/issuedItems");
        $("#retitem").load("inventory/returnedItems");
        $("#expitems").load("inventory/totalExpired");
        $("#tcost").load("inventory/totalCost");
        $("#tItemsDay").load("inventory/itemsThisDay");
        $("#pendItems").load("inventory/pendingItems");
        $("#tReturnedDay").load("inventory/itemsReturnedThisDay");
        $("#tExprdSO").load("inventory/itemsExpiredSO");
        $("#tCostSO").load("inventory/itemTcostSO");*/

        /* increasedit();
         issuedit();
         returnit();
         expiredit();
         editit();
 */
    }, 1000);
    $returnTable = $('#returnTable');
    $reportTable = $('#reportTable');
    var $reportOption = $('#reportsOption');
    var $selectValue = '0';
    //report table
    $reportTable.bootstrapTable({
        url: 'inventory/getReport/' + $selectValue + '/ALL',
        columns: [{
            field: 'OR_no',
            title: 'OR_number'
        }, {
            field: 'date_delivered',
            title: 'Date Delivered'
        }, {
            field: 'item_name',
            title: 'Item Name'
        }, {
            field: 'item_description',
            title: 'Description'
        }, {
            field: 'item_type',
            title: 'Type'
        }, {
            field: 'quantity',
            title: 'Quantity',
            class: 'quantityCol'
        }, {
            field: 'unit_cost',
            title: 'Unit Cost',
            class: 'unitCostCol'
        }, {
            field: 'supplier_name',
            title: 'Supplier'
        }]
    });
    //select report on change

    $reportOption.change(function () {
        var type = $('input[type=radio][name=type]:checked').val();
        var visible = true;
        var from = $('#from').val();
        var to = $('#to').val();
        var $reportOption = $(this).val();
        $reportTable = $('#reportTable');
        var url = 'Inventory/getReport/' + $reportOption + '/' + type;
        if (from !== '' || to !== '') {
            url = 'Inventory/getReportWithDate/' + $reportOption + '/' + type + '/' + from + '/' + to;
        }


        if (type !== 'ALL') {
            visible = false;
        }
        if ($reportOption === '0') {
            $reportTable.bootstrapTable('destroy');
            $reportTable.bootstrapTable({
                url: url,
                columns: [{
                    field: 'OR_no',
                    title: 'OR_number'
                }, {
                    field: 'date_delivered',
                    title: 'Date Delivered'
                }, {
                    field: 'item_name',
                    title: 'Item Name'
                }, {
                    field: 'item_description',
                    title: 'Description'
                }, {
                    field: 'item_type',
                    title: 'Type',
                    visible: visible
                }, {
                    field: 'quantity',
                    title: 'Quantity',
                    class: 'quantityCol'
                }, {
                    field: 'unit_cost',
                    title: 'Unit Cost',
                    class: 'unitCostCol'
                }, {
                    field: 'supplier_name',
                    title: 'Supplier'
                }]
            });
        } else if ($reportOption === '1') {
            $reportTable.bootstrapTable('destroy');
            $reportTable.bootstrapTable({
                url: url,
                columns: [{
                    field: 'PR_no',
                    title: 'PR #'
                }, {
                    field: 'department',
                    title: 'Department'
                }, {
                    field: 'date_received',
                    title: 'Date'
                }, {
                    field: 'item_name',
                    title: 'Item Name'
                }, {
                    field: 'item_description',
                    title: 'Description'
                }, {
                    field: 'item_type',
                    title: 'Type',
                    visible: visible
                }, {
                    field: 'quantity_distributed',
                    title: 'Quantity',
                    class: 'quantityCol'
                }, {
                    field: 'cost',
                    title: 'Cost'
                }, {
                    field: 'account_code',
                    title: 'Account Code'
                }, {
                    field: 'supply_officer',
                    title: 'Supply Officer'
                }]
            });
        } else if ($reportOption === '2') {
            $reportTable.bootstrapTable('destroy');
            $reportTable.bootstrapTable({
                url: url,
                columns: [{
                    field: 'department',
                    title: 'Department'
                }, {
                    field: 'date_returned',
                    title: 'Date'
                }, {
                    field: 'item_name',
                    title: 'Item Returned'
                }, {
                    field: 'item_description',
                    title: 'Description'
                }, {
                    field: 'item_type',
                    title: 'Type',
                    visible: visible
                }, {
                    field: 'return_quantity',
                    title: 'Quantity',
                    class: 'quantityCol'
                }, {
                    field: 'receiver',
                    title: 'Returned to'
                }, {
                    field: 'status',
                    title: 'Status'
                }, {
                    field: 'remarks',
                    title: 'Remarks'
                }]
            });
        } else {
            $reportTable.bootstrapTable('destroy');
            $reportTable.bootstrapTable({
                url: url,
                columns: [{
                    field: 'supplier_name',
                    title: 'Supplier'
                }, {
                    field: 'date_delivered',
                    title: 'Date'
                }, {
                    field: 'item_name',
                    title: 'Item Name'
                }, {
                    field: 'item_description',
                    title: 'Description'
                }, {
                    field: 'item_type',
                    title: 'Type',
                    visible: visible
                }, {
                    field: 'quantity',
                    title: 'Quantity',
                    class: 'quantityCol'
                }, {
                    field: 'unit',
                    title: 'Unit'
                }, {
                    field: 'cost',
                    title: 'Cost'
                }]
            });
        }
    });
    $('input[type=radio][name=type]').change(function () {
        var type = $(this).val();
        var visible = true;
        var from = $('#from').val();
        var to = $('#to').val();
        var $reportOption = $('#reportsOption').val();
        $reportTable = $('#reportTable');
        var url = 'Inventory/getReport/' + $reportOption + '/' + type;
        if (from !== '' || to !== '') {
            url = 'Inventory/getReportWithDate/' + $reportOption + '/' + type + '/' + from + '/' + to;
        }


        if (type !== 'ALL') {
            visible = false;
        }
        if ($reportOption === '0') {
            $reportTable.bootstrapTable('destroy');
            $reportTable.bootstrapTable({
                url: url,
                columns: [{
                    field: 'OR_no',
                    title: 'OR_number'
                }, {
                    field: 'date_delivered',
                    title: 'Date Delivered'
                }, {
                    field: 'item_name',
                    title: 'Item Name'
                }, {
                    field: 'item_description',
                    title: 'Description'
                }, {
                    field: 'item_type',
                    title: 'Type',
                    visible: visible
                }, {
                    field: 'quantity',
                    title: 'Quantity',
                    class: 'quantityCol'
                }, {
                    field: 'unit_cost',
                    title: 'Unit Cost',
                    class: 'unitCostCol'
                }, {
                    field: 'supplier_name',
                    title: 'Supplier'
                }]
            });
        } else if ($reportOption === '1') {
            $reportTable.bootstrapTable('destroy');
            $reportTable.bootstrapTable({
                url: url,
                columns: [{
                    field: 'PR_no',
                    title: 'PR #'
                }, {
                    field: 'department',
                    title: 'Department'
                }, {
                    field: 'date_received',
                    title: 'Date'
                }, {
                    field: 'item_name',
                    title: 'Item Name'
                }, {
                    field: 'item_description',
                    title: 'Description'
                }, {
                    field: 'item_type',
                    title: 'Type',
                    visible: visible
                }, {
                    field: 'quantity_distributed',
                    title: 'Quantity',
                    class: 'quantityCol'
                }, {
                    field: 'cost',
                    title: 'Cost'
                }, {
                    field: 'account_code',
                    title: 'Account Code'
                }, {
                    field: 'supply_officer',
                    title: 'Supply Officer'
                }]
            });
        } else if ($reportOption === '2') {
            $reportTable.bootstrapTable('destroy');
            $reportTable.bootstrapTable({
                url: url,
                columns: [{
                    field: 'department',
                    title: 'Department'
                }, {
                    field: 'date_returned',
                    title: 'Date'
                }, {
                    field: 'item_name',
                    title: 'Item Returned'
                }, {
                    field: 'item_description',
                    title: 'Description'
                }, {
                    field: 'item_type',
                    title: 'Type',
                    visible: visible
                }, {
                    field: 'return_quantity',
                    title: 'Quantity',
                    class: 'quantityCol'
                }, {
                    field: 'receiver',
                    title: 'Returned to'
                }, {
                    field: 'status',
                    title: 'Status'
                }, {
                    field: 'remarks',
                    title: 'Remarks'
                }]
            });
        } else {
            $reportTable.bootstrapTable('destroy');
            $reportTable.bootstrapTable({
                url: url,
                columns: [{
                    field: 'supplier_name',
                    title: 'Supplier'
                }, {
                    field: 'date_delivered',
                    title: 'Date'
                }, {
                    field: 'item_name',
                    title: 'Item Name'
                }, {
                    field: 'item_description',
                    title: 'Description'
                }, {
                    field: 'item_type',
                    title: 'Type',
                    visible: visible
                }, {
                    field: 'quantity',
                    title: 'Quantity',
                    class: 'quantityCol'
                }, {
                    field: 'unit',
                    title: 'Unit'
                }, {
                    field: 'cost',
                    title: 'Cost'
                }]
            });
        }
    });

    //supply officer options
    var $ownerOpt = $('.ownerOpt');
    var users = [];
    $.ajax({
        url: "inventory/getSupplyOfficers/11",
        dataType: 'JSON',
        success: function (data) {
            for (var i = 0; i <= data.length - 1; i++) {
                users += "<option value=" + data[i].user_id + ">" + data[i].name + "<br>";
            }
            $ownerOpt.html(users);

        }
    });

    //dashboard new items
    function increasedit() {
        var $notifitems = $('#increase');
        var detail = [];

        $.ajax({
            url: "inventory/itemsReceived",
            dataType: 'JSON',
            success: function (data) {
                for (var i = 0; i < data.length; i++) {
                    if (data[i].countinc !== '0') {
                        detail += "<a href='#' class=\"list-group-item\"><i class=\"fa fa fa-cubes\">" + 'Item ' + data[i].itemname + ' Added by ' + data[i].custodian + "</a>"
                    } else {
                        detail = "No Data Found!"
                    }
                }
                $notifitems.html(detail);
            }
        });
    }

    //dashboard issued items to department
    function issuedit() {
        var $issueditems = $('#issued');
        var issued = [];

        $.ajax({
            url: "inventory/issuedItems",
            dataType: 'JSON',
            success: function (data) {
                for (var i = 0; i < data.length; i++) {
                    if (data[i].issuedcount !== '0') {
                        issued += "<a href='#' class=\"list-group-item\"><i class=\"fa fa fa-cubes\">" + 'Item ' + data[i].itemname + ' Issued by ' + data[i].custodian + ' to ' + data[i].department + "</a>"
                    } else {
                        issued = "No Data Found!"
                    }
                }
                $issueditems.html(issued);
            }
        });
    }


    //dashboard returned items
    function returnit() {
        var $returneditems = $('#returned');
        var returned = [];

        $.ajax({
            url: "inventory/returnedItems",
            dataType: 'JSON',
            success: function (data) {

                for (var i = 0; i < data.length; i++) {
                    if (data[i].returncount !== '0') {
                        returned += "<a href='#' class=\"list-group-item\"><i class=\"fa fa fa-cubes\">" + 'Item ' + data[i].itemname + ' Returned by ' + data[i].department + "</a>"

                    } else {
                        returned = "No Data Found!"
                    }
                }
                $returneditems.html(returned);
            }
        });
    }

    //dashboard expired items
    function expiredit() {
        var $expireditems = $('#expired');
        var expired = [];

        $.ajax({
            url: "inventory/totalExpired",
            dataType: 'JSON',
            success: function (data) {
                for (var i = 0; i < data.length; i++) {
                    if (data[i].expirecount !== '0') {
                        expired += "<a href='#' class=\"list-group-item\"><i class=\"fa fa fa-cubes\">" + 'Item ' + data[i].itemname + ' has reached its life span' + "</a>"
                    } else {
                        expired = "No Data Found!"
                    }
                }
                $expireditems.html(expired);
            }
        });
    }

    //dashboard edited items
    function editit() {
        var $editeditems = $('#edited');
        var edited = [];

        $.ajax({
            url: "inventory/editedItems",
            dataType: 'JSON',
            success: function (data) {
                for (var i = 0; i < data.length; i++) {
                    if (data[i].editcount !== '0') {
                        edited += "<a href='#' class=\"list-group-item\"><i class=\"fa fa fa-cubes\">" + data[i].custodian + ' changed ' + data[i].fieldedit + ' of ' + data[i].oldvalue + ' to ' + data[i].newvalue + "</a>"
                    } else {
                        edited = "No Data Found!"
                    }
                }
                $editeditems.html(edited);
            }
        });
        //return table
    }

    $returnTable.bootstrapTable('refresh', {url: 'inventory/viewReturn'}).bootstrapTable({
        url: 'inventory/viewReturn',
        columns: [{
            field: 'dept',
            title: 'Department'
        }, {
            field: 'item',
            title: 'Item Returned'
        }, {
            field: 'desc',
            title: 'Description'
        }, {
            field: 'quantity',
            title: 'Quantity',
            class: 'quantityCol'
        }, {
            field: 'date',
            title: 'Date Returned'
        }, {
            field: 'itemstatus',
            title: 'Item Status'
        }, {
            field: 'reason',
            title: 'Reason'
        }, {
            field: 'receiver',
            title: 'Received by'
        }, {
            field: 'status',
            title: 'Status'
        }, {
            field: 'action',
            title: 'Action'
        }]
    });


    $('#uname').change(function () {
        var username = $('#uname').val();
        if (username != '') {
            $.ajax({
                url: "Search/checkUsername",
                method: "POST",
                data: {username: username},
                success: function (data) {
                    $('#uname_result').html(data);
                }
            });
        }
    });

    $('#email').on('blur', function () {
        var email = $(this).val();
        if (email !== '') {
            $.ajax({
                url: 'Search/checkEmail',
                method: 'POST',
                data: {email: email},
                success: function (data) {
                    $('#email-res').html(data);
                }
            });
        }
    });

    $("#checkAll").click(function () {
        $(".check").prop('checked', $(this).prop('checked'));
    });

    $('#username').change(function () {
        var username = $('#username').val();
        if (username != '') {
            $.ajax({
                url: "Search/checkUsername",
                method: "POST",
                data: {username: username},
                success: function (data) {
                    $('#username_result').html(data);
                }
            });
        }
    });


    [].slice.call(document.querySelectorAll('select.cs-select')).forEach(function (el) {
        new SelectFx(el);
    });

    $('.selectpicker').selectpicker;


    $('#menuToggle').on('click', function (event) {
        $('body').toggleClass('open');
    });

    $('.search-trigger').on('click', function (event) {
        event.preventDefault();
        event.stopPropagation();
        $('.search-trigger').parent('.header-left').addClass('open');
    });

    $('.search-close').on('click', function (event) {
        event.preventDefault();
        event.stopPropagation();
        $('.search-trigger').parent('.header-left').removeClass('open');
    });


    //initialize
    init_inventory();
    init_list();
    modal();
    init_bulkFucntion();
    init_editlog();
    serialize_forms();
// add contact supplier
    var contact_max_fields = 5; //maximum input boxes allowed
    var contact_wrapper = $(".input_contact"); //Contact Fields wrapper
    var contact_add_button = $(".contact_add"); //Contact Add button ID
    var email_max_fields = 5; //maximum input boxes allowed
    var email_wrapper = $(".input_email"); //Email Fields wrapper
    var email_add_button = $(".email_add"); // Email Add button ID

    var x = 1; //initlal text box count
    var y = 1;
    $(contact_add_button).click(function (e) { //on add input button click
        e.preventDefault();
        if (x < contact_max_fields) { //max input box allowed
            x++; //text box increment
            $(contact_wrapper).append('<div><input id="contactno" name="contact[]" >' +
                '<button class="remove_field btn btn-danger btn-sm contact"><i class="fa fa-times "></i></button></div>'); //add input box
        } else {
            alert('You reached the maximum allowed number of contact number');
        }
    });

    $(contact_wrapper).on("click", ".remove_field", function (e) { //user click on remove text
        e.preventDefault();
        $(this).parent('div').remove();
        x--;
    });

// add email supplier
    $(email_add_button).click(function (e) { //on add input button click
        e.preventDefault();
        if (y < email_max_fields) { //max input box allowed
            y++; //text box increment
            $(email_wrapper).append('<div><input id="email" name="email[]" >' +
                '<button class="remove_field btn btn-danger btn-sm email"><i class="fa fa-times "></i></button></div>'); //add input box
        } else {
            alert('You reached the maximum allowed number of email accounts');
        }
    });

    $(email_wrapper).on("click", ".remove_field", function (e) { //user click on remove text
        e.preventDefault();
        $(this).parent('div').remove();
        y--;
    })


});


//action for returns
function return_action($action, $retun_id, $s) {
    var $serial = [];
    var status = $('#itemstatus').val();
    if ($s === 1) {
        $ser = $('.ser');
        for (var i = 0; i <= $ser.length - 1; i++) {
            $serial.push($ser[i].value);
        }
    }
    $.ajax({
        url: 'Inventory/return_actions',
        method: 'POST',
        data: {serial: $serial, action: $action, return_id: $retun_id, item_status: status},
        success: function (response) {
            // location.reload();
        }
    });
}

function saveSerial() {
    data = $('#viewSerialForm').serializeArray();
    $.ajax({
        url: 'Inventory/addSerial',
        method: 'POST',
        data: data,
        success: function (response) {
            if (response > 0) {
                $('.serialdrop').click();
                $('#detail-tab-table').bootstrapTable('refresh')
            } else {
                alert('Serial not saved.');
            }
        }
    });
}

function editSupplier(data) {
    toggleDiv($('.editSupplier-tab '), $('.supplier-tab'));
    $('#edtbuttonsupplier').val(data.id);
    $('#supplier').val(data.supplier);
    $('#location').val(data.address);
    $('#contactno1').html(data.contactInput);
    $('#postal1').val(data.postal);
    $('#email1').html(data.emailInput);
    $('#tin1').val(data.tin);
    $('#status').val(data.status);
}

// go to detail
function detail(data) {
    var $detailtable = $('#detail-tab-table');
    var $ledger = $('#ledger');
    var $rmItems = $('#removed-table');

    $('#edtbutton').val(data.item_id);
    $('#itemname').val(data.item);
    $('#itemdesc').val(data.description);
    $('#total').text(data.quantity);
    $('#itemtype').val(data.item_type);
    $('#unit').val(data.unit);
    $('#initialStock').text(data.initialStock);
    $('#initialCost').text(data.initialCost);

    toggleDiv($('.detail-tab '), $('.inventory-tab'));

    $detailtable.bootstrapTable('refresh', {url: 'inventory/detail/inv/' + data.item_id + '/0'});
    $detailtable.bootstrapTable({
        url: 'inventory/detail/inv/' + data.item_id + '/0',
        columns: [{
            field: 'remove',
            title: '',
            align: 'center',
            width: '5%'
        }, {
            field: 'PO',
            title: 'PO number',
            width: '8%'
        }, {
            field: 'del',
            title: 'Delivery Date',
            width: '14%'

        }, {
            field: 'rec',
            title: 'Date Received',
            width: '14%'

        }, {
            field: 'exp',
            title: 'Estimated Useful Life',
            width: '14%'

        }, {
            field: 'cost',
            title: 'Unit Cost',
            class: 'unitCostCol',
            width: '10%'

        }, {
            field: 'sup',
            title: 'Supplier',
            width: '10%'

        }, {
            field: 'quant',
            title: 'Quantity',
            class: 'quantityCol',
            width: '9%'

        }, {
            field: 'or',
            title: 'OR number',
            width: '8%'

        }, {
            field: 'action',
            title: 'Action',
            width: '8%'

        }]
    });
    $ledger.bootstrapTable('refresh', {url: 'inventory/getLedger/' + data.item_id});
    $ledger.bootstrapTable({
        pageSize: 10,
        url: 'inventory/getLedger/' + data.item_id,
        resizable: true,
        columns: [{
            sortable: true,
            field: 'date',
            title: 'Date'
        }, {
            sortable: true,
            field: 'reference',
            title: 'Reference'
        }, {
            sortable: true,
            field: 'increased',
            title: '+ Increased'
        }, {
            sortable: true,
            field: 'decreased',
            title: '- Decreased'
        }, {
            sortable: true,
            field: 'price',
            title: 'Unit Cost',
            class: 'unitCostCol'
        }, {
            sortable: true,
            field: 'running_quantity',
            title: 'Running Quantity',
            class: 'quantityCol'
        }, {
            sortable: true,
            field: 'running_balance',
            title: 'Running Balance',
            class: 'quantityCol'
        }, {
            sortable: true,
            field: 'transaction',
            title: 'Transaction'
        }]
    });
    $rmItems.bootstrapTable('refresh', {url: 'inventory/showRemovedItems/' + data.item_id});
    $rmItems.bootstrapTable({
        url: 'inventory/showRemovedItems/' + data.item_id,
        columns: [{
            field: 'PO',
            title: 'PO Number'
        }, {
            field: 'del',
            title: 'Delivery Date'
        }, {
            field: 'rec',
            title: 'Date Received'
        }, {
            field: 'exp',
            title: 'Estimated Useful Life'
        }, {
            field: 'cost',
            title: 'Unit Cost',
            class: 'unitCostCol'
        }, {
            field: 'sup',
            title: 'Supplier'
        }, {
            field: 'quant',
            title: 'Quantity',
            class: 'quantityCol'
        }, {
            field: 'or',
            title: 'OR number'
        }, {
            field: 'action',
            title: 'Action',
            formatter: function (row, data) {
                return '<button onclick=revertDetail(' + data['item_det_id'] + ',' + data['serialStatus'] + ') class=\"btn btn-success\">Revert</button>';
            }
        }]
    });
    serialize_forms();

}

function deptDet(data) {
    var $detailtable = $('#detail-tab-table');
    var $detailTab = $('.detail-tab ');
    console.log(data);

    $('#itemname').html(data.name);
    $('#itemdesc').html(data.description);
    $('#total').html(data.quant);
    $('#itemtype').html(data.item_type);
    $('#unit').html(data.unit);
    toggleDiv($detailTab, $('.department-tab'));
    toggleDiv($detailTab, $('.inventory-tab'));

    $detailtable.bootstrapTable('refresh', {url: 'Inventory/detail/dept/' + data.id + '/' + data.dept_id})
        .bootstrapTable({
            url: 'inventory/detail/dept/' + data.id + '/' + data.dept_id,
            columns: [{
                field: 'PR',
                title: 'PR Number'
            }, {
                field: 'receiver',
                title: 'Supply Officer'
            }, {
                field: 'rec',
                title: 'Date Received'
            }, {
                field: 'exp',
                title: 'Estimated Useful Life'
            }, {
                field: 'cost',
                title: 'Unit Cost',
                class: 'unitCostCol'
            }, {
                field: 'sup',
                title: 'Supplier'
            }, {
                field: 'quant',
                title: 'Quantity',
                class: 'quantityCol'
            }, {
                field: 'or',
                title: 'OR number'
            }, {

                field: 'action',
                title: 'Action'
            }]
        });

    serialize_forms();
}


function userDetail(id) {
    var item;
    $.ajax({
        url: 'users/getuser/' + id,
        dataType: 'JSON',
        success: function (data) {
            toggleDiv($('.userDetail'), $('.accounts-tab'));
            $('#edtbutton').val(id);
            $('#first').val(data.firstname);
            $('#last').val(data.lastname);
            $('#em').val(data.email);
            $('#cno').val(data.contactno);
            $('#pword').val(data.password);
            $('#stat').val(data.status);
        }
    });
}

var counter = 0;

function insertRow() {
    var supplier = [];
    $('#detail-tab-table').find('tr:last').after('<tr id=detTab' + counter + '> ' +
        '<td  style=""></td>' +
        '<td style="width:"><input name="PO[' + counter + ']" class="form-control form-control-sm" placeholder="PO #" type="text"></td> ' +
        '<td style=""><input name="del[' + counter + ']" class="form-control form-control-sm" type="date"></td> ' +
        '<td style=""><input name="rec[' + counter + ']" class="form-control form-control-sm" type="date"></td> ' +
        '<td style=""><input name="exp[' + counter + ']" class="form-control form-control-sm" type="date"></td> ' +
        '<td style=""><input name="cost[' + counter + ']" class="form-control form-control-sm" type="number"></td> ' +
        '<td style=""><select name="supp[' + counter + ']" list="typelist" class="supplieropt form-control form-control-sm"></select></td> ' +
        '<td style=""><input name="quant[' + counter + ']" class="form-control form-control-sm" type="text"></td> ' +
        '<td style=""><input name="or[' + counter + ']" class="form-control form-control-sm" type="text"></td> ' +
        '<td style=""><i onclick="addquant(' + counter + ')" class="fa fa-check" id="rowcheck"></i>' +
        '<i onclick="removeRow(' + counter + ')" class="fa fa-times" id="rowcancel"></i></td> ' +
        '</tr>');
    $.ajax({
        url: 'supplier/supplieroption',
        dataType: 'JSON',
        success: function (data) {
            for (var i = 0; i < data.length; i++) {
                supplier += "<option value=" + data[i].id + ">" + data[i].supplier + "<br>";
            }
            $('.supplieropt').html(supplier);
        }
    });
    counter++;
}

//remove inserted row
function removeRow($counter) {
    $('#detTab' + $counter).remove();
}

function addquant(c) {
    var $item_det_id = $('#DetailDropDn').find('a').data('id');
    var data = $('#addQuant').serializeArray();
    var $det = $('#detTab' + c);
    console.log($det);
    var temp = [];
    $.ajax({
        url: 'Inventory/addquant/' + $item_det_id + '/' + c,
        type: 'POST',
        data: data,
        success: function (result) {
            res = JSON.parse(result);
            $det.html(res);
        }
    });
}

function addSupplier() {
    toggleDiv($('.addSupplier'), $('.supplier-tab'));
}

// initialize inventory list
function init_inventory() {
    var $itemTable = $('#itemtable');
    var $MOOEtable = $('#MOOEtable');
    var $supplier = $('#supplier-table');
    var $userTable = $('#user-table');
    var $ws = $('#withoutSerial');
    var $serializedItems = $('#serializedItems');

    $ws.bootstrapTable({
        pageSize: 10,
        url: 'inventory/viewItemPerStatus/0',
        resizable: true,

        columns: [{
            formatter: function (data, row) {
                return "<input class=reconid hidden value=" + data + ">";
            },
            field: 'state',
            checkbox: 'true'
        }, {
            sortable: true,
            field: 'item',
            title: 'Name'
        }, {
            sortable: true,
            field: 'description',
            title: 'Description'
        }, {
            sortable: true,
            cellStyle: function (data) {
                return {
                    classes: 'quantity',
                    css: {"color": "green"}
                };
            },
            field: 'quantity',
            title: 'In-Stock',
            class: 'inStockCol'

        }, {
            sortable: true,
            field: 'unit',
            title: 'Unit'
        }, {
            sortable: true,
            field: 'cost',
            title: 'Unit Cost',
            class: 'unitCostCol'
        }, {
            sortable: true,
            field: 'totalcost',
            title: 'Total Cost',
            class: 'totalCostCol'
        }, {
            sortable: true,
            field: 'count',
            title: 'Physical Count'
        }, {
            sortable: true,
            cellStyle: function (data) {
                return {
                    classes: 'result',
                    css: {"color": "green"}
                };
            },
            field: 'result',
            title: 'Results'

        }, {
            sortable: true,
            field: 'remarks',
            title: 'Remarks'
        }
        ]

    });

    $serializedItems.bootstrapTable({
        pageSize: 10,
        url: 'inventory/viewItemPerStatus/1',
        resizable: true,

        columns: [{
            formatter: function (data, row) {
                return "<input class=reconid hidden value=" + data + "></input>";
            },
            field: 'id',
            checkbox: 'true'
        }, {
            sortable: true,
            field: 'item',
            title: 'Name'
        }, {
            sortable: true,
            field: 'description',
            title: 'Description'
        }, {
            sortable: true,
            cellStyle: function (data) {
                return {
                    classes: 'quantity',
                    css: {"color": "green"}
                };
            },
            field: 'quantity',
            title: 'In-Stock',
            class: 'inStockCol'
        }, {
            sortable: true,
            field: 'unit',
            title: 'Unit'
        }, {
            sortable: true,
            field: 'cost',
            title: 'Unit Cost',
            class: 'unitCostCol'
        }, {
            sortable: true,
            field: 'totalcost',
            title: 'Total Cost',
            class: 'totalCostCol'
        }, {
            sortable: true,
            field: 'count',
            title: 'Physical Count'
        }, {
            sortable: true,
            cellStyle: function (data) {
                return {
                    classes: 'result',
                    css: {"color": "green"}
                };
            },
            field: 'result',
            title: 'Results'

        }, {
            sortable: true,
            field: 'remarks',
            title: 'Remarks'
        }
        ]
        // }, {
        //     sortable: true,
        //     field: 'Price',
        //     title: 'PRICE'
        // }]
    });

    $supplier.bootstrapTable('refresh', {url: 'supplier/viewsuppliers'})
        .bootstrapTable({
            pageSize: 10,
            url: 'supplier/viewsuppliers',
            onClickRow: function (data, row) {
                editSupplier(data);
            },
            resizable: true,
            columns: [{
                sortable: true,
                field: 'supplier',
                title: 'Supplier Name'
            }, {
                sortable: true,
                field: 'address',
                title: 'Address'
            }, {
                sortable: true,
                field: 'postal',
                title: 'Postal Code'
            }, {
                sortable: true,
                field: 'contactList',
                formatter: function (data, row) {
                    return '<ul class="list-unstyled">' + data + '</ul>';
                },
                title: 'Primary Contact number'
            }, {
                sortable: true,
                field: 'emailList',
                title: 'Email',
                formatter: function (data, row) {
                    return '<ul class="list-unstyled">' + data + '</ul>';
                },
            }, {
                sortable: true,
                field: 'tin',
                title: 'TIN'
            }, {
                sortable: true,
                field: 'status',
                title: 'Status'
            }]
        });

    $userTable.bootstrapTable('refresh', {url: 'Users/display_users'})
        .bootstrapTable({
            pageSize: 10,
            url: 'Users/display_users',
            onClickRow: function (data, row) {
                userDetail(data.id);
            },
            resizable: true,
            columns: [{
                sortable: true,
                field: 'date_created',
                title: 'Date Created'
            }, {
                sortable: true,
                field: 'name',
                title: 'Name'
            }, {
                sortable: true,
                field: 'email',
                title: 'Email'
            }, {
                sortable: true,
                field: 'contactno',
                title: 'Contact'
            }, {
                sortable: true,
                field: 'username',
                title: 'Username'
            }, {
                sortable: true,
                field: 'position',
                title: 'Position'
            }, {
                sortable: true,
                field: 'department',
                title: 'Department'
            }, {
                sortable: true,
                field: 'status',
                title: 'Status'
            }]
        });
    $itemTable.bootstrapTable('refresh', {url: 'inventory/viewItem/CO'})
        .bootstrapTable({
            pageSize: 10,
            url: 'inventory/viewItem/CO',
            onClickRow: function (data, row) {
                if (data.position === 'Supply Officer') {
                    deptDet(data);
                } else {
                    detail(data);
                }
            },
            resizable: true,
            columns: [{
                sortable: true,
                field: 'item',
                title: 'Name',
            }, {
                sortable: true,
                field: 'description',
                title: 'Description'
            }, {
                sortable: true,
                cellStyle: function (data) {
                    return {
                        css: {"color": "green"}
                    };
                },
                field: 'quantity',
                title: 'In-Stock',
                class: 'inStockCol'

            }, {
                sortable: true,
                field: 'unit',
                title: 'Unit'
            }, {
                sortable: true,
                field: 'cost',
                title: 'Unit Cost',
                class: 'unitCostCol'
            }, {
                sortable: true,
                field: 'totalcost',
                title: 'Total Cost',
                class: 'totalCostCol'
            }, {
                sortable: true,
                field: 'serialStatus',
                title: 'Serial',
                cellStyle: function (data) {
                    return {
                        css: {"color": "green"}
                    };
                }
            }]
        });
    $MOOEtable.bootstrapTable('refresh', {url: 'inventory/viewItem/MOOE'})
        .bootstrapTable({
            pageSize: 10,
            url: 'inventory/viewItem/MOOE',
            onClickRow: function (data, row) {
                if (data.position === 'Supply Officer') {
                    deptDet(data);
                } else {
                    detail(data);
                }
            },
            resizable: true,
            columns: [{
                sortable: true,
                field: 'item',
                title: 'Name'
            }, {
                sortable: true,
                field: 'description',
                title: 'Description'
            }, {
                sortable: true,
                cellStyle: function (data) {
                    return {
                        css: {"color": "green"}

                    };
                },
                field: 'quantity',
                title: 'In-Stock',
                class: 'inStockCol'
            }, {
                sortable: true,
                field: 'unit',
                title: 'Unit'
            }, {
                sortable: true,
                field: 'cost',
                title: 'Unit COST',
                class: 'unitCostCol'
            }, {
                sortable: true,
                field: 'totalcost',
                title: 'Total Cost',
                class: 'totalCostCol'
            }, {
                sortable: true,
                field: 'serialStatus',
                title: 'Serial',
                cellStyle: function (data) {
                    return {
                        css: {"color": "green"}
                    };
                }
            }]
            // }, {
            //     sortable: true,
            //     field: 'Price',
            //     title: 'PRICE'
            // }]
        });


    $('#headingTwo').on('click', function () {
        toggleDiv($('.additemDiv'), $('.inventory-tab'));
    });
    $('#headingOne').on('click', function () {
        toggleDiv($('.AddSup'), $('.inventory-tab'));
    });
    $('#headingZero').on('click', function () {
        toggleDiv($('.addUser'), $('.accounts-tab'));
    });

    $('.compare').on('click', function () {
        $status = $('#serialTab').find('.active').data('status');
        var quant = [];
        var pc = [];
        var $result = [];
        var $recon = $('.reconitem ');
        for (var i = 0; i <= $recon.length - 1; i++) {
            $q = $('.quantity')[i].textContent;
            reconID = $('.reconid')[i].value;
            $result = $q - $recon[i].value;
            if ($result === 0) {
                $result = 'equal';
            } else if ($result === $q) {
                $result = 'no input';
            } else if ($result > 0) {
                if ($status === 1) {
                    $result = ($result) + ' missing. Select the missing serial.' +
                        '<a id=itemRec' + reconID + ' class="serial-btn btn btn-primary" data-id=' + reconID + ' data-missing=' + $result + ' ' +
                        'data-toggle="modal" data-target="#reconSerialSelect">\n' +
                        ' Select Serial\n' +
                        '</a>\n';
                } else {
                    $result = ($result) + ' missing';
                }

            } else if (($result) < 0) {
                $result = 'more than ' + Math.abs($result);
            } else {
                $result = '';
            }
            $('.result')[i].innerHTML = $result;
        }
    });


    $('select.itemtype').change(function () {
        $('.hideInput').toggleClass('hidden');
    });
    $('#genReport_Buttons').on('click', function () {
        toggleDiv($('.generateReport'), $('.inventory-tab'));
    });
    $('#reconcileButton').on('click', function () {
        localStorage.clear();
        $.ajax({
            url: "Inventory/checkSerial",
            dataType: 'JSON',
            success: function (data) {
                if (data === false) {
                    alert('Please input all serial before reconciling.');
                } else {
                    toggleDiv($('.reconcilePage'), $('.inventory-tab'));
                }
            }
        });
    });
    console.log('init_inventory');

}

//initialize lists
function init_list() {
    var department = [];
    var accountCode = [];
    var supplier = [];
    var $deptOpt = $('.deptopt');
    var $ownerOpt = $('.ownerOpt');

    var $deptTable = $('#departmentTable');
    var $deptMOOEtable = $('#deptMOOEtable');

    //show account code options
    $.ajax({
        url: 'inventory/getacccodes',
        dataType: 'JSON',
        success: function (data) {
            for (var i = 0; i < data.length; i++) {
                accountCode += "<option value=" + data[i].ac_id + ">" + data[i].account_code + " " + data[i].description + "<br>";
            }
            $('#accode').html(accountCode);
        }
    });
    $('ul .current-page a').css('background-color', 'rgb(9,14,23)');//sidebar hover
    //Show department option
    $.ajax({
        url: 'inventory/getdept',
        dataType: 'JSON',
        success: function (data) {
            for (var i = 0; i < data.length; i++) {
                department += "<option value=" + data[i].dept_id + ">" + data[i].department + "<br>";
            }
            $deptOpt.html(department);
            $deptOpt.change(function () {
                $id = $(this).val()
                var users = [];
                $.ajax({
                    url: "inventory/getSupplyOfficers/" + $id,
                    dataType: 'JSON',
                    success: function (data) {
                        for (var i = 0; i <= data.length - 1; i++) {
                            users += "<option value=" + data[i].user_id + ">" + data[i].name + "<br>";
                        }
                        $ownerOpt.html(users);

                    }
                });
            });
        }
    });

    $deptTable.bootstrapTable({
        url: 'inventory/viewdept/CO/11',
        onClickRow: function (data, row) {
            deptDet(data);
        },
        resizable: true,
        columns: [{
            sortable: true,
            field: 'name',
            title: 'Name'
        }, {
            sortable: true,
            field: 'description',
            title: 'Description'
        }, {
            sortable: true,
            field: 'unit',
            title: 'Unit'

        }, {
            sortable: true,
            cellStyle: function (data) {
                return {
                    css: {"color": "green"}
                };
            },
            field: 'quant',
            title: 'Quantity Distributed',
            class: 'quantityCol'
        }]
    });
    $deptMOOEtable.bootstrapTable({
        pageSize: 10,
        url: 'inventory/viewdept/MOOE/11',
        onClickRow: function (data, row) {
            deptDet(data);
        },
        resizable: true,
        columns: [{
            sortable: true,
            field: 'name',
            title: 'Nssame'
        }, {
            sortable: true,
            field: 'description',
            title: 'Description'
        }, {
            sortable: true,
            field: 'unit',
            title: 'Unit'
        }, {
            sortable: true,
            cellStyle: function (data) {
                return {
                    css: {"color": "green"}
                };
            },
            field: 'quant',
            title: 'Quantity Distributed',
            class: 'quantityCol'
        }]
        // }, {
        //     sortable: true,
        //     field: 'Price',
        //     title: 'PRICE'
        // }]
    });
    // on department change
    $('#select-dept').change(function () {
        var id = $(this).val();
        var type = $('#myTab').find('[aria-selected=true]')[0].id;
        if (id === null) {
            id = 11;
        }
        if (type === 'CO-tab') {
            $deptTable.bootstrapTable('refresh', {url: 'inventory/viewdept/CO/' + id});
        } else {
            $deptMOOEtable.bootstrapTable('refresh', {url: 'inventory/viewdept/MOOE/' + id});
        }
    });
    //show supplier options
    $.ajax({
        url: 'supplier/supplieroption',
        dataType: 'JSON',
        success: function (data) {
            for (var i = 0; i < data.length; i++) {
                supplier += "<option value=" + data[i].id + ">" + data[i].supplier + "<br>";
            }
            $('.supplieropt').html(supplier);
        }
    });

    console.log('init_list');
}

function init_editlog() {
    var $editlogtableco = $('#editlogco');
    var $editlogtablemooe = $('#editlogmooe');

    $editlogtableco.bootstrapTable({
        pageSize: 10,
        url: 'logs/editlogitem/CO',
        onClickRow: function (data, row) {
            editlogdet(data.id);

        },
        resizable: true,
        columns: [{
            field: 'id',
            visible: false
        }, {
            sortable: true,
            field: 'name',
            title: 'Item Name'
        }, {
            sortable: true,
            field: 'description',
            title: 'Item Description'
        }, {
            sortable: true,
            field: 'type',
            title: 'Item Type'
        }, {
            sortable: true,
            field: 'unit',
            title: 'Unit'
        }]
    });
    $editlogtablemooe.bootstrapTable({
        pageSize: 10,
        url: 'logs/editlogitem/MOOE ',
        onClickRow: function (data, row) {
            editlogdet(data.id);
        },
        resizable: true,
        columns: [{
            field: 'id',
            visible: false
        }, {
            sortable: true,
            field: 'name',
            title: 'Item Name'
        }, {
            sortable: true,
            field: 'description',
            title: 'Item Description'
        }, {
            sortable: true,
            field: 'type',
            title: 'Item Type'
        }, {
            sortable: true,
            field: 'unit',
            title: 'Unit'
        }]
    });

}

function editlogdet(id) {

    var editmodal = $('#editlogmodal');
    var $editmodaltable = $('#editlog');
    editmodal.modal("show");

    $editmodaltable.bootstrapTable({
        pageSize: 10,
        url: 'logs/editlog/' + id,
        resizable: true,
        columns: [{
            sortable: true,
            field: 'timestamp',
            title: 'Date Transfered'
        }, {
            sortable: true,
            field: 'fieldedited',
            title: 'Field Edited'
        }, {
            sortable: true,
            field: 'oldvalue',
            title: 'Old Value'
        }, {
            sortable: true,
            field: 'newvalue',
            title: 'New Value'
        }]
    });

}

//for editting
function serialize_forms() {
    $('.serialForm , .profileform')
        .each(function () {
            $(this).data('serialized', $(this).serialize());
        })
        .on('change input', function () {
            $(this).serialize();
            $(this)
                .find('button:submit')
                .attr('disabled', $(this).serialize() === $(this).data('serialized'));
        })
        .find('button:submit')
        .attr('disabled', true);

    console.log('forms serialzed');
}

//modal events
function modal() {
    //distribute modal
    var item_id = 1;
    $('.Distribute').on('show.bs.modal', function (e) {
        var $quantityLeft = $(e.relatedTarget).data('quantity');
        var $listDist = $('#listdist').empty();
        var $quantity = $('#distquant').val();
        var $serialTab = $('#serialtab');

        var input = "";
        var div = "";
        var active = 'active';
        var skip = 1;
        var counter = 1;
        var incount = 1;

        $('#quantLeft').html($quantityLeft);

        while (skip <= $quantity) {
            input = "<input  class=\"form-control col-md-7 col-xs-12\" data-validate-length-range=\"6\" " +
                "data-validate-words=\"2\" name=\"serial\" required type=\"text\" placeholder=\"Serial\">";
            list = "<li role=\"presentation\" class=" + active + ">" +
                "<a href=\"#step" + counter + "\" data-toggle=\"tab\" aria-controls=\"step" + counter + "\" " +
                "role=\"tab\" title=\"Step" + counter + "\">" +
                "<span class=\"round-tab\">" +
                "<b>Tab" + counter + "</b>" +
                "</span>" +
                "</a>" +
                "</li>";
            $listDist.append(list);
            skip += 10;
            active = 'disabled';
            var arrayinput = [];

            while (counter !== 0) {
                while (incount <= 10) {
                    arrayinput[counter] = input;
                    incount++;
                }
                div = "<div class=\"tab-pane active\" role=\"tabpanel\" id=\"step" + counter + "\">" +
                    "<div class=\"item form-group\">" +
                    "<label class=\"control-label col-md-1 col-sm-1 col-xs-6\" for=\"name\">Serial<span class=\"required\">*</span>" +
                    "</label>" +
                    "<div id=" + counter + " class=\"col-md-6 col-sm-6 col-xs-6\">" +
                    arrayinput +
                    "</div>" +
                    "</div>" +
                    "<ul class=\"list-inline pull-right\">" +
                    "<li><button type=\"button\" class=\"btn btn-default next-step\">Save and continue</button></li>" +
                    "</ul>" +
                    "</div>";
                $serialTab.append(div);
                counter--;
            }

            counter++;
        }

    });
    $('.modal').on('show.bs.modal', function (e) {
        //get data-id
        item_id = $(e.relatedTarget).data('id');
        //assign to a button with a class btn-modal
        $('.btn-modal').val(item_id);
    });
    $('#edit_modal').on('show.bs.modal', function (e) {
        quantity = $(e.relatedTarget).data('quantity');

        $('#quantity').val(quantity);

    });
    $('#editlogmodal').on('hidden.bs.modal', function () {
        $('#editlog').bootstrapTable('destroy');
    });
    $('#Item_Detail').on('hidden.bs.modal', function () {
        $('#itemdet').bootstrapTable('destroy');
    });
    $('.btn-hide').on('click', function () {
        $('#firststep').modal('hide');
    });
    $(".dist").on("hidden.bs.modal", function () {
        $(".serial").html("");
        $(".quant").html("");
    });
    $(".distsp").on("hidden.bs.modal", function () {
        $(".serialsp").html("");
        $(".quantsp").html("");
    });
    $(".returnsp").on("hidden.bs.modal", function () {
        $(".serialsp").html("");
        $(".quantsp").html("");
    });
    $(".transfer").on("hidden.bs.modal", function () {
        $(".serialsp").html("");
        $(".quantsp").html("");
    })
    $(".acceptsp").on("hidden.bs.modal", function () {
        $(".serialsp").html("");
        $(".quantsp").html("");
    });
    //Wizard
    $('a[data-toggle="tab"]').on('show.bs.tab', function (e) {

        var $target = $(e.target);

        if ($target.parent().hasClass('disabled')) {
            return false;
        }
    });

    $(".next-step").click(function () {
        var $active = $('.wizard .nav-tabs li.active');
        nextTab($active);

    });
    $(".prev-step").click(function () {

        var $active = $('.wizard .nav-tabs li.active');
        prevTab($active);

    });


}

//add item save
function save(counter) {
    $('#addItemForm').parsley().whenValidate({group: 'set' + counter}).done(function () {
        var list = $('#list' + counter);
        var step = $('#step' + counter + 'B');
        $.ajax({
            type: 'POST',
            url: 'Inventory/save/' + counter,
            data: $('#addItemForm').serializeArray(),
            success: function (response) {
                if (response) {
                    if ($('#bulk').find('li').length > 2) {
                        if (!list.prev().length < 2) {
                            list.prev().addClass('active');
                            step.prev().addClass('active');
                        } else {
                            list.next().addClass('active');
                            step.next().addClass('active');
                        }
                        list.remove();
                        step.remove();
                    } else {
                        location.reload();
                    }
                }
            },
            statusCode: {
                500: function () {
                    alert('Duplicate item name and description.');
                }
            }

        });
    });
}


function addUserBack() {
    toggleDiv($('.accounts-tab'), $('.addUser'));
}

function EditUserBack() {
    toggleDiv($('.accounts-tab'), $('.userDetail'));
}


function userdetailBack() {
    toggleDiv($('.accounts-tab'), $('.userDetail'));
}


//view +and edit serial
function viewSerial(id) {
    var $ul = $('#serial-tabs');
    var serialTabCounter = 1;
    var $serialContent = $('#serial-tabcontent');
    var $serial = $('.Serial');
    var $inventory = $('.inventory-tab');

    $.ajax({
        url: 'inventory/getSerial/' + id,
        dataType: 'JSON',
        success: function (data) {
            var button = '';
            var div = [];
            var list = [];
            var input = [];
            var divClass = "in active";
            var listClass = "active";
            var i = 0;
            var $active = $('#serial-tabs').find('.active');

            if (data[0]['position'] === 'Custodian') {
                button = "<br><div class=\"col-md-offset-3\">\n" +
                    "<button id=\"serialS\" onclick = \"saveSerial()\" type=\"button\" class=\"serialBTN btn btn-success btn-sm\"><i class=\"fa fa-send\"></i> Save</a></button>" +
                    " </div>";
            }
            //if div reaches 10
            //create another div
            if (data.length > 10) {
                var f = data.length;

                for (i = 0; i < data.length; i++) {
                    if (serialTabCounter !== 1) {
                        divClass = "";
                        listClass = "disabled";
                    }

                    input.push("<input type=\"checkbox\" tabindex='-1' value =\"" + data[i]['serial'] + "\" class='check selSerial' " +
                        "name=\"selectedSerial[]\" value=\"" + data[i]['serial'] + "\"><label class='col-12'>Serial " + (i + 1) +
                        "<input value =\"" + data[i]['serial'] + "\" type=\"text\" name=\"serial[" + data[i]['serial_id'] + "]\"" +
                        "min=0  " +
                        "class=\"form-control\"></label><br>");
                    if (input.length === 10) {
                        div.push("<div id=\"tab" + serialTabCounter + "\" class=\"tab-pane fade " + divClass + "\">");
                        list.push("<li class=\"" + listClass + "\"><a id=\"t" + serialTabCounter + "\"" +
                            "data-toggle=\"tab\" href=\"#tab" + serialTabCounter + "\">Set " + serialTabCounter + "</a></li>");
                        $serialContent.append(div);
                        $('#tab' + serialTabCounter).html(input.join('') + button);
                        f -= input.length;
                        div = [];
                        input = [];
                        serialTabCounter++;
                    }

                }
            } else {
                for (i = 0; i < data.length; i++) {
                    input.push("<input type=\"checkbox\" tabindex='-1' value =\"" + data[i]['serial'] + "\" class='check selSerial' " +
                        "name=\"selectedSerial[]\" value=\"" + data[i]['serial'] + "\"><label>Serial " + (i + 1) +
                        "<input value=\"" + data[i]['serial'] + "\" type=\"text\" name=\"serial[" + data[i]['serial_id'] + "]\"" +
                        "min=0  " +
                        "class=\"form-control\"></label><br>");
                }
                div.push("<div id=\"tab" + serialTabCounter + "\" class=\"tab-pane fade " + divClass + "\">");
                list.push("<li class=\"" + listClass + "\"><a class=\"nav-link\" data-toggle=\"tab\" href=\"#tab" +
                    serialTabCounter + "\">Set " + serialTabCounter + "</a></li>");
                $serialContent.append(div);
                $('#tab1').toggleClass('show').html(input.join('') + button);
            }
            if (f >= 1) {
                div.push("<div id=\"tab" + serialTabCounter + "\" class=\"tab-pane fade " + divClass + "\">");
                list.push("<li class=\"" + listClass + "\"><a id=\"t" + serialTabCounter + "\"" +
                    "data-toggle=\"tab\" href=\"#tab" + serialTabCounter + "\">Set " + serialTabCounter + "</a></li>");
                $serialContent.append(div);
                for (i = 0; i < data.length; i++) {

                    $('#tab' + serialTabCounter).html(input.join('') + button);
                }
            }

            $ul.html(list);

            $('.next-serialTab').on('click', function () {
                $active.next().removeClass('disabled');
                nextTab($active);
            });
            $('.prev-serialTab').on('click', function () {
                $active.prev().removeClass('disabled');
                prevTab($active);

            });

            $('#t1').click();


            $('input[name^=serial]').on('blur', function () {
                var serial = $(this).val();
                var counter = 0;
                var unique = true;
                data = $('#viewSerialForm').serializeArray();
                var name = $(this).attr('name');

                if (serial !== '') {

                    for (i = 0; i <= data.length - 1; i++) {

                        if (data[i].value !== 'null' && data[i].name !== name) {
                            if (serial === data[i].value) {
                                counter++
                            }
                        }

                    }

                    if (counter > 0) {
                        text = '<label class="text-danger"><span><i class="fa fa-times" aria-hidden="true"></i> There are serials which are not unique.</span></label>';
                        $('#serial-err-msg').html(text);
                        $('.serialBTN').attr('disabled', 'disabled');
                    } else {
                        text = '<label class="text-success"><span><i class="fa fa-check-circle-o" aria-hidden="true"></i> All serials are unique</span></label> ';
                        $('#serial-err-msg').html(text);
                        $('.serialBTN').removeAttr('disabled');
                        $.ajax({
                            url: "Inventory/validateSerial",
                            method: "POST",
                            data: {serial: serial},
                            success: function (data) {
                                $('#serial-err-msg').html(data);
                            }
                        });
                    }
                }
            })
        }
    });

}


function gettransferlog(id) {

    var $historytable = $('#history');
    toggleDiv($('#historyPage'), $('#account'));
    $historytable.bootstrapTable('destroy');
    $historytable.bootstrapTable({
        url: 'logs/gettransfer/' + id,
        columns: [{
            sortable: true,
            field: 'serial',
            title: 'Serial'
        }, {
            sortable: true,
            field: 'transfer_date',
            title: 'Transfer date'
        }, {
            sortable: true,
            field: 'current_owner',
            title: 'Current Owner'
        }, {
            sortable: true,
            field: 'last_owner',
            title: 'Last Owner'
        }]
    });

}

function gettransfer(id) {
    $.ajax({
        url: 'inventory/gettransfer/' + id,
        dataType: 'JSON',
        success: function (data) {
            for (var i = 0; i < data.length; i++) {
                var name = data[i].currentname.replace(/\s/g, '&nbsp;');

                $('.owner').html("<label for=\"name\">Current Owner:</label>" +
                    " <input name=\"currentuser\" class=\"name form-control\" readonly value=" + name + ">");
                $('.serialsp').html("<label for=\"name\">Serial:</label>" +
                    " <input  name=\"serial\" class=\"name form-control\" readonly value=" + data[i].serial + ">");
            }
        }
    });

}

//get serial checkbox
function getserialreturn(id, sid) {
    var serials = [];
    var mooe = [];
    var delDate = $(event.target).data('deldate')
    $('#date').attr('data-delDate', delDate);
    $('input[name=returndate]').attr('data-delDate', delDate);
    $.ajax({
        url: 'inventory/getSerialreturn/' + id + '/' + sid,
        dataType: 'JSON',
        success: function (data) {
            for (var i = 0; i < data.length; i++) {
                mooe = data[i].serial;
                var status = data[i].item_status;
                if (data[i].serial !== null && (status === 'Distributed' || status === 'UserDistributed')) {
                    serials.push("<input class='serialCheck' name=\"serial[" + data[i]['serial_id'] + "]\" type=\"checkbox\" value=" + data[i].serial + ">" + data[i].serial + "<br>");
                }
                if (serials.length === 0) {
                    serials = "Please input serial first.";
                }
                $('.serialsp').html(serials);
            }
            if (!$.trim(data)) {
                serials = "no items available";
                $('.serial').html(serials);
                $('.serialsp').html(serials);
            }
        }
    });

}

function getserial(id) {
    var serials = [];
    var mooe = [];
    var delDate = $(event.target).data('deldate')
    $('#date').attr('data-delDate', delDate);
    $('input[name=returndate]').attr('data-delDate', delDate);
    $.ajax({
        url: 'inventory/getSerial/' + id,
        dataType: 'JSON',
        success: function (data) {
            for (var i = 0; i < data.length; i++) {
                mooe = data[i].serial;
                var status = data[i].item_status;
                if (data[i].serial !== null && status !== 'Distributed') {
                    serials.push("<input class='serialCheck' name=\"serial[" + data[i]['serial_id'] + "]\" type=\"checkbox\" value=" + data[i].serial + ">" + data[i].serial + "<br>");
                }
                if (data[i].serial !== null && status === 'Distributed') {
                    serials.push("<input class='serialCheck' name=\"serial[" + data[i]['serial_id'] + "]\" type=\"checkbox\" value=" + data[i].serial + ">" + data[i].serial + "<br>");
                }
                if (serials.length === 0) {
                    serials = "Please input serial first.";
                }
                $('.serial').html(serials);
                $('.serialsp').html(serials);

            }
            if (!$.trim(data)) {
                serials = "no items available";
                $('.serial').html(serials);
                $('.serialsp').html(serials);
            }
        }
    });

}

function getserialbtn(id, sid) {
    var serials = [];
    var mooe = [];
    $.ajax({
        url: 'inventory/getSerialbtn/' + id + '/' + sid,
        dataType: 'JSON',
        success: function (data) {
            for (var i = 0; i < data.length; i++) {
                mooe = data[i].serial;
                var status = data[i].item_status;
                if (data[i].serial !== null && status !== 'Distributed') {
                    serials.push("<input data-parsley-required name=\"serial[" + data[i]['serial_id'] + "]\" type=\"checkbox\" value=" + data[i].serial + ">" + data[i].serial + "<br>");
                }
                if (data[i].serial !== null && status === 'Distributed') {
                    serials.push("<input  name=\"serial[" + data[i]['serial_id'] + "]\" type=\"checkbox\" value=" + data[i].serial + ">" + data[i].serial + "<br>");
                }
                if (serials.length === 0) {
                    serials = "Please input serial first.";
                }
                $('.serial').html(serials);
                $('.serialsp').html(serials);

            }
            if (!$.trim(data)) {
                serials = "no items available";
                $('.serial').html(serials);
                $('.serialsp').html(serials);
            }
        }
    });

}

function noserial(id, q, retquant) {
    var delDate = $(event.target).data('deldate')
    var qua = '';
    var quasp = '';
    var result = q - retquant;

    $('#date').attr('data-delDate', delDate);
    $('input[name=returndate]').attr('data-delDate', delDate);

    if (q !== 0) {
        qua = ("<div class=\"quant form-group\">" +
            "<label>Quantity<span class=\"required\">*</span>" +
            "<input min=\"0\" max=\"" + result + "\" type=\'number\' name=\'quantity\' placeholder='quantity\' " +
            "class=\'form-control col-md-12 col-xs-12\' required>" +
            "</label>" +
            "</div>");
        if (retquant === undefined) {
            quasp = ("<div class=\"quant form-group\">" +
                "<label>Quantity<span class=\"required\">*</span>" +
                "<input min=\"0\" max=\"" + q + "\" type=\'number\' name=\'quantity\' placeholder='quantity\' " +
                "class=\'form-control col-md-12 col-xs-12\' required>" +
                "</label>" +
                "</div>");
        } else {
            quasp = ("<div class=\"quant form-group\">" +
                "<label>Quantity<span class=\"required\">*</span>" +
                "<input min=\"0\" max=\"" + result + "\" type=\'number\' name=\'quantity\' placeholder='quantity\' " +
                "class=\'form-control col-md-12 col-xs-12\' required>" +
                "</label>" +
                "</div>");
        }
    } else {
        qua = ("<p>No stock left. Please restock.</p>");
        quasp = ("<p>No stock left. Please restock.</p>");
    }
    $('.quant').html(qua);
    $('.quantsp').html(quasp);
}

//toggle hidden class of element
function toggleDiv(elementToShow, elementToHide) {

    elementToShow.removeAttr('hidden');
    elementToHide.attr('hidden', 'hidden');

}

// add another item function
function init_bulkFucntion() {
    var $div = $('.clone-tab');
    var $button = $('.savebtn');
    var $ul = $('#bulk');
    var list;
    var counter = 1;
    $(document).on('click', '#addanother', function (e) {
        $('#addItemForm').parsley().whenValidate({group: 'set' + counter}).done(function () {
            var pul = document.getElementById('bulk');
            var li = document.getElementById('another');
            pul.removeChild(li);
            counter++;
            $button.attr('id', 'buttonCounter' + counter);
            ($div.clone().find("input:not(:checkbox),textarea").val("")
                .attr('data-parsley-group', 'set' + counter)
                .toggleClass('required').end()
                .attr('id', 'step' + counter + 'B')
                .appendTo('#bulkdiv')
                .removeClass('active')
                .find('#buttonCounter' + counter)
                .attr('onclick', 'save(' + counter + ')'));
            list = "<li id=\"list" + counter + "\" role=\"presentation\" class=\"nav-item\">" +
                "<a class=\"nav-link \" href=\"#step" + counter + "B\" data-toggle=\"tab\" aria-controls=\"step" + counter + "\" role=\"tab\" title=\"Step" + counter + "\">" +
                "Item" + counter +
                "</a>" +
                "</li>";
            ($ul.append(list).find('#list' + counter + ' a').click());
            $ul.append('<li id="another"><button id="addanother" class="btn btn-primary"\n' +
                '                                            role="tab"><i class="ti-plus"></i>\n' +
                '                                    </button></li>');
        });


    });


    console.log('init_bulkFunction');

// import csv data

    $('#import_csv').on('submit', function (event) {
        event.preventDefault();
        $.ajax({
            url: "inventory/import",
            method: "POST",
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            beforeSend: function () {
                $('#import_csv_btn').html('Importing...');
            },
            success: function (data) {
                $('#import_csv')[0].reset();
                $('#import_csv_btn').attr('disabled', false);
                $('#import_csv_btn').html('Import Done');
                load_data();
            }
        })
    });

}

//traverse to next element
function nextTab(elem) {
    elem.next().find('a[data-toggle="tab"]').click();
}

//traverse to previous element
function prevTab(elem) {
    elem.prev().find('a[data-toggle="tab"]').click();
}

function select_dept() {
    if (document.getElementById('position').value === 'supply officer') {
        document.getElementById('dmentselect').style.display = 'block';
    } else {
        document.getElementById('dmentselect').style.display = 'none';

    }
}

//View QR list
function viewQr() {
    $genQR = $('#genQr');
    $qrCode = [];
    $qrDiv = $('#generatedQR');
    $genQR.modal('show', function (e) {
        $selectedSerial = $('.selSerial');
        $data = [];
        for (var i = 0; i < $selectedSerial.length; i++) {
            if ($selectedSerial[i].checked === true) {
                if ($selectedSerial[i].value !== "") {
                    $data.push($selectedSerial[i].value);
                }
            }
        }
        $.ajax({
            url: "GenerateQR/saveQR",
            method: "POST",
            dataType: 'JSON',
            data: {selectedSerial: $data},
            success: function (data) {
                if (data.length === 0) {
                    $qrDiv.html('Please select a serial from the list.');
                    $('input[name=saveqr]').css({display: 'none'});
                } else {
                    for (var i = 0; i <= data.length - 1; i++) {
                        $qrCode += data[i];
                    }
                    $qrDiv.html($qrCode);
                }


            }
        });
    });

}


function closeSerial() {
    $('.serialdrop').click();
}

//remove Detail
function removeDetail($id, $serialStatus) {
    $.ajax({
        url: "inventory/removeDetail/" + $id + "/" + $serialStatus,
        method: "POST",
        success: function (data) {
            location.reload();
        }
    });
}

//revert removed detail
function revertDetail($det_id, $serialStatus) {
    $.ajax({
        url: "inventory/revert/" + $det_id + "/" + $serialStatus,
        method: "POST",
        success: function (data) {
            location.reload();
        }
    });
}

function checkboxLimit() {
    var inputTags = document.getElementsByName('model_selection[]');
    var total = 0;

    for (var i = 0; i < inputTags.length; i++) {

        if (inputTags[i].checked) {
            total = total + 1;
        }

        if (total > 2) {
            alert('Pick Just One Please')
            inputTags[i].checked = false;
            return false;
        }
    }
}

//for reconciliation
function reconcile() {
    $date = $('#inventoryDate').val();
    $status = $('#serialTab').find('.active').data('status');
    $id = [];
    $q = [];
    $p = [];
    $r = [];
    $missing = [];
    counter = 0;
    serializedItems = $('#serializedItems');
    ns = $('#withoutSerial');
    if ($status === 1) {
        $recon = serializedItems.find('.reconitem ');
        $quantity = serializedItems.find('.quantity');
        $remarks = serializedItems.find('.remarks');
        $reconID = serializedItems.find('.reconid');
    } else {
        $recon = ns.find('.reconitem ');
        $quantity = ns.find('.quantity');
        $remarks = ns.find('.remarks');
        $reconID = ns.find('.reconid');
    }
    for (i = 0; i <= $recon.length - 1; i++) {
        if ($quantity[i].textContent !== $recon[i].value) {
            $missing.push($quantity[i].textContent - $recon[i].value);
            counter++;
        }
        $q.push($quantity[i].textContent);
        $p.push($recon[i].value);
        $r.push($remarks[i].value);
        $id.push($reconID[i].value);
    }

    if (counter >= 1) {
        if ($status === 1) {
            alert();
            getAllSerial()
        } else {
            $.ajax({
                url: "Inventory/reconcileNS",
                method: "POST",
                data: {logical: $q, physical: $p, remarks: $r, date: $date, id: $id},
                success: function (data) {
                    $('.invdate').modal('toggle');
                    location.reload();
                }
            });

        }
    } else {
        $.ajax({
            url: "Inventory/reconcileInventory",
            method: "POST",
            data: {logical: $q, physical: $p, remarks: $r, date: $date, id: $id},
            success: function (data) {
                $('.invdate').modal('toggle');
                location.reload();
            }
        })
    }


}

function validateSerial() {
}

function printToPDF() {

    $('#ledger').tableExport({
        type: 'pdf',
        jspdf: {
            orientation: 'l',
            format: 'a4',
            margins: {left: 10, right: 10, top: 20, bottom: 20},
            autotable: {
                styles: {
                    fillColor: 'inherit',
                    textColor: 'inherit'
                },
                tableWidth: 'auto'
            }
        }
    });
}

function printToPDFreport() {
    var today = new Date();
    var dd = today.getDate();
    var mm = today.getMonth() + 1;
    var yyyy = today.getFullYear();
    var from = $('#from').val();
    var to = $('#to').val();
    var type = $('input[type=radio][name=type]:checked').val();
    var p = '';

    if (from !== '' || to !== '') {
        p = '<p>From: ' + from + ' To: ' + to + '</p>';
    }

    if (dd < 10) {
        dd = '0' + dd
    }

    if (mm < 10) {
        mm = '0' + mm
    }

    dateCreated = '<p>Date Created: ' + mm + '/' + dd + '/' + yyyy + '</p>';

    $report = $('#reportsOption').val();
    var header;
    if ($report === '0') {
        header = '<h3>Delivered Items</h3><br><p>General Service Office</p>';
    } else if ($report === '1') {
        header = '<h1>Distributed Items</h1><br><p>General Service Office</p>';
    } else if ($report === '2') {
        header = '<h1>Returned Items</h1><br><p>General Service Office</p>';
    } else {
        header = '<h1>Supplier Items</h1><br><p>General Service Office</p>';
    }
    $('#reportTable').attr('data-pagination', 'false');
    var printContents = $('#returnedReport').html();


    document.body.innerHTML = '<div class="text-center">' + header + '</div>' +
        '<div class="row"><div class="col-md-12 "><p>Type of Item: ' + type + '</p></div> ' +
        '<div class="col-md-4 form-horizontal">' + p + '</div>' +
        '</div>' + dateCreated + printContents;


    window.print();
    location.reload();
}

function printToPDFreconcile() {
    $('#reconcileTable').tableExport({
        type: 'pdf',
        jspdf: {
            orientation: 'l',
            format: 'a4',
            margins: {left: 10, right: 10, top: 20, bottom: 20},
            autotable: {
                styles: {
                    fillColor: 'inherit',
                    textColor: 'inherit'
                },
                tableWidth: 'auto'
            }
        }
    });
}

function retData($serialStatus, $id) {
    var serialData = [];
    $.ajax({
        url: 'inventory/getRetData/' + $serialStatus + '/' + $id,
        dataType: 'JSON',
        success: function (data) {
            if ($serialStatus === 1) {
                serialData += '<p>Serials Returned:</p>';
                for (var i = 0; i <= data.length - 1; i++) {
                    serialData += '<input hidden class="ser" value=' + data[i].serial_id + '>' + data[i].serial + '<br>';
                }
                $('.serial').html(serialData);
            }
        }
    });
}

function printDiv() {
    var originalContents = $(document.body).html();
    var header = '<h1>Serial Codes</h1><br><p>General Service Office</p>'
    var printContents = $('#QRImages').html();
    document.body.innerHTML = header + printContents;
    window.print();
    document.body.innerHTML = originalContents;
}

function accountability(dist_id) {
    $accountabilitytable = $('#accountTable');
    $accountabilitytable.bootstrapTable('refresh', {url: 'inventory/getEndUser/' + dist_id})
        .bootstrapTable({
            url: 'inventory/getEndUser/' + dist_id,
            columns: [{
                field: 'serial',
                title: 'Serial'
            }, {
                field: 'owner',
                title: 'Owner'
            }, {
                field: 'date',
                title: 'Accountability Date'
            }, {
                field: 'action',
                title: 'Action'
            }]
        });
    toggleDiv($('#account'), $('.detail-tab'));

    serialize_forms();
}

function getAllSerial() {
    $date = $('#inventoryDate').val();
    $status = $('#serialTab').find('.active').data('status');
    $id = [];
    $q = [];
    $p = [];
    $r = [];
    counter = 0;
    $recon = $('.reconitem ');
    quantity = $('.quantity');

    for (i = 0; i <= $recon.length - 1; i++) {
        if (quantity[i].textContent !== $recon[i].value) {
            counter++;
        }
        $q.push(quantity[i].textContent);
        $p.push($recon[i].value);
        $r.push($('.remarks')[i].value)
        $id.push($('.reconid')[i].value)
    }
    if (localStorage.getItem('serial') !== null) {
        serials = JSON.parse(localStorage.getItem('serial'));
    }
    $.ajax({
        url: 'Inventory/recSerializedItems',
        method: 'POST',
        data: {serials: serials, logical: $q, physical: $p, remarks: $r, date: $date, id: $id},
        success: function () {
            location.reload();
        }
    })
}

function download() {

    var originalContents = $(document.body).html();
    var header = '<h1>Serial Codes</h1><br><p>General Service Office</p>'
    var printContents = $('#airForm').html();
    document.body.innerHTML = header + printContents;
    window.print();
    document.body.innerHTML = originalContents;
}

function verifypass() {
    $old = $('#old').val();
}

function validateReconcile() {
    $status = $('#serialTab').find('.active').data('status');

    $('#recValidate').parsley().whenValidate({
        group: $status
    }).done(function () {
        $('.invdate').modal('show');
    });
}

function getreportDate() {
    $('#reportDate').parsley().whenValidate().done(function () {
        var from = $('#from').val();
        var to = $('#to').val();
        var type = $('input[type=radio][name=type]:checked').val();
        $reportTable = $('#reportTable');
        var $reportOption = $('#reportsOption').val();
        var url = 'Inventory/getReportWithDate/' + $reportOption + '/' + type + '/' + from + '/' + to;
        var visible = true;

        if (type !== 'ALL') {
            visible = false;
        }

        if ($reportOption === '0') {
            $reportTable.bootstrapTable('destroy');
            $reportTable.bootstrapTable({
                url: url,
                columns: [{
                    field: 'OR_no',
                    title: 'OR_number'
                }, {
                    field: 'date_delivered',
                    title: 'Date Delivered'
                }, {
                    field: 'item_name',
                    title: 'Item Name'
                }, {
                    field: 'item_description',
                    title: 'Description'
                }, {
                    field: 'item_type',
                    title: 'Type',
                    visible: visible
                }, {
                    field: 'quantity',
                    title: 'Quantity',
                    class: 'quantityCol'
                }, {
                    field: 'unit_cost',
                    title: 'Unit Cost',
                    class: 'unitCostCol'
                }, {
                    field: 'supplier_name',
                    title: 'Supplier'
                }]
            });
        } else if ($reportOption === '1') {
            $reportTable.bootstrapTable('destroy');
            $reportTable.bootstrapTable({
                url: url,
                columns: [{
                    field: 'PR_no',
                    title: 'PR #'
                }, {
                    field: 'department',
                    title: 'Department'
                }, {
                    field: 'date_received',
                    title: 'Date'
                }, {
                    field: 'item_name',
                    title: 'Item Name'
                }, {
                    field: 'item_description',
                    title: 'Description'
                }, {
                    field: 'item_type',
                    title: 'Type',
                    visible: visible
                }, {
                    field: 'quantity_distributed',
                    title: 'Quantity',
                    class: 'quantityCol'
                }, {
                    field: 'cost',
                    title: 'Cost'
                }, {
                    field: 'account_code',
                    title: 'Account Code'
                }, {
                    field: 'supply_officer',
                    title: 'Supply Officer'
                }]
            });
        } else if ($reportOption === '2') {
            $reportTable.bootstrapTable('destroy');
            $reportTable.bootstrapTable({
                url: url,
                columns: [{
                    field: 'department',
                    title: 'Department',
                }, {
                    field: 'date_returned',
                    title: 'Date'
                }, {
                    field: 'item_name',
                    title: 'Item Returned'
                }, {
                    field: 'item_description',
                    title: 'Description'
                }, {
                    field: 'item_type',
                    title: 'Type',
                    visible: visible
                }, {
                    field: 'return_quantity',
                    title: 'Quantity',
                    class: 'quantityCol'
                }, {
                    field: 'receiver',
                    title: 'Returned to'
                }, {
                    field: 'status',
                    title: 'Status'
                }, {
                    field: 'remarks',
                    title: 'Remarks'
                }]
            });
        } else {
            $reportTable.bootstrapTable('destroy');
            $reportTable.bootstrapTable({
                url: url,
                columns: [{
                    field: 'supplier_name',
                    title: 'Supplier',
                }, {
                    field: 'date_delivered',
                    title: 'Date',
                }, {
                    field: 'item_name',
                    title: 'Item Name'
                }, {
                    field: 'item_description',
                    title: 'Description'
                }, {
                    field: 'item_type',
                    title: 'Type',
                    visible: visible
                }, {
                    field: 'quantity',
                    title: 'Quantity',
                    class: 'quantityCol'
                }, {
                    field: 'unit',
                    title: 'Unit'
                }, {
                    field: 'cost',
                    title: 'Cost'
                }]
            });
        }
    });
}

function getOR() {
    var options = [];
    $.ajax({
        url: 'Inventory/getOR',
        dataType: 'JSON',
        success: function (data) {
            if (data) {
                for (var i = 0; i <= data.length - 1; i++) {
                    options.push('<option value=' + data[i].OR_no + '>' + data[i].OR_no + '</option>');
                }
                $('#or_no').html(options);
            }
        }
    });
}

function createReport() {
    var or = $('#or_no').val();
    var tbody = $('#tg-umsCj tbody');
    var tr = [];

    toggleDiv($('#AIRcont'), $('.inventory-tab'));


    $.ajax({
        url: 'Inventory/createAIR/' + or,
        dataType: 'JSON',
        success: function (data) {
            $('#supplier').val(data[0].supplier_name);
            $('#PO_num').val(data[0].PO_number);
            $('#OR_no').val(data[0].OR_no);
            $('#date_received').val(data[0].date_received);
            for (var i = 0; i <= data.length - 1; i++) {
                tr.push('<tr class="tbody">' +
                    '<td >' + data[i].item_name + '</td>' +
                    '<td >' + data[i].quantity + '</td>' +
                    '<td >' + data[i].item_description + '</td>' +
                    '<td >' + data[i].unit + '</td>' +
                    '<td >' + data[i].amount + '</td>' +
                    '</tr>');
            }
            tbody.html(tr);
        }
    });
}

function printAIR() {
    var originalContents = $(document.body).html();
    var printContents = $('#air').html();
    document.body.innerHTML = printContents;
    window.print();
    document.body.innerHTML = originalContents;
}

function valreturn() {
    var chks = $('.serialCheck');
    if (chks.length == 0) {
        return true;
    }
    var hasChecked = false;
    for (var i = 0; i < chks.length; i++) {
        if (chks[i].checked) {
            hasChecked = true;
            break;
        }
    }
    if (hasChecked === false) {
        alert("Please select at least one serial");
        return false;
    }
    return true;
}

function valdist() {
    var chks = document.getElementById('form').getElementsByTagName('input');
    console.log(chks);
    var hasChecked = false;
    for (var i = 0; i < chks.length; i++) {
        if (chks[i].checked) {
            hasChecked = true;
            break;
        }
    }
    if (hasChecked === false) {
        alert("Please select at least one serial");
        return false;
    }
    return true;
}