<div class="section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3>Upload Payment Proof</h3>

                <?php echo form_open_multipart('transaksi/process_payment'); ?>
                <input type="hidden" name="transaction_id" value="<?= $transaction_id; ?>" />
                
                <div class="form-group">
                    <label for="payment_proof">Bukti Pembayaran</label>
                    <input type="file" name="payment_proof" id="payment_proof" class="form-control" required />
                </div>
                
                <button type="submit" class="btn btn-success">Upload</button>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
</div>
