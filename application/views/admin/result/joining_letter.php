
<div id="printableArea">
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="card card-primary">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-12">
                            <h3 class="card-title">নিয়োগপত্র</h3>
                        </div>
                    </div>
                    
                </div>
                

                <div class="card-body">
                    <div class="row text-right" id="print_button" style="margin-bottom: 20px;">
                        <div class="col-10"></div>
                        <div class="col-2">
                            <button class="btn btn-primary" onclick="printDiv('printableArea')"><i class="fas fa-print"> Print</i></button>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 text-center">
                            <h3>নিয়োগের চিঠি</h3>
                        </div>
                        <div class="col-12">
                            <p>তারিখঃ <?php if(!empty($applicant_join)) { echo bn_date($applicant_join->ajl_join_letter_date); } ?></p>
                            <p><?php if(!empty($applicant)) { echo $applicant->r_first_name.' '.$applicant->r_last_name; } ?>, <br><?php if(!empty($designation)) { echo $designation->d_name; } ?>, <br>শিক্ষিত বেকার কেন্দ্রীয় সঞ্চয় ও ঋণদান সমবায় সমিতি, <br>ওয়্যারলেছ বাজার, চাঁদপুর সদর, চাঁদপুর।</p>
                            <p>বিষয়ঃ নিয়োগের চিঠিপত্র। </p>
                            <p>জনাব <?php if(!empty($applicant)) { echo $applicant->r_first_name.' '.$applicant->r_last_name; } ?>,</p>
                            <p>চাকরির অফার লেটার গ্রহণ এবং স্বাক্ষর করার জন্য আপনাকে ধন্যবাদ। আমি আপনাকে জানাতে পেরে আনন্দিত যে শিক্ষিত বেকার কেন্দ্রীয় সঞ্চয় ও ঋণদান সমবায় সমিতি সাথে আপনার কর্মসংস্থানটি <?php if(!empty($designation)) { echo $designation->d_name; } ?> সক্ষমতার সাথে নিশ্চিত করা হয়েছে।</p>
                            <p>সম্মতি অনুযায়ী আপনার শুরুর তারিখ হবে <?php if(!empty($applicant_join)) { echo bn_date($applicant_join->ajl_join_date); } ?>, এবং আপনার কাজের সময় <?php if(!empty($applicant_join)) { echo bn_date($applicant_join->	ajl_start_time); } ?> থেকে <?php if(!empty($applicant_join)) { echo bn_date($applicant_join->ajl_end_time); } ?>, শনিবার থেকে বৃহস্পতিবার। আপনার কর্মসংস্থান নিয়ন্ত্রণকারী আরও তথ্য স্বাক্ষরিত যোগাযোগের পাশাপাশি কর্মসংস্থান নীতি নথিতে পাওয়া যাবে।</p>
                            <p>আপনার কর্মসংস্থান সম্পর্কে আপনার আরও প্রশ্ন থাকলে, আপনি সরাসরি আমার সাথে যোগাযোগ করতে পারেন বা HR বিভাগের সাথে যোগাযোগ করতে পারেন</p>
                            <p>আপনার নিয়োগের জন্য অভিনন্দন এবং শিক্ষিত বেকার কেন্দ্রীয় সঞ্চয় ও ঋণদান সমবায় সমিতি স্বাগতম। আমরা সদয় সহযোগিতা এবং সাফল্য বছরের জন্য উন্মুখ. আমরা আপনার নতুন পোস্টে আপনাকে শুভকামনা জানাই।</p>
                            <br>
                            <p>আন্তরিকভাবে <br><?php if(!empty($applicant_join)) { echo $applicant_join->ajl_name; } ?> <br><?php if(!empty($applicant_join)) { echo $applicant_join->ajl_designation; } ?> <br><?php if(!empty($applicant_join)) { echo $applicant_join->ajl_organization; } ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>

</div>

<script type="text/javascript">
	function printDiv(divName) {
		$(".card-title").hide();
		$("#print_button").hide();

		var printContents = document.getElementById(divName).innerHTML;
		var originalContents = document.body.innerHTML;
        
		document.body.innerHTML = printContents;
		window.print();
		document.body.innerHTML = originalContents;

		$(".card-title").show();
		$("#print_button").show();

	}
</script>