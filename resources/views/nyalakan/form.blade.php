@extends("layouts.master")

@section("title","Nyalakan Registration")


@section("content")
    <div class="row justify-content-center pad-btm-50">
        <div class="col-lg-8 col-12">

            {{-- Display the weekends as tab buttons --}}
            <ul class="nav">
                @foreach($weekends as $weekend)
                    <li class="nav-item">
                        <a class="nav-link" id="weekend-{{$weekend->id}}-tab" data-toggle="tab" href="#weekend-{{$weekend->id}}" role="tab" aria-controls="weekend-{{$weekend->id}}" aria-selected="false">{{$weekend->name}}</a>
                    </li>
                @endforeach
            </ul>

            {{-- Display the tabs --}}

            <div class="tab-content" id="formsContent">
                @foreach($weekends as $weekend)
                    <div class="tab-pane fade" id="weekend-{{$weekend->id}}" role="tabpanel" aria-labelledby="weekend-{{$weekend->id}}-tab">
                        <table>
                            <tbody>
                                <tr>
                                    <th>Participants</th>
                                    <th>Full Name as in IC/Passport</th>
                                    <th>Baptismal Name</th>
                                    <th>Nationality</th>
                                    <th>IC / Passport</th>
                                    <th>Age Group</th>
                                    <th>Parish</th>
                                    <th>Email</th>
                                    <th>Next of Kin</th>
                                    <th>Next of Kin Contact Number</th>
                                    <th>Accomodation before</th>
                                    <th>Accomodation after</th>
                                    <th>Transportation needed (bus)</th>
                                    <th>Payment Acknowledgement</th>
                                </tr>
                                @php
                                    $i=1;   
                                @endphp
                                @foreach($user->participants->where("weekend_id",$weekend->id)->get() as $participant)
                                    <tr>
                                        <td>{{$i}}<input type="hidden" name="participant[{{$weekend->id}}][{{$i}}][weekend_id]" value="{{$weekend->id}}"></td>
                                        <td><input type="text" name="participant[{{$weekend->id}}][{{$i}}][name]" id=""></td>
                                    </tr>
                                    @php
                                        $i++;
                                    @endphp
                                @endforeach
                            </tbody>
                        </table>
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