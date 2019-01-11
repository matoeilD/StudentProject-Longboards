<?php
if (!isset($_COOKIE['DESIGN'])) {
	$background = "#badbb7";

}
else {
	if ($_COOKIE['DESIGN'] == "bleu") {
		$background = "#aac5f4";

	}
	elseif ($_COOKIE['DESIGN'] == "rose saumon") {
		$background = "#fbbda8";

	}
	elseif ($_COOKIE['DESIGN'] == "vert") {
		$background = "#badbb7";

	}
	else {
		$background = "#badbb7";

	}
}
?>