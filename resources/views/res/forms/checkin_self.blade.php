<div class="form-group row">
    <div class="col-md-12">
        <label>Warganegara <br>
            <span><i>Nationality</i></span>
        </label>
        <select class="form-control editable" data-target="self-nationality" id="control-nationality" name="nationality" required>
            <option value="Malaysian Citizen">Warganegara Malaysia (Malaysian Citizen)</option>
            <option value="Non Malaysian Citizen">Warganegara Bukan Malaysia (Non Malaysian Citizen)</option>
        </select>
    </div>
</div>
<div class="form-group row">
    <div class="col-md-12">
        <label>Umur <br>
            <span><i>Age</i></span>
        </label>
        <select class="form-control editable" data-target="self-age" name="age" required>
            <option value="13 ~ 15">13 ~ 15</option>
            <option value="16 ~ 18">16 ~ 18</option>
            <option value="19 ~ 21">19 ~ 21</option>
            <option value="22 ~ 24">22 ~ 24</option>
            <option value="25 ~ 27">25 ~ 27</option>
            <option value="28 ~ 30">28 ~ 30</option>
            <option value="31 ~ keatas">31 ~ keatas</option>
        </select>
    </div>
</div>
<div class="form-group row">
    <div class="col-md-12">
        <label>Nama seperti di dalam MyKad / Passport <br>
            <span><i>Name as in MyKad / Passport</i></span>
        </label>
        <input class="form-control editable" data-target="self-name" name="name" required /> 
        <!-- restrict number -->
    </div>
</div>
<div class="form-group row">
    <div class="col-md-12">
        <label>Nombor MyKad / Passport  <br>
            <span><i>MyKad / Passport Number</i></span></label>
        <input class="form-control editable" data-target="self-IC" placeholder="e.g.: 95121xxxxxxx/Axxxxxx" name="IC" required/>
    </div>
</div>
<div class="form-group row">
    <div class="col-md-12">
        <label>Nombor Telefon Bimbit dengan Kod Negara  <br>
            <span><i>Mobile Number with Country Code</i></span>
            
        </label>
        <input class="form-control editable" data-target="self-mobile" name="mobile" placeholder="e.g. +60132xxxxxx"required/>
        <!-- restrict alphabet -->
    </div>
</div>
<div class="form-group row">
    <div class="col-md-12">
        <label>Emel  <br>
            <span><i>Email</i></span>
        </label>
        <input type="email" name="email" class="form-control editable" data-target="self-email" required/>
    </div>
</div>
<div class="form-group row">
    <div class="col-md-12">
        <label>Saya sudah menerima sakramen berikut  <br>
            <span><i>I have received the following sacrements</i></span>
        </label>
        <div class="checkbox">
            <label class="text-color">
                <input type="checkbox" value="Baptism" name="baptism" class="editable" data-target="self-baptism">Pembaptisan (Baptism)
                <input id="BaptismID" type="file" name="baptismImg"/>
            </label>
        </div>
        <div class="checkbox">
            <label class="text-color">
                <input type="checkbox" value="Confirmation" name="confirmation" class="editable" data-target="self-confirmation">Penguatan (Confirmation)
                <input type="file" id="ConfirmationID" value="Confirmation" name="confirmationImg"/>
            </label>
        </div>
        <div class="checkbox">
            <label class="text-color">
                <input type="checkbox" value="Eucharist" name="eucharist" class="editable" data-target="self-eucharist">Ekaristi (Eucharist)
                <input type="file" id="EucharistID" value="Eucharist" name="eucharistImg"/>
            </label>
        </div>
    </div>
</div>
<div class="form-group row" id="controlled-origin-country">
    <div class="col-md-12">
        <label>Negara Asal  <br>
            <span><i>Country of origin</i></span>
        </label>
        <input class="form-control editable" data-target="self-originCountry" name="originCountry" />
    </div>
</div>
<div class="form-group row" id="controlled-origin-state">
    <div class="col-md-12">
        <label>Negeri Asal:<br>
            <span><i>State of origin</i></span>
        </label>
        <select class="form-control editable" data-target="self-originState" name="originState[]">
            @include("res.options.states")
        </select>
    </div>
