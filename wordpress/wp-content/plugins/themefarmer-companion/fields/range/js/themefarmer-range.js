wp.customize.controlConstructor['themefarmer-range'] = wp.customize.Control.extend({

    ready: function() {
        'use strict';
        var control = this;
        var container = this.container;
        var responsive = control.params.responsive;

        // control.updateValue();
        
        container.on('input change', '.themefarmer-range-slider', function(event) {
            event.stopPropagation();
            // console.log('range');
            var value = $(this).val();
            $(this).siblings('.themefarmer-range-value').val(value);
            control.updateValue();

        });

        container.on('input change', '.themefarmer-range-value', function(event) {
            var value = $(this).val();
            // console.log('value');
            $(this).siblings('.themefarmer-range-slider').val(value);
            control.updateValue();
        });


        container.on('click', '.range-slider-reset', function(event) {
            var value = $(this).data('value');
            $(this).siblings('.themefarmer-range-slider').val(value);
            $(this).siblings('.themefarmer-range-value').val(value).trigger('change');
        });

        container.on('click', '.themefarmer-device-controls button', function(event) {
            var device = $(this).data('device');
            $(this).parent().siblings('.themefarmer-range-slider-controls-con').find('.themefarmer-range-slider-controls').removeClass('active');
            $(this).parent().siblings('.themefarmer-range-slider-controls-con').find('.themefarmer-range-slider-controls.range-slider-' + device).addClass('active');
            $(document).find('.themefarmer-device-controls').children('button').removeClass('active');
            $(document).find('.themefarmer-device-controls').children('button.preview-' + device).addClass('active');
            $('.wp-full-overlay-footer .devices').find('button.preview-' + device).trigger('click');
        });
    },
    updateValue: function() {
        // console.log('change range');
        var values = {};
        var container = this.container;
        var responsive = this.params.responsive;
        var data_collector = container.find('.themefarmer-range-data');
        var data_setting = this.setting;
        // console.log('responsive', responsive)
        if (responsive === true) {
            var desk_selector = container.find('.themefarmer-range-slider[data-device=desktop]');
            var tabl_selector = container.find('.themefarmer-range-slider[data-device=tablet]');
            var mobl_selector = container.find('.themefarmer-range-slider[data-device=mobile]');
            if (desk_selector.length) {
                values.desktop = parseInt(desk_selector.val());
            }
            if (tabl_selector.length) {
                values.tablet = parseInt(tabl_selector.val());
            }
            if (mobl_selector.length) {
                values.mobile = parseInt(mobl_selector.val());
            }
            // console.log('obj', values);
            data_setting.set(values);
        } else {
            var value = parseInt(container.find('.themefarmer-range-slider').val());
            // console.log(value);
            data_setting.set(value);
        }
        // console.log(this.setting.transport);
        if(this.setting.transport !== 'postMessage'){
            data_collector.trigger('change');
        }
    }

});