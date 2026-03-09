// মোবাইল মেনু টগল
function toggleMenu() {
    const navbar = document.getElementById('navbar');
    navbar.classList.toggle('active');
    
    const icon = document.querySelector('.menu-toggle i');
    if(navbar.classList.contains('active')) {
        icon.classList.remove('fa-bars');
        icon.classList.add('fa-times');
    } else {
        icon.classList.remove('fa-times');
        icon.classList.add('fa-bars');
    }
}
// মোবাইলে ড্রপডাউন ক্লিক করলে খোলার জন্য (হোভার মোবাইলে কাজ করে না)
function toggleDropdown(element) {
    if (window.innerWidth <= 992) {
        const parent = element.parentElement;
        parent.classList.toggle('open');
    }
}
const counters = document.querySelectorAll('.counter');
const speed = 200;

// কাউন্টার এনিমেশন ফাংশন
const startCount = (counter) => {
    counter.innerText = '0';
    const updateCount = () => {
        const target = +counter.getAttribute('data-target');
        const count = +counter.innerText;
        const inc = target / speed;

        if (count < target) {
            counter.innerText = Math.ceil(count + inc);
            setTimeout(updateCount, 15); // ১ এর বদলে ১৫ দিলে এনিমেশন স্মুথ হয়
        } else {
            counter.innerText = target;
        }
    };
    updateCount();
};

// Intersection Observer সেটআপ
const observerOptions = {
    threshold: 0.5 // সেকশনটি যখন অন্তত ৫০% দেখা যাবে তখন শুরু হবে
};
const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            // সেকশনটি স্ক্রিনে আসলে কাউন্টার শুরু হবে
            const countersInView = entry.target.querySelectorAll('.counter');
            countersInView.forEach(counter => startCount(counter));
        } else {
            // সেকশন থেকে চলে গেলে কাউন্টার আবার ০ করে রাখা (যাতে পরের বার আবার শুরু হতে পারে)
            const countersInView = entry.target.querySelectorAll('.counter');
            countersInView.forEach(counter => {
                counter.innerText = '0';
            });
        }
    });
}, observerOptions);

// স্ট্যাটাস সেকশনটিকে অবজার্ভ করা শুরু
const statsSection = document.querySelector('.stats-section');
if (statsSection) {
    observer.observe(statsSection);
}
// FAQ Accordion Logic
const faqItems = document.querySelectorAll('.faq-item');

faqItems.forEach(item => {
    const question = item.querySelector('.faq-question');
    question.addEventListener('click', () => {
        // Toggle active class
        item.classList.toggle('active');
        
        // Optional: Close other FAQs when one is opened
        faqItems.forEach(otherItem => {
            if (otherItem !== item) {
                otherItem.classList.remove('active');
            }
        });
    });
});
// Contact Form Submission Handling
const contactForm = document.getElementById('bcu-contact-form');

if (contactForm) {
    contactForm.addEventListener('submit', function(e) {
        e.preventDefault();
        
        // কাল্পনিক সাকসেস মেসেজ
        alert('আপনার বার্তাটি সফলভাবে পাঠানো হয়েছে। আমরা শীঘ্রই আপনার সাথে যোগাযোগ করব।');
        
        // ফরমটি রিসেট করা
        contactForm.reset();
    });
}


// সব টেক্সট ডাটা এখানে থাকবে
const translations = {
    bn: {
        nav_home: "হোম",
        nav_about: "ইতিহাস",
        nav_project: "প্রকল্পসমূহ",
        nav_news: "নিউজ",
        nav_download: "ডাউনলোড",
        nav_member: "সদস্য আবেদন",
        hero_title: "সমবায়ের মাধ্যমে একটি টেকসই ভবিষ্যৎ গড়ি",
        hero_p: "অর্থনৈতিক ও সামাজিক প্রবৃদ্ধির জন্য বাংলাদেশের সমবায়ীদের ক্ষমতায়ন করছি।",
        notice_title: "নোটিশ বোর্ড",
        stats_members: "মোট সদস্য",
        stats_capital: "মোট মূলধন (কোটি টাকা)",
        contact_title: "যোগাযোগ করুন"
    },
    en: {
        nav_home: "Home",
        nav_about: "History",
        nav_project: "Projects",
        nav_news: "News",
        nav_download: "Downloads",
        nav_member: "Become a Member",
        hero_title: "Building a Sustainable Future through Cooperation",
        hero_p: "Empowering cooperatives across Bangladesh for economic and social growth.",
        notice_title: "Notice Board",
        stats_members: "Total Members",
        stats_capital: "Total Capital (Cr BDT)",
        contact_title: "Contact Us"
    }
};

