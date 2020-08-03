
@extends('layouts.app')
@section('content')
<div class="container">
   <div class="row justify-content-center">
       <div class="col-md-8">
          <h1>Menu</h1>
           
                @foreach ($menus as $menu)
                <div class="card index">
                  {{-- <div class="card-header">Menu</div> --}}
   
                <div class="card-body">
                <div class="one-product">
                    <a href="{{route('menu.edit',[$menu])}}">
                      Title: {{$menu->title}}<br>
                    </a>
                    <p>Price: {{$menu->price}}</p>
                    <p>Weight: {{$menu->weight}}</p>
                    <p>About: {!!$menu->about!!}</p>
                    <form method="POST" action="{{route('menu.destroy', [$menu])}}">
                      @csrf
                      <button type="submit" class="btn btn-info">DELETE</button>
                    </form>
                    <br>
                </div>
              </div>
          </div>
              @endforeach
       </div>
   </div>
</div>
@endsection