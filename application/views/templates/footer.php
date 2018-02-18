    </div>
</div>

    <!-- footer content -->
<footer>
    <div class="pull-right">

    </div>
    <div class="clearfix"></div>

    <!-- bootstrap table js -->
    <script src="<?php echo base_url()?>assets/js/bootstrap-table.js"></script>
    <!-- localization -->
    <script src="<?php echo base_url()?>assets/js/bootstrap-table-en-US.js"></script>
    <!-- FastClick -->
    <script src="<?php echo base_url()?>assets/vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="<?php echo base_url()?>assets/vendors/nprogress/nprogress.js"></script>
    <!-- jQuery Smart Wizard -->
    <script src="<?php echo base_url()?>assets/vendors/jQuery-Smart-Wizard/js/jquery.smartWizard.js"></script>
    <!-- Chart.js -->
    <script src="<?php echo base_url()?>assets/vendors/Chart.js/dist/Chart.min.js"></script>
    <!-- gauge.js -->
    <script src="<?php echo base_url()?>assets/vendors/gauge.js/dist/gauge.min.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="<?php echo base_url()?>assets/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- iCheck -->
    <script src="<?php echo base_url()?>assets/vendors/iCheck/icheck.min.js"></script>
    <!-- Skycons -->
    <script src="<?php echo base_url()?>assets/vendors/skycons/skycons.js"></script>
    <!-- Flot -->
    <script src="<?php echo base_url()?>assets/vendors/Flot/jquery.flot.js"></script>
    <script src="<?php echo base_url()?>assets/vendors/Flot/jquery.flot.pie.js"></script>
    <script src="<?php echo base_url()?>assets/vendors/Flot/jquery.flot.time.js"></script>
    <script src="<?php echo base_url()?>assets/vendors/Flot/jquery.flot.stack.js"></script>
    <script src="<?php echo base_url()?>assets/vendors/Flot/jquery.flot.resize.js"></script>
    <!-- Flot plugins -->
    <script src="<?php echo base_url()?>assets/vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
    <script src="<?php echo base_url()?>assets/vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
    <script src="<?php echo base_url()?>assets/vendors/flot.curvedlines/curvedLines.js"></script>
    <!-- DateJS -->
    <script src="<?php echo base_url()?>assets/vendors/DateJS/build/date.js"></script>
    <!-- JQVMap -->
    <script src="<?php echo base_url()?>assets/vendors/jqvmap/dist/jquery.vmap.js"></script>
    <script src="<?php echo base_url()?>assets/vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
    <script src="<?php echo base_url()?>assets/vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="<?php echo base_url()?>assets/vendors/moment/min/moment.min.js"></script>
    <script src="<?php echo base_url()?>assets/vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
    <!-- data tables -->
    <!--<script src="<?php echo base_url()?>assets/plugins/jQuery/jquery-2.2.3.min.js"></script>-->
    <!-- Bootstrap 3.3.6 -->
    <script src="<?php echo base_url()?>assets/js/bootstrap.min.js"></script>
    <!--Bootstrap Dialog JS-->
    <script src="<?php echo base_url()?>assets/js/bootstrap-dialog.min.js"></script>
    <!--<script src="<?php echo base_url()?>assets/js/bootstrap-dialog.min.js"></script>-->

    <!-- Custom Theme Scripts -->
    <script src="<?php echo base_url()?>assets/build/js/custom.min.js"></script>
    <!-- Parsley -->
    <script  src="http://parsleyjs.org/dist/parsley.min.js"></script>

    <script>
        $(document).ready(function () {
            //form validation
           // window.Parsley
           //     .addValidator();
            //end of form validation
            var department = [];
            var deptlist = [];
            var supplier = [];
            var accountCode = [];

            //Show departments list and option
            $.ajax({
                url: 'inventory/getdept',
                dataType: 'JSON',
                success: function (data) {
                    for (i=0;i<data.length;i++){
                        department += "<option value="+data[i].dept_id+">"+data[i].department+"<br>";
                        deptlist += "<li><a href=Department>"+data[i].department+"</a><li>";
                    }
                    $('#deptopt').html(department);
                    $('#deptlist').html(deptlist);
                }
            });
            //show supplier options
            $.ajax({
                url: 'supplier/supplieroption',
                dataType: 'JSON',
                success: function (data) {
                    for (i=0;i<data.length;i++){
                        supplier += "<option value="+data[i].id+">"+data[i].supplier+"<br>";;
                    }
                    $('.supplieropt').html(supplier);
                }
            });
            //show account code options
            $.ajax({
                url: 'inventory/getacccodes',
                dataType: 'JSON',
                success: function (data) {
                    for (i=0;i<data.length;i++){
                        accountCode += "<option value="+data[i].ac_id+">"+data[i].account_code+" "+data[i].description+"<br>";
                    }
                    $('#accode').html(accountCode);
                }
            });

            //add another item
            var counter =1;
            var div = $('.clone-tab');
            var button = $('.savebtn');
            var list;
            $('#addanother').on('click',function () {
                counter++;
                list = "<li id=\"list"+counter+"\" role=\"presentation\" class=\"listTab disabled\"><a href=\"#step"+counter+"B\" data-toggle=\"tab\" aria-controls=\"step"+counter+"\" role=\"tab\" title=\"Step"+counter+"\">" +
                    "<span class=\"round-tab\">" +
                    "<b>Item"+counter+"</b>" +
                    "</span>" +
                    "</a>" +
                    "</li>";
                $('#bulk').append(list);
                button.attr('id','buttonCounter'+counter);
                div.clone().find('input,textarea').val("")
                    .toggleClass('required').end()
                    .attr('id','step'+counter+'B')
                    .appendTo('#bulkdiv')
                    .removeClass('active')
                    .find('#buttonCounter'+counter)
                    .attr('onclick','save('+counter+')');
            });

            $('.modal').on('show.bs.modal',function (e) {
               //get data-id
                item_id = $(e.relatedTarget).data('id');
                //assign to a button with a class btn-modal
                $('.btn-modal').val(item_id);
            });

            $('#edit_modal').on('show.bs.modal',function (e) {
                item_name = $(e.relatedTarget).data('name');
                description = $(e.relatedTarget).data('description');
                unit = $(e.relatedTarget).data('unit');
                type = $(e.relatedTarget).data('type');

                $('#item').val(item_name);
                $('#description').val(description);
                $('#Unit').val(unit);
                $('#Type').val(type);
            });
            $('#Item_Detail').on('hidden.bs.modal',function () {
                $('#itemdet').bootstrapTable('destroy');
            });



        });

        //on submit
        function save(counter){
            var list = $('#list'+counter);
            var step = $('#step'+counter+'B');
            $.ajax({
                type: 'POST',
                url: 'inventory/save/' + counter,
                data: $('#addItemForm').serializeArray(),
                success: function (response) {
                    if($('#bulk li').length > 1) {
                        if (!list.prev().length < 1) {
                            list.prev().addClass('active');
                            step.prev().addClass('active');
                        } else {
                            list.next().addClass('active');
                            step.next().addClass('active');
                        }
                        list.remove();
                        step.remove();
                    }else{
                          location.reload();
                      }
                      if(response){
                        alert('tetst');
                          BootstrapDialog.show({
                              message: 'Item has been added'
                          });
                      }
                },
                fail: function (response) {
                    alert(response);
                }

            });
        }

        function detail(id) {
                $('#itemdet').bootstrapTable({
                            url: 'inventory/detail/'+id,
                            columns: [{
                                field: 'del',
                                title: 'Delivery Date'
                            }, {
                                field: 'rec',
                                title: 'Date Received'
                            }, {
                                field: 'exp',
                                title: 'Expiration Date'
                            },{
                                field: 'cost',
                                title: 'Cost'
                            },{
                                field: 'sup',
                                title: 'Supplier'
                            },{
                                field: 'quant',
                                title: 'Quantity'
                            },{
                                field: 'action',
                                title: 'Action'
                            }],
                        });
        $('.btn-hide').on('click',function () {
           $('#firststep').modal('hide');
        });
        }
        function serial(det_id) {
            $('#serial').on('show.bs.modal',function () {
                $.ajax({
                    url: 'inventory/getSerial/'+det_id,
                    dataType: 'JSON',
                    success: function (data) {
                        $('#serialinput').empty();
                            $.each(data,function () {
                                input = '<input type="text" name="item" class="form-control" id="inputSuccess2"><br>';
                                $('#serialinput').append(input);
                        });
                    }
                });
            });
        }
        $(document).ready(function () {
            $('.Distribute').on('show.bs.modal',function (e) {
                $('#listdist').empty();
                quantity = $('#distquant').val();

                skip = 1;
                counter =1
                active='active';

                while (skip <= quantity){
                    input = "<input class=\"form-control col-md-7 col-xs-12\" data-validate-length-range=\"6\" data-validate-words=\"2\" name=\"serial\" required type=\"text\" placeholder=\"Serial\">";
                    list = "<li role=\"presentation\" class="+active+">" +
                        "<a href=\"#step"+counter+"\" data-toggle=\"tab\" aria-controls=\"step"+counter+"\" role=\"tab\" title=\"Step"+counter+"\">" +
                        "<span class=\"round-tab\">" +
                        "<b>Tab"+counter+"</b>" +
                        "</span>" +
                        "</a>" +
                        "</li>";
                    $('#listdist').append(list);
                    skip += 10;
                    active = 'disabled';
                    arrayinput = [];
                    incount = 1;
                    while (counter != 0){
                        while(incount<=10){
                            arrayinput[counter] = input;
                            incount++;
                        }
                        div="<div class=\"tab-pane active\" role=\"tabpanel\" id=\"step"+counter+"\">" +
                            "<div class=\"item form-group\">" +
                            "<label class=\"control-label col-md-1 col-sm-1 col-xs-6\" for=\"name\">Serial<span class=\"required\">*</span>" +
                            "</label>" +
                            "<div id="+counter+" class=\"col-md-6 col-sm-6 col-xs-6\">" +
                                arrayinput+
                            "</div>" +
                            "</div>" +
                            "<ul class=\"list-inline pull-right\">" +
                            "<li><button type=\"button\" class=\"btn btn-default next-step\">Save and continue</button></li>" +
                            "</ul>" +
                            "</div>";
                        $('#serialtab').append(div);
                        counter--;
                    }

                    counter++;
                }

            });
            //Initialize tooltips


            //Wizard
            $('a[data-toggle="tab"]').on('show.bs.tab', function (e) {

                var $target = $(e.target);

                if ($target.parent().hasClass('disabled')) {
                    return false;
                }
            });
            var div = $('.clone-tab');

            $(".next-step").click(function (e) {
                var $active = $('.wizard .nav-tabs li.active');
                $active.next().removeClass('disabled');
                nextTab($active);

            });
            $(".prev-step").click(function (e) {

                var $active = $('.wizard .nav-tabs li.active');
                prevTab($active);

            });
        });


        function nextTab(elem) {
            $(elem).next().find('a[data-toggle="tab"]').click();
        }
        function prevTab(elem) {
            $(elem).prev().find('a[data-toggle="tab"]').click();
        }
    </script>

    <!--distribute-->
    <script>
        function addinputFields(){
            var number = document.getElementById("dist").value;

            for (i=0;i<number;i++){

                var input = document.createElement("input");
                input.type = "text";
                input.setAttribute('class', 'form-control col-md-7 col-xs-12');
                input.setAttribute('name', 'serial'+'['+[i]+']');
                container1.appendChild(input);

            }
            for (i=0;i<number;i++){

                var input = document.createElement("input");
                input.type = "text";
                input.setAttribute('class', 'form-control col-md-7 col-xs-12');
                input.setAttribute('name', 'owner'+'['+[i]+']');
                container2.appendChild(input);
            }


            //quan
            var quantity = document.createElement("input");
            quantity.type = "text";
            quantity.setAttribute('name', 'quant');
            quantity.setAttribute('id', 'quan');
           // quantity.setAttribute('disabled', 'true');
            quantity.setAttribute('hidden', 'true');

            container3.appendChild(quantity);
            $('#next').click("input",function() {
                var dist_quantity = $('#dist').val();
                $('#quan').val(dist_quantity);
            });

            //deptopt
            var department = document.createElement("input");
            department.type = "text";
            department.setAttribute('name', 'dept');
            department.setAttribute('id', 'dept');
            department.setAttribute('disabled', 'true');
            department.setAttribute('hidden', 'true');

            container3.appendChild(department);
            $('#next').click("input",function() {
                var department_no = $('#deptopt').val();
                $('#dept').val(department_no);
            });

            //accode
            var code = document.createElement("input");
            code.type = "text";
            code.setAttribute('name', 'Code');
            code.setAttribute('id', 'code');
            code.setAttribute('disabled', 'true');
            code.setAttribute('hidden', 'true');

            container3.appendChild(code);
            $('#next').click("input",function() {
                var accode = $('#accode').val();
                $('#code').val(accode);
            });

            //po
            var purchase_no = document.createElement("input");
            purchase_no.type = "text";
            purchase_no.setAttribute('name', 'po');
            purchase_no.setAttribute('id', 'p_o');
            purchase_no.setAttribute('disabled', 'true');
            purchase_no.setAttribute('hidden', 'true');

            container3.appendChild(purchase_no);
            $('#next').click("input",function() {
                var po = $('#po').val();
                $('#p_o').val(po);
            });

            //pr
            var purchase_req = document.createElement("input");
            purchase_req.type = "text";
            purchase_req.setAttribute('name', 'pr');
            purchase_req.setAttribute('id', 'p_r');
            purchase_req.setAttribute('disabled', 'true');
            purchase_req.setAttribute('hidden', 'true');

            container3.appendChild(purchase_req);
            $('#next').click("input",function() {
                var pr = $('#pr').val();
                $('#p_r').val(pr);
            });

            //obr
            var obl_r = document.createElement("input");
            obl_r.type = "text";
            obl_r.setAttribute('name', 'obr');
            obl_r.setAttribute('id', 'o_b_r');
            obl_r.setAttribute('disabled', 'true');
            obl_r.setAttribute('hidden', 'true');

            container3.appendChild(obl_r);
            $('#next').click("input",function() {
                var obr = $('#obr').val();
                $('#o_b_r').val(obr);
            });




        }
    </script>
</footer>
</body>
</html>