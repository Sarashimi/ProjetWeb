<?php
require './lib/php/verifier_connexion.php'; 
?>
<h2>Ajouter un fabricant</h2>

<?php

if(isset($_GET['submit_fab'])) {
    
    extract($_GET,EXTR_OVERWRITE);
    if( trim($Nom_fab)!='' && trim($Pays_fab)!='') {
        $mg2 = new AjoutFabManager($db);
        $retour = $mg2->addFab($_GET);
        if($retour==1){
            $texte="<span class='txtGras'>Fabricant bien ajouté !<br /></span>";
        }
        else if ($retour==2) {
            $texte="<span class='txtGras'>Déjà dans la base de données</span>";
        }    
        if(isset($_SESSION['form'])) {unset($_SESSION['form']);}                
    }
    else {
        $texte="Complétez tous les champs.";
        if(trim($Nom_fab)!='') {$_SESSION['form']['Nom_fab']=$Nom_fab;}
        if(trim($Pays_fab)!='') {$_SESSION['form']['Pays_fab']=$Pays_fab;}
    }
}
?>


<img src="../admin/images/ajoutFabAdmin.jpg" alt="Image de fabricant" />
&nbsp;
<section id="resultat" class="txtGreen"><?php if(isset($texte)) print $texte; ?></section>
<!--creer une table contact afin de mettre ces données dans la DB ?-->
<section id="leform">
    <form id="form_ajout_fab" action="<?php print $_SERVER['PHP_SELF'];?>" method="get">
        <fieldset id="Fab">
        <legend class="txtMauv txtGras">Renseignements sur le fabricant : </legend>
        <table>
            <tr>
                <td>Nom du fabricant : </td>
                <td>
                    <?php if(isset($_SESSION['form']['Nom_fab'])) { ?>
                        <input type="text" name="Nom_fab" id="Nom_fab" value="<?php print $_SESSION['form']['Nom_fab'];?>"/>
                    <?php
                    }
                    else {
                        ?>
                        <input type="text" name="Nom_fab" id="Nom_fab" placeholder="Nom du fabricant" required/>
                        <?php
                    }
                    ?>
                        <div id="error"></div>
                </td>
            </tr>
          
            <tr>
                <td>Pays du fabricant : </td>
                <td><?php if(isset($_SESSION['form']['Pays_fab'])) { ?>
                        <input type="text" name="Pays_fab" id="Pays_fab" value="<?php print $_SESSION['form']['Pays_fab'];?>"/>
                    <?php
                    }
                    else {
                        ?>
                        <input type="text" name="Pays_fab" id="Pays_fab" placeholder="Pays du fabricant" required/>
                        <?php
                    }
                    ?>
                        <div id="error"></div>
                </td>
            </tr>
            
                       
            <tr>
                <td colspan="2">
                <input type="submit" name="submit_fab" id="submit_reserv" value="Cliquez ici pour ajouter un fabricant" />
                &nbsp;&nbsp;&nbsp;
                <input type="reset" id="reset" value="R&eacute;initialiser le formulaire" />
                </td>
            </tr>
        </table>
        </fieldset>
    </form>
</section>