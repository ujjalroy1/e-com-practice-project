<!DOCTYPE html>
<html>

<head>
   @include('home.css');
   <style type="text/css">
        
           .div_deg
           {
                display: flex;
                justify-content: center;
                align-items: center;
                margin: 20px
           }
           .div_deg1
           {
                display: flex;
                justify-content: center;
                align-items: center;
                margin: 20px
           }
           table
           {
              border: 2px solid skyblue;
              text-align: center;
              width:90%
           }
           th{
            border: 2px solid skyblue;
            text-align: center;
            color: white;
            font: 20px;
            font-weight: bold;
            background-color: black;
           }
           td{
              border: 2px solid skyblue;
           }
           .order_deg
           {
                 padding: 5px;
           }
           label
           {
                 display: inline-block;
                 width: 150px;
           }
           .div_gap
           {
                padding: 10px;
           }
    </style>

</head>

<body>
  <div class="hero_area">
    <!-- header section strats -->
      @include('home.header');
      
    <!-- end header section -->
  
  </div>
  <!-- end hero area -->

  <div class="div_deg">
     <div  class="order_deg">
             <form action="{{ url('confirm_order') }}" method="POST">
                 @csrf
                   <div class="div_gap">
                       <label>Rceiver Name</label>
                       <input type="text" name="name" value="{{ Auth::user()->name }}">
                   </div>
                   <div class="div_gap">
                    <label>Rceiver Address</label>
                    <textarea name="address">{{ Auth::user()->address }}</textarea>
                </div>
                <div class="div_gap">
                    <label>Rceiver Phone</label>
                    <input type="text" name="phone" value="{{ Auth::user()->phone }}">
                </div>
                <div class="div_gap">
                    
                    <input type="submit" value="cash on delivary" name="cash on delivary" class="btn btn-primary" style="padding: 5px">
                    <input type="submit" value="pay using card" name="pay using card" class="btn btn-secondary" style="padding: 5px">
                </div>
             </form>
     </div>
       <table>
             <tr>
                 <th>Title</th>
                 <th>Price</th>
                 <th>Image</th>
                 <th>Remove</th>
             </tr>
             <?php
                  $value=0;
             
             ?>
             @foreach ($cart as $cart )
                 
            
             <tr>
                 <td>{{ $cart->product->title }}</td>
                 <td>{{ $cart->product->price }}</td>
                 <td>
                      <img src="/products/{{  $cart->product->image  }}" width="100px">
                 </td>
                 <td>
                      <a class="btn btn-danger" href="{{ url('delete_cart',$cart->id) }}">Remove</a>
                 </td>
             </tr>
             <?php
             $value=$value+$cart->product->price ;
        
             ?>
             @endforeach
       </table>

  </div>
  <div class="div_deg1">
    <h6> total price : {{ $value }}</h6>
</div>






 

   

  <!-- info section -->

 @include('home.footer');

  <!-- end info section -->


  <script src="{{ asset('js/jquery-3.4.1.min.js') }}"></script>
  <script src="{{ asset('js/bootstrap.js') }}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js">
  </script>
  <script src="{{ asset('js/custom.js') }}"></script>

</body>

</html>