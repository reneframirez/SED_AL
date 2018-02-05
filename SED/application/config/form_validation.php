<?php
/**
 * Reglas de validación para formularios
 */

$config = array(
        #Inicio
        'formulario_login'
        => array(            
            array('field' => 'txt_usuario','label' => 'Usuario','rules' => 'required'),
            array('field' => 'txt_pass','label' => 'Clave','rules' => 'required|is_string|trim|max_length[8]'),
        ), #Fin
        #Inicio
        'form_compra_nac'
        => array(            
            array('field' => 'txtNumFac','label' => 'N° de Factura','rules' => 'required|numeric'),            
            array('field' => 'txtRutProv','label' => 'Rut del Proveedor','rules' => 'required'),
            array('field' => 'txtFecCompra','label' => 'Fecha de Compra','rules' => 'required'),
            array('field' => 'producto[]','label' => 'Código Producto','rules' => 'required'),
            array('field' => 'txtDescProd[]','label' => 'Descripción del producto','rules' => 'required'),
            array('field' => 'txtCantProd[]','label' => 'Cantidad','rules' => 'required'),
            array('field' => 'txtPrecioProd[]','label' => 'Precio','rules' => 'required'),
            
        ), #Fin   
        #Inicio
        'form_consulta_compra_nac'
        => array(                        
            array('field' => 'txtRutProv','label' => 'Rut del Proveedor','rules' => 'required|esRut'),
        ), #Fin 
        #Inicio
        'form_orden_pedido'
        => array(            
            array('field' => 'txtRutProv','label' => 'Rut del Proveedor','rules' => 'required'),
            array('field' => 'txtFecCompra','label' => 'Fecha de Compra','rules' => 'required'),
            array('field' => 'txtTipoCambio','label' => 'Tipo de Cambio','rules' => 'required'),
            array('field' => 'producto[]','label' => 'Código Producto','rules' => 'required'),
            array('field' => 'txtDescProd[]','label' => 'Descripción del producto','rules' => 'required'),
            array('field' => 'txtCantProd[]','label' => 'Cantidad','rules' => 'required'),
            array('field' => 'txtPrecioProd[]','label' => 'Precio','rules' => 'required'),            
        ), #Fin    
    
);