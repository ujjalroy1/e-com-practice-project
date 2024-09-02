<!DOCTYPE html>
<html>

<head>
   @include('home.css');
   <style type="text/css">
          
            .div_center
            {
                 display: flex;
                 justify-content: center;
                 align-items: center;
                 padding: 10px;
            }
            table
            {
                  border: 2px solid skyblue;
                  width: 800px;
                  text-align: center;
            }
            th
            {
                  border: 2px solid skyblue;
                  background-color: black;
                  color: white;
                  font-size: 20px;
                  font-weight: bold;
                  padding: 5px;
                  text-align: center;
            }
            td
            {
                border: 2px solid skyblue;
                padding: 5px;

                 
            }

    </style>
</head>

<body>
  <div class="hero_area">
    <!-- header section strats -->
      @include('home.header');
      
     <div class="div_center">
          
         <table>
                <tr>
                   <th>Product Name</th>
                   <th>Price</th>
                   <th>Delivary Status</th>
                   <th>Image</th>
                </tr>
           @foreach ($order as $order)
             
           <tr>
            <td>{{ $order->product->title }}</td>
            <td>{{ $order->product->price }}</td>
            <td>{{ $order->status }}</td>
            <td>
                 <img src="products/{{$order->product->image}}" width="100px">


            </td>
           </tr>


               
           @endforeach




         </table>

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