$(document).ready(function () {

    //supply officer options
    var $ownerOpt = $('.ownerOpt');
    var users = [];
    $.ajax({
        url: "inventory/getSupplyOfficers/11",
        dataType: 'JSON',
        success: function (data) {
            for(var i =0; i <= data.length-1; i++){
                users += "<option value=" + data[i].user_id + ">" + data[i].name + "<br>";
            }
            $ownerOpt.html(users);

        }
    });



    //return table
    $returnTable = $('#returnTable');
    $returnTable.bootstrapTable('refresh', {url: 'inventory/viewReturn'}).bootstrapTable({
        url: 'inventory/viewReturn',
        columns: [{
            field: 'dept',
            title: 'Department'
        },{
            field: 'item',
            title: 'Item Returned'
        }, {
            field: 'desc',
            title: 'Description'
        }, {
            field: 'date',
            title: 'Date Returned'
        }, {
            field: 'reason',
            title: 'Reason'
        }, {
            field: 'returnperson',
            title: 'Returned to'
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
    var active = localStorage.getItem('active');
    var hidden = localStorage.getItem('hidden');
    var detFunc = localStorage.getItem('detail');

    $('#main-menu').find('li a').click(function () {
        localStorage.clear();
    });
    if (active !== null) {
        if (active.split(' ')[0] === 'detail-tab') {
            $('td').attr('onclick', detFunc).click();
        }
    }
    //get URL of the document
    var $url = window.location.href.substr(window.location.href.lastIndexOf('/') + 1);
    if($url === 'dashboard'){
        $('#vmap').vectorMap({
            map: 'world_en',
            backgroundColor: null,
            color: '#ffffff',
            hoverOpacity: 0.7,
            selectedColor: '#1de9b6',
            enableZoom: true,
            showTooltip: true,
            values: sample_data,
            scaleColors: ['#1de9b6', '#03a9f5'],
            normalizeFunction: 'polynomial'
        });
        console.log('vmap_loaded');
    }else{
        //initialize
        init_inventory();
        init_list();
        modal();
        init_bulkFucntion();
    }
});
//action for returns
function return_action($action,$retun_id){
    $.ajax({
        url: 'inventory/return_actions',
        method: 'POST',
        data: {action: $action, return_id: $retun_id},
        success: function (response) {
            if(response === '1'){
                location.reload();
            }
        }
    });
}
// $('.user-area> a').on('click', function(event) {
// 	event.preventDefault();
// 	event.stopPropagation();
// 	$('.user-menu').parent().removeClass('open');
// 	$('.user-menu').parent().toggleClass('open');
// });
function saveSerial() {
    data = $('#viewSerialForm').serializeArray();
    $.ajax({
        url: 'inventory/addSerial',
        method: 'POST',
        data: data,
        success: function (response) {
            if (response >= 1) {
                $('.serialdrop').click();
            }
        }
    });
}

function editSupplier(id) {
    var $detailtable = $('#editSupplier-tab-table');
    var supplier;
    $.ajax({
        url: 'supplier/getSupplier/' + id,
        dataType: 'JSON',
        success: function (data) {
            toggleDiv($('.editSupplier-tab '), $('.supplier-tab'));
            $('#edtbuttonsupplier').val(id);
            $('#supplier').val(data.name);
            $('#location').val(data.location);
            $('#cno').val(data.contact);
        }
    });
}

// go to detail
function detail(id) {
    localStorage.setItem('detail', 'detail(' + id + ')');
    var $detailtable = $('#detail-tab-table');
    var $ledger = $('#ledger');
    var $rmItems = $('#removed-table');

    var item;
    $.ajax({
        url: 'inventory/getitem/inv/' + id,
        dataType: 'JSON',
        success: function (data) {
            $('#edtbutton').val(id);
            $('#itemname').val(data.name);
            $('#itemdesc').val(data.description);
            $('#total').text(data.quant);
            $('#itemtype').val(data.item_type);
            $('#unit').val(data.unit);
            $('#initialStock').text(data.initialStock);
            $('#initialCost').text(data.initialCost);

            toggleDiv($('.detail-tab '), $('.inventory-tab'));

            $detailtable.bootstrapTable('refresh', {url: 'inventory/detail/inv/' + id});
            $detailtable.bootstrapTable({
                url: 'inventory/detail/inv/' + id,
                columns: [{
                    field: 'PO',
                    title: 'PO number'
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
                    title: 'Unit Cost'
                }, {
                    field: 'sup',
                    title: 'Supplier'
                }, {
                    field: 'quant',
                    title: 'Quantity'
                }, {
                    field: 'or',
                    title: 'OR number'
                }, {
                    field: 'action',
                    title: 'Action'
                }]
            });
            $ledger.bootstrapTable('refresh', {url: 'inventory/getLedger/' + id});
            $ledger.bootstrapTable({
                pageSize: 10,
                url: 'inventory/getLedger/' + id,
                resizable: true,
                columns: [{
                    sortable: true,
                    field: 'date',
                    title: 'Date'
                }, {
                    sortable: true,
                    field: 'transaction_number',
                    title: 'Transaction Number'
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
                    title: 'Unit Cost'
                }, {
                    sortable: true,
                    field: 'transaction',
                    title: 'Transaction'
                }]
            });
            $rmItems.bootstrapTable('refresh', {url: 'inventory/showRemovedItems/' + id});
            $rmItems.bootstrapTable({
                url: 'inventory/showRemovedItems/' + id,
                columns: [{
                    field: 'PO',
                    title: 'PO number'
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
                    title: 'Unit Cost'
                }, {
                    field: 'sup',
                    title: 'Supplier'
                }, {
                    field: 'quant',
                    title: 'Quantity'
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
    });
}

function deptDet(id,position) {
    var $detailtable = $('#detail-tab-table');
    var $detailTab = $('.detail-tab ');
    var item;
    if(position === 'Supply Officer'){
        $field = 'action';
        $title = 'Action'
    }else{
        $field = 'action';
        $title = 'Status';
    }
    $.ajax({
        url: 'inventory/getitem/dept/' + id,
        dataType: 'JSON',
        success: function (data) {
            $('#itemname').html(data.name);
            $('#itemdesc').html(data.description);
            $('#total').html(data.quant);
            $('#itemtype').html(data.item_type);
            $('#unit').html(data.unit);
            toggleDiv($detailTab, $('.department-tab'));
            toggleDiv($detailTab, $('.inventory-tab'));

            $detailtable.bootstrapTable('refresh', {url: 'inventory/detail/dept/' + id})
                .bootstrapTable({
                    url: 'inventory/detail/dept/' + id,
                    columns: [{
                        field: 'PR',
                        title: 'PR number'
                    }, {
                        field: 'receiver',
                        title: 'Supply Officer'
                    },{
                        field: 'rec',
                        title: 'Date Received'
                    }, {
                        field: 'exp',
                        title: 'Estimated Useful Life'
                    }, {
                        field: 'cost',
                        title: 'Unit Cost'
                    }, {
                        field: 'sup',
                        title: 'Supplier'
                    }, {
                        field: 'quant',
                        title: 'Quantity'
                    }, {
                        field: 'or',
                        title: 'OR number'
                    }, {
                        field: $field,
                        title: $title
                    }]
                });
            serialize_forms();
        }
    });
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
        '<td contenteditable style=""><input name="PO[]" class="form-control form-control-sm" placeholder="PO #" type="text"></td> ' +
        '<td style=""><input name="del[]" class="form-control form-control-sm" type="date"></td> ' +
        '<td style=""><input name="rec[]" class="form-control form-control-sm" type="date"></td> ' +
        '<td style=""><input name="exp[]" class="form-control form-control-sm" type="date"></td> ' +
        '<td style=""><input name="cost[]" class="form-control form-control-sm" type="number"></td> ' +
        '<td style=""><select name="supp[]" list="typelist" class="supplieropt form-control form-control-sm"></select></td> ' +
        '<td style=""><input name="quant[]" class="form-control form-control-sm" type="text"></td> ' +
        '<td style=""><input name="or[]" class="form-control form-control-sm" type="text"></td> ' +
        '<td style=""><i onclick="addquant(' + counter + ')" class="fa fa-check-circle-o" id="rowcheck"></i>' +
        '<i onclick="removeRow(' + counter + ')" class="fa fa-times-circle-o" id="rowcancel"></i></td> ' +
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
    $('#detTab'+$counter).remove();
}
function addquant(c) {
    var $item_det_id = $('#DetailDropDn').find('a').data('id');
    var data = $('#addQuant').serializeArray();
    var $det = $('#detTab' + c);
    console.log($det);
    var temp = [];
    $.ajax({
        url: 'inventory/addquant/' + $item_det_id + '/' + c,
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

    $supplier.bootstrapTable('refresh', {url: 'supplier/viewsuppliers'})
        .bootstrapTable({
            pageSize: 10,
            url: 'supplier/viewsuppliers',
            onClickRow: function (data, row) {
                editSupplier(data.id);
            },
            resizable: true,
            columns: [{
                sortable: true,
                field: 'supplier',
                title: 'Supplier Name'
            }, {
                sortable: true,
                field: 'contact',
                title: 'Contact number'
            }, {
                sortable: true,
                field: 'address',
                title: 'Address'
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
                field: 'name',
                title: 'NAME'
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
                    deptDet(data.id,data.position);
                } else {
                    detail(data.id);
                }
            },
            resizable: true,
            columns: [{
                sortable: true,
                field: 'item',
                title: 'NAME'
            }, {
                sortable: true,
                field: 'description',
                title: 'DESCRIPTION'
            }, {
                sortable: true,
                cellStyle: function (data) {
                    return {
                        css: {"color": "green"}
                    };
                },
                field: 'quantity',
                title: 'IN-STOCK'
            }, {
                sortable: true,
                field: 'unit',
                title: 'UNIT'
            }, {
                sortable: true,
                field: 'cost',
                title: 'Unit COST'
            }, {
                sortable: true,
                field: 'totalcost',
                title: 'Total COST'
            }, {
                sortable: true,
                field: 'serialStatus',
                title: 'Serial',
                cellStyle: function (data) {
                    return {
                        css: {"color": "green"}
                    };
                },
            }]
            // }, {
            //     sortable: true,
            //     field: 'Price',
            //     title: 'PRICE'
            // }]
        });
    $MOOEtable.bootstrapTable('refresh', {url: 'inventory/viewItem/MOOE'})
        .bootstrapTable({
            pageSize: 10,
            url: 'inventory/viewItem/MOOE',
            onClickRow: function (data, row) {
                if (data.position === 'Supply Officer') {
                    deptDet(data.id,data.position);
                } else {
                    detail(data.id);
                }
            },
            resizable: true,
            columns: [{
                sortable: true,
                field: 'item',
                title: 'NAME'
            }, {
                sortable: true,
                field: 'description',
                title: 'DESCRIPTION'
            }, {
                sortable: true,
                cellStyle: function (data) {
                    return {
                        css: {"color": "green"}
                    };
                },
                field: 'quantity',
                title: 'IN-STOCK'
            }, {
                sortable: true,
                field: 'unit',
                title: 'UNIT'
            }, {
                sortable: true,
                field: 'cost',
                title: 'Unit COST'
            }, {
                sortable: true,
                field: 'totalcost',
                title: 'Total COST'
            }, {
                sortable: true,
                field: 'serialStatus',
                title: 'Serial',
                cellStyle: function (data) {
                    return {
                        css: {"color": "green"}
                    };
                },
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
    $('select.itemtype').change(function () {
        $('.hideInput').toggleClass('hidden');
    });
    $('#genReport_Buttons').on('click', function () {
        toggleDiv($('.generateReport'), $('.inventory-tab'));
    });
    $('#reconcileButton').on('click', function () {
        toggleDiv($('.reconcilePage'), $('.department-tab'));
    })
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
    var $reconcile = $('#reconcileTable');

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
                    url: "inventory/getSupplyOfficers/"+$id,
                    dataType: 'JSON',
                    success: function (data) {
                        for(var i =0; i <= data.length-1; i++){
                            users += "<option value=" + data[i].user_id + ">" + data[i].name + "<br>";
                        }
                        $ownerOpt.html(users);

                    }
                });
            });
        }
    });
    $reconcile.bootstrapTable({
        pageSize: 10,
        url: 'inventory/reconcileview/CO/11',
        resizable: true,
        columns: [{
            sortable: true,
            field: 'id',
            //visible: false,
            formatter : function(value,row,index) {
                return '<input hidden name="ids[]" autofocus value="'+value+'"/>';
            }
        },{
            sortable: true,
            field: 'name',
            title: 'NAME'
        }, {
            sortable:true,
            field: 'date',
            title: 'DATE'

        },{
            sortable: true,
            field: 'description',
            title: 'DESCRIPTION'
        }, {
            sortable: true,
            cellStyle: function (data) {
                return {
                    css: {"color": "green"}
                };
            },
            field: 'quant',
            title: 'QUANTITY DISTRIBUTED',
            visible: true
        }, {
            sortable: true,
            field: 'count',
            title: 'PHYSICAL COUNT'
        },
            {
                sortable: true,
                field: 'result',
                title: 'RESULT'
        }, {
            sortable:true,
            field: 'remarks',
            title: 'REMARKS'
            }]
    });

    $deptTable.bootstrapTable({
        pageSize: 10,
        url: 'inventory/viewdept/CO/11',
        onClickRow: function (data, row) {
            deptDet(data.id,data.position);
        },
        resizable: true,
        columns: [{
            sortable: true,
            field: 'name',
            title: 'NAME'
        }, {
            sortable: true,
            field: 'description',
            title: 'DESCRIPTION'
        }, {
            sortable: true,
            cellStyle: function (data) {
                return {
                    css: {"color": "green"}
                };
            },
            field: 'quant',
            title: 'QUANTITY DISTRIBUTED'
        }, {
            sortable: true,
            field: 'unit',
            title: 'UNIT'
        }]
    });
    $deptMOOEtable.bootstrapTable({
        pageSize: 10,
        url: 'inventory/viewdept/MOOE/11',
        onClickRow: function (data, row) {
            deptDet(data.id,data.position);
        },
        resizable: true,
        columns: [{
            sortable: true,
            field: 'name',
            title: 'NAME'
        }, {
            sortable: true,
            field: 'description',
            title: 'DESCRIPTION'
        }, {
            sortable: true,
            cellStyle: function (data) {
                return {
                    css: {"color": "green"}
                };
            },
            field: 'quant',
            title: 'QUANTITY DISTRIBUTED'
        }, {
            sortable: true,
            field: 'unit',
            title: 'UNIT'
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

//for editting
function serialize_forms() {
    $('.serialForm')
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
    $('.Distribute').on('show.bs.modal', function () {
        var $listDist = $('#listdist').empty();
        var $quantity = $('#distquant').val();
        var $serialTab = $('#serialtab');
        var input = "";
        var div = "";
        var active = 'active';
        var skip = 1;
        var counter = 1;
        var incount = 1;

        while (skip <= $quantity) {
            input = "<input class=\"form-control col-md-7 col-xs-12\" data-validate-length-range=\"6\" " +
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
            url: 'inventory/save/' + counter,
            data: $('#addItemForm').serializeArray(),
            success: function (response) {
                if (response) {
                    console.log($('#bulk').find('li').length);
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
                    BootstrapDialog.show({
                        message: 'Duplicate item name and description.'
                    });
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


//view and edit serial
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
                    "<button id=\"serialP\" type=\"button\" class=\"prev-serialTab btn btn-default btn-sm\"><i class=\"fa fa-mail-reply\"></i> Previous</button>" +
                    "<button id=\"serialS\" onclick = \"saveSerial()\" type=\"button\" class=\"btn btn-success btn-sm\"><i class=\"fa fa-send\"></i> Save</a></button>" +
                    "<button id=\"serialN\" type=\"button\" class=\"next-serialTab btn btn-default btn-sm\"><i class=\"fa fa-mail-forward\"></i> Next</button>" +
                    " </div>";
            }
            //if div reaches 10
            //create another div
            if (data.length >= 10) {
                for (i = 0; i < data.length; i++) {
                    if (serialTabCounter !== 1) {
                        divClass = "";
                        listClass = "disabled";
                    }
                    input.push("<input type=\"checkbox\"  value =\"" + data[i]['serial'] + "\" class='selSerial' name=\"selectedSerial[]\" value=\"" + data[i]['serial'] + "\"><label class='col-12'>Serial " + (i + 1) +
                        "<input value =\"" + data[i]['serial'] + "\" type=\"text\" name=\"serial[" + data[i]['serial_id'] + "]\"" +
                        "min=0  " +
                        "class=\"form-control\"></label><br>");
                    if (input.length === 10) {
                        div.push("<div id=\"tab" + serialTabCounter + "\" class=\"tab-pane fade " + divClass + "\">");
                        list.push("<li class=\"" + listClass + "\"><a id=\"t"+serialTabCounter+"\"" +
                            "data-toggle=\"tab\" href=\"#tab" + serialTabCounter + "\">Set " + serialTabCounter + "</a></li>");
                        $serialContent.append(div);
                        $('#tab' + serialTabCounter).html(input.join('') + button);
                        div = [];
                        input = [];
                        serialTabCounter++;
                    }
                }
            } else {
                for (i = 0; i < data.length; i++) {
                    input.push("<label>Serial " + (i + 1) +
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
        }
    });

}

//get serial checkbox
function getserial(id) {
    var serials = [];
    var mooe = [];
    $.ajax({
        url: 'inventory/getSerial/' + id,
        dataType: 'JSON',
        success: function (data) {
            for (var i = 0; i < data.length; i++) {
                mooe = data[i].serial;
                var status = data[i].item_status;
                if (data[i].serial !== null && status !== 'Distributed') {
                    serials.push("<input name=\"serial[" + data[i]['serial_id'] + "] type=\"text\" id=\"text\" placeholder=\"insert text here\" \" type=\"checkbox\" class=\"check\" value=" + data[i].serial + ">" + data[i].serial + "<br>");
                }
                if (data[i].serial !== null && status === 'Distributed') {
                    serials.push("<input name=\"serial[" + data[i]['serial_id'] + "] type=\"text\" id=\"text\" placeholder=\"insert text here\" \" type=\"checkbox\" class=\"check\" value=" + data[i].serial + ">" + data[i].serial + "<br>");
                }
                if (serials.length === 0) {
                    serials = "Please input serial first.";
                }
                $('.serial').html(serials);

            }
            if (!$.trim(data)) {
                serials = "no items available";
                $('.serial').html(serials);
            }
        }
    });

}

function noserial(id) {
    var qua = ("<div class=\"quant form-group\">" +
        "<label>Quantity<span class=\"required\">*</span>" +
        "<input type=\'number\' name=\'quantity\' placeholder='quantity\' " +
        "class=\'form-control col-md-7 col-xs-12\' required>" +
        "</label>" +
        "</div>");
    $('.quant').html(qua);
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
            ($div.clone().find('input,textarea').val("")
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

//add input fields
// function addinputFields() {
//     var number = document.getElementById("dist").value;
//     var $input = document.createElement("input");
//     var $department = document.createElement("input");
//     var $code = document.createElement("input");
//     var $purchase_no = document.createElement("input");
//     var $purchase_req = document.createElement("input");
//     var $obl_r = document.createElement("input");
//     var $next = $('#next');
//
//     //quantity
//     var $quantity = document.createElement("input");
//
//     for (var i = 0; i < number; i++) {
//
//         $input.type = "text";
//         $input.setAttribute('class', 'form-control col-md-7 col-xs-12');
//         $input.setAttribute('name', 'serial' + '[' + [i] + ']');
//         container1.appendChild($input);
//
//     }
//
//     for (i = 0; i < number; i++) {
//         $input.type = "text";
//         $input.setAttribute('class', 'form-control col-md-7 col-xs-12');
//         $input.setAttribute('name', 'owner' + '[' + [i] + ']');
//         container2.appendChild($input);
//     }
//
//     $quantity.type = "text";
//     $quantity.setAttribute('name', 'quant');
//     $quantity.setAttribute('id', 'quan');
//     $quantity.setAttribute('hidden', 'true');
//
//     container3.appendChild($quantity);
//     $next.click("input", function () {
//         var dist_quantity = $('#dist').val();
//         $('#quan').val(dist_quantity);
//     });
//
//     //deptopt
//     $department.type = "text";
//     $department.setAttribute('name', 'dept');
//     $department.setAttribute('id', 'dept');
//     $department.setAttribute('disabled', 'true');
//     $department.setAttribute('hidden', 'true');
//
//     container3.appendChild($department);
//     $next.click("input", function () {
//         var department_no = $('#deptopt').val();
//         $('#dept').val(department_no);
//     });
//
//     //account code
//     $code.type = "text";
//     $code.setAttribute('name', 'Code');
//     $code.setAttribute('id', 'code');
//     $code.setAttribute('disabled', 'true');
//     $code.setAttribute('hidden', 'true');
//
//     container3.appendChild($code);
//     $next.click("input", function () {
//         var accode = $('#accode').val();
//         $('#code').val(accode);
//     });
//
//     //po
//     $purchase_no.type = "text";
//     $purchase_no.setAttribute('name', 'po');
//     $purchase_no.setAttribute('id', 'p_o');
//     $purchase_no.setAttribute('disabled', 'true');
//     $purchase_no.setAttribute('hidden', 'true');
//
//     container3.appendChild($purchase_no);
//     $next.click("input", function () {
//         var po = $('#po').val();
//         $('#p_o').val(po);
//     });
//
//     //pr
//     $purchase_req.type = "text";
//     $purchase_req.setAttribute('name', 'pr');
//     $purchase_req.setAttribute('id', 'p_r');
//     $purchase_req.setAttribute('disabled', 'true');
//     $purchase_req.setAttribute('hidden', 'true');
//
//     container3.appendChild(purchase_req);
//     $next.click("input", function () {
//         var pr = $('#pr').val();
//         $('#p_r').val(pr);
//     });
//
//     //obr
//     $obl_r.type = "text";
//     $obl_r.setAttribute('name', 'obr');
//     $obl_r.setAttribute('id', 'o_b_r');
//     $obl_r.setAttribute('disabled', 'true');
//     $obl_r.setAttribute('hidden', 'true');
//
//     container3.appendChild($obl_r);
//     $next.click("input", function () {
//         var obr = $('#obr').val();
//         $('#o_b_r').val(obr);
//     });
//
//
// }

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
        for (var i = 0; i < $selectedSerial.length - 1; i++) {
            if ($selectedSerial[i].checked === true) {
                if ($selectedSerial[i].value !== "") {
                    $data.push($selectedSerial[i].value);
                }
            }
        }
        $.ajax({
            url: "generateqr/saveQR",
            method: "POST",
            dataType: 'JSON',
            data: {selectedSerial: $data},
            success: function (data) {
                if(data.length === 0){
                    $qrDiv.html('Please select a serial from the list.');
                    $('input[name=saveqr]').css({display:'none'});
                }else{
                    for (var i = 0; i <= data.length - 1; i++) {
                        $qrCode += data[i];
                    }
                    $qrDiv.html($qrCode);
                }


            }
        });
    });

}

//print QR to pdf
function download() {

}

function closeSerial() {
    $('.serialdrop').click();
}
//remove Detail
function removeDetail($id,$serialStatus){
    var $detailtable = $('#detail-tab-table');
    var $rmItems = $('#removed-table');
    $.ajax({
        url: "inventory/removeDetail/"+$id+"/"+$serialStatus,
        method: "POST",
        success: function (data) {
            $detailtable.bootstrapTable('refresh', {url: 'inventory/detail/inv/' + $id});
            $rmItems.bootstrapTable('refresh', {url: 'inventory/showRemovedItems/' + $id});
        }
    });
}
//revert removed detail
function revertDetail($det_id,$serialStatus) {
    var $detailtable = $('#detail-tab-table');
    var $rmItems = $('#removed-table');
    $.ajax({
        url: "inventory/revert/"+$det_id+"/"+$serialStatus,
        method: "POST",
        success: function (data) {
            $detailtable.bootstrapTable('refresh', {url: 'inventory/detail/inv/' + $det_id});
            $rmItems.bootstrapTable('refresh', {url: 'inventory/showRemovedItems/' + $det_id});
        }
    });
}