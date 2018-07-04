<?php
/**
 * Created by PhpStorm.
 * User: PS_HUYNH
 * Date: 07/06/2018
 * Time: 11:17 SA
 */

?>
<section>
    <div class="container">

        <div class"row">
            <div class="col-12 col-md-12 text-center-1 pt-5 pb-0 pb-md-3">
                Chia sẻ & Cảm nhận
            </div>
        </div>
        <div class="row ">
            <div class="col-md-6 pt-4 pb-5">
                <img class="img-responsive img-fluid" src="<?php echo public_url('upload/')?>images/shutterstock.png">
            </div>
            <div class="col-md-6 pt-4 pb-5">
                <div class="text-center-2">
                    <!-- Tab panes -->
                    <div class="tab-content">
                        <?php foreach ($share_list1 as $row):?>
                        <div class="tab-pane active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <div class="img-center-1 pb-0 pb-md-3 pb-lg-5">
                                <img class="img-responsive img-fluid img-center-2" src="<?php echo public_url('upload/')?>news/<?php echo $row->image_link ?>">
                                <div class="text-center-3">
                                    <div class="text-center-4">
                                        <?php echo $row->title ?>
                                    </div>
                                    <div class="text-center-5">
                                        Curriculum Director
                                    </div>
                                </div>
                            </div>
                            <div class="text-center-6">
                                <?php echo $row->content ?>
                            </div>
                        </div>
                        <?php endforeach; ?>
                        <?php foreach ($share_list2 as $row):?>
                        <div class="tab-pane" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                            <div class="img-center-1 pb-0 pb-md-3 pb-lg-5">
                                <img class="img-responsive img-fluid img-center-2" src="<?php echo public_url('upload/')?>news/<?php echo $row->image_link ?>">
                                <div class="text-center-3">
                                    <div class="text-center-4">
                                        <?php echo $row->title ?>
                                    </div>
                                    <div class="text-center-5">
                                        Curriculum Director
                                    </div>
                                </div>
                            </div>
                            <div class="text-center-6">
                                <?php echo $row->content ?>
                            </div>
                        </div>
                        <?php endforeach; ?>
                        <?php foreach ($share_list3 as $row):?>
                        <div class="tab-pane" id="messages" role="tabpanel" aria-labelledby="messages-tab">
                            <div class="img-center-1 pb-0 pb-md-3 pb-lg-5">
                                <img class="img-responsive img-fluid img-center-2" src="<?php echo public_url('upload/')?>news/<?php echo $row->image_link ?>">
                                <div class="text-center-3">
                                    <div class="text-center-4">
                                        <?php echo $row->title ?>
                                    </div>
                                    <div class="text-center-5">
                                        Curriculum Director
                                    </div>
                                </div>
                            </div>
                            <div class="text-center-6">
                                <?php echo $row->content ?>
                            </div>
                        </div>
                        <?php endforeach; ?>
                        <?php foreach ($share_list4 as $row):?>
                        <div class="tab-pane" id="settings" role="tabpanel" aria-labelledby="settings-tab">
                            <div class="img-center-1 pb-0 pb-md-3 pb-lg-5">
                                <img class="img-responsive img-fluid img-center-2" src="<?php echo public_url('upload/')?>news/<?php echo $row->image_link ?>">
                                <div class="text-center-3">
                                    <div class="text-center-4">
                                        <?php echo $row->title ?>
                                    </div>
                                    <div class="text-center-5">
                                        Curriculum Director
                                    </div>
                                </div>
                            </div>
                            <div class="text-center-6">
                                <?php echo $row->content ?>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                    <img class="img-fluid img-center-3" src="<?php echo public_url('upload/')?>images/Line2.png">
                    <div class="image-center-1">
                        <!-- Nav tabs -->
                        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                            <?php foreach ($share_list1 as $row):?>
                            <li class="nav-item">
                                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">
                                    <div class="triangle-down-1 triangle-down"></div>
                                    <img class=" img-fluid img-nav-tabs " src="<?php echo public_url('upload/')?>news/<?php echo $row->image_link ?>" >
                                </a>
                            </li>
                            <?php endforeach; ?>
                            <?php foreach ($share_list2 as $row):?>
                                <li class="nav-item">
                                    <a class="nav-link" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">
                                        <div class="triangle-down-2 triangle-down"></div>
                                        <img class=" img-fluid img-nav-tabs " src="<?php echo public_url('upload/')?>news/<?php echo $row->image_link ?>" >
                                    </a>
                                </li>
                            <?php endforeach; ?>
                            <?php foreach ($share_list3 as $row):?>
                            <li class="nav-item">
                                <a class="nav-link" id="messages-tab" data-toggle="tab" href="#messages" role="tab" aria-controls="messages" aria-selected="false">
                                    <div class="triangle-down-3 triangle-down"></div>
                                    <img class=" img-fluid img-nav-tabs" src="<?php echo public_url('upload/')?>news/<?php echo $row->image_link ?>">
                                </a>
                            </li>
                            <?php endforeach; ?>
                            <?php foreach ($share_list4 as $row):?>
                            <li class="nav-item">
                                <a class="nav-link" id="settings-tab" data-toggle="tab" href="#settings" role="tab" aria-controls="settings" aria-selected="false">
                                    <div class="triangle-down-4 triangle-down"></div>
                                    <img class=" img-fluid img-nav-tabs" src="<?php echo public_url('upload/')?>news/<?php echo $row->image_link ?>">
                                </a>
                            </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
