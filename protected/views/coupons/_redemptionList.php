<?php
/**
 * Created by PhpStorm.
 * User: Yuvraj
 * Date: 5/1/2015
 * Time: 12:17 AM
 */
?>
<table class="table table-striped table-bordered table-advance table-hover">
    <thead>
        <tr>
            <th>Redeemed On</th>
            <th>Coupon Code</th>
            <th>Campaign Code</th>
            <th>User</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($data as $coupon){ ?>
            <tr>
                <td><?php echo date('d M, Y',strtotime($coupon['appliedDate'])); ?></td>
                <td><?php echo $coupon['couponCode']; ?></td>
                <td><?php echo $coupon['rewardId']['campaignCode']; ?></td>
                <td><?php echo $coupon['userName']; ?></td>
            </tr>
        <?php } ?>
    </tbody>
</table>