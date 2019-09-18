<?php 
    if(function_exists('themefarmer_companion')): 

    $image = get_theme_mod('themefarmer_home_about_background');
    $background = '';
    if(!empty($image)){
        $background = 'background-image: url('. esc_url($image) .')';
    }
?><div class="home-section space section-about">
    <div class="home-section-bg section-about-bg" style="<?php echo $background; ?>"></div>
    <div class="container">
        <div class="row section-details about-details">
            <div class="col">
                <div class="section-heading color-light text-left">
                    <h2 class="section-title"><?php echo esc_html(get_theme_mod('themefarmer_home_about_heading')); ?></h2>
                    <p class="section-description"><?php echo esc_html(get_theme_mod('themefarmer_home_about_desc')); ?></p>
                </div>
            </div>
            <?php $ab_image = get_theme_mod('themefarmer_home_about_image'); if(!empty($ab_image)): ?>
            <div class="col">
                <img src="<?php echo esc_url($ab_image); ?>" class="img-fluid">
            </div>
            <?php endif; ?>
        </div>
        <?php do_action('scope_after_about_us_section'); ?>        
    </div>
</div>
<?php endif; ?>