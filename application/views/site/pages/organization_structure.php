<section class="org-structure-area">
    <div class="container">
        <div class="org-header">
            <span class="sub-tag">আমাদের বিন্যাস</span>
            <h2>সাংগঠনিক কাঠামো</h2>
            <div class="accent-line"></div>
            <p>একটি সুশৃঙ্খল প্রশাসনিক কাঠামোর মাধ্যমে আমরা আমাদের সকল কার্যক্রম পরিচালনা করি।</p>
        </div>

        <div class="org-tree-wrapper">
            <div class="org-level level-1">
                <div class="grid-node" onclick="openOrgModal('সাধারণ পরিষদ', [
                    {name: 'জনাব রহিম উদ্দিন', position: 'প্রধান নিয়ন্ত্রক'},
                    {name: 'জনাব হাসান মাহমুদ', position: 'সদস্য সচিব'},
                    {name: 'জনাব আবুল কাশেম', position: 'সহকারী অডিটর'}
                ])">
                    <div class="node-icon"><i class="fas fa-users"></i></div>
                    <h3>সাধারণ পরিষদ</h3>
                    <p>সর্বোচ্চ নীতি-নির্ধারণী ফোরাম</p>
                </div>
            </div>

            <div class="org-level level-2">
                <div class="org-node highlight-node" onclick="openOrgModal('নির্বাহী কমিটি', [
                    {name: 'জনাব মোহাম্মদ আব্দুল্লাহ', position: 'সভাপতি'},
                    {name: 'বেগম ফাতেমা জোহরা', position: 'সাধারণ সম্পাদক'},
                    {name: 'জনাব কামাল হোসেন', position: 'কোষাধ্যক্ষ'}
                ])">
                    <div class="node-icon"><i class="fas fa-user-tie"></i></div>
                    <h3>নির্বাহী কমিটি</h3>
                    <p>২১ সদস্য বিশিষ্ট পরিচালনা পর্ষদ</p>
                </div>
            </div>

            <div class="org-level level-3">
                <div class="org-node side-node">
                    <h3>সভাপতি</h3>
                </div>
                <div class="org-node side-node">
                    <h3>সাধারণ সম্পাদক</h3>
                </div>
            </div>

            <div class="org-grid-container">
                <div class="grid-node">
                    <i class="fas fa-balance-scale"></i>
                    <h4>অর্থ ও অডিট শাখা</h4>
                </div>
                <div class="grid-node">
                    <i class="fas fa-bullhorn"></i>
                    <h4>প্রচার ও প্রকাশনা</h4>
                </div>
                <div class="grid-node">
                    <i class="fas fa-hand-holding-heart"></i>
                    <h4>সদস্য কল্যাণ শাখা</h4>
                </div>
                <div class="grid-node">
                    <i class="fas fa-tools"></i>
                    <h4>প্রকল্প ও দপ্তর</h4>
                </div>
            </div>
        </div>
    </div>
</section>

<div id="orgModal" class="modal-overlay">
    <div class="modal-content">
        <span class="close-btn" onclick="closeOrgModal()">&times;</span>
        <h2 id="modalTitle">বিভাগের নাম</h2>
        <div class="modal-divider"></div>
        <div id="modalBody" class="modal-body">
            </div>
    </div>
</div>