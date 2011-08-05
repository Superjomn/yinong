	var bardata = [
		{'index': 0, 'title': '加粗', 'class': 'tag curr0', 'hover': 'curr0_hover', 'active': 'curr0_active', 'unselectable': 'on', 'command': 'bold' },
		{'index': 1, 'title': '斜体', 'class': 'tag curr1', 'hover': 'curr1_hover', 'active': 'curr1_active', 'unselectable': 'on', 'command': 'italic' },
		{'index': 2, 'title': '下划线', 'class': 'tag curr2', 'hover': 'curr2_hover', 'active': 'curr2_active', 'unselectable': 'on', 'command': 'underline' },
		{'index': 3, 'title': '字号', 'class': 'tag curr3', 'hover': 'curr3_hover', 'active': 'curr3_active', 'unselectable': 'on', 'command': 'fontSize' },
		{'index': 4, 'title': '字体', 'class': 'tag curr4', 'hover': 'curr4_hover', 'active': 'curr4_active', 'unselectable': 'on', 'command': 'fontName' },
		{'index': 5, 'title': '文字颜色', 'class': 'tag curr5', 'hover': 'curr5_hover', 'active': 'curr5_active', 'unselectable': 'on', 'command': 'foreColor' },
		{'index': 6, 'title': '插入链接', 'class': 'tag curr6', 'hover': 'curr6_hover', 'active': 'curr6_active', 'unselectable': 'on', 'command': 'createLink'},
		{'index': 7, 'title': '左对齐', 'class': 'tag curr9', 'hover': 'curr9_hover', 'active': 'curr9_active', 'unselectable': 'on', 'command': 'justifyLeft' },
		{'index': 8, 'title': '居中对齐', 'class': 'tag curr10', 'hover': 'curr10_hover', 'active': 'curr10_active', 'unselectable': 'on', 'command': 'justifyCenter' },
		{'index': 9, 'title': '右对齐', 'class': 'tag curr11', 'hover': 'curr11_hover', 'active': 'curr11_active', 'unselectable': 'on', 'command': 'justifyRight' },
		{'index': 10, 'title': '项目符号', 'class': 'tag curr12', 'hover': 'curr12_hover', 'active': 'curr12_active', 'unselectable': 'on', 'command': 'insertUnorderedList' },
		{'index': 11, 'title': '编号', 'class': 'tag curr13', 'hover': 'curr13_hover', 'active': 'curr13_active', 'unselectable': 'on', 'command': 'insertOrderedList' },
		{'index': 12, 'title': '减少缩进', 'class': 'tag curr15', 'hover': 'curr15_hover', 'active': 'curr15_active', 'unselectable': 'on', 'command': 'outdent' },
		{'index': 13, 'title': '增加缩进', 'class': 'tag curr16', 'hover': 'curr16_hover', 'active': 'curr16_active', 'unselectable': 'on', 'command': 'indent'},
		{'index': 14, 'title': '清除样式', 'class': 'tag curr17', 'hover': 'curr17_hover', 'active': 'curr17_active', 'unselectable': 'on', 'command': 'removeFormat'},
		{'index': 15, 'title': '插入图片', 'class': 'tag curr18', 'hover': 'curr18_hover', 'active': 'curr18_active', 'unselectable': 'on', 'command': 'insertImage'}	];
	var e = new editor('container', bardata);
	
