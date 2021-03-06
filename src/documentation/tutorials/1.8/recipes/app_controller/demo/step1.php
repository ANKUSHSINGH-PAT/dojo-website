<?php include_once($_SERVER['DOCUMENT_ROOT'] . implode('/', array_slice(explode('/',dirname($_SERVER['PHP_SELF'])), 0, 4)) . '/Utils.php') ?>
<!DOCTYPE HTML>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Demo: Application Controller</title>
		<link rel="stylesheet" href="../../../../resources/style/demo.css" media="screen">
		<link rel="stylesheet" href="style.css" media="screen">
		<?php Utils::printClaroCss() ?>
		<!-- load dojo and provide config via dojoConfig global -->
		<script>
			dojoConfig = {
				isDebug: true,
				parseOnLoad: true,
				async: true,
				flickrRequest: {
					apikey: "8c6803164dbc395fb7131c9d54843627",
					sort:[{
						attribute: "datetaken",
						descending: true
					}]
				}
			};
		</script>
	</head>
	<body class="claro">
		<div id="appLayout" class="demoLayout" data-dojo-type="dijit/layout/BorderContainer" data-dojo-props="design: 'headline'">
			<div class="centerPanel" id="tabs" data-dojo-type="dijit/layout/TabContainer" data-dojo-props="region: 'center', tabPosition: 'bottom'">
				<div data-dojo-type="dijit/layout/ContentPane" data-dojo-props="title: 'About'">

					<h2>Flickr keyword photo search</h2>
					<p>Each search creates a new tab with the results as thumbnails</p>
					<p>Click on any thumbnail to view the larger image</p>

				</div>
			</div>
			<div class="edgePanel" data-dojo-type="dijit/layout/ContentPane" data-dojo-props="region: 'top'">
				<div class="searchInputColumn">
					<div class="searchInputColumnInner">
						<input id="searchTerms" placeholder="search terms">
					</div>
				</div>
				<div class="searchButtonColumn">
					<button id="searchBtn">Search</button>
				</div>
			</div>
		</div>
		<?php Utils::printDojoScript() ?>
		<script>
			require(["dijit/layout/BorderContainer", "dijit/layout/TabContainer", "dijit/layout/ContentPane", "dojo/domReady!"]);
		</script>
	</body>
</html>
