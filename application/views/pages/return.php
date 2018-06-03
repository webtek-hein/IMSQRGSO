<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Returns</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li class="active">Dashboard</li>
                    <li class="active">Returns</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">
            <!-- Returns-->
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <table id="returnTable" class="table table-bordered">
                            <thead class="table-secondary"></thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $position = $this->session->userdata['logged_in']['position'];
if ($position === 'Custodian') {
    include 'acceptReturn.php';
}
?>

</div>
