<?php

//$listOfProducts is array:
// Array
// (
//     [0] => Array
//         (
//             [info] => Array
//                 (
//                     [SKU] => SWU119
//                     [name] => DIM Complex (Diindolylmethane)
//                     [QTY] => 0
//                     [CASE] => 48
//                     [nalBG] => 0
//                     [prodQty] => 4
//                     [nomPos] => 468
//                 )

//             [prodQtySort] => 4
//         )

//     [1] => Array
//         (
//             [info] => Array
//                 (
//                     [SKU] => SW1368
//                     [name] => Vitamin D3 Liquid Drops
//                     [QTY] => 43
//                     [CASE] => 48
//                     [nalBG] => 11
//                     [prodQty] => 1
//                     [nomPos] => 458
//                 )

//             [prodQtySort] => 1
//         )

//sort array by column prodQtySort desc

        array_multisort( 
            array_column( $listOfProducts, 'prodQtySort' ), 
            SORT_DESC, 
            SORT_NUMERIC, 
            $listOfProducts 
        );
