<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="card card-primary">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-12">
                            <h3 class="card-title">বিস্তারিত নিয়োগ বিজ্ঞপ্তি</h3>
                        </div>
                    </div>
                    
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <h3>শিরোনামঃ <?php if(!empty($recruitment)) { echo $recruitment->rec_job_title; } ?></h3>
                            <p>ঠিকানাঃ <?php if(!empty($recruitment)) { echo $recruitment->rec_job_location; } ?></p>
                            <p>প্রকাশের তারিখঃ <?php if(!empty($recruitment)) { echo $recruitment->rec_publish_date; } ?></p>
                            <p>শেষ তারিখঃ <?php if(!empty($recruitment)) { echo $recruitment->rec_last_date; } ?></p>
                            <p>পদবীঃ <?php if(!empty($recruitment)) {
                                                $where_data['d_id'] = $recruitment->rec_designation;
                                                $where_data['d_status'] = 1;
                                                $designation = $this->Common->get_data_multi_conditional('designation', $where_data)->row();
                                            echo $designation->d_name; } ?></p>
                        </div>
                        <div class="col-12 text-justify">
                            <?php if(!empty($recruitment)) { echo $recruitment->rec_job_description; } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>