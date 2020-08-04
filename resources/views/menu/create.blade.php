@extends('layouts.app')
 @section('content')
<div class="container">
   <div class="row justify-content-center">
       <div class="col-md-8">
         <h1>Create menu</h1>
           <div class="card card-create">

               <div class="card-body">
                <form method="POST" action="{{route('menu.store')}}">
                    {{-- Title: <input type="text" name="menu_title"> --}}
                    <div class="form-group">
                        <label >Title</label>
                        <input type="text" name="menu_title" class="form-control" value="{{old('menu_title')}}">
                        <small class="form-text text-muted">Pavadinimas.</small>
                      </div>
                    {{-- price: <input type="text" name="menu_price"> --}}
                    <div class="form-group">
                        <label >Price</label>
                        <input type="text" name="menu_price" class="form-control" value="{{old('menu_price')}}">
                        <small class="form-text text-muted">kaina eurais.</small>
                      </div>
                    {{-- weight: <input type="text" name="menu_weight"> --}}
                    <div class="form-group">
                        <label>Weight</label>
                        <input type="text" name="menu_weight" class="form-control" value="{{old('menu_weight')}}">
                        <small class="form-text text-muted">Patiekalo svoris gramais.</small>
                      </div>
                    {{-- meat: <input type="text" name="menu_meat"> --}}
                    <div class="form-group">
                        <label>Meat</label>
                        <input type="text" name="menu_meat" class="form-control" value="{{old('menu_meat')}}">
                        <small class="form-text text-muted">Kiek gramu mesos.</small>
                      </div>
                    <label> About: <label> <textarea name="menu_about" id="summernote"></textarea>
                    @csrf
                    <button type="submit" class="btn btn-info">Create</button>
                 </form>
               </div>
           </div>
       </div>
   </div>
</div>
<script>
  $(document).ready(function() {
     $('#summernote').summernote();
   });
  </script>
@endsection