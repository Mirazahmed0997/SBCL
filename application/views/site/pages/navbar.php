<div class="container">
    <div class="menu-toggle" onclick="toggleMenu()">
        ☰
    </div>
    <nav id="navbar">
        <ul>
            <!-- <li><a href="<?php echo base_url(); ?>" class="active">হোম</a></li> -->
            <li class="dropdown">
                <a href="javascript:void(0)" onclick="toggleDropdown(this)">আমাদের সম্পর্কে <i
                        class="fas fa-chevron-down"></i></a>
                <ul class="submenu">
                    <li><a href="<?php echo base_url('org_history'); ?>">সংগঠনের ইতিহাস</a></li>
                    <li><a href="<?php echo base_url('org_mission'); ?>">লক্ষ্য ও উদ্দেশ্য</a></li>
                    <li><a href="<?php echo base_url('exi_committee'); ?>">ব্যবস্থাপনা কমিটি</a></li>
                    <li><a href="<?php echo base_url('org_structure'); ?>">সাংগঠনিক কাঠামো</a></li>
                    <li><a href="<?php echo base_url('ex_presidents'); ?>">সাবেক সভাপতিগণ</a></li>
                    <li><a href="<?php echo base_url('ex_secretaries'); ?>">সাবেক সম্পাদকগণ</a></li>
                </ul>
            </li>
            <li class="dropdown">
                <a href="javascript:void(0)" onclick="toggleDropdown(this)">কার্যক্রম ও প্রকল্প <i
                        class="fas fa-chevron-down"></i></a>
                <ul class="submenu">
                    <li><a href="<?php echo base_url('crnt_projects'); ?>">চলমান প্রকল্প</a></li>
                    <li><a href="<?php echo base_url('dev_works'); ?>">উন্নয়নমূলক কার্যক্রম</a></li>
                    <li><a href="<?php echo base_url('omen_dev_works'); ?>">নারী সমবায় কার্যক্রম</a></li>
                    <li><a href="#">যুব সমবায় উদ্যোগ</a></li>
                </ul>
            </li>
            <li class="dropdown">
                <a href="javascript:void(0)" onclick="toggleDropdown(this)">প্রশিক্ষণ <i
                        class="fas fa-chevron-down"></i></a>
                <ul class="submenu">
                    <li><a href="#">প্রশিক্ষণ ক্যালেন্ডার</a></li>
                    <li><a href="#">সমবায় শিক্ষা কোর্স</a></li>
                    <li><a href="#">অনলাইন লার্নিং প্ল্যাটফর্ম</a></li>
                    <li><a href="#">প্রশিক্ষণার্থীর মতামত</a></li>
                </ul>
            </li>
            <li class="dropdown">
                <a href="javascript:void(0)" onclick="toggleDropdown(this)">আইন ও বিধিমালা <i
                        class="fas fa-chevron-down"></i></a>
                <ul class="submenu">
                    <li><a href="#">সমবায় আইন ও সংশোধনী</a></li>
                    <li><a href="#">ফরমসমূহ ডাউনলোড</a></li>
                    <li><a href="#">বার্ষিক প্রতিবেদন</a></li>
                    <li><a href="#">সিটিজেন চার্টার</a></li>
                    <li><a href="#">তথ্য অধিকার (RTI)</a></li>
                </ul>
            </li>
            <li class="dropdown">
                <a href="javascript:void(0)" onclick="toggleDropdown(this)">ডিজিটাল সেবা <i
                        class="fas fa-chevron-down"></i></a>
                <ul class="submenu">
                    <li><a href="#">অনলাইন নিবন্ধন</a></li>
                    <li><a href="#">সদস্য যাচাইকরণ</a></li>
                    <li><a href="#">ই-লাইব্রেরি</a></li>
                    <li><a href="#">অভিযোগ প্রতিকার (GRS)</a></li>
                </ul>
            </li>
            <li class="dropdown">
                <a href="javascript:void(0)" onclick="toggleDropdown(this)">আন্তর্জাতিক <i
                        class="fas fa-chevron-down"></i></a>
                <ul class="submenu">

                    <li><a href="#">ICA কার্যক্রম</a></li>
                    <li><a href="#">বৈদেশিক সম্মেলন</a></li>
                    <li><a href="#">আন্তর্জাতিক অংশীদার</a></li>
                </ul>
            </li>
            <li class="dropdown">
                <a href="javascript:void(0)" onclick="toggleDropdown(this)">মিডিয়া <i
                        class="fas fa-chevron-down"></i></a>
                <ul class="submenu">
                    <li><a href="#">সর্বশেষ সংবাদ</a></li>
                    <li><a href="#">মাসিক সমবায় বার্তা</a></li>
                    <li><a href="#">ফটো ও ভিডিও গ্যালারি</a></li>
                    <li><a href="#">প্রেস রিলিজ</a></li>
                </ul>
            </li>
            <li><a href="#">ICA সদস্য</a></li>
            <li><a href="Applicant/members_list/members_list">সদস্য তথ্য</a></li>
            <li><a href="<?php echo base_url('member_registration'); ?>" class="btn-contact">নতুন সদস্য
                    আবেদন</a></li>
        </ul>
    </nav>
</div>


<!-- <nav class="container navbar navbar-expand-lg navbar-light bg-light">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Link</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Dropdown
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav> -->

