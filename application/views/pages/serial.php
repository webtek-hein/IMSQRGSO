<style>
      /* Base for label styling */
      [type="checkbox"]:not(:checked),
      [type="checkbox"]:checked {
        position: absolute;
        left: -9999px;
      }
      [type="checkbox"]:not(:checked) + label,
      [type="checkbox"]:checked + label {
        position: relative;
        padding-left: 25px;
        cursor: pointer;
      }

      /* checkbox aspect */

      [type="checkbox"]:checked + label:before {
        content: '';
        position: absolute;
        left:0; top: 0px;
        width: 20px; height: 20px;
        //border: 1px solid #aaa;
        background: #09ad7e;
        border-radius: 3px;
        //box-shadow: inset 0 1px 3px rgba(0,0,0,.3)
      }
      [type="checkbox"]:not(:checked) + label:before {
      content: '';
        position: absolute;
        left:0; top: 0px;
        width: 20px; height: 20px;
        //border: 1px solid #fff;
        background: #eee;
        border-radius: 3px;
        //box-shadow: inset 0 1px 3px rgba(0,0,0,.3)
      }
      /* checked mark aspect */

      [type="checkbox"]:checked + label:after {
        content: '✔';
        position: absolute;
        top: 0; left: 4px;
        font-size: 14px;
        color: #f8f8f8;
        transition: all .2s;
      }
      [type="checkbox"]:not(:checked) + label:after {
      content: '✔';
        position: absolute;
        top: 0; left: 4px;
        font-size: 14px;
        color: #ddd;
        transition: all .2s;

      }
      /* checked mark aspect changes */
      [type="checkbox"]:not(:checked) + label:after {
        opacity: 1;
        transform: scale(1);
      }
      [type="checkbox"]:checked + label:after {
        opacity: 1;
        transform: scale(1);
      }
      /* disabled checkbox */
      [type="checkbox"]:disabled:not(:checked) + label:before,
      [type="checkbox"]:disabled:checked + label:before {
        box-shadow: none;
        border-color: #bbb;
        background-color: #ddd;
      }
      [type="checkbox"]:disabled:checked + label:after {
        color: #999;
      }
      [type="checkbox"]:disabled + label {
        color: #aaa;
      }
      /* accessibility */
      [type="checkbox"]:checked:focus + label:before,
      [type="checkbox"]:not(:checked):focus + label:before {
       outline: none !important;
      }

      /* hover style just for information */
      label:hover:before {
        //border: 1px solid #4778d9!important;
      }

      [type="checkbox"]:not(:checked) + label {
      color: #000;
      }
</style>

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
                <div class="accordion" id="accordion" role="tablist" aria-multiselectable="false">
                    <!--ADD ITEM-->
                    <div class="panel">
                        <a class="panel-heading" role="tab" id="headingOne" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            <h4 class="panel-title">Add Serial</h4>
                        </a>
                        <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                            <div class="panel-body">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="x_panel">
                                      <div class="x_content">
                                        <div class="">


                                                <div class="" role="tabpanel" data-example-id="togglable-tabs">
                                                  <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                                                    <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">All Categories</a>
                                                    </li>
                                                    <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Must Used</a>
                                                    </li>
                                                  </ul>
                                                  <div id="myTabContent" class="tab-content">
                                                    <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">
                                                    <!-- Start to do list -->
                                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                                          <div class="x_panel">
                                                            <div class="x_content">
                                                              <div class="">
                                                                <ul class="to_do">
                                                                  <!--start for modal of serial-->
                                                                  <input type="checkbox" id="test6"/>
                                                                    <label for="test6">Laptop</label>
                                                                    <!-- Modal -->
                                                                    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                                      <div class="modal-dialog">
                                                                        <div class="modal-content">
                                                                          <div class="modal-header">
                                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                                            <h4 class="modal-title" id="myModalLabel">Serial no.</h4>
                                                                          </div>
                                                                          <div class="modal-body">
                                                                             <!-- start to do list -->
                                                                                  <form class="form-horizontal form-label-left" novalidate>
                                                                                    <div class="item form-group">
                                                                                      <label class="control-label col-md-3 col-sm-3 col-xs-7" for="name">Serial no. <span class="required"></span>
                                                                                      </label>
                                                                                      <div class="col-md-7 col-sm-10 col-xs-10">
                                                                                        <input id="name" class="form-control col-md-7 col-xs-7" data-validate-length-range="30" data-validate-words="2" name="name" placeholder="Item name" required="required" type="text">
                                                                                      </div>
                                                                                    </div>
                                                                                </form>
                                                                              <!-- End to do list -->
                                                                          </div>
                                                                          <div class="modal-footer">
                                                                            <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                                                                            <button type="button" class="btn btn-success">Save changes</button>
                                                                          </div>
                                                                        </div>
                                                                      </div>
                                                                    </div>
                                                                    <!--end for modal of serial-->
                                                                </ul>
                                                              </div>
                                                            </div>
                                                          </div>
                                                        </div>
                                                    <!-- End to do list -->
                                                    </div>
                                                    <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">
                                                    <!-- Start to do list -->
                                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                                          <div class="x_panel">
                                                            <div class="x_content">
                                                              <div class="">
                                                                <ul class="to_do">

                                                                </ul>
                                                              </div>
                                                            </div>
                                                          </div>
                                                        </div>
                                                    <!-- End to do list -->
                                                    </div>
                                                    <!-- start to do list -->
                                                    <div class="x_content">
                                                        <form class="form-horizontal form-label-left" novalidate>
                                                          <div class="item form-group">
                                                            <label class="control-label col-md-3 col-sm-3 col-xs-7" for="name">Add Category <span class="required"></span>
                                                            </label>
                                                            <div class="col-md-5 col-sm-7 col-xs-7">
                                                              <input type="text" id="name" class="form-control col-md-7 col-xs-7" data-validate-length-range="30" data-validate-words="2" name="name" required placeholder="serial">
                                                            </div>
                                                          </div>
                                                      </form>
                                                      </div>
                                                    <!-- End to do list -->
                                                  </div>
                                                    <div class="form-group">
                                                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-4">
                                                            <button class="btn btn-primary" type="button"><i class="fa fa-close"></i> Cancel</button>
                                                            <button type="submit" class="btn btn-success"><i class="fa fa-send"></i> Add Category</button>
                                                        </div>
                                                    </div>
                                                </div>
                                              </div>
                                            </div>
                                          </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
            <!--end of category-->

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
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
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
</div>
<!-- /page content -->
<script>
$('input[type="checkbox"]').on('change', function(e){
   if(e.target.checked){
     $('#myModal').modal();
   }
});
</script>