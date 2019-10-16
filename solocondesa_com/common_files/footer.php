<div class="footer">
<div class="fullcentre2">


<div class="footleft3">

  <div class="footergraphic4"><a href="<?php echo $globalpath;?>registrate/" title="Registrate" class="rollover6" alt="Registrate">Reg&iacute;strate</a><a href="<?php echo $globalpath;?>registrate/">Reg&iacute;strate<br />
Recibe información</a></div>
  
<div class="footergraphic1"><a href="<?php echo $globalpath;?>directorio/antro" title="Antros" class="rollover3" alt="Antros">Antros</a><a href="<?php echo $globalpath;?>directorio/antro">Antros</a></div>

<div class="footergraphic2"><a href="<?php echo $globalpath;?>directorio/bar" title="Bares" class="rollover4" alt="Bares">Bares</a><a href="<?php echo $globalpath;?>directorio/bar">Bares</a></div>

<div class="footergraphic3"><a href="http://www.facebook.com/pages/solocondesa/314496865099" title="Unete al Facebook" target="_blank" class="rollover5" alt="Unete al Facebook">&Uacute;nete al Facebook</a><a href="http://www.facebook.com/pages/solocondesa/314496865099" target="_blank">&Uacute;nete al Facebook</a></div>

<div class="footergraphic5"><a href="http://twitter.com/solocondesacom" title="Siguenos en TWITTER" target="_blank" class="rollover10" alt="Siguenos en TWITTER">S&iacute;guenos en TWITTER</a><a href="http://twitter.com/solocondesacom" target="_blank">S&iacute;guenos en TWITTER</a></div>

</div>





<div class="footleft1">
	<h3>Blog</h3>
	<div class="footerholder"> 
		<ul>
<?php foreach($_cats as $_cat):?>		
			<li><a href="<?php echo $globalpath;?>blog/<?php echo $_cat['permalink'];?>" title="<?php echo $_cat['categoria'];?>" alt="<?php echo $_cat['categoria'];?>"><?php echo $_cat['categoria'];?></a></li>
<?php endforeach;?>
		</ul>
	</div>
</div>

<div class="footleft1">
  <h3>Ligas r&aacute;pidas</h3>
  <div class="footerholder">
    <ul>
             
             
             <li><a href="<?php echo $globalpath;?>directorio/restaurante" title="Restaurantes"  >Restaurantes</a></li>
             <li><a href="<?php echo $globalpath;?>directorio/bar" title="Bares"  >Bares</a></li>
             
             
             <li><a href="http://sebastianaguilar.me/" target="_blank" >Sebastián Aguilar</a></li> &nbsp;

          	 <li><a href="http://www.harmonia.la" title="harmonia.la" target="_blank"  >Harmonia.la</a></li>
          
              <li><a href="http://www.amorplacerysexo.com" title="AmorPlacerySexo.com" target="_blank"  >AmorPlacerySexo.com</a></li>
              
             
             <li><a href="http://memes-sabiduria.com/" title="sangrepolitica.com" target="_blank"  >Memes-Sabiduria.com</a></li>
             
            
             
             
      </ul></div>
</div>



<div class="footleft2"><h3>&Uacute;ltimas entradas</h3>
<div class="footerholder2">

<?php foreach($_posts as $_gpost):?>
           <li><span class="one"> <?php echo getMonth($_gpost["mes"]);?> <?php echo $_gpost["dia"];?></span>
      <span class="two"><a href="<?php echo $globalpath;?>post/<?php echo $_gpost['permalink'];?>" title="<?php echo $_gpost["titulo"];?>"><?php echo $_gpost["titulo"];?></a></span></li>
<?php endforeach;?>
    <div class="clearer"></div></div>
</div>
<div class="clearer"></div></div>

<div class="topblack">
	<div class="center"><div class="smallogo"></div>
		<div class="copyleft">
			&copy; Solo Condesa. Insurgentes Sur 533<br />
	    Teléfono 55 40 43 54 92<br />
			Comunidad Virtual
		</div>
        
     
        
		<div style="float:right; height:65px; background-repeat:no-repeat;">
        
        <div style="float:left; display:none;">
        <a href="http://www.socialitemx.com" target="_blank">
        SocialiteMX.com
        </a>
        </div>
        
        <div style="float:left">
        <a href="http://www.codigoradio.cultura.df.gob.mx/" target="_blank">
        <img src="<?php echo $globalpath;?>alianzas/codigo_df.gif" width="165" height="36" alt="DeAntro" style="margin-top:10px;" />
        </a>   
        </div>
        
        <div style="clear:both;"></div>
             
        </div>
	</div>
	<div class="clearer"></div> <!-- center -->
</div><!-- closes topblack -->
</div><!-- closes footer -->