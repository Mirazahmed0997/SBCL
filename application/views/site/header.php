<!DOCTYPE html>
<html lang="bn">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>বাংলাদেশ জাতীয় সমবায় ইউনিয়ন | অফিসিয়াল ওয়েবসাইট</title>
    <link rel="stylesheet" href="style.css">
	<link rel="stylesheet" href="<?php echo base_url('') ?>assets/backend/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>

    <!-- <header>
        <div class="container">
            <div class="logo">
                <h1>BJSU</h1>
                <span>বাংলাদেশ জাতীয় সমবায় ইউনিয়ন</span>
            </div>
            <nav id="navbar">
                <ul>
                    <li><a href="<?php echo base_url(); ?>" data-i18n="nav_home" class="active">হোম</a></li>
                    <li><a href="#" data-i18n="nav_about">ইতিহাস</a></li>
                    <li><a href="#" data-i18n="nav_project">প্রকল্পসমূহ</a></li>
                    <li><a href="#" data-i18n="nav_news">নিউজ</a></li>
                    <li><a href="#" data-i18n="nav_download">ডাউনলোড</a></li>
                    <li><a href="<?php echo base_url('member_registration'); ?>" data-i18n="nav_member" class="btn-contact">সদস্য আবেদন</a></li>
                </ul>
            </nav>
            <div class="menu-toggle" onclick="toggleMenu()">
                <i class="fas fa-bars"></i>
            </div>
            <div class="lang-switch">
                <button onclick="toggleLanguage()" id="langBtn">English</button>
            </div> -->
            <!-- <div class="top-bar">
                <div class="container" style="display: flex; justify-content: flex-end;">
                    <div id="google_translate_element"></div>
                </div>
            </div> -->
            <!-- <div class="language-box">
                <div id="google_translate_element"></div>
            </div>

            <script type="text/javascript">
            function googleTranslateElementInit() {
                new google.translate.TranslateElement({
                    pageLanguage: 'bn', 
                    includedLanguages: 'en,bn,ar,hi', // এখানে আপনার প্রয়োজনীয় ভাষাগুলো দিন
                    layout: google.translate.TranslateElement.InlineLayout.SIMPLE,
                    autoDisplay: false
                }, 'google_translate_element');
            }
            </script>
            <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script> -->
        <!-- </div>
    </header> -->
