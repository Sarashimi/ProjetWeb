
<h2 id="titreA">Bienvenu sur "Piece pour tous" </h2>
<?php
$accueilManager = new AccueilManager($db);
$texteAcc = $accueilManager->getTexteAcc();


if (count($texteAcc) == 0) {
    echo "Rien";
} else {

    for ($i = 0; $i < count($texteAcc); $i++) {
        
    }
}
?>
&nbsp;
<div id="mot" class="up txtA">
    <?php
    for ($i = 0; $i < count($texteAcc); $i++) {
        print "<br/>";
        utf8_decode(print $texteAcc[$i]->mot);
        print "<br/>";
    }
    ?>
</div>


<p><span class="txtSa"> Nous ferons tout pour satisfaire votre demande. </span>
</p>
<?php
?>

<section id="avertisst">    
    Nous ne reprenons aucun article déballé !!  
</section>
<input type="button" id="cacher" value="Cacher l'avertissement"/>

