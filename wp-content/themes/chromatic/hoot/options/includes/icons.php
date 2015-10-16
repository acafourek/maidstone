<?php
/**
 * Functions for sending list of icon fonts available.
 *
 * @package chromaticfw
 * @subpackage framework
 * @since chromaticfw 1.0.0
 */

/**
 * Generates the icon and section list
 *
 * @since 1.0.0
 * @access public
 * @param string $return array to return sections|icons
 * @return array
 */
function chromaticfw_fonticons_list( $return = 'icons' ) {

	if ( 'sections' == $return ) :
		return apply_filters( 'chromaticfw_fonticons_sections', array(
			'web_application_icons'  => __('Web Application', 'chromatic'),
			'file_type_icons'        => __('File Type', 'chromatic'),
			'spinner_icons'          => __('Spinner', 'chromatic'),
			'form_control_icons'     => __('Form Control', 'chromatic'),
			'payment_icons'          => __('Payment', 'chromatic'),
			'chart_icons'            => __('Chart', 'chromatic'),
			'currency_icons'         => __('Currency', 'chromatic'),
			'text_editor_icons'      => __('Text Editor', 'chromatic'),
			'directional_icons'      => __('Directional', 'chromatic'),
			'video_player_icons'     => __('Video Player', 'chromatic'),
			'brand_icons'            => __('Brand', 'chromatic'),
			'medical_icons'          => __('Medical', 'chromatic'),
			)
		);
	endif;

	if ( 'icons' == $return ) :
		return apply_filters( 'chromaticfw_fonticons_icons', array (
			'web_application_icons' => array (
				'fa-adjust',
				'fa-anchor',
				'fa-archive',
				'fa-area-chart',
				'fa-arrows',
				'fa-arrows-h',
				'fa-arrows-v',
				'fa-asterisk',
				'fa-at',
				'fa-ban',
				'fa-bar-chart',
				'fa-barcode',
				'fa-bars',
				'fa-beer',
				'fa-bell',
				'fa-bell-o',
				'fa-bell-slash',
				'fa-bell-slash-o',
				'fa-bicycle',
				'fa-binoculars',
				'fa-birthday-cake',
				'fa-bolt',
				'fa-bomb',
				'fa-book',
				'fa-bookmark',
				'fa-bookmark-o',
				'fa-briefcase',
				'fa-bug',
				'fa-building',
				'fa-building-o',
				'fa-bullhorn',
				'fa-bullseye',
				'fa-bus',
				'fa-calculator',
				'fa-calendar',
				'fa-calendar-o',
				'fa-camera',
				'fa-camera-retro',
				'fa-car',
				'fa-caret-square-o-down',
				'fa-caret-square-o-left',
				'fa-caret-square-o-right',
				'fa-caret-square-o-up',
				'fa-cc',
				'fa-certificate',
				'fa-check',
				'fa-check-circle',
				'fa-check-circle-o',
				'fa-check-square',
				'fa-check-square-o',
				'fa-child',
				'fa-circle',
				'fa-circle-o',
				'fa-circle-o-notch',
				'fa-circle-thin',
				'fa-clock-o',
				'fa-cloud',
				'fa-cloud-download',
				'fa-cloud-upload',
				'fa-code',
				'fa-code-fork',
				'fa-coffee',
				'fa-cog',
				'fa-cogs',
				'fa-comment',
				'fa-comment-o',
				'fa-comments',
				'fa-comments-o',
				'fa-compass',
				'fa-copyright',
				'fa-credit-card',
				'fa-crop',
				'fa-crosshairs',
				'fa-cube',
				'fa-cubes',
				'fa-cutlery',
				'fa-database',
				'fa-desktop',
				'fa-dot-circle-o',
				'fa-download',
				'fa-ellipsis-h',
				'fa-ellipsis-v',
				'fa-envelope',
				'fa-envelope-o',
				'fa-envelope-square',
				'fa-eraser',
				'fa-exchange',
				'fa-exclamation',
				'fa-exclamation-circle',
				'fa-exclamation-triangle',
				'fa-external-link',
				'fa-external-link-square',
				'fa-eye',
				'fa-eye-slash',
				'fa-eyedropper',
				'fa-fax',
				'fa-female',
				'fa-fighter-jet',
				'fa-file-archive-o',
				'fa-file-audio-o',
				'fa-file-code-o',
				'fa-file-excel-o',
				'fa-file-image-o',
				'fa-file-pdf-o',
				'fa-file-powerpoint-o',
				'fa-file-video-o',
				'fa-file-word-o',
				'fa-film',
				'fa-filter',
				'fa-fire',
				'fa-fire-extinguisher',
				'fa-flag',
				'fa-flag-checkered',
				'fa-flag-o',
				'fa-flask',
				'fa-folder',
				'fa-folder-o',
				'fa-folder-open',
				'fa-folder-open-o',
				'fa-frown-o',
				'fa-futbol-o',
				'fa-gamepad',
				'fa-gavel',
				'fa-gift',
				'fa-glass',
				'fa-globe',
				'fa-graduation-cap',
				'fa-hdd-o',
				'fa-headphones',
				'fa-heart',
				'fa-heart-o',
				'fa-history',
				'fa-home',
				'fa-inbox',
				'fa-info',
				'fa-info-circle',
				'fa-key',
				'fa-keyboard-o',
				'fa-language',
				'fa-laptop',
				'fa-leaf',
				'fa-lemon-o',
				'fa-level-down',
				'fa-level-up',
				'fa-life-ring',
				'fa-lightbulb-o',
				'fa-line-chart',
				'fa-location-arrow',
				'fa-lock',
				'fa-magic',
				'fa-magnet',
				'fa-male',
				'fa-map-marker',
				'fa-meh-o',
				'fa-microphone',
				'fa-microphone-slash',
				'fa-minus',
				'fa-minus-circle',
				'fa-minus-square',
				'fa-minus-square-o',
				'fa-mobile',
				'fa-money',
				'fa-moon-o',
				'fa-music',
				'fa-newspaper-o',
				'fa-paint-brush',
				'fa-paper-plane',
				'fa-paper-plane-o',
				'fa-paw',
				'fa-pencil',
				'fa-pencil-square',
				'fa-pencil-square-o',
				'fa-phone',
				'fa-phone-square',
				'fa-picture-o',
				'fa-pie-chart',
				'fa-plane',
				'fa-plug',
				'fa-plus',
				'fa-plus-circle',
				'fa-plus-square',
				'fa-plus-square-o',
				'fa-power-off',
				'fa-print',
				'fa-puzzle-piece',
				'fa-qrcode',
				'fa-question',
				'fa-question-circle',
				'fa-quote-left',
				'fa-quote-right',
				'fa-random',
				'fa-recycle',
				'fa-refresh',
				'fa-reply',
				'fa-reply-all',
				'fa-retweet',
				'fa-road',
				'fa-rocket',
				'fa-rss',
				'fa-rss-square',
				'fa-search',
				'fa-search-minus',
				'fa-search-plus',
				'fa-share',
				'fa-share-alt',
				'fa-share-alt-square',
				'fa-share-square',
				'fa-share-square-o',
				'fa-shield',
				'fa-shopping-cart',
				'fa-sign-in',
				'fa-sign-out',
				'fa-signal',
				'fa-sitemap',
				'fa-sliders',
				'fa-smile-o',
				'fa-sort',
				'fa-sort-alpha-asc',
				'fa-sort-alpha-desc',
				'fa-sort-amount-asc',
				'fa-sort-amount-desc',
				'fa-sort-asc',
				'fa-sort-desc',
				'fa-sort-numeric-asc',
				'fa-sort-numeric-desc',
				'fa-space-shuttle',
				'fa-spinner',
				'fa-spoon',
				'fa-square',
				'fa-square-o',
				'fa-star',
				'fa-star-half',
				'fa-star-half-o',
				'fa-star-o',
				'fa-suitcase',
				'fa-sun-o',
				'fa-tablet',
				'fa-tachometer',
				'fa-tag',
				'fa-tags',
				'fa-tasks',
				'fa-taxi',
				'fa-terminal',
				'fa-thumb-tack',
				'fa-thumbs-down',
				'fa-thumbs-o-down',
				'fa-thumbs-o-up',
				'fa-thumbs-up',
				'fa-ticket',
				'fa-times',
				'fa-times-circle',
				'fa-times-circle-o',
				'fa-tint',
				'fa-toggle-off',
				'fa-toggle-on',
				'fa-trash',
				'fa-trash-o',
				'fa-tree',
				'fa-trophy',
				'fa-truck',
				'fa-tty',
				'fa-umbrella',
				'fa-university',
				'fa-unlock',
				'fa-unlock-alt',
				'fa-upload',
				'fa-user',
				'fa-users',
				'fa-video-camera',
				'fa-volume-down',
				'fa-volume-off',
				'fa-volume-up',
				'fa-wheelchair',
				'fa-wifi',
				'fa-wrench',
			),

			'file_type_icons' => array (
				'fa-file',
				'fa-file-archive-o',
				'fa-file-audio-o',
				'fa-file-code-o',
				'fa-file-excel-o',
				'fa-file-image-o',
				'fa-file-o',
				'fa-file-pdf-o',
				'fa-file-powerpoint-o',
				'fa-file-text',
				'fa-file-text-o',
				'fa-file-video-o',
				'fa-file-word-o',
			),

			'spinner_icons' => array (
				'fa-circle-o-notch',
				'fa-cog',
				'fa-refresh',
				'fa-spinner',
			),

			'form_control_icons' => array (
				'fa-check-square',
				'fa-check-square-o',
				'fa-circle',
				'fa-circle-o',
				'fa-dot-circle-o',
				'fa-minus-square',
				'fa-minus-square-o',
				'fa-plus-square',
				'fa-plus-square-o',
				'fa-square',
				'fa-square-o',
			),

			'payment_icons' => array (
				'fa-cc-amex',
				'fa-cc-discover',
				'fa-cc-mastercard',
				'fa-cc-paypal',
				'fa-cc-stripe',
				'fa-cc-visa',
				'fa-credit-card',
				'fa-google-wallet',
				'fa-paypal',
			),

			'chart_icons' => array (
				'fa-area-chart',
				'fa-bar-chart',
				'fa-line-chart',
				'fa-pie-chart',
			),

			'currency_icons' => array (
				'fa-btc',
				'fa-eur',
				'fa-gbp',
				'fa-ils',
				'fa-inr',
				'fa-jpy',
				'fa-krw',
				'fa-money',
				'fa-rub',
				'fa-try',
				'fa-usd',
			),

			'text_editor_icons' => array (
				'fa-align-center',
				'fa-align-justify',
				'fa-align-left',
				'fa-align-right',
				'fa-bold',
				'fa-chain-broken',
				'fa-clipboard',
				'fa-columns',
				'fa-eraser',
				'fa-file',
				'fa-file-o',
				'fa-file-text',
				'fa-file-text-o',
				'fa-files-o',
				'fa-floppy-o',
				'fa-font',
				'fa-header',
				'fa-indent',
				'fa-italic',
				'fa-link',
				'fa-list',
				'fa-list-alt',
				'fa-list-ol',
				'fa-list-ul',
				'fa-outdent',
				'fa-paperclip',
				'fa-paragraph',
				'fa-repeat',
				'fa-scissors',
				'fa-strikethrough',
				'fa-subscript',
				'fa-superscript',
				'fa-table',
				'fa-text-height',
				'fa-text-width',
				'fa-th',
				'fa-th-large',
				'fa-th-list',
				'fa-underline',
				'fa-undo',
			),

			'directional_icons' => array (
				'fa-angle-double-down',
				'fa-angle-double-left',
				'fa-angle-double-right',
				'fa-angle-double-up',
				'fa-angle-down',
				'fa-angle-left',
				'fa-angle-right',
				'fa-angle-up',
				'fa-arrow-circle-down',
				'fa-arrow-circle-left',
				'fa-arrow-circle-o-down',
				'fa-arrow-circle-o-left',
				'fa-arrow-circle-o-right',
				'fa-arrow-circle-o-up',
				'fa-arrow-circle-right',
				'fa-arrow-circle-up',
				'fa-arrow-down',
				'fa-arrow-left',
				'fa-arrow-right',
				'fa-arrow-up',
				'fa-arrows',
				'fa-arrows-alt',
				'fa-arrows-h',
				'fa-arrows-v',
				'fa-caret-down',
				'fa-caret-left',
				'fa-caret-right',
				'fa-caret-square-o-down',
				'fa-caret-square-o-left',
				'fa-caret-square-o-right',
				'fa-caret-square-o-up',
				'fa-caret-up',
				'fa-chevron-circle-down',
				'fa-chevron-circle-left',
				'fa-chevron-circle-right',
				'fa-chevron-circle-up',
				'fa-chevron-down',
				'fa-chevron-left',
				'fa-chevron-right',
				'fa-chevron-up',
				'fa-hand-o-down',
				'fa-hand-o-left',
				'fa-hand-o-right',
				'fa-hand-o-up',
				'fa-long-arrow-down',
				'fa-long-arrow-left',
				'fa-long-arrow-right',
				'fa-long-arrow-up',
			),

			'video_player_icons' => array (
				'fa-arrows-alt',
				'fa-backward',
				'fa-compress',
				'fa-eject',
				'fa-expand',
				'fa-fast-backward',
				'fa-fast-forward',
				'fa-forward',
				'fa-pause',
				'fa-play',
				'fa-play-circle',
				'fa-play-circle-o',
				'fa-step-backward',
				'fa-step-forward',
				'fa-stop',
				'fa-youtube-play',
			),

			'brand_icons' => array (
				'fa-adn',
				'fa-android',
				'fa-angellist',
				'fa-apple',
				'fa-behance',
				'fa-behance-square',
				'fa-bitbucket',
				'fa-bitbucket-square',
				'fa-btc',
				'fa-cc-amex',
				'fa-cc-discover',
				'fa-cc-mastercard',
				'fa-cc-paypal',
				'fa-cc-stripe',
				'fa-cc-visa',
				'fa-codepen',
				'fa-css3',
				'fa-delicious',
				'fa-deviantart',
				'fa-digg',
				'fa-dribbble',
				'fa-dropbox',
				'fa-drupal',
				'fa-empire',
				'fa-facebook',
				'fa-facebook-square',
				'fa-flickr',
				'fa-foursquare',
				'fa-git',
				'fa-git-square',
				'fa-github',
				'fa-github-alt',
				'fa-github-square',
				'fa-gittip',
				'fa-google',
				'fa-google-plus',
				'fa-google-plus-square',
				'fa-google-wallet',
				'fa-hacker-news',
				'fa-html5',
				'fa-instagram',
				'fa-ioxhost',
				'fa-joomla',
				'fa-jsfiddle',
				'fa-lastfm',
				'fa-lastfm-square',
				'fa-linkedin',
				'fa-linkedin-square',
				'fa-linux',
				'fa-maxcdn',
				'fa-meanpath',
				'fa-openid',
				'fa-pagelines',
				'fa-paypal',
				'fa-pied-piper',
				'fa-pied-piper-alt',
				'fa-pinterest',
				'fa-pinterest-square',
				'fa-qq',
				'fa-rebel',
				'fa-reddit',
				'fa-reddit-square',
				'fa-renren',
				'fa-share-alt',
				'fa-share-alt-square',
				'fa-skype',
				'fa-slack',
				'fa-slideshare',
				'fa-soundcloud',
				'fa-spotify',
				'fa-stack-exchange',
				'fa-stack-overflow',
				'fa-steam',
				'fa-steam-square',
				'fa-stumbleupon',
				'fa-stumbleupon-circle',
				'fa-tencent-weibo',
				'fa-trello',
				'fa-tumblr',
				'fa-tumblr-square',
				'fa-twitch',
				'fa-twitter',
				'fa-twitter-square',
				'fa-vimeo-square',
				'fa-vine',
				'fa-vk',
				'fa-weibo',
				'fa-weixin',
				'fa-windows',
				'fa-wordpress',
				'fa-xing',
				'fa-xing-square',
				'fa-yahoo',
				'fa-yelp',
				'fa-youtube',
				'fa-youtube-play',
				'fa-youtube-square',
			),

			'medical_icons' => array (
				'fa-ambulance',
				'fa-h-square',
				'fa-hospital-o',
				'fa-medkit',
				'fa-plus-square',
				'fa-stethoscope',
				'fa-user-md',
				'fa-wheelchair',
			),
			)
		);
	endif;

}