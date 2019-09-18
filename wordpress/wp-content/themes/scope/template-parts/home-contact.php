<?php if(function_exists('themefarmer_companion')): ?>
<div class="home-section space section-contact">
    <div class="home-section-bg section-contact-bg"></div>
    <div class="container">
        <div class="section-heading color-light">
            <h2 class="section-title"><?php echo esc_html(get_theme_mod('themefarmer_home_contact_heading')); ?></h2>
            <p class="section-description"><?php echo esc_html(get_theme_mod('themefarmer_home_contact_desc')); ?></p>
        </div>
        <div class="section-details contact-details">
            <div class="contact-details-inner">
                <div class="row">
                    <div class="col-md-6">
                        <div class="other-contact-info">
                            <div class="contact-info-block">
                                <h3 class="contact-info-location-label"><?php echo esc_html(get_theme_mod('themefarmer_home_contact_location_label')); ?></h3>
                                <div class="contact-info-location-details">
                                    <?php echo wp_kses_post(get_theme_mod('themefarmer_home_contact_location_details')); ?>
                                </div>
                            </div>
                            <div class="contact-info-block">
                                <h3 class="contact-info-location-label"><?php echo esc_html(get_theme_mod('themefarmer_home_contact_us_label')); ?></h3>
                                <div class="contact-info-location-details">
                                    <?php echo wp_kses_post(get_theme_mod('themefarmer_home_contact_us_details')); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="scope-contact-form">
                        <h3 class="form-title"><?php echo esc_html(get_theme_mod('themefarmer_home_contact_form_heading')); ?></h3>
                        <?php 
                            if(function_exists('themefarmer_get_simple_contact_form')){
                                themefarmer_get_simple_contact_form();
                            }
                        ?>
                        </div>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
</div>
<?php endif; ?>