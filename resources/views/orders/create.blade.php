@extends('layouts.app')

@section('content')
<div class="menu-title">
            <div class="container">
                <div class="row">
                    <div class="col-sm-11 col-sm-offset-1">
                        <h1>New Order</h1>
                    </div>   
                </div>
            </div>
        </div><!--menu title-->
<form action="/orders" method="post">
    {{ csrf_field() }}
        <section class="section-dishes">
            <div class="container center-title">
                <div class="row single-product">
                <div class="col-sm-5 col-sm-offset-1 ">
                    <h2>Client Details</h2>

    <div class="row form-group">
        <label class="col-sm-3 control-label" for="name">Name</label>
        <div class="col-sm-7">
        <input class="form-control" type="text" name="name" placeholder="{{ Auth::user()->name }}" value="{{ Auth::user()->name }}" readonly>
        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
        </div>
    </div>
    <div class="row form-group">
        <label class="col-sm-3 control-label" for="phone">Phone</label>
        <div class="col-sm-7">
        <input type="tel" required class="form-control" id="orderPhone" name="phone">
    </div>
        </div>
    <div class="row form-group">
        <label class="col-sm-3 control-label" for="description">Order Description</label>
        <div class="col-sm-7">
        <textarea class="form-control" rows="5" id="orderDescription" name="description"></textarea>
    </div>
        </div>
                        </div>
                    <div class="col-sm-6 ">
                    <h2>Details</h2>
    <div id="details">

    
    </div>
    <div class="row">
    <div class="col-sm-6">
    <button type="button" onclick="addMeal()" class="btn btn-circle btn-primary btn-icon"><i class="fa fa-plus"></i></button>Add Meal
    </div>
    <div class="col-sm-6">
    <button type="submit" class="btn btn-primary">Order Up!</button>
    </div>
    
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
    

                    </div> 
                    
                    </div>
                </div>
            </div>
        </section><!--section dishes-->
        </form>
@section('scripts')
<script>
function getPrice(value, id){
            let url = "/meal/price";
            $.ajax({
       type: "GET",
       url: url,
       data: "meal="+value, // serializes the form's elements.
       success: function(data)
       {
           console.log(""+data); // show response from the php script.
           $('#'+id+"price").text(""+data);
           getSubtotal($("#"+id+"orderRoom").val(), id);
       }
     });

     
            }
function addMeal(){
    if(typeof addMeal.counter == 'undefined')
    {
        addMeal.counter=0;
    }else{
        addMeal.counter++;
    }

    $('#details').append('<div class="row form-group"><div class="col-sm-6"><label class="control-label">Meal:</label><select name="orderMeal[]" onchange="getPrice(this.value,'+addMeal.counter+')"><option disabled  selected style="display:none">Pick a meal</option>@foreach($meals as $meal)<option value="{{ $meal->id }}">{{ $meal->name }}</option>@endforeach</select><label>Price: $</label><span id="'+addMeal.counter+'price"></span></div><div class="col-sm-6"><label class="control-label">Quantity</label><input type="number" id="'+addMeal.counter+'orderRoom" onchange="getSubtotal(this.value,'+addMeal.counter+')"name="orderMealQuantity[]" min="0" step="1"><label>subTotal: $</label><span id="'+addMeal.counter+'subtotal"></div></div>');

}
function getSubtotal(value, id){
    let precio = parseFloat(document.getElementById(""+id+"price").innerHTML);
    console.log(precio);
    let subtotal = precio*value;
    $('#'+id+"subtotal").text(""+subtotal);
}
</script>
@endsection
@endsection