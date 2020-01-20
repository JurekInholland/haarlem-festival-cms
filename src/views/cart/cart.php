<div class="container cart_container">
    <div class="row">
        <div class="col-md-4 order-md-2 mb-4">
            <h4 class="d-flex justify-content-between align-items-center mb-3">
                <span class="text-muted">Your cart</span>
            </h4>
            <ul class="list-group mb-3 sticky-top">
            
                <?php 
                    if (count($itemsData) == 0) { echo "Shopping cart is empty. Please select a ticket / reservation"; }
                    else {
                        $counter = 0;
                        foreach ($itemsData as $item) { ?>
                            <li class="list-group-item d-flex justify-content-between lh-condensed">
                                <div>
                                    <h6 class="my-0"><?= $item->itemName; ?></h6>
                                    <span class="text-muted item_price">€<?= $item->itemPrice; ?></span>
                                </div>
                            <?php
                                if ($item->type != 1) { $counter++; //hide quantity input field  ?> 
                                    <input type="number" min="1" style="width: 70px;" value="1" id="quantity<?=$counter?>" class="item_quantity">
                            <?php } ?>
                            </li>
                <?php   } ?>
                <input type="hidden" id="itemCounter" name="itemCounter" value="<?= $counter ?>">
            <?php   } ?>

                <li class="list-group-item d-flex justify-content-between">
                    <span>Total Price</span>
                    <strong id="total_price">€<?= $total; ?></strong>
                </li>
            </ul>
        </div> <!-- end of cart summary -->

        <div class="col-md-8 order-md-1">
            <h4 class="mb-3">Personal Information</h4>
            <form class="needs-validation" method="post" action="/cart/purchase">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="firstName">First name</label>
                        <input type="text" class="form-control">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="lastName">Last name</label>
                        <input type="text" class="form-control">
                    </div>
                </div>

                <div class="mb-3">
                    <label for="address">Address</label>
                    <input type="text" class="form-control">
                </div>
                
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="firstName">Post Code</label>
                        <input type="text" class="form-control">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="lastName">City</label>
                        <input type="text" class="form-control">
                    </div>
                </div>

                <div class="mb-3">
                    <label for="email">Email <span class="text-muted"></span></label>
                    <input type="email" class="form-control">
                </div>

                <div class="mb-3">
                    <label for="email">Phone Number <span class="text-muted"></span></label>
                    <input type="text" class="form-control">
                </div>

                <hr class="mb-4">
                <h4 class="mb-3">Payment</h4>
                <div class="d-block my-3">
                    <div class="custom-control custom-radio">
                        <input id="debit" name="paymentMethod" type="radio" class="custom-control-input">
                        <label class="custom-control-label" for="debit">Ideal</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input id="credit" name="paymentMethod" type="radio" class="custom-control-input">
                        <label class="custom-control-label" for="credit">Credit card</label>
                    </div>
                </div>
                <input type="hidden" id="itemQuantity" name="itemQuantity" value="">
                <input type="hidden" id="totalPrice" name="totalPrice" value="">
                <button onclick="getQuantity()" class="btn btn-primary btn-lg btn-block" type="submit">Continue to checkout</button>
            </form>
        </div>

    </div>
</div> <!-- end of container -->