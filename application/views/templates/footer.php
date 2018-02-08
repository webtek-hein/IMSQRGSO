    </div>
</div>

    <!-- footer content -->
<footer>
    <div class="pull-right">
        Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a>
    </div>
    <div class="clearfix"></div>

    <!-- bootstrap table js -->
    <script src="assets/js/bootstrap-table.js"></script>
    <!-- localization -->
    <script src="assets/js/bootstrap-table-en-US.js"></script>
    <!-- FastClick -->
    <script src="assets/vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="assets/vendors/nprogress/nprogress.js"></script>
    <!-- jQuery Smart Wizard -->
    <script src="assets/vendors/jQuery-Smart-Wizard/js/jquery.smartWizard.js"></script>
    <!-- Chart.js -->
    <script src="assets/vendors/Chart.js/dist/Chart.min.js"></script>
    <!-- gauge.js -->
    <script src="assets/vendors/gauge.js/dist/gauge.min.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="assets/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- iCheck -->
    <script src="assets/vendors/iCheck/icheck.min.js"></script>
    <!-- Skycons -->
    <script src="assets/vendors/skycons/skycons.js"></script>
    <!-- Flot -->
    <script src="assets/vendors/Flot/jquery.flot.js"></script>
    <script src="assets/vendors/Flot/jquery.flot.pie.js"></script>
    <script src="assets/vendors/Flot/jquery.flot.time.js"></script>
    <script src="assets/vendors/Flot/jquery.flot.stack.js"></script>
    <script src="assets/vendors/Flot/jquery.flot.resize.js"></script>
    <!-- Flot plugins -->
    <script src="assets/vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
    <script src="assets/vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
    <script src="assets/vendors/flot.curvedlines/curvedLines.js"></script>
    <!-- DateJS -->
    <script src="assets/vendors/DateJS/build/date.js"></script>
    <!-- JQVMap -->
    <script src="assets/vendors/jqvmap/dist/jquery.vmap.js"></script>
    <script src="assets/vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
    <script src="assets/vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="assets/vendors/moment/min/moment.min.js"></script>
    <script src="assets/vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
    <!-- data tables -->
    <!--<script src="assets/plugins/jQuery/jquery-2.2.3.min.js"></script>-->
    <!-- Bootstrap 3.3.6 -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!--<script src="assets/js/bootstrap-dialog.min.js"></script>-->

    <!-- Custom Theme Scripts -->
    <script src="assets/build/js/custom.min.js"></script>

    <script>
        $(document).ready(function () {
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

        });
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
                    }
    </script>
</footer>
</body>
</html>