@extends('layouts.app')

@section('content')
<div class="menu-title">
            <div class="container">
                <div class="row">
                    <div class="col-sm-11 col-sm-offset-1">
                        <h1>New Meal</h1>
                    </div>   
                </div>
            </div>
        </div><!--menu title-->
        <section class="section-dishes">
            <div class="container">
                <div class="row single-product">
    <form action="/meals" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
                    <div class="col-sm-5 col-sm-offset-1">
                            <h3> Add images </h3>
                            <div id="imageInputs">
                            <div class="form-group" >
                            <input type="file" name="image[]">
                            </div>
                            </div>
                            <button type="button" onclick="addImg()" class="btn btn-circle btn-primary btn-icon"><i class="fa fa-plus"></i></button>Add Image

                        </div>
                    <div class="col-sm-6 ">
                        
                    <div class="form-group">
        <label for="name">Meal Name</label>
        <input type="text" class="form-control" id="mealName" name="name">
    </div>
    <div class="form-group">
        <label for="description">Meal Description</label>
        <input type="text" class="form-control" id="mealDescription" name="description">
    </div>
    <div class="form-group">
        <label for="description">Meal Price</label>
        <input type="number" class="form-control" id="mealPrice" name="price" placeholder="$" step="any">
    </div>
    <div class="form-group">
        <label for="price">Meal Category</label>
        <select name ="category" required>
        <option value="Food">Food</option>
        <option value="Drink">Drink</option>
        <option value="Dessert">Dessert</option>
        </select>
    </div>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <button type="submit" class="btn btn-primary">Add to Menu!</button>

                    </div>
                    </form>  
                    </div> 
                    
                    </div>
                </div>
            </div>
        </section><!--section dishes-->
@section('scripts')
<script>
function addImg(){
    $("#imageInputs").append('<div class="form-group" ><input type="file" name="image[]"></div>');
}
</script>
@endsection
@endsection