<?php 
	class TableGenerator {

		public $headings;
		public $row = [];

		public function setHeadings($headings) {
			$this->headings = $headings;
		}

		public function addRow($row) {
			$this->row[] = $row;
		}

		public function getHTML() {
			$html = '<table class="tbl">';
				$html .= '<thead>';
					$html .= '<tr>';
						foreach ($this->headings as $heading) {
							$html .= '<th>' . $heading . '</th>';
						}
					$html .= '</tr>';
				$html .= '</thead>';
				$html .= '<tbody>';
					foreach ($this->row as $row) {
						$html .= '<tr>';
						foreach ($row as $key=>$cell) {
							if(is_numeric($key)) {
								$html .= '<td>' . $cell . '</td>';
							}
						}
						$html .= '</tr>';
					}
				$html .= '</tbody>';
			$html .= '</table>';

			return $html;
		}
	}
?>