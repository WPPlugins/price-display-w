<?php
function cart_consumption_tax_display($tax_out = ''){
  global $usces;
    $cart_pdcw_total_price = usces_total_price('return');
      $cart_pdcw_tax_rate = (int)$usces->options['tax_rate'];
        $cart_pdcw_tax_mode = $usces->options['tax_mode'];
          $cart_pdcw_tax_target = $usces->options['tax_target'];
            $cart_pdcw_tax_display = $usces->options['tax_display'];
              $cart_pdcw_tax_method = $usces->options['tax_method'];

                if($cart_pdcw_tax_method == 'cutting'){
                  $cart_pdcw_tax_cart_total = floor($usces->getTax($cart_pdcw_total_price));
                }elseif($cart_pdcw_tax_method == 'bring'){
                  $cart_pdcw_tax_cart_total = ceil($usces->getTax($cart_pdcw_total_price));
                }elseif($cart_pdcw_tax_method == 'rounding'){
                  $cart_pdcw_tax_cart_total = round($usces->getTax($cart_pdcw_total_price));
                }

                  $tax_cart_total_crf_false = usces_crform($cart_pdcw_tax_cart_total, false, true, 'return');

                    if($cart_pdcw_tax_display == 'activate'){
                      if($cart_pdcw_tax_rate > 0){
                        if($cart_pdcw_tax_mode == 'exclude'){
                          $html_tax = '<span class="cart-tax">'.__('Consumption tax','pdcwtx').$tax_cart_total_crf_false.'</span>';
                        }elseif($cart_pdcw_tax_mode == 'include'){
                          $html_tax = '<span class="cart-tax">'.__('Tax included','pdcwtx').$tax_cart_total_crf_false.'</span>';
                        }
                      }

                      if($cart_pdcw_tax_target == 'all'){
                        $html_tax .= '<br /><span class="cart-text">'.__('Need consumption tax besides the commodity price.','pdcwtx').'</span>';
                      }

                      $html_tax = apply_filters('cart_consumption_tax_filter_usces', $html_tax);

                      if($tax_out == 'return'){
                        return $html_tax;
                      }else{
                        echo $html_tax;
                      }
                    }
}
?>