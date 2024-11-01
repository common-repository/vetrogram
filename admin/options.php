<?php
function vtg_shortcode_generator()
{
	$font_weights.='<option value="">---</option>';
	$font_weights.='<option value="100">100</option>';
	$font_weights.='<option value="200">200</option>';
	$font_weights.='<option value="300">300</option>';
	$font_weights.='<option value="400">400</option>';
	$font_weights.='<option value="500">500</option>';
	$font_weights.='<option value="600">600</option>';
	$font_weights.='<option value="700">700</option>';
	$font_weights.='<option value="800">800</option>';
	$font_weights.='<option value="900">900</option>';
	$text_transforms.='<option value="">---</option>';
	$text_transforms.='<option value="uppercase">'.__('Uppercase', 'vetrogram').'</option>';
	$text_transforms.='<option value="lowercase">'.__('Lowercase', 'vetrogram').'</option>';
	$text_transforms.='<option value="capitalize">'.__('Capitalize', 'vetrogram').'</option>';
	?>
         
	<div class="vtg-admin-wrapper">
	    <h2 class="vtg-admin-heading"><?php _e('Shortcode Generator','vetrogram'); ?></h2>
	    <ul class="vtg-admin-tabs-title">
	        <li data-tab="general" class="active">
	            <?php _e( 'General', 'vetrogram'); ?>
	        </li>
	        <li data-tab="design">
	            <?php _e( 'Design', 'vetrogram'); ?>
	        </li>
	        <li data-tab="profile">
	            <?php _e( 'Profile', 'vetrogram'); ?>
	        </li>
	        <li data-tab="pagination">
	            <?php _e( 'Pagination', 'vetrogram'); ?>
	        </li>
	    </ul>
	    <div class="vtg-admin-tabs-content">
	        <div class="vtg-admin-tab-content vtg-admin-tab-general">
	            <div class="vtg-admin-clearfix vtg-admin-columns">
	                <div class="vtg-admin-column vtg-column-one-third">
	                    <label class="vtg-admin-label">
	                        <?php _e( 'Username', 'vetrogram'); ?>
	                    </label>
	                    <input type="text" class="vtg-admin-textfield vtg-admin-option" data-option="username">
	                </div>
	                <div class="vtg-admin-column vtg-column-one-third">
	                    <label class="vtg-admin-label">
	                        <?php _e( 'Posts Per Page', 'vetrogram'); ?>
	                    </label>
	                    <input type="text" class="vtg-admin-textfield vtg-admin-option" data-option="posts_per_page">
	                </div>
	                <div class="vtg-admin-column vtg-column-one-third">
	                    <label class="vtg-admin-label">
	                        <?php _e( 'Style', 'vetrogram'); ?>
	                    </label>
	                    <select class="vtg-admin-textfield vtg-admin-option" data-option="style">
	                        <option value="default">
	                            <?php _e( 'Grid', 'vetrogram'); ?>
	                        </option>
	                        <option value="masonry">
	                            <?php _e( 'Masonry', 'vetrogram'); ?>
	                        </option>
	                    </select>
	                </div>
	                <div class="vtg-admin-column vtg-column-one-third">
	                    <label class="vtg-admin-label">
	                        <?php _e( 'Columns', 'vetrogram'); ?>
	                    </label>
	                    <select class="vtg-admin-textfield vtg-admin-option" data-option="column">
	                        <option value="one-column">
	                            <?php _e( '1 Column', 'vetrogram'); ?>
	                        </option>
	                        <option value="two-column">
	                            <?php _e( '2 Column', 'vetrogram'); ?>
	                        </option>
	                        <option value="three-column">
	                            <?php _e( '3 Column', 'vetrogram'); ?>
	                        </option>
	                        <option selected="selected" value="four-column">
	                            <?php _e( '4 Column', 'vetrogram'); ?>
	                        </option>
	                        <option value="five-column">
	                            <?php _e( '5 Column', 'vetrogram'); ?>
	                        </option>
	                    </select>
	                </div>
	                <div class="vtg-admin-column vtg-column-one-third">
	                    <label class="vtg-admin-label">
	                        <?php _e( 'Margin Between Columns', 'vetrogram'); ?>
	                    </label>
	                    <input type="text" class="vtg-admin-textfield vtg-admin-option" data-option="column_margin">
	                </div>
	                <div class="vtg-admin-column vtg-column-one-third">
	                    <label class="vtg-admin-label">
	                        <?php _e( 'Show Profile Section?', 'vetrogram'); ?>
	                    </label>
	                    <select class="vtg-admin-textfield vtg-admin-option" data-option="show_profile">
	                        <option value="yes">
	                            <?php _e( 'Yes', 'vetrogram'); ?>
	                        </option>
	                        <option value="no">
	                            <?php _e( 'No', 'vetrogram'); ?>
	                        </option>
	                    </select>
	                </div>
	                <div class="vtg-admin-column vtg-column-one-third">
	                    <label class="vtg-admin-label">
	                        <?php _e( 'Enable Pagination?', 'vetrogram'); ?>
	                    </label>
	                    <select class="vtg-admin-textfield vtg-admin-option" data-option="enable_pagination">
	                        <option value="yes">
	                            <?php _e( 'Yes', 'vetrogram'); ?>
	                        </option>
	                        <option value="no">
	                            <?php _e( 'No', 'vetrogram'); ?>
	                        </option>
	                    </select>
	                </div>
	                <div class="vtg-admin-column vtg-column-one-third">
	                    <label class="vtg-admin-label">
	                        <?php _e( 'CSS Class', 'vetrogram'); ?>
	                    </label>
	                    <input type="text" class="vtg-admin-textfield vtg-admin-option" data-option="css_class">
	                </div>
	            </div>
	        </div>
	        <div class="vtg-admin-tab-content vtg-admin-tab-design">
	            <div class="vtg-admin-clearfix vtg-admin-columns">
	                <div class="vtg-admin-column vtg-column-one-third">
	                    <label class="vtg-admin-label">
	                        <?php _e( 'Show Post Details?(on hover)', 'vetrogram'); ?>
	                    </label>
	                    <select class="vtg-admin-textfield vtg-admin-option" data-option="show_post_details">
	                        <option value="yes">
	                            <?php _e( 'Yes', 'vetrogram'); ?>
	                        </option>
	                        <option value="no">
	                            <?php _e( 'No', 'vetrogram'); ?>
	                        </option>
	                    </select>
	                </div>
	                <div class="vtg-admin-column vtg-column-one-third">
	                    <label class="vtg-admin-label">
	                        <?php _e( 'Post Border Radius', 'vetrogram'); ?>
	                    </label>
	                    <input type="text" class="vtg-admin-textfield vtg-admin-option" data-option="post_border_radius">
	                </div>
	                <div class="vtg-admin-subsection vtg-admin-post-details-subsection vtg-admin-clearfix">
	                    <h4 class="vtg-admin-heading"><?php _e('Post Details','vetrogram'); ?></h4>
	                    <div class="vtg-admin-column vtg-column-one-third">
	                        <label class="vtg-admin-label">
	                            <?php _e( 'Post Cover Color', 'vetrogram'); ?>
	                        </label>
	                        <input type="text" class="color-picker vtg-admin-color vtg-admin-option" data-alpha="true" data-option="post_cover_color" />
	                    </div>
	                    <div class="vtg-admin-column vtg-column-one-third">
	                        <label class="vtg-admin-label">
	                            <?php _e( 'Post Cover Border Size(px)', 'vetrogram'); ?>
	                        </label>
	                        <input type="text" class="vtg-admin-textfield vtg-admin-option" data-option="post_cover_border_size">
	                    </div>
	                    <div class="vtg-admin-column vtg-column-one-third">
	                        <label class="vtg-admin-label">
	                            <?php _e( 'Post Cover Border Color', 'vetrogram'); ?>
	                        </label>
	                        <input type="text" class="color-picker vtg-admin-color vtg-admin-option" data-alpha="true" data-option="post_cover_border_color" />
	                    </div>
	                    <div class="vtg-admin-column vtg-column-one-third">
	                        <label class="vtg-admin-label">
	                            <?php _e( 'Font Family', 'vetrogram'); ?>
	                        </label>
	                        <select class="vtg-admin-textfield vtg-admin-option" data-option="post_details_number_font_family">
	                            <option value="">---</option>
	                            <?php echo vtg_google_fonts();?>
	                        </select>
	                    </div>
	                    <div class="vtg-admin-column vtg-column-one-third">
	                        <label class="vtg-admin-label">
	                            <?php _e( 'Font Size(px)', 'vetrogram'); ?>
	                        </label>
	                        <input type="text" class="vtg-admin-textfield vtg-admin-option" data-option="post_details_number_font_size">
	                    </div>
	                    <div class="vtg-admin-column vtg-column-one-third">
	                        <label class="vtg-admin-label">
	                            <?php _e( 'Letter Spacing(px)', 'vetrogram'); ?>
	                        </label>
	                        <input type="text" class="vtg-admin-textfield vtg-admin-option" data-option="post_details_number_letter_spacing">
	                    </div>
	                    <div class="vtg-admin-column vtg-column-one-third">
	                        <label class="vtg-admin-label">
	                            <?php _e( 'Font Weight', 'vetrogram'); ?>
	                        </label>
	                        <select class="vtg-admin-textfield vtg-admin-option" data-option="post_details_number_font_weight">
	                            <?php echo $font_weights; ?>
	                        </select>
	                    </div>
	                    <div class="vtg-admin-column vtg-column-one-third">
	                        <label class="vtg-admin-label">
	                            <?php _e( 'Color', 'vetrogram'); ?>
	                        </label>
	                        <input type="text" class="color-picker vtg-admin-color vtg-admin-option" data-alpha="true" data-option="post_details_number_color" />
	                    </div>
	                    <div class="vtg-admin-clearfix"></div>
	                    <div class="vtg-admin-column vtg-column-one-third">
	                        <label class="vtg-admin-label">
	                            <?php _e( 'Icons Size(px)', 'vetrogram'); ?>
	                        </label>
	                        <input type="text" class="vtg-admin-textfield vtg-admin-option" data-option="post_details_icons_size">
	                    </div>
	                    <div class="vtg-admin-column vtg-column-one-third">
	                        <label class="vtg-admin-label">
	                            <?php _e( 'Icons Color', 'vetrogram'); ?>
	                        </label>
	                        <input type="text" class="color-picker vtg-admin-color vtg-admin-option" data-alpha="true" data-option="post_details_icons_color" />
	                    </div>
	                </div>
	            </div>
	        </div>
	        <div class="vtg-admin-tab-content vtg-admin-tab-profile">
	            <div class="vtg-admin-clearfix vtg-admin-columns">
	                <div class="vtg-admin-column vtg-column-one-third">
	                    <label class="vtg-admin-label">
	                        <?php _e( 'Profile Align', 'vetrogram'); ?>
	                    </label>
	                    <select class="vtg-admin-textfield vtg-admin-option" data-option="profile_align">
	                        <option value="left">
	                            <?php _e( 'Left', 'vetrogram'); ?>
	                        </option>
	                        <option value="center" selected="selected">
	                            <?php _e( 'Center', 'vetrogram'); ?>
	                        </option>
	                        <option value="right">
	                            <?php _e( 'Right', 'vetrogram'); ?>
	                        </option>
	                    </select>
	                </div>
	                <div class="vtg-admin-column vtg-column-one-third">
	                    <label class="vtg-admin-label">
	                        <?php _e( 'Show Avatar?', 'vetrogram'); ?>
	                    </label>
	                    <select class="vtg-admin-textfield vtg-admin-option" data-option="show_avatar">
	                        <option value="yes">
	                            <?php _e( 'Yes', 'vetrogram'); ?>
	                        </option>
	                        <option value="no">
	                            <?php _e( 'No', 'vetrogram'); ?>
	                        </option>
	                    </select>
	                </div>
	                <div class="vtg-admin-column vtg-column-one-third">
	                    <label class="vtg-admin-label">
	                        <?php _e( 'Show Name?', 'vetrogram'); ?>
	                    </label>
	                    <select class="vtg-admin-textfield vtg-admin-option" data-option="show_name">
	                        <option value="yes">
	                            <?php _e( 'Yes', 'vetrogram'); ?>
	                        </option>
	                        <option value="no">
	                            <?php _e( 'No', 'vetrogram'); ?>
	                        </option>
	                    </select>
	                </div>
	                <div class="vtg-admin-column vtg-column-one-third">
	                    <label class="vtg-admin-label">
	                        <?php _e( 'Show Biography?', 'vetrogram'); ?>
	                    </label>
	                    <select class="vtg-admin-textfield vtg-admin-option" data-option="show_bio">
	                        <option value="yes">
	                            <?php _e( 'Yes', 'vetrogram'); ?>
	                        </option>
	                        <option value="no">
	                            <?php _e( 'No', 'vetrogram'); ?>
	                        </option>
	                    </select>
	                </div>
	                <div class="vtg-admin-column vtg-column-one-third">
	                    <label class="vtg-admin-label">
	                        <?php _e( 'Show Website?', 'vetrogram'); ?>
	                    </label>
	                    <select class="vtg-admin-textfield vtg-admin-option" data-option="show_website">
	                        <option value="yes">
	                            <?php _e( 'Yes', 'vetrogram'); ?>
	                        </option>
	                        <option value="no">
	                            <?php _e( 'No', 'vetrogram'); ?>
	                        </option>
	                    </select>
	                </div>
	                <div class="vtg-admin-column vtg-column-one-third">
	                    <label class="vtg-admin-label">
	                        <?php _e( 'Show User Statistics?', 'vetrogram'); ?>
	                    </label>
	                    <select class="vtg-admin-textfield vtg-admin-option" data-option="show_statistic">
	                        <option value="yes">
	                            <?php _e( 'Yes', 'vetrogram'); ?>
	                        </option>
	                        <option value="no">
	                            <?php _e( 'No', 'vetrogram'); ?>
	                        </option>
	                    </select>
	                </div>
	                <div class="vtg-admin-subsection vtg-admin-avatar-subsection vtg-admin-clearfix">
	                    <h4 class="vtg-admin-heading"><?php _e('Avatar','vetrogram'); ?></h4>
	                    <div class="vtg-admin-column vtg-column-one-third">
	                        <label class="vtg-admin-label">
	                            <?php _e( 'Position', 'vetrogram'); ?>
	                        </label>
	                        <select class="vtg-admin-textfield vtg-admin-option" data-option="profile_style">
	                            <option value="one">
	                                <?php _e( 'Above User Details', 'vetrogram'); ?>
	                            </option>
	                            <option value="two">
	                                <?php _e( 'Inside User Details', 'vetrogram'); ?>
	                            </option>
	                        </select>
	                    </div>
	                    <div class="vtg-admin-column vtg-column-one-third">
	                        <label class="vtg-admin-label">
	                            <?php _e( 'Border Radius', 'vetrogram'); ?>
	                        </label>
	                        <input type="text" class="vtg-admin-textfield vtg-admin-option" data-option="avatar_border_radius">
	                    </div>
	                    <div class="vtg-admin-column vtg-column-one-third">
	                        <label class="vtg-admin-label">
	                            <?php _e( 'Size(px)', 'vetrogram'); ?>
	                        </label>
	                        <input type="text" class="vtg-admin-textfield vtg-admin-option" data-option="avatar_size">
	                    </div>
	                </div>
	                <div class="vtg-admin-subsection vtg-admin-name-subsection vtg-admin-clearfix">
	                    <h4 class="vtg-admin-heading"><?php _e('Name','vetrogram'); ?></h4>
	                    <div class="vtg-admin-column vtg-column-one-third">
	                        <label class="vtg-admin-label">
	                            <?php _e( 'Font Family', 'vetrogram'); ?>
	                        </label>
	                        <select class="vtg-admin-textfield vtg-admin-option" data-option="name_font_family">
	                            <option value="">---</option>
	                            <?php echo vtg_google_fonts();?>
	                        </select>
	                    </div>
	                    <div class="vtg-admin-column vtg-column-one-third">
	                        <label class="vtg-admin-label">
	                            <?php _e( 'Font Size(px)', 'vetrogram'); ?>
	                        </label>
	                        <input type="text" class="vtg-admin-textfield vtg-admin-option" data-option="name_font_size">
	                    </div>
	                    <div class="vtg-admin-column vtg-column-one-third">
	                        <label class="vtg-admin-label">
	                            <?php _e( 'Color', 'vetrogram'); ?>
	                        </label>
	                        <input type="text" class="color-picker vtg-admin-color vtg-admin-option" data-alpha="true" data-option="name_color" />
	                    </div>
	                    <div class="vtg-admin-column vtg-column-one-third">
	                        <label class="vtg-admin-label">
	                            <?php _e( 'Letter Spacing(px)', 'vetrogram'); ?>
	                        </label>
	                        <input type="text" class="vtg-admin-textfield vtg-admin-option" data-option="name_letter_spacing">
	                    </div>
	                    <div class="vtg-admin-column vtg-column-one-third">
	                        <label class="vtg-admin-label">
	                            <?php _e( 'Text Transform', 'vetrogram'); ?>
	                        </label>
	                        <select class="vtg-admin-textfield vtg-admin-option" data-option="name_text_transform">
	                            <?php echo $text_transforms; ?>
	                        </select>
	                    </div>
	                    <div class="vtg-admin-column vtg-column-one-third">
	                        <label class="vtg-admin-label">
	                            <?php _e( 'Font Weight', 'vetrogram'); ?>
	                        </label>
	                        <select class="vtg-admin-textfield vtg-admin-option" data-option="name_font_weight">
	                            <?php echo $font_weights; ?>
	                        </select>
	                    </div>
	                </div>
	                <div class="vtg-admin-subsection vtg-admin-bio-subsection vtg-admin-clearfix">
	                    <h4 class="vtg-admin-heading"><?php _e('Biography','vetrogram'); ?></h4>
	                    <div class="vtg-admin-column vtg-column-one-third">
	                        <label class="vtg-admin-label">
	                            <?php _e( 'Font Family', 'vetrogram'); ?>
	                        </label>
	                        <select class="vtg-admin-textfield vtg-admin-option" data-option="bio_font_family">
	                            <option value="">---</option>
	                            <?php echo vtg_google_fonts();?>
	                        </select>
	                    </div>
	                    <div class="vtg-admin-column vtg-column-one-third">
	                        <label class="vtg-admin-label">
	                            <?php _e( 'Font Size(px)', 'vetrogram'); ?>
	                        </label>
	                        <input type="text" class="vtg-admin-textfield vtg-admin-option" data-option="bio_font_size">
	                    </div>
	                    <div class="vtg-admin-column vtg-column-one-third">
	                        <label class="vtg-admin-label">
	                            <?php _e( 'Color', 'vetrogram'); ?>
	                        </label>
	                        <input type="text" class="color-picker vtg-admin-color vtg-admin-option" data-alpha="true" data-option="bio_color" />
	                    </div>
	                    <div class="vtg-admin-column vtg-column-one-third">
	                        <label class="vtg-admin-label">
	                            <?php _e( 'Letter Spacing(px)', 'vetrogram'); ?>
	                        </label>
	                        <input type="text" class="vtg-admin-textfield vtg-admin-option" data-option="bio_letter_spacing">
	                    </div>
	                    <div class="vtg-admin-column vtg-column-one-third">
	                        <label class="vtg-admin-label">
	                            <?php _e( 'Text Transform', 'vetrogram'); ?>
	                        </label>
	                        <select class="vtg-admin-textfield vtg-admin-option" data-option="bio_text_transform">
	                            <?php echo $text_transforms; ?>
	                        </select>
	                    </div>
	                    <div class="vtg-admin-column vtg-column-one-third">
	                        <label class="vtg-admin-label">
	                            <?php _e( 'Font Weight', 'vetrogram'); ?>
	                        </label>
	                        <select class="vtg-admin-textfield vtg-admin-option" data-option="bio_font_weight">
	                            <?php echo $font_weights; ?>
	                        </select>
	                    </div>
	                </div>
	                <div class="vtg-admin-subsection vtg-admin-website-subsection vtg-admin-clearfix">
	                    <h4 class="vtg-admin-heading"><?php _e('Website','vetrogram'); ?></h4>
	                    <div class="vtg-admin-column vtg-column-one-third">
	                        <label class="vtg-admin-label">
	                            <?php _e( 'Font Family', 'vetrogram'); ?>
	                        </label>
	                        <select class="vtg-admin-textfield vtg-admin-option" data-option="website_font_family">
	                            <option value="">---</option>
	                            <?php echo vtg_google_fonts();?>
	                        </select>
	                    </div>
	                    <div class="vtg-admin-column vtg-column-one-third">
	                        <label class="vtg-admin-label">
	                            <?php _e( 'Font Size(px)', 'vetrogram'); ?>
	                        </label>
	                        <input type="text" class="vtg-admin-textfield vtg-admin-option" data-option="website_font_size">
	                    </div>
	                    <div class="vtg-admin-column vtg-column-one-third">
	                        <label class="vtg-admin-label">
	                            <?php _e( 'Color', 'vetrogram'); ?>
	                        </label>
	                        <input type="text" class="color-picker vtg-admin-color vtg-admin-option" data-alpha="true" data-option="website_color" />
	                    </div>
	                    <div class="vtg-admin-column vtg-column-one-third">
	                        <label class="vtg-admin-label">
	                            <?php _e( 'Letter Spacing(px)', 'vetrogram'); ?>
	                        </label>
	                        <input type="text" class="vtg-admin-textfield vtg-admin-option" data-option="website_letter_spacing">
	                    </div>
	                    <div class="vtg-admin-column vtg-column-one-third">
	                        <label class="vtg-admin-label">
	                            <?php _e( 'Font Weight', 'vetrogram'); ?>
	                        </label>
	                        <select class="vtg-admin-textfield vtg-admin-option" data-option="website_font_weight">
	                            <?php echo $font_weights; ?>
	                        </select>
	                    </div>
	                    <div class="vtg-admin-column vtg-column-one-third">
	                        <label class="vtg-admin-label">
	                            <?php _e( 'Icon Color', 'vetrogram'); ?>
	                        </label>
	                        <input type="text" class="color-picker vtg-admin-color vtg-admin-option" data-alpha="true" data-option="website_icon_color" />
	                    </div>
	                </div>
	                <div class="vtg-admin-subsection vtg-admin-statistic-subsection vtg-admin-clearfix">
	                    <h4 class="vtg-admin-heading"><?php _e('Statistics','vetrogram'); ?></h4>
	                    <div class="vtg-admin-column vtg-column-one-third">
	                        <label class="vtg-admin-label">
	                            <?php _e( 'Font Family', 'vetrogram'); ?>
	                        </label>
	                        <select class="vtg-admin-textfield vtg-admin-option" data-option="statistic_font_family">
	                            <option value="">---</option>
	                            <?php echo vtg_google_fonts();?>
	                        </select>
	                    </div>
	                    <div class="vtg-admin-column vtg-column-one-third">
	                        <label class="vtg-admin-label">
	                            <?php _e( 'Font Size(px)', 'vetrogram'); ?>
	                        </label>
	                        <input type="text" class="vtg-admin-textfield vtg-admin-option" data-option="statistic_font_size">
	                    </div>
	                    <div class="vtg-admin-column vtg-column-one-third">
	                        <label class="vtg-admin-label">
	                            <?php _e( 'Letter Spacing(px)', 'vetrogram'); ?>
	                        </label>
	                        <input type="text" class="vtg-admin-textfield vtg-admin-option" data-option="statistic_letter_spacing">
	                    </div>
	                    <div class="vtg-admin-column vtg-column-one-third">
	                        <label class="vtg-admin-label">
	                            <?php _e( 'Labels Text Transform', 'vetrogram'); ?>
	                        </label>
	                        <select class="vtg-admin-textfield vtg-admin-option" data-option="statistic_label_text_transform">
	                            <?php echo $text_transforms; ?>
	                        </select>
	                    </div>
	                    <div class="vtg-admin-column vtg-column-one-third">
	                        <label class="vtg-admin-label">
	                            <?php _e( 'Labels Font Weight', 'vetrogram'); ?>
	                        </label>
	                        <select class="vtg-admin-textfield vtg-admin-option" data-option="statistic_label_font_weight">
	                            <?php echo $font_weights; ?>
	                        </select>
	                    </div>
	                    <div class="vtg-admin-column vtg-column-one-third">
	                        <label class="vtg-admin-label">
	                            <?php _e( 'Labels Color', 'vetrogram'); ?>
	                        </label>
	                        <input type="text" class="color-picker vtg-admin-color vtg-admin-option" data-alpha="true" data-option="statistic_label_color" />
	                    </div>
	                    <div class="vtg-admin-column vtg-column-one-third">
	                        <label class="vtg-admin-label">
	                            <?php _e( 'Numbers Font Weight', 'vetrogram'); ?>
	                        </label>
	                        <select class="vtg-admin-textfield vtg-admin-option" data-option="statistic_count_font_weight">
	                            <?php echo $font_weights; ?>
	                        </select>
	                    </div>
	                    <div class="vtg-admin-column vtg-column-one-third">
	                        <label class="vtg-admin-label">
	                            <?php _e( 'Numbers Color', 'vetrogram'); ?>
	                        </label>
	                        <input type="text" class="color-picker vtg-admin-color vtg-admin-option" data-alpha="true" data-option="statistic_count_color" />
	                    </div>
	                </div>
	            </div>
	        </div>
	        <div class="vtg-admin-tab-content vtg-admin-tab-pagination">
	            <div class="vtg-admin-clearfix vtg-admin-columns">
	                <div class="vtg-admin-column vtg-column-one-third">
	                    <label class="vtg-admin-label">
	                        <?php _e( 'Pagination Style', 'vetrogram'); ?>
	                    </label>
	                    <select class="vtg-admin-textfield vtg-admin-option" data-option="pagination_style">
	                        <option value="load-more-button">
	                            <?php _e( 'Load More Button', 'vetrogram'); ?>
	                        </option>
	                        <option value="infinite-scroll">
	                            <?php _e( 'Infinite Scroll', 'vetrogram'); ?>
	                        </option>
	                    </select>
	                </div>
	                <div class="vtg-admin-subsection vtg-admin-load-more-button-subsection vtg-admin-clearfix">
	                    <h4 class="vtg-admin-heading"><?php _e('Load More Button','vetrogram'); ?></h4>
	                    <div class="vtg-admin-column vtg-column-one-third">
	                        <label class="vtg-admin-label">
	                            <?php _e( 'Text', 'vetrogram'); ?>
	                        </label>
	                        <input type="text" class="vtg-admin-textfield vtg-admin-option" data-option="loadmore_text">
	                    </div>
	                    <div class="vtg-admin-column vtg-column-one-third">
	                        <label class="vtg-admin-label">
	                            <?php _e( 'Background Color', 'vetrogram'); ?>
	                        </label>
	                        <input type="text" class="color-picker vtg-admin-color vtg-admin-option" data-alpha="true" data-option="loadmore_background_color" />
	                    </div>
	                    <div class="vtg-admin-clearfix"></div>
	                    <div class="vtg-admin-column vtg-column-one-third">
	                        <label class="vtg-admin-label">
	                            <?php _e( 'Font Family', 'vetrogram'); ?>
	                        </label>
	                        <select class="vtg-admin-textfield vtg-admin-option" data-option="loadmore_font_family">
	                            <option value="">---</option>
	                            <?php echo vtg_google_fonts();?>
	                        </select>
	                    </div>
	                    <div class="vtg-admin-column vtg-column-one-third">
	                        <label class="vtg-admin-label">
	                            <?php _e( 'Font Size(px)', 'vetrogram'); ?>
	                        </label>
	                        <input type="text" class="vtg-admin-textfield vtg-admin-option" data-option="loadmore_font_size">
	                    </div>
	                    <div class="vtg-admin-column vtg-column-one-third">
	                        <label class="vtg-admin-label">
	                            <?php _e( 'Color', 'vetrogram'); ?>
	                        </label>
	                        <input type="text" class="color-picker vtg-admin-color vtg-admin-option" data-alpha="true" data-option="loadmore_font_color" />
	                    </div>
	                    <div class="vtg-admin-column vtg-column-one-third">
	                        <label class="vtg-admin-label">
	                            <?php _e( 'Letter Spacing(px)', 'vetrogram'); ?>
	                        </label>
	                        <input type="text" class="vtg-admin-textfield vtg-admin-option" data-option="loadmore_letter_spacing">
	                    </div>
	                    <div class="vtg-admin-column vtg-column-one-third">
	                        <label class="vtg-admin-label">
	                            <?php _e( 'Text Transform', 'vetrogram'); ?>
	                        </label>
	                        <select class="vtg-admin-textfield vtg-admin-option" data-option="loadmore_text_transform">
	                            <?php echo $text_transforms; ?>
	                        </select>
	                    </div>
	                    <div class="vtg-admin-column vtg-column-one-third">
	                        <label class="vtg-admin-label">
	                            <?php _e( 'Font Weight', 'vetrogram'); ?>
	                        </label>
	                        <select class="vtg-admin-textfield vtg-admin-option" data-option="loadmore_font_weight">
	                            <?php echo $font_weights; ?>
	                        </select>
	                    </div>
	                    <div class="vtg-admin-column vtg-column-one-third">
	                        <label class="vtg-admin-label">
	                            <?php _e( 'Border Radius', 'vetrogram'); ?>
	                        </label>
	                        <input type="text" class="vtg-admin-textfield vtg-admin-option" data-option="loadmore_border_radius">
	                    </div>
	                    <div class="vtg-admin-column vtg-column-one-third">
	                        <label class="vtg-admin-label">
	                            <?php _e( 'Border Width(px)', 'vetrogram'); ?>
	                        </label>
	                        <input type="text" class="vtg-admin-textfield vtg-admin-option" data-option="loadmore_border_width">
	                    </div>
	                    <div class="vtg-admin-column vtg-column-one-third">
	                        <label class="vtg-admin-label">
	                            <?php _e( 'Border Color', 'vetrogram'); ?>
	                        </label>
	                        <input type="text" class="color-picker vtg-admin-color vtg-admin-option" data-alpha="true" data-option="loadmore_border_color" />
	                    </div>
	                    <div class="vtg-admin-column vtg-column-one-third">
	                        <label class="vtg-admin-label">
	                            <?php _e( 'Background Hover Color', 'vetrogram'); ?>
	                        </label>
	                        <input type="text" class="color-picker vtg-admin-color vtg-admin-option" data-alpha="true" data-option="loadmore_background_hover_color" />
	                    </div>
	                    <div class="vtg-admin-column vtg-column-one-third">
	                        <label class="vtg-admin-label">
	                            <?php _e( 'Text Hover Color', 'vetrogram'); ?>
	                        </label>
	                        <input type="text" class="color-picker vtg-admin-color vtg-admin-option" data-alpha="true" data-option="loadmore_font_hover_color" />
	                    </div>
	                    <div class="vtg-admin-column vtg-column-one-third">
	                        <label class="vtg-admin-label">
	                            <?php _e( 'Border Hover Color', 'vetrogram'); ?>
	                        </label>
	                        <input type="text" class="color-picker vtg-admin-color vtg-admin-option" data-alpha="true" data-option="loadmore_border_hover_color" />
	                    </div>
	                </div>
	                <div class="vtg-admin-subsection vtg-admin-loading-icon-subsection vtg-admin-clearfix">
	                    <h4 class="vtg-admin-heading"><?php _e('Loading Icon','vetrogram'); ?></h4>
	                    <div class="vtg-admin-column vtg-column-one-third">
	                        <label class="vtg-admin-label">
	                            <?php _e( 'Icon Size(px)', 'vetrogram'); ?>
	                        </label>
	                        <input type="text" class="vtg-admin-textfield vtg-admin-option" data-option="loading_icon_size">
	                    </div>
	                    <div class="vtg-admin-column vtg-column-one-third">
	                        <label class="vtg-admin-label">
	                            <?php _e( 'Icon Color', 'vetrogram'); ?>
	                        </label>
	                        <input type="text" class="color-picker vtg-admin-color vtg-admin-option" data-alpha="true" data-option="loading_icon_color" />
	                    </div>
	                </div>
	            </div>
	            <div class="vtg-admin-clearfix"></div>
	        </div>
	    </div>
	    <h4 class="vtg-admin-heading"><?php _e('Copy this code and use it in Widgets, Posts, Pages and etc.','vetrogram'); ?></h4>
	    <textarea class="vtg-admin-textfield vtg-admin-shortcode-box" readonly="readonly"></textarea>
	</div>

<?php } ?>