</div>
<div class="form-group row">
    <div class="col-md-12">
        <label>Keuskupan Asal<br>
            <span><i>Diocese of origin</i></span>
        </label>
        <select class="form-control editable" data-target="self-originDiocese" id="controlled-origin-diocese-sbh" name="originDiocese[]">
            <option value="Keuskupan Agung Kota Kinabalu">Keuskupan Agung Kota Kinabalu</option>
            <option value="Keuskupan Keningau">Keuskupan Keningau</option>
            <option value="Keuskupan Sandakan">Keuskupan Sandakan</option>
        </select>
        <select class="form-control editable" data-target="self-originDiocese" id="controlled-origin-diocese-swk" name="originDiocese[]">
            <option value="Keuskupan Agung Kuching">Keuskupan Agung Kuching</option>
            <option value="Keuskupan Miri">Keuskupan Miri</option>
            <option value="Keuskupan Sibu">Keuskupan Sibu</option>
        </select>
        <br/>
        <!-- For known peninsular diocese -->
        <input class="form-control editable" data-target="self-originDiocese" id="controlled-origin-diocese" name="originDiocese[]" readonly />

        <!-- For unknown overseas diocese -->
        <input class="form-control editable" data-target="self-originDiocese" id="controlled-origin-diocese2" name="originDiocese[]" />
    </div>
</div>
<div class="form-group row">
    <div class="col-md-12">
        <label>Nama Paroki  <br>
            <span><i>Name of Parish / Church / Chapel</i></span>
        </label>
        <select id="controlled-origin-parish" class="form-control editable" data-target="self-originParish" name="originParish[]">
            @include("res.options.klparishes")
        </select>
        <br/>
        <input id="controlled-origin-parish2" class="form-control editable" data-target="self-originParish" name="originParish[]"/>
    </div>
</div>
<div class="form-group row">
    <div class="col-md-12">
        <label>Saya akan bermigrasi / Saya sudah bermigrasi ke  <br>
            <span><i>I will be Migrating / I have already migrated to</i></span>
        </label>
        <select id="control-migrate-country" class="form-control editable" data-target="self-migrateCountry" name="migrateCountry">
            @include("res.options.countries")
        </select>
    </div>
</div>

<div id="controlled-migrate-state" class="form-group row" >
    <div class="col-md-12">
        <label>Bermigrasi ke negeri:  <br>
            <span><i>Migrating to the state of:</i></span>
        </label>
        <select class="form-control editable" data-target="self-migrateState" name="migrateState[]">
            @include("res.options.states")
        </select>
    </div>
</div>


<div id="controlled-migrate-diocese" class="form-group row">
    <div class="col-md-12">
        <label>Keuskupan  <br>
            <span><i>Diocese</i></span>
        </label>
        <select class="form-control editable" data-target="self-migrateDiocese" id="controlled-migrate-diocese-sbh" name="migrateDiocese[]">
            <option value="Keuskupan Agung Kota Kinabalu">Keuskupan Agung Kota Kinabalu</option>
            <option value="Keuskupan Keningau">Keuskupan Keningau</option>
            <option value="Keuskupan Sandakan">Keuskupan Sandakan</option>
            <option value="Tidak Pasti">Tidak Pasti</option>
        </select>
        <select class="form-control editable" data-target="self-migrateDiocese" id="controlled-migrate-diocese-swk" name="migrateDiocese[]">
            <option value="Keuskupan Agung Kuching">Keuskupan Agung Kuching</option>
            <option value="Keuskupan Miri">Keuskupan Miri</option>
            <option value="Keuskupan Sibu">Keuskupan Sibu</option>
            <option value="Tidak Pasti">Tidak Pasti</option>
        </select>
        <br/>
        <!-- For known peninsular diocese -->
        <input class="form-control editable" data-target="self-migrateDiocese" name="migrateDiocese[]" readonly />

    </div>
</div>

<div class="form-group row" >
    <div class="col-md-12">
        <label>Tujuan bermigrasi  <br>
            <span><i>Purpose of migrating</i></span>
        </label>
        <select id="control-purpose" class="form-control editable" data-target="self-purpose" name="purpose">
            <option value="Pembelajaran">Pembelajaran</option>
            <option value="Pekerjaan">Pekerjaan</option>
        </select>
    </div>
