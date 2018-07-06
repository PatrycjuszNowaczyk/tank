<?php
	$tablica = array();
	$color = 'white';
		
	function createBoard($size) {
		
		$table = '';
		
		$table .= '<table style="border-collapse: collapse">';
		foreach (range(1, $size-1) as $col) {
			$table .= "<tr>";
			foreach (range('A', chr($size-1+ord('A'))) as $row => $val) {
				$tablica[$col][$row] = $col . $val;
				$table .= '<td style="width: 25px; height: 25px;  border-collapse: collapse; border: 1px solid black; vertical-align: ';
				$table .= 'top">' . $tablica[$col][$row] . '</td>';
			}
		$table .= "</tr>";
			}
		$table .= "</table>";
		
		$table .= str_repeat("<br>", 3);
		
		$table .= '<table>';
			$table .= '<tr>';
				$table .= '<td></td>';
				$table .= '<td><button type="button">N</button></td>';
				$table .= '<td></td>';
			$table .= '</tr>';
			$table .= '<tr>';
				$table .= '<td><button type="button">W</button></td>';
				$table .= '<td></td>';
				$table .= '<td><button type="button">E</button></td>';
			$table .= '</tr>';
			$table .= '<tr>';
				$table .= '<td></td>';
				$table .= '<td><button type="button">S</button></td>';
				$table .= '<td></td>';
			$table .= '</tr>';
		$table .= '</table>';
		
		
		echo $table;
	}
	
	
	
	createBoard(26);
?>