<?php
class	File {
	var	$fi;
	var	$mode;
	public	function	__construct($file_path, $mode = "r") {
		if (!file_exists($file_path))	{ echo "file not found"; return; }
		$this->fi	=	fopen($file_path);
		$this->mode	=	$mode;
	}
	public	function	write($txt)	{
		if ($this->mode == "w")
			fputs($this->fi,$txt);
	}
	public	function	writeln($txt) {
		if ($this->mode == "w")
			fputs($this->fi,$txt."\n");
	}
	public	function	readln() {
		if ($this->mode == "r")
			return	fgetc($this->fi);
	}
	public	function	readfile() {}
	public	function	__destruct() {
		if (isset($this->fi))
			@fclose($this->fi);
	}
	public static function convertSize($bytes) {
		$size = $bytes / 1024;
	    if($size < 1024) {
			$size = number_format($size, 2);
			$size .= ' KB';
		} 
	    else {
			if($size / 1024 < 1024) {
				$size = number_format($size / 1024, 2);
				$size .= ' MB';
			} 
			else if ($size / 1024 / 1024 < 1024) {
				$size = number_format($size / 1024 / 1024, 2);
				$size .= ' GB';
			} 
		}
		return $size;
	}
	
	public static function getExt($filePath) {
		$fileInfo = pathinfo($filePath);
		return $fileInfo['extension'];
	}
}
?>