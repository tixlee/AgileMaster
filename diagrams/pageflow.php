<?php
session_start();
ob_start();

include_once '../connection/dbconnection.php';
include_once '../helpers/module.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Colorlib Templates">
    <meta name="author" content="Colorlib">
    <meta name="keywords" content="Colorlib Templates">

    <title>AgileMaster | PageFlow Creator</title>
	<?php include('../navigation/head.php');?>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">
    <link href="../doc_generator/css/main.css" rel="stylesheet" media="all">
	<script src="html2canvas.js"></script>
	<script src="go.js"></script>
	
	<script id="code">
    function init() {
      if (window.goSamples) goSamples();  // init for these samples -- you don't need to call this
      var $ = go.GraphObject.make;  // for conciseness in defining templates

      var yellowgrad = $(go.Brush, "Linear", { 0: "rgb(254, 201, 0)", 1: "rgb(254, 162, 0)" });
      var greengrad = $(go.Brush, "Linear", { 0: "#98FB98", 1: "#9ACD32" });
      var bluegrad = $(go.Brush, "Linear", { 0: "#B0E0E6", 1: "#87CEEB" });
      var redgrad = $(go.Brush, "Linear", { 0: "#C45245", 1: "#871E1B" });
      var whitegrad = $(go.Brush, "Linear", { 0: "#F0F8FF", 1: "#E6E6FA" });

      var bigfont = "bold 13pt Helvetica, Arial, sans-serif";
      var smallfont = "bold 11pt Helvetica, Arial, sans-serif";

      // Common text styling
      function textStyle() {
        return {
          margin: 6,
          wrap: go.TextBlock.WrapFit,
          textAlign: "center",
          editable: true,
          font: bigfont
        }
      }

      myDiagram =
        $(go.Diagram, "myDiagramDiv",
          {
            // have mouse wheel events zoom in and out instead of scroll up and down
            "toolManager.mouseWheelBehavior": go.ToolManager.WheelZoom,
            initialAutoScale: go.Diagram.Uniform,
            "linkingTool.direction": go.LinkingTool.ForwardsOnly,
            layout: $(go.LayeredDigraphLayout, { isInitial: false, isOngoing: false, layerSpacing: 50 }),
            "undoManager.isEnabled": true
          });

      // when the document is modified, add a "*" to the title and enable the "Save" button
      myDiagram.addDiagramListener("Modified", function(e) {
        var button = document.getElementById("SaveButton");
        if (button) button.disabled = !myDiagram.isModified;
        var idx = document.title.indexOf("*");
        if (myDiagram.isModified) {
          if (idx < 0) document.title += "*";
        } else {
          if (idx >= 0) document.title = document.title.substr(0, idx);
        }
      });

      var defaultAdornment =
        $(go.Adornment, "Spot",
          $(go.Panel, "Auto",
            $(go.Shape, { fill: null, stroke: "dodgerblue", strokeWidth: 4 }),
            $(go.Placeholder)),
          // the button to create a "next" node, at the top-right corner
          $("Button",
            {
              alignment: go.Spot.TopRight,
              click: addNodeAndLink
            },  // this function is defined below
            new go.Binding("visible", "", function(a) { return !a.diagram.isReadOnly; }).ofObject(),
            $(go.Shape, "PlusLine", { desiredSize: new go.Size(6, 6) })
          )
        );

      // define the Node template
      myDiagram.nodeTemplate =
        $(go.Node, "Auto",
          { selectionAdornmentTemplate: defaultAdornment },
          new go.Binding("location", "loc", go.Point.parse).makeTwoWay(go.Point.stringify),
          // define the node's outer shape, which will surround the TextBlock
          $(go.Shape, "Rectangle",
            {
              fill: yellowgrad, stroke: "black",
              portId: "", fromLinkable: true, toLinkable: true, cursor: "pointer",
              toEndSegmentLength: 50, fromEndSegmentLength: 40
            }),
          $(go.TextBlock, "Page",
            {
              margin: 6,
              font: bigfont,
              editable: true
            },
            new go.Binding("text", "text").makeTwoWay()));

      myDiagram.nodeTemplateMap.add("Source",
        $(go.Node, "Auto",
          new go.Binding("location", "loc", go.Point.parse).makeTwoWay(go.Point.stringify),
          $(go.Shape, "RoundedRectangle",
            {
              fill: bluegrad,
              portId: "", fromLinkable: true, cursor: "pointer", fromEndSegmentLength: 40
            }),
          $(go.TextBlock, "Source", textStyle(),
            new go.Binding("text", "text").makeTwoWay())
        ));

      myDiagram.nodeTemplateMap.add("DesiredEvent",
        $(go.Node, "Auto",
          new go.Binding("location", "loc", go.Point.parse).makeTwoWay(go.Point.stringify),
          $(go.Shape, "RoundedRectangle",
            { fill: greengrad, portId: "", toLinkable: true, toEndSegmentLength: 50 }),
          $(go.TextBlock, "Success!", textStyle(),
            new go.Binding("text", "text").makeTwoWay())
        ));

      // Undesired events have a special adornment that allows adding additional "reasons"
      var UndesiredEventAdornment =
        $(go.Adornment, "Spot",
          $(go.Panel, "Auto",
            $(go.Shape, { fill: null, stroke: "dodgerblue", strokeWidth: 4 }),
            $(go.Placeholder)),
          // the button to create a "next" node, at the top-right corner
          $("Button",
            {
              alignment: go.Spot.BottomRight,
              click: addReason
            },  // this function is defined below
            new go.Binding("visible", "", function(a) { return !a.diagram.isReadOnly; }).ofObject(),
            $(go.Shape, "TriangleDown", { desiredSize: new go.Size(10, 10) })
          )
        );

      var reasonTemplate = $(go.Panel, "Horizontal",
        $(go.TextBlock, "Reason",
          {
            margin: new go.Margin(4, 0, 0, 0),
            maxSize: new go.Size(200, NaN),
            wrap: go.TextBlock.WrapFit,
            stroke: "whitesmoke",
            editable: true,
            font: smallfont
          },
          new go.Binding("text", "text").makeTwoWay())
      );


      myDiagram.nodeTemplateMap.add("UndesiredEvent",
        $(go.Node, "Auto",
          new go.Binding("location", "loc", go.Point.parse).makeTwoWay(go.Point.stringify),
          { selectionAdornmentTemplate: UndesiredEventAdornment },
          $(go.Shape, "RoundedRectangle",
            { fill: redgrad, portId: "", toLinkable: true, toEndSegmentLength: 50 }),
          $(go.Panel, "Vertical", { defaultAlignment: go.Spot.TopLeft },

            $(go.TextBlock, "Drop", textStyle(),
              {
                stroke: "whitesmoke",
                minSize: new go.Size(80, NaN)
              },
              new go.Binding("text", "text").makeTwoWay()),

            $(go.Panel, "Vertical",
              {
                defaultAlignment: go.Spot.TopLeft,
                itemTemplate: reasonTemplate
              },
              new go.Binding("itemArray", "reasonsList").makeTwoWay()
            )
          )
        ));

      myDiagram.nodeTemplateMap.add("Comment",
        $(go.Node, "Auto",
          new go.Binding("location", "loc", go.Point.parse).makeTwoWay(go.Point.stringify),
          $(go.Shape, "Rectangle",
            { portId: "", fill: whitegrad, fromLinkable: true }),
          $(go.TextBlock, "A comment",
            {
              margin: 9,
              maxSize: new go.Size(200, NaN),
              wrap: go.TextBlock.WrapFit,
              editable: true,
              font: smallfont
            },
            new go.Binding("text", "text").makeTwoWay())
          // no ports, because no links are allowed to connect with a comment
        ));

      // clicking the button on an UndesiredEvent node inserts a new text object into the panel
      function addReason(e, obj) {
        var adorn = obj.part;
        if (adorn === null) return;
        e.handled = true;
        var arr = adorn.adornedPart.data.reasonsList;
        myDiagram.startTransaction("add reason");
        myDiagram.model.addArrayItem(arr, {});
        myDiagram.commitTransaction("add reason");
      }

      // clicking the button of a default node inserts a new node to the right of the selected node,
      // and adds a link to that new node
      function addNodeAndLink(e, obj) {
        var adorn = obj.part;
        if (adorn === null) return;
        e.handled = true;
        var diagram = adorn.diagram;
        diagram.startTransaction("Add State");
        // get the node data for which the user clicked the button
        var fromNode = adorn.adornedPart;
        var fromData = fromNode.data;
        // create a new "State" data object, positioned off to the right of the adorned Node
        var toData = { text: "new" };
        var p = fromNode.location;
        toData.loc = p.x + 200 + " " + p.y;  // the "loc" property is a string, not a Point object
        // add the new node data to the model
        var model = diagram.model;
        model.addNodeData(toData);
        // create a link data from the old node data to the new node data
        var linkdata = {};
        linkdata[model.linkFromKeyProperty] = model.getKeyForNodeData(fromData);
        linkdata[model.linkToKeyProperty] = model.getKeyForNodeData(toData);
        // and add the link data to the model
        model.addLinkData(linkdata);
        // select the new Node
        var newnode = diagram.findNodeForData(toData);
        diagram.select(newnode);
        diagram.commitTransaction("Add State");
      }

      // replace the default Link template in the linkTemplateMap
      myDiagram.linkTemplate =
        $(go.Link,  // the whole link panel
          new go.Binding("points").makeTwoWay(),
          { curve: go.Link.Bezier, toShortLength: 15 },
          new go.Binding("curviness", "curviness"),
          $(go.Shape,  // the link shape
            { stroke: "#2F4F4F", strokeWidth: 2.5 }),
          $(go.Shape,  // the arrowhead
            { toArrow: "kite", fill: "#2F4F4F", stroke: null, scale: 2 })
        );

      myDiagram.linkTemplateMap.add("Comment",
        $(go.Link, { selectable: false },
          $(go.Shape, { strokeWidth: 2, stroke: "darkgreen" })));


      var palette =
        $(go.Palette, "myPaletteDiv",  // create a new Palette in the HTML DIV element
          {
            // share the template map with the Palette
            nodeTemplateMap: myDiagram.nodeTemplateMap,
            autoScale: go.Diagram.Uniform  // everything always fits in viewport
          });

      palette.model.nodeDataArray = [
        { category: "Source" },
        {}, // default node
        { category: "DesiredEvent" },
        { category: "UndesiredEvent", reasonsList: [{}] },
        { category: "Comment" }
      ];

      // read in the JSON-format data from the "mySavedModel" element
      load();
      layout();
    }

    function layout() {
      myDiagram.layoutDiagram(true);
    }

    // Show the diagram's model in JSON format
    function save() {
      document.getElementById("mySavedModel").value = myDiagram.model.toJson();
      myDiagram.isModified = false;
    }
    function load() {
      myDiagram.model = go.Model.fromJson(document.getElementById("mySavedModel").value);
    }
	
	function doCapture() {
		alert("Image Saved!");
        window.scrollTo(0, 0);

        html2canvas(document.getElementById("myDiagramDiv")).then(function (canvas) {
          var ajax = new XMLHttpRequest();
          ajax.open("POST", "save-capture.php", true);
          ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
          ajax.send("image=" + canvas.toDataURL("image/jpeg", 0.9));

          ajax.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
              console.log(this.responseText);
            }
          };
        });
      }
  </script>
