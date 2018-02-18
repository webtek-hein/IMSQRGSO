<!-- page content -->
<div class="right_col" role="main" xmlns:height="http://www.w3.org/1999/xhtml">
    <div class="">
        <div class="x_panel">
            <div class="clearfix"></div>
            <div class="x_title" id="DetailsHead">
                <h4>Item Name: <small> <b><?=$itemdetail[0]['item']?></b></small> </h4>
                <h4>Description: <small> <b><?=$itemdetail[0]['description']?></b></small> </h4>
                <p>Total Quantity: <?=$itemdetail[0]['total']?></p>
                <p>Unit: <?=$itemdetail[0]['unit']?></p>

                <div class="clearfix"></div>
            </div>

                <!-- Main Table Content-->
            <div role="tabpanel" class="tab-pane fade active in" id="tab_cont." aria-labelledby="CO-tab">
                <button type="button" class="btn btn"><a href="<?php echo base_url()?>inventory"><i class="fa fa-reply"></i> Back</a></button>

                <table id="itemdet" data-pagination="true" data-search="true" data-show-toggle="true" class="table table-no-bordered table-hover">
                    <thead>
                    <!-- Data-field for getting data  -->
                    <tr>
                        <th data-sortable="true" data-field="del">Delivery Date</th>
                        <th data-sortable="true" data-field="rec">Date Received</th>
                        <th data-sortable="true" data-field="exp">Expiration Date</th>
                        <th data-sortable="true" data-field="cost">Cost</th>
                        <th data-sortable="true" data-field="sup">Supplier</th>
                        <th data-sortable="true" data-field="quant">Quantity</th>
                        <?php $position = $this->session->userdata['logged_in']['position'];
                        if ($position === 'Admin' || $position === 'Custodian'){
                            echo'<th data-field="action">Action</th>';
                        }
                        ?>


                    </tr>
                    </thead>
                </table>

                <!--                    <tr>-->
<!--                        <td colspan="12">-->
<!--                            <div id="data1" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">-->
<!--                                <div class="panel-body">-->
<!---->
<!--                                    <div class="col-md-offset-2">-->
<!--                                        <form>-->
<!--                                            <h4><b>Add Serial</b></h4>-->
<!--                                            <div class="col-md-5">-->
<!--                                                <label>Serial 1</label>-->
<!--                                                <input type="number" name="quant" min=0  class="form-control col-md-2">-->
<!--                                            </div>-->
<!---->
<!--                                            <div class="col-md-5">-->
<!--                                                <label>Serial 2</label>-->
<!--                                                <input type="number" name="quant" min=0  class="form-control col-md-2">-->
<!--                                            </div>-->
<!---->
<!--                                            <div class="col-md-5">-->
<!--                                                <label>Serial 3</label>-->
<!--                                                <input type="number" name="quant" min=0  class="form-control col-md-2">-->
<!--                                            </div>-->
<!---->
<!--                                            <div class="col-md-5">-->
<!--                                                <label>Serial 4</label>-->
<!--                                                <input type="number" name="quant" min=0  class="form-control col-md-2">-->
<!--                                            </div>-->
<!---->
<!--                                            <div class="col-md-5">-->
<!--                                                <label>Serial 5</label>-->
<!--                                                <input type="number" name="quant" min=0  class="form-control col-md-2">-->
<!--                                            </div>-->
<!--                                            <div class="col-md-5">-->
<!--                                                <label>Serial 6</label>-->
<!--                                                <input type="number" name="quant" min=0  class="form-control col-md-2">-->
<!--                                            </div>-->
<!--                                        </form>-->
<!--                                        <br>-->
<!--                                        <div class="col-md-offset-3">-->
<!--                                        <button type="button" class="btn btn-default btn-sm"><i class="fa fa-mail-reply"></i> Privious</button>-->
<!--                                        <button type="submit" class="btn btn-success btn-sm"><i class="fa fa-send"></i> Submit</a></button>-->
<!--                                        <button type="button" class="btn btn-default btn-sm"><i class="fa fa-mail-forward"></i> Next</button>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!---->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </td>-->
<!--                    </tr>-->
<!--                    </tbody>-->
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

