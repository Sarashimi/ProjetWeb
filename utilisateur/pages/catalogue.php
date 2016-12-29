<h2 id="titre_page"> Catalogue </h2>
<?php
if (isset($_GET['submitcatalogue'])) {
    extract($_GET, EXTR_OVERWRITE);
    echo 'id_client : + $id_client + achat: + $achat';
    if (trim($id_client) != '') {
        $mg2 = new achatManager($db);
        $retour = $mg2->getAchat($_GET);
        if ($retour == 1) {
            $texte = "<span class='txtC'>Demande enregistrée.</span>";
        }
        if (isset($_SESSION['form'])) {
            unset($_SESSION['form']);
        } else {
            $texte = "Complétez tous les champs.";
            if (trim($id_client) != '') {
                $_SESSION['form']['id_client'] = $id_client;
            }
        }
    }
}
?>
<section id="resultat"><?php if (isset($texte)) print $texte; ?></section>
<form id="formachat" action="<?php print $_SERVER['PHP_SELF']; ?>" method="get">
    <table class='tabC'>
        <tr>
            <?php
            $cm = new catManager($db);
            $cat = $cm->getCat($_GET);
            ?>
            <td>
                <?php if (isset($_SESSION['form']['id_client'])) { ?>
                    <input type="text" name="id_client" id="id_client" value="<?php print $_SESSION['form']['id_client']; ?>"/>
                    <?php
                } else {
                    ?>
                    <input type="text" name="id_client" id="id_client" placeholder="Votre identifiant" required/>
                    <?php
                }
                ?>
            </td>
        </tr>

        <tr><td id="tabCat">Titre</td><td id="tabCat">Prix</td><td id="tabCat">Genre</td><td id="tabCat">Fabricant</td><td id="tabCat">Machine</td><td id="tabCat">Commander</td></tr>
        <?php
        for ($i = 0; $i < count($cat); $i++) {
            $titre = $cat[$i]->titre;
            $prix = $cat[$i]->prix;
            $cat2 = $cat[$i]->cat;
            $fab = $cat[$i]->fab;
            $mach = $cat[$i]->mach;
            $idp = $cat[$i]->idpiece;
            $nom = "achat";
            $id = "cc";
            $ty = "radio";
            print "<tr><td id='tabCat'>{$titre}</td><td id='tabCat'>{$prix}</td><td id='tabCat'>{$cat2}</td><td id='tabCat'>{$fab}</td><td id='tabCat'>{$mach}</td><td id='tabCat'><input type={$ty} name={$nom} id={$id} value={$idp}/></td></tr>";
        }
        ?>
        <tr> 
            <td></td><td></td><td></td><td></td><td></td><td></td>  <td colspan="2">

                <input type="submit" name="submitcatalogue" id="submitcatalogue" value="Acheter"/>
                &nbsp;&nbsp;&nbsp;
            </td>
        </tr>
        <a id='pdf' href="index.php?page=printcat">Cliquez ici pour le PDF du catalogue</a>
    </table>
</form>
