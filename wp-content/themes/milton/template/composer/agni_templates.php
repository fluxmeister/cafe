<?php
// Page - About 1
// 1. Custom template About 1
function agni_vc_custom_template_about_1() {
    $data               = array();
    $data['name']       = __( 'About 1', 'milton' );
    $data['weight']     = 0;
    $data['custom_class'] = 'agni_vc_custom_template_about_1';
    $data['content']    = <<<CONTENT
        [vc_row gap="30" equal_height="yes" content_placement="bottom" padding_top="4%" el_id="about_us-element-5" el_class="about_us-element-5"][vc_column width="1/2" padding_top="30" padding_bottom="30"][agni_section_heading heading="Who We Are" sub_heading="About Us" display_order="ishda"][vc_column_text margin_top="-10"]Cras vitae gravida sapien, ut placerat ligula. Donec at venenatis sem. Suspendisse id dui scelerisque eros ultrices scelerisque non quis nibh. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Ut hendrerit tempus eleifend.[/vc_column_text][/vc_column][vc_column width="1/2" padding_top="30" padding_bottom="30"][agni_progressbar percentage="75" title="Identity" track_color="#f4f4f4" bar_color="#1259c3"][agni_progressbar percentage="90" title="Coding" track_color="#f4f4f4" bar_color="#1259c3"][agni_progressbar percentage="83" title="Backend" track_color="#f4f4f4" bar_color="#1259c3"][/vc_column][vc_column align="center" margin_bottom="-15" padding_top="20" offset="vc_col-md-offset-1 vc_col-md-10 vc_hidden-xs"][agni_image img_url="781" alignment="center"][/vc_column][/vc_row]
CONTENT;
  
    vc_add_default_templates( $data );
}
add_action( 'vc_load_default_templates_action', 'agni_vc_custom_template_about_1' );

// 2. Custom template Milestone 1
function agni_vc_custom_template_milestone_1() {
    $data               = array();
    $data['name']       = __( 'Milestone 1', 'milton' ); 
    $data['weight']     = 0;
    $data['custom_class'] = 'agni_vc_custom_template_milestone_1';
    $data['content']    = <<<CONTENT
        [vc_row bg_choice="2" bg_image="788" bg_overlay="1" bg_overlay_color="rgba(18,89,195,0.95)" padding_top="3%" padding_bottom="3%" el_id="milestone-element-5" el_class="milestone-element-5"][vc_column dark_mode="has-dark-mode" width="1/4" padding_top="20" padding_bottom="20" white="white" offset="vc_col-xs-6"][agni_milestone style="2" icon="pe-7s-users" icon_size="45" mile_font_size="58" white="white" mile="80" title="Satisfied Clients"][/vc_column][vc_column dark_mode="has-dark-mode" width="1/4" padding_top="20" padding_bottom="20" white="white" offset="vc_col-xs-6"][agni_milestone style="2" icon="pe-7s-portfolio" icon_size="45" mile_font_size="58" white="white" mile="65" title="Projects Done"][/vc_column][vc_column dark_mode="has-dark-mode" width="1/4" padding_top="20" padding_bottom="20" white="white" offset="vc_col-xs-6"][agni_milestone style="2" icon="pe-7s-coffee" icon_size="45" mile_font_size="58" white="white" mile="180" title="Cups of Coffee"][/vc_column][vc_column dark_mode="has-dark-mode" width="1/4" padding_top="20" padding_bottom="20" white="white" offset="vc_col-xs-6"][agni_milestone style="2" icon="pe-7s-medal" icon_size="45" mile_font_size="58" white="white" mile="18" title="Awards Won"][/vc_column][/vc_row]
CONTENT;
  
    vc_add_default_templates( $data );
}
add_action( 'vc_load_default_templates_action', 'agni_vc_custom_template_milestone_1' ); 

// 3. Custom template Service boxes 1
function agni_vc_custom_template_service_boxes_1() {
    $data               = array();
    $data['name']       = __( 'Service Boxes 1', 'milton' );
    $data['weight']     = 0;
    $data['custom_class'] = 'agni_vc_custom_template_service_boxes_1';
    $data['content']    = <<<CONTENT
        [vc_row padding_top="4%" padding_bottom="4%" el_id="service-element-5" el_class="service-element-5"][vc_column align="center" width="1/2" offset="vc_col-md-3"][agni_service bg_choice="1" bg_color="#f8f8f8" icon="icon-basic-world" size="40" color="#1259c3" title="Great Support" title_size="" divide_line="" align="center" service_padding="40px 25px"]Donec vestibulum justo a diam ultricies pellentesque. Quisque mattis lacus.[/agni_service][/vc_column][vc_column width="1/2" offset="vc_col-md-3"][agni_service icon="icon-basic-lightbulb" size="40" color="#1259c3" title="Smart Network" title_size="" divide_line="" align="center" service_padding="40px 25px"]Donec vestibulum justo a diam ultricies pellentesque. Quisque mattis lacus.[/agni_service][/vc_column][vc_column width="1/2" offset="vc_col-md-3"][agni_service icon="icon-basic-mixer2" size="40" color="#1259c3" title="Deeply Customizable" title_size="" divide_line="" align="center" service_padding="40px 25px"]Donec vestibulum justo a diam ultricies pellentesque. Quisque mattis lacus.[/agni_service][/vc_column][vc_column width="1/2" offset="vc_col-md-3"][agni_service icon="icon-basic-settings" size="40" color="#1259c3" title="Complete Solutions" title_size="" divide_line="" align="center" service_padding="40px 25px"]Donec vestibulum justo a diam ultricies pellentesque. Quisque mattis lacus.[/agni_service][/vc_column][/vc_row]
CONTENT;
  
    vc_add_default_templates( $data );
}
add_action( 'vc_load_default_templates_action', 'agni_vc_custom_template_service_boxes_1' ); 

// 4. Custom template Clients 1
function agni_vc_custom_template_clients_1() {
    $data               = array();
    $data['name']       = __( 'Clients 1', 'milton' );
    $data['weight']     = 0;
    $data['custom_class'] = 'agni_vc_custom_template_clients_1';
    $data['content']    = <<<CONTENT
        [vc_row bg_color="#f6f6f6" padding_top="2%" padding_bottom="2%" el_id="our-clients-1"][vc_column padding_top="10" padding_bottom="10"][agni_clients column="6" client_display_style="" posts="6" clients_pagination="" style="3"][/vc_column][/vc_row]
CONTENT;
  
    vc_add_default_templates( $data );
}
add_action( 'vc_load_default_templates_action', 'agni_vc_custom_template_clients_1' ); 

// 5. Custom template Testimonials 1
function agni_vc_custom_template_testimonials_1() {
    $data               = array();
    $data['name']       = __( 'Testimonials 1', 'milton' );
    $data['weight']     = 0;
    $data['custom_class'] = 'agni_vc_custom_template_testimonials_1';
    $data['content']    = <<<CONTENT
        [vc_row equal_height="yes" content_placement="bottom" padding_top="4%" padding_bottom="4%" el_class="about_us-element-5"][vc_column width="2/3" padding_top="30" padding_bottom="4%" offset="vc_col-md-offset-3 vc_col-md-6 vc_col-sm-offset-2"][agni_section_heading heading="Clients think of our work!" sub_heading="Feedback" align="center" display_order="ishda"][/vc_column][vc_column][agni_testimonials type="1" column="2" testimonial_gutter="40" avatar_location="5" testimonial_avatar_width="60" circle_avatar="1" testimonial_display_style="border" testimonial_padding="8%" testimonial_autoplay="1" testimonial_autoplay_timeout="4000" testimonial_autoplay_hover="1" testimonial_autoplay_speed="700" testimonial_loop="1" testimonial_pagination="1"][/vc_column][/vc_row]
CONTENT;
  
    vc_add_default_templates( $data );
}
add_action( 'vc_load_default_templates_action', 'agni_vc_custom_template_testimonials_1' ); 


// Page - About 2
// 6. Custom template About 2
function agni_vc_custom_template_about_2() {
    $data               = array();
    $data['name']       = __( 'About 2', 'milton' );
    $data['weight']     = 0;
    $data['custom_class'] = 'agni_vc_custom_template_about_2';
    $data['content']    = <<<CONTENT
        [vc_row equal_height="yes" content_placement="middle" padding_top="5%" padding_bottom="5%" el_id="video-intro-8" el_class="video-intro-8"][vc_column align="center" bg_choice="2" bg_image="874" bg_overlay="1" bg_overlay_color="rgba(0,0,0,0.5)" padding_top="15%" padding_bottom="15%" offset="vc_col-md-6"][agni_video video_type="3" iframe_url="#" iframe_style="2" icon="pe-7f-play" size="20" icon_style="background" width="84" height="84" background_color="#ffffff" color="#333333" hover_icon_style="background" hover_background_color="#ffffff" hover_color="#1259c3"][/vc_column][vc_column width="5/6" padding_top="60" padding_bottom="60" offset="vc_col-md-offset-1 vc_col-md-5 vc_col-sm-offset-1 vc_col-xs-12"][agni_section_heading heading="We are Milton Agency" sub_heading="Introduction" display_order="ishda"][vc_column_text]Leverage agile frameworks to provide a robust synopsis for high level overviews. Iterative approaches to corporate ategy foster collaborative thinking to further the overall value for roposition. view of disruptive innovation via workplace diversity place that you can make it fear.[/vc_column_text][agni_button value="View Works" choice="accent" radius="50"][/vc_column][/vc_row]
CONTENT;
  
    vc_add_default_templates( $data );
}
add_action( 'vc_load_default_templates_action', 'agni_vc_custom_template_about_2' ); 

// 7. Custom template Team 1
function agni_vc_custom_template_team_1() {
    $data               = array();
    $data['name']       = __( 'Team 1', 'milton' );
    $data['weight']     = 0;
    $data['custom_class'] = 'agni_vc_custom_template_team_1';
    $data['content']    = <<<CONTENT
        [vc_row fullwidth="has-fullwidth-column-no-padding" bg_color="#25262b" padding_top="3%" el_id="team-element-6" el_class="team-element-6"][vc_column dark_mode="has-dark-mode" align="center" width="5/6" padding_top="20" padding_bottom="6%" offset="vc_col-md-offset-3 vc_col-md-6 vc_col-sm-offset-1 vc_col-xs-12"][vc_custom_heading text="Amazing Team" font_container="tag:h3|text_align:center" use_theme_fonts="yes"][vc_column_text]Bring to the table win-win survival strategies to ensure proactive.[/vc_column_text][/vc_column][vc_column offset="vc_col-xs-12"][agni_team column="4" team_gutter="0" member_thumbnail_hover_bg_color="rgba(18,89,195,0.85)" member_thumbnail_hover_color="#ffffff" member_show_hover_name="1" member_show_hover_designation="1" member_show_hover_social_icons="1" member_show_bottom_name="" member_show_bottom_designation="" member_show_bottom_description="" member_show_bottom_social_icons="" member_hover_vertical_alignment="center" member_hover_horizontal_alignment="center" order="ASC" team_categories="demo-3" team_pagination=""][/vc_column][/vc_row]
CONTENT;
  
    vc_add_default_templates( $data );
}
add_action( 'vc_load_default_templates_action', 'agni_vc_custom_template_team_1' ); 

// 8. Custom template Features 1
function agni_vc_custom_template_features_1() {
    $data               = array();
    $data['name']       = __( 'Features 1', 'milton' );
    $data['weight']     = 0;
    $data['custom_class'] = 'agni_vc_custom_template_features_1';
    $data['content']    = <<<CONTENT
        [vc_row padding_top="6%" padding_bottom="6%" el_id="ourfeatures" el_class="ourfeatures"][vc_column width="1/2" padding_top="30" padding_bottom="30" offset="vc_col-md-4"][agni_image img_url="521" img_size="custom" img_size_custom="540x450"][vc_row_inner margin_right="15" margin_left="15"][vc_column_inner padding_top="30" padding_right="40" padding_bottom="20" padding_left="40" border_right="1" border_bottom="1" border_left="1" border_color="#dddddd" border_style="solid"][vc_custom_heading text="01. Who we are" font_container="tag:h6|text_align:left" use_theme_fonts="yes"][vc_column_text]Phasellus enim libero, blandit vel sapien vitae condimentum ultricies magna etar Quisque euismod orci lobortis aliquam along the information.[/vc_column_text][/vc_column_inner][/vc_row_inner][/vc_column][vc_column width="1/2" padding_top="30" padding_bottom="30" offset="vc_col-md-4"][agni_image img_url="342" img_size="custom" img_size_custom="540x450"][vc_row_inner margin_right="15" margin_left="15"][vc_column_inner padding_top="30" padding_right="40" padding_bottom="20" padding_left="40" border_right="1" border_bottom="1" border_left="1" border_color="#dddddd" border_style="solid"][vc_custom_heading text="02. Mission" font_container="tag:h6|text_align:left" use_theme_fonts="yes"][vc_column_text]Phasellus enim libero, blandit vel sapien vitae condimentum ultricies magna etar Quisque euismod orci lobortis aliquam along the information.[/vc_column_text][/vc_column_inner][/vc_row_inner][/vc_column][vc_column width="1/2" padding_top="30" padding_bottom="30" offset="vc_col-md-4"][agni_image img_url="520" img_size="custom" img_size_custom="540x450"][vc_row_inner margin_right="15" margin_left="15"][vc_column_inner padding_top="30" padding_right="40" padding_bottom="20" padding_left="40" border_right="1" border_bottom="1" border_left="1" border_color="#dddddd" border_style="solid"][vc_custom_heading text="03. Vision" font_container="tag:h6|text_align:left" use_theme_fonts="yes"][vc_column_text]Phasellus enim libero, blandit vel sapien vitae condimentum ultricies magna etar Quisque euismod orci lobortis aliquam along the information.[/vc_column_text][/vc_column_inner][/vc_row_inner][/vc_column][/vc_row]
CONTENT;
  
    vc_add_default_templates( $data );
}
add_action( 'vc_load_default_templates_action', 'agni_vc_custom_template_features_1' ); 

// 9. Custom template Testimonials 2
function agni_vc_custom_template_testimonials_2() {
    $data               = array();
    $data['name']       = __( 'Testimonials 2', 'milton' );
    $data['weight']     = 0;
    $data['custom_class'] = 'agni_vc_custom_template_testimonials_2';
    $data['content']    = <<<CONTENT
        [vc_row bg_color="#f6f6f6" padding_top="4%" padding_bottom="4%" el_id="testimonials-element-6" el_class="testimonials-element-6"][vc_column width="2/3" padding_top="30" padding_bottom="5%" offset="vc_col-md-offset-3 vc_col-md-6 vc_col-sm-offset-2 vc_col-xs-12"][vc_custom_heading text="Let them Speak for us!" font_container="tag:h2|text_align:center" use_theme_fonts="yes"][/vc_column][vc_column width="5/6" padding_bottom="30" offset="vc_col-md-offset-2 vc_col-md-8 vc_col-sm-offset-1 vc_col-xs-12"][agni_testimonials type="1" column="1" testimonial_avatar_width="90" circle_avatar="1" testimonial_quote_size="17" alignment="center" testimonial_autoplay="1" testimonial_autoplay_timeout="4000" testimonial_autoplay_hover="1" testimonial_autoplay_speed="700" testimonial_loop="1" testimonial_pagination="1" style="1"][/vc_column][/vc_row]
CONTENT;
  
    vc_add_default_templates( $data );
}
add_action( 'vc_load_default_templates_action', 'agni_vc_custom_template_testimonials_2' ); 

// Page - About 3
// 10. Custom template About 3
function agni_vc_custom_template_about_3() {
    $data               = array();
    $data['name']       = __( 'About 3', 'milton' );
    $data['weight']     = 0;
    $data['custom_class'] = 'agni_vc_custom_template_about_3';
    $data['content']    = <<<CONTENT
        [vc_row equal_height="yes" el_id="about_presentation-element-3" el_class="about_presentation-element-3"][vc_column bg_choice="2" bg_image="1430" bg_image_position="center top" width="1/2"][/vc_column][vc_column width="1/2" padding_top="30px" padding_bottom="30px"][vc_row_inner][vc_column_inner offset="vc_col-md-offset-1 vc_col-md-11"][vc_empty_space height="80px" height_tab="60" height_mobile="30"][vc_custom_heading text="Who We Are" font_container="tag:h3|text_align:left" use_theme_fonts="yes"][vc_column_text]Prow scuttle parrel provost Sail ho shrouds spirits boom to mizzenmast yard to arm. Pinnace holystone togots masters jack quarter crow's nest nipperkin grog for yardarm board grog black spirits boom to mizzenmast yard to arm.[/vc_column_text][agni_button value="Read More" style="alt" choice="primary"][vc_empty_space height="80px" height_tab="60" height_mobile="30"][/vc_column_inner][/vc_row_inner][/vc_column][/vc_row]
CONTENT;
  
    vc_add_default_templates( $data );
}
add_action( 'vc_load_default_templates_action', 'agni_vc_custom_template_about_3' ); 

// 11. Custom template Testimonials 3
function agni_vc_custom_template_testimonials_3() {
    $data               = array();
    $data['name']       = __( 'Testimonials 3', 'milton' );
    $data['weight']     = 0;
    $data['custom_class'] = 'agni_vc_custom_template_testimonials_3';
    $data['content']    = <<<CONTENT
        [vc_row bg_color="#f6f6f6" padding_top="4%" padding_bottom="4%" el_id="our_testimonials-3" el_class="our_testimonials-3"][vc_column padding_top="30px" padding_bottom="4%" offset="vc_col-md-offset-3 vc_col-md-6"][vc_custom_heading text="What Clients Say" font_container="tag:h3|text_align:center" use_theme_fonts="yes"][vc_column_text]There are many variations of passages of lorem Ipsum are many[/vc_column_text][/vc_column][vc_column][agni_testimonials type="1" column="3" testimonial_gutter="40" avatar_location="6" circle_avatar="1" testimonial_display_style="background" testimonial_bg_color="#ffffff" testimonial_padding="70px 35px 35px" alignment="center" testimonial_autoplay="1" testimonial_autoplay_timeout="4000" testimonial_autoplay_hover="1" testimonial_autoplay_speed="700" testimonial_loop="1" testimonial_pagination="1"][/vc_column][/vc_row]
CONTENT;
  
    vc_add_default_templates( $data );
}
add_action( 'vc_load_default_templates_action', 'agni_vc_custom_template_testimonials_3' ); 

// 12. Custom template Team 2
function agni_vc_custom_template_team_2() {
    $data               = array();
    $data['name']       = __( 'Team 2', 'milton' );
    $data['weight']     = 0;
    $data['custom_class'] = 'agni_vc_custom_template_team_2';
    $data['content']    = <<<CONTENT
        [vc_row padding_top="4%" padding_bottom="4%" el_id="our_team-5" el_class="our_team-5"][vc_column align="center" width="5/6" padding_top="30" offset="vc_col-md-offset-3 vc_col-md-6 vc_col-sm-offset-2 vc_col-xs-12"][vc_custom_heading text="Genius Team" font_container="tag:h2|text_align:center" use_theme_fonts="yes"][vc_column_text]Bring to the table win-win survival strategies to ensure proactive.[/vc_column_text][/vc_column][vc_column padding_bottom="30" offset="vc_col-xs-12"][agni_team column="4" team_gutter="46" member_thumbnail_hover_bg_color="rgba(18,89,195,0.85)" member_thumbnail_hover_color="#ffffff" member_thumbnail_gs_filter="1" member_show_hover_social_icons="1" member_show_bottom_description="" member_show_bottom_social_icons="" member_name_size="20" member_hover_vertical_alignment="center" member_hover_horizontal_alignment="center" member_bottom_alignment="center" order="ASC" team_categories="demo-5" team_pagination=""][/vc_column][/vc_row]
CONTENT;
  
    vc_add_default_templates( $data );
}
add_action( 'vc_load_default_templates_action', 'agni_vc_custom_template_team_2' ); 