<!-- 
    <header>
    <div class="container">
        <div class="logo">
            <a href="<?php echo base_url(); ?>" title="বাংলাদেশ জাতীয় সমবায় ইউনিয়ন">BJSU</a>
        </div>
        <nav id="navbar">
            <ul>
                <li><a href="<?php echo base_url(); ?>" class="active">হোম</a></li>
                
                <li class="dropdown">
                    <a href="#">আমাদের সম্পর্কে <i class="fas fa-chevron-down"></i></a>
                    <ul class="submenu">
                        <li><a href="#">সংগঠনের ইতিহাস</a></li>
                        <li><a href="#">লক্ষ্য ও উদ্দেশ্য</a></li>
                        <li><a href="#">ব্যবস্থাপনা কমিটি</a></li>
                        <li><a href="#">কাউন্সিলর তালিকা</a></li>
                        <li><a href="#">সাংগঠনিক কাঠামো</a></li>
                        <li><a href="#">সাবেক সভাপতিগণ</a></li>
                    </ul>
                </li>

                <li class="dropdown">
                    <a href="#">কার্যক্রম ও প্রকল্প <i class="fas fa-chevron-down"></i></a>
                    <ul class="submenu">
                        <li><a href="#">চলমান প্রকল্প</a></li>
                        <li><a href="#">উন্নয়নমূলক কার্যক্রম</a></li>
                        <li><a href="#">নারী সমবায় কার্যক্রম</a></li>
                        <li><a href="#">যুব সমবায় উদ্যোগ</a></li>
                    </ul>
                </li>

                <li class="dropdown">
                    <a href="#">প্রশিক্ষণ <i class="fas fa-chevron-down"></i></a>
                    <ul class="submenu">
                        <li><a href="#">প্রশিক্ষণ ক্যালেন্ডার</a></li>
                        <li><a href="#">সমবায় শিক্ষা কোর্স</a></li>
                        <li><a href="#">অনলাইন লার্নিং প্ল্যাটফর্ম</a></li>
                        <li><a href="#">প্রশিক্ষণার্থীর মতামত</a></li>
                    </ul>
                </li>

                <li class="dropdown">
                    <a href="#">আইন ও বিধিমালা <i class="fas fa-chevron-down"></i></a>
                    <ul class="submenu">
                        <li><a href="#">সমবায় আইন ও সংশোধনী</a></li>
                        <li><a href="#">ফরমসমূহ ডাউনলোড</a></li>
                        <li><a href="#">বার্ষিক প্রতিবেদন</a></li>
                        <li><a href="#">সিটিজেন চার্টার</a></li>
                        <li><a href="#">তথ্য অধিকার (RTI)</a></li>
                    </ul>
                </li>

                <li class="dropdown">
                    <a href="#">ডিজিটাল সেবা <i class="fas fa-chevron-down"></i></a>
                    <ul class="submenu">
                        <li><a href="#">অনলাইন নিবন্ধন</a></li>
                        <li><a href="#">সদস্য যাচাইকরণ</a></li>
                        <li><a href="#">ই-লাইব্রেরি</a></li>
                        <li><a href="#">অভিযোগ প্রতিকার (GRS)</a></li>
                    </ul>
                </li>

                <li class="dropdown">
                    <a href="#">আন্তর্জাতিক <i class="fas fa-chevron-down"></i></a>
                    <ul class="submenu">
                        <li><a href="#">ICA কার্যক্রম</a></li>
                        <li><a href="#">বৈদেশিক সম্মেলন</a></li>
                        <li><a href="#">আন্তর্জাতিক অংশীদার</a></li>
                    </ul>
                </li>

                <li class="dropdown">
                    <a href="#">মিডিয়া <i class="fas fa-chevron-down"></i></a>
                    <ul class="submenu">
                        <li><a href="#">সর্বশেষ সংবাদ</a></li>
                        <li><a href="#">মাসিক সমবায় বার্তা</a></li>
                        <li><a href="#">ফটো ও ভিডিও গ্যালারি</a></li>
                        <li><a href="#">প্রেস রিলিজ</a></li>
                    </ul>
                </li>

                <li><a href="<?php echo base_url('member_registration'); ?>" class="btn-contact">সদস্য আবেদন</a></li>
            </ul>
        </nav>

        <div class="menu-toggle" onclick="toggleMenu()">
            <i class="fas fa-bars"></i>
        </div>
        <div class="lang-switch">
            <button onclick="toggleLanguage()" id="langBtn">English</button>
        </div>
    </div>
