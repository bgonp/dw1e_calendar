<?php

interface iController {

/**
 * Devolvera un array con todos los objeto de esa clase
 */
public static function listPage();
/**
 * Eliminara el objeto de esa clase
 */
public static function deletePage();
/**
 * Creara una instancia de esta clase para ser procesada
 */
public static function createPage();
/**
 * modificara el objeto de esa clase 
 */
public static function editPage();
    
}
