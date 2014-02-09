<div id='libros' class="tabla">
	<table border='1px'>
		<thead>
			<tr>
				<th>Título</th>
				<th>Edita</th>
				<th>Año de edición</th>
				<th>PVP</th>
				<th>Tamaño</th>
				<th>Páginas</th>
				<th>Color</th>
				<th>Disponible desde</th>
				<th>Acciones</th>
			</tr>
		</thead>
		<tbody>
			<?php
			
			foreach ($datos['filas'] as $fila){
				echo "<tr>
						<td class='celda_izquierda'>{$fila['titulo']}</td>
						<td>{$fila['edita']}</td>
						<td>{$fila['anio_edicion']}</td>
                                                <td>".\core\Conversiones::decimal_punto_a_coma($fila['pvp'])."</td>
						<td>{$fila['tamanio']}</td>
						<td>{$fila['paginas']}</td>
						<td>{$fila['color']}</td>
						<td>".\core\Conversiones::fecha_mysql_a_es($fila['disponible_desde'])."</td>
                                                <td class='celda_derecha'>"                                                 
                                                // <a class='boton' onclick='submit_post_request_form(\"".\core\URL::generar("mediateca/form_modificar")."\", {$fila['id']});' >modificar</a>
                                                .\core\HTML_Tag::a_boton_onclick("boton", array("mediateca", "form_modificar", $fila['id']), "modificar")
                                                // <a class='boton' onclick='submit_post_request_form(\"".\core\URL::generar("usuarios/form_borrar")."\", {$fila['id']});' >borrar</a>
                                                ."/".\core\HTML_Tag::a_boton_onclick("boton", array("mediateca", "form_borrar", $fila['id']), "borrar").
                                                // <a class='boton' onclick='submit_post_request_form(\"".\core\URL::generar("usuarios/form_cambiar_password")."\", {$fila['id']});' >modificar password</a>
                                                "</td>
                                        </tr>
                                ";
                        }
			?>
		</tbody>
                <tfoot>
			<tr>
				<td><a class='boton' href='<?php echo URL_ROOT; ?>mediateca/form_insertar' >insertar</a></td>
			</tr>
		</tfoot>
	</table>
</div>