</head>

<body class="hold-transition sidebar-mini layout-fixed" onload="init()">
<div class="wrapper">

	<?php include('../navigation/topbar.php');?>
	<?php include('../navigation/user/diagrampageflow_sidebar.php');?>

	<div class="content-wrapper">
		<br ><br>

		<section class="content">
			<div class="container-fluid">
				<div class="card shadow mb-4">
					<div class="card-body">
		
						<div class="card-header py-3">
							<h3 class="m-4 font-weight-bold">Page Flow Diagram Creator</h3>
							<h5 class="m-4 font-weight-bold">Create A Page Flow Diagram with different types of the shaped provided.</h5>
						</div>
			
						<div id="sample">
							<div style="width: 100%; display: flex; justify-content: space-between">
								<div id="myPaletteDiv" style="width: 100px; margin-right: 2px; background-color: whitesmoke; border: solid 1px black"></div>
								<div id="myDiagramDiv" style="flex-grow: 1; height: 480px; border: solid 1px black"></div>
							</div>

							<button id="SaveButton" onclick="save()" style="display:none">Save</button>
							<button onclick="load()" style="display:none">Load</button>
							<button onclick="layout()" style="display:none">Layout</button>
				
							<br/>
							<textarea id="mySavedModel" style="width:100%;height:300px;display:none ">
							{ "class": "go.GraphLinksModel",
							  "copiesArrays": true,
							  "copiesArrayObjects": true,
							  "nodeDataArray": [
								{ "key": -1, "category": "Source", "text": "Search" },
								{ "key": -2, "category": "Source", "text": "Referral" },
								{ "key": -3, "category": "Source", "text": "Advertising" },

								{ "key": 0, "text": "Homepage" },
								{ "key": 1, "text": "Products" },
								{ "key": 2, "text": "Buy" },
								{ "key": 3, "text": "Samples" },
								{ "key": 5, "text": "Documentation" },
								{ "key": 6, "text": "Download" },

								{ "key": 100, "category": "DesiredEvent", "text": "Ordered!" },
								{ "key": 101, "category": "DesiredEvent", "text": "Downloaded!" },

								{ "key": 200, "category": "UndesiredEvent",
								  "reasonsList": [
									{"text":"Needs redesign?"},
									{"text":"Wrong Product?"} ]},
								{ "key": 201, "category": "UndesiredEvent",
								  "reasonsList": [
									{"text":"Need better samples?"},
									{"text":"Bad landing page for Advertising?"} ]},
								{ "key": 202, "category": "UndesiredEvent",
								  "reasonsList": [
									{"text":"Reconsider Pricing?"},
									{"text":"Confusing Cart?"} ]},

								{ "category": "Comment", "text": "Add notes with general comments for the next team meeting" }

							  ],
							  "linkDataArray": [
								{ "from": -1, "to": 0 },
								{ "from": -2, "to": 0 },
								{ "from": -2, "to": 3 },
								{ "from": -3, "to": 3 },
								{ "from":  0, "to": 1 },
								{ "from":  1, "to": 2 },
								{ "from":  1, "to": 3 },
								{ "from":  0, "to": 5 },
								{ "from":  5, "to": 3 },
								{ "from":  3, "to": 2 },


								{ "from":  3, "to": 6 },

								{ "from":  2, "to": 100 },
								{ "from":  6, "to": 101 },

								{ "from":  0, "to": 200 },
								{ "from":  3, "to": 201 },
								{ "from":  2, "to": 202 }
							  ]
							}
							</textarea>
							<div class="form-row">
								<button class="btn btn-success" onclick="doCapture();">Save Image</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
	</div>
	<aside class="control-sidebar control-sidebar-dark">
	</aside>
</div>

<script src="../dependencies/navigation/jquery/jquery.min.js"></script>
<script src="../dependencies/navigation/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../dependencies/navigation/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<script src="../dependencies/vendor/jquery-easing/jquery.easing.min.js"></script>
<script src="../dependencies/scripts/sb-admin-2.min.js"></script>
<script src="../dependencies/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="../dependencies/vendor/datatables/dataTables.bootstrap4.min.js"></script>
<script src="../dependencies/scripts/datatables-demo.js"></script>
<script src="../dependencies/navigation/js/adminlte.js"></script>

</body>
</html>

