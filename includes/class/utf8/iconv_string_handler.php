<?php
iconv_set_encoding( 'input_encoding', 'utf-8' );
iconv_set_encoding( 'internal_encoding', 'utf-8' );
iconv_set_encoding( 'output_encoding', 'utf-8' );

/**
 * tth_internal_encoding()
 * 
 * @param mixed $encoding
 * @return
 */
function tth_internal_encoding( $encoding )
{
	return iconv_set_encoding( 'internal_encoding', $encoding );
}

/**
 * tth_strlen()
 * 
 * @param mixed $string
 * @return
 */
function tth_strlen( $string )
{
	global $global_config;

	return iconv_strlen( $string, $global_config['site_charset'] );
}

/**
 * tth_substr()
 * 
 * @param mixed $string
 * @param mixed $start
 * @param mixed $length
 * @return
 */
function tth_substr( $string, $start, $length )
{
	global $global_config;

	return iconv_substr( $string, $start, $length, $global_config['site_charset'] );
}

/**
 * tth_substr_count()
 * 
 * @param mixed $haystack
 * @param mixed $needle
 * @return
 */
function tth_substr_count( $haystack, $needle )
{
	$needle = preg_quote( $needle, '/' );
	preg_match_all( '/' . $needle . '/u', $haystack, $dummy );
	return sizeof( $dummy[0] );
}

/**
 * tth_strpos()
 * 
 * @param mixed $haystack
 * @param mixed $needle
 * @param integer $offset
 * @return
 */
function tth_strpos( $haystack, $needle, $offset = 0 )
{
	global $global_config;

	return iconv_strpos( $haystack, $needle, $offset, $global_config['site_charset'] );
}

/**
 * tth_strrpos()
 * 
 * @param mixed $haystack
 * @param mixed $needle
 * @param integer $offset
 * @return
 */
function tth_strrpos( $haystack, $needle, $offset = 0 )
{
	global $global_config;

	return iconv_strrpos( $haystack, $needle, $offset, $global_config['site_charset'] );
}

/**
 * tth_strtolower()
 * 
 * @param mixed $string
 * @return
 */
function tth_strtolower( $string )
{
	include 'lookup.php' ;
	return strtr( $string, $utf8_lookup['strtolower'] );
}

/**
 * tth_strtoupper()
 * 
 * @param mixed $string
 * @return
 */
function tth_strtoupper( $string )
{
	include 'lookup.php' ;
	return strtr( $string, $utf8_lookup['strtoupper'] );
}