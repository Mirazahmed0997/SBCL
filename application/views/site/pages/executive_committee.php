<section class="committee-smart-section">
    <div class="container">
        <div class="section-header">
            <h2>ব্যবস্থাপনা কমিটি</h2>
            <div class="divider"></div>
        </div>

        <div class="leadership-grid">
            <div class="member-card">
                <div class="m-thumb">
                    <img src="https://i.pravatar.cc/150?u=1" alt="President">
                    <div class="m-social">
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
                <div class="m-body">
                    <span class="m-rank">সভাপতি</span>
                    <h3>জনাব মোহাম্মদ আব্দুল্লাহ</h3>
                    <p>অভিজ্ঞ সমবায় সংগঠক ও সমাজকর্মী।</p>
                    <div class="m-footer">
                        <a href="<?php echo base_url('committee_mem_details'); ?>" class="btn-more-info">বিস্তারিত</a>
                        <span class="m-id">#101</span>
                    </div>
                </div>
            </div>

            <div class="member-card">
                <div class="m-thumb">
                    <img src="https://i.pravatar.cc/150?u=2" alt="GS">
                    <div class="m-social">
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
                <div class="m-body">
                    <span class="m-rank">সাধারণ সম্পাদক</span>
                    <h3>বেগম ফাতেমা জোহরা</h3>
                    <p>সংগঠন পরিচালনায় দক্ষ ও অভিজ্ঞ ব্যবস্থাপক।</p>
                    <div class="m-footer">
                        <button class="btn-more-info">বিস্তারিত</button>
                        <span class="m-id">#102</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="expandable-panel" id="moreMembers">
            <div class="leadership-grid">
                <script>
                    const designations = ["সহ-সভাপতি", "কোষাধ্যক্ষ", "যুগ্ম সম্পাদক", "সাংগঠনিক সম্পাদক", "দপ্তর সম্পাদক", "প্রচার সম্পাদক", "নির্বাহী সদস্য", "নির্বাহী সদস্য"];
                    const names = ["জনাব রহিম উদ্দিন", "জনাব কামাল হোসেন", "জনাব আবুল কাশেম", "জনাব সাইদুল ইসলাম", "জনাব হাসান মাহমুদ", "জনাব আশিকুর রহমান", "জনাব জসিম উদ্দিন", "জনাব মফিজুল হক"];
                    
                    for(let i=0; i<8; i++) {
                        document.write(`
                        <div class="member-card mini-style">
                            <div class="m-thumb">
                                <img src="https://i.pravatar.cc/150?u=${i+3}" alt="Member">
                                <div class="m-social">
                                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                                    <a href="#"><i class="fab fa-linkedin-in"></i></a>
                                </div>
                            </div>
                            <div class="m-body">
                                <span class="m-rank">${designations[i]}</span>
                                <h3>${names[i]}</h3>
                                <p>সংগঠনের একনিষ্ঠ এবং দক্ষ সদস্য।</p>
                                <div class="m-footer">
                                    <button class="btn-more-info">বিস্তারিত</button>
                                    <span class="m-id">#${103+i}</span>
                                </div>
                            </div>
                        </div>
                        `);
                    }
                </script>
            </div>
        </div>

        <div class="action-center">
            <button class="btn-toggle-view" onclick="toggleView()">
                <span id="btnTxt">আরো সদস্য দেখুন</span>
                <i class="fas fa-arrow-down" id="btnIcon"></i>
            </button>
        </div>
    </div>
</section>