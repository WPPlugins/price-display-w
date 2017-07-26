<?php
/***************************************************************************
定価(通常価格)
List price
***************************************************************************/
function cprice_view_change_usces($cprice_out = ''){
  global $usces;
    $cpdcw_default_cprice = $usces->itemsku['cprice'];
      $cpdcw_crform_opt = get_option('pdcwtx_crform_option');
        $cpdcw_tax_rate = (int)$usces->options['tax_rate'];
          $cpdcw_tax_mode = $usces->options['tax_mode'];
            $cpdcw_tax_display = $usces->options['tax_display'];
              $cpdcw_tax_method = $usces->options['tax_method'];

                if($cpdcw_tax_method == 'cutting'){
                  $total_cprice_included_tax = floor($cpdcw_default_cprice - ($cpdcw_default_cprice / (100 + $cpdcw_tax_rate) * 100));
                  $cpdcw_tax_cprice = floor($usces->getTax($cpdcw_default_cprice));
                }elseif($cpdcw_tax_method == 'bring'){
                  $total_cprice_included_tax = ceil($cpdcw_default_cprice - ($cpdcw_default_cprice / (100 + $cpdcw_tax_rate) * 100));
                  $cpdcw_tax_cprice = ceil($usces->getTax($cpdcw_default_cprice));
                }elseif($cpdcw_tax_method == 'rounding'){
                  $total_cprice_included_tax = round($cpdcw_default_cprice - ($cpdcw_default_cprice / (100 + $cpdcw_tax_rate) * 100));
                  $cpdcw_tax_cprice = round($usces->getTax($cpdcw_default_cprice));
                }

                  $cpdcw_total_cprice = $cpdcw_default_cprice + $cpdcw_tax_cprice;
                    $cpdcw_crf_true = usces_crform($cpdcw_default_cprice, true, false, 'return');
                      $cpdcw_crf_false = usces_crform($cpdcw_default_cprice, false, true, 'return');
                        $total_cprice_crf_true = usces_crform($cpdcw_total_cprice, true, false, 'return');
                          $total_cprice_crf_false = usces_crform($cpdcw_total_cprice, false, true, 'return');
                            $tax_cprice_crf_true = usces_crform($cpdcw_tax_cprice, true, false, 'return');
                              $tax_cprice_crf_false = usces_crform($cpdcw_tax_cprice, false, true, 'return');
                                $total_cprice_included_true = usces_crform($total_cprice_included_tax, true, false, 'return');
                                  $total_cprice_included_false = usces_crform($total_cprice_included_tax, false, true, 'return');

                                     if($cpdcw_tax_rate > 0){
                                       if($cpdcw_tax_mode == 'exclude'){
                                         if($cpdcw_crform_opt == 'symbol'){
                                           if($cpdcw_tax_display == 'activate'){
                                             $html_cprice = '<p>'.$total_cprice_crf_true.'<span>('.__('Tax included','pdcwtx').$tax_cprice_crf_true.')</span></p>';
                                           }else{
                                             $html_cprice = '<p>'.$cpdcw_crf_true.'</p>';
                                           }
                                         }elseif($cpdcw_crform_opt == 'text'){
                                           if($cpdcw_tax_display == 'activate'){
                                             $html_cprice = '<p>'.$total_cprice_crf_false.'<span>('.__('Tax included','pdcwtx').$tax_cprice_crf_false.')</span></p>';
                                           }else{
                                             $html_cprice = '<p>'.$cpdcw_crf_false.'</p>';
                                           }
                                         }
                                       }elseif($cpdcw_tax_mode == 'include'){
                                         if($cpdcw_crform_opt == 'symbol'){
                                           if($cpdcw_tax_display == 'activate'){
                                             $html_cprice = '<p>'.$cpdcw_crf_true.'<span>('.__('Tax included','pdcwtx').$total_cprice_included_true.')</span></p>';
                                           }else{
                                             $html_cprice = '<p>'.$cpdcw_crf_true.'</p>';
                                           }
                                         }elseif($cpdcw_crform_opt == 'text'){
                                           if($cpdcw_tax_display == 'activate'){
                                             $html_cprice = '<p>'.$cpdcw_crf_true.'<span>('.__('Tax included','pdcwtx').$total_cprice_included_false.')</span></p>';
                                           }else{
                                             $html_cprice = '<p>'.$cpdcw_crf_false.'</p>';
                                           }
                                         }
                                       }

                                       $html_cprice = apply_filters('cprice_view_change_filter_usces', $html_cprice);

                                       if($cprice_out == 'return'){
                                         return $html_cprice;
                                       }else{
                                         echo $html_cprice;
                                       }
                                     }
}

