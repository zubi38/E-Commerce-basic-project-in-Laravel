@extends('master')
@section('content')
 <div class=" custom-product">
    <div class="col-sm-10">
    <div class="trending-wrapper">
       <h2>Cart List:</h2>
       <a href="/ordernow" class="btn btn-success" >Order Now</a><br><br>
       <div class="">
          @foreach ($products as $item)
            <div class="row searched-item cart-list-divider">
               <div class="col-sm-3">
               <!-- due to join we don't get the values of id,name or description by using previous style -->
               <a href="detail/{{$item->id}}">
               <img class="trending-img" src="{{$item->gallery}}">
               </a>
               </div>
                <div class="col-sm-3">
               <div class="">
                  <h2>{{$item->name}}</h2>
                  <h5>{{$item->description}}</h5>
               </div>
               </div>
                <div class="col-sm-3">
               <div class="">
                  <a href="/removecart/{{$item->cart_id}}" class="btn btn-warning">Remove From Cart</a>
               </div>
               </div>
            </div>
          @endforeach
          <a href="/ordernow" class="btn btn-success" >Order Now</a><br><br>
        </div>
    </div>
 </div>
@endsection