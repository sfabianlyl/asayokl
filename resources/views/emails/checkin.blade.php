@extends('emails.master')


@section("email")

    <h3>New Census Form</h3>

    @if(isset($content))
        @if(count($content)>0)
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

@endsection