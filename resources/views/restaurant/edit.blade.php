@extends('layouts.app')
@section('content')
<div class="container">
   <div class="row justify-content-center">
       <div class="col-md-8">
           <h1>Edit restaurant</h1>
           <div class="card card-edit">

               <div class="card-body">
                <form method="POST" action="{{route('restaurant.update',[$restaurant])}}">
                    {{-- Title: <input type="text" name="restaurant_title" value="{{$restaurant->title}}"> --}}
                    <div class="form-group">
                        <label>Title</label>
                        <input type="text" name="restaurant_title" class="form-control" value="{{$restaurant->title}}">
                        <small class="form-text text-muted">Restorano pavadinimas.</small>
                      </div>
                    {{-- customers: <input type="text" name="restaurant_customers" value="{{$restaurant->customers}}"> --}}
                    <div class="form-group">
                        <label>Customers</label>
                        <input type="text" name="restaurant_customers" class="form-control" value="{{$restaurant->customers}}">
                        <small class="form-text text-muted">Kiek lankytoju talpina.</small>
                      </div>
                    {{-- emploeye: <input type="text" name="restaurant_employe" value="{{$restaurant->employe}}"> --}}
                    <div class="form-group">
                        <label>Emploeye</label>
                        <input type="text" name="restaurant_employe" class="form-control" value="{{$restaurant->employe}}">
                        <small class="form-text text-muted">Kiek darbuotoju dirba.</small>
                      </div>
                    <select name="author_id">
                        @foreach ($menus as $menu)
                            <option value="{{$menu->id}}" @if($menu->id == $restaurant->menu_id) selected @endif>
                                {{$menu->title}} {{$menu->price}}
                            </option>
                            
                            @endforeach
                </select>
                    @csrf
                    <button type="submit" class="btn btn-info button-margin">EDIT</button>
                </form>
               </div>
           </div>
       </div>
   </div>
</div>

@endsection