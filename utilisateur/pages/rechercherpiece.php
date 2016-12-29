<h2 id="titre_page"> Rechercher une piece</h2>

<?php

if(isset($_POST['submit_rech'])) {
    echo 'dans le get appui bouton';
    extract($_GET,EXTR_OVERWRITE);
    $r= new rechmanager($db);
	if(trim($titre)!='' && trim($genre)!='' && trim($fab)!=''){
		$cat=$r->getpieceall($titre, $genre, $fab);
	}
	else if(trim($titre)!='' && trim($genre)!=''){
		$cat=$r->getpiecetc($titre, $genre);
	}
	else if(trim($titre)!='' && trim($fab)!=''){
		$cat=$r->getpiecetd($titre, $fab);
	}
	else if(trim($genre)!='' && trim($fab)!=''){
		$cat=$r->getpiececd($cat, $genre);
	}
	else if(trim($titre)!=''){
		$cat=$r->getpiecet($titre);
	}
	else if(trim($genre)!=''){
		$cat=$r->getpiecec($genre);
	}
	else if(trim($fab)!=''){
		$cat=$r->getpieced($fab);
	}
	
}

?><?php
if(isset($_GET['submitcatalogue'])) {
    extract($_GET,EXTR_OVERWRITE);
      if(trim($id_client)!='')
	  {	  
            $mg2 = new achatManager($db);
            $retour = $mg2->getAchat($_GET);  
            if($retour==1)
            {
                $texte="<span class='txtGras'>Votre demande a bien été enregistrée</span>";
            }
			if(isset($_SESSION['form'])) {unset($_SESSION['form']);}
            else
            {
                $texte="Complétez tous les champs.";
                if(trim($id_client)!='') {$_SESSION['form']['id_client']=$id_client;}
                
            }
        }
    }

if(isset($cat)){ ?>
<form id="formachat" action="<?php print $_SERVER['PHP_SELF'];?>" method="get">
<table>
     <tr>
                <td>Votre ID : </td>
                <td>
                    <?php if(isset($_SESSION['form']['id_client'])) { ?>
                        <input type="text" name="id_client" id="id_client" value="<?php print $_SESSION['form']['id_client'];?>"/>
                    <?php
                    }
                    else {
                        ?>
                        <input type="text" name="id_client" id="id_client" placeholder="Votre identifiant" required/>
                        <?php
                    }
                    ?>
                        <div id="error"></div>
                </td>
            </tr>
<tr><td>Titre</td><td>Prix</td><td>Genre</td><td>Fabricant</td><td>Machine</td><td>Commander</td></tr>
<?php
    for($i=0;$i<count($cat);$i++)
    {
        $titre=$cat[$i]->titre;
        $prix=$cat[$i]->prix;
        $cat2=$cat[$i]->cat;
        $fab=$cat[$i]->fab;
        $mach=$cat[$i]->mac;
        $idp=$cat[$i]->idpiece;
        $nom="achat";
        $id="cc";
        $ty="radio";
        print "<tr><td>{$titre}</td><td>{$prix}</td><td>{$cat2}</td><td>{$fab}</td><td>{$mach}</td><td><input type={$ty} name={$nom} id={$id} value={$idp}/></td></tr>";
    }
?>
<tr> 
    <td></td><td></td><td></td><td></td><td></td><td></td>  <td colspan="2">
                    
<input type="submit" name="submitcatalogue" id="submitcatalogue" value="Acheter"/>
<!--<input type="hidden" name="hd" id="hd" value="hd"/>-->
                &nbsp;&nbsp;&nbsp;
                </td>
            </tr>

</table>
</form>
<?php } ?>
<?php if (!isset($cat)){ ?>
    <form id="form_rech" action="<?php print $_SERVER['PHP_SELF'];?>" method="get">
        <fieldset id="recherche">
        <legend class="txtMauv txtGras">Rechercher par: </legend>
        <table>
		    <tr>
                <td>Titre: </td>
                <td><?php if(isset($_SESSION['form']['titre'])) { ?>
                        <input type="text" name="titre" id="titre" value="<?php print $_SESSION['form']['titre'];?>"/>
                    <?php
                    }
                    else {
                        ?>
                        <input type="text" name="titre" id="titre" placeholder="Titre"/>
                        <?php
                    }
                    ?>
                        <div id="error"></div>
					</td>
            </tr>
            <tr>
            <tr>
                <td>Genre: </td>
                <td>
                    <?php if(isset($_SESSION['form']['genre'])) { ?>
                        <input type="text" name="genre" id="genre" value="<?php print $_SESSION['form']['genre'];?>"/>
                    <?php
                    }
                    else {
                        ?>
                        <input type="text" name="genre" id="genre" placeholder="Genre"/>
                        <?php
                    }
                    ?>
                        <div id="error"></div>
                </td>
            </tr>
			<tr>
                <td>Fabricant : </td>
                <td>
                    <?php if(isset($_SESSION['form']['fab'])) { ?>
                        <input type="text" name="fab" id="fab" value="<?php print $_SESSION['form']['fab'];?>"/>
                    <?php
                    }
                    else {
                        ?>
                        <input type="text" name="fab" id="fab" placeholder="Fabricant"/>
                        <?php
                    }
                    ?>
                        <div id="error"></div>
                </td>
            </tr>
            </tr>

            <tr>
                <td colspan="2">
                <input type="submit" name="submit_rech" id="submit_rech" value="Envoyer la demande" />
                &nbsp;&nbsp;&nbsp;
                <input type="reset" id="reset" value="Réinitialiser le formulaire" />
                </td>
            </tr>
            
        </table>
        </fieldset>
    </form>
<?php } ?>
<section id="resultat" class="txtGreen"><?php if(isset($q)) print $q; ?></section>
