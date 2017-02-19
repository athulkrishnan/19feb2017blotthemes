<?php

$args = array(
    "title"             		        => "",
	"title_tag"		    		        => "h5",
    "text"			    		        => "",
	"price"             		        => "0",
    "enable_highlighted_item"           => "",
    "highlighted_text"                  => "",
    "margin_bottom_item"    	        => ""
);

extract(shortcode_atts($args, $atts));

$title = esc_html($title);
$text = esc_html($text);
$price = esc_html($price);
$highlighted_text = esc_html($highlighted_text);
$margin_bottom_item = esc_attr($margin_bottom_item);


$headings_array = array('h2', 'h3', 'h4', 'h5', 'h6');

//get correct heading value. If provided heading isn't valid get the default one
$title_tag = (in_array($title_tag, $headings_array)) ? $title_tag : $args['title_tag'];

//init variables
$html 			         = '';
$separator_bottom_styles = '';
$marked_class            = '';
$new_item_html           = '';
$highlighted_text_html   = '';
$list_item_style         = '';



if( $enable_highlighted_item == 'enable_highlighted_item' ) {
    $marked_class .= ' qode-highlighted-item ';
    if ( $highlighted_text !== "" ){
        $highlighted_text_html = "<div class='qode-pricing-list-highlited'><span>$highlighted_text</span></div>";
    }
}


if ( $margin_bottom_item !== "" ){
    $list_item_style = "style= 'margin-bottom: ".$margin_bottom_item."px;'";
}

$html .= '<div class="qode-pricing-list-item clearfix '.$marked_class.'" '.$list_item_style.'>';

    $html .='<div class="qode-pricing-list-content">';


        //top text
        $html .= '<div class="qode-pricing-list-top">';

            $html .= '<div class="qode-pricing-item-title-holder">';
                 $html .= '<'.$title_tag.' class="qode-pricing-item-title">'.$title.'</'.$title_tag.'>';
            $html .= '</div>';

            $html .= '<div class="pricing-list-dots"></div>';

            $html .= '<div class="qode-pricing-item-price-holder">';
                $html .= '<'.$title_tag.' class="qode-pricing-item-price">'.$price.'</'.$title_tag.'>';
            $html .= '</div>';

        $html .= '</div>';


        //bottom text
        $html .= '<div class="qode-pricing-list-bottom">';
            $html .= '<div class="qode-pricing-list-text">'.$text.'</div>';
            $html .= $highlighted_text_html;
        $html .= '</div>';




    $html .='</div>';

$html .='</div>';

print $html;

