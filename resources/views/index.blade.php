@extends('layout')


@section('content')
<div class="updatedBox" style="{{$check == 'not updated'? 'background-color:tomato':''}}">
    {{$check}}

</div>
    <table class="table" style="width:80%;margin:0px auto;">
        <thead>
            <th style="width:33.333%;text-align:center;vertical-align:top;">
                         
                                Flag:
                    </th>
            <th style="width:33.333%;text-align:center;">
            <div style="width:100%">
                <div>
                    Name:
                </div>
            <div>         
             <form action="/" method="POST">
                    @csrf
             <select  onChange="this.form.submit()" name="name" >
                        <option  {{$orderByValue == 'asc' && $orderByKey == 'name' ? 'selected':''}} value="asc">asc</option>
                        <option  {{$orderByValue == 'desc' && $orderByKey == 'name' ? 'selected':''}} value="desc">desc</option>
             </select>
                
                </form>
            </div>
        </div>

    
            </th>
            <th style="width:33.333%;text-align:center;vertical-align:top;">
            <div style="width:100%">
                    <div>
                        Population:
                    </div>
                <div>         
                 <form action="/" method="POST">
                        @csrf
                 <select  onChange="this.form.submit()" name="population" >
                            <option  {{$orderByValue == 'asc' && $orderByKey == 'population' ? 'selected':''}} value="asc">asc</option>
                            <option  {{$orderByValue == 'desc' && $orderByKey == 'population' ? 'selected':''}} value="desc">desc</option>
                 </select>
                    
                    </form>
                </div>
            </div>
    
        
                </th>
         
                        </table>                          
                        <ul id="CountryList" style="padding:0;list-style:none;width:80%;margin:0px auto;">
                                @foreach ($countries as $country) 
                                 
                                        <a href="/country/{{$country->id}}">
                                        <li style="display:flex;padding:20px 0;justify-content:center;align-items:center;border-bottom:1px solid lightgray;">
                                               
                                                    <div style="width:33.333%;text-align:center"><img src="{{$country->flag}}" width="200px"/></div>
                                                    <div class="CountryName" style="width:33.333%;text-align:center">
                                                        {{ $country->name}}
                                                        
                                                    </div>
                                                    <div style="width:33.333%;text-align:center">{{$country->population}}   people</div>
                                        </li>
                                    </a>
                                 
                                @endforeach
                            </ul>
            </div>

@endsection