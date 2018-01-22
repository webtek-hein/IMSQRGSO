

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="header">
                    <div class="content table-responsive table-full-width">

                        <script type="text/javascript">
                            $(document).ready(function () {
                                $('#table1').dataTable();
                            });
                        </script>
                        <table id="table1" class="table table-striped" cellspacing="10" width="100%">
                            <thead>
                            <th>Item Name</th>
                            <th>Description</th>
                            <th>Quantity</th>
                            <th>Date Returned</th>
                            <th>Receive From</th>
                            <th>Reason</th>
                            <th>Action</th>

                            </thead>
                            <tbody>
                            <tr>
                                <td>Laptop</td>
                                <td>Lenovo, Black</td>
                                <td>3</td>
                                <td>11/21/17</td>
                                <td>Budget Office</td>
                                <td>Broken Screen</td>
                                <td>
                                    <!-- Modal -->
                                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModalNorm" >Replace</button>
                                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModalNorm" >Ignore</button></td>








                            </tr>

                            </tbody>
                        </table>



                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

</div>
</div>
</div>

<!-- Modal content-->
<div class="modal fade" id="myModalNorm" tabindex="-1" role="dialog"
     aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <button type="button" class="close"
                        data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">Close</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">
                    <b>Available Stock for this item is (# of items)</b>
                </h4>
            </div>

            <!-- Modal Body -->
            <div class="modal-body">
                <table border="0" width="500" align="center" class="table">
                    <tr>
                        <td>Account Code</td>
                        <td><input  class="InputBox" name="" value="" required ></td>
                    </tr>
                    <tr>
                        <td>Serial No.</td>
                        <td><input type="text" class="InputBox" name="" value="" required></td>
                    </tr>

                    <tr>
                        <td>Received By</td>
                        <td><input type="number" min = 0 class="InputBox" name="" value="" required></td>
                    </tr>
                </table>

                <!-- Modal Footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-success"
                            data-dismiss="modal">
                        Save
                    </button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">
                        Cancel
                    </button>
                </div>


                <!-- End of modal -->