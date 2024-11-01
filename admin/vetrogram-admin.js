(function($) {
    $(document).ready(function() {
        $('.vtg-admin-tabs-title li').click(function() {
            $('.vtg-admin-tabs-title li').removeClass('active')
            $(this).addClass('active');
            $('.vtg-admin-tab-content').hide();
            $('.vtg-admin-tab-' + $(this).attr('data-tab')).show();
        });
        $('.vtg-admin-shortcode-box').on("click", function() {
            $(this).select();
        });
        vtgCreateShortCode();
        vtgManageOptions('show_post_details', '.vtg-admin-post-details-subsection');
        vtgManageOptions('show_profile', '.vtg-admin-tabs-title li[data-tab="profile"], .vtg-admin-tab-profile .vtg-admin-columns');
        vtgManageOptions('show_avatar', '.vtg-admin-avatar-subsection');
        vtgManageOptions('show_name', '.vtg-admin-name-subsection');
        vtgManageOptions('show_bio', '.vtg-admin-bio-subsection');
        vtgManageOptions('show_website', '.vtg-admin-website-subsection');
        vtgManageOptions('show_statistic', '.vtg-admin-statistic-subsection');
        vtgManageOptions('enable_pagination', '.vtg-admin-tabs-title li[data-tab="pagination"], .vtg-admin-tab-pagination .vtg-admin-columns');
        vtgManageOptions('pagination_style', '.vtg-admin-load-more-button-subsection', 'load-more-button');
        $('input.vtg-admin-textfield').keyup(function() {
            vtgCreateShortCode()
        });
        $('select.vtg-admin-textfield').change(function() {
            vtgCreateShortCode()
        });
        $('.vtg-admin-color').wpColorPicker({
            change: function() {
                vtgCreateShortCode();
            },
        });
    });

    function vtgCreateShortCode() {
        var shortcodeArray = [];
        $('.vtg-admin-option:not(.vtg-admin-hide)').each(function() {
            var value = $(this).val();
            if (value != '') {
                shortcodeArray.push($(this).attr('data-option') + '="' + value + '"');
            }
        });
        $('.vtg-admin-shortcode-box').html('[vetrogram ' + shortcodeArray.join(' ') + ']');
    }

    function vtgManageOptions(option, selector, value = null) {
        option = $('.vtg-admin-option[data-option="' + option + '"]');
        selector = $(selector);
        value = value != null ? value : 'yes';
        option.change(function() {
            if (option.val() == value) {
                selector.show();
                selector.find('.vtg-admin-option').removeClass('vtg-admin-hide');
            } else {
                selector.hide();
                selector.find('.vtg-admin-option').addClass('vtg-admin-hide');
            }
        })
    }
}(jQuery));