// 13. Custom template Features 2
function agni_vc_custom_template_features_2() {
    $data               = array();
    $data['name']       = __( 'Features 2', 'milton' );
    $data['weight']     = 0;
    $data['custom_class'] = 'agni_vc_custom_template_features_2';
    $data['content']    = <<<CONTENT
        [vc_row bg_color="#f6f6f6" gap="30" equal_height="yes" padding_top="4%" padding_bottom="4%" el_id="promo_section-3" el_class="promo_section-3"][vc_column bg_choice="2" bg_image="1442" bg_image_repeat="no-repeat" bg_image_size="auto" offset="vc_col-md-6 vc_hidden-sm vc_hidden-xs"][/vc_column][vc_column padding_top="30px" padding_bottom="4%" offset="vc_col-md-6"][vc_empty_space height="60px" height_tab="1" height_mobile="1"][vc_custom_heading text="We are many variations of a
passages of Lorem Ipsum. " use_theme_fonts="yes"][vc_custom_heading text="Lorem Ipsum is simply dummy text of the printing and a typesetting industry." font_container="tag:p|font_size:16|text_align:left" use_theme_fonts="yes"][vc_empty_space height="25px" height_tab="10" height_mobile="10"][vc_row_inner][vc_column_inner width="1/2"][vc_custom_heading icon="pe-7s-paint-bucket" text="Our Mission" font_container="tag:h6|font_size:14|text_align:left" use_theme_fonts="yes" margin_bottom="20"][vc_custom_heading text="Leverage agile frameworks to provide a robust synopsis for high value overviews Iterative approaches." font_container="tag:p|font_size:14|text_align:left" use_theme_fonts="yes"][/vc_column_inner][vc_column_inner width="1/2"][vc_custom_heading icon="pe-7s-rocket" text="Our Vision" font_container="tag:h6|font_size:14|text_align:left" use_theme_fonts="yes" margin_bottom="20"][vc_custom_heading text="Leverage agile frameworks to provide a robust synopsis for high value overviews Iterative approaches." font_container="tag:p|font_size:14|text_align:left" use_theme_fonts="yes"][/vc_column_inner][/vc_row_inner][vc_empty_space height="60px" height_tab="1" height_mobile="1"][/vc_column][/vc_row]
CONTENT;
  
    vc_add_default_templates( $data );
}
add_action( 'vc_load_default_templates_action', 'agni_vc_custom_template_features_2' ); 

// 14. Custom template Clients 2
function agni_vc_custom_template_clients_2() {
    $data               = array();
    $data['name']       = __( 'Clients 2', 'milton' );
    $data['weight']     = 0;
    $data['custom_class'] = 'agni_vc_custom_template_clients_2';
    $data['content']    = <<<CONTENT
        [vc_row padding_top="3%" padding_bottom="3%" el_id="our_clients-3" el_class="our_clients-3"][vc_column padding_top="20px" padding_bottom="3%" el_id="our_clients-3" el_class="our_clients-3" offset="vc_col-md-offset-3 vc_col-md-6"][vc_custom_heading text="Proud To Work With" font_container="tag:h6|text_align:center" use_theme_fonts="yes"][/vc_column][vc_column padding_bottom="20" offset="vc_col-md-offset-1 vc_col-md-10 vc_col-xs-12"][agni_clients column="5" client_display_style="" clients_pagination=""][/vc_column][/vc_row]
CONTENT;
  
    vc_add_default_templates( $data );
}
add_action( 'vc_load_default_templates_action', 'agni_vc_custom_template_clients_2' ); 

// Page - About 4
// 15. Custom template About 4
function agni_vc_custom_template_about_4() {
    $data               = array();
    $data['name']       = __( 'About 4', 'milton' );
    $data['weight']     = 0;
    $data['custom_class'] = 'agni_vc_custom_template_about_4';
    $data['content']    = <<<CONTENT
        [vc_row gap="30" content_placement="bottom" padding_top="4%" padding_bottom="4%" el_id="intro-element-4" el_class="intro-element-4"][vc_column align="center" width="1/2" padding_top="60" padding_right="30" padding_bottom="70" padding_left="30" border_top="2" border_right="2" border_bottom="2" border_left="2" border_color="#e8e8e8" border_style="solid" offset="vc_col-md-4"][vc_custom_heading text="What we do" font_container="tag:h3|text_align:center" use_theme_fonts="yes"][vc_column_text]Phasellus enim libero, blandit vel sapien vitae ultricies magna etadta Quisque euismod orcia lobortis aliquam blandit vel sapien vitae magna.[/vc_column_text][agni_button value="View Details" choice="accent" alignment="center"][/vc_column][vc_column align="center" width="1/2" padding_top="60" padding_right="30" padding_bottom="70" padding_left="30" border_top="2" border_right="2" border_bottom="2" border_left="2" border_color="#444444" border_style="solid" offset="vc_col-md-4"][vc_custom_heading text="We are Milton" font_container="tag:h3|text_align:center" use_theme_fonts="yes"][vc_column_text]Phasellus enim libero, blandit vel sapien vitae ultricies magna etadta Quisque euismod orcia lobortis aliquam blandit vel sapien vitae ultricies magna condimentum mollis lorem sed accumsan semper etadta.[/vc_column_text][agni_button value="View Details" choice="accent" alignment="center"][/vc_column][vc_column align="center" width="1/2" padding_top="60" padding_right="30" padding_bottom="70" padding_left="30" border_top="2" border_right="2" border_bottom="2" border_left="2" border_color="#e8e8e8" border_style="solid" offset="vc_col-md-4"][vc_custom_heading text="Why we are" font_container="tag:h3|text_align:center" use_theme_fonts="yes"][vc_column_text]Phasellus enim libero, blandit vel sapien vitae ultricies magna etadta Quisque euismod orcia lobortis aliquam blandit vel sapien vitae magna.[/vc_column_text][agni_button value="View Details" choice="accent" alignment="center"][/vc_column][/vc_row]
CONTENT;
  
    vc_add_default_templates( $data );
}
add_action( 'vc_load_default_templates_action', 'agni_vc_custom_template_about_4' ); 

// 16. Custom template Testimonials 4
function agni_vc_custom_template_testimonials_4() {
    $data               = array();
    $data['name']       = __( 'Testimonials 4', 'milton' );
    $data['weight']     = 0;
    $data['custom_class'] = 'agni_vc_custom_template_testimonials_4';
    $data['content']    = <<<CONTENT
        [vc_row bg_choice="2" bg_image="532" bg_overlay="1" bg_overlay_color="rgba(0,0,0,0.7)" padding_top="4%" padding_bottom="4%" el_id="testimonilas-element-4" el_class="testimonilas-element-4"][vc_column dark_mode="has-dark-mode" width="5/6" padding_top="30" padding_bottom="2%" offset="vc_col-md-offset-3 vc_col-md-6 vc_col-sm-offset-1 vc_col-xs-12"][vc_custom_heading text="Testimonials" font_container="tag:h3|text_align:center" use_theme_fonts="yes"][/vc_column][vc_column dark_mode="has-dark-mode" width="5/6" padding_bottom="30" offset="vc_col-md-offset-2 vc_col-md-8 vc_col-sm-offset-1 vc_col-xs-12"][agni_testimonials type="1" column="1" avatar_location="5" testimonial_avatar_width="60" circle_avatar="1" testimonial_quote_size="17" alignment="center" testimonial_autoplay="1" testimonial_autoplay_timeout="4000" testimonial_autoplay_hover="1" testimonial_autoplay_speed="700" testimonial_loop="1" testimonial_pagination="1" style="1"][/vc_column][/vc_row]
CONTENT;
  
    vc_add_default_templates( $data );
}
add_action( 'vc_load_default_templates_action', 'agni_vc_custom_template_testimonials_4' ); 

// 17. Custom template Features 3
function agni_vc_custom_template_features_3() {
    $data               = array();
    $data['name']       = __( 'Features 3', 'milton' );
    $data['weight']     = 0;
    $data['custom_class'] = 'agni_vc_custom_template_features_3';
    $data['content']    = <<<CONTENT
        [vc_row equal_height="yes" padding_top="3%" padding_bottom="3%" el_id="promo_section-4" el_class="promo_section-4"][vc_column padding_top="30px" padding_bottom="30px" offset="vc_col-md-6"][vc_empty_space height="60px" height_tab="40" height_mobile="30"][vc_custom_heading text="Watch the Extension" use_theme_fonts="yes"][vc_custom_heading text="Prow scuttle parrel provost Sail ho shrouds spirits boom to mizzenmast yard to arm. Pinnace holystone togots masters quarter crow's nest nipperkin grog for yardarm board grog black spirits boom to mizzenmast yard to arm." font_container="tag:p|font_size:16|text_align:left" use_theme_fonts="yes"][vc_empty_space height="20px" height_tab="10" height_mobile="10"][vc_row_inner padding_top="15" border_top="1" border_color="#eeeeee" border_style="solid"][vc_column_inner width="1/2" padding_top="30" padding_bottom="30"][agni_service choice="2" icon="pe-7s-pin" size="30" color="#1259c3" hover_color="#1259c3" title="Business Enhanced" divide_line=""]Hackng virality pitch burns startups are validation.[/agni_service][/vc_column_inner][vc_column_inner width="1/2" padding_top="30" padding_bottom="30"][agni_service choice="2" icon="pe-7s-vector" size="30" color="#1259c3" hover_color="#1259c3" title="Optimization" divide_line=""]Hackng virality pitch burns startups are validation.[/agni_service][/vc_column_inner][/vc_row_inner][vc_empty_space height="60px" height_tab="40" height_mobile="30"][/vc_column][vc_column bg_choice="2" bg_image="1463" bg_image_repeat="no-repeat" bg_image_size="auto" offset="vc_col-md-offset-1 vc_col-md-5 vc_hidden-sm vc_hidden-xs"][/vc_column][/vc_row]
CONTENT;
  
    vc_add_default_templates( $data );
}
add_action( 'vc_load_default_templates_action', 'agni_vc_custom_template_features_3' ); 

// 18. Custom template Call to action 1
function agni_vc_custom_template_call_to_action_1() {
    $data               = array();
    $data['name']       = __( 'Call to Action 1', 'milton' );
    $data['weight']     = 0;
    $data['custom_class'] = 'agni_vc_custom_template_call_to_action_1';
    $data['content']    = <<<CONTENT
        [vc_row bg_color="#1259c3" padding_top="4%" padding_bottom="4%" el_id="free-trail-4" el_class="free-trail-4"][vc_column dark_mode="has-dark-mode" align="center" padding_top="30px" padding_bottom="4%" el_id="free-trail-4" el_class="free-trail-4" offset="vc_col-md-offset-2 vc_col-md-8"][vc_custom_heading text="Free Trail Available" font_container="tag:h2|text_align:center" use_theme_fonts="yes"][vc_column_text]Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis vestibulum sem eu iaculis varius.
Duis vestibulum sem eu iaculis varius.[/vc_column_text][/vc_column][/vc_row]
CONTENT;
  
    vc_add_default_templates( $data );
}
add_action( 'vc_load_default_templates_action', 'agni_vc_custom_template_call_to_action_1' ); 

// 19. Custom template Milestone 2
function agni_vc_custom_template_milestone_2() {
    $data               = array();
    $data['name']       = __( 'Milestone 2', 'milton' ); 
    $data['weight']     = 0;
    $data['custom_class'] = 'agni_vc_custom_template_milestone_2';
    $data['content']    = <<<CONTENT
        [vc_row padding_top="4%" padding_bottom="4%" el_id="about-milestone-4" el_class="about-milestone-4"][vc_column width="1/4" padding_top="30" padding_bottom="30" offset="vc_col-md-3 vc_col-xs-6"][agni_milestone mile_font_choice="default-typo" mile_font_size="50" align="left" mile="80" title="Satisfied Clients"][/vc_column][vc_column width="1/4" padding_top="30" padding_bottom="30" offset="vc_col-md-3 vc_col-xs-6"][agni_milestone mile_font_choice="default-typo" mile_font_size="50" align="left" mile="65" title="Projects Done"][/vc_column][vc_column width="1/4" padding_top="30" padding_bottom="30" offset="vc_col-md-3 vc_col-xs-6"][agni_milestone mile_font_choice="default-typo" mile_font_size="50" align="left" mile="180" title="Lines of Code"][/vc_column][vc_column width="1/4" padding_top="30" padding_bottom="30" offset="vc_col-md-3 vc_col-xs-6"][agni_milestone mile_font_choice="default-typo" mile_font_size="50" align="left" mile="13" title="Awards Won"][/vc_column][/vc_row]
CONTENT;
  
    vc_add_default_templates( $data );
}
add_action( 'vc_load_default_templates_action', 'agni_vc_custom_template_milestone_2' ); 

// Page - Service 1
// 20. Custom template Service boxes 2
function agni_vc_custom_template_service_boxes_2() {
    $data               = array();
    $data['name']       = __( 'Service Boxes 2', 'milton' );
    $data['weight']     = 0;
    $data['custom_class'] = 'agni_vc_custom_template_service_boxes_2';
    $data['content']    = <<<CONTENT
        [vc_row padding_top="4%" padding_bottom="4%" el_id="about_us-7" el_class="about_us-7"][vc_column align="center" padding_top="30" padding_bottom="6%" offset="vc_col-md-offset-3 vc_col-md-6"][vc_custom_heading text="What we do" font_container="tag:h2|text_align:center" use_theme_fonts="yes"][vc_column_text]It is a long established fact that a reader will be distracted by a read  content of a page when looking at its layout.[/vc_column_text][/vc_column][vc_column offset="vc_col-md-6"][vc_row_inner][vc_column_inner padding_bottom="40" offset="vc_col-md-11"][agni_service choice="2" icon="pe-7s-box2" icon_style="background" radius="50" background_color="#f5f5f5" color="#1259c3" hover_icon_style="background" hover_radius="50" hover_color="#ffffff" title="3D Touch Display" title_size="" divide_line=""]It is a long established fact that a reader distracted will be content of a page at its layout.[/agni_service][vc_empty_space height="60px" height_tab="40"][agni_service choice="2" icon="pe-7s-phone" icon_style="background" radius="50" background_color="#f5f5f5" color="#1259c3" hover_icon_style="background" hover_radius="50" hover_color="#ffffff" title="Great Interface" title_size="" divide_line=""]It is a long established fact that a reader distracted will be content of a page at its layout.[/agni_service][/vc_column_inner][/vc_row_inner][/vc_column][vc_column offset="vc_col-md-6"][vc_row_inner][vc_column_inner padding_bottom="40" offset="vc_col-md-11"][agni_service choice="2" icon="pe-7s-drawer" icon_style="background" radius="50" background_color="#f5f5f5" color="#1259c3" hover_icon_style="background" hover_radius="50" hover_color="#ffffff" title="Large Database" title_size="" divide_line=""]It is a long established fact that a reader distracted will be content of a page at its layout.[/agni_service][vc_empty_space height="60px" height_tab="40"][agni_service choice="2" icon="pe-7s-cloud-download" icon_style="background" radius="50" background_color="#f5f5f5" color="#1259c3" hover_icon_style="background" hover_radius="50" hover_color="#ffffff" title="Cloud Download" title_size="" divide_line=""]It is a long established fact that a reader distracted will be content of a page at its layout.[/agni_service][/vc_column_inner][/vc_row_inner][/vc_column][/vc_row]
CONTENT;
  
    vc_add_default_templates( $data );
}
add_action( 'vc_load_default_templates_action', 'agni_vc_custom_template_service_boxes_2' ); 

// 21. Custom template Features 4
function agni_vc_custom_template_features_4() {
    $data               = array();
    $data['name']       = __( 'Features 4', 'milton' );
    $data['weight']     = 0;
    $data['custom_class'] = 'agni_vc_custom_template_features_4';
    $data['content']    = <<<CONTENT
        [vc_row bg_color="#f6f6f6" equal_height="yes" content_placement="middle" padding_top="4%" padding_bottom="4%" el_id="service_box-7" el_class="service_box-7"][vc_column padding_top="30" padding_bottom="30" offset="vc_col-md-5"][vc_custom_heading text="Look Our Best Services" use_theme_fonts="yes"][vc_custom_heading text="It is a long established fact that a reader will be distracted by a read page when looking at its layout." font_container="tag:p|font_size:16|text_align:left" use_theme_fonts="yes"][vc_empty_space height="15px" height_tab="5" height_mobile="5"][vc_custom_heading icon="pe-7s-paint-bucket" text="UI Themes" font_container="tag:h6|font_size:16|text_align:left" use_theme_fonts="yes"][vc_column_text]Leverage agile frameworks to provide a robust synopsis for high value overviews Iterative approaches.[/vc_column_text][vc_empty_space height="5px"][vc_custom_heading icon="pe-7s-rocket" text="Faster than ever" font_container="tag:h6|font_size:16|text_align:left" use_theme_fonts="yes"][vc_column_text]Leverage agile frameworks to provide a robust synopsis for high value overviews Iterative approaches.[/vc_column_text][/vc_column][vc_column padding_top="30" padding_right="0px" padding_bottom="30" padding_left="0px" css=".vc_custom_1479457304908{padding-top: 5% !important;padding-bottom: 5% !important;}" offset="vc_col-md-offset-1 vc_col-md-6 vc_hidden-sm vc_hidden-xs"][agni_image img_url="859"][/vc_column][/vc_row]
CONTENT;
  
    vc_add_default_templates( $data );
}
add_action( 'vc_load_default_templates_action', 'agni_vc_custom_template_features_4' ); 

// 22. Custom template Service boxes + Call to action
function agni_vc_custom_template_service_boxes_call_to_action_1() {
    $data               = array();
    $data['name']       = __( 'Service Boxes + Call to action 1', 'milton' );
    $data['weight']     = 0;
    $data['custom_class'] = 'agni_vc_custom_template_service_boxes_call_to_action_1';
    $data['content']    = <<<CONTENT
        [vc_row padding_top="4%" padding_bottom="4%" el_id="process_box-7" el_class="process_box-7"][vc_column width="1/2" padding_top="30" padding_bottom="30" offset="vc_col-md-4"][agni_service bg_choice="3" bg_border_color="#eaeaea" text_i_icon="2" text_color="#1259c3" title="Planning" title_size="" divide_line="" align="center" service_padding="40px 40px 60px"]Phasellus enim libero, blandit vel sapien vitae condimentum ultricies magna etar Quisque euismod orci lobortis aliquam.[/agni_service][/vc_column][vc_column width="1/2" padding_top="30" padding_bottom="30" offset="vc_col-md-4"][agni_service bg_choice="3" bg_border_color="#eaeaea" text_i_icon="2" text="02" text_color="#1259c3" title="Designing" title_size="" divide_line="" align="center" service_padding="40px 40px 60px"]Phasellus enim libero, blandit vel sapien vitae condimentum ultricies magna etar Quisque euismod orci lobortis aliquam.[/agni_service][/vc_column][vc_column width="1/2" padding_top="30" padding_bottom="30" offset="vc_col-md-offset-0 vc_col-md-4 vc_col-sm-offset-3"][agni_service bg_choice="3" bg_border_color="#eaeaea" text_i_icon="2" text="03" text_color="#1259c3" title="Execution" title_size="" divide_line="" align="center" service_padding="40px 40px 60px"]Phasellus enim libero, blandit vel sapien vitae condimentum ultricies magna etar Quisque euismod orci lobortis aliquam.[/agni_service][/vc_column][/vc_row][vc_row bg_choice="2" bg_image="443" bg_overlay="1" bg_overlay_choice="3" bg_gm_overlay_color1="#000000" bg_gm_overlay_color3="#1259c3" padding_top="4%" padding_bottom="4%" el_id="callout-element-2" el_class="callout-element-2"][vc_column dark_mode="has-dark-mode" align="center" width="5/6" white="white" offset="vc_col-md-offset-3 vc_col-md-6 vc_col-sm-offset-1"][agni_call_to_action quote="Stay Creative and Build a Website" additional_quote="There are many variations of elements" value="Get Started" choice="white" align="center"][/vc_column][/vc_row]
CONTENT;
  
    vc_add_default_templates( $data );
}
add_action( 'vc_load_default_templates_action', 'agni_vc_custom_template_service_boxes_call_to_action_1' ); 

// Page - Service 2
// 23. Custom template Features 5
function agni_vc_custom_template_features_5() {
    $data               = array();
    $data['name']       = __( 'Features 5', 'milton' );
    $data['weight']     = 0;
    $data['custom_class'] = 'agni_vc_custom_template_features_5';
    $data['content']    = <<<CONTENT
        [vc_row gap="30" padding_top="4%" padding_bottom="4%" el_id="feature_items-8" el_class="feature_items-8"][vc_column align="center" padding_top="20" padding_bottom="2%" offset="vc_col-md-offset-3 vc_col-md-6"][vc_custom_heading text="Featured List" font_container="tag:h2|text_align:center|color:%23444444" use_theme_fonts="yes"][vc_column_text]Bring to the table win-win survival strategies to ensure proactive domination at the end of the day going forward.[/vc_column_text][/vc_column][vc_column bg_color="#fafafa" width="1/2" margin_bottom="20" padding_right="0px" padding_left="0px" border_radius="5px" offset="vc_col-md-4"][agni_image img_url="788" img_size="custom" img_size_custom="600x400"][vc_custom_heading text="Super Flexible" font_container="tag:h6|font_size:14|text_align:center" use_theme_fonts="yes" padding_top="25" padding_bottom="25" custom_heading_letter_spacing="0.125em"][/vc_column][vc_column bg_color="#fafafa" width="1/2" margin_bottom="20" padding_right="0px" padding_left="0px" border_radius="5px" offset="vc_col-md-4"][agni_image img_url="905" img_size="custom" img_size_custom="420x280"][vc_custom_heading text="No backend editor" font_container="tag:h6|font_size:14|text_align:center" use_theme_fonts="yes" padding_top="25" padding_bottom="25" custom_heading_letter_spacing="0.125em"][/vc_column][vc_column bg_color="#fafafa" width="1/2" margin_bottom="20" padding_right="0px" padding_left="0px" border_radius="5px" offset="vc_col-md-4"][agni_image img_url="904" img_size="custom" img_size_custom="420x280"][vc_custom_heading text="Presense Analysis" font_container="tag:h6|font_size:14|text_align:center" use_theme_fonts="yes" padding_top="25" padding_bottom="25" custom_heading_letter_spacing="0.125em"][/vc_column][/vc_row]
CONTENT;
  
    vc_add_default_templates( $data );
}
add_action( 'vc_load_default_templates_action', 'agni_vc_custom_template_features_5' ); 

// 24. Custom template Service boxes 3
function agni_vc_custom_template_service_boxes_3() {
    $data               = array();
    $data['name']       = __( 'Service Boxes 3', 'milton' );
    $data['weight']     = 0;
    $data['custom_class'] = 'agni_vc_custom_template_service_boxes_3';
    $data['content']    = <<<CONTENT
        [vc_row padding_top="4%" padding_bottom="4%" el_id="servicebox_element-8" el_class="servicebox_element-8"][vc_column width="1/2" padding_top="30" padding_bottom="30" offset="vc_col-md-4"][agni_service choice="2" icon="icon-basic-helm" color="#1259c3" hover_color="#444444" title="Great Support" title_size="" divide_line=""]Phasellus enim libero, blandit vel sapien vitae, condimentum ultricies magna et. Quisque euismod.[/agni_service][/vc_column][vc_column width="1/2" padding_top="30" padding_bottom="30" offset="vc_col-md-4"][agni_service choice="2" icon="icon-ecommerce-diamond" color="#1259c3" hover_color="#444444" title="Deeply Customizable" title_size="" divide_line=""]Phasellus enim libero, blandit vel sapien vitae, condimentum ultricies magna et. Quisque euismod.[/agni_service][/vc_column][vc_column width="1/2" padding_top="30" padding_bottom="30" offset="vc_col-md-4"][agni_service choice="2" icon="icon-basic-gear" color="#1259c3" hover_color="#444444" title="Complete solutions" title_size="" divide_line=""]Phasellus enim libero, blandit vel sapien vitae, condimentum ultricies magna et. Quisque euismod.[/agni_service][/vc_column][vc_column width="1/2" padding_top="30" padding_bottom="30" offset="vc_col-md-4"][agni_service choice="2" icon="icon-basic-video" color="#1259c3" hover_color="#444444" title="Indepth video tutorials" title_size="" divide_line=""]Phasellus enim libero, blandit vel sapien vitae, condimentum ultricies magna et. Quisque euismod.[/agni_service][/vc_column][vc_column width="1/2" padding_top="30" padding_bottom="30" offset="vc_col-md-4"][agni_service choice="2" icon="icon-basic-sheet-txt" color="#1259c3" hover_color="#444444" title="Clean modern code" title_size="" divide_line=""]Phasellus enim libero, blandit vel sapien vitae, condimentum ultricies magna et. Quisque euismod.[/agni_service][/vc_column][vc_column width="1/2" padding_top="30" padding_bottom="30" offset="vc_col-md-4"][agni_service choice="2" icon="icon-basic-clessidre" color="#1259c3" hover_color="#444444" title="Loaded with Power" title_size="" divide_line=""]Phasellus enim libero, blandit vel sapien vitae, condimentum ultricies magna et. Quisque euismod.[/agni_service][/vc_column][/vc_row]
CONTENT;
  
    vc_add_default_templates( $data );
}
add_action( 'vc_load_default_templates_action', 'agni_vc_custom_template_service_boxes_3' ); 

// 25. Custom template Features + Accordion 1
function agni_vc_custom_template_features_accordion_1() {
    $data               = array();
    $data['name']       = __( 'Features + Accordion 1', 'milton' );
    $data['weight']     = 0;
    $data['custom_class'] = 'agni_vc_custom_template_features_accordion_1';
    $data['content']    = <<<CONTENT
        [vc_row bg_choice="2" bg_image="874" bg_overlay="1" bg_overlay_color="rgba(18,89,195,0.9)" gap="30" padding_top="8%" padding_bottom="8%" el_id="presentation_element-8" el_class="presentation_element-8"][vc_column dark_mode="has-dark-mode" width="1/2" padding_top="5" padding_bottom="5"][vc_accordion style="2"][vc_accordion_tab title="Creative Elements"][vc_column_text]Prow scuttle parrel provost Sail ho shrouds spirits boom to mizzenmast yard to arm. Pinnace holystone togots masters quarter crow.[/vc_column_text][/vc_accordion_tab][vc_accordion_tab title="Infographics View" active="in"][vc_column_text]Prow scuttle parrel provost Sail ho shrouds spirits boom to mizzenmast yard to arm. Pinnace holystone togots masters quarter crow.[/vc_column_text][/vc_accordion_tab][vc_accordion_tab title="Multistatics Interface"][vc_column_text]Prow scuttle parrel provost Sail ho shrouds spirits boom to mizzenmast yard to arm. Pinnace holystone togots masters quarter crow.[/vc_column_text][/vc_accordion_tab][/vc_accordion][/vc_column][vc_column dark_mode="has-dark-mode" width="1/2" padding_top="5" padding_bottom="5" white="white"][vc_custom_heading text="Digital Interface" font_container="tag:h2|text_align:left|color:%23ffffff" use_theme_fonts="yes" padding_bottom="5"][vc_column_text padding_bottom="15"]Prow scuttle parrel provost Sail ho shrouds spirits boom to mizzenmast yard to arm. Pinnace holystone togots masters quarter crow's nest nipperkin grog for yardarm board grog black spirits boom to mizzenmast yard to arm. Pinnace holystone togots masters jack gangway ruttersSail nest nipperkin grog.[/vc_column_text][agni_button value="Get Started" choice="white" radius="50"][/vc_column][/vc_row]
CONTENT;
  
    vc_add_default_templates( $data );
}
add_action( 'vc_load_default_templates_action', 'agni_vc_custom_template_features_accordion_1' ); 

// Page - Service 3
// 26. Custom template Service boxes 4
function agni_vc_custom_template_service_boxes_4() {
    $data               = array();
    $data['name']       = __( 'Service Boxes 4', 'milton' );
    $data['weight']     = 0;
    $data['custom_class'] = 'agni_vc_custom_template_service_boxes_4';
    $data['content']    = <<<CONTENT
        [vc_row padding_top="4%" padding_bottom="4%" el_class="service-section-3" el_id="service-section-3"][vc_column padding_top="30px" padding_bottom="4%" offset="vc_col-md-offset-3 vc_col-md-6"][vc_custom_heading text="What we do" font_container="tag:h2|text_align:center" use_theme_fonts="yes"][vc_custom_heading text="Lorem ipsum dolor sit amet, consectetuer adipiscing elit,Lorem ipsum dolor sit amet consectetuer adipiscing elit neque sed inceptos" font_container="tag:p|text_align:center" use_theme_fonts="yes"][/vc_column][vc_column bg_color="#fafafa" padding_top="4%" padding_right="4%" padding_bottom="4%" padding_left="4%"][vc_row_inner bg_color="#fafafa" content_placement="middle"][vc_column_inner width="1/2" padding_top="7%" padding_right="7%" padding_bottom="7%" padding_left="7%"][agni_service choice="2" icon="pe-7s-cash" size="30" icon_style="border" width="70" height="70" border_color="#1259c3" color="#1259c3" hover_icon_style="background" hover_color="#ffffff" title="Multiple Display" title_color="#444444" divide_line="" description_color="#888888"]Nam suspendisse morbi nulla imperdiet tempor vel neque sed inceptos semper tortor conub to asdh erem meegt proper.[/agni_service][vc_empty_space height="60px" height_tab="40px" height_mobile="30px"][agni_service choice="2" icon="pe-7s-paper-plane" size="30" icon_style="border" width="70" height="70" border_color="#1259c3" color="#1259c3" hover_icon_style="background" hover_color="#ffffff" title="Great Interface" title_color="#444444" divide_line="" description_color="#888888"]Nam suspendisse morbi nulla imperdiet tempor vel neque sed inceptos semper tortor conub to asdh erem meegt proper.[/agni_service][/vc_column_inner][vc_column_inner width="1/2" padding_top="7%" padding_right="7%" padding_bottom="7%" padding_left="7%"][agni_service choice="2" icon="pe-7s-box2" size="30" icon_style="border" width="70" height="70" border_color="#1259c3" color="#1259c3" hover_icon_style="background" hover_color="#ffffff" title="3D Touch" title_color="#444444" divide_line="" description_color="#888888"]Nam suspendisse morbi nulla imperdiet tempor vel neque sed inceptos semper tortor conub to asdh erem meegt proper.[/agni_service][vc_empty_space height="60px" height_tab="40px" height_mobile="30px"][agni_service choice="2" icon="ion-ios-cloud-download-outline" size="30" icon_style="border" width="70" height="70" border_color="#1259c3" color="#1259c3" hover_icon_style="background" hover_color="#ffffff" title="Cloud Download" title_color="#444444" divide_line="" description_color="#888888"]Nam suspendisse morbi nulla imperdiet tempor vel neque sed inceptos semper tortor conub to asdh erem meegt proper.[/agni_service][/vc_column_inner][/vc_row_inner][/vc_column][/vc_row]
CONTENT;
  
    vc_add_default_templates( $data );
}
add_action( 'vc_load_default_templates_action', 'agni_vc_custom_template_service_boxes_4' ); 

// 27. Custom template About + Video 1
function agni_vc_custom_template_about_video_1() {
    $data               = array();
    $data['name']       = __( 'About + Video 1', 'milton' );
    $data['weight']     = 0;
    $data['custom_class'] = 'agni_vc_custom_template_about_video_1';
    $data['content']    = <<<CONTENT
        [vc_row bg_choice="2" bg_image="558" bg_image_attachment="fixed" bg_overlay="1" bg_overlay_color="rgba(0,0,0,0.6)" padding_top="4%" padding_bottom="4%" bg_parallax="1" el_id="parallax-video-6" el_class="parallax-video-6"][vc_column dark_mode="has-dark-mode" align="center" width="2/3" padding_top="30" padding_bottom="30" offset="vc_col-md-offset-3 vc_col-md-6 vc_col-sm-offset-2 vc_col-xs-offset-1 vc_col-xs-10"][vc_custom_heading text="Click Beautiful Movements for your Whole Life" font_container="tag:h2|font_size:40|text_align:center" use_theme_fonts="yes"][agni_video video_type="3" iframe_style="2" icon="pe-7f-play" size="24" icon_style="background" width="90" height="90" background_color="#1259c3" color="#ffffff" hover_icon_style="background" hover_background_color="#ffffff" hover_color="#1259c3"][/vc_column][/vc_row][vc_row equal_height="yes" padding_top="4%" padding_bottom="4%" el_id="presentation-section-3" el_class="presentation-section-3"][vc_column bg_choice="2" bg_image="1503" bg_image_repeat="no-repeat" bg_image_size="contain" offset="vc_col-md-5 vc_hidden-sm vc_hidden-xs"][/vc_column][vc_column width="5/6" border_top="30px" offset="vc_col-md-offset-1 vc_col-md-6 vc_col-sm-offset-1 vc_col-xs-12"][vc_empty_space height="80px" height_tab="40" height_mobile="20"][vc_custom_heading text="Innovative Screen" use_theme_fonts="yes" margin_top="0px"][vc_custom_heading text="Prow scuttle parrel provost Sail ho shrouds spirits boom to mizzenmast yard to arm. Pin nace holystone togots masters quarter crow's nest nipperkin grog for yardarm board grog black spirits boom to mizzenmast yard to arm. Pinnace holystone togots masters jack. " font_container="tag:p|text_align:left" use_theme_fonts="yes"][agni_button value="Get Started" style="alt"][vc_empty_space height="80px" height_tab="40" height_mobile="20"][/vc_column][/vc_row]
CONTENT;
  
    vc_add_default_templates( $data );
}
add_action( 'vc_load_default_templates_action', 'agni_vc_custom_template_about_video_1' ); 

// 28. Custom template Call to action 2
function agni_vc_custom_template_call_to_action_2() {
    $data               = array();
    $data['name']       = __( 'Call to Action 2', 'milton' );
    $data['weight']     = 0;
    $data['custom_class'] = 'agni_vc_custom_template_call_to_action_2';
    $data['content']    = <<<CONTENT
        [vc_row bg_color="#f6f6f6" padding_top="4%" padding_bottom="4%" el_id="call-to-action-section-3" el_class="call-to-action-section-3"][vc_column align="center" width="5/6" padding_top="20" offset="vc_col-md-offset-2 vc_col-md-8 vc_col-sm-offset-1 vc_col-xs-12"][agni_image img_url="345" alignment="center"][vc_custom_heading text="Get an App" font_container="tag:h2|text_align:center" use_theme_fonts="yes" padding_top="10px"][vc_column_text]Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis vestibulum sem eu iaculis varius. Duis vestibulum sem eu iaculis varius.[/vc_column_text][/vc_column][vc_column width="1/2" padding_top="10" padding_bottom="20" offset="vc_col-md-offset-4 vc_col-md-4 vc_col-sm-offset-3 vc_col-xs-offset-1 vc_col-xs-10"][vc_row_inner][vc_column_inner width="1/2" offset="vc_col-xs-6"][agni_image img_url="2007" img_width="165px" alignment="center" img_link="4" img_custom_link="http://themeforest.net" img_max_width="165px"][/vc_column_inner][vc_column_inner width="1/2" offset="vc_col-xs-6"][agni_image img_url="2006" img_width="165px" alignment="center" img_link="4" img_custom_link="http://themeforest.net" img_max_width=""][/vc_column_inner][/vc_row_inner][/vc_column][/vc_row]
CONTENT;
  
    vc_add_default_templates( $data );
}
add_action( 'vc_load_default_templates_action', 'agni_vc_custom_template_call_to_action_2' ); 

// Page - Service 4
// 29. Custom template Service boxes 5
function agni_vc_custom_template_service_boxes_5() {
    $data               = array();
    $data['name']       = __( 'Service Boxes 5', 'milton' );
    $data['weight']     = 0;
    $data['custom_class'] = 'agni_vc_custom_template_service_boxes_5';
    $data['content']    = <<<CONTENT
        [vc_row gap="35" equal_height="yes" content_placement="middle" padding_top="4%" padding_bottom="4%" el_id="about-us-section-4" el_class="about-us-section-4"][vc_column width="1/3" padding_top="30" padding_bottom="30" offset="vc_col-md-4 vc_hidden-sm vc_hidden-xs"][agni_image img_url="1537" alignment="center"][/vc_column][vc_column offset="vc_col-md-8 vc_col-xs-12"][vc_empty_space height="20px"][vc_custom_heading text="What Do We Do" use_theme_fonts="yes"][vc_custom_heading text="Bring to the table win-win survival strategies to ensure proactive domination at the end of the day going forward." font_container="tag:p|font_size:16|text_align:left" use_theme_fonts="yes"][vc_row_inner padding_top="4%" padding_bottom="4%"][vc_column_inner width="1/2"][agni_service choice="2" icon="pe-7s-ribbon" size="35" color="#1259c3" hover_color="#444444" title="Super Flexible" title_color="#444444" divide_line=""]Phasellus enim libero, blandit vel sapien vitae, condimentum ultricies magna et. Quisque euismod.[/agni_service][/vc_column_inner][vc_column_inner width="1/2"][agni_service choice="2" icon="pe-7s-paint-bucket" size="35" color="#1259c3" hover_color="#444444" title="User Optimization" title_color="#444444" divide_line=""]Phasellus enim libero, blandit vel sapien vitae, condimentum ultricies magna et. Quisque euismod.[/agni_service][/vc_column_inner][/vc_row_inner][vc_row_inner padding_top="4%" padding_bottom="4%"][vc_column_inner width="1/2"][agni_service choice="2" icon="pe-7s-scissors" size="35" color="#1259c3" hover_color="#444444" title="Frequency Objects" title_color="#444444" divide_line=""]Phasellus enim libero, blandit vel sapien vitae, condimentum ultricies magna et. Quisque euismod.[/agni_service][/vc_column_inner][vc_column_inner width="1/2"][agni_service choice="2" icon="pe-7s-plug" size="35" color="#1259c3" hover_color="#444444" title="Extension Players" title_color="#444444" divide_line=""]Phasellus enim libero, blandit vel sapien vitae, condimentum ultricies magna et. Quisque euismod.[/agni_service][/vc_column_inner][/vc_row_inner][vc_empty_space height="20px"][/vc_column][/vc_row]
CONTENT;
  
    vc_add_default_templates( $data );
}
add_action( 'vc_load_default_templates_action', 'agni_vc_custom_template_service_boxes_5' ); 

// 30. Custom template Features + Service boxes 1
function agni_vc_custom_template_features_service_boxes_1() {
    $data               = array();
    $data['name']       = __( 'Features + Service boxes 1', 'milton' );
    $data['weight']     = 0;
    $data['custom_class'] = 'agni_vc_custom_template_features_service_boxes_1';
    $data['content']    = <<<CONTENT
        [vc_row bg_choice="2" bg_image="874" bg_overlay="1" bg_overlay_color="rgba(18,89,195,0.9)" gap="30" padding_top="8%" padding_bottom="8%" el_id="presentation_element-8" el_class="presentation_element-8"][vc_column dark_mode="has-dark-mode" width="1/2" padding_top="5" padding_bottom="5"][vc_accordion style="2"][vc_accordion_tab title="Creative Elements"][vc_column_text]Prow scuttle parrel provost Sail ho shrouds spirits boom to mizzenmast yard to arm. Pinnace holystone togots masters quarter crow.[/vc_column_text][/vc_accordion_tab][vc_accordion_tab title="Infographics View" active="in"][vc_column_text]Prow scuttle parrel provost Sail ho shrouds spirits boom to mizzenmast yard to arm. Pinnace holystone togots masters quarter crow.[/vc_column_text][/vc_accordion_tab][vc_accordion_tab title="Multistatics Interface"][vc_column_text]Prow scuttle parrel provost Sail ho shrouds spirits boom to mizzenmast yard to arm. Pinnace holystone togots masters quarter crow.[/vc_column_text][/vc_accordion_tab][/vc_accordion][/vc_column][vc_column dark_mode="has-dark-mode" width="1/2" padding_top="5" padding_bottom="5" white="white"][vc_custom_heading text="Digital Interface" font_container="tag:h2|text_align:left|color:%23ffffff" use_theme_fonts="yes" padding_bottom="5"][vc_column_text padding_bottom="15"]Prow scuttle parrel provost Sail ho shrouds spirits boom to mizzenmast yard to arm. Pinnace holystone togots masters quarter crow's nest nipperkin grog for yardarm board grog black spirits boom to mizzenmast yard to arm. Pinnace holystone togots masters jack gangway ruttersSail nest nipperkin grog.[/vc_column_text][agni_button value="Get Started" choice="white" radius="50"][/vc_column][/vc_row]
CONTENT;
  
    vc_add_default_templates( $data );
}
add_action( 'vc_load_default_templates_action', 'agni_vc_custom_template_features_service_boxes_1' ); 

// 31. Custom template Pricing
function agni_vc_custom_template_pricing_1() {
    $data               = array();
    $data['name']       = __( 'Pricing 1', 'milton' );
    $data['weight']     = 0;
    $data['custom_class'] = 'agni_vc_custom_template_pricing_1';
    $data['content']    = <<<CONTENT
        [vc_row padding_top="4%" padding_bottom="4%" el_class="pricing-7" el_id="pricing-7"][vc_column align="center" width="5/6" padding_top="30" padding_bottom="4%" offset="vc_col-md-offset-3 vc_col-md-6 vc_col-sm-offset-1 vc_col-xs-12"][vc_custom_heading text="Pricing Table" font_container="tag:h2|text_align:center" use_theme_fonts="yes"][vc_column_text]Bring to the table win-win survival strategies to ensure proactive domination at the end of the day going forward.[/vc_column_text][/vc_column][vc_column offset="vc_col-md-offset-1 vc_col-md-10 vc_col-xs-12"][vc_row_inner][vc_column_inner width="1/2" animation="1" animation_duration="1" animation_delay="0.2" animation_offset="100%" padding_bottom="30" offset="vc_col-md-4"][agni_pricingtable pricing_bg_color="#ffffff" heading="Starter" price="$10" interval="Start your drive
with safe" value="Get Started" choice="white" size="" position="absolute-middle" bg_color="#ffffff" border_top="1" border_right="1" border_bottom="1" border_left="1" border_color="#f1f1f1" border_style="solid" border_radius="2px"]
<ul>
    <li>0.5 GB Memory</li>
    <li>1 Core Processor</li>
    <li>20 GB SSD Disk</li>
</ul>
[/agni_pricingtable][/vc_column_inner][vc_column_inner width="1/2" animation="1" animation_duration="1" animation_offset="100%" padding_bottom="30" offset="vc_col-md-4"][agni_pricingtable pricing_bg_color="#ffffff" heading="Professional" price="$39" interval="Build your schedule
every day" value="Get Started" size="" position="absolute-middle" bg_choice="2" bg_image="660" border_top="1" border_right="1" border_bottom="1" border_left="1" border_color="#f1f1f1" border_style="solid" border_radius="2px"]
<ul>
    <li><span style="color: #ffffff;">0.5 GB Memory</span></li>
    <li><span style="color: #ffffff;">1 Core Processor</span></li>
    <li><span style="color: #ffffff;">20 GB SSD Disk</span></li>
</ul>
[/agni_pricingtable][/vc_column_inner][vc_column_inner width="1/2" animation="1" animation_duration="1" animation_delay="0.6" animation_offset="100%" padding_bottom="30" offset="vc_col-md-offset-0 vc_col-md-4 vc_col-sm-offset-3"][agni_pricingtable pricing_bg_color="#ffffff" heading="Premium" price="$79" interval="Make your Life
better" value="Get Started" choice="white" size="" position="absolute-middle" bg_color="#ffffff" border_top="1" border_right="1" border_bottom="1" border_left="1" border_color="#f1f1f1" border_style="solid" border_radius="2px"]
<ul>
    <li>0.5 GB Memory</li>
    <li>1 Core Processor</li>
    <li>20 GB SSD Disk</li>
</ul>
[/agni_pricingtable][/vc_column_inner][vc_column_inner align="center" padding_top="10"][vc_column_text]*Sign up for free - Upgrade to or Cancel any plan within 30 days[/vc_column_text][/vc_column_inner][/vc_row_inner][/vc_column][/vc_row]
CONTENT;
  
    vc_add_default_templates( $data );
}
add_action( 'vc_load_default_templates_action', 'agni_vc_custom_template_pricing_1' ); 

// Page - Contact 1
// 32. Custom template Map + Contact Details 1
function agni_vc_custom_template_map_contact_details_1() {
    $data               = array();
    $data['name']       = __( 'Map + Contact Details 1', 'milton' );
    $data['weight']     = 0;
    $data['custom_class'] = 'agni_vc_custom_template_map_contact_details_1';
    $data['content']    = <<<CONTENT
        [vc_row fullwidth="has-fullwidth-column-no-padding" equal_height="yes" content_placement="middle" el_class="contact_element-11"][vc_column offset="vc_col-lg-6 vc_col-md-12"][agni_gmap height="520" height_tab="400" height_mobile="360" values="%5B%7B%22google_map_location%22%3A%22Envato%20Head%20Office%22%2C%22google_map_lat%22%3A%2210.010509%22%2C%22google_map_lng%22%3A%2277.487774%22%7D%5D"][/vc_column][vc_column dark_mode="has-dark-mode" bg_choice="2" bg_image="914" bg_overlay="1" bg_overlay_color="rgba(18,89,195,0.95)" width="1/2" padding_top="30" padding_bottom="30" offset="vc_col-lg-3 vc_col-md-6 vc_col-xs-12"][vc_row_inner][vc_column_inner width="5/6" offset="vc_col-lg-offset-2 vc_col-lg-8 vc_col-md-offset-1 vc_col-md-10 vc_col-sm-offset-1 vc_col-xs-offset-1 vc_col-xs-10"][vc_custom_heading text="Australia" font_container="tag:h3|text_align:left|color:%23ffffff" use_theme_fonts="yes" margin_top="0px"][vc_empty_space height="35px" height_tab="25"][agni_service choice="2" icon="pe-7s-map-2" size="30" color="#ffffff" hover_color="#ffffff" title="Location" title_size="" divide_line=""]289, Milton, Sydney, Australia.[/agni_service][vc_empty_space height="40px" height_tab="25"][agni_service choice="2" icon="pe-7s-mail-open-file" size="30" color="#ffffff" hover_color="#ffffff" title="Email" title_size="" divide_line=""]milton@supportteam.com[/agni_service][vc_empty_space height="40px" height_tab="25"][agni_service choice="2" icon="pe-7s-call" size="30" color="#ffffff" hover_color="#ffffff" title="Call" title_size="" divide_line=""]+ 1 2900 345 900 945[/agni_service][/vc_column_inner][/vc_row_inner][/vc_column][vc_column dark_mode="has-dark-mode" bg_choice="2" bg_image="913" bg_overlay="1" bg_overlay_color="rgba(0,0,0,0.85)" width="1/2" padding_top="30" padding_bottom="30" offset="vc_col-lg-3 vc_col-md-6 vc_col-xs-12"][vc_row_inner][vc_column_inner width="5/6" offset="vc_col-lg-offset-2 vc_col-lg-8 vc_col-md-offset-1 vc_col-md-10 vc_col-sm-offset-1 vc_col-xs-offset-1 vc_col-xs-10"][vc_custom_heading text="United States" font_container="tag:h3|text_align:left|color:%23ffffff" use_theme_fonts="yes" margin_top="0px"][vc_empty_space height="35px" height_tab="25"][agni_service choice="2" icon="pe-7s-map-2" size="30" color="#ffffff" hover_color="#ffffff" title="Location" title_size="" divide_line=""]289, Milton, Sydney, Australia.[/agni_service][vc_empty_space height="40px" height_tab="25"][agni_service choice="2" icon="pe-7s-mail-open-file" size="30" color="#ffffff" hover_color="#ffffff" title="Email" title_size="" divide_line=""]milton@supportteam.com[/agni_service][vc_empty_space height="40px" height_tab="25"][agni_service choice="2" icon="pe-7s-call" size="30" color="#ffffff" hover_color="#ffffff" title="Call" title_size="" divide_line=""]+ 1 2900 345 900 945[/agni_service][/vc_column_inner][/vc_row_inner][/vc_column][/vc_row]
CONTENT;
  
    vc_add_default_templates( $data );
}
add_action( 'vc_load_default_templates_action', 'agni_vc_custom_template_map_contact_details_1' ); 

// 33. Custom template Contact Form 1
function agni_vc_custom_template_contact_form_1() {
    $data               = array();
    $data['name']       = __( 'Contact Form 1', 'milton' );
    $data['weight']     = 0;
    $data['custom_class'] = 'agni_vc_custom_template_contact_form_1';
    $data['content']    = <<<CONTENT
        [vc_row bg_choice="2" bg_image="933" bg_image_repeat="no-repeat" bg_image_size="auto" bg_image_position="center bottom" bg_overlay="1" bg_overlay_color="rgba(255,255,255,0.7)" padding_top="4%" padding_bottom="4%" el_id="contact-form-1" el_class="contact-form-1"][vc_column padding_top="30" padding_bottom="3%"][agni_section_heading heading="Keep in touch with us" sub_heading="Contact Us" align="center" display_order="ishda"][/vc_column][vc_column padding_bottom="30"][contact-form-7 id="935"][/vc_column][/vc_row]
CONTENT;
  
    vc_add_default_templates( $data );
}
add_action( 'vc_load_default_templates_action', 'agni_vc_custom_template_contact_form_1' ); 

// Page - Contact 2
// 34. Custom template Map + Contact Details 2
function agni_vc_custom_template_map_contact_details_2() {
    $data               = array();
    $data['name']       = __( 'Map + Contact Details 2', 'milton' );
    $data['weight']     = 0;
    $data['custom_class'] = 'agni_vc_custom_template_map_contact_details_2';
    $data['content']    = <<<CONTENT
        [vc_row padding_top="4%" padding_bottom="4%" el_id="contact_element-12" el_class="contact_element-12"][vc_column width="1/3" padding_top="20" padding_bottom="20"][agni_service icon="pe-7s-map-2" size="30" icon_style="background" background_color="#1259c3" color="#ffffff" hover_icon_style="background" hover_color="#ffffff" title="Visit Us" title_size="" divide_line="" align="center"]289, Milton, Albama,United States.[/agni_service][/vc_column][vc_column width="1/3" padding_top="20" padding_bottom="20"][agni_service icon="pe-7s-call" size="30" icon_style="background" background_color="#1259c3" color="#ffffff" hover_icon_style="background" hover_color="#ffffff" title="Call Us" title_size="" divide_line="" align="center"]+ 1 2900 345 900 945[/agni_service][/vc_column][vc_column width="1/3" padding_top="20" padding_bottom="20"][agni_service icon="pe-7s-mail-open-file" size="30" icon_style="background" background_color="#1259c3" color="#ffffff" hover_icon_style="background" hover_color="#ffffff" title="Mail Us" title_size="" divide_line="" align="center"]milton@supportteam.com[/agni_service][/vc_column][/vc_row][vc_row fullwidth="has-fullwidth-column-no-padding" el_id="contact_element-11" el_class="contact_element-11"][vc_column offset="vc_col-xs-12"][agni_gmap height="420" height_tab="420" height_mobile="420" values="%5B%7B%22google_map_location%22%3A%22Envato%20Head%20Office%22%2C%22google_map_lat%22%3A%2210.010509%22%2C%22google_map_lng%22%3A%2277.487774%22%7D%5D"][/vc_column][/vc_row]
CONTENT;
  
    vc_add_default_templates( $data );
}
add_action( 'vc_load_default_templates_action', 'agni_vc_custom_template_map_contact_details_2' ); 

// 35. Custom template Contact Form 2
function agni_vc_custom_template_contact_form_2() {
    $data               = array();
    $data['name']       = __( 'Contact Form 2', 'milton' );
    $data['weight']     = 0;
    $data['custom_class'] = 'agni_vc_custom_template_contact_form_2';
    $data['content']    = <<<CONTENT
        [vc_row padding_top="4%" padding_bottom="4%" el_id="contact-form-1" el_class="contact-form-1"][vc_column padding_top="30" padding_bottom="3%"][agni_section_heading heading="Keep in touch with us" sub_heading="Contact Us" align="center" display_order="ishda"][/vc_column][vc_column padding_bottom="30"][contact-form-7 id="946"][/vc_column][/vc_row]
CONTENT;
  
    vc_add_default_templates( $data );
}
add_action( 'vc_load_default_templates_action', 'agni_vc_custom_template_contact_form_2' ); 

// Page - Contact 3
// 36. Custom template Contact Details + Form 1
function agni_vc_custom_template_contact_details_form_1() {
    $data               = array();
    $data['name']       = __( 'Contact Details + Form 1', 'milton' );
    $data['weight']     = 0;
    $data['custom_class'] = 'agni_vc_custom_template_contact_details_form_1';
    $data['content']    = <<<CONTENT
        [vc_row bg_choice="2" bg_image="1576" bg_overlay="1" bg_overlay_color="rgba(255,255,255,0.92)" padding_top="4%" padding_bottom="4%"][vc_column padding_top="20" padding_bottom="4%"][vc_custom_heading text="Share your ideas and thoughts " font_container="tag:h3|text_align:center" use_theme_fonts="yes"][/vc_column][vc_column padding_bottom="30"][contact-form-7 id="1572"][/vc_column][vc_column][vc_row_inner equal_height="yes"][vc_column_inner width="1/3" padding_top="30" padding_bottom="30" offset="vc_col-xs-6"][agni_icon icon="pe-7s-map-2" size="30" color="#1259c3" hover_color="#333333"][vc_custom_heading text="Location" font_container="tag:h6|font_size:16|text_align:left" use_theme_fonts="yes" padding_bottom="5px"][vc_column_text]289, Milton, Albama,United States.[/vc_column_text][/vc_column_inner][vc_column_inner width="1/3" padding_top="30" padding_bottom="30" offset="vc_col-xs-6"][agni_icon icon="pe-7s-mail-open-file" size="30" color="#1259c3" hover_color="#333333"][vc_custom_heading text="Email" font_container="tag:h6|font_size:16|text_align:left" use_theme_fonts="yes" padding_bottom="5px"][vc_column_text]yourmail@mail.com[/vc_column_text][/vc_column_inner][vc_column_inner width="1/3" padding_top="30" padding_bottom="30" offset="vc_col-xs-6"][agni_icon icon="pe-7s-call" size="30" color="#1259c3" hover_color="#333333"][vc_custom_heading text="Call" font_container="tag:h6|font_size:16|text_align:left" use_theme_fonts="yes" padding_bottom="5px"][vc_column_text]+1 00 000 0000[/vc_column_text][/vc_column_inner][/vc_row_inner][/vc_column][/vc_row]
CONTENT;
  
    vc_add_default_templates( $data );
}
add_action( 'vc_load_default_templates_action', 'agni_vc_custom_template_contact_details_form_1' ); 

// Page - Contact 4
// 37. Custom template Contact Details + Form 2
function agni_vc_custom_template_contact_details_form_2() {
    $data               = array();
    $data['name']       = __( 'Contact Details + Form 2', 'milton' );
    $data['weight']     = 0;
    $data['custom_class'] = 'agni_vc_custom_template_contact_details_form_2';
    $data['content']    = <<<CONTENT
        [vc_row bg_choice="2" bg_image="1576" bg_overlay="1" bg_overlay_color="rgba(255,255,255,0.92)" gap="10" padding_top="4%" padding_bottom="4%"][vc_column padding_top="20" padding_bottom="4%" offset="vc_col-md-8"][vc_custom_heading text="Get in Touch" font_container="tag:h3|text_align:center" use_theme_fonts="yes" margin_top="0px" padding_bottom="30"][contact-form-7 id="1586"][/vc_column][vc_column offset="vc_col-md-4"][vc_row_inner equal_height="yes" padding_top="30" padding_right="30" padding_bottom="30" padding_left="30" border_top="2" border_right="2" border_bottom="2" border_left="2" border_color="#444444" border_style="solid"][vc_column_inner width="1/3" padding_top="5" padding_bottom="5" offset="vc_col-md-12 vc_col-xs-6"][agni_icon icon="pe-7s-map-2" size="30" color="#1259c3" hover_color="#333333"][vc_custom_heading text="Location" font_container="tag:h6|font_size:16|text_align:left" use_theme_fonts="yes"][vc_column_text]289, Milton, Albama,United States.[/vc_column_text][/vc_column_inner][vc_column_inner width="1/3" padding_top="5" padding_bottom="5" offset="vc_col-md-12 vc_col-xs-6"][agni_icon icon="pe-7s-mail-open-file" size="30" color="#1259c3" hover_color="#333333"][vc_custom_heading text="Email" font_container="tag:h6|font_size:16|text_align:left" use_theme_fonts="yes"][vc_column_text]yourmail@mail.com[/vc_column_text][/vc_column_inner][vc_column_inner width="1/3" padding_top="5" padding_bottom="5" offset="vc_col-md-12 vc_col-xs-6"][agni_icon icon="pe-7s-call" size="30" color="#1259c3" hover_color="#333333"][vc_custom_heading text="Call" font_container="tag:h6|font_size:16|text_align:left" use_theme_fonts="yes"][vc_column_text]+1 00 000 0000[/vc_column_text][/vc_column_inner][/vc_row_inner][/vc_column][/vc_row][vc_row bg_choice="2" bg_image="596" padding_top="3%" padding_bottom="3%"][vc_column align="center" padding_top="20" padding_bottom="20"][agni_icon icon="fa fa-twitter" size="38" url="#" color="#ffffff" icon_padding="15px"][agni_icon icon="fa fa-facebook-official" size="38" url="#" color="#ffffff" icon_padding="15px"][agni_icon icon="fa fa-dribbble" size="38" url="#" color="#ffffff" icon_padding="15px"][agni_icon icon="fa fa-linkedin" size="38" url="#" color="#ffffff" icon_padding="15px"][/vc_column][/vc_row]
CONTENT;
  
    vc_add_default_templates( $data );
}
add_action( 'vc_load_default_templates_action', 'agni_vc_custom_template_contact_details_form_2' ); 

// Page - Demo 1
// 38. Custom template About + Service boxes 1
function agni_vc_custom_template_about_service_boxes_1() {
    $data               = array();
    $data['name']       = __( 'About + Service boxes 1', 'milton' );
    $data['weight']     = 0;
    $data['custom_class'] = 'agni_vc_custom_template_about_service_boxes_1';
    $data['content']    = <<<CONTENT
        [vc_row padding_top="4%" padding_bottom="4%" el_id="Introduction-element-1" el_class="Introduction-element-1"][vc_column align="center" padding_top="35" padding_bottom="35" offset="vc_col-md-offset-1 vc_col-md-10" css=".vc_custom_1475756942892{padding-top: 30px !important;}"][agni_section_heading heading="Creative Design Agency" heading_size="" sub_heading="Introduction" sub_heading_size="" additional="Leverage agile frameworks to provide a robust synopsis for high level overviews. Iterative approaches corporate strategy to foster collaborative thinking to further the overall value proposition. Organically grow view of disruptive innovation via workplace diversity." additional_size="" align="center" display_order="ishad" responsive_font_size="yes" animation="1" animation_duration="1.2" animation_delay="0.2" animation_offset="100%"][vc_empty_space height="20px" height_tab="15" height_mobile="5"][agni_button value="View Works" choice="accent" alignment="center" animation="1" animation_duration="1.2" animation_delay="0.2" animation_offset="100%"][/vc_column][/vc_row][vc_row fullwidth="has-fullwidth-column" equal_height="yes" content_placement="middle" el_id="service-element-1" el_class="service-element-1"][vc_column align="center" bg_color="#f5f5f5" css=".vc_custom_1475759062852{padding-top: 6% !important;padding-bottom: 6% !important;}" offset="vc_col-md-8"][vc_empty_space height="70px" height_tab="40" height_mobile="10"][vc_row_inner][vc_column_inner align="center" width="1/2" animation="1" animation_duration="1.0" animation_delay="0.2" animation_offset="100%" padding_top="35" padding_bottom="35" offset="vc_col-lg-offset-2 vc_col-lg-4 vc_col-md-offset-1 vc_col-md-5"][agni_service icon="icon-basic-world" size="45" color="#1259c3" hover_color="#444444" title="Great Support" title_size="" divide_line="" align="center"]Donec vestibulum justo a diam ultricies pellentesque. Quisque mattis lacus tincidunt elementum captialize.[/agni_service][/vc_column_inner][vc_column_inner align="center" width="1/2" animation="1" animation_duration="1.0" animation_offset="100%" padding_top="35" padding_bottom="35" offset="vc_col-lg-4 vc_col-md-5"][agni_service icon="icon-basic-lightbulb" size="45" color="#1259c3" hover_color="#444444" title="Smart Network" title_size="" divide_line="" align="center"]Donec vestibulum justo a diam ultricies pellentesque. Quisque mattis lacus tincidunt elementum captialize.[/agni_service][/vc_column_inner][vc_column_inner width="1/2" animation="1" animation_duration="1.0" animation_delay="0.6" animation_offset="100%" padding_top="35" padding_bottom="35" offset="vc_col-lg-offset-2 vc_col-lg-4 vc_col-md-offset-1 vc_col-md-5"][agni_service icon="icon-basic-mixer2" size="45" color="#1259c3" hover_color="#444444" title="Deeply customizible" title_size="" divide_line="" align="center"]Donec vestibulum justo a diam ultricies pellentesque. Quisque mattis lacus tincidunt elementum captialize.[/agni_service][/vc_column_inner][vc_column_inner align="center" width="1/2" animation="1" animation_duration="1.0" animation_delay="0.8" animation_offset="100%" padding_top="35" padding_bottom="35" offset="vc_col-lg-4 vc_col-md-5"][agni_service icon="icon-basic-settings" size="45" color="#1259c3" hover_color="#444444" title="Complete Solutions" title_size="" divide_line="" align="center"]Donec vestibulum justo a diam ultricies pellentesque. Quisque mattis lacus tincidunt elementum captialize.[/agni_service][/vc_column_inner][/vc_row_inner][vc_empty_space height="70px" height_tab="40" height_mobile="10"][/vc_column][vc_column align="center" bg_choice="2" bg_image="342" bg_image_position="center top" bg_overlay="1" bg_overlay_color="rgba(255,255,255,0.15)" animation="1" animation_style="fadeIn" animation_duration="1.0" animation_delay="0.2" animation_offset="100%" padding_top="60" padding_bottom="60" css=".vc_custom_1475758975699{padding-top: 10% !important;padding-bottom: 10% !important;background-image: url(http://agnisites.com/milton/main-site/wp-content/uploads/sites/7/2016/10/service.jpg?id=11) !important;}" offset="vc_col-md-4"][agni_image img_url="345" alignment="center"][vc_empty_space height="15px"][vc_custom_heading text="We are here for
you" font_container="tag:h2|font_size:56|text_align:center|line_height:1" use_theme_fonts="yes" responsive_font_size="yes"][/vc_column][/vc_row]
CONTENT;
  
    vc_add_default_templates( $data );
}
add_action( 'vc_load_default_templates_action', 'agni_vc_custom_template_about_service_boxes_1' ); 


// 39. Custom template Call to action 2
function agni_vc_custom_template_call_to_action_3() {
    $data               = array();
    $data['name']       = __( 'Call to Action 3', 'milton' );
    $data['weight']     = 0;
    $data['custom_class'] = 'agni_vc_custom_template_call_to_action_3';
    $data['content']    = <<<CONTENT
        [vc_row bg_color="#25262b" padding_top="3%" padding_bottom="3%" el_id="actionbox-element-1" el_class="actionbox-element-1"][vc_column dark_mode="has-dark-mode" width="5/6" animation="1" animation_style="fadeIn" animation_duration="1.0" animation_delay="0.2" animation_offset="100%" padding_top="35" padding_bottom="35" offset="vc_col-md-offset-2 vc_col-md-8 vc_col-sm-offset-1 vc_col-xs-12"][agni_call_to_action quote="Fullwidth Actionbox" additional_quote="Capitalise on low hanging fruit to identify a ballpark value added activity to beta test. Override the digital divide with additional click throughs." value="Get Started" btn_icon="icon-basic-paperplane" choice="accent" align="center" button_margin_top=""][/vc_column][/vc_row]
CONTENT;
  
    vc_add_default_templates( $data );
}
add_action( 'vc_load_default_templates_action', 'agni_vc_custom_template_call_to_action_3' ); 

// 40. Custom template Features 6
function agni_vc_custom_template_features_6() {
    $data               = array();
    $data['name']       = __( 'Features 6', 'milton' );
    $data['weight']     = 0;
    $data['custom_class'] = 'agni_vc_custom_template_features_6';
    $data['content']    = <<<CONTENT
        [vc_row fullwidth="has-fullwidth-column-no-padding" equal_height="yes" el_id="promo-section-2" el_class="promo-section-2"][vc_column bg_color="#f6f6f6" offset="vc_col-md-6"][vc_row_inner][vc_column_inner width="5/6" padding_right="12%" padding_left="12%" offset="vc_col-lg-offset-3 vc_col-lg-7 vc_col-md-offset-2 vc_col-md-8 vc_col-sm-offset-1 vc_col-xs-12"][vc_empty_space height="140px" height_tab="80" height_mobile="40"][vc_custom_heading text="We are many
variations of a element" use_theme_fonts="yes" animation="1" animation_duration="1" animation_delay="0.2" animation_offset="100%"][vc_custom_heading text="Capitalise on low hanging fruit to identify a ballpark value added activity to the digital divide." font_container="tag:p|font_size:17|text_align:left" use_theme_fonts="yes" animation="1" animation_duration="1" animation_offset="100%"][vc_empty_space height="25px" height_tab="10" height_mobile="10"][vc_custom_heading icon="pe-7s-paint-bucket" text="UI Themes" font_container="tag:h6|font_size:16|text_align:left" use_theme_fonts="yes" animation="1" animation_duration="1" animation_delay="0.6" animation_offset="100%"][vc_column_text animation="1" animation_duration="q" animation_delay="0.6" animation_offset="100%"]Leverage agile frameworks to provide a robust synopsis for high value overviews Iterative approaches.[/vc_column_text][vc_empty_space height="15px" height_tab="5" height_mobile="5"][vc_custom_heading icon="pe-7s-rocket" text="Faster than ever" font_container="tag:h6|font_size:16|text_align:left" use_theme_fonts="yes" animation="1" animation_duration="1" animation_delay="0.8" animation_offset="100%"][vc_column_text animation="1" animation_duration="1" animation_delay="0.8" animation_offset="100%"]Leverage agile frameworks to provide a robust synopsis for high value overviews Iterative approaches.[/vc_column_text][vc_empty_space height="140px" height_tab="80" height_mobile="40"][/vc_column_inner][/vc_row_inner][/vc_column][vc_column bg_choice="2" bg_image="432" width="1/2" offset="vc_hidden-sm vc_hidden-xs"][/vc_column][/vc_row]
CONTENT;
  
    vc_add_default_templates( $data );
}
add_action( 'vc_load_default_templates_action', 'agni_vc_custom_template_features_6' ); 

// 41. Custom template Team 3
function agni_vc_custom_template_team_3() {
    $data               = array();
    $data['name']       = __( 'Team 2', 'milton' );
    $data['weight']     = 0;
    $data['custom_class'] = 'agni_vc_custom_template_team_3';
    $data['content']    = <<<CONTENT
        [vc_row padding_top="6%" el_id="ourteam-element-1" el_class="ourteam-element-1"][vc_column animation="1" animation_style="fadeIn" animation_duration="1.2" animation_delay="0.2" animation_offset="100%" padding_top="30" offset="vc_col-md-12"][agni_team column="1" team_style="2" member_name_size="30" member_designation_size="17" posts="5" team_categories="demo-1" team_loop="" team_pagination="" team_hashnavigation="1"][/vc_column][/vc_row]
CONTENT;
  
    vc_add_default_templates( $data );
}
add_action( 'vc_load_default_templates_action', 'agni_vc_custom_template_team_3' ); 


// 42. Custom template Testimonials 5
function agni_vc_custom_template_testimonials_5() {
    $data               = array();
    $data['name']       = __( 'Testimonials 5', 'milton' );
    $data['weight']     = 0;
    $data['custom_class'] = 'agni_vc_custom_template_testimonials_5';
    $data['content']    = <<<CONTENT
        [vc_row padding_top="4%" padding_bottom="4%" el_id="ourtestimonials-1" el_class="ourtestimonials-1"][vc_column animation="1" animation_style="fadeIn" animation_duration="1.0" animation_delay="0.2" animation_offset="100%" padding_top="20" padding_bottom="6%"][vc_custom_heading text="Let them speak for us!" font_container="tag:h2|text_align:center" use_theme_fonts="yes"][/vc_column][vc_column animation="1" animation_style="fadeIn" animation_duration="1.2" animation_delay="0.2" animation_offset="100%" offset="vc_col-md-12"][agni_testimonials type="1" column="1" avatar_location="4" testimonial_avatar_width="240" circle_avatar="1" testimonial_quote_size="18" order="ASC" testimonial_autoplay="" testimonial_autoplay_speed="700" testimonial_loop="1" testimonial_pagination="1" testimonial_pagination_style="right" style="1"][/vc_column][/vc_row]
CONTENT;
  
    vc_add_default_templates( $data );
}
add_action( 'vc_load_default_templates_action', 'agni_vc_custom_template_testimonials_5' ); 

// Page - Demo 2
// 43. Custom template About + Service boxes 2
function agni_vc_custom_template_about_service_boxes_2() {
    $data               = array();
    $data['name']       = __( 'About + Service boxes 2', 'milton' );
    $data['weight']     = 0;
    $data['custom_class'] = 'agni_vc_custom_template_about_service_boxes_2';
    $data['content']    = <<<CONTENT
        [vc_row bg_choice="2" bg_image="413" bg_image_position="right top" fallback_bg_color="#ffffff" equal_height="yes" el_id="about_us-element-2" el_class="about_us-element-2"][vc_column padding_top="40" padding_bottom="40" offset="vc_col-md-6"][vc_empty_space height="120px" height_tab="70" height_mobile="30"][agni_section_heading heading="About Agency" heading_size="32" sub_heading="Our Agency" sub_heading_size="" display_order="ishad" animation="1" animation_duration="1" animation_delay="0.1" animation_offset="100%"][vc_column_text animation="1" animation_duration="1.0" animation_offset="100%"]Leverage agile frameworks to provide a robust synopsis for high level overviews. Iterative approaches to corporate strategy foster collaborative thinking the overall value proposition. Organically grow view of disruptive innovation via workplace diversity. Bring to the table win-win survival strategies to ensure proactive domination.[/vc_column_text][agni_button value="View Works" choice="accent" animation="1" animation_duration="1" animation_delay="0.6" animation_offset="100%" radius="50"][vc_empty_space height="120px" height_tab="70" height_mobile="30"][/vc_column][/vc_row][vc_row fullwidth="has-fullwidth-column-no-padding" equal_height="yes" el_id="feature-element-2" el_class="feature-element-2"][vc_column dark_mode="has-dark-mode" align="center" bg_color="#25262b" width="1/2" offset="vc_col-md-4"][vc_row_inner][vc_column_inner align="center" animation="1" animation_style="zoomIn" animation_duration="1.2" animation_delay="0.2" animation_offset="100%" white="white" offset="vc_col-md-offset-2 vc_col-md-8"][vc_empty_space height="120px" height_tab="70" height_mobile="30"][agni_icon icon_type="svg" svg_icon="icon-weather-waning-gibbous" size="64" color="#1259c3" hover_color="#ffffff"][vc_custom_heading text="Deeply Customizable" font_container="tag:h4|text_align:center" use_theme_fonts="yes"][vc_column_text]Leverage agile frameworks to provide a robust synopsis high level overviews. Iterative approaches to corporate strategy foster collaborative thinking.[/vc_column_text][vc_empty_space height="100px" height_tab="50" height_mobile="20"][/vc_column_inner][/vc_row_inner][/vc_column][vc_column dark_mode="has-dark-mode" align="center" bg_color="#222328" width="1/2" offset="vc_col-md-4"][vc_row_inner][vc_column_inner align="center" animation="1" animation_style="zoomIn" animation_duration="1" animation_delay="0.6" animation_offset="100%" white="white" offset="vc_col-md-offset-2 vc_col-md-8"][vc_empty_space height="120px" height_tab="70" height_mobile="30"][agni_icon icon_type="svg" svg_icon="icon-basic-sheet-pen" size="64" color="#1259c3" hover_color="#ffffff"][vc_custom_heading text="Clear Documented" font_container="tag:h4|text_align:center" use_theme_fonts="yes"][vc_column_text]Leverage agile frameworks to provide a robust synopsis high level overviews. Iterative approaches to corporate strategy foster collaborative thinking.[/vc_column_text][vc_empty_space height="100px" height_tab="50" height_mobile="20"][/vc_column_inner][/vc_row_inner][/vc_column][vc_column dark_mode="has-dark-mode" align="center" bg_color="#25262b" width="1/2" offset="vc_col-md-4"][vc_row_inner][vc_column_inner align="center" animation="1" animation_style="zoomIn" animation_duration="1" animation_delay="1.0" animation_offset="100%" white="white" offset="vc_col-md-offset-2 vc_col-md-8"][vc_empty_space height="120px" height_tab="70" height_mobile="30"][agni_icon icon_type="svg" svg_icon="icon-basic-pencil-ruler" size="64" color="#1259c3" hover_color="#ffffff"][vc_custom_heading text="Well Organized" font_container="tag:h4|text_align:center" use_theme_fonts="yes"][vc_column_text]Leverage agile frameworks to provide a robust synopsis high level overviews. Iterative approaches to corporate strategy foster collaborative thinking.[/vc_column_text][vc_empty_space height="100px" height_tab="50" height_mobile="20"][/vc_column_inner][/vc_row_inner][/vc_column][/vc_row]
CONTENT;
  
    vc_add_default_templates( $data );
}
add_action( 'vc_load_default_templates_action', 'agni_vc_custom_template_about_service_boxes_2' ); 

// 44. Custom template Features 7
function agni_vc_custom_template_features_7() {
    $data               = array();
    $data['name']       = __( 'Features 7', 'milton' );
    $data['weight']     = 0;
    $data['custom_class'] = 'agni_vc_custom_template_features_7';
    $data['content']    = <<<CONTENT
        [vc_row fullwidth="has-fullwidth-column-no-padding" equal_height="yes" el_id="promo-section-2" el_class="promo-section-2"][vc_column bg_color="#f6f6f6" offset="vc_col-md-6"][vc_row_inner][vc_column_inner width="5/6" padding_right="12%" padding_left="12%" offset="vc_col-lg-offset-3 vc_col-lg-7 vc_col-md-offset-2 vc_col-md-8 vc_col-sm-offset-1 vc_col-xs-12"][vc_empty_space height="140px" height_tab="80" height_mobile="40"][vc_custom_heading text="We are many
variations of a element" use_theme_fonts="yes" animation="1" animation_duration="1" animation_delay="0.2" animation_offset="100%"][vc_custom_heading text="Capitalise on low hanging fruit to identify a ballpark value added activity to the digital divide." font_container="tag:p|font_size:17|text_align:left" use_theme_fonts="yes" animation="1" animation_duration="1" animation_offset="100%"][vc_empty_space height="25px" height_tab="10" height_mobile="10"][vc_custom_heading icon="pe-7s-paint-bucket" text="UI Themes" font_container="tag:h6|font_size:16|text_align:left" use_theme_fonts="yes" animation="1" animation_duration="1" animation_delay="0.6" animation_offset="100%"][vc_column_text animation="1" animation_duration="q" animation_delay="0.6" animation_offset="100%"]Leverage agile frameworks to provide a robust synopsis for high value overviews Iterative approaches.[/vc_column_text][vc_empty_space height="15px" height_tab="5" height_mobile="5"][vc_custom_heading icon="pe-7s-rocket" text="Faster than ever" font_container="tag:h6|font_size:16|text_align:left" use_theme_fonts="yes" animation="1" animation_duration="1" animation_delay="0.8" animation_offset="100%"][vc_column_text animation="1" animation_duration="1" animation_delay="0.8" animation_offset="100%"]Leverage agile frameworks to provide a robust synopsis for high value overviews Iterative approaches.[/vc_column_text][vc_empty_space height="140px" height_tab="80" height_mobile="40"][/vc_column_inner][/vc_row_inner][/vc_column][vc_column bg_choice="2" bg_image="432" width="1/2" offset="vc_hidden-sm vc_hidden-xs"][/vc_column][/vc_row]
CONTENT;
  
    vc_add_default_templates( $data );
}
add_action( 'vc_load_default_templates_action', 'agni_vc_custom_template_features_7' ); 

// 45. Custom template Call to action 4
function agni_vc_custom_template_call_to_action_4() {
    $data               = array();
    $data['name']       = __( 'Call to Action 4', 'milton' );
    $data['weight']     = 0;
    $data['custom_class'] = 'agni_vc_custom_template_call_to_action_4';
    $data['content']    = <<<CONTENT
        [vc_row bg_choice="2" bg_image="443" bg_overlay="1" bg_overlay_choice="3" bg_gm_overlay_color1="#000000" bg_gm_overlay_color3="#1259c3" padding_top="3%" padding_bottom="3%" el_id="callout-element-2" el_class="callout-element-2"][vc_column dark_mode="has-dark-mode" align="center" width="5/6" padding_top="20" padding_bottom="20" white="white" offset="vc_col-md-offset-3 vc_col-md-6 vc_col-sm-offset-1 vc_col-xs-12"][agni_call_to_action quote="Stay Creative and Build a Website" additional_quote="There are many variations of elements" value="Get Started" choice="white" align="center"][/vc_column][/vc_row]
CONTENT;
  
    vc_add_default_templates( $data );
}
add_action( 'vc_load_default_templates_action', 'agni_vc_custom_template_call_to_action_4' ); 

// Page - Demo 3
// 46. Custom template About 5
function agni_vc_custom_template_about_5() {
    $data               = array();
    $data['name']       = __( 'About 5', 'milton' );
    $data['weight']     = 0;
    $data['custom_class'] = 'agni_vc_custom_template_about_5';
    $data['content']    = <<<CONTENT
        [vc_row bg_color="#25262b" equal_height="yes" el_id="about_studio-3" el_class="about_studio-3"][vc_column dark_mode="has-dark-mode" align="center" bg_color="#25262b" bg_edge="left" padding_top="30" padding_bottom="30" offset="vc_col-md-6"][vc_row_inner][vc_column_inner offset="vc_col-md-10"][vc_empty_space height="140px" height_tab="80" height_mobile="40"][agni_section_heading heading="We are Milton Studio" heading_size="30" sub_heading="Introduction" sub_heading_size="" additional="Leverage agile frameworks to provide a robust synopsis for high level overviews." display_order="ishda" animation="1" animation_style="fadeInLeft" animation_duration="1" animation_delay="0.2" animation_offset="100%"][vc_column_text animation="1" animation_style="fadeInLeft" animation_duration="1" animation_offset="100%"]

Ballpark value added activity to beta test. Override the digital divide with additional from DevOps. to provide a robust synopsis for high level overviews. Iterative approaches to corporate strategy foster collaborative thinking to further the overall value proposition. Organically grow view of disruptive.

[/vc_column_text][agni_button value="View Works" choice="accent" margin_top="20" animation="1" animation_style="fadeInLeft" animation_duration="1" animation_delay="0.6" animation_offset="100%" radius="50"][vc_empty_space height="140px" height_tab="80" height_mobile="40"][/vc_column_inner][/vc_row_inner][/vc_column][vc_column bg_choice="2" bg_image="451" bg_image_position="center bottom" bg_edge="right" offset="vc_col-md-6 vc_hidden-sm vc_hidden-xs"][/vc_column][/vc_row]
CONTENT;
  
    vc_add_default_templates( $data );
}
add_action( 'vc_load_default_templates_action', 'agni_vc_custom_template_about_5' ); 

// 47. Custom template Call to action 5
function agni_vc_custom_template_call_to_action_5() {
    $data               = array();
    $data['name']       = __( 'Call to Action 5', 'milton' );
    $data['weight']     = 0;
    $data['custom_class'] = 'agni_vc_custom_template_call_to_action_5';
    $data['content']    = <<<CONTENT
        [vc_row fullwidth="has-fullwidth-column" el_id="project_view-3" el_class="project_view-3"][vc_column dark_mode="has-dark-mode" align="center" bg_color="#1d1d1e" width="1/2" animation="1" animation_style="zoomIn" animation_duration="0.6" animation_delay="0.2" animation_offset="100%"][vc_empty_space height="120px" height_tab="70" height_mobile="30"][agni_button value="Studio Profile" style="alt" choice="white" size="lg" alignment="center" radius="50"][vc_empty_space height="120px" height_tab="70" height_mobile="30"][/vc_column][vc_column dark_mode="has-dark-mode" align="center" bg_color="#1259c3" width="1/2" animation="1" animation_style="zoomIn" animation_duration="0.6" animation_offset="100%"][vc_empty_space height="120px" height_tab="70" height_mobile="30"][agni_button value="All Projects" style="alt" choice="white" size="lg" alignment="center" radius="50"][vc_empty_space height="120px" height_tab="70" height_mobile="30"][/vc_column][/vc_row]
CONTENT;
  
    vc_add_default_templates( $data );
}
add_action( 'vc_load_default_templates_action', 'agni_vc_custom_template_call_to_action_5' ); 

// Page - Demo 4
// 48. Custom template About 6
function agni_vc_custom_template_about_6() {
    $data               = array();
    $data['name']       = __( 'About 6', 'milton' );
    $data['weight']     = 0;
    $data['custom_class'] = 'agni_vc_custom_template_about_6';
    $data['content']    = <<<CONTENT
        [vc_row bg_color="#25262b" padding_top="4%" padding_bottom="4%" el_id="About_studio-4" el_class="About_studio-4"][vc_column dark_mode="has-dark-mode" align="center" padding_top="35" padding_bottom="35" white="white" offset="vc_col-md-offset-2 vc_col-md-8"][vc_custom_heading text="About Studio" font_container="tag:h6|font_size:14|text_align:center|color:%23ffffff" use_theme_fonts="yes" margin_bottom="25" animation="1" animation_delay="0.2" animation_offset="100%"][vc_custom_heading text="Leverage agile frameworks to provide a robust synopsis for high level overviews. Iterative approaches to corporate strategy foster collaborative thinking to further the overall value proposition. Organically grow the holistic world" font_container="tag:p|font_size:17|text_align:center|color:%23ffffff" use_theme_fonts="yes" animation="1" animation_offset="100%"][agni_button value="Get Started" style="alt" choice="white" alignment="center" margin_top="10" animation="1" animation_delay="0.6" animation_offset="100%" radius="50"][/vc_column][/vc_row]
CONTENT;
  
    vc_add_default_templates( $data );
}
add_action( 'vc_load_default_templates_action', 'agni_vc_custom_template_about_6' ); 


// 49. Custom template Milestone + Service boxes 1
function agni_vc_custom_template_service_boxes_milestone_1() {
    $data               = array();
    $data['name']       = __( 'Service boxes + Milestone 1', 'milton' );
    $data['weight']     = 0;
    $data['custom_class'] = 'agni_vc_custom_template_service_boxes_milestone_1';
    $data['content']    = <<<CONTENT
        [vc_row padding_top="4%" padding_bottom="4%" el_id="service_box-4" el_class="service_box-4"][vc_column align="center" width="5/6" animation="1" animation_duration="1" animation_delay="0.2" animation_offset="100%" padding_top="20" padding_bottom="4%" offset="vc_col-md-offset-3 vc_col-md-6 vc_col-sm-offset-1 vc_col-xs-12"][vc_custom_heading text="What We Do" font_container="tag:h2|text_align:center" use_theme_fonts="yes"][vc_column_text]Bring to the table win-win survival strategies to ensure proactive.[/vc_column_text][/vc_column][vc_column][vc_row_inner][vc_column_inner width="1/2" animation="1" animation_duration="1" animation_delay="0.2" animation_offset="100%" padding_bottom="30" offset="vc_col-md-4 vc_col-xs-12"][agni_service icon="icon-basic-pencil-ruler" icon_style="background" background_color="#f8f8f8" color="#1259c3" hover_icon_style="background" hover_color="#ffffff" title="Great Support" title_size="" divide_line="" btn_value="Know More" btn_style="alt" btn_radius="30" align="center"]Phasellus enim libero, blandit vel vitae condimentum ultricies magna sapien Quisque euismod orci lobortis aliquam along the information.[/agni_service][/vc_column_inner][vc_column_inner width="1/2" animation="1" animation_duration="1" animation_offset="100%" padding_bottom="30" offset="vc_col-md-4 vc_col-xs-12"][agni_service icon="icon-basic-display" icon_style="background" background_color="#f8f8f8" color="#1259c3" hover_icon_style="background" hover_color="#ffffff" title="User Interface" title_size="" divide_line="" btn_value="Know More" btn_style="alt" btn_radius="30" align="center"]Phasellus enim libero, blandit vel vitae condimentum ultricies magna sapien Quisque euismod orci lobortis aliquam along the information.[/agni_service][/vc_column_inner][vc_column_inner width="1/2" animation="1" animation_duration="1" animation_delay="0.6" animation_offset="100%" padding_bottom="30" offset="vc_col-md-4 vc_col-xs-12"][agni_service icon="icon-software-pen" icon_style="background" background_color="#f8f8f8" color="#1259c3" hover_icon_style="background" hover_color="#ffffff" title="Clean Design" title_size="" divide_line="" btn_value="Know More" btn_style="alt" btn_radius="30" align="center"]Phasellus enim libero, blandit vel vitae condimentum ultricies magna sapien Quisque euismod orci lobortis aliquam along the information.[/agni_service][/vc_column_inner][/vc_row_inner][/vc_column][/vc_row][vc_row bg_color="#1259c3" padding_top="4%" padding_bottom="4%" el_id="milestone-element-4" el_class="milestone-element-4"][vc_column dark_mode="has-dark-mode" width="1/2" padding_top="20" padding_bottom="20" offset="vc_col-md-3"][agni_milestone mile_font_size="54" white="white" mile="80" title="Satisfied Clients"][/vc_column][vc_column dark_mode="has-dark-mode" width="1/2" padding_top="20" padding_bottom="20" offset="vc_col-md-3"][agni_milestone mile_font_size="54" white="white" mile="65" title="Projects Done"][/vc_column][vc_column dark_mode="has-dark-mode" width="1/2" padding_top="20" padding_bottom="20" offset="vc_col-md-3"][agni_milestone mile_font_size="54" white="white" mile="180" title="Lines of Code"][/vc_column][vc_column dark_mode="has-dark-mode" width="1/2" padding_top="20" padding_bottom="20" offset="vc_col-md-3"][agni_milestone mile_font_size="54" white="white" mile="13" title="Awards Won"][/vc_column][/vc_row]
CONTENT;
  
    vc_add_default_templates( $data );
}
add_action( 'vc_load_default_templates_action', 'agni_vc_custom_template_service_boxes_milestone_1' ); 


// 50. Custom template Contact Form + Map 1
function agni_vc_custom_template_contact_form_map_1() {
    $data               = array();
    $data['name']       = __( 'Contact + Map 1', 'milton' );
    $data['weight']     = 0;
    $data['custom_class'] = 'agni_vc_custom_template_contact_form_map_1';
    $data['content']    = <<<CONTENT
        [vc_row bg_color="#25262b" padding_top="4%" padding_bottom="4%" el_id="contact-element-4" el_class="Share your ideas and thoughts "][vc_column align="center" width="5/6" animation="1" animation_style="fadeIn" animation_duration="1" animation_delay="0.2" animation_offset="100%" white="white" css=".vc_custom_1476251689742{padding-top: 30px !important;padding-bottom: 30px !important;}" offset="vc_col-md-offset-3 vc_col-md-6 vc_col-sm-offset-1 vc_col-xs-12"][vc_custom_heading text="Support on any time" font_container="tag:h6|font_size:14|text_align:center|color:%23ffffff" use_theme_fonts="yes"][vc_custom_heading text="Share your ideas and thoughts " font_container="tag:h2|text_align:center|color:%23ffffff" use_theme_fonts="yes"][/vc_column][/vc_row][vc_row fullwidth="has-fullwidth-column-no-padding" content_placement="middle"][vc_column offset="vc_col-md-6"][vc_row_inner][vc_column_inner padding_right="45" padding_left="45" offset="vc_col-lg-offset-2 vc_col-lg-8 vc_col-md-offset-1 vc_col-md-10"][vc_empty_space height="120px" height_tab="70" height_mobile="30"][contact-form-7 id="500"][vc_empty_space height="120px" height_tab="70" height_mobile="30"][/vc_column_inner][/vc_row_inner][/vc_column][vc_column offset="vc_col-md-6"][agni_gmap height="795" height_tab="700" height_mobile="450" values="%5B%7B%22google_map_location%22%3A%22Envato%20Head%20Office%22%2C%22google_map_lat%22%3A%2210.010509%22%2C%22google_map_lng%22%3A%2277.487774%22%7D%5D"][/vc_column][/vc_row]
CONTENT;
  
    vc_add_default_templates( $data );
}
add_action( 'vc_load_default_templates_action', 'agni_vc_custom_template_contact_form_map_1' ); 

// 51. Custom template Call to action 6
function agni_vc_custom_template_call_to_action_6() {
    $data               = array();
    $data['name']       = __( 'Call to Action 6', 'milton' );
    $data['weight']     = 0;
    $data['custom_class'] = 'agni_vc_custom_template_call_to_action_6';
    $data['content']    = <<<CONTENT
        [vc_row bg_color="#1259c3" padding_top="3%" padding_bottom="3%" el_id="callout-element-4" el_class="callout-elemrnt"][vc_column dark_mode="has-dark-mode" align="center" padding_top="20" padding_bottom="20"][agni_call_to_action type="2" quote="Interested in working with Milton?" quote_size="30" value="Let's Talk Us" choice="white" align="center"][/vc_column][/vc_row]
CONTENT;
  
    vc_add_default_templates( $data );
}
add_action( 'vc_load_default_templates_action', 'agni_vc_custom_template_call_to_action_6' ); 

// Page - Demo 5
// 52. Custom template Milestone + About 1
function agni_vc_custom_template_about_milestone_1() {
    $data               = array();
    $data['name']       = __( 'About + Milestone 1', 'milton' );
    $data['weight']     = 0;
    $data['custom_class'] = 'agni_vc_custom_template_about_milestone_1';
    $data['content']    = <<<CONTENT
        [vc_row padding_top="4%" padding_bottom="4%" border_bottom="1" border_color="#eeeeee" border_style="solid" el_id="about-us-business-1" el_class="about-us-business-1"][vc_column width="1/3" padding_top="30" padding_bottom="30"][vc_custom_heading text="We are new
Business Startup" font_container="tag:h2|text_align:left|color:%23444444" use_theme_fonts="yes" animation="1" animation_duration="1" animation_delay="0.2" animation_offset="100%"][/vc_column][vc_column width="2/3" padding_top="30" padding_bottom="30"][vc_custom_heading text="Capitalise on low hanging fruit to identify a ballpark value added activity to beta test override the digital." font_container="tag:p|font_size:22|text_align:left|color:%23333333" use_theme_fonts="yes" animation="1" animation_duration="1" animation_offset="100%"][vc_column_text animation="1" animation_duration="1" animation_delay="0.6" animation_offset="100%"]IPhone direct mailing pitch creative founders validation. Seed round bandwidth conversion android buzz graphi cal user interface series A financing bootstrapping market influencer pitch. MVP learning curve conversion disruptive mass market churn rate startup bootstrapping.[/vc_column_text][agni_button value="View Work" style="alt" animation="1" animation_duration="1" animation_delay="0.8" animation_offset="100%"][/vc_column][/vc_row][vc_row padding_top="3%" padding_bottom="3%" el_id="milestone-business-1" el_class="milestone-business-1"][vc_column width="1/2" animation="1" animation_style="zoomIn" animation_duration="1" animation_delay="0.2" animation_offset="100%" padding_top="20" padding_bottom="20" offset="vc_col-md-3"][agni_milestone mile_font_choice="default-typo" mile_font_size="50" align="left" mile="80" title="Satisfied Clients"][/vc_column][vc_column width="1/2" animation="1" animation_style="zoomIn" animation_duration="1" animation_offset="100%" padding_top="20" padding_bottom="20" offset="vc_col-md-3"][agni_milestone mile_font_choice="default-typo" mile_font_size="50" align="left" mile="65" title="Projects Done"][/vc_column][vc_column width="1/2" animation="1" animation_style="zoomIn" animation_duration="1" animation_delay="0.6" animation_offset="100%" padding_top="20" padding_bottom="20" offset="vc_col-md-3"][agni_milestone mile_font_choice="default-typo" mile_font_size="50" align="left" mile="180" title="Lines of Code"][/vc_column][vc_column width="1/2" animation="1" animation_style="zoomIn" animation_duration="1" animation_delay="0.8" animation_offset="100%" padding_top="20" padding_bottom="20" offset="vc_col-md-3"][agni_milestone mile_font_choice="default-typo" mile_font_size="50" align="left" mile="13" title="Awards Won"][/vc_column][/vc_row]
CONTENT;
  
    vc_add_default_templates( $data );
}
add_action( 'vc_load_default_templates_action', 'agni_vc_custom_template_about_milestone_1' ); 


// 53. Custom template Features 8
function agni_vc_custom_template_features_8() {
    $data               = array();
    $data['name']       = __( 'Features 8', 'milton' );
    $data['weight']     = 0;
    $data['custom_class'] = 'agni_vc_custom_template_features_8';
    $data['content']    = <<<CONTENT
        [vc_row fullwidth="has-fullwidth-column-no-padding" equal_height="yes" el_id="promo-section-2" el_class="promo-section-2"][vc_column bg_color="#f6f6f6" width="1/2" css=".vc_custom_1476028643292{background-color: #f6f6f6 !important;background-position: center !important;background-repeat: no-repeat !important;background-size: cover !important;}"][vc_row_inner css=".vc_custom_1476097629242{padding-top: 11% !important;padding-bottom: 11% !important;}"][vc_column_inner width="5/6" padding_right="12%" padding_left="12%" offset="vc_col-md-offset-3 vc_col-md-7 vc_col-sm-offset-1 vc_col-xs-12"][vc_empty_space height="120px" height_tab="70" height_mobile="30"][vc_custom_heading text="Elegant Design" use_theme_fonts="yes" animation="1" animation_duration="1" animation_delay="0.2" animation_offset="100%"][vc_column_text animation="1" animation_duration="1" animation_offset="100%"]Capitalise on low hanging fruit to identify a ballpark value added activity to beta test. Override the digital divide with additional clickthroughs from Dev Ops. Nanotechnology immersion along the information.[/vc_column_text][agni_button value="View Details" choice="accent" animation="1" animation_duration="1" animation_delay="0.6" animation_offset="100%"][vc_empty_space height="140px" height_tab="80" height_mobile="40"][/vc_column_inner][/vc_row_inner][/vc_column][vc_column bg_choice="2" bg_image="521" bg_image_position="center top" width="1/2" offset="vc_hidden-xs"][/vc_column][/vc_row][vc_row fullwidth="has-fullwidth-column-no-padding" equal_height="yes" el_class="promo-section-2"][vc_column bg_choice="2" bg_image="520" bg_image_position="center top" width="1/2" offset="vc_hidden-xs"][/vc_column][vc_column bg_color="#f6f6f6" width="1/2" css=".vc_custom_1476028643292{background-color: #f6f6f6 !important;background-position: center !important;background-repeat: no-repeat !important;background-size: cover !important;}"][vc_row_inner css=".vc_custom_1476097629242{padding-top: 11% !important;padding-bottom: 11% !important;}"][vc_column_inner width="5/6" padding_right="12%" padding_left="12%" offset="vc_col-md-offset-2 vc_col-md-7 vc_col-sm-offset-1"][vc_empty_space height="120px" height_tab="70" height_mobile="30"][vc_custom_heading text="Innovative Thinking" use_theme_fonts="yes" animation="1" animation_duration="1" animation_delay="0.2" animation_offset="100%"][vc_column_text animation="1" animation_duration="1" animation_offset="100%"]Capitalise on low hanging fruit to identify a ballpark value added activity to beta test. Override the digital divide with additional clickthroughs from Dev Ops. Nanotechnology immersion along the information.[/vc_column_text][agni_button value="View Details" choice="accent" animation="1" animation_duration="1" animation_delay="0.6" animation_offset="100%"][vc_empty_space height="140px" height_tab="80" height_mobile="40"][/vc_column_inner][/vc_row_inner][/vc_column][/vc_row]
CONTENT;
  
    vc_add_default_templates( $data );
}
add_action( 'vc_load_default_templates_action', 'agni_vc_custom_template_features_8' ); 

// 54. Custom template Service boxes 6
function agni_vc_custom_template_service_boxes_6() {
    $data               = array();
    $data['name']       = __( 'Service Boxes 6', 'milton' );
    $data['weight']     = 0;
    $data['custom_class'] = 'agni_vc_custom_template_service_boxes_6';
    $data['content']    = <<<CONTENT
        [vc_row equal_height="yes" padding_top="6%" padding_bottom="6%" el_id="service_box-4" el_class="service_box-4"][vc_column align="center" width="1/2" padding_bottom="4%" offset="vc_col-md-3"][agni_service icon_type="svg" svg_icon="icon-weather-waning-gibbous" size="64" color="#1259c3" hover_color="#333333" title="Technology" title_size="" divide_line="" align="center"]Leverage agile frameworks to provide a robust synopsis for the high level overviews Iterative approaches.[/agni_service][/vc_column][vc_column width="1/2" offset="vc_col-md-3"][agni_service icon_type="svg" svg_icon="icon-basic-sheet-pen" size="64" color="#1259c3" hover_color="#333333" title="Strategy" title_size="" divide_line="" align="center"]Leverage agile frameworks to provide a robust synopsis for the high level overviews Iterative approaches.[/agni_service][/vc_column][vc_column width="1/2" offset="vc_col-md-3"][agni_service icon_type="svg" svg_icon="icon-software-layers2" size="64" color="#1259c3" hover_color="#333333" title="Well Organized" title_size="" divide_line="" align="center"]Leverage agile frameworks to provide a robust synopsis for the high level overviews Iterative approaches.[/agni_service][/vc_column][vc_column width="1/2" offset="vc_col-md-3"][agni_service icon_type="svg" svg_icon="icon-basic-message-multiple" size="64" color="#1259c3" hover_color="#333333" title="Great Support" title_size="" divide_line="" align="center"]Leverage agile frameworks to provide a robust synopsis for the high level overviews Iterative approaches.[/agni_service][/vc_column][/vc_row]
CONTENT;
  
    vc_add_default_templates( $data );
}
add_action( 'vc_load_default_templates_action', 'agni_vc_custom_template_service_boxes_6' ); 


// 55. Custom template Call to action 7
function agni_vc_custom_template_call_to_action_7() {
    $data               = array();
    $data['name']       = __( 'Call to Action 7', 'milton' );
    $data['weight']     = 0;
    $data['custom_class'] = 'agni_vc_custom_template_call_to_action_7';
    $data['content']    = <<<CONTENT
        [vc_row padding_top="3%" padding_bottom="3%" el_id="call-to-action-5" el_class="call-to-action-5"][vc_column width="5/6" animation="1" animation_style="fadeIn" animation_duration="1" animation_delay="0.2" animation_offset="100%" padding_top="20" padding_bottom="20" offset="vc_col-md-offset-2 vc_col-md-8 vc_col-sm-offset-1 vc_col-xs-12"][agni_call_to_action icon="icon-basic-paperplane" quote="Stay Creative and Build a Website" additional_quote="At the end of the day a new normal that has evolved from generation X is on the runway heading towards a streamlined." value="Get Started" style="alt" align="center"][/vc_column][/vc_row]
CONTENT;
  
    vc_add_default_templates( $data );
}
add_action( 'vc_load_default_templates_action', 'agni_vc_custom_template_call_to_action_7' ); 

// Page - Demo 6
// 56. Custom template Features 9
function agni_vc_custom_template_features_9() {
    $data               = array();
    $data['name']       = __( 'Features 9', 'milton' );
    $data['weight']     = 0;
    $data['custom_class'] = 'agni_vc_custom_template_features_9';
    $data['content']    = <<<CONTENT
        [vc_row padding_top="4%" padding_bottom="2%" el_class="features-6" el_id="features-6"][vc_column align="center" animation="1" animation_style="fadeIn" animation_delay="0.2" animation_offset="100%" padding_top="30" padding_bottom="3%" offset="vc_col-md-offset-2 vc_col-md-8"][vc_custom_heading text="Features in App" font_container="tag:h2|text_align:center" use_theme_fonts="yes"][vc_column_text]Branding success alpha paradigm shift business leverage metrics freemium.[/vc_column_text][/vc_column][vc_column offset="vc_col-md-12"][vc_row_inner equal_height="yes" content_placement="middle"][vc_column_inner width="1/2" padding_bottom="30" offset="vc_col-md-4"][agni_service choice="2" icon="pe-7s-albums" color="#333333" hover_color="#1259c3" title="Multiple display" title_size="" divide_line="" service_2_align="right" animation="1" animation_style="fadeInLeft" animation_delay="0.2" animation_offset="100%"]Hackng virality pitch burns startups are validation fication agilesarth development paradshift noths.[/agni_service][vc_empty_space height="60px" height_tab="40" height_mobile="30"][agni_service choice="2" icon="pe-7s-look" color="#333333" hover_color="#1259c3" title="Great Interface" title_size="" divide_line="" service_2_align="right" animation="1" animation_style="fadeInLeft" animation_offset="100%"]Hackng virality pitch burns startups are validation fication agilesarth development paradshift noths.[/agni_service][vc_empty_space height="60px" height_tab="40" height_mobile="30"][agni_service choice="2" icon="pe-7s-science" color="#333333" hover_color="#1259c3" title="Free Updates" title_size="" divide_line="" service_2_align="right" animation="1" animation_style="fadeInLeft" animation_delay="0.6" animation_offset="100%"]Hackng virality pitch burns startups are validation fication agilesarth development paradshift noths.[/agni_service][/vc_column_inner][vc_column_inner width="1/3" padding_bottom="30" offset="vc_hidden-sm vc_hidden-xs"][agni_image img_url="580"][/vc_column_inner][vc_column_inner width="1/2" padding_bottom="30" offset="vc_col-md-4"][agni_service choice="2" icon="pe-7s-box2" color="#333333" hover_color="#1259c3" title="3D Touch" title_size="" divide_line="" animation="1" animation_style="fadeInRight" animation_delay="0.2" animation_offset="100%"]Hackng virality pitch burns startups are validation fication agilesarth development paradshift noths.[/agni_service][vc_empty_space height="60px" height_tab="40" height_mobile="30"][agni_service choice="2" icon="pe-7s-cloud-download" color="#333333" hover_color="#1259c3" title="Cloud download" title_size="" divide_line="" animation="1" animation_style="fadeInRight" animation_offset="100%"]Hackng virality pitch burns startups are validation fication agilesarth development paradshift noths.[/agni_service][vc_empty_space height="60px" height_tab="40" height_mobile="30"][agni_service choice="2" icon="pe-7s-edit" color="#333333" hover_color="#1259c3" title="Easy Customization" title_size="" divide_line="" animation="1" animation_style="fadeInRight" animation_delay="0.6" animation_offset="100%"]Hackng virality pitch burns startups are validation fication agilesarth development paradshift noths.[/agni_service][/vc_column_inner][/vc_row_inner][/vc_column][/vc_row]
CONTENT;
  
    vc_add_default_templates( $data );
}
add_action( 'vc_load_default_templates_action', 'agni_vc_custom_template_features_9' ); 


// 57. Custom template Gallery 1
function agni_vc_custom_template_gallery_1() {
    $data               = array();
    $data['name']       = __( 'Gallery 1', 'milton' );
    $data['weight']     = 0;
    $data['custom_class'] = 'agni_vc_custom_template_gallery_1';
    $data['content']    = <<<CONTENT
        [vc_row bg_color="#25262b" padding_top="4%" padding_bottom="4%" el_id="screenshot-6" el_class="screenshot-6"][vc_column dark_mode="has-dark-mode" align="center" width="5/6" padding_top="30" padding_bottom="4%" offset="vc_col-md-offset-2 vc_col-md-8 vc_col-sm-offset-1 vc_col-xs-12"][vc_custom_heading text="Screenshot Showcase" font_container="tag:h2|text_align:center" use_theme_fonts="yes" animation="1" animation_delay="0.2" animation_offset="100%"][vc_column_text animation="1" animation_offset="100%"]Branding success alpha paradigm shift business leverage Solid.[/vc_column_text][/vc_column][vc_column animation="1" animation_duration="1" animation_delay="0.2" animation_offset="100%" padding_bottom="30" offset="vc_col-xs-12"][agni_gallery img_url="585,586,587,588" type="1" column="4" animation="1" animation_duration="0.6" animation_delay="0.2" animation_offset="100%"][/vc_column][/vc_row]
CONTENT;
  
    vc_add_default_templates( $data );
}
add_action( 'vc_load_default_templates_action', 'agni_vc_custom_template_gallery_1' ); 


// 58. Custom template Testimonials 6
function agni_vc_custom_template_testimonials_6() {
    $data               = array();
    $data['name']       = __( 'Testimonials 6', 'milton' );
    $data['weight']     = 0;
    $data['custom_class'] = 'agni_vc_custom_template_testimonials_6';
    $data['content']    = <<<CONTENT
        [vc_row bg_color="#f6f6f6" padding_top="4%" padding_bottom="4%" el_id="testimonials-6" el_class="testimonials-6"][vc_column width="5/6" animation="1" animation_delay="0.2" animation_offset="100%" padding_top="30" padding_bottom="30" offset="vc_col-md-offset-3 vc_col-md-6 vc_col-sm-offset-1 vc_col-xs-12"][vc_custom_heading text="What Client Say" font_container="tag:h3|text_align:center" use_theme_fonts="yes"][/vc_column][vc_column width="5/6" animation="1" animation_duration="1" animation_offset="100%" offset="vc_col-md-offset-2 vc_col-md-8 vc_col-sm-offset-1 vc_col-xs-12"][agni_testimonials type="1" column="1" avatar_location="3" circle_avatar="1" testimonial_display_style="background" testimonial_bg_color="#ffffff" testimonial_padding="4%" alignment="center" testimonial_autoplay="1" testimonial_autoplay_timeout="4000" testimonial_autoplay_hover="1" testimonial_autoplay_speed="700" testimonial_loop="1" testimonial_pagination="1" style="1"][/vc_column][/vc_row]
CONTENT;
  
    vc_add_default_templates( $data );
}
add_action( 'vc_load_default_templates_action', 'agni_vc_custom_template_testimonials_6' ); 

// Page - Demo 7
// 59. Custom template Service boxes 7
function agni_vc_custom_template_service_boxes_7() {
    $data               = array();
    $data['name']       = __( 'Service Boxes 7', 'milton' );
    $data['weight']     = 0;
    $data['custom_class'] = 'agni_vc_custom_template_service_boxes_7';
    $data['content']    = <<<CONTENT
        [vc_row equal_height="yes" padding_top="6%" padding_bottom="6%" el_id="service_box-4" el_class="service_box-4"][vc_column align="center" width="1/2" padding_bottom="4%" offset="vc_col-md-3"][agni_service icon_type="svg" svg_icon="icon-weather-waning-gibbous" size="64" color="#1259c3" hover_color="#333333" title="Technology" title_size="" divide_line="" align="center"]Leverage agile frameworks to provide a robust synopsis for the high level overviews Iterative approaches.[/agni_service][/vc_column][vc_column width="1/2" offset="vc_col-md-3"][agni_service icon_type="svg" svg_icon="icon-basic-sheet-pen" size="64" color="#1259c3" hover_color="#333333" title="Strategy" title_size="" divide_line="" align="center"]Leverage agile frameworks to provide a robust synopsis for the high level overviews Iterative approaches.[/agni_service][/vc_column][vc_column width="1/2" offset="vc_col-md-3"][agni_service icon_type="svg" svg_icon="icon-software-layers2" size="64" color="#1259c3" hover_color="#333333" title="Well Organized" title_size="" divide_line="" align="center"]Leverage agile frameworks to provide a robust synopsis for the high level overviews Iterative approaches.[/agni_service][/vc_column][vc_column width="1/2" offset="vc_col-md-3"][agni_service icon_type="svg" svg_icon="icon-basic-message-multiple" size="64" color="#1259c3" hover_color="#333333" title="Great Support" title_size="" divide_line="" align="center"]Leverage agile frameworks to provide a robust synopsis for the high level overviews Iterative approaches.[/agni_service][/vc_column][/vc_row]
CONTENT;
  
    vc_add_default_templates( $data );
}
add_action( 'vc_load_default_templates_action', 'agni_vc_custom_template_service_boxes_7' ); 

// 60. Custom template Features 10
function agni_vc_custom_template_features_10() {
    $data               = array();
    $data['name']       = __( 'Features 10', 'milton' );
    $data['weight']     = 0;
    $data['custom_class'] = 'agni_vc_custom_template_features_10';
    $data['content']    = <<<CONTENT
        [vc_row bg_color="#25262b" equal_height="yes" padding_top="4%" padding_bottom="4%" el_id="promo-1-7" el_class="promo-1-7"][vc_column dark_mode="has-dark-mode" width="1/2" animation="1" animation_style="fadeInLeft" animation_duration="0.6" animation_delay="0.2" animation_offset="100%" padding_top="30" padding_bottom="30" offset="vc_col-md-5"][vc_empty_space height="100px" height_tab="60" height_mobile="30"][vc_custom_heading text="Amazing Layout Design" font_container="tag:h3|text_align:left" use_theme_fonts="yes"][vc_column_text]Capitalise on low hanging fruit to identify a ballpark value added activity to beta test. Override the digital divide with additional clickthroughs from Dev Ops. Nanotechnology immersion along the information highway will close the loop on focusing solely on the bottom line.[/vc_column_text][agni_button value="View Details" choice="accent"][vc_empty_space height="100px" height_tab="60" height_mobile="30"][/vc_column][vc_column bg_choice="2" bg_image="614" bg_image_position="left center" bg_edge="right" width="1/2" bg_parallax="1" data_bottom_top="background-position: 0px 50px" data_top_bottom="background-position: 0px -50px;" offset="vc_col-md-offset-1 vc_col-md-6 vc_hidden-xs"][/vc_column][/vc_row][vc_row bg_color="#f6f6f6" equal_height="yes" padding_top="4%" padding_bottom="4%" el_class="promo-2-7" el_id="promo-2-7"][vc_column bg_choice="2" bg_image="616" bg_image_position="right center" bg_edge="left" width="1/2" bg_parallax="1" data_bottom_top="background-position: 100% 50px" data_center="background-position: 100% 0px" data_top_bottom="background-position: 100% -50px;" offset="vc_col-md-6 vc_hidden-xs"][/vc_column][vc_column width="1/2" animation="1" animation_style="fadeInRight" animation_duration="0.6" animation_delay="0.2" animation_offset="100%" padding_top="30" padding_bottom="30" offset="vc_col-md-offset-1 vc_col-md-5"][vc_empty_space height="100px" height_tab="60" height_mobile="30"][vc_custom_heading text="Notification Pair Interface" font_container="tag:h3|text_align:left" use_theme_fonts="yes"][vc_column_text]Capitalise on low hanging fruit to identify a ballpark value added activity to beta test. Override the digital divide with additional clickthroughs from Dev Ops. Nanotechnology immersion along the information highway will close the loop on focusing solely on the bottom line.[/vc_column_text][agni_button value="View Details" choice="accent"][vc_empty_space height="100px" height_tab="60" height_mobile="30"][/vc_column][/vc_row]
CONTENT;
  
    vc_add_default_templates( $data );
}
add_action( 'vc_load_default_templates_action', 'agni_vc_custom_template_features_10' ); 

// 61. Custom template Milestone 3
function agni_vc_custom_template_milestone_3() {
    $data               = array();
    $data['name']       = __( 'Milestone 3', 'milton' ); 
    $data['weight']     = 0;
    $data['custom_class'] = 'agni_vc_custom_template_milestone_3';
    $data['content']    = <<<CONTENT
        [vc_row bg_choice="2" bg_image="689" bg_overlay="1" bg_overlay_color="rgba(0,0,0,0.75)" padding_top="3%" padding_bottom="3%" el_id="milestones-7" el_class="milestones-7"][vc_column dark_mode="has-dark-mode" width="1/3" animation="1" animation_style="fadeIn" animation_duration="0.6" animation_delay="0.2" animation_offset="100%" padding_top="20" padding_bottom="20" offset="vc_col-xs-6"][agni_milestone style="2" icon="pe-7s-diamond" icon_size="45" mile_font_size="36" mile="80" title="Satisfied Clients"][/vc_column][vc_column dark_mode="has-dark-mode" width="1/3" animation="1" animation_style="fadeIn" animation_duration="0.6" animation_offset="100%" padding_top="20" padding_bottom="20" offset="vc_col-xs-6"][agni_milestone style="2" icon="pe-7s-science" icon_size="45" mile_font_size="36" mile="65" title="Projects Done"][/vc_column][vc_column dark_mode="has-dark-mode" width="1/3" animation="1" animation_duration="0.6" animation_delay="0.6" animation_offset="100%" padding_top="20" padding_bottom="20"][agni_milestone style="2" icon="pe-7s-server" icon_size="45" mile_font_size="36" mile="180" title="Lines of code"][/vc_column][/vc_row]
CONTENT;
  
    vc_add_default_templates( $data );
}
add_action( 'vc_load_default_templates_action', 'agni_vc_custom_template_milestone_3' ); 

// 62. Custom template Call to action 8
function agni_vc_custom_template_call_to_action_8() {
    $data               = array();
    $data['name']       = __( 'Call to Action 8', 'milton' );
    $data['weight']     = 0;
    $data['custom_class'] = 'agni_vc_custom_template_call_to_action_8';
    $data['content']    = <<<CONTENT
        [vc_row bg_color="#1259c3" padding_top="3%" padding_bottom="3%" el_id="call-to-action-7" el_class="call-to-action-7"][vc_column dark_mode="has-dark-mode" animation="1" animation_style="zoomIn" animation_duration="0.6" animation_delay="0.2" animation_offset="100%" padding_top="20" padding_bottom="30" offset="vc_col-md-offset-2 vc_col-md-8"][agni_call_to_action quote="Download milton and start website today!" quote_size="30" value="Download Application" choice="white" align="center"][/vc_column][/vc_row]
CONTENT;
  
    vc_add_default_templates( $data );
}
add_action( 'vc_load_default_templates_action', 'agni_vc_custom_template_call_to_action_8' ); 

// Page - Demo 8
// 63. Custom template Features + Service boxes 2
function agni_vc_custom_template_features_service_boxes_2() {
    $data               = array();
    $data['name']       = __( 'Features + Service boxes 2', 'milton' );
    $data['weight']     = 0;
    $data['custom_class'] = 'agni_vc_custom_template_features_service_boxes_2';
    $data['content']    = <<<CONTENT
        [vc_row equal_height="yes" content_placement="middle" padding_top="5%" padding_bottom="5%" el_id="video-intro-8" el_class="video-intro-8"][vc_column width="1/2" padding_top="40" padding_bottom="40" offset="vc_col-md-5"][vc_custom_heading text="Impress your clients" use_theme_fonts="yes" margin_bottom="5px" animation="1" animation_duration="1" animation_delay="0.2" animation_offset="100%"][vc_custom_heading text="Override the digital divide with additional click ops." font_container="tag:p|font_size:17|text_align:left" use_theme_fonts="yes" animation="1" animation_duration="1" animation_offset="100%"][vc_column_text animation="1" animation_duration="1" animation_delay="0.6" animation_offset="100%"]Describe your mobile app in even longer paragraphs. You might includea a nice icon list on this section too. lorem ipsum dolor sit amet, consecto adipiscing elit Pellentesque dapibus metus condi mentumal sollicitudin Quisque convallis nec justo sed consectetur.[/vc_column_text][agni_button value="Purchase Now" choice="accent" margin_top="10" animation="1" animation_duration="1" animation_delay="0.8" animation_offset="100%"][/vc_column][vc_column align="center" bg_choice="2" bg_image="714" bg_overlay="1" bg_overlay_color="rgba(0,0,0,0.25)" width="1/2" animation="1" animation_duration="1" animation_delay="0.2" animation_offset="100%" padding_top="30" padding_bottom="30" offset="vc_col-md-offset-1"][agni_video video_type="3" iframe_url="#" iframe_style="2" icon="pe-7f-play" size="20" icon_style="background" width="84" height="84" background_color="#ffffff" color="#333333" hover_icon_style="background" hover_background_color="#ffffff" hover_color="#1259c3"][/vc_column][/vc_row][vc_row padding_top="3%" padding_bottom="3%" border_top="1" border_color="#f1f1f1" border_style="solid" el_id="service_box-3" el_class="service_box-3"][vc_column width="1/2" padding_top="30" padding_bottom="30" offset="vc_col-md-4"][agni_service choice="2" icon="icon-basic-video" color="#444444" hover_color="#1259c3" title="Great Support" title_size="" divide_line="" animation="1" animation_style="fadeIn" animation_duration="1" animation_delay="0.2" animation_offset="100%"]Phasellus enim libero, blandit vel sapien vitae condimentum ultricies magna etar Quisque euismod orci lobortis aliquam.[/agni_service][/vc_column][vc_column width="1/2" padding_top="30" padding_bottom="30" offset="vc_col-md-4"][agni_service choice="2" icon="icon-ecommerce-diamond" color="#444444" hover_color="#1259c3" title="Deeply Customizable" title_size="" divide_line="" animation="1" animation_style="fadeIn" animation_duration="1" animation_offset="100%"]Phasellus enim libero, blandit vel sapien vitae condimentum ultricies magna etar Quisque euismod orci lobortis aliquam.[/agni_service][/vc_column][vc_column width="1/2" padding_top="30" padding_bottom="30" offset="vc_col-md-4"][agni_service choice="2" icon="icon-basic-gear" color="#444444" hover_color="#1259c3" title="Complete Solutions" title_size="" divide_line="" animation="1" animation_style="fadeIn" animation_duration="1" animation_delay="0.6" animation_offset="100%"]Phasellus enim libero, blandit vel sapien vitae condimentum ultricies magna etar Quisque euismod orci lobortis aliquam.[/agni_service][/vc_column][/vc_row]
CONTENT;
  
    vc_add_default_templates( $data );
}
add_action( 'vc_load_default_templates_action', 'agni_vc_custom_template_features_service_boxes_2' ); 

// 64. Custom template Features 11
function agni_vc_custom_template_features_11() {
    $data               = array();
    $data['name']       = __( 'Features 11', 'milton' );
    $data['weight']     = 0;
    $data['custom_class'] = 'agni_vc_custom_template_features_11';
    $data['content']    = <<<CONTENT
        [vc_row fullwidth="has-fullwidth-column-no-padding" bg_color="#25262b" equal_height="yes" el_class="promo-section-8" el_id="promo-section-8"][vc_column dark_mode="has-dark-mode" padding_right="12%" padding_left="12%" css=".vc_custom_1476028643292{background-color: #f6f6f6 !important;background-position: center !important;background-repeat: no-repeat !important;background-size: cover !important;}" offset="vc_col-lg-offset-1 vc_col-lg-4 vc_col-md-6"][vc_empty_space height="120px" height_tab="70" height_mobile="40"][vc_custom_heading text="We are many
variations of a element" use_theme_fonts="yes" animation="1" animation_style="fadeIn" animation_duration="1" animation_delay="0.2" animation_offset="100%"][vc_custom_heading text="Capitalise on low hanging fruit to identify a ballpark value added activity to beta test. Override the digital divide with clickthroughs from Dev Ops." font_container="tag:p|font_size:16|text_align:left" use_theme_fonts="yes" animation="1" animation_style="fadeIn" animation_duration="1" animation_offset="100%"][vc_empty_space height="25px" height_tab="10" height_mobile="10"][vc_row_inner][vc_column_inner width="1/2" animation="1" animation_duration="1" animation_delay="0.6" animation_offset="100%"][vc_custom_heading text="UI Themes" font_container="tag:h6|font_size:14|text_align:left" use_theme_fonts="yes" margin_bottom="20"][vc_custom_heading text="Leverage agile frameworks to provide a robust synopsis for high value overviews Iterative approaches." font_container="tag:p|font_size:14|text_align:left" use_theme_fonts="yes"][/vc_column_inner][vc_column_inner width="1/2" animation="1" animation_duration="1" animation_delay="0.8" animation_offset="100%"][vc_custom_heading text="Faster than ever" font_container="tag:h6|font_size:14|text_align:left" use_theme_fonts="yes" margin_bottom="20"][vc_custom_heading text="Leverage agile frameworks to provide a robust synopsis for high value overviews Iterative approaches." font_container="tag:p|font_size:14|text_align:left" use_theme_fonts="yes"][/vc_column_inner][/vc_row_inner][vc_empty_space height="120px" height_tab="70" height_mobile="40"][/vc_column][vc_column bg_choice="2" bg_image="332" width="1/2" offset="vc_col-lg-offset-1 vc_col-lg-6 vc_col-md-6 vc_hidden-sm vc_hidden-xs"][/vc_column][/vc_row]
CONTENT;
  
    vc_add_default_templates( $data );
}
add_action( 'vc_load_default_templates_action', 'agni_vc_custom_template_features_11' ); 

// 65. Custom template Testimonials 7
function agni_vc_custom_template_testimonials_7() {
    $data               = array();
    $data['name']       = __( 'Testimonials 7', 'milton' );
    $data['weight']     = 0;
    $data['custom_class'] = 'agni_vc_custom_template_testimonials_7';
    $data['content']    = <<<CONTENT
        [vc_row equal_height="yes" padding_top="2%" el_id="testimonials-8" el_class="testimonials-8"][vc_column bg_choice="2" bg_image="744" bg_image_position="center top" width="1/2"][/vc_column][vc_column width="1/2"][vc_empty_space height="140px" height_tab="80" height_mobile="40"][vc_custom_heading text="Our Clients Say" font_container="tag:h6|font_size:16|text_align:left" use_theme_fonts="yes" margin_bottom="30" animation="1" animation_style="fadeIn" animation_delay="0.2" animation_offset="100%" custom_heading_letter_spacing="0.1em"][vc_custom_heading text="“We are very pleased with our new brand identity and the way Enrique conducts his business. It has been great experience working with him and it’s already.”" font_container="tag:p|font_size:17|text_align:left" use_theme_fonts="yes" margin_top="-7" margin_bottom="20" animation="1" animation_style="fadeIn" animation_offset="100%"][vc_custom_heading text="Tommy Kenzy" font_container="tag:h6|font_size:13|text_align:left" use_theme_fonts="yes" margin_bottom="0" animation="1" animation_style="fadeIn" animation_delay="0.6" animation_offset="100%" custom_heading_letter_spacing="0.15em"][vc_custom_heading text="Designer" font_container="tag:p|font_size:13|text_align:left" use_theme_fonts="yes" margin_top="-7" margin_bottom="20" animation="1" animation_style="fadeIn" animation_delay="0.8" animation_offset="100%"][vc_empty_space height="120px" height_tab="60" height_mobile="30"][/vc_column][/vc_row]
CONTENT;
  
    vc_add_default_templates( $data );
}
add_action( 'vc_load_default_templates_action', 'agni_vc_custom_template_testimonials_7' ); 

// 66. Custom template Pricing 2
function agni_vc_custom_template_pricing_2() {
    $data               = array();
    $data['name']       = __( 'Pricing 2', 'milton' );
    $data['weight']     = 0;
    $data['custom_class'] = 'agni_vc_custom_template_pricing_2';
    $data['content']    = <<<CONTENT
        [vc_row bg_color="#f6f6f6" padding_top="4%" padding_bottom="4%" el_class="pricing-8" el_id="pricing-8"][vc_column width="5/6" padding_top="30px" padding_bottom="30px" offset="vc_col-md-5"][vc_empty_space height="40px" height_tab="20" height_mobile="1"][vc_custom_heading text="Choose your
affordable pricing" use_theme_fonts="yes" animation="1" animation_style="fadeIn" animation_delay="0.2" animation_offset="100%"][vc_custom_heading text="Capitalise on low hanging fruit to identify a ballpark value added activity to beta test digital with clickthroughs from Dev Ops." font_container="tag:p|font_size:16|text_align:left" use_theme_fonts="yes" animation="1" animation_offset="100%"][/vc_column][vc_column offset="vc_col-md-7"][vc_row_inner][vc_column_inner width="1/2" animation="1" animation_style="fadeInRight" animation_duration="1" animation_delay="0.2" animation_offset="100%" offset="vc_col-md-6"][agni_pricingtable heading="Starter" price="$35" value="Sign Up" bg_color="#ffffff"]
<ul>
    <li>0.5 Memory</li>
    <li>1 Core Processor</li>
    <li>20GB SSD Disk</li>
    <li>1TB Transfer</li>
</ul>
[/agni_pricingtable][/vc_column_inner][vc_column_inner width="1/2" animation="1" animation_style="fadeInRight" animation_duration="1" animation_offset="100%" offset="vc_col-md-5"][agni_pricingtable heading="Premium" price="$79" value="Sign Up" choice="white" bg_color="#f6f6f6"]
<ul>
    <li>0.5 Memory</li>
    <li>1 Core Processor</li>
    <li>20GB SSD Disk</li>
    <li>1TB Transfer</li>
</ul>
[/agni_pricingtable][/vc_column_inner][/vc_row_inner][/vc_column][/vc_row]
CONTENT;
  
    vc_add_default_templates( $data );
}
add_action( 'vc_load_default_templates_action', 'agni_vc_custom_template_pricing_2' ); 

// 67. Custom template Subscribe 1
function agni_vc_custom_template_subscribe_1() {
    $data               = array();
    $data['name']       = __( 'Subscribe 1', 'milton' );
    $data['weight']     = 0;
    $data['custom_class'] = 'agni_vc_custom_template_subscribe_1';
    $data['content']    = <<<CONTENT
        [vc_row bg_color="#24252a" padding_top="2%" padding_bottom="2%" el_id="our-clients-8" el_class="our-clients-8"][vc_column][agni_clients column="6" client_opacity="1" client_display_style="" order="ASC" clients_pagination=""][/vc_column][/vc_row]
CONTENT;
  
    vc_add_default_templates( $data );
}
add_action( 'vc_load_default_templates_action', 'agni_vc_custom_template_subscribe_1' ); 


// 68. Custom template Clients 3
function agni_vc_custom_template_clients_3() {
    $data               = array();
    $data['name']       = __( 'Clients 3', 'milton' );
    $data['weight']     = 0;
    $data['custom_class'] = 'agni_vc_custom_template_clients_3';
    $data['content']    = <<<CONTENT
        [vc_row bg_color="#24252a" padding_top="2%" padding_bottom="2%" el_id="our-clients-8" el_class="our-clients-8"][vc_column][agni_clients column="6" client_opacity="1" client_display_style="" order="ASC" clients_pagination=""][/vc_column][/vc_row]
CONTENT;
  
    vc_add_default_templates( $data );
}
add_action( 'vc_load_default_templates_action', 'agni_vc_custom_template_clients_3' ); 

// Page - Demo 10
// 69. Custom template About 7
function agni_vc_custom_template_about_7() {
    $data               = array();
    $data['name']       = __( 'About 7', 'milton' );
    $data['weight']     = 0;
    $data['custom_class'] = 'agni_vc_custom_template_about_7';
    $data['content']    = <<<CONTENT
        [vc_row bg_color="#25262b" padding_top="3%" padding_bottom="3%" el_id="About_studio-4" el_class="About_studio-4"][vc_column dark_mode="has-dark-mode" align="center" padding_top="20" padding_bottom="20" white="white" offset="vc_col-md-offset-2 vc_col-md-8 vc_col-xs-12"][vc_custom_heading text="About Studio" font_container="tag:h6|font_size:14|text_align:center|color:%23ffffff" use_theme_fonts="yes" margin_bottom="15"][vc_custom_heading text="Milton ipsum dolor sit amet, consectetur adipiscing elit. Aenean efficitur fringilla massa vel mattis. Aliquam auctor purus elit a convallis." font_container="tag:p|font_size:20|text_align:center|color:%23ffffff" use_theme_fonts="yes" font_italic="yes"][/vc_column][/vc_row]
CONTENT;
  
    vc_add_default_templates( $data );
}
add_action( 'vc_load_default_templates_action', 'agni_vc_custom_template_about_7' ); 


// Page - Demo 11
// 70. Custom template Service boxes 8
function agni_vc_custom_template_service_boxes_8() {
    $data               = array();
    $data['name']       = __( 'Service Boxes 8', 'milton' );
    $data['weight']     = 0;
    $data['custom_class'] = 'agni_vc_custom_template_service_boxes_8';
    $data['content']    = <<<CONTENT
        [vc_row padding_top="4%" padding_bottom="4%" el_id="our-services-demo11" el_class="our-services-demo11"][vc_column padding_top="40" padding_bottom="20" offset="vc_col-md-offset-2 vc_col-md-8"][vc_custom_heading text="Our Services" font_container="tag:h3|text_align:center" use_theme_fonts="yes"][vc_empty_space height="10px"][vc_row_inner][vc_column_inner align="center" width="1/4" padding_top="20" padding_bottom="20" offset="vc_col-xs-6"][agni_icon icon_type="svg" svg_icon="icon-basic-pencil-ruler" size="45" url="#" hover_color="#1259c3"][vc_custom_heading text="INTERIORS &amp;
ARCHITECTURE" font_container="tag:h6|font_size:14|text_align:center" use_theme_fonts="yes" margin_top="15px" custom_heading_letter_spacing="0.05em" custom_heading_font_weight="400" link="url:%23|||"][/vc_column_inner][vc_column_inner align="center" width="1/4" padding_top="20" padding_bottom="20" offset="vc_col-xs-6"][agni_icon icon_type="svg" svg_icon="icon-basic-spread-text-bookmark" size="45" url="#" hover_color="#1259c3"][vc_custom_heading text="Brand
communications" font_container="tag:h6|font_size:14|text_align:center" use_theme_fonts="yes" margin_top="15px" custom_heading_letter_spacing="0.05em" custom_heading_font_weight="400" link="url:%23|||"][/vc_column_inner][vc_column_inner align="center" width="1/4" padding_top="20" padding_bottom="20" offset="vc_col-xs-6"][agni_icon icon_type="svg" svg_icon="icon-weather-waning-gibbous" size="45" url="#" hover_color="#1259c3"][vc_custom_heading text="Digital Film &amp;
Interactive" font_container="tag:h6|font_size:14|text_align:center" use_theme_fonts="yes" margin_top="15px" custom_heading_letter_spacing="0.05em" custom_heading_font_weight="400" link="url:%23|||"][/vc_column_inner][vc_column_inner align="center" width="1/4" padding_top="20" padding_bottom="20" offset="vc_col-xs-6"][agni_icon icon_type="svg" svg_icon="icon-basic-sheet-pen" size="45" url="#" hover_color="#1259c3"][vc_custom_heading text="Art Direction &amp;
Photography" font_container="tag:h6|font_size:14|text_align:center" use_theme_fonts="yes" margin_top="15px" custom_heading_letter_spacing="0.05em" custom_heading_font_weight="400" link="url:%23|||"][/vc_column_inner][/vc_row_inner][/vc_column][/vc_row]
CONTENT;
  
    vc_add_default_templates( $data );
}
add_action( 'vc_load_default_templates_action', 'agni_vc_custom_template_service_boxes_8' ); 


// Page - Demo 12
// 71. Custom template About 8
function agni_vc_custom_template_about_8() {
    $data               = array();
    $data['name']       = __( 'About 8', 'milton' );
    $data['weight']     = 0;
    $data['custom_class'] = 'agni_vc_custom_template_about_8';
    $data['content']    = <<<CONTENT
        [vc_row padding_top="4%" padding_bottom="4%" el_id="intro-section-12" el_class="intro-section-12"][vc_column align="center" width="5/6" padding_top="30" padding_bottom="6%" offset="vc_col-md-offset-2 vc_col-md-8 vc_col-sm-offset-1 vc_col-xs-12"][agni_section_heading heading="Made for Future" heading_size="" sub_heading="Introduction" sub_heading_size="" additional="Bring to the table win-win survival strategies to ensure proactive domination. At the end of the day going forward a new normal that has evolved." additional_size="15" align="center" display_order="ishad" animation="1" animation_duration="1" animation_delay="0.2" animation_offset="100%"][/vc_column][vc_column width="2/3" padding_bottom="30" offset="vc_col-md-offset-4 vc_col-md-4 vc_col-sm-offset-2 vc_col-xs-12"][agni_image img_url="1324" animation="1" animation_style="fadeIn" animation_duration="1" animation_offset="100%"][/vc_column][/vc_row]
CONTENT;
  
    vc_add_default_templates( $data );
}
add_action( 'vc_load_default_templates_action', 'agni_vc_custom_template_about_8' ); 

// 72. Custom template Features 12
function agni_vc_custom_template_features_12() {
    $data               = array();
    $data['name']       = __( 'Features 12', 'milton' );
    $data['weight']     = 0;
    $data['custom_class'] = 'agni_vc_custom_template_features_12';
    $data['content']    = <<<CONTENT
        [vc_row bg_color="#f6f6f6" equal_height="yes" padding_top="5%" el_class="promo-1-12" el_id="promo-1-12"][vc_column bg_choice="2" bg_image="1323" bg_image_position="center top" offset="vc_col-md-6 vc_hidden-sm vc_col-xs-12 vc_hidden-xs"][/vc_column][vc_column width="5/6" animation="1" animation_duration="1" animation_delay="0.2" animation_offset="100%" padding_top="40px" padding_bottom="40px" offset="vc_col-md-offset-1 vc_col-md-5 vc_col-sm-offset-1"][vc_empty_space height="60px" height_tab="30" height_mobile="20"][vc_custom_heading text="Extreme 3D Surround System" font_container="tag:h2|font_size:54|text_align:left" use_theme_fonts="yes" margin_top="0px"][vc_column_text]Capitalise on low hanging fruit to identify a ballpark value added activity to beta test. Override the digital divide with additional clickthroughs from Dev Ops. Nanotechnology immersion along the information highway will close the loop on focusing solely on the bottom line.[/vc_column_text][vc_empty_space height="20px"][agni_button value="View Details" choice="accent"][vc_empty_space height="140px" height_tab="70" height_mobile="20"][/vc_column][/vc_row][vc_row bg_color="#25262b" equal_height="yes" el_class="promo-2-12" el_id="promo-2-12"][vc_column dark_mode="has-dark-mode" width="5/6" animation="1" animation_duration="1" animation_delay="0.2" animation_offset="100%" padding_top="40" padding_bottom="40" offset="vc_col-md-offset-0 vc_col-md-6 vc_col-sm-offset-1"][vc_empty_space height="120px" height_tab="70" height_mobile="20"][vc_custom_heading text="Splash Proof
Certified" font_container="tag:h2|font_size:54|text_align:left" use_theme_fonts="yes" margin_top="0px"][vc_column_text]Capitalise on low hanging fruit to identify a ballpark value added activity to beta test. Override the digital.[/vc_column_text][agni_list icon="fa fa-angle-right"]
<ul>
    <li>Height: 20.15 cm</li>
    <li>Width: 15.20 cm</li>
    <li>Depth: 2.30 cm</li>
    <li>Weight without cable: 20.15 cm</li>
    <li>Lenght of cable: 22.85 cm</li>
</ul>
[/agni_list][vc_empty_space height="30px"][agni_button value="View Details" choice="accent"][vc_empty_space height="120px" height_tab="70" height_mobile="20"][/vc_column][vc_column bg_choice="2" bg_image="1322" bg_image_repeat="no-repeat" bg_image_size="auto" offset="vc_col-md-offset-1 vc_col-md-4 vc_hidden-sm vc_hidden-xs"][/vc_column][/vc_row]
CONTENT;
  
    vc_add_default_templates( $data );
}
add_action( 'vc_load_default_templates_action', 'agni_vc_custom_template_features_12' ); 


// 73. Custom template Gallery 2
function agni_vc_custom_template_gallery_2() {
    $data               = array();
    $data['name']       = __( 'Gallery 2', 'milton' );
    $data['weight']     = 0;
    $data['custom_class'] = 'agni_vc_custom_template_gallery_2';
    $data['content']    = <<<CONTENT
        [vc_row fullwidth="has-fullwidth-column" equal_height="yes" content_placement="middle"][vc_column bg_color="#f0f0f0" padding_top="5%" padding_bottom="5%" offset="vc_col-md-6"][vc_empty_space height="20px" height_tab="10px" height_mobile="0px"][agni_image img_url="1827" alignment="center" img_link="4" img_custom_link="#" animation="1" animation_style="zoomIn" animation_duration="0.6" animation_delay="0.2" animation_offset="100%"][vc_empty_space height="20px" height_tab="10px" height_mobile="0px"][/vc_column][vc_column bg_color="#f8f8f8" padding_top="5%" padding_bottom="5%" offset="vc_col-md-6"][vc_empty_space height="20px" height_tab="10px" height_mobile="0px"][agni_image img_url="1826" alignment="center" img_link="4" img_custom_link="#" animation="1" animation_style="zoomIn" animation_duration="0.6" animation_offset="100%"][vc_empty_space height="20px" height_tab="10px" height_mobile="0px"][/vc_column][vc_column bg_color="#f8f8f8" padding_top="5%" padding_bottom="5%" offset="vc_col-md-6"][agni_image img_url="1825" alignment="center" img_link="4" img_custom_link="#" animation="1" animation_style="zoomIn" animation_duration="0.6" animation_delay="0.2" animation_offset="100%"][/vc_column][vc_column bg_color="#f0f0f0" padding_top="5%" padding_bottom="5%" offset="vc_col-md-6"][agni_image img_url="1824" alignment="center" img_link="4" img_custom_link="#" animation="1" animation_style="zoomIn" animation_duration="0.6" animation_offset="100%"][/vc_column][/vc_row]
CONTENT;
  
    vc_add_default_templates( $data );
}
add_action( 'vc_load_default_templates_action', 'agni_vc_custom_template_gallery_2' ); 


// 74. Custom template Subscribe 2
function agni_vc_custom_template_subscribe_2() {
    $data               = array();
    $data['name']       = __( 'Subscribe 2', 'milton' );
    $data['weight']     = 0;
    $data['custom_class'] = 'agni_vc_custom_template_subscribe_2';
    $data['content']    = <<<CONTENT
        [vc_row bg_color="#25262b" padding_top="4%" padding_bottom="4%" el_class="subscribe-12" el_id="subscribe-12"][vc_column dark_mode="has-dark-mode" align="center" width="5/6" padding_top="30" padding_bottom="6%" offset="vc_col-md-offset-3 vc_col-md-6 vc_col-sm-offset-1 vc_col-xs-12"][agni_section_heading heading="Book the Brand New Wireless Nova" heading_size="56" sub_heading="Order Now" sub_heading_size="" additional="Flat 20% Offer" additional_size="15" align="center" display_order="ishad" animation="1" animation_style="fadeIn" animation_duration="1" animation_delay="0.2"][/vc_column][vc_column dark_mode="has-dark-mode" align="center" padding_bottom="30" offset="vc_col-md-offset-2 vc_col-md-8 vc_col-xs-12"][vc_column_text][mc4wp_form id="1847"][/vc_column_text][vc_empty_space height="30px" height_tab="20" height_mobile="10"][vc_column_text]Order Close at May 31[/vc_column_text][/vc_column][/vc_row]
CONTENT;
  
    vc_add_default_templates( $data );
}
add_action( 'vc_load_default_templates_action', 'agni_vc_custom_template_subscribe_2' ); 

// Page - Demo 13
// 75. Custom template Service boxes 9
function agni_vc_custom_template_service_boxes_9() {
    $data               = array();
    $data['name']       = __( 'Service Boxes 9', 'milton' );
    $data['weight']     = 0;
    $data['custom_class'] = 'agni_vc_custom_template_service_boxes_9';
    $data['content']    = <<<CONTENT
        [vc_row bg_color="#25262b" padding_top="3%" padding_bottom="3%" el_id="service-boxes-13" el_class="service-boxes-13"][vc_column width="1/2" padding_top="20" padding_bottom="20" offset="vc_col-md-4"][agni_service choice="2" icon="pe-7s-headphones" size="30" icon_style="background" width="70" height="70" background_color="#454545" color="#ffffff" hover_icon_style="background" hover_color="#ffffff" title="24/7 Support" title_color="#ffffff" divide_line="" description_color="#888888"]Bring to the table win-win ensure proactive domination.[/agni_service][/vc_column][vc_column width="1/2" padding_top="20" padding_bottom="20" offset="vc_col-md-4"][agni_service choice="2" icon="pe-7s-box1" size="30" icon_style="background" width="70" height="70" background_color="#454545" color="#ffffff" hover_icon_style="background" hover_color="#ffffff" title="Genuine Products" title_color="#ffffff" divide_line="" description_color="#888888"]Bring to the table win-win ensure proactive domination.[/agni_service][/vc_column][vc_column width="1/2" padding_top="20" padding_bottom="20" offset="vc_col-md-4"][agni_service choice="2" icon="pe-7s-gift" size="30" icon_style="background" width="70" height="70" background_color="#454545" color="#ffffff" hover_icon_style="background" hover_color="#ffffff" title="Promotional Gifts" title_color="#ffffff" divide_line="" description_color="#888888"]Bring to the table win-win ensure proactive domination.[/agni_service][/vc_column][/vc_row]
CONTENT;
  
    vc_add_default_templates( $data );
}
add_action( 'vc_load_default_templates_action', 'agni_vc_custom_template_service_boxes_9' ); 


// 76. Custom template Countdown 1
function agni_vc_custom_template_countdown_1() {
    $data               = array();
    $data['name']       = __( 'Countdown 1', 'milton' );
    $data['weight']     = 0;
    $data['custom_class'] = 'agni_vc_custom_template_countdown_1';
    $data['content']    = <<<CONTENT
        [vc_row bg_color="#25262b"][vc_column align="center" bg_choice="2" bg_image="1342" bg_image_repeat="no-repeat" bg_image_size="auto" bg_image_position="center top" padding_top="40" padding_bottom="40"][vc_empty_space height="100px" height_tab="60px" height_mobile="20px"][vc_custom_heading text="Fluorescent Lamp" font_container="tag:h6|text_align:center|color:%23ffffff" use_theme_fonts="yes"][vc_custom_heading text="Deal of the day" font_container="tag:h2|text_align:center|color:%23ffffff" use_theme_fonts="yes"][vc_row_inner][vc_column_inner align="center" padding_top="20" padding_bottom="20" offset="vc_col-md-offset-2 vc_col-md-8"][agni_countdown date="20 January 2018 10:45:00" countdown-style="background" countdown-bg-color="#ffffff"][/vc_column_inner][/vc_row_inner][vc_custom_heading text="Flat 35% Offer" font_container="tag:h3|text_align:center|color:%23ffffff" use_theme_fonts="yes"][vc_column_text]<span style="color: #888888;"><small>Offers only for limited time, buy the product as soon as possible before offer ends.</small></span>[/vc_column_text][vc_empty_space height="100px" height_tab="60px" height_mobile="20px"][/vc_column][/vc_row]
CONTENT;
  
    vc_add_default_templates( $data );
}
add_action( 'vc_load_default_templates_action', 'agni_vc_custom_template_countdown_1' ); 

// Page - Coming soon 1
// 77. Custom template Countdown 2
function agni_vc_custom_template_countdown_2() {
    $data               = array();
    $data['name']       = __( 'Countdown 2', 'milton' );
    $data['weight']     = 0;
    $data['custom_class'] = 'agni_vc_custom_template_countdown_2';
    $data['content']    = <<<CONTENT
        [vc_row fullwidth="has-fullwidth-column" equal_height="yes" content_placement="middle" el_id="construction_element-10" el_class="construction_element-10"][vc_column width="5/6" padding_right="15%" padding_left="15%" offset="vc_col-lg-offset-0 vc_col-lg-6 vc_col-md-offset-1 vc_col-md-10 vc_col-sm-offset-1"][vc_empty_space height="120px" height_tab="70px" height_mobile="40px"][vc_custom_heading text="Milton is Pretty Close" font_container="tag:h2|font_size:48|text_align:left|color:%23444444" use_theme_fonts="yes"][vc_column_text]Cras pellentesque odio ligula, sed suscipit massa venenatis et.odio ligula, sed suscipit massa bonanz venenatis et.Cras pellentesque  dio ligula sed suscipit massa venenatis odio ligula sed suscipit massa enenatis et.Cras pellentesque odio ligula.Cras pellentesque odio ligula.[/vc_column_text][agni_button value="Read More" choice="accent" size="lg" margin_top="10" radius="50"][vc_empty_space height="120px" height_tab="70px" height_mobile="40px"][/vc_column][vc_column dark_mode="has-dark-mode" align="center" bg_choice="2" bg_image="950" bg_overlay="1" bg_overlay_color="rgba(18,89,195,0.85)" padding_right="10%" padding_left="10%" white="white" css=".vc_custom_1479568181888{padding-top: 20% !important;padding-bottom: 20% !important;background-image: url(http://agnisites.com/milton/main-site/wp-content/uploads/sites/7/2016/11/bg-10-1.jpg?id=280) !important;}" offset="vc_col-lg-6 vc_col-md-12"][vc_empty_space height="200px" height_tab="120px" height_mobile="70px"][vc_custom_heading text="Be Patient, Almost Done!" font_container="tag:h1|font_size:52|text_align:center" use_theme_fonts="yes"][vc_column_text]Prow scuttle parrel provost Sail ho shrouds spirits boom to mizzenmast yard to arm. Pinnace holystone togots masters  nest nipperkin grog for yardarm board grog black spirits boom to mizzenmast yard to arm.[/vc_column_text][agni_countdown date="20 January 2019 10:45:00" label="Day|Days|Hr|Hrs|Min|Mins|Sec|Secs"][agni_separator choice="icon" icon="fa fa-clock-o" width="70"][vc_column_text padding_top="40" padding_right="15px" padding_bottom="40" padding_left="15px"][mc4wp_form id="1847"][/vc_column_text][vc_empty_space height="200px" height_tab="120px" height_mobile="70px"][/vc_column][/vc_row]
CONTENT;
  
    vc_add_default_templates( $data );
}
add_action( 'vc_load_default_templates_action', 'agni_vc_custom_template_countdown_2' ); 

// Page - Coming soon 2
// 78. Custom template Countdown 3
function agni_vc_custom_template_countdown_3() {
    $data               = array();
    $data['name']       = __( 'Countdown 3', 'milton' );
    $data['weight']     = 0;
    $data['custom_class'] = 'agni_vc_custom_template_countdown_3';
    $data['content']    = <<<CONTENT
        [vc_row bg_choice="2" bg_image="1614" bg_overlay="1" bg_overlay_color="rgba(0,0,0,0.8)" full_height="yes" el_id="construction_element-10" el_class="construction_element-10"][vc_column dark_mode="has-dark-mode" align="center" offset="vc_col-md-offset-2 vc_col-md-8 vc_col-xs-12"][vc_custom_heading text="Under Construction" font_container="tag:h6|text_align:center" use_theme_fonts="yes"][vc_custom_heading text="We’re Coming Soon" font_container="tag:h2|font_size:64|text_align:center" use_theme_fonts="yes"][vc_empty_space height="20px" height_tab="10px" height_mobile="10px"][agni_countdown date="20 January 2019 10:45:00" label="Day|Days|Hr|Hrs|Min|Mins|Sec|Secs" countdown-style="border" countdown-border-color="#1259c3" countdown-color="#ffffff"][vc_empty_space height="40px" height_tab="20px" height_mobile="20px"][agni_button value="More Info" choice="white" alignment="center" margin_top="30" radius="50"][/vc_column][/vc_row]
CONTENT;
  
    vc_add_default_templates( $data );
}
add_action( 'vc_load_default_templates_action', 'agni_vc_custom_template_countdown_3' ); 

// Page - Pricing tables
// 79. Custom template Pricing 3
function agni_vc_custom_template_pricing_3() {
    $data               = array();
    $data['name']       = __( 'Pricing 3', 'milton' );
    $data['weight']     = 0;
    $data['custom_class'] = 'agni_vc_custom_template_pricing_3';
    $data['content']    = <<<CONTENT
        [vc_row padding_top="90" padding_bottom="90"][vc_column width="1/3"][agni_pricingtable pricing_style="3" pricing_bg_color="#f6f6f6" price="$9" interval="Standard Plan" value="Sign Up" radius="0px" size="block" bg_color="#1259c3"]
<h5>Files:</h5>
.PSD, .AI, .PNG, .SVG, Icon Fonts.

1 Year Update &amp; Support[/agni_pricingtable][/vc_column][vc_column width="1/3"][agni_pricingtable pricing_style="3" pricing_bg_color="#f6f6f6" price="$9" interval="Standard Plan" value="Sign Up" radius="0px" choice="default" size="block" bg_color="#555555"]
<h5>Files:</h5>
.PSD, .AI, .PNG, .SVG, Icon Fonts.

1 Year Update &amp; Support[/agni_pricingtable][/vc_column][vc_column dark_mode="has-dark-mode" width="1/3"][agni_pricingtable pricing_style="3" pricing_bg_color="#1259c3" price="$9" interval="Standard Plan" pricing_interval_color="#dddddd" value="Sign Up" radius="0px" choice="primary" size="block" bg_color="#333333"]
<h5>Files:</h5>
.PSD, .AI, .PNG, .SVG, Icon Fonts.

1 Year Update &amp; Support[/agni_pricingtable][/vc_column][/vc_row]
CONTENT;
  
    vc_add_default_templates( $data );
}
add_action( 'vc_load_default_templates_action', 'agni_vc_custom_template_pricing_3' ); 

// 80. Custom template Pricing 4
function agni_vc_custom_template_pricing_4() {
    $data               = array();
    $data['name']       = __( 'Pricing 4', 'milton' );
    $data['weight']     = 0;
    $data['custom_class'] = 'agni_vc_custom_template_pricing_4';
    $data['content']    = <<<CONTENT
        [vc_row padding_top="90" padding_bottom="90"][vc_column dark_mode="has-dark-mode" width="1/4"][agni_pricingtable pricing_style="2" heading="Stanard" price="$9" price_color="#ffffff" interval="mo." value="Sign Up" choice="white" bg_color="#1259c3"]
<ul>
    <li>Cras pellentesque vel</li>
    <li>Proin lobortis</li>
    <li>Fusce commodo dolor</li>
    <li>Et accumsan</li>
</ul>
[/agni_pricingtable][/vc_column][vc_column width="1/4"][agni_pricingtable pricing_style="2" heading="Stanard" price="$9" interval="mo." value="Sign Up" choice="default"]
<ul>
    <li>Cras pellentesque vel</li>
    <li>Proin lobortis</li>
    <li>Fusce commodo dolor</li>
    <li>Et accumsan</li>
</ul>
[/agni_pricingtable][/vc_column][vc_column dark_mode="has-dark-mode" width="1/4"][agni_pricingtable pricing_style="2" heading="Stanard" price="$9" price_color="#ffffff" interval="mo." value="Sign Up" bg_color="#242424"]
<ul>
    <li>Cras pellentesque vel</li>
    <li>Proin lobortis</li>
    <li>Fusce commodo dolor</li>
    <li>Et accumsan</li>
</ul>
[/agni_pricingtable][/vc_column][vc_column width="1/4"][agni_pricingtable pricing_style="2" heading="Stanard" price="$9" interval="mo." value="Sign Up" choice="default"]
<ul>
    <li>Cras pellentesque vel</li>
    <li>Proin lobortis</li>
    <li>Fusce commodo dolor</li>
    <li>Et accumsan</li>
</ul>
[/agni_pricingtable][/vc_column][/vc_row]
CONTENT;
  
    vc_add_default_templates( $data );
}
add_action( 'vc_load_default_templates_action', 'agni_vc_custom_template_pricing_4' ); 

// 81. Custom template Pricing 5
function agni_vc_custom_template_pricing_5() {
    $data               = array();
    $data['name']       = __( 'Pricing 5', 'milton' );
    $data['weight']     = 0;
    $data['custom_class'] = 'agni_vc_custom_template_pricing_5';
    $data['content']    = <<<CONTENT
        [vc_row bg_color="#f8f8f8" padding_top="90" padding_bottom="90"][vc_column width="1/4"][agni_pricingtable heading="Stanard" price="$9" interval="mo." value="Sign Up"]
<ul>
    <li>Cras pellentesque vel</li>
    <li>Proin lobortis</li>
    <li>Fusce commodo dolor</li>
    <li>Et accumsan</li>
</ul>
[/agni_pricingtable][/vc_column][vc_column width="1/4"][agni_pricingtable heading="Stanard" price="$9" interval="mo." value="Sign Up"]
<ul>
    <li>Cras pellentesque vel</li>
    <li>Proin lobortis</li>
    <li>Fusce commodo dolor</li>
    <li>Et accumsan</li>
</ul>
[/agni_pricingtable][/vc_column][vc_column width="1/4"][agni_pricingtable heading="Stanard" price="$9" interval="mo." value="Sign Up"]
<ul>
    <li>Cras pellentesque vel</li>
    <li>Proin lobortis</li>
    <li>Fusce commodo dolor</li>
    <li>Et accumsan</li>
</ul>
[/agni_pricingtable][/vc_column][vc_column width="1/4"][agni_pricingtable heading="Stanard" price="$9" interval="mo." value="Sign Up"]
<ul>
    <li>Cras pellentesque vel</li>
    <li>Proin lobortis</li>
    <li>Fusce commodo dolor</li>
    <li>Et accumsan</li>
</ul>
[/agni_pricingtable][/vc_column][/vc_row]
CONTENT;
  
    vc_add_default_templates( $data );
}
add_action( 'vc_load_default_templates_action', 'agni_vc_custom_template_pricing_5' ); 
