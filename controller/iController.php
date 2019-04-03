<?php

interface iController {

	/**
	 * Gestiona la lógica de la página de listado de elementos
	 */
	public static function listPage();

	/**
	 * Gestiona la lógica de la página de borrado de elemento
	 */
	public static function deletePage();

	/**
	 * Gestiona la lógica de la página de crear elemento
	 */
	public static function createPage();

	/**
	 * Gestiona la lógica de la página de editar elemento
	 */
	public static function editPage();
    
}
