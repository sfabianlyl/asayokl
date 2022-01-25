@extends('emails.master')


@section("email")

    <h1>{!! $main_heading ?? "Thank You for Registering!" !!}</h1>
    @if($meets)
        @include("emails.meets")
    @endif
    <p>{!! $intro_message !!}</p>

    @if(isset($content))
        @if(count($content)>0)
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
    @endif
    
    <div>{!! $outro_message !!}</div>

@endsection