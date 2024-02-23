<?php

//Datos Correspondientes a la factura
    /**
     * Para conocer que dato va en cada parametro se puede consultar el archivo:
     *
     * - fe/docs/Estructura de Datos del Request de WSFEv1.docx
     *
     *
     * Y para mas informacion se puede revisar el manual del WS
     * 
     * - fe/docs/manual_desarrollador_COMPG_v2.pdf
     * 
     */
    
    //Cabecera
    $CbteTipo = 6; // Factura B - Ver - AfipWsfev1::FEParamGetTiposCbte()
    $PtoVta = 1;

    //Requerimiento
    $Concepto = 3; //Productos y Servicios
    $DocTipo = 96; //DNI
    $DocNro = 23123456;
    
    /**
     * Estos dos parametros representan el numero de factura desde/hasta pero deben ser iguales
     * Se obtienen mediante el metodo: $wsfe->FECompUltimoAutorizado($PtoVta,$CbteTipo);
     * 
     * $CbteDesde = ;
     * $CbteHasta = ;
     * 
     */
    

    $CbteFch = intval(date('Ymd'));
    $ImpTotal = 242.00;
    $ImpTotConc = 0.00;
    $ImpNeto = 200.00;
    $ImpOpEx = 0.00;
    $ImpIVA = 42.00;
    $ImpTrib = 0.00;
    $FchServDesde = intval(date('Ymd'));
    $FchServHasta = intval(date('Ymd'));
    $FchVtoPago = intval(date('Ymd'));
    $MonId = 'PES'; // Pesos (AR) - Ver - AfipWsfev1::FEParamGetTiposMonedas()
    $MonCotiz = 1.00;


    //Informacion para agregar al array Tributos
    /** 
     * Esto aplica si las facturas tienen tributos agregados
     */
        $tributoId = null; // Ver - AfipWsfev1::FEParamGetTiposTributos()
        $tributoDesc = null;
        $tributoBaseImp = null;
        $tributoAlic = null;
        $tributoImporte = null;
     

    //Informacion para agregar al array IVA
    $IvaAlicuotaId = 5; // 21% Ver - AfipWsfev1::FEParamGetTiposIva()
    $IvaAlicuotaBaseImp = 200.00;
    $IvaAlicuotaImporte = 42.00;   
?>