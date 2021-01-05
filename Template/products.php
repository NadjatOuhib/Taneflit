
<?php
 $product_shuffle=$product->getData();

    $brand = array_map(function ($pro){ return $pro['item_brand']; }, $product_shuffle);
    $unique = array_unique($brand);
    sort($unique);
    shuffle($product_shuffle);
  
    if($_SERVER['REQUEST_METHOD'] == "POST"){
        if (isset($_POST['top_sale_submit'])){
            
        $Cart->addToCart($_POST['user_id'], $_POST['item_id']);
        }
    }

  $in_cart = $Cart->getCartId($product->getData('cart'));
?>
<?php
    $item_id = $_GET['item_id'] ?? 1;
    foreach ($product->getData() as $item) :
        if ($item['item_id'] == $item_id) :
?>

   <section id="special-price" class="">
    <div class="container">
      

<div class="row grid grid py-4">
        <?php array_map(function ($item) use($in_cart){ ?>
            <div class= "grid-item border <?php echo $item['item_brand'] ?? "Brand" ; ?>">
                <div class="item py-4" style="width: 220px;">
                    <div class="product font-rale">
                        <a href="<?php printf('%s?item_id=%s', 'shop-single.php',  $item['item_id']); ?>"><img  src="<?php echo $item['item_image'] ?? "./assets/products/13.png"; ?>" alt="product1" class="img-fluid"></a>
                        <div class="text-center ">
                            <h6><?php echo $item['item_name'] ?? "Unknown"; ?></h6>
                           
                            <div class="price py-2">
                                <span><?php echo $item['item_price'] ?? 0 ?>DZD</span>
                            </div>
                            <form method="post">
                                <input type="hidden" name="item_id" value="<?php echo $item['item_id'] ?? '1'; ?>">
                                <input type="hidden" name="user_id" value="<?php echo 1; ?>">
                                <?php
                                if (in_array($item['item_id'], $in_cart ?? [])){
                                    echo '<button type="submit" disabled class="btn btn-primary btn-md ">Dans le panier</button>';
                                }else{
                                    echo '<button type="submit" name="top_sale_submit" class="btn btn-primary ">Ajouter au panier</button>';
                                }
                                ?>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <?php }, $product_shuffle) ?>
        </div>
    </div>
</section>
<?php
        endif;
        endforeach;
?>