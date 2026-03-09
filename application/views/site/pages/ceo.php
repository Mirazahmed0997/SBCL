<div class="row">
    <div class="col-md-12 col-lg-12" style="">

        <div id="posts" class="small-thumbs alt">
            <div class="text-center">
                <h3 style="background-color:#25A454;color: white;margin:5px; padding:8px;">প্রধান নির্বাহী কর্মকর্তাগণের তালিকা</h3>
            </div>
            <div class="entry nobottomborder" style=" margin-top:15px;">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>অবস্থান </th>
                        <th>নাম</th>
                        <th>ছবি</th>
                        <th>প্রধান নির্বাহী কর্মকর্তার ধরণ</th>
                        <th>কার্যকাল</th>
                        
                   
                    </tr>
                    </thead>
                    <tbody>
                    <?php //var_dump($principle); ?>
                    <?php if(!empty($vice_principle)): ?>
                        <?php foreach($vice_principle as $k => $r):?>
                            <tr>
                                <td><?php echo $r->commitee;?></td>
                                <td><a href="<?php echo base_url(); ?>Site/about_ceo/<?php echo $r->id; ?>"><?php echo $r->title;?></a></td>
                                <td class="center">
                                    <img class="center" style="width: 90px; padding: 0px; margin-bottom: 0px;border:2px solid pink;" src="<?php echo base_url(); ?>assets/uploads/photos/<?php echo $r->image;?>" alt="<?php echo $r->title;?>">
                                </td>
                                
                                <td><?php echo $r->type;?></td>
                                  <td><?php echo $r->time;?></td>
                             
                            </tr>
                        <?php endforeach;?>
                    <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div><!-- #posts end -->
    </div>
</div>
