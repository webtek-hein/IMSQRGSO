$(document).ready(function () {


    $('#userSelectDept').click(function () {
        if ($(this).val() === 'supply officer') {
            $('#dmentselect').css({'display': 'block'});
        } else {
            $('#dmentselect').css({'display': 'none'});
        }
    });

    $('a[href=department]').click(function () {
        var department;
        var deptOpt;
        var ownerOpt;

        //Show department option
        $.ajax({
            url: 'inventory/getdept',
            dataType: 'JSON',
            success: function (data) {
                for (var i = 0; i < data.length; i++) {
                    department += '<option value=" + data[i].dept_id + ">' + data[i].department + '<br>';
                }
                deptOpt.html(department);
                deptOpt.change(function () {
                    var $id = $(this).val();
                    var users = [];
                    $.ajax({
                        url: 'inventory/getSupplyOfficers/' + $id,
                        dataType: 'JSON',
                        success: function (data) {
                            for (var i = 0; i <= data.length - 1; i++) {
                                users += "<option value=" + data[i].user_id + ">" + data[i].name + "<br>";
                            }
                            ownerOpt.html(users);

                        }
                    });
                });
            }
        });

    });

    $('#supplierPageContent').ready(function () {
        var $supplier = $('#supplier-table');

        $supplier.bootstrapTable('refresh', {url: 'supplier/viewsuppliers'})
            .bootstrapTable({
                pageSize: 10,
                url: 'supplier/viewsuppliers',
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
                    }
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
    });

    $('#inventoryPageContent').ready(function () {
        var $itemTable = $('#itemtable');
        var $MOOEtable = $('#MOOEtable');

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
    });

    $('#departmentPageContent').ready(function () {
        var $deptTable = $('#departmentTable');
        var $deptMOOEtable = $('#deptMOOEtable');

        loadDepartmentOptions();

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
    });
    
    $('#accountsPageContent').ready(function () {
        var $userTable = $('#user-table');

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
    });

    $('#editPageContent').ready(function () {
        var $editlogtableco = $('#editlogco');
        var $editlogtablemooe = $('#editlogmooe');

        $editlogtableco.bootstrapTable({
            pageSize: 10,
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
    });

    $('#edtUserBack').click(function () {
        toggleDiv($('.accounts-tab'), $('.userDetail'));
    });

    $('#headingZero').on('click', function () {
        toggleDiv($('.addUser'), $('.accounts-tab'));
    });

    $('#addUserBack').click(function () {
        toggleDiv($('.accounts-tab'), $('.addUser'));
    });
    $('#editUserBack').click(function () {
        toggleDiv($('.accounts-tab'), $('.userDetail'));
    });


});

function loadDepartmentOptions() {
    var deptOpt = $('.deptopt');
    var department;

    //Show department option
    $.ajax({
        url: 'inventory/getdept',
        dataType: 'JSON',
        success: function (data) {
            for (var i = 0; i < data.length; i++) {
                department += '<option value=' + data[i].dept_id + '>' + data[i].department + "<br>";
            }
            deptOpt.html(department);

        }
    });


}

//toggle hidden class of element
function toggleDiv(elementToShow, elementToHide) {

    elementToShow.removeAttr('hidden');
    elementToHide.attr('hidden', 'hidden');

}

//details
function detail(data) {
    var $detailtable = $('#detail-tab-table');
    var $ledger = $('#ledger');
    var $rmItems = $('#removed-table');

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
        }]
    });

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



