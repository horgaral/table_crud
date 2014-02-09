<?php
namespace controladores;

class mediateca extends \core\Controlador {

	
	
	/**
	 * Presenta una <table> con las filas de la tabla con igual nombre que la clase.
	 * @param array $datos
	 */
	public function index(array $datos=array()) {
		
		$clausulas['order_by'] = 'titulo';
		$datos["filas"] = \modelos\Datos_SQL::table("mediateca")->select( $clausulas ); // Recupera todas las filas ordenadas
                $datos['view_content'] = \core\Vista::generar(__FUNCTION__, $datos);
		$http_body = \core\Vista_Plantilla::generar('plantilla_principal', $datos);
		\core\HTTP_Respuesta::enviar($http_body);
		
	}
	
	/**
	 * Añade la clausula "order by titulo". Genera una vista de un formulario de inserción vacío.
	 * @param array $datos
	 */
	public function form_insertar(array $datos=array()) {
		
		$clausulas['order_by'] = " titulo ";
		$datos['view_content'] = \core\Vista::generar(__FUNCTION__, $datos);
		$http_body = \core\Vista_Plantilla::generar('plantilla_principal', $datos);
		\core\HTTP_Respuesta::enviar($http_body);
		
	}
        
        
/**
	 * Valida que los datos introducidos se ajustan a lo que se requiere.
         * En caso de validación correcta, inserta en la BD. 
         * Devuelve en caso de errores datos["mensajes"]["errores_validación"] con el mensaje "No se han podido grabar los datos en la bd."
         * Si ha habido errores carga de nuevo "form_insertar" con el array datos["mensajes"] lleno.  
	 * 
         * 
         * 
         * @param array $datos
*/
        public function validar_form_insertar(array $datos=array()) {
		
		
		
		$validaciones = array(
			 "titulo" =>"errores_requerido && errores_texto"
			, "edita" => "errores_texto && errores_requerido"
                        , "anio_edicion" => "errores_requerido && errores_anio_pasado"
                        , "pvp" => "errores_requerido && errores_precio"
			, "tamanio" => "errores_texto && errores_requerido && errores_tamanio_10"
                        , "paginas" => "errores_requerido && errores_numeros_4"
			, "color" => "errores_texto && errores_requerido && errores_tamanio_4"
                        , "disponible_desde" => "errores_requerido && errores_fecha_dia_mes_anio"

		);
		if ( ! $validacion = ! \core\Validaciones::errores_validacion_request($validaciones, $datos))
            $datos["errores"]["errores_validacion"]="Corrige los errores.";
		else {
                    //Convertimos la fecha de formato europeo a formato mysql. Primero añadimos guiones entre los datos y luego convertimos
                        $datos['values']['disponible_desde'] = str_replace(array(' ', '/', '.', ',', ':'), '-', $datos['values']['disponible_desde']);
			$datos['values']['disponible_desde'] = \core\Conversiones::fecha_es_a_mysql($datos['values']['disponible_desde']);
                        $datos['values']['pvp'] = \core\Conversiones::decimal_coma_a_punto($datos['values']['pvp']);
			if ( ! $validacion = \modelos\Modelo_SQL::insert($datos["values"], 'mediateca')) // Devuelve true o false
				$datos["errores"]["errores_validacion"]="No se han podido grabar los datos en la bd.";
		}
		if ( ! $validacion) //Devolvemos el formulario para que lo intente corregir de nuevo
			\core\Distribuidor::cargar_controlador('mediateca', 'form_insertar', $datos);
		else
		{
			// Se ha grabado la modificación. Devolvemos el control al la situacion anterior a la petición del form_modificar
			//$datos = array("alerta" => "Se han grabado correctamente los detalles");
			// Definir el controlador que responderá después de la inserción
			//\core\Distribuidor::cargar_controlador('mediateca', 'index', $datos);
			$_SESSION["alerta"] = "Se han grabado correctamente los detalles";
			//header("Location: ".\core\URL::generar("mediateca/index"));
			\core\HTTP_Respuesta::set_header_line("location", \core\URL::generar("mediateca/index"));
			\core\HTTP_Respuesta::enviar();
		}
	}
        


	
/**
	 * 
         * Carga el formulario con los datos del registro con el id pasado por referencia  
	 * 
         * 
         * 
         * @param array $datos
*/	
	public function form_modificar(array $datos=array()) {
		
		if ( ! count($datos)) { // Si no es un reenvío desde una validación fallida
			$validaciones=array(
				"id" => "errores_requerido && errores_numero_entero_positivo && errores_referencia:id/mediateca/id"
			);
			if ( ! $validacion = ! \core\Validaciones::errores_validacion_request($validaciones, $datos)) {
				$datos['mensaje'] = 'Datos erróneos para identificar la revista a modificar';
				$datos['url_continuar'] = \core\URL::generar("mediateca");
				
				$this->cargar_controlador('mensajes', 'mensaje', $datos);
				return;
			}
			else {
				$clausulas['where'] = " id = {$datos['values']['id']} ";
				if ( ! $filas = \modelos\Datos_SQL::table("mediateca")->select($clausulas)) {
					$datos['mensaje'] = 'Error al recuperar la fila de la base de datos';
					$this->cargar_controlador('mensajes', 'mensaje', $datos);
					return;
				}
				else {
					$datos['values'] = $filas[0];
										
					$clausulas = array('order_by' => " titulo ");
					
				}
			}
		}
                //Mostramos la fecha en formato europeo
		$datos['values']['disponible_desde'] = \core\Conversiones::fecha_mysql_a_es($datos['values']['disponible_desde']);
		$datos['values']['pvp'] = \core\Conversiones::decimal_punto_a_coma($datos['values']['pvp']);
		$datos['view_content'] = \core\Vista::generar(__FUNCTION__, $datos);
		$http_body = \core\Vista_Plantilla::generar('plantilla_principal', $datos);
		\core\HTTP_Respuesta::enviar($http_body);
	}

        
        
