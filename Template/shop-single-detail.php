
  

<?php

    if($_SERVER['REQUEST_METHOD'] == "POST"){
        if (isset($_POST['top_sale_submit'])){
            // call method addToCart
            $Cart->addToCart($_POST['user_id'], $_POST['item_id']);
        }
    }
    $item_id = $_GET['item_id'] ?? 1;
    foreach ($product->getData() as $item) :
        if ($item['item_id'] == $item_id) :
?>   
 <div class="bg-light py-3">
      <div class="container">
        <div class="row">
          <div class="col-md-12 mb-0"><a href="index.php">Accueil</a> <span class="mx-2 mb-0">/</span> <a
              href="shop.php">Shop</a> <span class="mx-2 mb-0">/</span> <strong class="text-black"><?php echo $item['item_name'] ?? "Unknown"; ?></strong></div>
        </div>
      </div>
    </div>
    <div class="site-section">
      <div class="container">
        <div class="row">
          <div class="col-md-5 mr-auto">
            <div class="border text-center">
              <img src="<?php echo $item['item_image'] ?? "./assets/products/1.png" ?>" alt="Image" class="img-fluid p-5">
            </div>
          </div>
          <div class="col-md-6">
            <h2 class="text-black"><?php echo $item['item_name'] ?? "Unknown"; ?></h2>
            <p>Marque : <?php echo $item['item_brand'] ?? "Unknown"; ?></p>
            

            <p> <strong class="text-primary h4"><?php echo $item['item_price'] ?? "Unknown"; ?> DZD</strong></p>

            
            
            <div class="mb-5">
            </div>
            <!--p><a href="cart.php" class="buy-now btn btn-sm height-auto px-4 py-3 btn-primary">Ajouter au panier</a-->
             <form method="post">
                                <input type="hidden" name="item_id" value="<?php echo $item['item_id'] ?? '1'; ?>">
                                <input type="hidden" name="user_id" value="<?php echo 1; ?>">
                <?php
                        if (in_array($item['item_id'], $Cart->getCartId($product->getData('cart')) ?? [])){
                            echo '<button type="submit" disabled class="btn btn-primary btn-md form-control">Dans le panier</button>';
                        }else{
                            echo '<button type="submit" name="top_sale_submit" class="btn btn-primary">Ajouter au panier</button>';
                        }
                        ?>
              </form>

            <div class="mt-5">
              <ul class="nav nav-pills mb-3 custom-pill" id="pills-tab" role="tablist">
                <li class="nav-item">
                  <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab"
                    aria-controls="pills-home" aria-selected="true">Informations</a>
            </li>
                <li class="nav-item">
                  <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab"
                    aria-controls="pills-profile" aria-selected="false">Specifications</a>
                </li>
            
              </ul>
              <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                  <table class="table custom-table">
                    <thead>
                      <th>Matériel</th>
                      <th>Description</th>
                     
                    </thead>
                    <tbody>
                      <tr>
                        <th scope="row">text</th>
                        <td>text text text text text text text text text text text text text text text text text text</td>
                       
                      </tr>
                      <tr>
                        <th scope="row">text text</th>
                        <td>text text text text text text text text text text text text text text text text</td>
                        
                      </tr>
                 
                      
                    </tbody>
                  </table>
                </div>
                <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
            
                  <table class="table custom-table">
            
                    <tbody>
                      <tr>
                        <td>text</td>
                        <td class="bg-light">text text</td>
                      </tr>
                      <tr>
                        <td>text text text text text text text text text text</td>
                       
                      </tr>
                      <tr>
                        <td>text</td>
                        <td class="bg-light">text text text text</td>
                      </tr>
                      <tr>
                        <td>text text</td>
                        <td class="bg-light">text text</td>
                      </tr>
                    </tbody>
                  </table>
            
                </div>
            
              </div>
            </div>

    
          </div>
        </div>
      </div>
    </div>

<?php
        endif;
        endforeach;
?>

  
