<?php

	public function get_data($sql) {
		if($sql != "") {
			mysqli_query($sql);
		} else {
			echo "How did you get here?";
		}

	}

?>