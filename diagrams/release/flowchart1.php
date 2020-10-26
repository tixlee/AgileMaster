<!DOCTYPE html>
<html>
<head>
  <title>Flowchart</title>
  

 <script src="html2canvas.js"></script>
  <script src="require.js"></script>
 


  <button onclick="doCapture();">Save Image</button>
  
  <script>
    function init() {
      require(["flowchart"], function(app) {
        app.init();
      });
    }
	
	function doCapture() {
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
<body onload="init()">
<div id="sample">
  <div style="width: 100%; display: flex; justify-content: space-between">
    <div id="myPaletteDiv" style="width: 100px; margin-right: 2px; background-color: whitesmoke; border: solid 1px black"></div>
    <div id="myDiagramDiv" style="flex-grow: 1; height: 750px; border: solid 1px black"></div>
  </div>


  <button id="SaveButton">Save</button>
  <button id="LoadButton">Load</button>
  Diagram Model saved in JSON format:
  <textarea id="mySavedModel" style="width:100%;height:300px;display:none">
{ "class": "go.GraphLinksModel",
  "linkFromPortIdProperty": "fromPort",
  "linkToPortIdProperty": "toPort",
  "nodeDataArray": [
{"category":"Comment", "loc":"360 -10", "text":"Kookie Brittle", "key":-13},
{"key":-1, "category":"Start", "loc":"175 0", "text":"Start"},
{"key":0, "loc":"0 77", "text":"Preheat oven to 375 F"},
{"key":1, "loc":"175 100", "text":"In a bowl, blend: 1 cup margarine, 1.5 teaspoon vanilla, 1 teaspoon salt"},
{"key":2, "loc":"175 190", "text":"Gradually beat in 1 cup sugar and 2 cups sifted flour"},
{"key":3, "loc":"175 270", "text":"Mix in 6 oz (1 cup) Nestle's Semi-Sweet Chocolate Morsels"},
{"key":4, "loc":"175 370", "text":"Press evenly into ungreased 15x10x1 pan"},
{"key":5, "loc":"352 85", "text":"Finely chop 1/2 cup of your choice of nuts"},
{"key":6, "loc":"175 440", "text":"Sprinkle nuts on top"},
{"key":7, "loc":"175 500", "text":"Bake for 25 minutes and let cool"},
{"key":8, "loc":"175 570", "text":"Cut into rectangular grid"},
{"key":-2, "category":"End", "loc":"175 640", "text":"Enjoy!"}
 ],
  "linkDataArray": [
{"from":1, "to":2, "fromPort":"B", "toPort":"T"},
{"from":2, "to":3, "fromPort":"B", "toPort":"T"},
{"from":3, "to":4, "fromPort":"B", "toPort":"T"},
{"from":4, "to":6, "fromPort":"B", "toPort":"T"},
{"from":6, "to":7, "fromPort":"B", "toPort":"T"},
{"from":7, "to":8, "fromPort":"B", "toPort":"T"},
{"from":8, "to":-2, "fromPort":"B", "toPort":"T"},
{"from":-1, "to":0, "fromPort":"B", "toPort":"T"},
{"from":-1, "to":1, "fromPort":"B", "toPort":"T"},
{"from":-1, "to":5, "fromPort":"B", "toPort":"T"},
{"from":5, "to":4, "fromPort":"B", "toPort":"T"},
{"from":0, "to":4, "fromPort":"B", "toPort":"T"}
 ]}
  </textarea>
  <button id="SVGButton">Print Diagram Using SVG</button>
</div>
</body>
</html>
