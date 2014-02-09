<div id='libros' class="tabla">
	<table border='0px'>
		<thead>
			<tr>
				<th>Título</th><td></td>
				<th>Edita</th><td></td>
				<th>Año de edición</th><td></td>
				<th>PVP</th><td></td>
				<th>Tamaño</th><td></td>
				<th>Páginas</th><td></td>
				<th>Color</th><td></td>
				<th>Disponible desde</th><td></td>
				<th>Acciones</th>
			</tr>
		</thead>
		<tbody>
			<?php
			/*
			 for ($i = 0; $i < count($datos['libros']); $i++) {
			 
				echo "<tr>
						<td>{$datos['libros'][$i]['titulo']}</td>
						<td>{$datos['libros'][$i]['autor']}</td>
						<td>{$datos['libros'][$i]['comentario']}</td>
					</tr>";
			}
			*/
			foreach ($datos['filas'] as $fila){
				echo "<tr>
						<td class='celda_izquierda'>{$fila['titulo']}</td><td>|</td>
						<td>{$fila['edita']}</td><td>|</td>
						<td>{$fila['anio_edicion']}</td><td>|</td>
                                                <td>".\core\Conversiones::decimal_punto_a_coma($fila['pvp'])."</td><td>|</td>
						<td>{$fila['tamanio']}</td><td>|</td>
						<td>{$fila['paginas']}</td><td>|</td>
						<td>{$fila['color']}</td><td>|</td>
						<td>".\core\Conversiones::fecha_mysql_a_es($fila['disponible_desde'])."</td><td>|</td>
                                                <td class='celda_derecha'>"
                                                // <a class='boton' onclick='submit_post_request_form(\"".\core\URL::generar("hemeroteca/form_modificar")."\", {$fila['id']});' >modificar</a>
                                                .\core\HTML_Tag::a_boton_onclick("boton", array("hemeroteca", "form_modificar", $fila['id']), "modificar")
                                                // <a class='boton' onclick='submit_post_request_form(\"".\core\URL::generar("usuarios/form_borrar")."\", {$fila['id']});' >borrar</a>
                                                ."-".\core\HTML_Tag::a_boton_onclick("boton", array("hemeroteca", "form_borrar", $fila['id']), "borrar").
                                                // <a class='boton' onclick='submit_post_request_form(\"".\core\URL::generar("usuarios/form_cambiar_password")."\", {$fila['id']});' >modificar password</a>
                                                "</td>
                                        </tr>
                                ";
                        }
			?>
		</tbody>
                <tfoot>
			<tr>
				<td><a class='boton' href='<?php echo URL_ROOT; ?>hemeroteca/form_insertar' >insertar</a></td>
			</tr>
		</tfoot>
	</table>
</div>