let currentLang = 'bn'; // ডিফল্ট ভাষা বাংলা

function toggleLanguage() {
    currentLang = (currentLang === 'bn') ? 'en' : 'bn';
    updatePageText();
    
    // বাটন টেক্সট আপডেট
    document.getElementById('langBtn').innerText = (currentLang === 'bn') ? 'English' : 'বাংলা';
}

function updatePageText() {
    // HTML-এ প্রতিটি এলিমেন্টের একটি 'data-i18n' এট্রিবিউট থাকতে হবে
    document.querySelectorAll('[data-i18n]').forEach(element => {
        const key = element.getAttribute('data-i18n');
        element.innerText = translations[currentLang][key];
    });
}

// পেজ লোড হওয়ার সময় ডিফল্ট টেক্সট সেট করা
window.onload = updatePageText;

let currentSlideIndex = 0;
const slides = document.querySelectorAll('.slide');
const dots = document.querySelectorAll('.dot');

function showSlide(index) {
    // আগের স্লাইডগুলো মুছে ফেলা
    slides.forEach(slide => slide.classList.remove('active'));
    dots.forEach(dot => dot.classList.remove('active'));

    // নতুন স্লাইড দেখানো
    slides[index].classList.add('active');
    dots[index].classList.add('active');
}

function nextSlide() {
    currentSlideIndex++;
    if (currentSlideIndex >= slides.length) {
        currentSlideIndex = 0;
    }
    showSlide(currentSlideIndex);
}

// প্রতি ৫ সেকেন্ড পর পর স্লাইড পরিবর্তন হবে
let slideInterval = setInterval(nextSlide, 5000);

// ডটে ক্লিক করলে স্লাইড পরিবর্তন
function currentSlide(index) {
    clearInterval(slideInterval); // ক্লিক করলে অটো রোটেশন থামবে
    currentSlideIndex = index;
    showSlide(currentSlideIndex);
    slideInterval = setInterval(nextSlide, 5000); // আবার শুরু হবে
}

// current project slider 
function initProjectSlider() {
    const list = document.getElementById('projectList');
    const items = list.getElementsByClassName('project-item-card');
    const itemCount = items.length;
    
    // যদি ২টির বেশি প্রজেক্ট থাকে তবেই স্ক্রল হবে
    if (itemCount > 2) {
        let index = 0;
        const cardHeight = 110; // উচ্চতা (100) + মার্জিন (10)

        setInterval(() => {
            index++;
            list.style.transition = "transform 0.8s ease-in-out";
            list.style.transform = `translateY(-${index * cardHeight}px)`;

            // লুপ শেষ হলে আবার শুরুতে ফিরে আসা
            if (index >= itemCount - 1) {
                setTimeout(() => {
                    list.style.transition = "none";
                    list.style.transform = "translateY(0)";
                    index = 0;
                }, 800); // ট্রানজিশন শেষ হওয়ার পর রিসেট
            }
        }, 3000); // প্রতি ৩ সেকেন্ড পর পর স্ক্রল হবে
    }
}

// পেজ লোড হলে ফাংশনটি চালু হবে
window.onload = initProjectSlider;


function initWorkSlider() {
    const grid = document.getElementById('workGrid');
    const cards = grid.getElementsByClassName('work-card');
    const totalCards = cards.length;
    
    // যদি ৩টির বেশি কার্ড থাকে তবেই স্লাইড হবে
    if (totalCards > 3) {
        let count = 0;
        const cardWidth = 380; // কার্ডের চওড়া (350) + গ্যাপ (30)

        setInterval(() => {
            count++;
            grid.style.transform = `translateX(-${count * cardWidth}px)`;

            // যদি শেষ কার্ডে পৌঁছে যায় তবে শুরুতে ফিরে আসবে
            if (count > totalCards - 3) { 
                setTimeout(() => {
                    grid.style.transition = "none";
                    grid.style.transform = "translateX(0)";
                    count = 0;
                    // সামান্য বিরতি দিয়ে আবার ট্রানজিশন অন করা
                    setTimeout(() => { grid.style.transition = "transform 0.6s ease-in-out"; }, 50);
                }, 700);
            }
        }, 4000); // প্রতি ৪ সেকেন্ড পর পর স্লাইড হবে
    }
}

