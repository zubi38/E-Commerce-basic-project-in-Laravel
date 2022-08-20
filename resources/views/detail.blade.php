@extends('master')
@section('content')
 <div class=" cuntainer">
      <div class="row">
          <div class="col-sm-6">
              <img class="detail-img" src="{{$product['gallery']}}" alt="">
          </div>
          <div class="col-sm-6">
              <a href="/">Go Back</a>
              <h2>Name:{{$product['name']}}</h2>
              <h3>Price:{{$product['price']}}</h3>
              <h4>Categery:{{$product['catagery']}}</h4>
              <h4>Description:{{$product['description']}}</h4>
              <br><br>
              <form action="{{route('add-to-cart')}}" method="post">
              <input type="hidden" name="product_id" value={{$product['id']}}>
              @csrf
              <button class="btn btn-success ">Add to Cart</button>
              </form>
              <br><br>
              <button class="btn btn-primary ">Buy Now</button>
              <br><br>
          </div>
      </div>
 </div>
@endsection