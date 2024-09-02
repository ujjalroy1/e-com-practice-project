<!DOCTYPE html>
<html>

<head>
   @include('home.css');
   <style type="text/css"> 
            .div_center
            {
                 display: inline-block;
                 justify-content: center;
                 align-items: center;
                 padding: 10px;
            }
            table
            {
              border: 2px solid skyblue;
            }
            td
            {
                padding-left: 10px;
                padding-top: 2px;
                padding-right: 10px;
                
            }
            th
            {
              padding-left: 10px;
                padding-top: 2px;
                padding-right: 10px;
               
            }

    </style>
</head>

<body>
  <div class="hero_area">
    <!-- header section strats -->
      @include('home.header')
       
      <div class="div_center">

          <table >
            <h3>Conversation</h3>
                 <tr>
                     <th>user</th>
                     <th>admin</th>
                 </tr>
               @foreach ($message as $ms)
                 
               <tr>
                <td style="color: green">{{ $ms->user_chat }}</td>
                <td style="color: rgb(128, 43, 0)">{{ $ms->admin_chat }}</td>
               </tr>
               @endforeach

          </table>
        </br>
          <div>
            <form action="{{ url('upload_chat') }}" method="POST">
              @csrf
              <textarea rows="3" cols="50" name="chat"></textarea><br>
              <input type="submit" value="send" class="btn btn-primary">
            </form>
          </div>
      </div>




  </div>



  <script src="{{ asset('js/jquery-3.4.1.min.js') }}"></script>
  <script src="{{ asset('js/bootstrap.js') }}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js">
  </script>
  <script src="{{ asset('js/custom.js') }}"></script>

</body>

</html>