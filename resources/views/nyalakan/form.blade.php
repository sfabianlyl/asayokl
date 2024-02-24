@extends("layouts.master")

@section("title","Nyalakan Registration")


@section("content")
    <div class="row justify-content-center pad-btm-50">
        <div class="col-lg-10 col-12">
            <div class="row justify-content-end">
                <a href="{{route("nyalakan.logout")}}" class="btn btn-info">Log Out</a>
            </div>
            {{-- Display the weekends as tab buttons --}}
            <ul class="nav">
                @foreach($weekends as $weekend)
                    <li class="nav-item">
                        <a class="nav-link" id="weekend-{{$weekend->id}}-tab" data-toggle="tab" href="#weekend-{{$weekend->id}}" role="tab" aria-controls="weekend-{{$weekend->id}}" aria-selected="false">{{$weekend->name}}</a>
                    </li>
                @endforeach
            </ul>

            {{-- Display the tabs --}}
            <form action="{{route("nyalakan.registration.submit")}}" method="POST" id="submitForm">
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
                                        <th>Allergy or Medical Info</th>
                                        <th>Next of Kin</th>
                                        <th>Next of Kin Contact Number</th>
                                        <th>Accomodation before</th>
                                        <th>Accomodation after</th>
                                        <th>Transportation needed (bus)</th>
                                        <th>Payment Acknowledgement</th>
                                    </tr>
                                    @php
                                        $participants=$user->nyalakan_participants->where("weekend_id",$weekend->id)->get();
                                    @endphp
                                    @for($i=0;$i<10;$i++)
                                        <tr>
                                            <td>
                                                {{$i+1}}
                                                <input type="hidden" name="participant[{{$weekend->id}}][{{$i}}][weekend_id]" value="{{$weekend->id}}">
                                                <input type="hidden" name="participant[{{$weekend->id}}][{{$i}}][id]" value="{{$participants[$i]->id}}">
                                            </td>
                                            <td><input type="text" name="participant[{{$weekend->id}}][{{$i}}][name]" value="{{$participants[$i]->name??""}}"></td>
                                            <td><input type="text" name="participant[{{$weekend->id}}][{{$i}}][baptismal_name]" value="{{$participants[$i]->baptismal_name??""}}"></td>
                                            <td><input type="text" name="participant[{{$weekend->id}}][{{$i}}][nationality]" value="{{$participants[$i]->nationality??""}}"></td>
                                            <td><input type="text" name="participant[{{$weekend->id}}][{{$i}}][identification]" value="{{$participants[$i]->identification??""}}"></td>

                                            <td><input type="text" name="participant[{{$weekend->id}}][{{$i}}][age]" value="{{$participants[$i]->age}}"></td>

                                            <td><input type="text" name="participant[{{$weekend->id}}][{{$i}}][parish]" value="{{$participants[$i]->parish??""}}"></td>
                                            <td><input type="text" name="participant[{{$weekend->id}}][{{$i}}][email]" value="{{$participants[$i]->email??""}}"></td>
                                            <td><input type="text" name="participant[{{$weekend->id}}][{{$i}}][allergy]" value="{{$participants[$i]->allergy??""}}"></td>
                                            <td><input type="text" name="participant[{{$weekend->id}}][{{$i}}][next_of_kin]" value="{{$participants[$i]->next_of_kin??""}}"></td>
                                            <td><input type="text" name="participant[{{$weekend->id}}][{{$i}}][contact_next_of_kin]" value="{{$participants[$i]->contact_next_of_kin??""}}"></td>

                                            <td>
                                                <select name="participant[{{$weekend->id}}][{{$i}}][accomodation_before]">
                                                    <option value="No" {{ ($participants[$i]->accomodation_before??"No")=="No"?"selected":""}} >No</option>
                                                    <option value="Yes" {{ ($participants[$i]->accomodation_before??"No")=="Yes"?"selected":""}} >Yes</option>
                                                </select>
                                            </td>
                                            <td>
                                                <select name="participant[{{$weekend->id}}][{{$i}}][accomodation_after]">
                                                    <option value="No" {{ ($participants[$i]->accomodation_after??"No")=="No"?"selected":""}} >No</option>
                                                    <option value="Yes" {{ ($participants[$i]->accomodation_after??"No")=="Yes"?"selected":""}} >Yes</option>
                                                </select>
                                            </td>
                                            <td>
                                                <select name="participant[{{$weekend->id}}][{{$i}}][bus]">
                                                    <option value="No" {{ ($participants[$i]->bus??"No")=="No"?"selected":""}} >No</option>
                                                    <option value="Yes" {{ ($participants[$i]->bus??"No")=="Yes"?"selected":""}} >Yes</option>
                                                </select>
                                            </td>
                                            <td>
                                                <select name="participant[{{$weekend->id}}][{{$i}}][payment_acknowledgement]">
                                                    <option value="No" {{$participants[$i]->payment_acknowledgement??"No"=="No"?"selected":""}} >No</option>
                                                    <option value="Yes" {{$participants[$i]->payment_acknowledgement??"No"=="Yes"?"selected":""}} >Yes</option>
                                                </select>
                                            </td>

                                        </tr>
                                    @endfor
                                </tbody>
                            </table>                            
                        </div>
                    @endforeach
                </div>
                <div class="row">
                    <button type="submit" class="btn btn-success">Save</button>
                </div>
            </form>
        </div>
    </div>
@stop

@section("js")
<script>
    toastr.options={
        "preventDuplicates":true,
        "timeOut":"3000"
    }

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $(document).ready(function(){
        $("#submitForm").on("submit",function(e){
            e.preventDefault();
            $.ajax({
                type:"POST",
                url:$(this).attr("action"),
                data:$(this).serialize(),
                success:function(data){
                    if(data.status=="success"){
                        toastr.success("Saved!");
                        return;
                    }                
                    toastr.warning("Something went wrong, please refresh page.");
                },
                error:function(data){
                    toastr.warning("Something went wrong, please refresh page.");
                    console.log(data);
                }
            });
        });
    });
</script>
@stop

@section("css")
    <style>
        table { border-collapse: collapse; }
        tr { display: block; float: left; }
        th, td { display: block; border: 1px solid white; }
    </style>
@stop