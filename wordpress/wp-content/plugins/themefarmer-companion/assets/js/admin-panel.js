jQuery(document).ready(function($) {

	function themefarmer_update_menu_icons(){
		$('li.menu-item').each(function(index, el) {
			var icon = $(this).find('input.menu-item-icon-field').val();
			var $icon_changer = $(this).find('span.tf-change-menu-icon');
			if($icon_changer.length){
				if(icon){
					$icon_changer.html('<i class="tf-menu-icon-show '+icon+'"></i>');
				}else{
					$icon_changer.html('<i class="tf-menu-icon-show dashicons dashicons-plus"></i>');
				}
			}else{
				if(icon){
					$(this).find('span.menu-item-title').before('<span class="tf-change-menu-icon"><i class="tf-menu-icon-show '+icon+'"></i></sapn>');
				}else{
					$(this).find('span.menu-item-title').before('<span class="tf-change-menu-icon"><i class="tf-menu-icon-show dashicons dashicons-plus"></i></sapn>');
				}
			}
		});


		$('#menu-to-edit > li.menu-item.menu-item-depth-0').each(function(index, el) {
			var switch_html = '<span class="themefarmer-admin-menu-switch"><label class="switch"><input class="themefarmer-mega-menu-checkbox" type="checkbox" value="1"><span class="slider"></span></label>Mega Menu</span>';
			var $switch_obj = $('<span/>').html(switch_html).contents();
			var $menu_title = $(this).find('.item-title');
			var is_switch = $menu_title.find('.themefarmer-admin-menu-switch').length;
			var $class_input = $(this).find('input[type=text].edit-menu-item-classes');
			var menu_item_classes = ""+$class_input.val();
			console.log(menu_item_classes);
			
			if(menu_item_classes.indexOf('tf-mega-menu') >= 0){
				// console.log($switch_obj.find('input[type=checkbox]').is(':checked'));
				$switch_obj.find('input[type="checkbox"]').prop('checked', true);
				// console.log($switch_obj.find('input[type=checkbox]').is(':checked'));
			}else{
				$switch_obj.find('input[type="checkbox"]').prop('checked', false);
			}

			if(is_switch <= 0){
				$menu_title.append($switch_obj);
			}

		});
	}
	themefarmer_update_menu_icons();


	$(document).on('change', '.themefarmer-mega-menu-checkbox', function(event) {
		var $class_input = $(this).parents('li.menu-item').find('input[type=text].edit-menu-item-classes');	
		$class_input.val($class_input.val().replace('tf-mega-menu', '').trim());
		if($(this).is(':checked')){
			if($class_input.val()){
				$class_input.val($class_input.val()+' tf-mega-menu');
			}else{
				$class_input.val('tf-mega-menu');
			}
		}

	});


	$(document).on('click', '.tf-change-menu-icon', function(event) {
		event.preventDefault();
		$('#themefarmer-icon-panel').show();
	});


	var observer = new MutationObserver(function(mutations) {
	    mutations.forEach(function(mutation) {
	        console.log(mutation);
	        $(mutation.addedNodes).each(function(index, val) {
	        	 if($(this).is('li.menu-item')){
	        	 	console.log('found');
	        		themefarmer_update_menu_icons();
	        	 }
	        });

	    });
	});

	// configuration of the observer:
	var config = {childList: true}
	var target = document.querySelector('#menu-to-edit.menu.ui-sortable');
	// pass in the target node, as well as the observer options
	observer.observe(target, config);

	/*jQuery(document).on('DOMNodeInserted', '#menu-to-edit.menu.ui-sortable', function (event) {
        event.stopPropagation();
        // console.log(event);
        themefarmer_update_menu_icons();
    });*/

    var $the_menu_item;
    $(document).on('click', '.tf-change-menu-icon', function(event) {
    	event.preventDefault();
    	$the_menu_item = $(this).parents('li.menu-item');
    	$('.themefarmer-basic-icon-panel-overlay').show();
    });

    $(document).on('click', '.themefarmer-icon-picker', function(event) {
    	event.preventDefault();
    	if($the_menu_item.length){
    		var icon_class = $(this).data('icon');
    		$the_menu_item.find('.menu-item-icon-field').val(icon_class);
    		themefarmer_update_menu_icons();
    	}
    	$('.themefarmer-basic-icon-panel-overlay').hide();
    });

    $(document).on('click', '.themefarmer-basic-icon-panel .media-modal-close', function(event) {
    	event.preventDefault();
    	$(this).parents('.themefarmer-basic-icon-panel-overlay').hide();
    });

    $(document).on('keyup change', '#tf-search-menu-icon', function(event) {
    	var val = $(this).val();
	    setTimeout(function(){
    		var newval = $('#tf-search-menu-icon').val();
    		if(newval == val){
    			$('.themefarmer-icon-picker').hide();
	    		$('.themefarmer-icon-picker').each(function(index, el) {
		    		var icon_string = ""+$(this).data('icon');
		    		if(icon_string.indexOf(val) >= 0){
		    			$(this).show();
		    		}
		    	});
	    	}
    	},500);
    	if(val === ''){
    		$('.themefarmer-icon-picker').show();
    	}
    });

});