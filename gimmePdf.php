<?php
	function generatePdf() {
		$source = "http://kanovsky.sk";
		$command = "/bin/wkhtmltopdf ".$source." ".__DIR__."/kanovsky.pdf";
		
		system($command);		
	}
	
	function downloadPdf() {
		generatePdf();
		header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
		header("Pragma: public");
		header("X-Download-Options: noopen "); // For IE8
		header("X-Content-Type-Options: nosniff"); // For IE8
		header('Content-Type: application/force-download');
		header('Content-Disposition: attachment; filename="kanovsky.pdf"');
		readfile(__DIR__.'/kanovsky.pdf');
		die();
	}
	
	downloadPdf();
?>
