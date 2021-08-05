<?php
/**
 * tth_internal_encoding()
 * 
 * @param mixed $encoding
 * @return
 */
function tth_internal_encoding( $encoding )
{
	return false;
}

/**
 * tth_strlen()
 * 
 * @param mixed $string
 * @return
 */
function tth_strlen( $string )
{
	return preg_match_all( '/./u', $string, $tmp );
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
	$tth_strlen = tth_strlen( $string );
	if( $start < 0 ) $start = $tth_strlen + $start;
	if( $length < 0 ) $length = $tth_strlen - $start + $length;
	$xlen = $tth_strlen - $start;
	$length = ( $length > $xlen ) ? $xlen : $length;
	preg_match( '/^.{' . $start . '}(.{0,' . $length . '})/us', $string, $tmp );

	return ( isset( $tmp[1] ) ) ? $tmp[1] : false;
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
 * nv2_strpos()
 * 
 * @param mixed $haystack
 * @param mixed $needle
 * @param integer $offset
 * @return
 */
function tth_strpos( $haystack, $needle, $offset = 0 )
{
	$offset = ( $offset < 0 ) ? 0 : $offset;
	if( $offset > 0 )
	{
		preg_match( '/^.{' . $offset . '}(.*)/us', $haystack, $dummy );
		$haystack = ( isset( $dummy[1] ) ) ? $dummy[1] : '';
	}

	$p = strpos( $haystack, $needle );
	if( $haystack == '' or $p === false ) return false;
	$r = $offset;
	$i = 0;

	while( $i < $p )
	{
		if( ord( $haystack[$i] ) < 128 )
		{
			$i = $i + 1;
		}
		else
		{
			$bvalue = decbin( ord( $haystack[$i] ) );
			$i = $i + strlen( preg_replace( '/^(1+)(.+)$/', '\1', $bvalue ) );
		}
		++$r;
	}

	return $r;
}

/**
 * tth_strrpos()
 * 
 * @param mixed $haystack
 * @param mixed $needle
 * @param mixed $offset
 * @return
 */
function tth_strrpos( $haystack, $needle, $offset = null )
{
	if( $offset === null )
	{

		$ar = explode( $needle, $haystack );

		if( sizeof( $ar ) > 1 )
		{
			array_pop( $ar );
			$haystack = join( $needle, $ar );
			return tth_strlen( $haystack );
		}

		return false;
	}
	else
	{
		if( ! is_int( $offset ) )
		{
			trigger_error( 'tth_strrpos expects parameter 3 to be long', E_USER_WARNING );
			return false;
		}

		$haystack = tth_substr( $haystack, $offset );

		if( false !== ( $pos = tth_strrpos( $haystack, $needle ) ) )
		{
			return $pos + $offset;
		}

		return false;
	}
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