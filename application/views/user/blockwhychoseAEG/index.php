<?php
/**
 * Created by PhpStorm.
 * User: PS_HUYNH
 * Date: 07/06/2018
 * Time: 11:13 SA
 */
?>
<section >
    <div class="container whitegray">
        <div class="col-md-12 pt-5" >
            <div class="text-center">Vì sao bạn nên luyện thi IELTS tại <span style="color:red;">AEG</span>?
            </div>
        </div>
        <div class="row pb-5">
            <?php foreach ($chose_list1 as $row):?>
            <div class="col-12 col-md-6 pt-0 pt-sm-2 pt-lg-2 pt-md-2 col-lg-3">
                <div class="center-1">
                    <div class="text-comment">
                        <img class="img-responsive img-fluid image-center" src="<?php echo public_url('upload/')?>news/<?php echo $row->image_link ?>">
                        <div class="card-comment orangeLight">
                            <h5><?php echo $row->title ?></h5>
                            <div><?php echo $row->content ?></div>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
            <?php foreach ($chose_list2 as $row):?>
            <div class="col-12 col-md-6 pt-0 pt-sm-2 pt-lg-2 pt-md-2 col-lg-3">
                <div class="center-1">
                    <div class="text-comment ">
                        <img class="img-responsive img-fluid image-center" src="<?php echo public_url('upload/')?>news/<?php echo $row->image_link ?>">
                        <div class="card-comment blueLight">
                            <h5><?php echo $row->title ?></h5>
                            <div><?php echo $row->content ?></div>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
            <?php foreach ($chose_list3 as $row):?>
            <div class="col-12 col-md-6 pt-0 pt-sm-2 pt-md-2 col-lg-3">
                <div class="center-1">
                    <div class="text-comment ">
                        <img class="img-responsive img-fluid image-center" src="<?php echo public_url('upload/')?>news/<?php echo $row->image_link ?>">
                        <div class="card-comment pinkLight">
                            <h5><?php echo $row->title ?></h5>
                            <div><?php echo $row->content ?></div>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
            <?php foreach ($chose_list4 as $row):?>
            <div class="col-12 col-md-6 pt-0 pt-md-2 col-lg-3">
                <div class="center-1">
                    <div class="text-comment">
                        <img class="img-responsive img-fluid image-center" src="<?php echo public_url('upload/')?>news/<?php echo $row->image_link ?>">
                        <div class="card-comment greenLight">
                            <h5><?php echo $row->title ?></h5>
                            <div><?php echo $row->content ?></div>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
