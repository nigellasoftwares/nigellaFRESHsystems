<header>
    <section>
        <div class="space-header bguide3">
            <div class="space-header h1 bguide3">
                <div>
                    <img src="vendor/visafasttrack/images/visafasttrack_logo2.jpg" height="30" />
                </div>
                <div class="form-title">ACKNOWLEDGEMENT SLIP</div>
            </div>
            <div class="space-header h2 bguide6">
                <div class="receipt-number">Batch Number</div>
                <div class="receipt-number2"><?php echo $batch->batch_guid; ?></div>
            </div>
            <div class="space-header h2 bguide6">
                <div class="receipt-number">Date</div>
                <div class="receipt-number2"><?php echo date('d M Y', strtotime($batch->created_at)); ?></div>
            </div>
        </div>
    </section>
</header>    