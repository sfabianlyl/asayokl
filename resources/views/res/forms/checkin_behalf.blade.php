<div class="form-group row">
    <div class="col-lg-12">
        <label>Nama (pelajar/pekerja yang akan bermigrasi)<br> <span><i>Name (student/worker that will be migrating)</i></span></label>
        <input class="form-control editable" data-target="behalf-name" name="name" required />
    </div>
</div>

<div class="form-group row">
    <div class="col-lg-12">
        <label>Nombor Telefon <br> <span><i>Contact Number</i></span></label>
        <input class="form-control editable" data-target="behalf-mobile" name="phone" placeholder="e.g. +6013-1234567" required />
    </div>
</div>

<div class="form-group row">
    <div class="col-lg-12">
        <label>Emel <br> <span><i>Email</i></span></label>
        <input class="form-control editable" data-target="behalf-email" type="email" name="email" required />
    </div>
</div>

<div class="form-group row">
    <div class="col-lg-12">
        <label>Hubungan dengan pendaftar<br> <span><i>Relation to registree</i></span></label>
        <input class="form-control editable" data-target="behalf-relation" name="relation" required />
    </div>
</div>

<div class="form-group row">
    <div class="col-lg-12">
        <label>Nama Pendaftar<br> <span><i>Name of registree</i></span></label>
        <input class="form-control editable" data-target="behalf-name-registree" name="nameChild" required />
    </div>
</div>

<div class="form-group row">
    <div class="col-lg-12">
        <label>Nombor Telefon <br> <span><i>Contact Number</i></span></label>
        <input class="form-control editable" data-target="behalf-mobile-registree" name="phoneChild" placeholder="e.g. +6013-1234567" required />
    </div>
</div>

<div class="form-group row">
    <div class="col-lg-12">
        <label>Emel <br> <span><i>Email</i></span></label>
        <input class="form-control editable" data-target="behalf-email-registree" type="email" name="emailChild" required />
    </div>
</div>

<div class="form-group row">
    <div class="col-lg-12">
        <label>Bulan dan tahun pendaftar bermigrasi <br> <span><i>Month and year the registree will migrate</i></span></label>
    </div>
    <div class="col-lg-6 col-6">
        <select class="form-control editable" data-target="behalf-month" name="month">
            <option value="Januari">Januari / <i>January</i></option>
            <option value="Februari">Februari / <i>February</i></option>
            <option value="Mac">Mac / <i>March</i></option>
            <option value="April">April</option>
            <option value="Mei">Mei / <i>May</i></option>
            <option value="Jun">Jun / <i>June</i></option>
            <option value="Julai">Julai / <i>July</i></option>
            <option value="Ogos">Ogos / <i>August</i></option>
            <option value="September">September</option>
            <option value="Oktober">Oktober / <i>October</i></option>
            <option value="November">November</option>
            <option value="Disember">Disember / <i>December</i></option>
        </select>
    </div>
    <div class="col-lg-6 col-6">
        <select class="form-control editable" data-target="behalf-year" name="year">
            <option>2021</option>
            <option>2022</option>
            <option>2023</option>
            <option>2024</option>
            <option>2025</option>
        </select>
    </div>
</div>

<div class="form-group row">
    <div class="col-lg-12">
        <label>Pendaftar akan bermigrasi ke negeri... <br> <span><i>Registree will migrate to the state of...</i></span></label>
        <select class="form-control editable" data-target="behalf-state" name="state">
            @include("res.options.states")
        </select>
    </div>
</div>

<div class="form-group row">
    <div class="col-lg-12">
        <label>Nama Kampus/Syarikat <br> <span><i>Name of Campus/Company</i></span></label>
        <input type="text" class="form-control editable" data-target="behalf-campus" name="campus">
    </div>
</div>