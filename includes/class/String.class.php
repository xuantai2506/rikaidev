<?php
require(dirname(__FILE__) . '/utf8/utf8_functions.php');

class String {
	public function crop($text,$qty) {
		$txt			=	$text;
		$arr_replace	=	array("<p>","</p>","<br>","<br />");
		$text			=	str_replace($arr_replace,"",$text);
		$dem			=	0;
		for ( $i=0 ; $i < strlen($text) ; $i++ )
		{
			if ($text[$i] == ' ') $dem++;
			if ($dem == $qty)	break;
		}
		$text		=	substr($text,0,$i);
		if ($i	<	strlen($txt))
			$text .= "... ";
		return	$text;
	}
	public function crop_style($text,$qty) {
		$txt			=	$text;
		$dem			=	0;
		for ( $i=0 ; $i < strlen($text) ; $i++ )
		{
			if ($text[$i] == ' ') $dem++;
			if ($dem == $qty)	break;
		}
		$text		=	substr($text,0,$i);
		if ($i	<	strlen($txt))
			$text .= "... ";
		return	$text;
	}
	public function cut($text,$qty) {
		$txt			=	$text;
		return substr($text,0,$qty).($qty<strlen($txt)?" ...":"");
	}

	public function analyseUrl($url) {
		$qr	=	stristr($url,"?");
		$qr	=	trim($qr,"?");
		$x	=	explode("&",$qr);
		for ($i = 0; $i <= count($x); $i++) {
			if ($x[$i] != "") {
				$y = explode("=",$x[$i]);
				$arr[$y[0]] = $y[1];
			}
		}
		return $arr;
	}

	public function getSlug($txt) {
		$text	=  self::sanitize($txt);
		return $text;
	}
	public function getLinkHtml($txt, $id = 0) {
		$id     = $id + 0;
		$text	=  self::sanitize($txt);
		if($id == 0)
			return $text.'.html';
		else
			return $text.'-'.$id.'.html';
	}
	public function getUniTxt($txt) {
		return self::UNI_2_TXT($txt);
	}

