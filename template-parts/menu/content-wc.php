<?php

if (function_exists('is_woocommerce')) {

?>

  <div class="site-header-wc">

    <?php
    echo roach_wc_account_link();
    echo roach_wc_cart_link();
    ?>

  </div>

<?php }  ?>
