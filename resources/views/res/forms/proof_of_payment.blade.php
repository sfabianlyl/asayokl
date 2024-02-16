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
            <p class="mb-3">
                **Jika anda menghadapi masalah dalam  membuat pembayaran, anda boleh hubungi <a href='mailto:{{setting("contact.email")}}' target="_blank">{{setting("contact.email")}}</a> atau WhatsApp kami <a href="{{setting("contact.whatsapp")}}" target="_blank" rel="noopener noreferrer">{{setting("contact.phone")}}</a>
                <br>
                <i>
                    (If you have any difficulty in making payment, contact us <a href='mailto:{{setting("contact.email")}}' target="_blank">{{setting("contact.email")}}</a> or WhatsApp us <a href="{{setting("contact.whatsapp")}}" target="_blank" rel="noopener noreferrer">{{setting("contact.phone")}}</a>) 
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
                    Pembayaran boleh dibuat kepada (Payment can be made to):
                </p>
                {{--<p>
                    <b>DuitNow</b><br>
                    Step 1: Login to any of your bank's online banking or eWallet's mobile app.<br>
                    Step 2: Search for the DuitNow logo under 'Funds Transfer' or 'Send Money'.<br>
                    Step 3: Select ID Type - Business Registration Number<br>
                    Step 4: Insert ASAYO's ID - "99999"<br>
                    Step 5: Verify details "ARCHDIOCESAN SINGLE ADULTS & YOUTH" & Amount (RM{{$form->payment_amount}})<br>
                    Step 6: Recipient Reference - Enter your mobile number, eg. 0123456789<br>
                    Step 7: Payment Details - (Your Name) {{strtoupper($form->url)}}<br>
                    Step 8: Complete transaction<br>
                    Step 9: Share your payment receipt with us by uploading<br>
                </p>--}}
                <p> 
                    <b>Bank Transfer</b><br>
                    Amount: RM{{$form->payment_amount}}<br>
                    @if($form->deposit) <i>To secure your spot, you may also contribute a minimum of RM{{$form->deposit}} deposit first, and paying the remainder later.</i><br> @endif
                    ASAYO (Archdiocesan Single Adults and Youth Office)<br>
                    Public Bank: 3180569004<br>
                    Reference: Include name of participant & programme [eg. Jane Tan - {{strtoupper($form->url)}}]  in transaction details.
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
        var ongoing=true;
        setInterval(() => {
            if(ongoing){
                time--;
                
                var min=Math.floor(time/60);
                var secs=time%60;
                timer.html(min+":"+secs);
                if(!time){
                    ongoing=false;
                    location.reload();
                }
            }
            
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