 /**
	 * Valida que los datos introducidos se ajustan a lo que se requiere.
         * En caso de validación correcta, inserta en la BD. 
         * Devuelve en caso de errores datos["mensajes"]["errores_validación"] con el mensaje "No se han podido grabar los datos en la bd."
         * Si ha habido errores carga de nuevo "form_insertar" con el array datos["mensajes"] lleno.  
	 * 
         * 
         * 
         * @param array $datos
*/       
	public function validar_form_modificar(array $datos=array()) {	
		
		$validaciones=array(
			 "id" => "errores_requerido && errores_numero_entero_positivo && errores_referencia:id/mediateca/id"
			, "titulo" =>"errores_requerido && errores_texto"
			, "edita" => "errores_texto && errores_requerido"
                        , "anio_edicion" => "errores_requerido && errores_anio_pasado"
                        , "pvp" => "errores_requerido && errores_precio"
			, "tamanio" => "errores_texto && errores_requerido && errores_tamanio_10"
                        , "paginas" => "errores_requerido && errores_numeros_4"
			, "color" => "errores_texto && errores_requerido && errores_tamanio_4"
                        , "disponible_desde" => "errores_requerido && errores_fecha_dia_mes_anio"

		);

		if ( ! $validacion = ! \core\Validaciones::errores_validacion_request($validaciones, $datos)) {
			//print_r($datos);
            $datos["errores"]["errores_validacion"] = "Corrige los errores.";
		}
		else {
                        //Convertimos la fecha de formato europeo a formato mysql. Primero añadimos guiones entre los datos y luego convertimos

			$datos['values']['disponible_desde'] = \core\Conversiones::fecha_es_a_mysql($datos['values']['disponible_desde']);
                        $datos['values']['pvp'] = \core\Conversiones::decimal_coma_a_punto($datos['values']['pvp']);

			if ( ! $validacion = \modelos\Datos_SQL::table("mediateca")->update_row($datos["values"], 'mediateca')); // Devuelve true o false
				$datos["errores"]["errores_validacion"]="No se han podido grabar los datos en la bd.";
		}
		if ( ! $validacion) //Devolvemos el formulario para que lo intente corregir de nuevo
			$this->cargar_controlador('mediateca', 'form_modificar',$datos);
		else
		{
			$datos = array("alerta" => "Se han modificado correctamente.");
			// Definir el controlador que responderá después de la inserción
			$this->cargar_controlador('mediateca', 'index',$datos);		
		}
	}

	
	
	public function form_borrar(array $datos=array()) {
		
		$datos["form_name"] = __FUNCTION__;
		$validaciones=array(
			"id" => "errores_requerido && errores_numero_entero_positivo && errores_referencia:id/mediateca/id"
		);
		if ( ! $validacion = ! \core\Validaciones::errores_validacion_request($validaciones, $datos)) {
			$datos['mensaje'] = 'Datos erróneos para identificar el artículo a borrar';
			$datos['url_continuar'] = \core\URL::http('?menu=mediateca');
			\core\Distribuidor::cargar_controlador('mensajes', 'mensaje', $datos);
			return;
		}
		else {
			$clausulas['where'] = " id = {$datos['values']['id']} ";
			if ( ! $filas = \modelos\Datos_SQL::select( $clausulas, 'mediateca')) {
				$datos['mensaje'] = 'Error al recuperar la fila de la base de datos';
				\core\Distribuidor::cargar_controlador('mensajes', 'mensaje', $datos);
				return;
			}
			else {
				$datos['values'] = $filas[0];
                                $datos['values']['pvp'] = \core\Conversiones::decimal_punto_a_coma($datos['values']['pvp']);

			}
		}
		
		$datos['view_content'] = \core\Vista::generar(__FUNCTION__, $datos);
		$http_body = \core\Vista_Plantilla::generar('plantilla_principal', $datos);
		\core\HTTP_Respuesta::enviar($http_body);
	}

	
	
	
 /**
	 * 
	 * Valida que el id sea correcto y exista. En caso de aceptar, ejecuta \modelos\Datos_SQL::delete($datos["values"], 'mediateca')
         * 
         * 
         * @param array $datos
*/   	
	
	public function validar_form_borrar(array $datos=array()) {	
		
                $validaciones=array(
                    "id" => "errores_requerido && errores_numero_entero_positivo && errores_referencia:id/mediateca/id"
                    );
                if ( ! $validacion = ! \core\Validaciones::errores_validacion_request($validaciones, $datos)) {
                    $datos['mensaje'] = 'Datos erróneos para identificar la revista a borrar';
                    $datos['url_continuar'] = \core\URL::http('?menu=mediateca');
                    $this->cargar_controlador('mensajes', 'mensaje', $datos);
                    return;
                }
                else
                    {
                    if ( ! $validacion = \modelos\Datos_SQL::delete_row($datos["values"], 'mediateca')) {// Devuelve true o false
                        $datos['mensaje'] = 'Error al borrar en la bd';
                        $datos['url_continuar'] = \core\URL::http('?menu=mediateca');
                        $this->cargar_controlador('mensajes', 'mensaje', $datos);
                        return;
                    }
                    else
                    {
                        $datos = array("alerta" => "Se borrado correctamente.");
                        $this->cargar_controlador('mediateca', 'index',$datos);	
                    }
                }
        }
	
	
	
} // Fin de la clase