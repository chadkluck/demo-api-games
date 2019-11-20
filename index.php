<?php
// api returning json data

require_once __DIR__."/custom/inc.php"; // this is required to be placed at start of execution - it loads the config, app vars, core app functions, and init

function generateResponse() {

	$show = array();
	$show = [ "Falken's Maze",
				"Black Jack",
				"Gin Rummy",
				"Hearts",
				"Bridge",
				"Checkers",
				"Chess",
				"Poker",
				"Fighter Combat",
				"Guerrilla Engagement",
				"Desert Warfare",
				"Air-To-Ground Actions",
				"Theaterwide Tactical Warfare",
				"Theaterwide Biotoxic and Chemical Warfare",
				"Global Thermonuclear War"
			];

	$hide = array();
	$hide = [ "Tic-Tac-Toe" ];

	$json = array();
	$json['gamechoices'] = $show;
	$json['hiddengames'] = $hide;

	return $json;
}

/* **********************************************
 *  START
 */

// begin JSON output

if(isApprovedOrigin(TRUE)) {

	$json = generateResponse();

	if(!debugOn()) {

		httpReturnHeader(getCacheExpire("api"), getRequestOrigin(), "application/json");
		echo json_encode($json);

	} else {
		echo "<h3>JSON RAW</h3>";
		echo "<p>";
		echo json_encode($json);
		echo "</p>";
		echo "<h3>JSON FORMATTED</h3>";
		echo "<pre>";
		print_r($json);
		echo "</pre>";
		appExecutionEnd();
	}

}

?>