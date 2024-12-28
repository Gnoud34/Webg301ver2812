<!DOCTYPE html>
<html>

<head>

  @include('home.css')
      
</head>

<body>
  <div class="hero_area">
    <!-- header section strats -->
    @include('home.header') 
    <!-- end header section -->
 


<!-- client section -->
  <section class="client_section layout_padding">
    <div class="container">
      <div class="heading_container heading_center">
        <h2>
          Testimonial
        </h2>
      </div>
    </div>
    <div class="container px-0">
      <div id="customCarousel2" class="carousel  carousel-fade" data-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <div class="box">
              <div class="client_info">
                <div class="client_name">
                  <h5>
                    Anna M.
                  </h5>
                  <h6>
                    Happy Customer
                  </h6>
                </div>
                <i class="fa fa-quote-left" aria-hidden="true"></i>
              </div>
              <p>
                I absolutely love this shopping cart! It makes online shopping so easy and stress-free. The interface is user-friendly, and I can quickly add, remove, or save items for later. I also appreciate how it automatically calculates discounts and shows estimated shipping. It’s like having a personal shopping assistant at my fingertips. Highly recommend this site to anyone who values convenience and a seamless shopping experience!              </p>
            </div>
          </div>
          <div class="carousel-item">
            <div class="box">
              <div class="client_info">
                <div class="client_name">
                  <h5>
                    Sarah T.
                  </h5>
                  <h6>
                    Frequent Buyer
                  </h6>
                </div>
                <i class="fa fa-quote-left" aria-hidden="true"></i>
              </div>
              <p>
                This website’s shopping cart is a game-changer! I can easily compare items, save my favorites, and apply coupon codes effortlessly. The responsive design works perfectly on my phone too, so I can shop anytime, anywhere. It’s clear they’ve put a lot of thought into the user experience. I’m hooked!              </p>
            </div>
          </div>
          <div class="carousel-item">
            <div class="box">
              <div class="client_info">
                <div class="client_name">
                  <h5>
                    James L.                  
                  </h5>
                  <h6>
                    Happy Customer
                  </h6>
                </div>
                <i class="fa fa-quote-left" aria-hidden="true"></i>
              </div>
              <p>
                I’ve tried many online stores, but this shopping cart stands out! It’s fast, reliable, and incredibly intuitive. I love how I can see all my selected items at a glance, along with real-time price updates. The secure checkout process gives me peace of mind, and I’ve never had any technical issues. Shopping online has never been this enjoyable!              </p>
            </div>
          </div>
        </div>
        <div class="carousel_btn-box">
          <a class="carousel-control-prev" href="#customCarousel2" role="button" data-slide="prev">
            <i class="fa fa-angle-left" aria-hidden="true"></i>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#customCarousel2" role="button" data-slide="next">
            <i class="fa fa-angle-right" aria-hidden="true"></i>
            <span class="sr-only">Next</span>
          </a>
        </div>
      </div>
    </div>
  </section>
  <!-- end client section -->


 

   

  <!-- info section -->
@include('home.footer')

</body>

</html>