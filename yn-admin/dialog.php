<script type="text/javascript" src="jquery/jquery-ui/development-bundle/ui/jquery.ui.dialog.js"></script>
<script type="text/javascript" src="jquery/jquery-ui/development-bundle/ui/jquery.ui.position.js"></script>
<div id="dialog"></div>
<script type="text/javascript">
	var dook=function(){
		$("#dialog").dialog('close');
	}
	var dialogOpt={
		modal:true,
		buttons:{
			"确定":dook
		}
	};
	$("#dialog").dialog(dialogOpt);
	function dlg(text){
		$("#dialog").text(text).dialog('open');
	}
</script>