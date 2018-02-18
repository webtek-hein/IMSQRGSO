<!-- page content -->
<div class="right_col" role="main" xmlns:height="http://www.w3.org/1999/xhtml">
    <div class="">
        <div class="x_panel">
            <div class="clearfix"></div>

            <div class="x_title" id="DetailsHead">
                <h4>Item Name: <small> <b>Raincoats</b></small> </h4>
                <h4>Description: <small> <b>Waterproof Coats</b></small> </h4>
                <p>Total Quantity: 200</p>
                <p>Unit: Piece</p>

                <div class="clearfix"></div>
            </div>

                <!-- Main Table Content-->
            <div role="tabpanel" class="tab-pane fade active in" id="tab_cont." aria-labelledby="CO-tab">
                <button type="button" class="btn btn"><a href="Inventory"><i class="fa fa-reply"></i> Back</a></button>

                <table id="datatable" class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <?php $position = $this->session->userdata['logged_in']['position'];
                        if ($position === 'Admin' || $position === 'Custodian') {
                            echo '<th>Add Serial</th>';

                        }else{
                            echo'<th>Serial</th>';
                        }
                        ?>
                        <th>Date Delivered</th>
                        <th>Date Received</th>
                        <th>Expiration Date</th>
                        <th>Cost</th>
                        <th>Supplier</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <?php $position = $this->session->userdata['logged_in']['position'];
                        if ($position === 'Admin' || $position === 'Custodian'){
                            echo'<td><a class="btn btn-modal btn-default btn-xs" role="tab" id="headingOne" data-toggle="collapse" data-parent="#accordion" href="#data1" aria-expanded="true" aria-controls="collapseOne"><li class="	fa fa-folder-open"></li> View Serial</a></td>';
                            }else{
                            echo'<td>12345</td>';
                        }
                        ?>
                        <td>2018-02-1d</td>
                        <td>2018-02-17</td>
                        <td>2018-02-17</td>
                        <td>61</td>
                        <td>TiongSan</td>
                        <td><a href="#" data-toggle="modal" data-target=".Distribute" class="btn btn-modal btn-default btn-xs">
                            <i class="fa fa-plus-circle"></i> Distribute</a>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="12">
                            <div id="data1" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                                <div class="panel-body">

                                    <div class="col-md-offset-2">
                                        <form>
                                            <h4><b>Add Serial</b></h4>
                                            <div class="col-md-5">
                                                <label>Serial 1</label>
                                                <input type="number" name="quant" min=0  class="form-control col-md-2">
                                            </div>

                                            <div class="col-md-5">
                                                <label>Serial 2</label>
                                                <input type="number" name="quant" min=0  class="form-control col-md-2">
                                            </div>

                                            <div class="col-md-5">
                                                <label>Serial 3</label>
                                                <input type="number" name="quant" min=0  class="form-control col-md-2">
                                            </div>

                                            <div class="col-md-5">
                                                <label>Serial 4</label>
                                                <input type="number" name="quant" min=0  class="form-control col-md-2">
                                            </div>

                                            <div class="col-md-5">
                                                <label>Serial 5</label>
                                                <input type="number" name="quant" min=0  class="form-control col-md-2">
                                            </div>
                                            <div class="col-md-5">
                                                <label>Serial 6</label>
                                                <input type="number" name="quant" min=0  class="form-control col-md-2">
                                            </div>
                                        </form>
                                        <br>
                                        <div class="col-md-offset-3">
                                        <button type="button" class="btn btn-default btn-sm"><i class="fa fa-mail-reply"></i> Privious</button>
                                        <button type="submit" class="btn btn-success btn-sm"><i class="fa fa-send"></i> Submit</a></button>
                                        <button type="button" class="btn btn-default btn-sm"><i class="fa fa-mail-forward"></i> Next</button>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
                            <!--MOOE Tab-->
                    <!-- end of Main Table Content-->
        </div>


                <!-- Modals -->

                <!--Distribution-->

                    <div class="modal fade Distribute" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">

                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                                    </button>
                                    <h4 class="modal-title" id="myModalLabel">Distribution</h4>
                                </div>
                                <div class="modal-body">

                                    <?php $position = $this->session->userdata['logged_in']['position'];
                                    if ($position === 'Admin' || $position === 'Custodian'){

                                        echo '<b>Distribute Item with Serial:</b>'.
                                    '<div class="checkbox">'.
                                        '<label>'.
                                            '<input type="checkbox" value="">6161d6sdcd</br>'.
                                            '<input type="checkbox" value="">6161d6sdcd</br>'.
                                            '<input type="checkbox" value="">6161d6sdcd</br>'.
                                            '<input type="checkbox" value="">6161d6sdcd'.
                                        '</label>'.
                                    '</div>'.
                                    '<b>To</b>'.
                                    '<form role="form" class="form-horizontal form-label-left" >'.
                                            '<div class="col-md-6 col-sm-6 col-xs-12">'.
                                                '<label for="name">Department</label>'.
                                                '<input id="website" class="form-control col-md-7 col-xs-12" required="required" type="text">'.
                                            '</div>'.
                                            '<div class="col-md-6 col-sm-6 col-xs-12">'.
                                                '<label for="name">PO Number</label>'.
                                                '<input id="website" class="form-control col-md-7 col-xs-12" required="required" type="text">'.
                                            '</div>'.
                                            '<div class="col-md-6 col-sm-6 col-xs-12">'.
                                                '<label for="name">PR Number</label>'.
                                                '<input id="website" class="form-control col-md-7 col-xs-12" required="required" type="text">'.
                                            '</div>'.
                                            '<div class="col-md-6 col-sm-6 col-xs-12">'.
                                                '<label for="name">OBR Number</label>'.
                                                '<input id="website" class="form-control col-md-7 col-xs-12" required="required" type="text">'.
                                            '</div>'.
                                            '</div>'.
                                    '</form>';

                                    }else{
                                        echo '<form><div class="col-md-6 col-sm-6 col-xs-12" >'.
                                            '<label for="name">Employee Name</label>'.
                                            '<input id="website" class="form-control col-md-7 col-xs-12" required="required" type="text">'.
                                        '</div>'.
                                    '</div>'.
                                    '</form>';
                            }
                            ?>


                                    <div class="modal-footer">
                                        <button type="submit" class="btn-modal btn btn-success" id="save1"><i class="fa fa-arrow-down"></i> Save</button>
                                        <button type="button" class="btn btn-default" id="cancel1" data-dismiss="modal">Cancel</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <!-- end of distribution-->

                <!-- /Modal -->
    </div>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>

