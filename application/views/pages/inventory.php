<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="header">
                        <!-- start of add item button -->
                        <div class="container">
                            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal">Add Item</button>
                            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal1">Add Bulk Items</button>
                            <!-- Trigger the modal with a button -->

                        </div>

                        <!-- end of add item button -->

                        <!-- End of modal of add bulk -->

                        <div class="content table-responsive table-full-width">
                            <script type="text/javascript">
                                //data table in the inventory
                                $(document).ready(function () {

                                    $('#table1').DataTable( {
                                        "ajax": 'inventory/viewItem'
                                    });
                                });
                            </script>

                            <table id="table1" class="table table-striped" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>Item Name</th>
                                        <th>Description</th>
                                        <th>Quantity</th>
                                        <th>Unit</th>
                                        <th>Type</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<!-- start of modal of add item -->
<!-- Modal -->

<?php echo form_open('inventory/additem');?>

<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->

        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>

                <h4 class="modal-title" align="center"><b>Add Item<b></h4>
            </div>

            <div class="modal-body">
                <table border="0" width="500" align="center" class="table">
                    <tr>
                        <td>Item Name</td>
                        <td><input type="text"  class="InputBox" name="item" value="" required></td>
                    </tr>
                    <tr>
                        <td>Description</td>
                        <td><input class="InputBox" name="description" value="" required></td>
                    </tr>


                    <tr>
                        <td>Quantity</td>
                        <td><input type="number" class="InputBox" name="quant" value="" min = 0 required></td>
                    </tr>
                    <tr>
                        <td>Unit</td>
                        <td>
                            <input name="Unit" class="unit" list="list" required>
                            <datalist id="list">
                                <option value="piece">piece</option>
                                <option value="box">box</option>
                                <option value="set">set</option>
                                <option value="ream">ream</option>
                                <option value="dozen">dozen</option>
                                <option value="bundle">bundle</option>
                                <option value="sack">sack</option>
                                <option value="others">others</option>
                            </datalist>
                        </td>
                    </tr>

                    <tr>
                        <td>Type</td>
                        <td>
                            <select id="type" list="typelist" name="Type" required>
                                <option selected="true" value="Capital Outlay">Capital Outlay</option>
                                <option value="MOOE">MOOE</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Delivery Date</td>
                        <td><input type="date" name="del" required></td>
                    </tr>
                    <tr>
                        <td>Date Received</td>
                        <td><input type="date" name="rec" required></td>
                    </tr>
                    <tr>
                        <td>Expiration Date</td>
                        <td><input type="date" class=""  name="exp"  required></td>
                    </tr>
                    <tr>
                        <td>Unit Cost</td>
                        <td><input type="number" min='0' step='any' class="InputBox" name="cost" value="" required></td>
                    </tr>
                    <tr>
                        <td>Supplier</td>
                        <td><input class="InputBox" name="supp" value="" required></td>
                    </tr>
                </table>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary" id="save1">Save</button>
                <button type="button" class="btn btn-danger" id="cancel1" data-dismiss="modal">Cancel</button>
            </div>
        </div>

    </div>
</div>
</div>
</form>
<!-- End of modal of add item  -->

