<?php
/***************************************************************************
商品一覧(販売価格)
Selling price
***************************************************************************/
function firstprice_view_change_usces($firstprice_out = ''){
  global $usces;
    $fpdcw_default_firstprice = usces_the_firstPrice('return');
      $fpdcw_crform_opt = get_option('pdcwtx_crform_option');
        $fpdcw_tax_rate = (int)$usces->options['tax_rate'];
          $fpdcw_tax_mode = $usces->options['tax_mode'];
            $fpdcw_tax_display = $usces->options['tax_display'];
              $fpdcw_tax_method = $usces->options['tax_method'];

                if($fpdcw_tax_method == 'cutting'){
                  $total_firstprice_included_tax = floor($fpdcw_default_firstprice - ($fpdcw_default_firstprice / (100 + $fpdcw_tax_rate) * 100));
                  $fpdcw_tax_firstprice = floor($usces->getTax($fpdcw_default_firstprice));
                }elseif($fpdcw_tax_method == 'bring'){
                  $total_firstprice_included_tax = ceil($fpdcw_default_firstprice - ($fpdcw_default_firstprice / (100 + $fpdcw_tax_rate) * 100));
                  $fpdcw_tax_firstprice = ceil($usces->getTax($fpdcw_default_firstprice));
                }elseif($fpdcw_tax_method == 'rounding'){
                  $total_firstprice_included_tax = round($fpdcw_default_firstprice - ($fpdcw_default_firstprice / (100 + $fpdcw_tax_rate) * 100));
                  $fpdcw_tax_firstprice = round($usces->getTax($fpdcw_default_firstprice));
                }

                  $fpdcw_total_firstprice = $fpdcw_default_firstprice + $fpdcw_tax_firstprice;
                    $fpdcw_crf_true = usces_crform($fpdcw_default_firstprice, true, false, 'return');
                      $fpdcw_crf_false = usces_crform($fpdcw_default_firstprice, false, true, 'return');
                        $total_firstprice_crf_true = usces_crform($fpdcw_total_firstprice, true, false, 'return');
                          $total_firstprice_crf_false = usces_crform($fpdcw_total_firstprice, false, true, 'return');
                            $tax_firstprice_crf_true = usces_crform($fpdcw_tax_firstprice, true, false, 'return');
                              $tax_firstprice_crf_false = usces_crform($fpdcw_tax_firstprice, false, true, 'return');
                                $total_firstprice_included_true = usces_crform($total_firstprice_included_tax, true, false, 'return');
                                  $total_firstprice_included_false = usces_crform($total_firstprice_included_tax, false, true, 'return');

                                     if($fpdcw_tax_rate > 0){
                                       if($fpdcw_tax_mode == 'exclude'){
                                         if($fpdcw_crform_opt == 'symbol'){
                                           if($fpdcw_tax_display == 'activate'){
                                             $html_firstprice = '<p>'.$total_firstprice_crf_true.'<span>('.__('Tax included','pdcwtx').$tax_firstprice_crf_true.')</span></p>';
                                           }else{
                                             $html_firstprice = '<p>'.$fpdcw_crf_true.'</p>';
                                           }
                                         }elseif($fpdcw_crform_opt == 'text'){
                                           if($fpdcw_tax_display == 'activate'){
                                             $html_firstprice = '<p>'.$total_firstprice_crf_false.'<span>('.__('Tax included','pdcwtx').$tax_firstprice_crf_false.')</span></p>';
                                           }else{
                                             $html_firstprice = '<p>'.$fpdcw_crf_false.'</p>';
                                           }
                                         }
                                       }elseif($fpdcw_tax_mode == 'include'){
                                         if($fpdcw_crform_opt == 'symbol'){
                                           if($fpdcw_tax_display == 'activate'){
                                             $html_firstprice = '<p>'.$fpdcw_crf_true.'<span>('.__('Tax included','pdcwtx').$total_firstprice_included_true.')</span></p>';
                                           }else{
                                             $html_firstprice = '<p>'.$fpdcw_crf_true.'</p>';
                                           }
                                         }elseif($fpdcw_crform_opt == 'text'){
                                           if($fpdcw_tax_display == 'activate'){
                                             $html_firstprice = '<p>'.$fpdcw_crf_true.'<span>('.__('Tax included','pdcwtx').$total_firstprice_included_false.')</span></p>';
                                           }else{
                                             $html_firstprice = '<p>'.$fpdcw_crf_false.'</p>';
                                           }
                                         }
                                       }

                                       $html_firstprice = apply_filters('firstprice_view_change_filter_usces', $html_firstprice);

                                       if($firstprice_out == 'return'){
                                         return $html_firstprice;
                                       }else{
                                         echo $html_firstprice;
                                       }
                                     }
}
?>