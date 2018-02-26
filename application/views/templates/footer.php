
</body>
<!-- footer content -->
<footer>
    <!-- bootstrap table js -->
    <script src="<?php echo base_url() ?>assets/js/bootstrap-table.js"></script>
    <!-- localization -->
    <script src="<?php echo base_url() ?>assets/js/bootstrap-table-en-US.js"></script>
    <!-- FastClick -->
    <script src="<?php echo base_url() ?>assets/vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="<?php echo base_url() ?>assets/vendors/nprogress/nprogress.js"></script>
    <!-- jQuery Smart Wizard -->
    <script src="<?php echo base_url() ?>assets/vendors/jQuery-Smart-Wizard/js/jquery.smartWizard.js"></script>
    <!-- Chart.js -->
    <script src="<?php echo base_url() ?>assets/vendors/Chart.js/dist/Chart.min.js"></script>
    <!-- gauge.js -->
    <script src="<?php echo base_url() ?>assets/vendors/gauge.js/dist/gauge.min.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="<?php echo base_url() ?>assets/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- iCheck -->
    <script src="<?php echo base_url() ?>assets/vendors/iCheck/icheck.min.js"></script>
    <!-- Skycons -->
    <script src="<?php echo base_url() ?>assets/vendors/skycons/skycons.js"></script>
    <!-- Flot -->
    <script src="<?php echo base_url() ?>assets/vendors/Flot/jquery.flot.js"></script>
    <script src="<?php echo base_url() ?>assets/vendors/Flot/jquery.flot.pie.js"></script>
    <script src="<?php echo base_url() ?>assets/vendors/Flot/jquery.flot.time.js"></script>
    <script src="<?php echo base_url() ?>assets/vendors/Flot/jquery.flot.stack.js"></script>
    <script src="<?php echo base_url() ?>assets/vendors/Flot/jquery.flot.resize.js"></script>
    <!-- Flot plugins -->
    <script src="<?php echo base_url() ?>assets/vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
    <script src="<?php echo base_url() ?>assets/vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
    <script src="<?php echo base_url() ?>assets/vendors/flot.curvedlines/curvedLines.js"></script>
    <!-- DateJS -->
    <script src="<?php echo base_url() ?>assets/vendors/DateJS/build/date.js"></script>
    <!-- JQVMap -->
    <script src="<?php echo base_url() ?>assets/vendors/jqvmap/dist/jquery.vmap.js"></script>
    <script src="<?php echo base_url() ?>assets/vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
    <script src="<?php echo base_url() ?>assets/vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="<?php echo base_url() ?>assets/vendors/moment/min/moment.min.js"></script>
    <script src="<?php echo base_url() ?>assets/vendors/bootstrap-daterangepicker/daterangepicker.js"></script>

    <!-- Bootstrap 3.3.6 -->
    <script src="<?php echo base_url() ?>assets/js/bootstrap.min.js"></script>
    <!--Bootstrap Dialog JS-->
    <script src="<?php echo base_url() ?>assets/js/bootstrap-dialog.min.js"></script>
    <!--<script src="<?php echo base_url() ?>assets/js/bootstrap-dialog.min.js"></script>-->
    <script src="<?php echo base_url() ?>assets/build/js/custom.js"></script>

    <!--Parsley Js-->
    <script src="<?php echo base_url() ?>assets/js/parsley.min.js"></script>

    <script>
        $(document).ready(function () {
            //initialize
            init_inventory();
            init_list();
            // serialize_forms();
            modal();
            init_bulkFucntion();
        });

        // initialize inventory list
        function init_inventory() {

            var $itemTable = $('#itemtable');
            var $MOOEtable = $('#MOOEtable');

            $itemTable.bootstrapTable('refresh', {url: 'inventory/viewItem/CO'})
                .bootstrapTable({
                    pageSize: 10,
                    url: 'inventory/viewItem/CO',
                    onClickRow:function(data,row){detail(data.id);},
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
                        title: 'QUANTITY'
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
                    onClickRow:function(data,row){detail(data.id);},
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
                        title: 'QUANTITY'
                    }]
                    // }, {
                    //     sortable: true,
                    //     field: 'Price',
                    //     title: 'PRICE'
                    // }]
                });
            $('#headingTwo').on('click',function () {
               toggleDiv($('.additemDiv'),$('.inventory-tab'));
            });
            console.log('init_inventory');
        }

        //initialize lists
        function init_list() {
            var department = [];
            var accountCode = [];
            var supplier = [];
            var $deptOpt = $('.deptopt');
            var $deptTable = $('#departmentTable');

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
            $('ul .current-page a').css('background-color', '#808080a6');
            //Show department option
            $.ajax({
                url: 'inventory/getdept',
                dataType: 'JSON',
                success: function (data) {
                    for (var i = 0; i < data.length; i++) {
                        department += "<option value=" + data[i].dept_id + ">" + data[i].department + "<br>";
                    }
                    $deptOpt.html(department);
                }
            });
            // on department change
            $('#selct-dept').change(function () {
                var id = $(this).val();
                var type = $('#myTab').find('li.active').val();
                if(type === 0){
                    $deptTable.bootstrapTable('refresh', {url: 'inventory/viewdept/CO/' + id});
                }else{
                    $deptTable.bootstrapTable('refresh', {url: 'inventory/viewdept/MOOE/' + id});

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
        // function serialize_forms() {
        //     $('form')
        //         .each(function () {
        //             $(this).data('serialized', $(this).serialize())
        //         })
        //         .on('change input', function () {
        //             $(this)
        //                 .find('button:submit')
        //                 .attr('disabled', $(this).serialize() === $(this).data('serialized'))
        //             ;
        //         })
        //         .find('button:submit')
        //         .attr('disabled', true);
        //
        //     console.log('forms serialzed');
        // }

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
                    input = "<input class=\"form-control col-md-7 col-xs-12\" data-validate-length-range=\"6\" data-validate-words=\"2\" name=\"serial\" required type=\"text\" placeholder=\"Serial\">";
                    list = "<li role=\"presentation\" class=" + active + ">" +
                        "<a href=\"#step" + counter + "\" data-toggle=\"tab\" aria-controls=\"step" + counter + "\" role=\"tab\" title=\"Step" + counter + "\">" +
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
            $('#Item_Detail').on('hidden.bs.modal', function () {
                $('#itemdet').bootstrapTable('destroy');
            });
            $('.btn-hide').on('click', function () {
                $('#firststep').modal('hide');
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
                            if ($('#bulk').find('li').length > 1) {
                                if (!list.prev().length < 1) {
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
                                message: 'Item not saved.'
                            });
                        }
                    }

                });
            });
        }

        //go back to inventory
        function detail_back() {
            $('.detail-tab ').toggleClass('hidden');
            $('.inventory-tab').toggleClass('hidden');
        }
        function addItemBack() {
            $('.additemDiv').toggleClass('hidden');
            $('.inventory-tab').toggleClass('hidden');
        }

        //edit
        function edit(id) {
            var $item_name = $('#itemname');
            var $itemdesc = $('#itemdesc');
            var $total = $('#total');
            var $unit = $('#unit');
            var $type = $('#itemtype');
            var $button = $('#edtbutton');

            $item_name.replaceWith('<input id="item" name="item" value=' + $item_name.text() + '>');
            $itemdesc.replaceWith('<input id="item" name="description" value=' + $itemdesc.text() + '>');
            $total.replaceWith(' <input value=' + $total.text() + ' type="number" min="1" name="quant">');
            $unit.replaceWith('<input list="list" id="unit" name="Unit" value=' + $unit.text() + '><datalist id="list">' +
                '<option value="piece">piece</option>' +
                '<option value="box">box</option>' +
                '<option value="set">set</option>' +
                '<option value="ream">ream</option>' +
                '<option value="dozen">dozen</option>' +
                '<option value="bundle">bundle</option>' +
                '<option value="sack">sack</option>' +
                '<option value="others">others</option>' +
                '</datalist>');
            $type.replaceWith('<select value=' + $type.text() + ' id="type" list="typelist" name="Type" required>' +
                '<option value="CO">Capital Outlay</option>\n' +
                '<option value="MOOE">MOOE</option>\n' +
                ' </select>');
            $button.removeAttr('hidden').val(id);

        }

        //view and edit serial
        function viewSerial(id) {
            var $ul = $('#serial-tabs');
            var serialTabCounter = 1;
            var $serialContent = $('#serial-tabcontent');


            $('#anchor-serial').toggleClass('collapsed').attr('aria-expanded', 'true');
            $('#data1').toggleClass('in');
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
                            "<button type=\"button\" class=\"prev-serialTab btn btn-default btn-sm\"><i class=\"fa fa-mail-reply\"></i> Privious</button>\n" +
                            "<button type=\"submit\" class=\"btn btn-success btn-sm\"><i class=\"fa fa-send\"></i> Submit</a></button>\n" +
                            "<button type=\"button\" class=\"next-serialTab btn btn-default btn-sm\"><i class=\"fa fa-mail-forward\"></i> Next</button>\n" +
                            " </div></div>";
                    }
                    //if div reaches 10
                    //create another div
                    if (data.length >= 10) {
                        console.log(data.length);
                        for (i = 0; i < data.length; i++) {
                            if (serialTabCounter !== 1) {
                                divClass = "";
                                listClass = "disabled";
                            }
                            input.push("<label>Serial " + (i + 1) +
                                "<input value=\"" + data[i]['serial'] + "\" type=\"text\" name=\"serial[" + data[i]['serial_id'] + "]\"" +
                                "min=0  " +
                                "class=\"form-control col-md-2\"></label><br>");
                            if (input.length === 10) {
                                div.push("<div id=\"tab" + serialTabCounter + "\" class=\"tab-pane fade " + divClass + "\">");
                                list.push("<li class=\"" + listClass + "\"><a data-toggle=\"tab\" href=\"#tab" + serialTabCounter + "\">Set " + serialTabCounter + "</a></li>");
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
                                "class=\"form-control col-md-2\"></label><br>");

                        }
                        div.push("<div id=\"tab" + serialTabCounter + "\" class=\"tab-pane fade " + divClass + "\">");
                        list.push("<li class=\"" + listClass + "\"><a data-toggle=\"tab\" href=\"#tab" + serialTabCounter + "\">Set " + serialTabCounter + "</a></li>");
                        $serialContent.append(div);
                        $('#tab1').html(input.join('') + button);
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

                }
            });
        }

        //get serial checkbox
        function getserial(id) {
            var serials = [];
            $.ajax({
                url: 'inventory/getSerial/' + id,
                dataType: 'JSON',
                success: function (data) {
                    for (var i = 0; i < data.length; i++) {
                        if (data[i].serial !== null && data[i].item_status === 'In-stock') {
                            serials.push("<input name=\"serial[]\" type=\"checkbox\" value=" + data[i].serial + ">" + data[i].serial + "<br>");
                        }
                    }
                    if (serials.length === 0) {
                        serials = "Please input serial first.";
                    }
                    $('#serial').html(serials);
                }
            });
        }

        // go to detail
        function detail(id) {
            var $detailtable = $('#detail-tab-table');
            var item;
            $.get('inventory/getitem/' + id, function (data) {
                item = JSON.parse(data);
                $('#detailAddquantity').attr('data-id', id);
                $('#changetoEdit').attr('onclick', 'edit(' + id + ')');
                $('#itemname').html(item.name);
                $('#itemdesc').html(item.description);
                $('#total').html(item.quantity);
                $('#itemtype').html(item.item_type);
                $('#unit').html(item.unit);
            }).done(function () {
                toggleDiv($('.detail-tab '),$('.inventory-tab'));
                $detailtable.bootstrapTable('refresh', {url: 'inventory/detail/' + id})
                    .bootstrapTable({
                        url: 'inventory/detail/' + id,
                        columns: [{
                            field: 'del',
                            title: 'Delivery Date'
                        }, {
                            field: 'rec',
                            title: 'Date Received'
                        }, {
                            field: 'exp',
                            title: 'Expiration Date'
                        }, {
                            field: 'cost',
                            title: 'Cost'
                        }, {
                            field: 'sup',
                            title: 'Supplier'
                        }, {
                            field: 'quant',
                            title: 'Quantity'
                        }, {
                            field: 'action',
                            title: 'Action'
                        }]
                    });
            });
        }

        //toggle hidden class of element
    function toggleDiv(elementToShow,elementToHide){
        elementToShow.toggleClass('hidden');
        elementToHide.toggleClass('hidden');
    }
        // add another item function
        function init_bulkFucntion() {
            var $div = $('.clone-tab');
            var $button = $('.savebtn');
            var $ul = $('#bulk');
            var list;
            var counter = 1;

            $('#addanother').on('click', function () {
                $('#addItemForm').parsley().whenValidate({group: 'set' + counter}).done(function () {
                    counter++;
                    $button.attr('id', 'buttonCounter' + counter);
                    $div.clone().find('input,textarea').val("")
                        .attr('data-parsley-group', 'set' + counter)
                        .toggleClass('required').end()
                        .attr('id', 'step' + counter + 'B')
                        .appendTo('#bulkdiv')
                        .removeClass('active')
                        .find('#buttonCounter' + counter)
                        .attr('onclick', 'save(' + counter + ')');
                    list = "<li id=\"list" + counter + "\" role=\"presentation\" class=\"listTab\"><a href=\"#step" + counter + "B\" data-toggle=\"tab\" aria-controls=\"step" + counter + "\" role=\"tab\" title=\"Step" + counter + "\">" +
                        "<span class=\"round-tab\">" +
                        "<b>Item" + counter + "</b>" +
                        "</span>" +
                        "</a>" +
                        "</li>";
                    console.log($ul.append(list).find('li.active').next().find('a[data-toggle=tab]').click());
                });

            });
            console.log('init_bulkFunction');
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

    </script>
</footer>
</body>
</html>