<!-- start of modal of add bulk items -->
<div class="modal fade" id="myModal1" role="dialog">
    <div class="modal-dialog" style="overflow-x:auto; width:auto ">

        <!-- Modal content-->
        <div class="container" style="background-color:white; width:2750px; height: auto; size:50px;">
            <h4 class="modal-title" align="center"><b>Add Items<b></h4>

            <div class="modal-body">

                <div id="wrapper">
                    <table align='center' id="data_table" class="table table-bordered table-striped">
                        <tr>
                            <th style="width:150px;"></th>
                            <th style="width:150px;">Item Name</th>
                            <th style="width:150px;">Description</th>
                            <th style="width:80px;">Quantity</th>
                            <th style="width:80px;">Unit</th>
                            <th style="width:80px;">Type</th>
                            <th style="width:140px;">Delivery Date</th>
                            <th style="width:140px;">Date Received</th>
                            <th style="width:140px;">Expiration Date</th>
                            <th style="width:150px;">Official Receipt</th>
                            <th style="width:150px;">Received By</th>
                            <th style="width:80px;">Cost per Unit</th>
                            <th style="width:80px;">Serial</th>
                            <th style="width:80px;">Account Code</th>
                            <th style="width:150px;">Supplier</th>
                        </tr>

                        <tr>
                            <td><input type="button" class="btn btn-success" onclick="add_row();" value="Add Row"></td>
                            <td><input type="text" id="new_itemname" name="Item_Name[]" required style="width:150px;"></td>
                            <td><input id="new_description" name="Item_Description[]" required style="width:150px;"></td>
                            <td><input type="number" min=0 id="new_qty" name="Item_Quantity[]" required style="width:80px;"></td>
                            <td>

                                <input type="text" id="new_unit" name="Item_Unit[]" list="list" required style="width:80px; height: 25px;">
                                <datalist id="list">
                                    <option value="piece">piece</option>
                                    <option value="box">box</option>
                                    <option value="set">set</option>
                                    <option value="ream">ream</option>
                                    <option value="dozen">dozen</option>
                                    <option value="bundle">bundle</option>
                                    <option value="sack">sack</option>
                                    <option value="others">others</option>
                                </datalist>
                            </td>
                            <td><input type="text" id="new_type"  list="typelist" name="Item_Type[]" required style="width:80px;" pattern="CO|MOOE" title="Type must Be 'CO' or 'MOOE'">
                                <span id="error"></span>
                                <datalist id="typelist" >
                                    <option value="CO">CO</option>
                                    <option value="MOOE">MOOE</option>
                                </datalist>
                            </td>
                            <td><input type="date"  id="new_deldate" value="" name="Item_Deliverydate[]" required style="width:140px;"></td>
                            <td><input type="date"  id="new_datereceived" value="" name="Item_Datereceived[]" required style="width:140px;"></td>
                            <td><input type="date"  id="new_expdate" value="" name="Item_Expirationdate[]" required style="width:140px;"></td>
                            <td><input id="new_or" name="Item_OfficialReceipt[]" required style="width:150px;"></td>
                            <td><input type="text" id="new_receivedby" name="Item_Receivedby[]" required style="width:150px;"></td>
                            <td><input type="number" min="0" step='any' id="new_cost" name="Item_Cost[]" required style="width:80px;"></td>
                            <td><input id="new_serial" name="Item_Serial[]" required style="width:150px;"></td>
                            <td><input id="new_accountcode" name="Item_Accountcode[]" required style="width:150px;"></td>
                            <td><input type="text" id="new_supplier" name="Item_Supplier[]" required style="width:150px;"></td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary" id="save1">Save</button>
                <button type="button" class="btn btn-danger" id="cancel1" data-dismiss="modal">Cancel</button>
            </div>
        </div>

    </div>
</div>
<!-- End of modal of add bulk items  -->

<!-- Start of add bulk items js -->
<script>
    function delete_row(no)
    {
        document.getElementById("row"+no+"").outerHTML="";
    }
    function add_row()
    {
        var new_itemname=document.getElementById("new_itemname").value;
        var new_description=document.getElementById("new_description").value;
        var new_qty=document.getElementById("new_qty").value;
        var new_unit=document.getElementById("new_unit").value;
        var new_type=document.getElementById("new_type").value;
        var new_deldate=document.getElementById("new_deldate").value;
        var new_datereceived=document.getElementById("new_datereceived").value;
        var new_expdate=document.getElementById("new_expdate").value;
        var new_or=document.getElementById("new_or").value;
        var new_receivedby=document.getElementById("new_receivedby").value;
        var new_cost=document.getElementById("new_cost").value;
        var new_serial=document.getElementById("new_serial").value;
        var new_accountcode=document.getElementById("new_accountcode").value;
        var new_supplier=document.getElementById("new_supplier").value;
        var table=document.getElementById("data_table");
        var table_len=(table.rows.length)-1;
        var row = table.insertRow(table_len).outerHTML="<tr id='row"+table_len+"'>" +
            "<td> <input type='button' value='Delete' class='btn btn-danger' onclick='delete_row("+table_len+")'></td>"+
            "<td id='itemname_row"+table_len+"'><input type='text' value='"+new_itemname+"' name='Item_Name[]' required='required' style='width:150px;'></td>" +
            "<td id='description_row"+table_len+"'><input type='text' value='"+new_description+"' name='Item_Description[]' required='required' style='width:150px;'></td>" +
            "<td id='qty_row"+table_len+"'><input type='number' value='"+new_qty+"' name='Item_Quantity[]' required='required' style='width:150px;'></td>" +
            "<td id='unit_row"+table_len+"'>" +
            "<input type='text' list='unitlist' value='"+new_unit+"' name='Item_Unit[]' required='required' style='width:80px;'>" +
            "<datalist id='unitlist'> " +
            "<option value='piece'>piece</option> " +
            "<option value='box'>box</option> " +
            "<option value='set'>set</option>" +
            " <option value='ream'>ream</option> " +
            "<option value='dozen'>dozen</option> " +
            "<option value='bundle'>bundle</option> " +
            "<option value='sack'>sack</option> " +
            "<option value='others'>others</option> " +
            "</datalist>" +
            "</td>" +
            "<td id='type_row"+table_len+"'>" +
            "<input type='text' list='typelist' value='"+new_type+"' name='Item_Type[]' required='required' style='width:80px;' pattern='CO|MOOE' title='Type must Be CO or MOOE'>" +
            " <datalist id='typelist'>" +
            " <option value='CO'>CO</option>" +
            " <option value='MOOE'>MOOE</option>" +
            " </datalist>" +
            "</td>" +
            "<td id='deldate_row"+table_len+"'><input type='date' value='"+new_deldate+"' name='Item_Deliverydate[]' required='required' style='width:140px;'></td>" +
            "<td id='datereceived_row"+table_len+"'><input type='date' value='"+new_datereceived+"' name='Item_Datereceived[]' required='required' style='width:140px;'></td>" +
            "<td id='expdate_row"+table_len+"'><input type='date' value='"+new_expdate+"' name='Item_Expirationdate[]' required='required' style='width:140px;'></td>" +
            "<td id='or_row"+table_len+"'><input type='number' value='"+new_or+"' name='Item_OfficialReceipt[]' required='required' style='width:140px;'></td>" +
            "<td id='receivedby_row"+table_len+"'><input type='text' value='"+new_receivedby+"' name='Item_Receivedby[]' required='required' style='width:140px;'></td>" +
            "<td id='cost_row"+table_len+"'><input type='text' min='0' value='"+new_cost+"' name='Item_Cost[]' required='required' style='width:80px;'></td>" +
            "<td id='serial_row"+table_len+"'><input type='number' value='"+new_serial+"' name='Item_Serial[]' required='required' style='width:140px;'></td>" +
            "<td id='accountcode_row"+table_len+"'><input type='number' value='"+new_accountcode+"' name='Item_Accountcode[]' required='required' style='width:140px;'></td>" +
            "<td id='supplier_row"+table_len+"'><input type='text' value='"+new_supplier+"' name='Item_Supplier[]' required='required' style='width:140px;'></td>" +
            "</tr>";
        document.getElementById("new_itemname").value="";
        document.getElementById("new_description").value="";
        document.getElementById("new_qty").value="";
        document.getElementById("new_unit").value="";
        document.getElementById("new_type").value="";
        document.getElementById("new_deldate").value="";
        document.getElementById("new_datereceived").value="";
        document.getElementById("new_expdate").value="";
        document.getElementById("new_cost").value="";
        document.getElementById("new_serial").value="";
        document.getElementById("new_accountcode").value="";
        document.getElementById("new_supplier").value="";
    }
