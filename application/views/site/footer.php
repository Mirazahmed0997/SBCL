<?php
$count = $this->db->count_all('newvisitors');
?>

<section class="dark-footer">
    <div class="footer-container">
        <div class="footer-grid">
            <div class="company-info">
                <div class="footer-logo">
                    <a href="<?= base_url(); ?>">
                        <img width="100px"
                            src="<?= base_url('assets/uploads/project/members/logo/91a0505bc70a4089f271d1f87c828ad0.png'); ?> "
                            alt="BJSU Logo">
                    </a>
                   <div>
                     <h5 style=" margin-top: -25px;" class="comh5any-description">
                        বাংলাদেশ জাতীয় সমবায় ইউনিয়ন</h5>
                   </div>
                </div>
                
                <p style="font-size: 10px; margin-top: -15px;">৯/ডি, মতিঝিল বাণিজ্যিক এলাকা, ঢাকা-১০০০, বাংলাদেশ।</p>

                <div class="social-links">
                    <a href="#" class="social-link" aria-label="Visit our Facebook page">
                        <img src="https://landinggo.com/assets/img/stock/login/facebook.svg" alt="Facebook"
                            class="social-icon">
                    </a>
                    <a href="#" class="social-link" aria-label="Follow us on Twitter">
                        <img src="https://landinggo.com/assets/img/stock/login/twitter.svg" alt="Twitter"
                            class="social-icon">
                    </a>
                    <a href="#" class="social-link" aria-label="Connect with us on LinkedIn">
                        <img src="https://landinggo.com/assets/img/stock/login/linkedin.svg" alt="LinkedIn"
                            class="social-icon">
                    </a>
                </div>
            </div>
            <div class="footer-section">
                <h3>ডিজিটাল সেবা</h3>
                <ul class="footer-links">
                    <li><a href="#" class="footer-link">প্রশিক্ষণ</a></li>
                    <li><a href="#" class="footer-link">অনলাইন নিবন্ধন</a></li>
                    <li><a href="#" class="footer-link">সদস্য যাচাইকরণ</a></li>
                    <li><a href="#" class="footer-link">ই-লাইব্রেরি</a></li>
                    <li><a href="#" class="footer-link">অভিযোগ প্রতিকার (GRS)</a></li>
                </ul>
            </div>
            <div class="footer-section">
                <h3>প্রতিষ্ঠান</h3>
                <ul class="footer-links">
                    <li><a href="#" class="footer-link">আমাদের সম্পর্কে</a></li>
                    <li><a href="#" class="footer-link">কার্যক্রম ও প্রকল্প </a></li>
                    <li><a href="#" class="footer-link">আইন ও বিধিমালা</a></li>
                    <li><a href="#" class="footer-link">আন্তর্জাতিক</a></li>
                    <li><a href="#" class="footer-link">মিডিয়া </a></li>
                    <li><a href="#" class="footer-link">নিয়োগ বিজ্ঞপ্তি</a></li>

                </ul>
            </div>
            <div class="footer-section">
                <h3>সাথে থাকুন</h3>
                <!-- <p class="newsletter-description">Subscribe to our newsletter for the latest marketing insights.</p> -->
                <form class="newsletter-form">
                    <div>
                        <input type="email" id="email" name="email" required class="email-input"
                            placeholder="Enter your email">
                    </div>
                    <button type="submit" class="subscribe-button">
                        Subscribe
                    </button>
                </form>
            </div>
        </div>
    </div>
    <div class="bottom-bar">
        <div class="bottom-container">
            <div class="bottom-content">
                <div class="copyright">
                    © 2025 MarketingPro. All rights reserved.
                </div>
                <div>
                        <h5 class="text-black">Visitors : <?= $count ?></h5>
                </div>
            </div>
        </div>
    </div>
</section>




