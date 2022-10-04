  $(document).ready(function() {

            changeQuantity('.btn-plus');

            changeQuantity('.btn-minus');


            function subTotalCalculation() {
                $subTotalPrice = $('.subTotal');
                $subTot = $('.subTot');
                $subTotal = 0;
                $('.dataRow tr').each(function(i, r) {
                    $subTotal += Number($(r).find('.totalPrice').html().replace('kyats', ''));
                });
                $subTotalPrice.html($subTotal);
                $subTot.html($subTotal + 3000 + 'kyats')
            }

            function changeQuantity(btn) {
                $(btn).on('click', function() {
                    $orderItem = $(this).closest('.orderItem');
                    $orderQty = $orderItem.find('.orderQty').val();
                    $orderPrice = $orderItem.find('.orderPrice').html();
                    $totalPrice = $orderItem.find('.totalPrice');

                    $totalPrice.html($orderPrice * $orderQty + ' kyats');

                    if ($orderQty > 0) {
                        $orderItem.css('textDecoration', 'none');
                    } else {
                         $orderItem.css('textDecoration', 'line-through');
                    }

                    subTotalCalculation();
                });
            }
        });
