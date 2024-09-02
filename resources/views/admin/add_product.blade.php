<!DOCTYPE html>
<html>
  <head> 
    @include('admin.css')
   <style type="text/css">
    
    .div_deg
     {
        display: flex;
        justify-content: center;
        align-items: center;
        margin-top: 60px;
        
     }
     label
     {
          display: inline-block;
          width: 200px;
          font-size: 20px!important;
          color: white!important;


     }
     input[type="text"]
     {
        width: 300px;
        height: 20px;
     }
     textarea
     {
        width: 300px;
        height: 100px;
          
     }
     .input_deg
     {
         padding: 20px;
     }

    </style>
  </head>
  <body>
    @include('admin.header')
    @include('admin.sidebar')
    
      <!-- Sidebar Navigation end-->
      <div class="page-content">
        <div class="page-header">
          <div class="container-fluid">
             <h1 style="color: white">Add product</h1>
            <div class="div_deg">
                   <form action="{{ url('upload_product') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="input_deg">
                        <label>product title</label>
                        <input type="text" name="title" required>
                      </div>
                      <div class="input_deg">
                        <label>Description</label>
                        <textarea name="description" required>vvv</textarea>
                      </div>
                      <div class="input_deg">
                        <label>Quantity</label>
                        <input type="text" name="qty" required>
                      </div>
                      <div class="input_deg">
                        <label>Price</label>
                        <input type="text" name="price" required>
                      </div>
                      <div class="input_deg">
                        <label>product category</label>
                       <select name="category">
                             <option>select a option</option>
                             @foreach ($category as $ct )
                             <option value="{{ $ct->category_name }}">{{ $ct->category_name }}</option>
                                 
                             @endforeach
                             
                       </select>
                      </div>
                      <div class="input_deg">
                        <label>product image</label>
                        <input type="file" name="image">
                      </div>

                      <div class="input_deg">
                       
                        <input class="btn btn-success" type="submit" value="add product">
                      </div>
                      
                   </form>
            </div>




          </div>
      </div>
    </div>
    <!-- JavaScript files-->
    <script src="{{ asset('admincss/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('admincss/vendor/popper.js/umd/popper.min.js') }}"> </script>
    <script src="{{ asset('admincss/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('admincss/vendor/jquery.cookie/jquery.cookie.js') }}"> </script>
    <script src="{{ asset('admincss/vendor/chart.js/Chart.min.js') }}"></script>
    <script src="{{ asset('admincss/vendor/jquery-validation/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('admincss/js/charts-home.js') }}"></script>
    <script src="{{ asset('admincss/js/front.js') }}"></script>
  </body>
</html>