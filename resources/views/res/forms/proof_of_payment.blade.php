<div class="row mb-5 align-items-center">
    <div class="col-12">
        <div class="mb-3">
            <p class="mb-3">
                Pendaftaran anda adalah lengkap selepas pihak ASAYOKL menerima sumbangan penuh.
                <br>
                <i>
                    (Registration is complete when ASAYOKL receives the full contribution.)
                </i>
            </p>
            <div class="mb-3">
                <div class="d-flex justify-content-center">
                    <button class="btn-primary btn" type="button" id="payment-details-button">Proceed with Payment</button>
                </div>
                    
            </div>
        </div>
        <div class="mb-3">
            Time left to complete payment and submit: <span id="timer">10:00</span> 
        </div>
        <div id="payment-details-section">
            
            <div class="mb-3">
            
                <p>
                    Pembayaran boleh dibuat kepada (Payment can be made to):<br>
                    ASAYO (Archdiocesan Single Adults and Youth Office)<br>
                    Public Bank: 3180569004
                </p>
                <div>{!! $payment_details ?? "" !!}</div>
            </div>
            <div class="mb-2">
                <p>
                    Bukti Pembayaran
                    <br>
                    <i>
                        (Upload the proof of payment)
                    </i>
                </p>
            </div>
            <div class="mb-3">
                <input type="file" name="payment" accept="image/*, application/pdf, .pdf" required>
            </div>
        </div>
        
    </div>
</div>

<script>
    function timer_start(){
        var timer=$("#timer");
        var time=10*60;
        setInterval(() => {
            time--;
            var min=time/60;
            var secs=time%60;
            timer.html(min+":"+secs);
        }, 1000);
    }
    $(document).ready(function(){
        var sect=$("#payment-details-section");
        var but=$("#payment-details-button");
        var input=but.find("input");
        sect.hide();
        but.on("click",function(){
            sect.show("fast");
            but.hide();
            timer_start();
        });
    })
</script>