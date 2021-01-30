<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<hr>
<!--Section Banner-->
    <section class="store-carousel d-none d-lg-block">
      <div class="container">
        <div class="row">
          <div class="col-lg-12" data-aos="zoom-in">
            <div id="storeCarousel" class="carousel slide" data-ride="carousel">
              <ol class="carousel-indicators">
                <li data-target="#storeCarousel" data-slide-to="0" class="active"></li>
                <li data-target="#storeCarousel" data-slide-to="1"></li>
                <li data-target="#storeCarousel" data-slide-to="2"></li>
              </ol>
              <div class="carousel-inner">
                <div class="carousel-item active">
                  <img src="<?=base_url()?>banner/banner01.jpg" class="d-block w-100" alt="Carousel Image" />
                </div>
                <div class="carousel-item">
                  <img src="<?=base_url()?>banner/banner02.jpg" class="d-block w-100" alt="Carousel Image" />
                </div>
                <div class="carousel-item">
                  <img src="<?=base_url()?>banner/banner03.jpg" class="d-block w-100" alt="Carousel Image" />
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

<!-- whychoosus -->
<section class="ftco-section" id="products">
  <div class="container">
          <div class="row justify-content-center mb-3 pb-3">
    <div class="col-md-12 heading-section text-center ftco-animate">
        <span class="subheading">Mengapa berbelanja disini?</span><hr>
    </div>
  </div>   		
  </div>
      <div class="container" data-aos="fade-up" data-aos-delay="100">
          <div class="row no-gutters ftco-services" >
                <div class="col-md-3 text-center d-flex align-self-stretch ftco-animate">
                  <div class="media block-6 services mb-md-0 mb-4">
                    <div class="icon bg-color-1 active d-flex justify-content-center align-items-center mb-2">
                          <span class="flaticon-shipped"></span>
                    </div>
                    <div class="media-body">
                      <h3 class="heading">Gratis Ongkir</h3>
                      <span>Belanja minimal Rp <?php echo format_rupiah(get_settings('min_shop_to_free_shipping_cost')); ?></span>
                    </div>
                  </div>      
                </div>
                <div class="col-md-3 text-center d-flex align-self-stretch ftco-animate">
                    <div class="media block-6 services mb-md-0 mb-4">
                      <div class="icon bg-color-2 d-flex justify-content-center align-items-center mb-2">
                            <span class="flaticon-diet"></span>
                      </div>
                      <div class="media-body">
                        <h3 class="heading">Selalu Segar</h3>
                        <span>Dipetik Langsung dari Kebun</span>
                      </div>
                    </div>    
                </div>
                <div class="col-md-3 text-center d-flex align-self-stretch ftco-animate">
                  <div class="media block-6 services mb-md-0 mb-4">
                    <div class="icon bg-color-3 d-flex justify-content-center align-items-center mb-2">
                          <span class="flaticon-award"></span>
                    </div>
                    <div class="media-body">
                      <h3 class="heading">Kualitas Terbaik</h3>
                      <span>Kualitas dari Pertanian Terbaik</span>
                    </div>
                  </div>      
                </div>
                <div class="col-md-3 text-center d-flex align-self-stretch ftco-animate">
                  <div class="media block-6 services mb-md-0 mb-4">
                    <div class="icon bg-color-4 d-flex justify-content-center align-items-center mb-2">
                          <span class="flaticon-customer-service"></span>
                    </div>
                        <div class="media-body">
                          <h3 class="heading">Bantuan</h3>
                          <span>Bantuan 24/7 Selalu Online</span>
                        </div>
                  </div>      
                </div>
           </div>
      </div>
