@extends("layouts.master")

@section("title","Checkin")

@section("hero",asset("Images/checkin.png"))

@section("content")
    <div class="row justify-content-center pad-btm-50">
        <div class="col-lg-8 col-12 text-center pad-btm-15">
            <h3>Check In</h3>
        </div>
        <div class="col-lg-8 col-12 pad-btm-30">
            <p>
                Di Keuskupan Agung Kuala Lumpur, Malaysia, ASAYO KL (Archdiocesan Single Adults & Youth Office, Kuala Lumpur) 
                adalah Pejabat yang ditugaskan khas untuk meneliti and melayani keperluan pastoral umat Katolik muda 
                yang berusia dari 18 sehingga 39 usia tahun dan sedang tinggal di Keuskupan Agung tersebut.
            </p>

            <p>
                Keuskupan Agung Kuala Lumpur melayani umat yang sedang tinggal di Negeri Selangor, Negeri Pahang, 
                Negeri Terengganu, Negeri Sembilan, Wilayah Perseketuan Putrajaya dan Wilayah Perseketuan Kuala Lumpur.
            </p>
        </div>
        
        <div class="col-lg-8 col-12 text-center">
            <h4>Untuk maklumat anda</h4>
        </div>
        <div class="col-lg-8 col-12 text-center pad-btm-15">
            <h6><i>For your information</i></h6>
        </div>
        <div class="col-lg-8 col-12 pad-btm-30">
            <ol class="checkin">
                <li>Semua bahagian perlu diisi. <br><span>All sections are required to be filled in.</span></li>

                <li>
                    Anda akan dihubungi 2 minggu sebelum atau 2 minggu selepas tarikh ketibaan anda melalui media sosial, 
                    e-mel atau telefon bimbit.<br>
                    <span>
                        You will be contacted 2 weeks before or 2 weeks after your date of arrival via social media, 
                        email or mobile number.
                    </span>
                </li>

                <li>
                    Kami akan bantu menghubungkan anda ke paroki atau pelayanan belia yang terdekat kepada anda.<br>
                    <span>
                        We will help connect you to the nearest parish or youth group to you.
                    </span>
                </li>

                <li>
                    Perkhidmatan ulang-alik dari terminal lapangan terbang/bus/kereta api tidak tersedia.<br>
                    <span>
                        Shuttle services from the airport / bus / train terminals are not available.
                    </span>
                </li>

                <li>Perkhimatan asrama/tempat kediaman tidak tersedia.<br><span>Dormitory/accommodation services are not available.</span></li>
                <li>Perkhidmatan biasiswa tidak tersedia.<br><span>Scholarship services are not available.</span></li>
                <li>Perkhidmatan ulang-alik ke Misa tidak tersedia.<br><span>Transport service to the Mass is not available.</span></li>

                <li>
                    Perkhidmatan dan pelayanan yang akan dipikul oleh paroki-paroki di Keuskupan Agung 
                    adalah berlainan dan mengikut keupayaan masing-masing. Beberapa perkhidmatan ini 
                    mungkin atau mungkin tidak disediakan untuk anda.<br>
                    <span>
                        The services and pastoral care that the parishes of the Archdiocese will have are different 
                        and according to their respective capabilities. Some of these services may or may not 
                        be available to you.
                    </span>
                </li>
                <li>
                    Harap maklum, kami mungkin menerima banyak e-mel setiap hari, dan kemungkinan email anda 
                    terlepas pandangan kami. Sekiranya anda tidak dihubungi dalam tempoh masa yang dinyatakan, 
                    anda boleh menghubungi ASAYO KL di +60185903889.<br>
                    <span>
                        Please note, as we may receive many emails daily, it is possible that your email may 
                        be overlooked. In the event, you are not contacted within the stated time frame, 
                        you may contact ASAYO KL at +60185903889.
                    </span>
                </li>
                
            </ol>
        </div>
    </div>

    <div class="row justify-content-center pad-btm-50">
        <div class="col-lg-4 col-12 pad-btm-30">
            <button type="button" class="checkin-button" data-toggle="modal" data-target="#form-self">
                <div class="card shadow rounded">
                    <img class="card-img-top" src="Images/checkin-button1.png" alt="Card image cap">
                    <!-- <div class="card-body text-center">
                        <h5 class="card-title" style="color:white;">Check In <br>Sendiri. <br>(Untuk pelajar/pekerja)</h5>
                        <h6 class="card-subtitle mb-2 text-darker"><i>Check In Yourself. <br>(For students/worker)</i></h6>            
                    </div> -->
                </div>
            </button>
        </div>
        <div class="col-lg-4 col-12 pad-btm-30">
            <button type="button" class="checkin-button" data-toggle="modal" data-target="#form-behalf">
                <div class="card shadow rounded">
                    <img class="card-img-top" src="Images/checkin-button2.png" alt="Card image cap">
                    <!-- <div class="card-body text-center">
                        <h5 class="card-title" style="color:white;">Check In <br>bagi pihak seseorang.<br>(Untuk ibubapa) </h5>
                        <h6 class="card-subtitle mb-2 text-darker"><i>Check In on behalf of someone.<br>(For parents)</i></h6>
                        
                    </div> -->
                </div>
            </button>
        </div>
    </div>


    <!-- Form Modal Self -->
    <div class="modal fade" id="form-self">
        <div class="modal-dialog modal-xl modal-dialog-scrollable" role="document">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Pengisian diri</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <div class="container-fluid">
                        @include("res.forms.checkin_self")
                    </div>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="button" id="self-confirm" class="btn btn-success">HANTAR</button>
                </div>

            </div>
        </div>
    </div>

    <!-- Form Modal Behalf -->
    <div class="modal fade" id="form-behalf">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Pengisian bagi pihak</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <div class="container-fluid">
                        @include("res.forms.checkin_behalf")
                    </div>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="button" id="behalf-confirm" class="btn btn-success">HANTAR</button>
                </div>

            </div>
        </div>
    </div>

    <div class="modal fade" id="confirm-self">
        <div class="modal-dialog modal-xl modal-dialog-scrollable" role="document">
            <form action="{{route("checkin.self.submit")}}" method="POST" enctype="multipart/form-data">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Sila Mengesahkan Maklumat / Kindly Confirm the Information Below</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <div class="container-fluid">
                            <div class="mb-3">
                                <h4>Warganegara / <i>Nationality</i> </h4>
                                <p><span class="edited" data-source="self-nationality"></span>, <span class="edited" data-source="self-originCountry"></span></p>
                            </div>
                            <div class="mb-3">
                                <h4>Umur / <i>Age</i></h4>
                                <p class="edited" data-source="self-age"></p>
                            </div>
                            <div class="mb-3">
                                <h4>Nama / <i>Name</i></h4>
                                <p class="edited" data-source="self-name"></p>
                            </div>
                            <div class="mb-3">
                                <h4>Nombor MyKad / Passport / <i>MyKad / Passport Number</i></h4>
                                <p class="edited" data-source="self-IC"></p>
                            </div>
                            <div class="mb-3">
                                <h4>Nombor Telefon / <i>Mobile Number</i></h4>
                                <p class="edited" data-source="self-mobile"></p>
                            </div>
                            <div class="mb-3">
                                <h4>Emel / <i>Email</i></h4>
                                <p class="edited" data-source="self-email"></p>
                            </div>
                            <div class="mb-3">
                                <h4>Sakramen / <i>Sacrament</i>:</h4>
                                <ul>
                                    <li>Pembaptisan (Baptism): <span class="edited" data-source="self-baptism"></span></li>
                                    <li>Penguatan (Confirmation): <span class="edited" data-source="self-confirmation"></span></li>
                                    <li>Ekaristi (Eucharist): <span class="edited" data-source="self-eucharist"></span></li>
                                </ul>
                            </div>
                            <div class="mb-3">
                                <h4>Negeri Asal / <i>State of origin</i></h4>
                                <p class="edited" data-source="self-originState"></p>
                            </div>
                            <div class="mb-3">
                                <h4>Keuskupan Asal / <i>Diocese of origin</i></h4>
                                <p class="edited" data-source="self-originDiocese"></p>
                            </div>
                            <div class="mb-3">
                                <h4>Nama Paroki / <i>Name of Parish / Church / Chapel</i></h4>
                                <p class="edited" data-source="self-originParish"></p>
                            </div>
                            <div class="mb-3">
                                <h4>Ke Negara / <i>Destination Country</i></h4>
                                <p class="edited" data-source="self-migrateCountry"></p>
                            </div>
                            <div class="mb-3">
                                <h4>Ke Negeri / <i>Destination State</i></h4>
                                <p class="edited" data-source="self-migrateState"></p>
                            </div>
                            <div class="mb-3">
                                <h4>Keuskupan / <i>Diocese</i></h4>
                                <p class="edited" data-source="self-migrateDiocese"></p>
                            </div>
                            <div class="mb-3">
                                <h4>Tujuan bermigrasi / <i>Purpose of migrating</i></h4>
                                <p class="edited" data-source="self-purpose"></p>
                            </div>
                            <div class="mb-3">
                                <h4>Syarikat/Kampus / <i>Organisation/Campus</i></h4>
                                <p><span class="edited" data-source="self-campus"></span><span class="edited" data-source="self-organisation"></span></p>
                            </div>
                            <div class="mb-3">
                                <h4>Bidang / <i>Field</i></h4>
                                <p><span class="edited" data-source="self-field"></span><span class="edited" data-source="self-occupation"></span></p>
                            </div>
                            <div class="mb-3">
                                <h4>Status</h4>
                                <p class="edited" data-source="self-status"></p>
                            </div>
                            <div class="mb-3">
                                <h4>Bantuan / <i>Assistance</i></h4>
                                <ul class="self-assist"></ul>
                            </div>
                        </div>
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-success">HANTAR</button>
                    </div>

                </div>
            </form>
        </div>
    </div>

    <div class="modal fade" id="confirm-behalf">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <form action="{{route("checkin.behalf.submit")}}" method="POST">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Sila Mengesahkan Maklumat / Kindly Confirm the Information Below</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <div class="container-fluid">
                            <div class="mb-3">
                                <h4>Nama yang akan bermigrasi / <i>Name which will be migrating</i>: <span class="edited" data-source="behalf-name"></span></h4>
                            </div>
                            <div class="mb-3">
                                <h4>Nombor Telefon / <i>Contact Number</i>: <span class="edited" data-source="behalf-mobile"></span></h4>
                            </div>
                            <div class="mb-3">
                                <h4>Emel / <i>Email</i>: <span class="edited" data-source="behalf-email"></span></h4>
                            </div>
                            <div class="mb-3">
                                <h4>Hubungan dengan pendaftar / <i>Relation to registree</i>: <span class="edited" data-source="behalf-relation"></span></h4>
                            </div>
                            <div class="mb-3">
                                <h4>Nama Pendaftar / <i>Name of registree</i>: <span class="edited" data-source="behalf-name-registree"></span></h4>
                            </div>
                            <div class="mb-3">
                                <h4>Nombor Telefon / <i>Contact Number</i>: <span class="edited" data-source="behalf-mobile-registree"></span></h4>
                            </div>
                            <div class="mb-3">
                                <h4>Emel / <i>Email</i>: <span class="edited" data-source="behalf-email-registree"></span></h4>
                            </div>
                            <div class="mb-3">
                                <h4>Bulan dan tahun pendaftar bermigrasi / <i>Month and year the registree will migrate</i>: <span class="edited" data-source="behalf-month"></span>, <span class="edited" data-source="behalf-year"></span> </h4>
                            </div>
                            <div class="mb-3">
                                <h4>Pendaftar akan bermigrasi ke negeri... / <i>Registree will migrate to the state of...</i>: <span class="edited" data-source="behalf-state"></span></h4>
                            </div>
                            <div class="mb-3">
                                <h4>Nama Kampus/Syarikat / <i>Name of Campus/Company</i>: <span class="edited" data-source="behalf-campus"></span></h4>
                            </div>
                        </div>
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-success">HANTAR</button>
                    </div>

                </div>
            </form>
        </div>
    </div>
@stop

@section("js")
    <script src="{{asset("checkin.js")}}"></script>
    <script>
        $(document).ready(function(){
            $(".editable").on("change",function(){
                var input=$(this);
                var target=input.attr("data-target");
                switch(input.prop("tagName")){
                    case "INPUT": 
                        switch(input.attr("type")){
                            case "text": $(".edited[data-source='"+target+"']").html(input.val()); break;
                            case "checkbox": 
                                if(input.attr("name")=="assist[]"){
                                    var checked=$("[name='assist[]']:checked");
                                    var list=$(".editable[data-source='self-assist']");
                                    list.html("");
                                    $.each(checked,function(index,item){
                                        list.append(checked.prop("value"));
                                    });
                                }else{
                                    if(input.is("checked")) $(".edited[data-source='"+target+"']").html("Yes");
                                    else $(".edited[data-source='"+target+"']").html("No");
                                }
                            break;
                        }
                    break;
                    case "SELECT": 
                        $(".edited[data-source='"+target+"']").html(input.val());
                    break;
                }
            });
        })
    </script>
@stop

@section("css")
@stop