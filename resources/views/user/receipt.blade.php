<div class="container">
    <div class="row d-flex justify-content-center">
      
      <div class="col-11">
        <h1>Receipt</h1>
            @foreach($order as $orders)
                <p class="h5">Order ID: {{ $orders->id }}</h5>
                <p class="h5">Order Amount: {{ $orders->amount }}</h5>
                <p class="h5">Order Date: {{ $orders->orderDate }}</h5>
                <p class="h5">Address: {{ Auth::user()->address }}</h5>
                <p class="h5">Delivery Date: {{ $orders->deliveryDate }}</h5>
                <p class="h5">Payer: {{ Auth::user()->id }}</h5>
            @endforeach

        <table class="table table-image table table-bordered">

            <thead>
              <tr>
                <th scope="col">Product Name</th>
                <th scope="col">Product Price</th>
                <th scope="col">Quantity</th>
                <th scope="col">Subtotal</th>
              </tr>
            </thead>

            <tbody>

            
            @foreach($cart as $carts)
              <tr>
            {{-- Comlumn--}}
                <td>{{ $carts->product['name'] }}</td>
                <td>RM {{ $carts->product['price'] }}</td>
                <td>{{ $carts->quantity }}</td>  
                <td>RM {{ $carts->product['price'] * $carts->quantity}}</td>
              </tr>
            @endforeach
              
              <tr>
                <td colspan="3">
                  <div class="d-flex align-items-center justify-content-end">
                      Total Amount
                  </div> 
                </td>  
                <td colspan="6">
                  <div class="d-flex align-items-center justify-content-end">
                      RM {{ $carts->order['amount']}}
                  </div> 
                </td>  
              </tr>
            </tbody>
          </table>  
      </div>
  </div>