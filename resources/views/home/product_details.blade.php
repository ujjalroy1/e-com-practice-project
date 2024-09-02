
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
     padding: 30px;

    }



   </style>
</head>

<body>
  <div class="hero_area">
    <!-- header section strats -->
      @include('home.header');
    <!-- end header section -->
    <!-- slider section -->

    

    <!-- end slider section -->
  </div>
  <!-- end hero area -->

  <!-- shop section -->



  <section class="shop_section layout_padding">
    <div class="container">
      <div class="heading_container heading_center">
        <h2>
          Latest Products
        </h2>
      </div>
     
        
      
      <div class="row" class="div_deg">
        
        <div class="col-md-12">
          <div class="box">
           
              <div class="img-box" >
                <img src="/products/{{ $pt->image }}" alt="" width="400px" height="400px">
              </div>
              <div class="detail-box">
                <h6>
                  {{ $pt->title }}
                </h6>
                <h6>
                  Price
                  <span>
                    {{ $pt->price }}
                  </span>
                </h6>
              </div>

              <div class="detail-box">
                <h6>
                  Category: {{ $pt->category }}
                </h6>
                <h6>
                    available quantity: 
                  <span>
                    {{ $pt->quantity }}
                  </span>
                </h6>
              </div>

               <div class="detail-box">
                
                <p>
                Details:
                  <span>
                    {{ $pt->description}}
                  </span>
                </p>
              </div>


              <div class="detail-box">
                
                <a class="btn btn-primary" href="{{ url('add_cart',$pt->id) }}">Add to Cart</a>
              </div>
              


          </div>
        </div>
    </div>
</div>
</section>






   

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




