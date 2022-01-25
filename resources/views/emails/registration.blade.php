@extends('emails.master')


@section("email")

    <h3>{!! $main_heading ?? "Thank You for Registering!" !!}</h3>
    @if($meets)
        @include("emails.meets")
    @endif
    <p>{!! $intro_message !!}</p>

    @if(isset($content))
        <p>The details of your registration are as follows: </p>
        @foreach($content as $key=>$item)
            <p><b>{{$key}}:</b>
                @if(is_string($item))
                     {!! $item !!}
                @endif
                
                @if(is_array($item))
                    <ul>
                        @foreach($item as $li)
                            <li>{!! $li !!}</li>
                        @endforeach
                    </ul>
                @endif
            </p>
        @endforeach
    @endif
    
    <p>{!! $outro_message !!}</p>

@endsection