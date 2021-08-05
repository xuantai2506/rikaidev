<?php
mb_internal_encoding( 'utf-8' );
mb_http_output( 'utf-8' );

/**
 * tth_internal_encoding()
 * 
 * @param mixed $encoding
 * @return
 */
function tth_internal_encoding( $encoding )
{
	return mb_internal_encoding( $encoding );
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

	return mb_strlen( $string, $global_config['site_charset'] );
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

	return mb_substr( $string, $start, $length, $global_config['site_charset'] );
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
	return mb_substr_count( $haystack, $needle );
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

	return mb_strpos( $haystack, $needle, $offset, $global_config['site_charset'] );
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

	return mb_strrpos( $haystack, $needle, $offset, $global_config['site_charset'] );
}

/**
 * tth_strtolower()
 * 
 * @param mixed $string
 * @return
 */
function tth_strtolower( $string )
{
	global $global_config;

	return mb_strtolower( $string, $global_config['site_charset'] );
}

/**
 * tth_strtoupper()
 * 
 * @param mixed $string
 * @return
 */
function tth_strtoupper( $string )
{
	global $global_config;

	return mb_strtoupper( $string, $global_config['site_charset'] );
}