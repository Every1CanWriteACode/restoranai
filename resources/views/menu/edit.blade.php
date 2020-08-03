@extends('layouts.app')
 @section('content')
<div class="container">
   <div class="row justify-content-center">
       <div class="col-md-8">
         <h1>Edit menu</h1>
           <div class="card card-edit">

               <div class="card-body">
                <form method="POST" action="{{route('menu.update',[$menu->id])}}">
                    {{-- Title: <input type="text" name="menu_title" value="{{$menu->title}}"> --}}
                    <div class="form-group">
                        <label>Title</label>
                        <input type="text" name="menu_title" class="form-control" value="{{old('menu_title',$menu->title)}}">
                        <small class="form-text text-muted">Pavadinimas.</small>
                      </div>
                    {{-- price: <input type="text" name="menu_price" value="{{$menu->price}}"> --}}
                    <div class="form-group">
                        <label>Price</label>
                        <input type="text" name="menu_price" class="form-control" value="{{old('menu_price',$menu->price)}}">
                        <small class="form-text text-muted">kaina.</small>
                      </div>
                    {{-- weight: <input type="text" name="menu_weight" value="{{$menu->weight}}"> --}}
                    <div class="form-group">
                        <label>Weight</label>
                        <input type="text" name="menu_weight" class="form-control" value="{{old('menu_weight',$menu->weight)}}">
                        <small class="form-text text-muted">Patiekalo svoris.</small>
                      </div>
                    {{-- meat: <input type="text" name="menu_meat" value="{{$menu->meat}}"> --}}
                    <div class="form-group">
                        <label>Meat</label>
                        <input type="text" name="menu_meat" class="form-control" value="{{old('menu_meat',$menu->meat)}}">
                        <small class="form-text text-muted">kiek g mesos.</small>
                      </div>
                    <label>About:</label> <textarea name="menu_about" value="{{$menu->about}}" id="summernote"></textarea>
                    @csrf
                    <button type="submit" class="btn btn-info">EDIT</button>
                 </form>
               </div>
           </div>
       </div>
   </div>
</div>
<script>
  $(document).ready(function() {
     $('#summernote').summernote();
    //  {!!$menu->about !!}
  });

  </script>
@endsection