</script>
<!-- End of add bulk items js -->
<!-- start of modal of add qty -->
<!-- Modal -->
<div class="modal fade" id="addqty" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->

        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title" align="center"><b>Add Quantity<b></h4>
            </div>
            <?php echo form_open('inventory/addquant');?>
            <div class="modal-body">
                <table border="0" width="500" align="center" class="table">
                    <tr>
                        <td>Quantity</td>
                        <td><input type="number" class="expdate" name="quant" value="" required></td>
                    </tr>
                    <tr>
                        <td>Supplier</td>
                        <td><input  class="InputBox" name="supp" value="" required></td>
                    </tr>
                    <tr>
                        <td>Expiration Date</td>
                        <td><input type="date" class="InputBox" name="exp" value="" required></td>
                    </tr>

                    <tr>
                        <td>Delivery Date</td>
                        <td><input type="date" class="datereceived" name="del" value="" required></td>
                    </tr>
                    <tr>
                        <td>Date Received</td>
                        <td><input type="date" class="expdate" name="rec" value="" required></td>
                    </tr>

                    <tr>
                        <td>Unit Cost</td>
                        <td><input type="number" min='0' step='any' class="InputBox" name="cost" value="" required></td>
                    </tr>
                </table>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-default" name="tempdata" id="quantsave" value="">Save</button>
                <button type="button" class="btn btn-default" id="cancel1" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>
</form>
<script>
    //script for add quantity
    $('#addqty').on('show.bs.modal',function(e){
        var tempdata = $(e.relatedTarget).data('tempdata');

        $(e.currentTarget).find('#quantsave').val(tempdata);
    });
</script>

<!-- End of modal of add qty  -->

<!-- start of modal of sub qty -->
<!-- Modal -->
<div class="modal fade" id="subqty" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->

        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title" align="center"><b>Distribute<b></h4>
            </div>

            <div class="modal-body">
                <table border="0" width="500" align="center" class="table">
                    <tr>
                        <td>Department</td>
                        <td><input  class="InputBox" name="" value="" required></td>
                    </tr>
                    <tr>
                        <td>Quantity</td>
                        <td><input type="number" class="InputBox" name="" value="" required></td>
                    </tr>

                    <tr>
                        <td>Received By</td>
                        <td><input type="number" min = 0 class="InputBox" name="" value="" required></td>
                    </tr>
                    <tr>
                        <td>Account Code</td>
                        <td><input type="text" class="InputBox" name="" value="" required></td>
                    </tr>
                    <tr>
                        <td>PO No.</td>
                        <td><input type="number" min = 0 class="InputBox" name="po" value="" required></td>
                    </tr>
                    <tr>
                        <td>PR No.</td>
                        <td><input type="text" class="InputBox" name="pr" value="" required></td>
                    </tr>
                    <tr>
                        <td>OBR No.</td>
                        <td><input type="date" class="datereceived" name="obr" value=""></td>
                    </tr>
                </table>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-default" id="save1">Save</button>
                <button type="button" class="btn btn-default" id="cancel1" data-dismiss="modal">Cancel</button>
            </div>
        </div>

    </div>