<style>
    .footer-logo {
    display: flex;
    align-items: end;   
    gap: 10px;            
}
    .footer-logo img {
        max-height: 80px;
        background-color: white;
        border-radius: 50%;
        width: auto;
    }



    /* CSS Custom Properties */
    :root {
        --color-white: #ffffff;
        --color-red-300: red;
        --color-gray-300: #d1d5db;
        --color-sky-blue-300: #73a2ab;
        --color-gray-400: #9ca3af;
        --color-gray-600: #4b5563;
        --color-gray-800: #636c79;
        --color-blue-500: #3b82f6;
        --color-blue-600: #2563eb;
        --color-blue-700: #1d4ed8;
    }

    * {
        box-sizing: border-box;
        margin: 0;
        padding: 0;
        font-family: ui-sans-serif, system-ui, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
    }

    .dark-footer {
        background: linear-gradient(90deg, #32aaba, #feb47b);
        color: var(--color-white);
        border-top: 1px solid var(--color-gray-800);
    }

    .footer-container {
        max-width: 80rem;
        margin: 0 auto;
        padding: 3rem 1rem;
    }

    @media (min-width: 640px) {
        .footer-container {
            padding: 3rem 1.5rem;
        }
    }

    @media (min-width: 1024px) {
        .footer-container {
            padding: 4rem 2rem;
        }
    }

    .footer-grid {
        display: grid;
        grid-template-columns: 3fr 1fr 1fr 1fr;
        gap: 3rem;
        
    }

    @media (min-width: 768px) {
        .footer-grid {
            grid-template-columns: repeat(2, 1fr);
            gap: 2rem;
        }
    }

    @media (min-width: 1024px) {
        .footer-grid {
            grid-template-columns: repeat(4, 1fr);
        }
    }

    .company-info {
        display: flex;
        flex-direction: column;
        gap: 1.5rem;
    }

    .company-title {
        font-size: 1.25rem;
        font-weight: 600;
    }

    .company-description {
        color: var(--color-gray-300);
        font-size: 0.875rem;
        line-height: 1.625;
        font-weight: bold;
    }

    .social-links {
        display: flex;
        gap: 1rem;
    }

    .social-link {
        color: var(--color-gray-400);
        transition: color 0.2s;
    }

    .social-link:hover {
        color: var(--color-white);
    }

    .social-icon {
        width: 1.25rem;
        height: 1.25rem;
    }

    .footer-section h3 {
        font-size: 1.125rem;
        font-weight: 600;
        margin-bottom: 1.5rem;
    }

    .footer-links {
        list-style: none;
        display: flex;
        flex-direction: column;
        gap: 1rem;
        font-weight: bold;
    }

    .footer-link {
        color: var(--color-gray-300);
        font-size: 0.875rem;
        text-decoration: none;
        transition: color 0.2s;
    }

    .footer-link:hover {
        color: var(--color-white);
    }

    .newsletter-form {
        display: flex;
        flex-direction: column;
        gap: 1rem;
    }

    .newsletter-description {
        color: var(--color-gray-300);
        font-size: 0.875rem;
        margin-bottom: 1rem;
        font-weight: bold;
    }

    .email-input {
        width: 100%;
        background-color: var(--color-gray-800);
        border: 1px solid var(--color-gray-600);
        border-radius: 0.5rem;
        padding: 0.75rem 1rem;
        color: var(--color-white);
        font-size: 0.875rem;
    }

    .email-input::placeholder {
        color: var(--color-gray-400);
    }

    .email-input:focus {
        outline: none;
        border-color: var(--color-blue-500);
    }

    .subscribe-button {
        width: 100%;
        background-color: var(--color-blue-600);
        color: var(--color-white);
        padding: 0.75rem 1.5rem;
        border-radius: 0.5rem;
        border: none;
        cursor: pointer;
        transition: background-color 0.2s;
        font-size: 0.875rem;
    }

    .subscribe-button:hover {
        background-color: var(--color-blue-700);
    }

    .subscribe-button:focus {
        outline: none;
        box-shadow: 0 0 0 2px var(--color-blue-500), 0 0 0 4px var(--color-gray-900);
    }

    .bottom-bar {
        border-top: 1px solid var(--color-gray-800);
    }

    .bottom-container {
        max-width: 80rem;
        margin: 0 auto;
        padding: 1.5rem 1rem;
    }

    @media (min-width: 640px) {
        .bottom-container {
            padding: 1.5rem;
        }
    }

    @media (min-width: 1024px) {
        .bottom-container {
            padding: 1.5rem 2rem;
        }
    }

    .bottom-content {
        display: flex;
        flex-direction: column;
        gap: 1rem;
    }

    @media (min-width: 768px) {
        .bottom-content {
            flex-direction: row;
            justify-content: space-between;
            align-items: center;
            gap: 0;
        }
    }

    .copyright {
        color: var(--color-gray-400);
        font-size: 0.875rem;
    }

    .policy-links {
        display: flex;
        gap: 1.5rem;
        list-style: none;
    }

    .policy-link {
        color: var(--color-gray-400);
        font-size: 0.875rem;
        text-decoration: none;
        transition: color 0.2s;
    }

    .policy-link:hover {
        color: var(--color-white);
    }
</style>