<!DOCTYPE html>
<html>
	<head>
		<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,minimum-scale=1,user-scalable=no"/>
		<meta name="apple-mobile-web-app-capable" content="yes" />
		<title>dojox/mobile Demo</title>
	</head>
	<body>

		<div id="settings" data-dojo-type="dojox/mobile/View" data-dojo-props="selected: true">
			<h1 data-dojo-type="dojox/mobile/Heading">Settings</h1>
			<ul data-dojo-type="dojox/mobile/RoundRectList">
				<li data-dojo-type="dojox/mobile/ListItem" data-dojo-props="icon:'../../mobile/tweetview/app/images/i-icon-1.png'">
					Airplane Mode
					<div class="mblItemSwitch" data-dojo-type="dojox/mobile/Switch"></div>
				</li>
				<li data-dojo-type="dojox/mobile/ListItem" data-dojo-props="icon:'../../mobile/tweetview/app/images/i-icon-2.png', rightText:'mac', moveTo: 'general'">
					Wi-Fi
				</li>
				<li data-dojo-type="dojox/mobile/ListItem" data-dojo-props="icon:'../../mobile/tweetview/app/images/i-icon-3.png', rightText:'AcmePhone'">
					Carrier
				</li>
			</ul>
		</div>

		<div id="general" data-dojo-type="dojox/mobile/View">
			<h1 data-dojo-type="dojox/mobile/Heading" data-dojo-props="back:'Settings', moveTo:'settings'">General</h1>
			<ul data-dojo-type="dojox/mobile/RoundRectList">
				<li data-dojo-type="dojox/mobile/ListItem" data-dojo-props="moveTo:'about'">
					About
				</li>
				<li data-dojo-type="dojox/mobile/ListItem" data-dojo-props="rightText: '2h 40m', moveTo: 'about'">
					Usage
				</li>
			</ul>
		</div>

		<div id="about" data-dojo-type="dojox/mobile/View">
			<h1 data-dojo-type="dojox/mobile/Heading" data-dojo-props="back:'General', moveTo:'general'">About</h1>
			<h2 data-dojo-type="dojox/mobile/RoundRectCategory">Generic Mobile Device</h2>
			<ul data-dojo-type="dojox/mobile/RoundRectList">
				<li data-dojo-type="dojox/mobile/ListItem" data-dojo-props="rightText:'AcmePhone'">
					Network
				</li>
				<li data-dojo-type="dojox/mobile/ListItem" data-dojo-props="rightText:'AcmePhone'">
					Line
				</li>
				<li data-dojo-type="dojox/mobile/ListItem" data-dojo-props="rightText:'1024'">
					Songs
				</li>
				<li data-dojo-type="dojox/mobile/ListItem" data-dojo-props="rightText:'10'">
					Videos
				</li>
				<li data-dojo-type="dojox/mobile/ListItem" data-dojo-props="rightText:'96'">
					Photos
				</li>
				<li data-dojo-type="dojox/mobile/ListItem" data-dojo-props="rightText:'2'">
					Applications
				</li>
				<li data-dojo-type="dojox/mobile/ListItem" data-dojo-props="rightText:'29.3 BG'">
					Capacity
				</li>
				<li data-dojo-type="dojox/mobile/ListItem" data-dojo-props="rightText:'28.0 BG'">
					Available
				</li>
				<li data-dojo-type="dojox/mobile/ListItem" data-dojo-props="rightText:'3.0 (7A341)'">
					Version
				</li>
			</ul>
		</div>
		<!-- configure and load dojo -->
		<?php
			include_once($_SERVER['DOCUMENT_ROOT'] . implode('/', array_slice(explode('/', dirname($_SERVER['PHP_SELF'])), 0, 4)) . '/Utils.php');
			Utils::printDojoScript("isDebug:true, async: true");
		?>
		<script>

			require(["dojox/mobile/parser", "dojox/mobile", "dojox/mobile/deviceTheme", "dojox/mobile/compat", "dojo/domReady!"],
			function(parser, ready) {
				parser.parse();
			});
		</script>

	</body>
</html>