// উইন্ডো লোড হলে রান করবে
window.addEventListener('load', initWorkSlider);


function initSuccessSliderRight() {
    const track = document.getElementById('successTrack');
    const cards = track.getElementsByClassName('story-card');
    const totalCards = cards.length;
    const cardWidth = cards[0].offsetWidth + 25; // কার্ডের চওড়া + গ্যাপ
    
    // শুরুতে ট্র্যাকটিকে একদম বামের শেষ মাথায় নিয়ে যাই
    let maxOffset = (totalCards - 3) * cardWidth;
    let currentOffset = maxOffset;
    track.style.transform = `translateX(-${currentOffset}px)`;

    setInterval(() => {
        currentOffset -= cardWidth; // মান কমালে এটি ডানে সরবে
        
        track.style.transition = "transform 0.8s ease-in-out";
        track.style.transform = `translateX(-${currentOffset}px)`;

        // যখন একদম শুরুতে (০ তে) চলে আসবে, তখন আবার শেষে পাঠিয়ে দেব
        if (currentOffset <= 0) {
            setTimeout(() => {
                track.style.transition = "none";
                currentOffset = maxOffset;
                track.style.transform = `translateX(-${currentOffset}px)`;
            }, 800);
        }
    }, 4000);
}

window.addEventListener('load', initSuccessSliderRight);





// অ্যালবামের ডেটাবেজ (ছবির লিংকগুলো এখানে থাকবে)
const albumData = {
    'meeting': [
        'https://images.unsplash.com/photo-1558444479-c8a51bc7306c',
        'https://images.unsplash.com/photo-1517048676732-d65bc937f952',
        'https://images.unsplash.com/photo-1542601906990-b4d3fb778b09'
    ],
    'agriculture': [
        'https://images.unsplash.com/photo-1464226184884-fa280b87c399',
        'https://images.unsplash.com/photo-1596338084721-76efdd85da3a',
        'https://images.unsplash.com/photo-1508967566542-f35029cc7210'
    ],
    'training': [
        'https://images.unsplash.com/photo-1517048676732-d65bc937f952',
        'https://images.unsplash.com/photo-1523348837708-15d4a09cfac2'
    ]
};

function openAlbum(albumName) {
    const lightbox = document.getElementById('galleryLightbox');
    const content = document.getElementById('lightboxContent');
    
    content.innerHTML = ''; // কন্টেন্ট ক্লিয়ার করা

    // ধরুন albumData[albumName] এ ৫০টি ছবির লিংক আছে
    const photos = albumData[albumName]; 

    photos.forEach((imgUrl, index) => {
        const imgContainer = document.createElement('div');
        imgContainer.className = 'gallery-img-box';
        
        const img = document.createElement('img');
        // 'loading="lazy"' ব্যবহার করলে ৫০টি ছবি একবারে সার্ভারে চাপ ফেলবে না
        img.src = imgUrl + `?auto=format&fit=crop&w=400`;
        img.setAttribute('loading', 'lazy'); 
        img.alt = `Photo ${index + 1}`;
        
        // ছবিতে ক্লিক করলে ফুল স্ক্রিন দেখার ব্যবস্থা (ঐচ্ছিক)
        img.onclick = () => window.open(imgUrl, '_blank');

        imgContainer.appendChild(img);
        content.appendChild(imgContainer);
    });

    lightbox.style.display = 'block';
    document.body.style.overflow = 'hidden';
}

function closeLightbox() {
    document.getElementById('galleryLightbox').style.display = 'none';
    document.body.style.overflow = 'auto'; // স্ক্রলিং চালু করা
}