/***************************************************************************
売価(販売価格)
Selling price
***************************************************************************/
function price_view_change_usces($price_out = ''){
  global $usces;
    $ppdcw_default_price = $usces->itemsku['price'];
      $ppdcw_crform_opt = get_option('pdcwtx_crform_option');
        $ppdcw_tax_rate = (int)$usces->options['tax_rate'];
          $ppdcw_tax_mode = $usces->options['tax_mode'];
            $ppdcw_tax_display = $usces->options['tax_display'];
              $ppdcw_tax_method = $usces->options['tax_method'];

                if($ppdcw_tax_method == 'cutting'){
                  $total_price_included_tax = floor($ppdcw_default_price - ($ppdcw_default_price / (100 + $ppdcw_tax_rate) * 100));
                  $ppdcw_tax_price = floor($usces->getTax($ppdcw_default_price));
                }elseif($ppdcw_tax_method == 'bring'){
                  $total_price_included_tax = ceil($ppdcw_default_price - ($ppdcw_default_price / (100 + $ppdcw_tax_rate) * 100));
                  $ppdcw_tax_price = ceil($usces->getTax($ppdcw_default_price));
                }elseif($ppdcw_tax_method == 'rounding'){
                  $total_price_included_tax = round($ppdcw_default_price - ($ppdcw_default_price / (100 + $ppdcw_tax_rate) * 100));
                  $ppdcw_tax_price = round($usces->getTax($ppdcw_default_price));
                }

                  $ppdcw_total_price = $ppdcw_default_price + $ppdcw_tax_price;
                    $ppdcw_crf_true = usces_crform($ppdcw_default_price, true, false, 'return');
                      $ppdcw_crf_false = usces_crform($ppdcw_default_price, false, true, 'return');
                        $total_price_crf_true = usces_crform($ppdcw_total_price, true, false, 'return');
                          $total_price_crf_false = usces_crform($ppdcw_total_price, false, true, 'return');
                            $tax_price_crf_true = usces_crform($ppdcw_tax_price, true, false, 'return');
                              $tax_price_crf_false = usces_crform($ppdcw_tax_price, false, true, 'return');
                                $total_price_included_true = usces_crform($total_price_included_tax, true, false, 'return');
                                  $total_price_included_false = usces_crform($total_price_included_tax, false, true, 'return');

                                     if($ppdcw_tax_rate > 0){
                                       if($ppdcw_tax_mode == 'exclude'){
                                         if($ppdcw_crform_opt == 'symbol'){
                                           if($ppdcw_tax_display == 'activate'){
                                             $html_price = '<p>'.$total_price_crf_true.'<span>('.__('Tax included','pdcwtx').$tax_price_crf_true.')</span></p>';
                                           }else{
                                             $html_price = '<p>'.$ppdcw_crf_true.'</p>';
                                           }
                                         }elseif($ppdcw_crform_opt == 'text'){
                                           if($ppdcw_tax_display == 'activate'){
                                             $html_price = '<p>'.$total_price_crf_false.'<span>('.__('Tax included','pdcwtx').$tax_price_crf_false.')</span></p>';
                                           }else{
                                             $html_price = '<p>'.$ppdcw_crf_false.'</p>';
                                           }
                                         }
                                       }elseif($ppdcw_tax_mode == 'include'){
                                         if($ppdcw_crform_opt == 'symbol'){
                                           if($ppdcw_tax_display == 'activate'){
                                             $html_price = '<p>'.$ppdcw_crf_true.'<span>('.__('Tax included','pdcwtx').$total_price_included_true.')</span></p>';
                                           }else{
                                             $html_price = '<p>'.$ppdcw_crf_true.'</p>';
                                           }
                                         }elseif($ppdcw_crform_opt == 'text'){
                                           if($ppdcw_tax_display == 'activate'){
                                             $html_price = '<p>'.$ppdcw_crf_true.'<span>('.__('Tax included','pdcwtx').$total_price_included_false.')</span></p>';
                                           }else{
                                             $html_price = '<p>'.$ppdcw_crf_false.'</p>';
                                           }
                                         }
                                       }

                                       $html_price = apply_filters('price_view_change_filter_usces', $html_price);

                                       if($price_out == 'return'){
                                         return $html_price;
                                       }else{
                                         echo $html_price;
                                       }
                                     }
}
?>