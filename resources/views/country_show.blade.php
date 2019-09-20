@extends('layout')

@section('content')
    <div class="container">
        <div id="showGrid">
            <div>
            <img src="{{$country->flag}}" width="40%" alt="">
            </div>
            <div>
                    <div class="countryProperties">
                            Capital:
                        </div>
                        <div>
                            {{$country->capital}}
                        </div>
            </div>
            <div>
                <div class="countryProperties">
                    Population:
                </div>
                <div>
                    {{$country->population}}
                </div>
           </div>
            
        </div>
    </div>
@endsection