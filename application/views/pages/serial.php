<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">

        </div>

        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Serial</h2>
                        <div class="clearfix"></div>
                    </div>
                    <!--Accordion-->
                  <!-- add serial -->
                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-sm">Add Serial</button>
                  <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-sm">
                      <div class="modal-content">

                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                          </button>
                          <h4 class="modal-title" id="myModalLabel2">Add serial</h4>
                        </div>
                        <div class="modal-body">
                            <form class="form-horizontal form-label-left input_mask" action="inventory/additem" method="POST">
                                <div class="form-group">
                                    <label>Serial no.</label>
                                    <input type="text" name="serial" class="form-control" id="inputSuccess4" placeholder="">
                                </div>
                                <div class="form-group">
                                    <label>Serial name</label>
                                    <input type="text" name="serial" class="form-control" id="inputSuccess4" placeholder="">
                                </div>
                            </form>
                          </div>
                        <div class="modal-footer">
                          <button class="btn btn-primary" type="button"><i class="fa fa-close" data-dismiss="modal"></i> Cancel</button>
                          <button type="submit" class="btn btn-success"><i class="fa fa-send"></i> Submit</button>
                        </div>

                      </div>
                    </div>
                  </div>
                <!-- end for add serial-->
                <div class="x_content">
                    <div class="x_panel">
                        <table id="datatable" data-pagination="true" data-search="true" data-toggle="table" data-url="inventory/serial" data-show-toggle="true" class="table table-striped table-bordered">
                            <thead>
                            <tr>
                                <th>Serial no.</th>
                                <th>Item name</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>71357</td>
                                <td>71358</td>
                            </tr>
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>Serial no.</th>
                                <th>Item name</th>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    <div class="clearfix"></div>
</div>
<!-- /page content -->