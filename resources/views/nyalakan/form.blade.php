@extends("layouts.master")

@section("title","Nyalakan Registration")


@section("content")
    <div class="row justify-content-center pad-btm-50">
        <div class="col-lg-10 col-12">
            <div class="row justify-content-end mb-3">
                <a href="{{route("nyalakan.logout")}}" class="btn btn-info">Log Out</a>
            </div>
            {{-- Display the weekends as tab buttons --}}
            <ul class="nav flex-column">
                @foreach($weekends as $weekend)
                    <li class="nav-item" style="text-align:left !important;">
                        <a class="nav-link" id="weekend-{{$weekend->id}}-tab" data-toggle="tab" href="#weekend-{{$weekend->id}}" role="tab" aria-controls="weekend-{{$weekend->id}}" aria-selected="false">{{$weekend->name}}</a>
                    </li>
                @endforeach
            </ul>

            {{-- Display the tabs --}}
            <form action="{{route("nyalakan.registration.submit")}}" method="POST" id="submitForm">
                <div class="tab-content mb-3" id="formsContent">
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
                                        <th>Gender</th>
                                        <th>Age Group</th>
                                        <th>Parish</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Allergy or Medical Info</th>
                                        <th>Next of Kin</th>
                                        <th>Next of Kin Contact Number</th>
                                        <th>Accomodation before</th>
                                        <th>Accomodation after</th>
                                        @if($weekend->id==1 || $weekend->id==4)
                                        <th>Transportation needed (bus)</th>
                                        @endif
                                    </tr>
                                    @php
                                        $participants=$user->nyalakan_participants()->where("weekend_id",$weekend->id)->get();
                                    @endphp
                                    @for($i=0;$i<10;$i++)
                                        <tr>
                                            <td>
                                                {{$i+1}}
                                                <input type="hidden" name="participant[{{$weekend->id}}][{{$i}}][weekend_id]" value="{{$weekend->id}}">
                                                <input type="hidden" name="participant[{{$weekend->id}}][{{$i}}][id]" value="{{$participants[$i]->id}}">
                                            </td>
                                            <td><input type="text" name="participant[{{$weekend->id}}][{{$i}}][name]" value="{{$participants[$i]->name??""}}" class="name-marker"></td>
                                            <td><input type="text" name="participant[{{$weekend->id}}][{{$i}}][baptismal_name]" value="{{$participants[$i]->baptismal_name??""}}"></td>
                                            <td><input type="text" name="participant[{{$weekend->id}}][{{$i}}][nationality]" value="{{$participants[$i]->nationality??""}}"></td>
                                            <td><input type="text" name="participant[{{$weekend->id}}][{{$i}}][identification]" value="{{$participants[$i]->identification??""}}"></td>
                                            <td>
                                                <select name="participant[{{$weekend->id}}][{{$i}}][gender]">
                                                    <option value="Male" {{ ($participants[$i]->gender??"")=="Male"?"selected":""}} >Male</option>
                                                    <option value="Female" {{ ($participants[$i]->gender??"")=="Female"?"selected":""}} >Female</option>
                                                </select>
                                            </td>
                                            <td>
                                                <select name="participant[{{$weekend->id}}][{{$i}}][age]">
                                                    <option value="18-20" {{ ($participants[$i]->age??"18-20")=="18-20"?"selected":""}} >18-20</option>
                                                    <option value="21-23" {{ ($participants[$i]->age??"18-20")=="21-23"?"selected":""}} >21-23</option>
                                                    <option value="24-26" {{ ($participants[$i]->age??"18-20")=="24-26"?"selected":""}} >24-26</option>
                                                    <option value="27-29" {{ ($participants[$i]->age??"18-20")=="27-29"?"selected":""}} >27-29</option>
                                                    <option value="30-35" {{ ($participants[$i]->age??"18-20")=="30-35"?"selected":""}} >30-35</option>
                                                </select>

                                            <td>
                                                <select name="participant[{{$weekend->id}}][{{$i}}][parish]">
                                                    @foreach($user->district->parishes as $parish)
                                                        <option value="{{$parish->name}}" {{ ($participants[$i]->parish??"")==$parish->name?"selected":""}} >{{$parish->name}}</option>
                                                    @endforeach
                                                </select>
                                            <td><input type="text" name="participant[{{$weekend->id}}][{{$i}}][email]" value="{{$participants[$i]->email??""}}"></td>
                                            <td><input type="text" name="participant[{{$weekend->id}}][{{$i}}][phone]" value="{{$participants[$i]->phone??""}}"></td>
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
                                            @if($weekend->id==1 || $weekend->id==4)
                                            <td>
                                                <select name="participant[{{$weekend->id}}][{{$i}}][bus]" class="bus-marker">
                                                    <option value="No" {{ ($participants[$i]->bus??"No")=="No"?"selected":""}} >No</option>
                                                    <option value="Yes" {{ ($participants[$i]->bus??"No")=="Yes"?"selected":""}} >Yes</option>
                                                </select>
                                            </td>
                                            @endif
                                        </tr>
                                    @endfor
                                </tbody>
                            </table>
                            <div class="row mb-3 ml-2">
                                <button type="submit" class="btn btn-success">Save</button>
                            </div>
                            <p class="mt-3">Fees: RM100/pax, with an extra of RM50 for bus.</p>
                            <h5>Non-Refundable Registration Fee Agreement Notice</h5>
                            <p>By submitting, I acknowledge that all fees paid under this program are: <br>(i) FULLY PROCESSED UPON THE DATE WHICH THEY ARE MADE, and <br>(ii) ALL PROCESSED PAID FEES ARE NON-REFUNDABLE (SITUATIONAL EXCEPTION APPLIES IF OCCURRENCES SUCH AS "DOUBLE PAYMENT" AND OTHER ERRORS SURFACES)</p>
                            <p>Payment can be made to:</p>
                            <p> 
                                <b>Bank Transfer</b><br>
                                Total Amount: RM <span id="total-{{$weekend->id}}"></span><br>
                                ASAYO (Archdiocesan Single Adults and Youth Office)<br>
                                Public Bank: 3180569004<br>
                                Reference: Nyalakan - {{$weekend->language}}<br>
                                Details: {{$user->district->name}}
                            </p>
                            <p>Do email the proof of payment to <a href="mailto:katherine@asayokl.my" target="_blank" rel="noopener noreferrer">katherine@asayokl.my</a>.</p>                            
                        </div>
                        
                    @endforeach
                </div>
                <div class="row mb-5 ml-3">
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

        $("select, input").on("change",function(e){
            $("form div.tab-pane").each(function(index){
                var id=$(this).attr("id").split("-")[1];
                var price=0;
                $(this).find("tr").each(function(index){
                    if($(this).find(".name-marker").val()) price+=100;
                    if($(this).find(".bus-marker").val()=="Yes") price+=50;
                });

                $("#total-"+id).text(price);
            });
        }).trigger("change");
    });
</script>
@stop

@section("css")
    <style>
        /* table { border-collapse: collapse; }
        tr { display: block; float: left; }
        th, td { display: block; border: 1px solid white; } */

        th, td{ border: 1px solid white;}
    </style>
@stop