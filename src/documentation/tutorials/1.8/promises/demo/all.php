<!DOCTYPE HTML>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Demo: dojo/promise/all</title>

		<link rel="stylesheet" href="style.css" media="screen">
		<link rel="stylesheet" href="../../../resources/style/demo.css" media="screen">
	</head>
	<body>
		<h1>Demo: dojo/promise/all</h1>

		<ul id="statuslist"></ul>

		<!-- load dojo and provide config via data attribute -->
		<?php
			include_once($_SERVER['DOCUMENT_ROOT'] . implode('/', array_slice(explode('/', dirname($_SERVER['PHP_SELF'])), 0, 4)) . '/Utils.php');
			Utils::printDojoScript();
		?>
		<script>
			require(["dojo/promise/all", "dojo/Deferred", "dojo/request", "dojo/_base/array", "dojo/dom-construct", "dojo/dom", "dojo/json", "dojo/domReady!"],
			function(all, Deferred, request, arrayUtil, domConstruct, dom, JSON){
				var usersDef = request.get("users.json", {
					handleAs: "json"
				}).then(function(response){
					var users = {};

					arrayUtil.forEach(response, function(user){
						users[user.id] = user;
					});

					return users;
				});

				var statusesDef = request.get("statuses.json", {
					handleAs: "json"
				});
				all([usersDef, statusesDef]).then(function(results){
					var users = results[0],
						statuses = results[1],
						statuslist = dom.byId("statuslist");

					if(!results[0] || !results[1]){
						domConstruct.create("li", {
							innerHTML: "An error occurred"
						}, statuslist);
						return;
					}
					arrayUtil.forEach(statuses, function(status){
						var user = users[status.userId];
						domConstruct.create("li", {
							id: status.id,
							innerHTML: user.name + ' said, "' + status.status + '"'
						}, statuslist);
					});
				});
			});
		</script>
	</body>
</html>