</header> -->
<div class="sticky-header-container">
    <header>
        <div class="container">
            <div class="logo">
                <a href="<?php echo base_url(); ?>" title="বাংলাদেশ জাতীয় সমবায় ইউনিয়ন">BJSU</a>
            </div>

            <nav id="navbar">
                <ul>
                    <li><a href="<?php echo base_url(); ?>" class="active">হোম</a></li>
                    <li class="dropdown">
                        <a href="javascript:void(0)" onclick="toggleDropdown(this)">আমাদের সম্পর্কে <i class="fas fa-chevron-down"></i></a>
                        <ul class="submenu">
                            <li><a href="<?php echo base_url('org_history'); ?>">সংগঠনের ইতিহাস</a></li>
                            <li><a href="<?php echo base_url('org_mission'); ?>">লক্ষ্য ও উদ্দেশ্য</a></li>
                            <li><a href="<?php echo base_url('exi_committee'); ?>">ব্যবস্থাপনা কমিটি</a></li>
                            <!-- <li><a href="#">কাউন্সিলর তালিকা</a></li> -->
                            <li><a href="<?php echo base_url('org_structure'); ?>">সাংগঠনিক কাঠামো</a></li>
                            <li><a href="<?php echo base_url('ex_presidents'); ?>">সাবেক সভাপতিগণ</a></li>
                            <li><a href="<?php echo base_url('ex_secretaries'); ?>">সাবেক সম্পাদকগণ</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="javascript:void(0)" onclick="toggleDropdown(this)">কার্যক্রম ও প্রকল্প <i class="fas fa-chevron-down"></i></a>
                        <ul class="submenu">
                            <li><a href="<?php echo base_url('crnt_projects'); ?>">চলমান প্রকল্প</a></li>
                            <li><a href="<?php echo base_url('dev_works'); ?>">উন্নয়নমূলক কার্যক্রম</a></li>
                            <li><a href="<?php echo base_url('omen_dev_works'); ?>">নারী সমবায় কার্যক্রম</a></li>
                            <li><a href="#">যুব সমবায় উদ্যোগ</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="javascript:void(0)" onclick="toggleDropdown(this)">প্রশিক্ষণ <i class="fas fa-chevron-down"></i></a>
                        <ul class="submenu">
                            <li><a href="#">প্রশিক্ষণ ক্যালেন্ডার</a></li>
                            <li><a href="#">সমবায় শিক্ষা কোর্স</a></li>
                            <li><a href="#">অনলাইন লার্নিং প্ল্যাটফর্ম</a></li>
                            <li><a href="#">প্রশিক্ষণার্থীর মতামত</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="javascript:void(0)" onclick="toggleDropdown(this)">আইন ও বিধিমালা <i class="fas fa-chevron-down"></i></a>
                        <ul class="submenu">
                            <li><a href="#">সমবায় আইন ও সংশোধনী</a></li>
                            <li><a href="#">ফরমসমূহ ডাউনলোড</a></li>
                            <li><a href="#">বার্ষিক প্রতিবেদন</a></li>
                            <li><a href="#">সিটিজেন চার্টার</a></li>
                            <li><a href="#">তথ্য অধিকার (RTI)</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="javascript:void(0)" onclick="toggleDropdown(this)">ডিজিটাল সেবা <i class="fas fa-chevron-down"></i></a>
                        <ul class="submenu">
                            <li><a href="#">অনলাইন নিবন্ধন</a></li>
                            <li><a href="#">সদস্য যাচাইকরণ</a></li>
                            <li><a href="#">ই-লাইব্রেরি</a></li>
                            <li><a href="#">অভিযোগ প্রতিকার (GRS)</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="javascript:void(0)" onclick="toggleDropdown(this)">আন্তর্জাতিক <i class="fas fa-chevron-down"></i></a>
                        <ul class="submenu">
                            <li><a href="#">ICA কার্যক্রম</a></li>
                            <li><a href="#">বৈদেশিক সম্মেলন</a></li>
                            <li><a href="#">আন্তর্জাতিক অংশীদার</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="javascript:void(0)" onclick="toggleDropdown(this)">মিডিয়া <i class="fas fa-chevron-down"></i></a>
                        <ul class="submenu">
                            <li><a href="#">সর্বশেষ সংবাদ</a></li>
                            <li><a href="#">মাসিক সমবায় বার্তা</a></li>
                            <li><a href="#">ফটো ও ভিডিও গ্যালারি</a></li>
                            <li><a href="#">প্রেস রিলিজ</a></li>
                        </ul>
                    </li>
                    <li><a href="<?php echo base_url('member_registration'); ?>" class="btn-contact">সদস্য আবেদন</a></li>
                </ul>
            </nav>


             <!-- <div class="header-controls">
                <div class="lang-switch">
                    <a href="admin"><button  id="langBtn">লগইন</button></a>
                </div>
            </div> -->

         

            <div class="header-controls">
                <div class="lang-switch">
                    <button onclick="toggleLanguage()" id="langBtn">English</button>
                </div>
                <div class="menu-toggle" onclick="toggleMenu()">
                    <i class="fas fa-bars"></i>
                </div>
            </div>
        </div>
    </header>
    <section class="news-ticker">
        <div class="container">
            <div class="ticker-wrapper">
                <div class="ticker-title">
                    <span>সর্বশেষ সংবাদ</span>
                </div>
                <div class="ticker-content">
                    <marquee behavior="scroll" direction="left" onmouseover="this.stop();" onmouseout="this.start();">
                        <a href="#">• বাংলাদেশ জাতীয় সমবায় ইউনিয়নের ৪৩তম বার্ষিক সাধারণ সভা আগামী মাসে অনুষ্ঠিত হবে।</a>
                        <a href="#">• নতুন সমবায় আইন ২০২৪-এর খসড়া অনুমোদিত হয়েছে।</a>
                        <a href="#">• বন্যায় ক্ষতিগ্রস্ত সমবায়ীদের জন্য বিশেষ ঋণের আবেদন শুরু।</a>
                        <a href="#">• সমবায়ীদের দক্ষতা উন্নয়নে দেশব্যাপী নতুন প্রশিক্ষণ কর্মসূচী ঘোষণা।</a>
                    </marquee>
                </div>
            </div>
        </div>
    </section>
</div>