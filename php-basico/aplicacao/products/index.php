<?php
/**
 * Created by PhpStorm.
 * User: tommye
 * Date: 31/10/17
 * Time: 12:58
 */

require __DIR__ . '/../../Layout/header.php';

?>

<h1>Products</h1>
<hr/>
<div class="table-responsive">
    <table class="table table-hover">
        <thead style="background-color: #85898d">
            <tr>
                <th style="width: 5%">#</th>
                <th style="width: 75%">Description</th>
                <th style="width: 10%">Price</th>
                <th style="width: 10%; text-align: center">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if (empty($products)) : ?>
                <tr>
                    <td colspan="4" style="text-align: center;" class="table-bordered">Empty</td>
                </tr>
            <?php else :
            foreach ($products as $product) : $total += $product->PRICE; ?>
            <tr>
                <td><?=$product->ID_PRODUCTS?></td>
                <td><?=$product->NAME?></td>
                <td>R$ <?=number_format($product->PRICE, 2, ',', '.')?></td>
                <td style="text-align: center">
                    <a class="btn btn-default" disabled="" onclick="return false" role="button" href="#"><i class="glyphicon glyphicon-pencil"></i></a>
                    <a class="btn btn-default" disabled="" onclick="return false" role="button" href="#"><i class="glyphicon glyphicon-trash"></i></a>
                </td>
            </tr>
            <?php endforeach; endif;?>
        </tbody>
        <tfoot">
            <tr style="background-color: #b3b3b3; font-weight: bold;">
                <td></td>
                <td></td>
                <td>R$ <?=number_format($total, 2, ',', '.')?> </td>
                <td></td>
            </tr>
        </tfoot>
    </table>
</div>