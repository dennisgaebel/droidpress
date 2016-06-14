<?php
/*
@params array (int, string), int, string
@return boolean
*/

function include_check($params = null){
    // echo '<pre>';
    // var_dump( $params );
    // var_dump( get_the_id() );
    // var_dump( gettype($params) );
    // echo '</pre>';
    if( gettype($params) === 'string' ){
        if( is_singular($params) ){
            return true;
        }
    } elseif( gettype($params) === 'array' ){
        foreach ($params as $param) {
            if( gettype($param) === 'string' ){
                if( is_singular($param) ){
                    return true;
                }
            } elseif( gettype($param) === 'int' ){
                if( get_the_ID() == $param ){
                    return true;
                }
            }
        }
        if( in_array( get_the_ID() , $params) ){
            return true;
        }
    } elseif( gettype($params) === 'integer' ){
        if( get_the_ID() == $params ){
            return true;
        }
    }
    return false;
}