	//	Private function
	public function utf8UriEncode( $utf8_string, $length = 0 ) {
		$unicode = '';
		$values = array();
		$num_octets = 1;
		$unicode_length = 0;
		$string_length = strlen( $utf8_string );
		for ($i = 0; $i < $string_length; $i++ ) {
			$value = ord( $utf8_string[ $i ] );
			if ( $value < 128 ) {
				if ( $length && ( $unicode_length >= $length ) )
					break;
				$unicode .= chr($value);
				$unicode_length++;
			} else {
				if ( count( $values ) == 0 ) $num_octets = ( $value < 224 ) ? 2 : 3;
				$values[] = $value;
				if ( $length && ( $unicode_length + ($num_octets * 3) ) > $length )
					break;
				if ( count( $values ) == $num_octets ) {
					if ($num_octets == 3) {
						$unicode .= '%' . dechex($values[0]) . '%' . dechex($values[1]) . '%' . dechex($values[2]);
						$unicode_length += 9;
					} else {
						$unicode .= '%' . dechex($values[0]) . '%' . dechex($values[1]);
						$unicode_length += 6;
					}
					$values = array();
					$num_octets = 1;
				}
			}
		}

		return $unicode;
	}
	public function seemsUtf8($str) {
		$length = strlen($str);
		for ($i=0; $i < $length; $i++) {
			$c = ord($str[$i]);
			if ($c < 0x80) $n = 0; # 0bbbbbbb
			elseif (($c & 0xE0) == 0xC0) $n=1; # 110bbbbb
			elseif (($c & 0xF0) == 0xE0) $n=2; # 1110bbbb
			elseif (($c & 0xF8) == 0xF0) $n=3; # 11110bbb
			elseif (($c & 0xFC) == 0xF8) $n=4; # 111110bb
			elseif (($c & 0xFE) == 0xFC) $n=5; # 1111110b
			else return false; # Does not match any model
			for ($j=0; $j<$n; $j++) { # n bytes matching 10bbbbbb follow ?
				if ((++$i == $length) || ((ord($str[$i]) & 0xC0) != 0x80))
					return false;
			}
		}
		return true;
	}
	public function	UNI_2_TXT ( $text ) {
		$UNI	= array ( "á","à","ả","ã","ạ","ắ","ằ","ẳ","ẵ","ặ","ấ","ầ","ẩ","ẫ","ậ","é","è","ẻ","ẽ","ẹ","ế","ề","ể","ễ","ệ","í","ì","ỉ","ĩ","ị","ó","ò","ỏ","õ","ọ","ố","ồ","ổ","ỗ","ộ","ớ","ờ","ở","ỡ","ợ","ú","ù","ủ","ũ","ụ","ứ","ừ","ử","ữ","ự","ý","ỳ","ỷ","ỹ","ỵ","Á","À","Ả","Ã","Ạ","Ắ","Ằ","Ẳ","Ẵ","Ặ","Ấ","Ầ","Ẩ","Ẫ","Ậ","É","È","Ẻ","Ẽ","Ẹ","Ế","Ề","Ể","Ễ","Ệ","Í","Ì","Ỉ","Ĩ","Ị","Ó","Ỏ","Õ","Ọ","Ố","Ồ","Ổ","Ỗ","Ộ","Ơ","Ớ","Ờ","Ở","Ỡ","Ợ","Ú","Ù","Ủ","Ũ","Ụ","Ứ","Ừ","Ử","Ữ","Ự","Ý","Ỳ","Ỷ","Ỹ","Ỵ","ă","â","ê","ô","ơ","ư","đ","Ă","Â","Ê","Ô","Ò","Ư","Đ");
		$TXT	= array ( "a","a","a","a","a","a","a","a","a","a","a","a","a","a","a","e","e","e","e","e","e","e","e","e","e","i","i","i","i","i","o","o","o","o","o","o","o","o","o","o","o","o","o","o","o","u","u","u","u","u","u","u","u","u","u","y","y","y","y","y","A","A","A","A","A","A","A","A","A","A","A","A","A","A","A","E","E","E","E","E","E","E","E","E","E","I","I","I","I","I","O","O","O","O","O","O","O","O","O","O","O","O","O","O","O","U","U","U","U","U","U","U","U","U","U","Y","Y","Y","Y","Y","a","a","e","o","o","u","d","A","A","E","O","O","U","D");
	
		for ($i = 0; $i < count($UNI); $i++) {
			$text = str_replace($UNI[$i], $TXT[$i], $text);
		}
		return $text;
	}
	public function	UNI_2_TCVN3 ($text) {
		$UNI	= array ( "à", "á", "ả", "ã", "ạ", "ă", "ằ", "ắ", "ẳ", "ẵ", "ặ", "â", "ầ", "ấ", "ẩ", "ẫ", "ậ", "đ", "è", "é", "ẻ", "ẽ", "ẹ", "ê", "ề", "ế", "ể", "ễ", "ệ", "ì", "í", "ỉ", "ĩ", "ị", "ò", "ó", "ỏ", "õ", "ọ", "ô", "ồ", "ố", "ổ", "ỗ", "ộ", "ơ", "ờ", "ớ", "ở", "ỡ", "ợ", "ù", "ú", "ủ", "ũ", "ụ", "ư", "ừ", "ứ", "ử", "ữ", "ự", "ỳ", "ý", "ỷ", "ỹ", "ỵ", "Ă", "Â", "Đ", "Ê", "Ô", "Ơ", "Ư");
		$TCVN3	= array ( "µ", "¸", "¶", "·", "¹","¨", "»", "¾", "¼", "½", "Æ","©", "Ç", "Ê", "È", "É", "Ë","®", "Ì", "Ð", "Î", "Ï", "Ñ","ª", "Ò", "Õ", "Ó", "Ô", "Ö","×","Ý", "Ø", "Ü", "Þ","ß", "ã", "á", "â", "ä","«", "å", "è", "æ", "ç", "é","¬", "ê", "í", "ë", "ì", "î", "ï", "ó", "ñ", "ò", "ô", "­", "õ", "ø", "ö", "÷", "ù","ú", "ý", "û", "ü", "þ", "¡", "¢", "§", "£", "¤", "¥", "¦");
	
		for ($i = 0; $i < count($UNI); $i++) {
			$text = str_replace($UNI[$i], $TCVN3[$i], $text);
		}
		return $text;
	}
	public function	u2v ($text) {
		$text = utf8_encode($text);
		$UNI	= array ("Ã","Ã ","Ã","Ã¡","Ã","Ã¢","Ã","Ã£","Ã","Ã¨","Ã","Ã©","Ã","Ãª","Ã","Ã¬","Ã","Ã­","Ã","Ã²","Ã","Ã³","Ã","Ã´","Ã","Ãµ","Ã","Ã¹","Ã","Ãº","Ã","Ã½","Ä","Ä","Ä","Ä","Ä¨","Ä©","Å¨","Å©","Æ ","Æ¡","Æ¯","Æ°","áº ","áº¡","áº¢","áº£","áº¤","áº¥","áº¦","áº§","áº¨","áº©","áºª","áº«","áº¬","áº­","áº®","áº¯","áº°","áº±","áº²","áº³","áº´","áºµ","áº¶","áº·","áº¸","áº¹","áºº","áº»","áº¼","áº½","áº¾","áº¿","á»","á»","á»","á»","á»","á»","á»","á»","á»","á»","á»","á»","á»","á»","á»","á»","á»","á»","á»","á»","á»","á»","á»","á»","á»","á»","á»","á»","á»","á»","á»","á»","á» ","á»¡","á»¢","á»£","á»¤","á»¥","á»¦","á»§","á»¨","á»©","á»ª","á»«","á»¬","á»­","á»®","á»¯","á»°","á»±","á»²","á»³","á»´","á»µ","á»¶","á»·","á»¸","á»¹");
		$VNI	= array ("AØ","aø","AÙ","aù","AÂ","aâ","AÕ","aõ","EØ","eø","EÙ","eù","EÂ","eâ","Ì","ì","Í","í","OØ","oø","OÙ","où","OÂ","oâ","OÕ","oõ","UØ","uø","UÙ","uù","YÙ","yù","AÊ","aê","Ñ","ñ","Ó","ó","UÕ","uõ","Ô","ô","Ö","ö","AÏ","aï","AÛ","aû","AÁ","aá","AÀ","aà","AÅ","aå","AÃ","aã","AÄ","aä","AÉ","aé","AÈ","aè","AÚ","aú","AÜ","aü","AË","aë","EÏ","eï","EÛ","eû","EÕ","eõ","EÁ","eá","EÀ","eà","EÅ","eå","EÃ","eã","EÄ","eä","Æ","æ","Ò","ò","OÏ","oï","OÛ","oû","OÁ","oá","OÀ","oà","OÅ","oå","OÃ","oã","OÄ","oä","ÔÙ","ôù","ÔØ","ôø","ÔÛ","ôû","ÔÕ","ôõ","ÔÏ","ôï","UÏ","uï","UÛ","uû","ÖÙ","öù","ÖØ","öø","ÖÛ","öû","ÖÕ","öõ","ÖÏ","öï","YØ","yø","Î","î","YÛ","yû","YÕ","yõ");
		for ($i = 0; $i < count($UNI); $i++) {
			$text = str_replace($UNI[$i], $VNI[$i], $text);
		}
		return $text;
	}

	public function sanitize($text) {
		$text = strip_tags($text);
		$text = change_alias($text);
		$text = preg_replace('|%([a-fA-F0-9][a-fA-F0-9])|', '---$1---', $text);
		$text = str_replace('%', '', $text);
		$text = preg_replace('|---([a-fA-F0-9][a-fA-F0-9])---|', '%$1', $text);

		if (self::seemsUtf8($text)) {
			if (function_exists('mb_strtolower')) {
				$text = mb_strtolower($text, 'UTF-8');
			}
			$text = self::utf8UriEncode($text, 200);
		}
		$text = strtolower($text);
		$text = preg_replace('/&.+?;/', '', $text);
		$text = str_replace('.', '-', $text);
		$text = preg_replace('/[^%a-z0-9 _-]/', '', $text);
		$text = preg_replace('/\s+/', '-', $text);
		$text = preg_replace('|-+|', '-', $text);
		$text = trim($text, '-');
		return $text;
	}
}