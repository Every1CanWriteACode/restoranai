
 @extends('layouts.app')
 @section('content')
<div class="container">
   <div class="row justify-content-center">
       <div class="col-md-8">
         <h1>Create restaurant</h1>
         <div class="card card-create center">

             <div class="card-body">
                  <form method="POST" action="{{route('restaurant.store')}}">
                    {{-- Title: <input type="text" name="restaurant_title"> --}}
                    <div class="form-group">
                        <label>Title</label>
                        <input type="text" name="restaurant_title" class="form-control" value="{{old('restaurant_title')}}">
                        <small class="form-text text-muted">Pavadinimas.</small>
                      </div>
                    {{-- customers: <input type="text" name="restaurant_customers"> --}}
                    <div class="form-group">
                        <label>Customers</label>
                        <input type="text" name="restaurant_customers" class="form-control" value="{{old('restaurant_customers')}}">
                        <small class="form-text text-muted">Kiek telpa zmoniu.</small>
                      </div>
                    {{-- emploeye: <input type="text" name="restaurant_employe"> --}}
                    <div class="form-group">
                        <label>Emploeye</label>
                        <input type="text" name="restaurant_employe" class="form-control" value="{{old('restaurant_employe')}}">
                        <small class="form-text text-muted">Kiek darbuotoju.</small>
                      </div>
                 
              
                    <select name="menu_id">
                        @foreach ($menus as $menu)
                    <option value="{{$menu->id}}">{{$menu->title}} {{$menu->price}} {{$menu->weight}} {{$menu->meat}} {{$menu->about}}</option>
                   
                      @endforeach
                    </select><br>
                    @csrf
                    <button type="submit" class="btn btn-info">Create restaurant</button>
                  </form>
                </div>
              </div> 
        </div>
    </div>     
</div>

@endsection