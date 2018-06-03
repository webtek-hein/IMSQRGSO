<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Supplier</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li class="active">Dashboard</li>
                    <li class="active">Supplier</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<?php
$position = $this->session->userdata['logged_in']['position'];
?>
<div id="supplierPageContent" class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">
            <!-- Supplier-->
            <div class="col-lg-12 supplier-tab">
                <div class="card">
                    <?php $position = $this->session->userdata['logged_in']['position'];
                    if ($position === 'Custodian') {


                        echo '<div class="card-header">
                                  <button onclick="addSupplier()" class="btn btn-info btn-sm">
                                  <i class="fa fa-plus"></i><span> Add Supplier</span>
                                  </button>
                              </div>';
                    }
                    ?>
                    <div class="card-body">
                        <div class="tab-content pl-3 p-1" id="myTabContent">
                            <table id="supplier-table" data-search="true" data-pagination="true"
                                   class="table table-bordered">
                                <thead class="table-secondary">
                                <tr>
                                    <th data-sortable="true" data-field="supplier">Supplier</th>
                                    <th data-sortable="true" data-field="address">Address</th>
                                    <th data-sortable="true" data-field="contact">Contact</th>
                                </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <?php
            if ($position === 'Custodian') {
                include 'addSupplier.php';
                include 'editSupplier.php';
            }
            ?>

        </div>
    </div>
</div>
</div>


