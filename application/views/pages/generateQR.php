<!-- Modal for generate qr -->
<div class="modal fade" id="genQr" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body" id="QRImages">
                <div id="generatedQR">Loading qr images.....</div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <?php if ($position === 'Custodian') {
                    echo '<button name="saveqr" type="file" onclick="printDiv()" required>Print</button>';
                }
                ?>
            </div>
        </div>

    </div>
</div>