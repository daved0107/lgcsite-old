<div class="home-section space section-callout">
    <div class="home-section-bg section-color-bg section-callout-bg"></div>
    <div class="container">
        <div class="row">
            <div class="col-sm-8 col-xs-12 text-sm-left text-center"> 
                <h2 class="section-title"><?php echo esc_html(get_theme_mod('scope_home_callout_text')); ?></h2>
            </div>
            <?php $link = get_theme_mod('scope_home_callout_link'); if($link): ?>
            <div class="col-sm-4 col-xs-12 text-center">
                <a href="<?php echo esc_url($link); ?>" class="btn btn-read-more"><?php echo esc_html(get_theme_mod('scope_home_callout_label')); ?></a>
            </div>
            <?php endif; ?>
        </div>
    </div>
</div>