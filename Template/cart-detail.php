<?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        if (isset($_POST['delete-cart-submit'])){
            $deletedrecord = $Cart->deleteCart($_POST['item_id']);
        }

       
    }
?>

<section id="cart" class="py-3 mb-5">
    <div class="container-fluid w-75">
        <div class="row">
            <div class="col-sm-9">
                <?php
                    foreach ($product->getData('cart') as $item) :
                        $cart = $product->getProduct($item['item_id']);
                        $subTotal[] = array_map(function ($item){
                ?>
                <div class="row border-top py-3 mt-3">
                    <div class="product-thumbnail">
                        <img src="<?php echo $item['item_image'] ?? "./assets/products/1.png" ?>" style="height: 120px;" alt="cart1" class="img-fluid">
                    </div>
                    <div class="col-sm-8">
                        <h5 class="font-baloo font-size-20"><?php echo $item['item_name'] ?? "Unknown"; ?></h5>
                        <div class="qty d-flex pt-2">
                            <div class="d-flex font-rale w-25">
                                <button class="qty-up border bg-light" data-id="<?php echo $item['item_id'] ?? '0'; ?>"> + </button>
                                <input type="text" data-id="<?php echo $item['item_id'] ?? '0'; ?>" class="qty_input border px-2 w-100 bg-light" disabled value="1" placeholder="1" style="text-align: center;">
                                <button data-id="<?php echo $item['item_id'] ?? '0'; ?>" class="qty-down border bg-light"> - </button>
                            </div>
                            &nbsp;&nbsp;
                                  
                            <form method="post">
                                <input type="hidden" value="<?php echo $item['item_id'] ?? 0; ?>" name="item_id" >
                                <button type="submit" name="delete-cart-submit" class="btn font-baloo  px-3 border-right">Supprimer</button>
                            </form>
<div class="col-sm-6 text-right">
                        <div class="font-size-20  font-baloo">
                            <span class="product_price" data-id="<?php echo $item['item_id'] ?? '0'; ?>"><?php echo $item['item_price'] ?? 0; ?> </span><span> DZD</span>
                        </div>
                    </div>


                        </div>

                    </div>

                    
                </div>
                <?php
                            return $item['item_price'];
                        }, $cart); 
                    endforeach;
                ?>
            </div>
            <div class="col-sm-3">
                <div class="sub-total border text-center mt-2">
                    <div class="border-top py-5">
                        <h5 class="font-baloo font-size-20">Total ( <?php echo isset($subTotal) ? count($subTotal) : 0; ?> article):&nbsp; <span ><span  id="deal-price" class="text-danger " ><?php echo isset($subTotal) ? $Cart->getSum($subTotal) : 0; ?></span> DZD </span> </h5>
                        <button class="btn btn-primary ">Valider</button>
                    </div>
                </div>
            </div>
        </div>
      
    </div>
</section>
