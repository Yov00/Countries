<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
      <link rel="stylesheet" href="{{asset('/css/main.css')}}">
   <link rel="shortcut icon" href="{{asset('/pirate.png')}}" type="image/png" />

    <title>{{$title}}</title>
 
</head>
<body>
        <nav class="navbar navbar-expand-lg  navbar-light sticky"  style="background-color: #E01E5A;">
            
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarText">
                  <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                      <a class="nav-link" href="/" style="color:white;font-weigth:bold;">Home <span class="sr-only">(current)</span></a>
                    </li>

                    <li class="nav-item" >
                     <a class="nav-link" href="#" style="font-weigth:bold;color:#333">         {{config('app.name')}}</a>
                    </li>
                  </ul>
               
                  <div  style="padding:0 60px;width:100%;display:flex;justify-content:center;">   
                    <form action="/search" method="POST" style="width:100%;" >
                    @csrf
                    <div class="container" style="padding:0;">
                        <div class="row">
                               
                            <div  class="searchBar" >
                               <input id="searchInput" onkeyup="searchFunction()" type="text" name="countrySearch" class="form-control" placeholder="Search for country..."/>
                               <button class="btn btn-dark"  style="margin-left:5px;" type="submit">Search</button>
                             </div>
                         

                
                      </div>
                    </div>
                </form>
            </div>
               
              </nav>
             
          
              <div class="container" style="padding:20px 0;text-align:center;">
              <h4>{{$title}}</h4>
            </div>
    <div class="container">
        @yield('content')
    </div>
    
    <script src="{{asset('/js/main.js')}}"></script>
</body>
</html>