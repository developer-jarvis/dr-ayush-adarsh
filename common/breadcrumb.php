<?php
// Breadcrumb & Hero Section Component
// Usage: Include this file after passing breadcrumb data and page info
// Example: $breadcrumbs = [
//     ['label' => 'Home', 'url' => 'index.php'],
//     ['label' => 'Services', 'url' => 'services.php'],
//     ['label' => 'Hair Transplant', 'url' => null]
// ];
// $pageTitle = "Hair Transplant";
// $pageSubtitle = "Advanced Hair Restoration Techniques";
// include 'common/breadcrumb.php';
?>

<section class="breadcrumb-hero-section"
    style="background-image: url('assets/images/banner/banner-1.jpg'); background-size: cover; background-position: center; background-attachment: fixed; position: relative; padding: 80px 0; min-height: 350px; display: flex; flex-direction: column; justify-content: center;">
    <!-- Background Overlay for better text readability -->
    <div
        style="position: absolute; top: 0; left: 0; right: 0; bottom: 0; background: linear-gradient(135deg, rgba(0, 0, 0, 0.8) 0%, rgba(0, 0, 0, 0.8) 100%); z-index: 1;">
    </div>

    <!-- Content Wrapper -->
    <div style="position: relative; z-index: 2;">
        <div class="container">
            <!-- Page Title & Subtitle -->
            <div style="text-align: center; margin-bottom: 40px;">
                <?php if (isset($pageTitle)): ?>
                <h1
                    style="font-size: 48px; font-weight: 700; color: #fff; margin-bottom: 10px; text-shadow: 2px 2px 4px rgba(0,0,0,0.2); animation: fadeInDown 0.6s ease-out;">
                    <?php echo htmlspecialchars($pageTitle); ?>
                </h1>
                <?php endif; ?>
                <?php if (isset($pageSubtitle)): ?>
                <p
                    style="font-size: 18px; color: rgba(255,255,255,0.9); font-weight: 500; text-shadow: 1px 1px 3px rgba(0,0,0,0.2); animation: fadeInUp 0.6s ease-out;">
                    <?php echo htmlspecialchars($pageSubtitle); ?>
                </p>
                <?php endif; ?>
            </div>

            <!-- Breadcrumb Navigation -->
            <nav class="breadcrumb-nav" aria-label="breadcrumb" style="margin-bottom: 0;">
                <ol class="breadcrumb-list" style="justify-content: center; gap: 20px; flex-wrap: wrap;">
                    <?php 
                    if (isset($breadcrumbs) && is_array($breadcrumbs)) {
                        foreach ($breadcrumbs as $index => $crumb):
                            $isLast = ($index === count($breadcrumbs) - 1);
                    ?>
                    <li class="breadcrumb-item <?php echo $isLast ? 'active' : ''; ?>"
                        style="display: flex; align-items: center; gap: 8px;">
                        <?php if (!$isLast && isset($crumb['url'])): ?>
                        <a href="<?php echo $baseUrl . $crumb['url']; ?>" class="breadcrumb-link"
                            style="color: rgba(255,255,255,0.9); text-decoration: none; font-size: 14px; transition: color 0.3s ease;">
                            <span><?php echo htmlspecialchars($crumb['label']); ?></span>
                        </a>
                        <?php else: ?>
                        <span class="breadcrumb-text" style="color: rgba(255,255,255,0.7); font-size: 14px;">
                            <?php echo htmlspecialchars($crumb['label']); ?>
                        </span>
                        <?php endif; ?>
                        <?php if (!$isLast): ?>
                        <span class="breadcrumb-separator" style="color: rgba(255,255,255,0.7); font-size: 12px;">
                            <i class="fa-solid fa-chevron-right"></i>
                        </span>
                        <?php endif; ?>
                    </li>
                    <?php 
                        endforeach;
                    }
                    ?>
                </ol>
            </nav>
        </div>
    </div>

    <!-- Call Button (Floating) -->
    <div style="position: absolute; right: 20px; top: 50%; transform: translateY(-50%); z-index: 3;">
        <a href="tel:+919113300981" class="breadcrumb-call-btn" title="Call Now"
            style="display: flex; align-items: center; justify-content: center; gap: 8px; background: #fff; color: #e91e63; padding: 12px 24px; border-radius: 50px; font-weight: 600; text-decoration: none; box-shadow: 0 4px 15px rgba(0,0,0,0.2); transition: all 0.3s ease; font-size: 14px;">
            <i class="fa-solid fa-phone" style="font-size: 16px;"></i>
            <span>Call Me</span>
        </a>
    </div>
</section>

<style>
@keyframes fadeInDown {
    from {
        opacity: 0;
        transform: translateY(-20px);
    }

    to {
        opacity: 1;
        transform: translateY(0);
    }
}

@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(20px);
    }

    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.breadcrumb-call-btn:hover {
    background: #e91e63 !important;
    color: #fff !important;
    box-shadow: 0 6px 20px rgba(233, 30, 99, 0.4) !important;
    transform: translateY(-50%) scale(1.05) !important;
}

.breadcrumb-link:hover {
    color: #fff !important;
    text-decoration: underline !important;
}

@media (max-width: 768px) {
    .breadcrumb-hero-section {
        padding: 60px 0;
        min-height: 280px;
    }

    .breadcrumb-hero-section h1 {
        font-size: 32px !important;
    }

    .breadcrumb-hero-section p {
        font-size: 14px !important;
    }

    .breadcrumb-call-btn {
        padding: 10px 16px !important;
        font-size: 12px !important;
    }

    .breadcrumb-list {
        gap: 12px !important;
    }
}
</style>