<!-- Post Content
                                ============================================= -->
<div class="postcontent bothsidebar nobottommargin clearfix">

    <!-- Posts<div class="postcontent nobottommargin clearfix">
    ============================================= -->
    <div id="posts" class="small-thumbs alt">

        <div class="promo promo-dark promo-flat promo-center bottommargin">
            <h3>Result</h3>
        </div>

        <div class="entry nobottomborder" style="margin: 0px 0px -50px 0px;">
        </div>

        <div class="entry nobottomborder" style="margin: 0px 0px -50px 0px;">
            <div class="heading-block fancy-title nobottomborder title-bottom-border">
                <h4><span>Search Result</span>.</h4>
            </div>

            <div class="col-md-8" style="margin: 0px 0px 20px 0px;">

                <div class="well well-lg nobottommargin">
                    <?php if ($_POST){?>
                        <div class="alert alert-danger alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <strong>Sorry!</strong> No Result found for your query!
                        </div>
                    <?php } echo form_open(current_url());?>
                    <!--<form id="login-form" name="login-form" class="nobottommargin" action="#" method="post">-->
                        <div class="col_full" id="class">
                            <label for="login-form-username">Class:</label>
                            <select name="class" id="class" class="required form-control input-block-level" data-bv-notempty="true">
                                <option> ---- select class ---- </option>
                                <?php $q=$this->db->get('class');
                                foreach($q->result() as $row):?>
                                <option value="<?php echo $row->id;?>"><?php echo $row->title;?></option>
                                <?php endforeach;?>
                            </select>
                            <!--<input type="text" id="login-form-username" name="login-form-username" value="" class="required form-control input-block-level" />-->
                        </div>

                        <div class="col_full" id="roll">
                            <label for="login-form-password">Roll No:</label>
                            <input type="text" name="roll" id="roll" class="required form-control input-block-level" data-bv-notempty="true">
                            <!--<input type="text" id="login-form-password" name="login-form-password" value="" class="required form-control input-block-level" />-->
                        </div>

                        <div class="col_full nobottommargin">
                            <button type="submit" class="button button-3d nomargin" id="login-form-submit" name="login-form-submit" value="login">Search</button>
                        </div>

                    </form>
                </div>

            </div>
            <div class="table table-responsive" style="display: none;">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Subject Name</th>
                            <th>Grade</th>
                            <th>Point</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Bangla</td>
                            <td>A</td>
                            <td>4.50</td>
                        </tr>
                    </tbody>
                </table>
            </div>

        </div>

    </div><!-- #posts end -->

</div><!-- .postcontent end -->