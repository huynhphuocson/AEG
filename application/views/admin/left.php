<?php
/**
 * Created by PhpStorm.
 * User: PS_HUYNH
 * Date: 25/05/2018
 * Time: 2:33 CH
 */
?>


    <div class="side-nav-inner">
        <div class="side-nav-logo">
            <a href="<?php echo admin_url('home')?>">
                <div class="logo logo-dark" style="background-image: url('./admin/assets/images/logo/logo.png')"></div>
                <div class="logo logo-white" style="background-image: url('./admin/assets/images/logo/logo-white.png')"></div>
            </a>
            <div class="mobile-toggle side-nav-toggle">
                <a href="">
                    <i class="ti-arrow-circle-left"></i>
                </a>
            </div>
        </div>
        <ul class="side-nav-menu scrollable ">
            <li class="nav-item active">
                <a class="mrg-top-30" href="<?php echo admin_url('home')?>">
                    <span class="icon-holder">
                        <i class="ti-home">
                        </i>
                    </span>
                    <span class="title">Dashboard</span>
                </a>
            </li>

            <?php
                $permissions_admin = $this->session->userdata('permissions');
            ?>

            <?php foreach ($menu_list as $row):?>

            <?php
                    if(isset($permissions_admin->{$row->controller})):
            ?>
                <li class="nav-item dropdown">
                    <a class="dropdown-toggle" href="javascript:void(0); ">
                        <span class="icon-holder">
                            <i class="ti-package"></i>
                        </span>
                        <span class="title"><?php echo $row->title?></span>
                        <span class="arrow">
                            <i class="ti-angle-right"></i>
                        </span>
                    </a>
                    <?php if(!empty($row->subs)): ?>
                    <ul class="dropdown-menu">
                        <?php foreach ($row->subs as $sub):?>
                        <li>
                            <a href="<?php echo admin_url($sub->url)?>"><?php echo $sub->title ?></a>
                        </li>
                        <?php endforeach;?>
                    </ul>
                    <?php endif; ?>
                </li>
            <?php endif; ?>
            <?php endforeach; ?>

            <div class="ps-scrollbar-x-rail" style="left: 0px; bottom: 0px;">
                <div class="ps-scrollbar-x" tabindex="0" style="left: 0px; width: 0px;">
                </div>
            </div>
            <div class="ps-scrollbar-y-rail" style="top: 0px; height: 523px; right: 0px;">
                <div class="ps-scrollbar-y" tabindex="0" style="top: 0px; height: 521px;"></div>
            </div>
        </ul>
    </div>

