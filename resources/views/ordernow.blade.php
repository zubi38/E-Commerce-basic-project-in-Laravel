@extends('master')
@section('content')
 <div class=" custom-product">
    <div class="col-sm-6">
   <table class="table table-striped">
    <tbody>
      <tr>
        <td>Price</td>
        <td>Rs.{{$total}}/-</td>
      </tr>
      <tr>
        <td>Tax</td>
        <td>Rs.0/-</td>
      </tr>
      <tr>
        <td>Delivery Charges</td>
        <td>Rs.100/-</td>
      </tr>
      <tr>
        <td>Total Amount</td>
        <td>Rs.{{$total+100}}/-</td>
      </tr>
    </tbody>
  </table>
       <form action="orderplace" method="post">
       @csrf
       <div class="form-group">
          <textarea class="form-control" name="address" placeholder="Your Address" required></textarea>
       </div>
       <div class="form-group">
         <label for="">Payment Method</label>
          <p><input type="radio" value="cash on delivery" name="payment"><span>Online Payment</span></p>
          <p><input type="radio" value="cash on delivery" name="payment"><span>Cash On Delivery</span></p>
       </div>
         <button type="submit" class="btn btn-default">Order Now</button>
       </form>
    </div>
 </div>
@endsection