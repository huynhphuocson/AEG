<?php
/**
 * Created by PhpStorm.
 * User: PS_HUYNH
 * Date: 26/05/2018
 * Time: 4:07 CH
 */

    if (isset($message) && $message):
        ?>
<div class="noty_type_information">
    <p><strong>Thông báo</strong>
        <?php echo $message ?>
    </p>
</div>
    <?php endif; ?>