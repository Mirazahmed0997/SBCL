<!-- welcome section start -->
<section class="welcome" id="welcome">
    <div class="container job_details">
      <div class="row align-items-center">
        <div class="col-12">
            <?php echo $this->session->flashdata('success');unset($_SESSION['success']); ?>
        </div>
        <div class="col-12">
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover">
                    <thead>
                        <tr>
                            <th class="text-center">জব শিরোনাম </th>
                            <th class="text-center">পদবী</th>
                            <th class="text-center">ঠিকানা</th>
                            <th class="text-center">প্রকাশের তারিখ</th>
                            <th class="text-center">আবেদনের শেষ তারিখ</th>
                            <th class="text-center">বিস্তারিত</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(!empty($rec_list)) { 
                            $count = 0;
                            foreach($rec_list as $value) {    
                        ?>
                        <tr>
                            <td><a href="<?php echo base_url(); ?>Recruitment/job_details/<?php echo $value->rec_id; ?>"><h6 style="color: #333;"><?php echo $value->rec_job_title; ?></h6></a></td>
                            <td class="text-center"><?php
                                $where_data['d_id'] = $value->rec_designation;
                                $where_data['d_status'] = 1;
                                $designation = $this->Common->get_data_multi_conditional('designation', $where_data)->row();
                            echo $designation->d_name; ?></td>
                            <td class="text-center"><?php echo $value->rec_job_location; ?></td>
                            <td class="text-center"><?php echo $value->rec_publish_date; ?></td>
                            <td class="text-center"><?php echo $value->rec_last_date; ?></td>
                            <td class="text-center"><a href="<?php echo base_url(); ?>Recruitment/job_details/<?php echo $value->rec_id; ?>" class=" btn-sm bg-olive"><i class="fas fa-eye"></i></a>
                                <!-- <form action="<?php echo base_url(); ?>Recruitment/job_details" method="post">
                                    <input type="hidden" name="rec_id" value="<?php echo $value->rec_id; ?>">
                                    <button type="submit" class="custom_btn bg-olive"><i class="fas fa-eye"></i></button>
                                </form> -->
                            </td>
                        </tr>
                        <?php } } else { ?>
                            <tr>
                                <td class="text-center" colspan="6">দুঃখিত, বর্তমানে কোন নিয়োগ বিজ্ঞপ্তি নেই। </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
      </div>
    </div>
  </section>
  <!-- welcome section end -->