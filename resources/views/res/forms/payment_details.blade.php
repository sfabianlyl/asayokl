<div class="row mb-5 align-items-center">
    <div class="col-12">
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
                @if($form->deposit) <i>To secure your spot, contribute a minimum of RM{{$form->deposit}}. Balance contribution may be made later.</i><br> @endif
                ASAYO (Archdiocesan Single Adults and Youth Office)<br>
                Public Bank: 3180569004<br>
                Reference: Include name of participant & programme [eg. Jane Tan - {{strtoupper($form->url)}}]  in transaction details.
            </p>
            <p>Do email the proof of payment to <a href="mailto:josephine@asayokl.my" target="_blank" rel="noopener noreferrer">josephine@asayokl.my</a>.</p>
            <div>{!! $payment_details ?? "" !!}</div>
        </div>
    </div>
</div>