</div>
<div id="controlled-campus-field" class="form-group row">
    <div class="col-md-6">
        <div>
            <label>Nama Kampus<br>
                <span><i>Name of Campus</i></span>
            </label>
            <input class="form-control editable" data-target="self-campus" name="campus"/>
        </div>
        <div>
            <label>Bidang pembelajaran<br>
                <span><i>Field of Study</i></span>
            </label>
            <input class="form-control editable" data-target="self-field" name="field"/>
        </div>
    </div>
</div>

<div id="controlled-organisation-occupation" class="form-group row">
    <div class="col-md-6">
        <div>
            <label>Nama Syarikat  <br>
                <span><i>Name of Company</i></span>
            </label>
            <input class="form-control editable" data-target="self-organisation" name="organisation"/>
        </div>
        <div>
            <label>Bidang pekerjaan  <br>
                <span><i>Field of Work</i></span>
            </label>
            <input class="form-control editable" data-target="self-occupation" name="occupation"/>
        </div>
    </div>
</div>

<div class="form-group row">
    <div class="col-md-12">
        <label>Sila nyatakan status perkahwinan terkini anda <br>
            <span><i>Please state your current marital status</i></span>
        </label>
        <select class="form-control editable" data-target="self-status" name="status" required>
            <option value="Berkahwin dan mempunyai anak">Berkahwin dan mempunyai anak</option>
            <option value="Berkahwin dan tidak mempunyai anak">Berkahwin dan tidak mempunyai anak</option>
            <option value="Tidak pernah berkahwin tetapi mempunyai anak">Tidak pernah berkahwin tetapi mempunyai anak</option>
            <option value="Tidak pernah berkahwin dan tidak mempunyai anak">Tidak pernah berkahwin dan tidak mempunyai anak</option>
            <option value="Bercerai, bujang dan mempunyai anak">Bercerai, bujang dan mempunyai anak</option>
            <option value="Bercerai, bujang dan tidak mempunyai anak">Bercerai, bujang dan tidak mempunyai anak</option>
            <option value="Bercerai, berkahwin semula dan mempunyai anak">Bercerai, berkahwin semula dan mempunyai anak</option>
            <option value="Bercerai, berkahwin dan tidak mempunyai anak">Bercerai, berkahwin dan tidak mempunyai anak</option>
        </select>
    </div>
</div>

<div class="form-group row">
    <div class="col-md-12">
        <label>Adakah anda memerlukan sebarang bantuan/perkhidmatan sebelum atau semasa kamu sampai? (Ingat: perkhidmatan mungkin ada atau tidak disediakan untuk kamu)</label>
        <br>
        <i>Do you need any assistance before or during your arrival? (Note: some of the services may or may not be available to you)</i><br><br>
        
        <div class="row align-items-center">
            <div class="col-md-1 text-right">
                <input type="checkbox" class="editable" data-target="self-assist" name="assist[]" value="Mencari paroki terdekat (Locate parish closest to you)">
            </div>
            <div class="col-md-11">
                Mencari paroki terdekat <br>
                <span><i>Locate parish closest to you</i></span>
            </div>
        </div>
        
        <div class="row align-items-center">
            <div class="col-md-1 text-right">
                <input type="checkbox" class="editable" data-target="self-assist" name="assist[]" value="Berhubung dengan pekerja pastoral belia, wakil Persatuan Pelajar Katolik, atau wakil belia (Be in contact with a pastoral worker, Catholic Student Society representative, or youth representative)">
            </div>
            <div class="col-md-11">
                Berhubung dengan pekerja pastoral belia, wakil Persatuan Pelajar Katolik, atau wakil belia <br>
                <span><i>Be in contact with a pastoral worker, Catholic Student Society representative, or youth representative</i></span>
            </div>
        </div>
        <div class="row align-items-center">
            <div class="col-md-1 text-right">
                <input type="checkbox" class="editable" data-target="self-assist" name="assist[]" value="Tidak memerlukan sebarang bantuan (Not in need of any assistance)">
            </div>
            <div class="col-md-11">
                Tidak memerlukan sebarang bantuan <br>
                <span><i>Not in need of any assistance</i></span>
            </div>
        </div>
         
       
    </div>
</div>