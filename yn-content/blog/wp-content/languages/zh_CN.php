<?php

if ( get_option('zh_cn_language_pack_is_configured') != 1 ) {
	update_option('zh_cn_language_pack_enable_backend_style_modifications', 1);
}


function zh_cn_language_pack_backend_create_menu() {
	add_options_page( '中文语言包附加设置', '中文语言包', 'administrator', 'zh-cn-language-pack-settings', 
					  'zh_cn_language_pack_settings_page' );
}

function zh_cn_language_pack_backend_register_settings() {
	register_setting( 'zh-cn-language-pack-general-settings',
					  'zh_cn_language_pack_enable_backend_style_modifications' );
	register_setting( 'zh-cn-language-pack-general-settings',
					  'zh_cn_language_pack_is_configured' );
}

function zh_cn_language_pack_settings_page() { ?>
<div class="wrap">
<h2>中文语言包设置</h2>

<form method="post" action="options.php">
	<p>对中文语言包进行自定义。</p>
	<?php settings_fields( 'zh-cn-language-pack-general-settings' ); ?>
	<table class="form-table">
		<tr valign="top">
			<th scope="row">后台样式优化</th>
			<td>
				<input type="checkbox" id="zh_cn_language_pack_enable_backend_style_modifications" name="zh_cn_language_pack_enable_backend_style_modifications" value="1"<?php checked('1', get_option('zh_cn_language_pack_enable_backend_style_modifications')); ?> /><label for="zh_cn_language_pack_enable_backend_style_modifications">启用</label><br />
				<span class="description">启用对后台样式的优化，专为中文用户设计。</span>
			</td>
		</tr>
	</table>

	<input type="hidden" id="zh_cn_language_pack_is_configured" name="zh_cn_language_pack_is_configured" value="1" />
	
	<p class="submit">
		<input type="submit" class="button-primary" value="<?php _e('保存设置') ?>" />
	</p>

	<p>
		<strong>注：</strong>在未来版本中，可能会允许您直接自定义 CSS 样式。
	</p>

	<!--
	<p>
		<strong>调试信息：</strong><br />
		zh_cn_language_pack_enable_backend_style_modifications = <?php echo get_option('zh_cn_language_pack_enable_backend_style_modifications'); ?><br />
		zh_cn_language_pack_is_configured = <?php echo get_option('zh_cn_language_pack_is_configured'); ?>
	</p>
	-->
	
</form>
</div><?php
}

function zh_cn_language_pack_backend_style_modify() {
	echo <<<EOF
<style type="text/css" media="screen">
	body { font: 12px "Lucida Grande",Verdana,Arial,"Bitstream Vera Sans",sans-serif,"新宋体","宋体"; }
	#adminmenu .wp-submenu a { font-size: 11.5px; }
	#adminmenu a.menu-top { font-family: Georgia,"Times New Roman","Bitstream Charter",Times,serif,"Microsoft YaHei Bold","Microsoft YaHei","微软雅黑","WenQuanYi Zen Hei","文泉驿正黑","WenQuanYi Micro Hei","文泉驿微米黑","黑体"; }
	h1#site-heading span { font-family:  Georgia,"Times New Roman","Bitstream Charter",Times,serif,"Microsoft YaHei Bold","Microsoft YaHei","微软雅黑","WenQuanYi Zen Hei","文泉驿正黑","WenQuanYi Micro Hei","文泉驿微米黑","黑体"; }
	.form-table td { font-size: 12px; }
	#footer, #footer a, #footer p { font-size: 13px; font-style: normal; }
	#screen-meta a.show-settings { font-size: 12px; }
	#favorite-actions a { font-size: 12px; }
	.postbox p, .postbox ul, .postbox ol, .postbox blockquote, #wp-version-message { font-size: 13px; }
	#dashboard_right_now p.sub { font-size: 14px; font-style: normal; }
	.row-actions { font-size: 12px; }
	.widefat td, .widefat th, .widefat td p, .widefat td ol, .widefat td ul { font-size: 13px; }
	.submit input, .button, input.button, .button-primary, input.button-primary, .button-secondary, input.button-secondary, .button-highlighted, input.button-highlighted, #postcustomstuff .submit input { font-size: 12px !important; }
	.subsubsub { font-size: 12px; }
	#wpcontent select { font-size: 12px; }
	form.upgrade .hint { font-style: normal; font-weight: bold; font-size: 100% }
	#poststuff .inside, #poststuff .inside p { font-size: 12px; line-height: 112% }
	.tablenav .displaying-num { font-size: 12px; font-style: normal; }
	p.help, p.description, span.description, .form-wrap { font-size: 13px; }
	.widget .widget-inside, .widget .widget-description { font-size: 12px; }
	.appearance_page_custom-header #upload-form p label { font-size: 12px; }
	.wp_themeSkin .mceMenu span.mceText, .wp_themeSkin .mceMenu .mcePreview { font-size: 12px; }
	form .forgetmenot label { font-size: 12px; }
	.wrap h2 { font: normal 24px/35px Georgia,"Times New Roman","Bitstream Charter",Times,serif,"Microsoft YaHei Bold","Microsoft YaHei","微软雅黑","WenQuanYi Zen Hei","文泉驿正黑","WenQuanYi Micro Hei","文泉驿微米黑","黑体"; }
	.howto { font-style: normal; }
	p.help, p.description, span.description, .form-wrap p { font-style: normal; }
	.inline-edit-row fieldset span.title, .inline-edit-row fieldset span.checkbox-title { font-style: normal; }
	#edithead .inside, #edithead .inside input { font-size: 12px; }
	h2 .nav-tab { font: normal 24px/35px Georgia,"Times New Roman","Bitstream Charter",Times,serif,"Microsoft YaHei Bold","Microsoft YaHei","微软雅黑","WenQuanYi Zen Hei","文泉驿正黑","WenQuanYi Micro Hei","文泉驿微米黑","黑体"; }
	em { font-style: normal; }
	.menu-name-label span, .auto-add-pages label { font-size: 12px; }
	#dashboard_quick_press #media-buttons { font-size: 12px; }
	p.install-help { font-style: normal; }
	.inline-edit-row fieldset ul.cat-checklist label, .inline-edit-row .catshow, .inline-edit-row .cathide, .inline-edit-row #bulk-titles div { font-size: 12px; }
	#the-comment-list .comment-item p.row-actions { font-size: 12px; }
	#utc-time, #local-time { font-style: normal; }
</style>

EOF;
}

add_action( 'admin_init', 'zh_cn_language_pack_backend_register_settings' );

if ( is_admin() ) {
	add_action( 'admin_menu', 'zh_cn_language_pack_backend_create_menu' );
}

if ( get_option('zh_cn_language_pack_enable_backend_style_modifications') == 1 ) {
	add_action( 'admin_head', 'zh_cn_language_pack_backend_style_modify' );
	add_action( 'login_head', 'zh_cn_language_pack_backend_style_modify' );
}

?>