</section>


  
  <div class="container">
          <div class="row justify-content-center mb-3 pb-3">
    <div class="col-md-12 heading-section text-center ftco-animate">
        <span class="subheading">Lihat Produk Terlaris</span><hr>
      <!--
        <h2 class="mb-4"><?php echo get_store_name(); ?></h2>
      <p><?php echo get_settings('store_tagline'); ?></p>
      -->

    </div>
    </div>   		
  </div>
  
  <div class="container">


      <div class="row" data-aos="fade-up" data-aos-delay="100">
          <?php if ( count($products) > 0) : ?>
            <?php foreach ($products as $product) : ?>
          <div class="col-md-6 col-lg-3 ftco-animate">
              <div class="product">
                  <a href="<?php echo site_url('shop/product/'. $product->id .'/'. $product->sku .'/'); ?>" class="img-prod">
                      <img class="img-fluid" src="<?php echo base_url('assets/uploads/products/'. $product->picture_name); ?>" alt="<?php echo $product->name; ?>">
                      <?php if ($product->current_discount > 0) : ?>
                        <span class="status"><?php echo count_percent_discount($product->current_discount, $product->price, 0); ?>%</span>
                      <?php endif; ?>
                      <div class="overlay"></div>
                  </a>
                  <div class="text py-3 pb-4 px-3 text-center">
                      <h3><a href="<?php echo site_url('shop/product/'. $product->id .'/'. $product->sku .'/'); ?>"><?php echo $product->name; ?></a></h3>
                      <div class="d-flex">
                          <div class="pricing">
                              <p class="price">
                                  <?php if ($product->current_discount > 0) : ?>
                                  <span class="mr-2 price-dc">Rp <?php echo format_rupiah($product->price); ?></span><span class="price-sale">Rp <?php echo format_rupiah($product->price - $product->current_discount); ?></span>
                                  <?php else : ?>
                                    <span class="mr-2"><span class="price-sale">Rp <?php echo format_rupiah($product->price - $product->current_discount); ?></span>
                                  <?php endif; ?>
                                </p>
                          </div>
                      </div>
                      <div class="bottom-area d-flex px-3">
                          <div class="m-auto d-flex">
                              <a href="<?php echo site_url('shop/product/'. $product->id .'/'. $product->sku .'/'); ?>" class="buy-now d-flex justify-content-center align-items-center text-center">
                                  <span><i class="ion-ios-menu"></i></span>
                              </a>
                              <a href="#" class="add-to-chart add-cart d-flex justify-content-center align-items-center mx-1" data-sku="<?php echo $product->sku; ?>" data-name="<?php echo $product->name; ?>" data-price="<?php echo ($product->current_discount > 0) ? ($product->price - $product->current_discount) : $product->price; ?>" data-id="<?php echo $product->id; ?>">
                                  <span><i class="ion-ios-cart"></i></span>
                              </a>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
            <?php endforeach; ?>
          <?php else : ?>
          <?php endif; ?>

      </div>
  </div>




          <div class="container">
                  <div class="row justify-content-center mb-3 pb-3">
            <div class="col-md-12 heading-section text-center ftco-animate">
                <span class="subheading">Ini kata mereka</span><hr>
              <!--
                <h2 class="mb-4"><?php echo get_store_name(); ?></h2>
              <p><?php echo get_settings('store_tagline'); ?></p>
              -->

            </div>
          </div>   		

      <div class="row ftco-animate">
        <div class="col-md-12">
          <div class="carousel-testimony owl-carousel">
            <?php if ( count($reviews) > 0) : ?>
            <?php foreach ($reviews as $review) : ?>
            <div class="item">
              <div class="testimony-wrap p-4 pb-5">
                <div class="user-img mb-5" style="background-image: url(<?php echo base_url('assets/uploads/users/'. $review->profile_picture); ?>)">
                  <span class="quote d-flex align-items-center justify-content-center">
                    <i class="icon-quote-left"></i>
                  </span>
                </div><hr>
                <div class="text text-center">
                  <p class="mb-5 pl-4 line"><?php echo $review->review_text; ?></p><hr>
                  <p class="name"><?php echo $review->name; ?></p>
                  <span class="position"><?php echo get_formatted_date($review->review_date); ?></span>
                </div><hr>
              </div>
            </div>
            <?php endforeach; ?>
            <?php else : ?>
            <?php endif; ?>

          </div>
        </div>
      </div>
    </div>
