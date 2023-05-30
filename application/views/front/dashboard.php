
<section class="dashboard-first-wrapper">
    <div class="container">
        <div class="dashboard-banner-box">
            <div class="dashboard-banner-flex">
                <div class="dashboard-banner-text">
                    <?php if(!empty($member_data->member_name)):?>
                    <h6><?= $member_data->member_name;?></h6>
                    <?php endif;?>
                    <p>Chnage Password</p>
                </div>
                <div class="dashboard-banner-btn">
                    <a href="<?= base_url()."logout";?>">Logout</a>
                </div>
            </div>
        </div>
        <ul class="custom-db-tabs nav nav-pills" id="pills-tab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true"><i class="fa fa-user" aria-hidden="true"></i> Dashboard</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false"> <i class="fa fa-upload" aria-hidden="true"></i> My Profile</button>
            </li>
        </ul>
        <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                <div class="custom-db-tab-text-flex">
                    <div class="custom-db-tab-text">
                        <!-- <h6>Total Products : <span>0</span> </h6> -->
                    </div>
                    <div class="custom-bb-tab-btn">
                        <!-- <a href="#!"><i class="fa-solid fa-gear"></i> Profile Settings</a> -->
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">...</div>
        </div>
    </div>
</section>