</div>

<!-- End of modal of sub qty  -->


<!-- modal of edit item  -->
<!-- Modal -->

<?php echo form_open('inventory/edititem');?>

<div class="modal fade" id="edit" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->

        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title" align="center"><b>Edit<b></h4>
            </div>

            <div class="modal-body">
                <table border="0" width="500" align="center" class="table">
                    <tr>
                        <td>Item Name</td>
                        <td><input  class="InputBox" name="item" value="" required></td>
                    </tr>
                    <tr>
                        <td>Description</td>
                        <td><input type="text" class="InputBox" name="description" value="" required></td>
                    </tr>

                    <tr>
                        <td>Unit</td>
                        <td>
                            <input name="Unit" class="unit" list="list" required>
                            <datalist id="list">
                                <option value="piece">piece</option>
                                <option value="box">box</option>
                                <option value="set">set</option>
                                <option value="ream">ream</option>
                                <option value="dozen">dozen</option>
                                <option value="bundle">bundle</option>
                                <option value="sack">sack</option>
                                <option value="others">others</option>
                            </datalist>
                        </td>
                    </tr>

                    <tr>
                        <td>Type</td>
                        <td>
                            <select id="type" list="typelist" name="Type" required>
                                <option selected="true" value="Capital Outlay">Capital Outlay</option>
                                <option value="MOOE">MOOE</option>
                            </select>
                        </td>
                    </tr>
                </table>
            </div>
            <div class="modal-footer">
                <button type="submit" name="id" class="btn btn-success" id="editsave" value="">Save</button>
                <button type="button" class="btn btn-danger" id="cancel1" data-dismiss="modal">Cancel</button>
            </div>
        </div>

    </div>
</div>
</form>
<script>
    //script for edit
    $('#edit').on('show.bs.modal',function(e){
        var item_id = $(e.relatedTarget).data('id');
        var item_name = $(e.relatedTarget).data('name');
        var item_description = $(e.relatedTarget).data('description');
        var unit = $(e.relatedTarget).data('unit');
        var item_type = $(e.relatedTarget).data('type');

        $(e.currentTarget).find('#editsave').val(item_id)
        $(e.currentTarget).find('input[name="item"]').val(item_name);
        $(e.currentTarget).find('input[name="description"]').val(item_description);
        $(e.currentTarget).find('input[name="Unit"]').val(unit);
        $(e.currentTarget).find('input[name="Type"]').val(item_type);
    });
</script>
<!-- End of modal of  edit -->

<!-- start of modal of info -->
<!-- Modal -->

<script type="text/javascript">
    //data table in the inventory
    $(document).ready(function () {
        $('#itemdetails').on('show.bs.modal',function(e) {
            var item_id = $(e.relatedTarget).data('id');
            var item_name = $(e.relatedTarget).data('name');

            $('#detailTitle').html(item_name);
            $('#details').DataTable({
                "ajax": 'inventory/detail/'+item_id,
                "destroy": true
            });
        });
    });
</script>

<div class="modal fade" id="itemdetails" role="dialog">
    <div class="modal-dialog" style="overflow-x:auto; width:auto ">
        <div class="container" style="background-color:white; width:auto; height: auto; size:50px;">

            <!-- Modal content-->
            <div class="modal-header">
                <h4 class="modal-title" align="center" id="detailTitle"><b>Item Details<b></h4>
            </div>
            <div class="modal-body" align="center">

                <table id="details" class="table table-bordered table-striped" width="100%">
                    <thead>
                    <tr>
                        <th>Serial No.</th>
                        <th>Delivery Date</th>
                        <th>Date Received</th>
                        <th>Exp. Date</th>
                        <th>Cost</th>
                        <th>PO No.</th>
                        <th>PR No.</th>
                        <th>OBR No.</th>
                        <th>Account Code</th>
                        <th>Supplier</th>
                    </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-default" id="save1">Save</button>
                <button type="button" class="btn btn-default" id="cancel1" data-dismiss="modal">Cancel</button>
            </div>
        </div>

    </div>
</div>
<!-- End of modal of info  -->
