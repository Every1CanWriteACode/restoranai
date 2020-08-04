@extends('layouts.app')
@section('content')
<div class="container">
   <div class="row justify-content-center">
       <div class="col-md-8">
           <h1>Restaurant</h1>
           <div class="card restaurant-index">
            <form action="{{route('restaurant.index')}}" method="get">
                <select name="menu_id">
                    <option value="0">Show All</option>
                    @foreach ($menus as $menu)
                        <option value="{{$menu->id}}" @if($selectId == $menu->id) selected @endif>Patiekalas: {{$menu->title}} Kaina: {{$menu->price}}</option>
                    @endforeach
                </select><br><br>
                    Sort By: <br>
                        title: <input type="radio" name="sort" value="title" @if('title' == $sort) checked @endif><br>
                        {{-- price: <input type="radio" name="sort" value="price" @if('price' == $sort) checked @endif><br> --}}
                    <button type="submit"  class="btn btn-info">FILTER</button>
                </form>
            </div>
           @foreach ($restaurants as $restaurant)
        <div class="card card-index-center">
    
                   <div class="card-body">
                <a href="{{route('restaurant.edit',[$restaurant])}}">{{$restaurant->title}} {{$restaurant->restaurantMenu->title}}</a>
                <form method="POST" action="{{route('restaurant.destroy', [$restaurant])}}">
                 @csrf
                 <button type="submit" class="btn btn-info">DELETE</button>
                </form>
                <br>
                
            </div>
        </div>
              @endforeach
            
               
       </div>
   </div>
</div>
@endsection