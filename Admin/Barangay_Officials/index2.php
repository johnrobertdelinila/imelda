<!DOCTYPE html>
<html>

<head>
	<title>Slim Organogram</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script type="text/javascript" src="../../dhtmlx/diagram/codebase/diagram.js"></script>
	<link rel="stylesheet" href="../../dhtmlx/diagram/codebase/diagram.css">
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,500" rel="stylesheet">

	<link rel="stylesheet" href="../../dhtmlx/diagram/samples/common/dhx_samples.css">
	<script type="text/javascript" src="../../dhtmlx/diagram/samples/common/data.js"></script>
</head>
<style>
	body {
		text-align: center;
	}
	.dhx_delete_btn{
display:none;
}
</style>
<body>
	<script>
		mygrid.attachEvent("onBeforeSelect", function(new_row,old_row){return false;});
		var diagram = new dhx.Diagram(document.body, { 
			type: "org",
			defaultShapeType: "img-card",
			scale : 0.8
		});
		diagram.data.parse(bigOrganogramData);
	</script>

</body>

</html>