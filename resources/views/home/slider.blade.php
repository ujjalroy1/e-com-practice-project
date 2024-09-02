<section class="slider_section">
    <div class="slider_container">
      <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <div class="container-fluid">
              <div class="row">
                <div class="col-md-8">
                  <div class="detail-box"> 
                    <h1>
                      Welcome to Ujjal's Shop </br>
                      
                    </h1>
                    <p>
                      in this shop you will get updated and newest product firstly
                    </p>
                    <a href="{{ url('contack_us') }}">
                      Contact Us
                    </a>
                  </div>
                </div>
                <div class="col-md-12 ">
                  <div class="img-box">
                      @foreach ($product as $pt)

                      <img style="width:400px" src="/products/{{ $pt->image }}" alt="the image not found" />
                        
                      @endforeach
                  </div>
                </div>
              </div>
            </div>
          </div>
          
        </div>
        
      </div>
    </div>
  </section>