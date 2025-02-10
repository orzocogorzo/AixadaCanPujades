<?php
include "../php/inc/header.inc.php";
require_once "report_header_writer.php";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Aixada - Report - Order</title>


	<style type="text/css">
		body 				{font-size:0.8em; font-family:arial, helvetica;}
		table 				{width:100%; margin-bottom:10px; border-collapse:collapse;}
		td					{border:solid 1px black; padding:2px 2px;}
		th					{border:solid 1px black; background:#efefef;}
		p 					{margin:0px;}
		th h2				{margin:4px;}
        ol li               {position:relative;}
        ol li::before       {position:absolute;top:0;left:-3em;width:1em;height:1em;border:1px solid black;content:"";}
		
		.section 			{width:90%; clear:both; margin:auto; margin-bottom:10px;}
		.txtAlignRight		{text-align:right;}
		.txtAlignCenter		{text-align:center;}
		.tdAlignTop			{vertical-align:top;}
		.bold				{font-weight:bold;}


		.b4					{border:2px solid black;}	 
		.p4-5				{padding:5px;}
		.hidden				{display:none;}
		

		
		
		div#logo			{width:500px; float:left;}
		div#address			{}

		.loadingMsg			{font-weight:bold; font-size:2em; text-align:center; display:block;}

		.clickPageBreak 	{display:block; margin-bottom:50px;}
		.pageBreakBtn		{padding:5px; border:solid 1px black; background-color:#f9f9f9; cursor:pointer;}
		.pageBreak 			{display:block;border-bottom:dashed 1px gray;}
	
		@media print {
	  		.pageBreak  	{display:block; page-break-before:always; border-bottom:dashed 1px gray; margin-bottom:50px;}
	  		.pageBreakBtn 	{display:none;}
	  		.loadingMsg		{display:none;}
		}

		
	</style>
	
	
	<script type="text/javascript" src="../js/jquery/jquery.js"></script>
	<script type="text/javascript" src="../js/jqueryui/jqueryui.js"></script>
	<?php echo aixada_js_src(false, '../'); ?>
 

	<script type="text/javascript">

		
	
		$(function(){
			$.ajaxSetup({ cache: false });

			//for the moment being does nothing...
			window.opener.$('input:checkbox[name="bulkAction"]').each(function(){
				if ($(this).is(':checked')){
					
				} 
			});


			//add remove page breaks for printing
			$('.clickPageBreak')
				.live('click', function(e){
	
					if ($(this).hasClass('pageBreak')){
						$(this).removeClass('pageBreak');
						$(this).find('span').text("<?php echo $Text['add_pagebreak']; ?>");
					} else {
						$(this).addClass('pageBreak');
						$(this).find('span').text("<?php echo $Text['remove_pagebreak']; ?>");
					}
				})
			

		}); //close document ready
	</script>
	
</head>
<body>
    <div class="exportPreface hidden">
	    <header><?php write_tpl_header(); ?></header>
        <main class="section" style="font-size:1rem">
            <div style="display:flex;justify-content:space-between;">
                <h1>Fulla de repartiment</h1>
                <div style="margin-left:10%;flex:1;padding:4px 6px;border:2px solid black;">
                    <p>Repartidores:</p>
                </div>
            </div>
            <br />
            <p>Si us plau, en fer el repartiment, llegiu els passos i aneu marcant-los amb una X a mesura que els completeu.</p>
            <br />
            <div style="width:90%;border:2px solid black;padding:0.6em 1em;margin:auto">
                <p><b>Normes bàsiques:</b></p>
                <ul>
                    <li>Els productes més pesats, a sota.</li>
                    <li>No colpegeu els productes quan els poseu a les caixes o a les balances.</li>
                    <li>Les incidències han d’apuntar-se al moment, si no, ens n’oblidem.</li>
                </ul>
            </div>
            <br />
            <ol>
                <li>Ordeneu les cistelles de les prestatgeries per CV.</li>
                <li>
                    A la nevera:
                    <ul>
                        <li>Reviseu si hi queden productes de la setmana passada (i aviseu pel Signal!).</li>
                        <li>Escriviu el CV als productes de nevera en un lloc fàcilment visible i deixeu-los ordenats.</li>
                    </ul>
                </li>
                <li>Si hi ha caixes tancades de La Rural, col·loqueu-les dins de les caixes de CV o al seu costat.</li>
                <li>Si hi ha productes en packs (com la llet), escriviu-hi el CV corresponent i deixeu-los agrupats.</li>
                <li>Si hi ha productes pesats o que no s’han de pesar (com la mel), poseu-los abans a les caixes.</li>
                <li>Calibreu les balances: l’agulla ha de marcar el “0” amb el plat a sobre. Si no ho fa, es pot calibrar amb la rosca que hi ha sota el suport del plat.</li>
                <li>Peseu els productes i col·loqueu-los a les caixes.<br />⚠ Alguns productes van per unitats (bròquil, carbassa, api, bledes...). Se n’ha d’anotar el pes a la fulla de comandes, a la casella del CV corresponent!</li>
                <li>Poseu un cartellet amb la paraula “NEVERA” a les caixes de CV que hi tinguin productes.</li>
                <li>Feu una foto de la fulla d’incidències (si n’hi ha) i envieu-la pel grup Coop Can Pujades (Signal).</li>
                <li>Doneu avís que es pot passar a recollir.</li>
                <li>Recolliu i guardeu les balances.</li>
                <li>Netegeu les taules i plegueu-les.</li>
                <li>Endreceu les caixes de La Rural i agrupeu-les al davant de la prestatgeria de fusta.</li>
                <li>Escombreu el terra.</li>
                <li>Llenceu les caixes de cartró al contenidor de paper.</li>
                <li>Deixeu les fulles (repartiment, comandes i incidències) i els albarans (si n’hi ha) a la safata vermella.</li>
            </ol>
            <br />
        </main>
        <div class="pageBreak"></div>
    </div>

	<div id="orderWrap">
	    <header><?php write_tpl_header(); ?></header>

	    <h2 class="loadingMsg"><?php echo $Text['loading'] ; ?></h2>
	
		<div class="anOrder">
			<p class="clickPageBreak txtAlignCenter"><span class="pageBreakBtn"><?php echo $Text['add_pagebreak']; ?></span></p>
		</div>
        <main class="section"></main>
	</div>

    <div class="incidencesTable hidden">
        <div class="pageBreak"></div>
	    <header><?php write_tpl_header(); ?></header>
        <main class="section" style="font-size:1rem">
            <h1><?php echo $Text['head_ti_incidents']; ?></h1>
            <p style="font-size: 1.5em"><b><?php echo $Text['date']; ?></b><span style="margin: 0 4rem">/</span>/<p>
            <br />
            <table>
                <thead>
                    <tr>
                        <th style="border:1px solid #ccc; background-color:#ddd;">
                            <div style="padding:6px 4px; text-align:center;"><?php echo $Text['provider_name']; ?></div>
                        </th>
                        <th style="border:1px solid #ccc; background-color:#ddd;">
                            <div style="padding:6px 4px; text-align:center;"><?php echo $Text['product_name']; ?></div>
                        </th>
                        <th style="border:1px solid #ccc; background-color:#ddd;">
                            <div style="padding:6px 4px; text-align:center;"><?php echo $Text['incident_type']; ?></div>
                        </th>
                        <th style="border:1px solid #ccc; background-color:#ddd;">
                            <div style="padding:6px 4px; text-align:center;"><?php echo $Text['ufs_concerned']; ?></div>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td style="border:1px solid #ccc;"><div style="padding:6px 4px;">&nbsp;</div></td>
                        <td style="border:1px solid #ccc;"><div style="padding:6px 4px;">&nbsp;</div></td>
                        <td style="border:1px solid #ccc;"><div style="padding:6px 4px;">&nbsp;</div></td>
                        <td style="border:1px solid #ccc;"><div style="padding:6px 4px;">&nbsp;</div></td>
                    </tr>
                    <tr>
                        <td style="border:1px solid #ccc;"><div style="padding:6px 4px;">&nbsp;</div></td>
                        <td style="border:1px solid #ccc;"><div style="padding:6px 4px;">&nbsp;</div></td>
                        <td style="border:1px solid #ccc;"><div style="padding:6px 4px;">&nbsp;</div></td>
                        <td style="border:1px solid #ccc;"><div style="padding:6px 4px;">&nbsp;</div></td>
                    </tr>
                    <tr>
                        <td style="border:1px solid #ccc;"><div style="padding:6px 4px;">&nbsp;</div></td>
                        <td style="border:1px solid #ccc;"><div style="padding:6px 4px;">&nbsp;</div></td>
                        <td style="border:1px solid #ccc;"><div style="padding:6px 4px;">&nbsp;</div></td>
                        <td style="border:1px solid #ccc;"><div style="padding:6px 4px;">&nbsp;</div></td>
                    </tr>
                    <tr>
                        <td style="border:1px solid #ccc;"><div style="padding:6px 4px;">&nbsp;</div></td>
                        <td style="border:1px solid #ccc;"><div style="padding:6px 4px;">&nbsp;</div></td>
                        <td style="border:1px solid #ccc;"><div style="padding:6px 4px;">&nbsp;</div></td>
                        <td style="border:1px solid #ccc;"><div style="padding:6px 4px;">&nbsp;</div></td>
                    </tr>
                    <tr>
                        <td style="border:1px solid #ccc;"><div style="padding:6px 4px;">&nbsp;</div></td>
                        <td style="border:1px solid #ccc;"><div style="padding:6px 4px;">&nbsp;</div></td>
                        <td style="border:1px solid #ccc;"><div style="padding:6px 4px;">&nbsp;</div></td>
                        <td style="border:1px solid #ccc;"><div style="padding:6px 4px;">&nbsp;</div></td>
                    </tr>
                    <tr>
                        <td style="border:1px solid #ccc;"><div style="padding:6px 4px;">&nbsp;</div></td>
                        <td style="border:1px solid #ccc;"><div style="padding:6px 4px;">&nbsp;</div></td>
                        <td style="border:1px solid #ccc;"><div style="padding:6px 4px;">&nbsp;</div></td>
                        <td style="border:1px solid #ccc;"><div style="padding:6px 4px;">&nbsp;</div></td>
                    </tr>
                    <tr>
                        <td style="border:1px solid #ccc;"><div style="padding:6px 4px;">&nbsp;</div></td>
                        <td style="border:1px solid #ccc;"><div style="padding:6px 4px;">&nbsp;</div></td>
                        <td style="border:1px solid #ccc;"><div style="padding:6px 4px;">&nbsp;</div></td>
                        <td style="border:1px solid #ccc;"><div style="padding:6px 4px;">&nbsp;</div></td>
                    </tr>
                    <tr>
                        <td style="border:1px solid #ccc;"><div style="padding:6px 4px;">&nbsp;</div></td>
                        <td style="border:1px solid #ccc;"><div style="padding:6px 4px;">&nbsp;</div></td>
                        <td style="border:1px solid #ccc;"><div style="padding:6px 4px;">&nbsp;</div></td>
                        <td style="border:1px solid #ccc;"><div style="padding:6px 4px;">&nbsp;</div></td>
                    </tr>
                    <tr>
                        <td style="border:1px solid #ccc;"><div style="padding:6px 4px;">&nbsp;</div></td>
                        <td style="border:1px solid #ccc;"><div style="padding:6px 4px;">&nbsp;</div></td>
                        <td style="border:1px solid #ccc;"><div style="padding:6px 4px;">&nbsp;</div></td>
                        <td style="border:1px solid #ccc;"><div style="padding:6px 4px;">&nbsp;</div></td>
                    </tr>
                    <tr>
                        <td style="border:1px solid #ccc;"><div style="padding:6px 4px;">&nbsp;</div></td>
                        <td style="border:1px solid #ccc;"><div style="padding:6px 4px;">&nbsp;</div></td>
                        <td style="border:1px solid #ccc;"><div style="padding:6px 4px;">&nbsp;</div></td>
                        <td style="border:1px solid #ccc;"><div style="padding:6px 4px;">&nbsp;</div></td>
                    </tr>
                    <tr>
                        <td style="border:1px solid #ccc;"><div style="padding:6px 4px;">&nbsp;</div></td>
                        <td style="border:1px solid #ccc;"><div style="padding:6px 4px;">&nbsp;</div></td>
                        <td style="border:1px solid #ccc;"><div style="padding:6px 4px;">&nbsp;</div></td>
                        <td style="border:1px solid #ccc;"><div style="padding:6px 4px;">&nbsp;</div></td>
                    </tr>
                    <tr>
                        <td style="border:1px solid #ccc;"><div style="padding:6px 4px;">&nbsp;</div></td>
                        <td style="border:1px solid #ccc;"><div style="padding:6px 4px;">&nbsp;</div></td>
                        <td style="border:1px solid #ccc;"><div style="padding:6px 4px;">&nbsp;</div></td>
                        <td style="border:1px solid #ccc;"><div style="padding:6px 4px;">&nbsp;</div></td>
                    </tr>
                    <tr>
                        <td style="border:1px solid #ccc;"><div style="padding:6px 4px;">&nbsp;</div></td>
                        <td style="border:1px solid #ccc;"><div style="padding:6px 4px;">&nbsp;</div></td>
                        <td style="border:1px solid #ccc;"><div style="padding:6px 4px;">&nbsp;</div></td>
                        <td style="border:1px solid #ccc;"><div style="padding:6px 4px;">&nbsp;</div></td>
                    </tr>
                </tbody>
            </table>
            <br />
            <p><b>* Cal pesar els productes indivisibles (p.e: carbasses, síndries, melons, formatges Cleda…) o pollastres i anotar el pes lliurat a cada CV al llistat de comandes-Recordeu que també cal al full de comandes si algú s’emporta algun producte que no havia demanat</b></p>
        </main>
    </div>
</body>



</html>
