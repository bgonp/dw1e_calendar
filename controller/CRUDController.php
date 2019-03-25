<?php

interface CRUDController {

/**
 * Devolvera un array con todos los objeto de esa clase
 */
public static function get();
/**
 * Devolvera un objeto de esa clase
 */
public static function getSingle();
/**
 * Eliminara el objeto de esa clase
 */
public static function remove();
/**
 * Creara una instancia de esta clase para ser procesada
 */
public static function create();
/**
 * modificara el objeto de esa clase 
 */
public static function edit();
    
}
