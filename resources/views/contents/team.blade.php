@extends("layouts.master")




@section("content")
    <!-- Archbishop -->
    <div class="row justify-content-center pad-btm-50">
        <div class="col-lg-8 col-12 post-title text-center pad-btm-15">
            <h4 class="bm" style="display:none">Uskup Agong Kuala Lumpur</h4>
            <h4 class="eng" style="display:none">Archbishop of Kuala Lumpur</h4>
        </div>
        <div class="col-lg-8 col-12 text-center">
            <h5>{{ $archbishop->name }}</h5>
        </div>
        <div class="col-lg-8 col-12 text-center">
            <a href="mailto:{{ $archbishop->email }}"><h6><i>{{ $archbishop->email }}</i></h6></a>
        </div>
    </div>

    {{-- Director --}}
    <div class="row justify-content-center pad-btm-50">
        <div class="col-lg-8 col-12 post-title text-center pad-btm-15">
            <h4 class="bm" style="display:none">Pengarah / Penolong Gerejawi</h4>
            <h4 class="eng" style="display:none">Director / Ecclesiastical Assistant</h4>
        </div>
        <div class="col-lg-8 col-12 text-center">
            <h5>{{ $director->name }}</h5>
        </div>
        <div class="col-lg-8 col-12 text-center">
            <a href="mailto:{{ $director->email }}"><h6><i>{{ $director->email }}</i></h6></a>
        </div>
    </div>

    {{-- Assistant Director --}}
    <div class="row justify-content-center pad-btm-50">
        <div class="col-lg-8 col-12 post-title text-center pad-btm-15">
            <h4 class="bm" style="display:none">Penolong Pengarah / Penolong Gerejawi</h4>
            <h4 class="eng" style="display:none">Assistant Director / Ecclesiastical Assistant</h4>
        </div>
        <div class="col-lg-8 col-12 text-center">
            <h5>{{ $assistant_director->name }}</h5>
        </div>
        <div class="col-lg-8 col-12 text-center">
            <a href="mailto:{{ $assistant_director->email }}"><h6><i>{{ $assistant_director->email }}</i></h6></a>
        </div>
    </div>

    {{-- Secretary --}}
    <div class="row justify-content-center pad-btm-50">
        <div class="col-lg-8 col-12 post-title text-center pad-btm-15">
            <h4 class="bm" style="display:none">Admin</h4>
            <h4 class="eng" style="display:none">Admin</h4>
        </div>
        <div class="col-lg-8 col-12 text-center">
            <h5>{{ $admin->name }}</h5>
        </div>
        <div class="col-lg-8 col-12 text-center">
            <a href="mailto:{{$admin->email}}"><h6><i>{{$admin->email}}</i></h6></a>
        </div>
    </div>


    {{-- Pastoral Workers --}}

    <div class="row justify-content-center pad-btm-30">
        <div class="col-lg-8 col-12 post-title text-center">
            <h4 class="bm" style="display:none">Tim Pekerja Pastoral</h4>
            <h4 class="eng" style="display:none">Youth Pastoral Workers</h4>
        </div>
    </div>
    <div class="row justify-content-center pad-btm-50">
        <div class="col-lg-8 col-12">
            <div class="row justify-content-center align-items-center">
                @foreach($staffs as $staff)
                <div class="col-lg-6 text-center pad-btm-15">
                    <div class="col-lg-12 col-12 text-center">
                        <h5>{{$staff->name}}</h5>
                    </div>
                    <div class="col-lg-12 col-12 text-center">
                        <a href="mailto:{{$staff->email}}"><h6><i>{{$staff->email}}</i></h6></a>
                    </div>
                </div>
                @endforeach
                
            </div>
        </div>
    </div>



    
@stop

@section("js")
@stop

@section("css")
@stop