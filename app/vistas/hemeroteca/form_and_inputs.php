
<form id='form_anexar' method='post' action="<?php echo URL_ROOT; echo $datos['controlador_clase']; ?>/validar_<?php echo $datos['controlador_metodo']; ?>" >
	<input id='id' name='id' type='hidden' value='<?php echo \core\Array_Datos::values('id', $datos); ?>' />
	          
            
       <div class="entrada"> 
           Título: <input id='titulo' name='titulo' type='text' size='70'  maxlength='100' value='<?php echo \core\Array_Datos::values('titulo', $datos); ?>' required/>
	<span class='requerido'>*</span><?php echo \core\HTML_Tag::span_error('titulo', $datos); ?><br />
       </div>
	<br />
        
        <div class="entrada">
            Edita: <input id='edita' name='edita' type='text' size='70'  maxlength='100' value='<?php echo \core\Array_Datos::values('edita', $datos); ?>' required/><span class='requerido'>*</span><?php echo \core\HTML_Tag::span_error('edita', $datos); ?><br />
    </div>
        
        
	<div class="entrada">
	Año de edición: <input id='anio_edicion' name='anio_edicion' type='text' size='20'  maxlength='20' value='<?php echo \core\Array_Datos::values('anio_edicion', $datos); ?>' maxlength='4' required/><span class='requerido'>*</span><?php echo \core\HTML_Tag::span_error('anio_edicion', $datos); ?>
	<br />
        </div>
        
        <div class="entrada">
	PVP: <input id='pvp' name='pvp' type='text' size='20'  maxlength='20' value='<?php echo \core\Array_Datos::values('pvp', $datos); ?>' required/><span class='requerido'>*</span><?php echo \core\HTML_Tag::span_error('pvp', $datos); ?>
	<br />
        </div>
       
      
        
        
        <div class="entrada">
            Tamaño: <input id='tamanio' name='tamanio' type='text' size='70'  maxlength='30' value='<?php echo \core\Array_Datos::values('tamanio', $datos); ?>' placeholder="e.g. 150x230" maxlength='10' required/><span class='requerido'>*</span><?php echo \core\HTML_Tag::span_error('tamanio', $datos); ?><br />
    </div>
        
        
	<div class="entrada">
	Páginas: <input id='anio_edicion' name='paginas' type='text' size='20'  maxlength='20' value='<?php echo \core\Array_Datos::values('paginas', $datos); ?>' maxlength='4' required/><span class='requerido'>*</span><?php echo \core\HTML_Tag::span_error('paginas', $datos); ?>
	<br />
        </div>
       
        
        <div class="entrada">
            Color: &nbsp;&nbsp;&nbsp;
            <input type="radio" name='color' value="b&n" <?php if(\core\Array_Datos::values('color', $datos) == 'b&n') echo " checked";?>>b&n 
            &nbsp;&nbsp;&nbsp;
            <input type="radio" name="color" value="CMYK" <?php if(\core\Array_Datos::values('color', $datos) == 'CMYK') echo " checked";?>> CMYK <span class='requerido'>*</span><?php echo \core\HTML_Tag::span_error('color', $datos); ?><br />
            
            
            
            
    </div>
        
        
	<div class="entrada">
	Disponible desde: <input id='disponible_desde' name='disponible_desde' type='text' size='30'  maxlength='20' value='<?php echo \core\Array_Datos::values('disponible_desde', $datos); ?>' required/><span class='requerido'>*</span><?php echo \core\HTML_Tag::span_error('disponible_desde', $datos); ?>
	<br />
        </div>
       
<div class="entrada"><input type='submit' value='enviar' />
    <input type='reset' value='Limpiar'>
	<button type='button' onclick='location.assign("<?php echo URL_ROOT; ?>hemeroteca/index");'>Cancelar</button></div>
</form>
