@extends('layout')
<?php
function startsWith($string, $startString)
{
    $len = strlen($startString);
    return (substr($string, 0, $len) === $startString);
}
?>
@section('content')
    <div class="container">
            <table id="countryResults" class="table" style="width:80%;margin:0px auto;">
                    <thead>
                        <th style="width:33.333%;text-align:center;text-align:center;">Flag:</th>
                        <th style="width:33.333%;text-align:center;">
                            Name:                    
                        </th>
                        <th style="width:33.333%;text-align:center;">Population:</th>
                    </thead>    
                </table>                          
                <ul id="CountryList" style="padding:0;list-style:none;">
                        @foreach ($response as $country) 
                            @if(startsWith($country->name, ucFirst($countrySearch))) 
                          
                            <li style="display:flex;padding:20px 0;justify-content:center;align-items:center;border-bottom:1px solid lightgray;">
                                               
                                <div style="width:33.333%;text-align:center"><img src="{{$country->flag}}" width="200px"/></div>
                                <div class="CountryName" style="width:33.333%;text-align:center">
                                    {{ $country->name}}
                                    
                                </div>
                                <div style="width:33.333%;text-align:center">{{$country->population}}   people</div>
                    </li>
                                 
                            @endif
                        @endforeach
                    </ul>
    </div>
@endsection