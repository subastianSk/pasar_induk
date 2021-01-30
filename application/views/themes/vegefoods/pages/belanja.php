<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!--Section Page Content belanja-->
    <section class="store-trend-categories">
            <div class="container">
                <div class="row justify-content-center mb-3 pb-3">
          <div class="col-md-12 heading-section text-center ftco-animate">
              <span class="subheading"></span><hr>
          </div>
        </div>   		
        </div>

            <div class="container">
              
              <div class="row" data-aos="fade-up" data-aos-delay="100">
                <div class="col-6 col-md-3 col-lg-2">
                  <a class="component-categories d-block" href="<?php echo site_url('pages/belanja'); ?>">
                    <div class="categories-image justify-content-center">
                      <img src="<?=base_url()?>kategory/sayur.png" alt="Kategori Sayur" class="w-100" />
                    </div>
                  
                  </a>
                </div>
                <div class="col-6 col-md-3 col-lg-2">
                  <a class="component-categories d-block" href="<?php echo site_url('pages/belanja'); ?>">
                    <div class="categories-image">
                      <img src="<?=base_url()?>kategory/buah.png" alt="Kategori Buah" class="w-100" />
                    </div>
                    
                  </a>
                </div>
                <div class="col-6 col-md-3 col-lg-2">
                  <a class="component-categories d-block" href="<?php echo site_url('pages/belanja'); ?>">
                    <div class="categories-image">
                      <img src="<?=base_url()?>kategory/bumbu.png" alt="Kategori Bumbu" class="w-100" />
                    </div>
                    
                  </a>
                </div>
                <div class="col-6 col-md-3 col-lg-2">
                  <a class="component-categories d-block" href="<?php echo site_url('pages/belanja'); ?>">
                    <div class="categories-image">
                      <img src="<?=base_url()?>kategory/daging.png" alt="Kategori Daging" class="w-100" />
                    </div>
                    
                  </a>
                </div>

                <div class="col-6 col-md-3 col-lg-2">
                  <a class="component-categories d-block" href="<?php echo site_url('pages/belanja'); ?>">
                    <div class="categories-image">
                      <img src="<?=base_url()?>kategory/ikan.png" alt="Kategori Ikan" class="w-100" />
                    </div>
                    
                  </a>
                </div>

                <div class="col-6 col-md-3 col-lg-2">
                  <a class="component-categories d-block" href="<?php echo site_url('pages/belanja'); ?>">
                    <div class="categories-image">
                      <img src="<?=base_url()?>kategory/frozen.png" alt="Kategori Frozen" class="w-100" />
                    </div>
                    
                  </a>
                </div>
                
              </div>
            </div>
    </section>
  <br>

  
  <div class="container">
          <div class="row justify-content-center mb-3 pb-3">
    <div class="col-md-12 heading-section text-center ftco-animate">
        <span class="subheading"></span><hr>
      <!--
        <h2 class="mb-4"><?php echo get_store_name(); ?></h2>
      <p><?php echo get_settings('store_tagline'); ?></p>
      -->

    </div>
    </div>   		
  </div>
  
  <div class="container">
    <!-- Search form -->

    <!--
           <form class="navbar-search navbar-search-light form-inline mr-sm-3" id="navbar-search-main" action="<?php echo site_url('admin/products/search'); ?>" required>
             <div class="form-group mb-0">
               <div class="input-group input-group-alternative input-group-merge">
                 <div class="input-group-prepend">
                   <span class="input-group-text"><i class="fas fa-search"></i></span>
                 </div>
                 <input class="form-control" value="<?php echo (isset($query) ? $query : ''); ?>" name="search_query" placeholder="Cari kebutuhan anda" type="text" required>
               </div>
             </div>
             <button type="button" class="close" data-action="search-close" data-target="#navbar-search-main" aria-label="Close">
               
             </button>
           </form><br> -->


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
  
