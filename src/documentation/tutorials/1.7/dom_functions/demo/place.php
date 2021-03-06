<!DOCTYPE HTML>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Demo: place</title>
		<link rel="stylesheet" href="../../../resources/style/demo.css" media="screen">
		<style>
			#three {
				background:#e3e3e3;
			}
		</style>
	</head>
	<body>
		<h1>Demo: place</h1>

		<h4>Move "Three" to the following position</h4>
		<button id="moveFirst">The first item</button>
		<button id="moveBeforeTwo">Before Two</button>
		<button id="moveAfterFour">After Four</button>
		<button id="moveLast">The last item</button>

		<ul id="list">
			<li id="one">One</li>
			<li id="two">Two</li>
			<li id="three">Three</li>
			<li id="four">Four</li>
			<li id="five">Five</li>
		</ul>
    	<?php
    		include_once($_SERVER['DOCUMENT_ROOT'] . implode('/', array_slice(explode('/', dirname($_SERVER['PHP_SELF'])), 0, 4)) . '/Utils.php');
    		Utils::printDojoScript("isDebug:1, async:1");
    	?>
		<script>
			require(["dojo/dom", "dojo/dom-construct", "dojo/on", "dojo/domReady!"], function(dom, domConstruct, on) {
				function moveFirst(){
					var list = dom.byId("list"),
						three = dom.byId("three");

					domConstruct.place(three, list, "first");
				}

				function moveBeforeTwo(){
					var two = dom.byId("two"),
						three = dom.byId("three");

					domConstruct.place(three, two, "before");
				}

				function moveAfterFour(){
					var four = dom.byId("four"),
						three = dom.byId("three");

					domConstruct.place(three, four, "after");
				}

				function moveLast(){
					var list = dom.byId("list"),
						three = dom.byId("three");

					domConstruct.place(three, list);
				}
				
				// Connect the buttons
				on(dom.byId("moveFirst"), "click", moveFirst);
				on(dom.byId("moveBeforeTwo"), "click", moveBeforeTwo);
				on(dom.byId("moveAfterFour"), "click", moveAfterFour);
				on(dom.byId("moveLast"), "click", moveLast);
			});
		</script>
	</body>
</html>
