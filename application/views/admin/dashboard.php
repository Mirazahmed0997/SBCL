<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Dashboard</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <!--						<li class="breadcrumb-item"><a href="-->
                        <?php //echo base_url('dashboard')
                        ?>
                        <!--">Home</a></li>-->
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">

            <!-- Small boxes (Stat box) -->
            <div class="row">
                <!-- ./col -->
                <div class="col-lg-4 col-6">
                    <!-- small box -->
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3><?php if(!empty($total_president)) { echo $total_president; } else { echo 0; } ?>
                            </h3>
                            <p>সর্বমোট সদস্য ভর্তি সংখ্যা</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person-add"></i>
                        </div>

                        <a href="<?php echo base_url('admin_dashboard'); ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-4 col-6">
                    <!-- small box -->
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3><?php if(!empty($total_secretary)) { echo 3; } else { echo 0; } ?> </h3>
                            <p>সদস্য প্রত্যাহার সংখ্যা</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person-add"></i>
                        </div>

                        <a href="<?php echo base_url('admin_dashboard'); ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-4 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3><?php if(!empty($total_jointsecretary)) { echo 9; } else { echo 0; } ?> </h3>
                            <p>সদস্য সংখ্যা স্থিতি</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person-add"></i>
                        </div>

                        <a href="<?php echo base_url('admin_dashboard'); ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->