<section class="hero-modern-business" aria-label="Business Hero Section">
    <div class="hero-modern-business__container">

        <div class="hero-modern-business__image-wrapper">
            <img src="<?= base_url('./assets/uploads/project/management_img/' . $managment_info['image']) ?>"
                loading="lazy" alt="Modern business team collaborating in a bright office"
                class="hero-modern-business__image" />
        </div>
        <div class="hero-modern-business__content">

            <h1 class="hero-modern-business__title">
                <?= $managment_info['name'] ?? 'Management সদস্য' ?>
                <!-- <br class="hero-modern-business__br" /> with Smart Solutions -->
            </h1>
            <span class="hero-modern-business__badge">
                <?= $managment_info['designation'] ?? '' ?>
            </span>
            <p class="hero-modern-business__desc">
                <?= $managment_info['details'] ?>
            </p>


        </div>

    </div>
</section>

<link href="https://fonts.maateen.me/noto-sans-bengali/font.css" rel="stylesheet">


<style>
    .hero-modern-business__desc {
        text-align: justify;
        text-justify: inter-word;
        line-height: 1.8;
    }

    .hero-modern-business__image-wrapper {
        width: 100%;
        max-width: 450px;
        height: 100%;
        overflow: hidden;
        border-radius: 12px;
    }

    .hero-modern-business__image {
        width: 100%;
        height: 100%;
        object-fit: cover;
        object-position: top;
        display: block;
    }

    @media (max-width: 768px) {
        .hero-modern-business__image-wrapper {
            height: 250px;
        }
    }

    @media (max-width: 480px) {
        .hero-modern-business__image-wrapper {
            height: 220px;
        }
    }






    :root {
        --primary-color: #4f46e5;
        /* indigo-600 */
        --primary-color-dark: #4338ca;
        /* indigo-700 */
        --primary-bg: #f1f5f9;
        /* slate-50 */
        --primary-text: #0f172a;
        /* slate-900 */
        --secondary-text: #475569;
        /* slate-600 */
        --badge-bg: #e0e7ff;
        /* indigo-100 */
        --badge-text: #4338ca;
        /* indigo-700 */
        --button-border: #e0e7ff;
        /* indigo-200 */
        --button-hover-bg: #eef2ff;
        /* indigo-50 */
        --button-focus: #a5b4fc;
        /* indigo-200 */
        --button-focus-solid: #4338ca;
        /* indigo-400 */
        --star-color: #facc15;
        /* yellow-400 */
        --img-border: #e2e8f0;
        /* slate-200 */
        --shadow-lg: 0 10px 15px -3px rgba(16, 24, 40, 0.1), 0 4px 6px -4px rgba(16, 24, 40, 0.1);
        --shadow-sm: 0 1px 2px 0 rgba(16, 24, 40, 0.05);
        --font-sans: ui-sans-serif, system-ui, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
        --radius-lg: 0.5rem;
        --radius-full: 9999px;
        --transition: 0.2s cubic-bezier(0.4, 0, 0.2, 1);
    }

    * {
        box-sizing: border-box;
        margin: 0;
        padding: 0;
        font-family: var(--font-sans);
    }

    .hero-modern-business {
        width: 100%;
        background: var(--primary-bg);
        font-family: var(--font-sans);
        font-size: 16px;
        padding: 3rem 1rem;
    }

    @media (min-width: 640px) {
        .hero-modern-business {
            padding-left: 2rem;
            padding-right: 2rem;
        }
    }

    @media (min-width: 768px) {
        .hero-modern-business {
            padding-top: 5rem;
            padding-bottom: 5rem;
        }
    }

    .hero-modern-business__container {
        max-width: 80rem;
        margin: 0 auto;
        display: flex;
        flex-direction: column;
        gap: 2rem;
        align-items: center;
    }

    @media (min-width: 768px) {
        .hero-modern-business__container {
            flex-direction: row;
            gap: 4rem;
            align-items: stretch;
        }
    }

    .hero-modern-business__content {
        width: 100%;
        display: flex;
        flex-direction: column;
        align-items: flex-start;
        justify-content: center;
        text-align: left;
    }

    @media (min-width: 768px) {
        .hero-modern-business__content {
            width: 50%;
        }
    }

    .hero-modern-business__badge {
        display: inline-block;
        padding: 0.25rem 1rem;
        margin-bottom: 1rem;
        border-radius: var(--radius-full);
        background: var(--badge-bg);
        color: var(--badge-text);
        font-size: 0.875rem;
        font-weight: 500;
        letter-spacing: 0.025em;
        box-shadow: var(--shadow-sm);
    }

    .hero-modern-business__title {
        font-size: 1.875rem;
        font-weight: 800;
        color: var(--primary-text);
        line-height: 1;
        margin-bottom: 1.5rem;
    }

    @media (min-width: 640px) {
        .hero-modern-business__title {
            font-size: 2.25rem;
        }
    }

    @media (min-width: 768px) {
        .hero-modern-business__title {
            font-size: 3rem;
        }
    }

    .hero-modern-business__desc {
        font-size: 1.125rem;
        color: var(--secondary-text);
        margin-bottom: 2rem;
        max-width: 40rem;
    }

    @media (min-width: 640px) {
        .hero-modern-business__desc {
            font-size: 1.25rem;
        }
    }

    .hero-modern-business__actions {
        display: flex;
        flex-direction: row;
        gap: 1rem;
        margin-bottom: 1rem;
    }

    .hero-modern-business__button {
        display: inline-block;
        padding: 0.75rem 1.5rem;
        border-radius: var(--radius-lg);
        font-size: 1rem;
        font-weight: 600;
        box-shadow: var(--shadow-lg);
        border: none;
        outline: none;
        cursor: pointer;
        transition: background var(--transition), color var(--transition), border-color var(--transition);
        text-decoration: none;
        position: relative;
    }

    .hero-modern-business__button--primary {
        background: var(--primary-color);
        color: #fff;
    }

    .hero-modern-business__button--primary:hover,
    .hero-modern-business__button--primary:focus {
        background: var(--primary-color-dark);
    }

    .hero-modern-business__button--primary:focus {
        box-shadow: 0 0 0 2px var(--button-focus-solid), 0 0 0 4px #fff;
    }

    .hero-modern-business__button--secondary {
        background: #fff;
        color: var(--primary-color);
        border: 1px solid var(--button-border);
    }

    .hero-modern-business__button--secondary:hover,
    .hero-modern-business__button--secondary:focus {
        background: var(--button-hover-bg);
        color: var(--primary-color-dark);
        border-color: var(--primary-color-dark);
    }

    .hero-modern-business__button--secondary:focus {
        box-shadow: 0 0 0 2px var(--button-focus), 0 0 0 4px #fff;
    }

    .hero-modern-business__avatars {
        display: flex;
        align-items: center;
        gap: 1rem;
        max-width: 64rem;
        padding: 1rem 0;
        justify-content: center;
    }

    .hero-modern-business__avatar-group {
        display: flex;
        align-items: center;
    }

    .hero-modern-business__avatar {
        width: 2.5rem;
        height: 2.5rem;
        border-radius: var(--radius-full);
        border: 2px solid #fff;
        object-fit: cover;
        margin-right: -0.75rem;
        box-shadow: 0 0 0 1px var(--img-border);
        background: #fff;
    }

    .hero-modern-business__rating {
        display: flex;
        flex-direction: column;
        gap: 0.25rem;
    }

    .hero-modern-business__stars {
        display: flex;
        align-items: center;
        gap: 0.25rem;
    }

    .hero-modern-business__star {
        width: 1.25rem;
        height: 1.25rem;
        color: var(--star-color);
        display: inline-block;
    }

    .hero-modern-business__rating-text {
        font-size: 0.875rem;
    }

    .hero-modern-business__rating-text .font-semibold {
        font-weight: 600;
    }

    .hero-modern-business__image-wrapper {
        width: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 2rem;
    }

    @media (min-width: 768px) {
        .hero-modern-business__image-wrapper {
            width: 50%;
            margin-bottom: 0;
            align-items: center;
        }
    }

    .hero-modern-business__image {
        border-radius: 0.75rem;
        box-shadow: var(--shadow-lg);
        border: 1px solid var(--img-border);
        object-fit: cover;
        width: 100%;
        height: auto;
        max-height: 22.5rem;
        background: #fff;
        display: block;
    }
</style>