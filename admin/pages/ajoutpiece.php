<?php
require './lib/php/verifier_connexion.php'; 
?>
<h2>Ajouter une piece</h2>

<?php

if(isset($_GET['submit_piece'])) {
    extract($_GET,EXTR_OVERWRITE);
    if(trim($Titre_piece)!='' && trim($Prix_piece)!='') {
        $mg2 = new AjoutPieceManager($db);
        $retour = $mg2->addpiece($_GET);
        if($retour==1){
            $texte="<span class='txtGras'>Votre demande a bien été enregistrée.<br /></span>";
        }
        else if ($retour==2) {
            $texte="<span class='txtGras'>Déjà dans la base de données</span>";
        }    
        if(isset($_SESSION['form'])) {unset($_SESSION['form']);}                
    }
    else {
        $texte="Complétez tous les champs.";
        if(trim($Titre_piece)!='') {$_SESSION['form']['Titre_piece']=$Titre_piece;}
        if(trim($Prix_piece)!='') {$_SESSION['form']['Prix_piece']=$Prix_piece;}
    }
}
?>
<img src="../admin/images/pieces.jpg" alt="Image de piece" />
&nbsp;
<!--creer une table contact afin de mettre ces données dans la DB ?-->
<section id="resultat" class="txtGreen"><?php if(isset($texte)) print $texte; ?></section>
<section id="leform">
    <form id="form_ajout_piece" action="<?php print $_SERVER['PHP_SELF'];?>" method="get">
        <fieldset id="Client">
        <legend class="txtMauv txtGras">Renseignements sur la piece : </legend>
        <table>
            
           <tr>
                <td>Titre : </td>
                <td>
                    <?php if(isset($_SESSION['form']['Titre_piece'])) { ?>
                    <input type="text" name="Titre_piece" id="Titre_piece" value="<?php print $_SESSION['form']['nom_client'];?>"/>
                    <?php
                    }
                    else{
                         ?>
                        <input type="text" name="Titre_piece" id="Titre_piece" placeholder="Titre de la piece" required/>
                        <?php
                    }
                    ?> <div id="error"></div>
                </td>
            </tr>
          
            <tr>
                <td>Prix : </td>
                <td>
                     <?php if(isset($_SESSION['form']['Prix_piece'])) { ?>
                    <input type="number" step="0.01" min="0" name="Prix_piece" id="Prix_piece" value="<?php print $_SESSION['form']['Prix_piece'];?>"/>
                     <?php
                    }
                    else{
                         ?>
                        <input type="number" step="0.01" min="0" name="Prix_piece" id="Prix_piece" placeholder="Prix de la piece" required/>
                        <?php
                    }
                    ?> <div id="error"></div>
                </td>
            </tr>
            <?php
                $aj=new AjoutPieceManager($db);
                $idfab=$aj->getFabId();
                $fab=$aj->getFabricant();
                $idcat=$aj->getCategId();
                $cat=$aj->getCateg();
                $idmach=$aj->getMachineId();
                $mach=$aj->getMachine();
            ?>
            <tr>
                <td>Fabricant :  </td>
                <td><select name="Fabricant_piece">
                        <?php
                            for($i=0;$i<count($idfab);$i++)
                            {
                                $var = $idfab[$i]->idfab;
                                $var2 = $fab[$i]->nomfab;
                                print "<option value={$var}>{$var2}</option>";
                            }
                        ?>
                    <!--rajouter les fabricants de la base de donnee-->
                    </select></td>
            </tr>
            
            <tr>
                <td>Catégorie : </td>
                <td><select name="Categorie_piece">
                        <?php
                            for($i=0;$i<count($idcat);$i++)
                            {
                                $var = $idcat[$i]->idcat;
                                $var2 = $cat[$i]->genre;  
                                echo "<option value={$var}>{$var2}</option>";
                            }
                        ?>
                    <!--rajouter les Categorie de la base de donnee-->
                    </select></td>									
            </tr>				

             <tr>
                <td>Machine : </td>
                <td><select name="Machine_piece">
                        <?php
                            for($i=0;$i<count($idmach);$i++)
                            {
                                $var=$idmach[$i]->idmachine;
                                $var2=$mach[$i]->nommachine;
                                echo "<option value={$var}>{$var2}</option>";
                            }
                        ?>
                    <!--rajouter les machines de la base de donnee-->
                    </select></td>									
            </tr>	
            
            <tr>
                <td colspan="2">
                <input type="submit" name="submit_piece" id="submit_piece" value="Cliquez ici pour ajouter une piece" />
                &nbsp;&nbsp;&nbsp;
                <input type="reset" id="reset" value="Réinitialiser le formulaire" />
                </td>
            </tr>
        </table>
        </fieldset>
    </form>
</section>