function loadMoreAlbums() {
    // সব লুকানো অ্যালবাম খুঁজে বের করা
    const hiddenAlbums = document.querySelectorAll('.hidden-album');
    const loadMoreBtn = document.getElementById('loadMoreBtn');
    
    const itemsToShow = 3; // প্রতি ক্লিকে কয়টি করে নতুন অ্যালবাম দেখাবে
    let count = 0;

    hiddenAlbums.forEach((album) => {
        if (count < itemsToShow) {
            album.classList.remove('hidden-album');
            album.classList.add('show-animation'); // সুন্দর এনিমেশন যোগ করা
            count++;
        }
    });

    // চেক করা আর কোনো লুকানো অ্যালবাম আছে কি না
    const remainingHidden = document.querySelectorAll('.hidden-album');
    if (remainingHidden.length === 0) {
        loadMoreBtn.style.display = 'none'; // সব অ্যালবাম দেখানো হয়ে গেলে বাটন হাইড হবে
    }
}

function slideEvents(direction) {
    const wrapper = document.getElementById('eventsWrapper');
    const scrollAmount = 375; // একটি কার্ডের চওড়া + গ্যাপ

    if (direction === 'left') {
        wrapper.scrollLeft -= scrollAmount;
    } else {
        wrapper.scrollLeft += scrollAmount;
    }
}

function toggleView() {
    const panel = document.getElementById('moreMembers');
    const txt = document.getElementById('btnTxt');
    const icon = document.getElementById('btnIcon');

    panel.classList.toggle('active');

    if (panel.classList.contains('active')) {
        txt.innerText = "সংক্ষেপে দেখুন";
        icon.style.transform = "rotate(180deg)";
    } else {
        txt.innerText = "আরো ৮ জন সদস্য দেখুন";
        icon.style.transform = "rotate(0deg)";
    }
}

function openOrgModal(title, membersArray) {
    const modal = document.getElementById('orgModal');
    const modalTitle = document.getElementById('modalTitle');
    const modalBody = document.getElementById('modalBody');

    modalTitle.innerText = title;
    
    // কার্ড লেআউট জেনারেট করা
    let htmlContent = '<div class="modal-member-list">';
    
    membersArray.forEach(member => {
        // নামের প্রথম অক্ষর আইকন হিসেবে ব্যবহারের জন্য
        const firstLetter = member.name.charAt(0); 
        
        htmlContent += `
            <div class="modal-member-card">
                <div class="member-avatar">${firstLetter}</div>
                <div class="member-info-text">
                    <span class="m-name">${member.name}</span>
                    <span class="m-pos">${member.position}</span>
                </div>
            </div>
        `;
    });
    
    htmlContent += '</div>';
    
    modalBody.innerHTML = htmlContent;
    modal.style.display = "flex";
}

function closeOrgModal() {
    const modal = document.getElementById('orgModal');
    modal.style.display = "none";
}

// মোডালের বাইরে ক্লিক করলে বন্ধ হবে
window.onclick = function(event) {
    const modal = document.getElementById('orgModal');
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
function filterSelection(category) {
    const items = document.querySelectorAll('.activity-item');
    const buttons = document.querySelectorAll('.filter-btn');

    // বাটন একটিভ স্টেট পরিবর্তন
    buttons.forEach(btn => {
        btn.classList.remove('active');
        if(btn.innerText.toLowerCase().includes(category) || (category === 'all' && btn.innerText === 'সবগুলো')) {
            btn.classList.add('active');
        }
    });

    // ফিল্টার লজিক
    items.forEach(item => {
        if (category === 'all') {
            item.style.display = 'block';
        } else {
            if (item.classList.contains(category)) {
                item.style.display = 'block';
            } else {
                item.style.display = 'none';
            }
        }
    });
}
document.addEventListener('DOMContentLoaded', function() {
    const playOverlays = document.querySelectorAll('.play-overlay');

    playOverlays.forEach(overlay => {
        overlay.addEventListener('click', function() {
            const iframe = this.previousElementSibling; // iframe ট্যাগ
            if (iframe && iframe.tagName === 'IFRAME') {
                const src = iframe.src;
                // 'autoplay=1' যোগ করা
                if (src.indexOf('autoplay=1') === -1) {
                    iframe.src += (src.indexOf('?') > -1 ? '&' : '?') + 'autoplay=1';
                }
                this.style.display = 'none'; // প্লে বাটন সরিয়ে দেওয়া
            }
        });
    });
});