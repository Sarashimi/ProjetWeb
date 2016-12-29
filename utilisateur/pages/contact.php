<h2 id="titre_page"> Pour nous contacter </h2>
<h3 class="titreContact"> Complétez ce formulaire </h3>

<?php
if (isset($_GET['submit_reserv'])) {
    extract($_GET, EXTR_OVERWRITE);
    if (trim($type) != '' && trim($nom_client) != '' && trim($pren_client) != '' && trim($comm_client) != '' && trim($email) != '') {
        $mg2 = new contactManager($db);
        $retour = $mg2->addContact($_GET);
        if ($retour == 1) {
            $texte = "<span class='txtGras'>Demande enregistrée.<br />Réponse dans les plus bref délais.</span>";
        }
        if (isset($_SESSION['form'])) {
            unset($_SESSION['form']);
        }
    } else {
        $texte = "Complétez tous les champs.";
        if (trim($type) != '') {
            $_SESSION['form']['type'] = $type;
        }
        if (trim($nom_client) != '') {
            $_SESSION['form']['nom_client'] = $nom_client;
        }
        if (trim($pren_client) != '') {
            $_SESSION['form']['pren_client'] = $pren_client;
        }
        if (trim($comm_client) != '') {
            $_SESSION['form']['comm_client'] = $comm_client;
        }
        if (trim($email) != '') {
            $_SESSION['form']['email'] = $email;
        }
    }
}
?>
<img src="../admin/images/banniereContact.jpg" alt="Image de contact" />

<section id="resultat"><?php if (isset($texte)) print $texte; ?></section>
<section id="leform">
    <form id="form_contact" action="<?php print $_SERVER['PHP_SELF']; ?>" method="get">
        <fieldset id="Client">
            <legend class="txtContact txtGras">Renseignements</legend>
            <table id="tabContact">
                <tr>
                    <td>Votre sexe</td>
                    <td>Monsieur  <input type="radio" name="type" id="Homme" value="Homme" />                   
                        &nbsp;&nbsp;&nbsp;Madame
                        <input type="radio" name="type" id="Femme" value="Femme"/>                     
                    </td>
                </tr>
                <tr>
                <tr>
                    <td>Votre nom</td>
                    <td>
                        <?php if (isset($_SESSION['form']['nom_client'])) { ?>
                            <input type="text" name="nom_client" id="nom_client" value="<?php print $_SESSION['form']['nom_client']; ?>"/>
                            <?php
                        } else {
                            ?>
                            <input type="text" name="nom_client" id="nom_client" placeholder="Nom" required/>
                            <?php
                        }
                        ?>
         
                    </td>
                </tr>
                <tr>
                    <td>Votre prénom</td>
                    <td>
                        <?php if (isset($_SESSION['form']['pren_client'])) { ?>
                            <input type="text" name="pren_client" id="pren_client" value="<?php print $_SESSION['form']['pren_client']; ?>"/>
                            <?php
                        } else {
                            ?>
                            <input type="text" name="pren_client" id="pren_client" placeholder="Prénom" required/>
                            <?php
                        }
                        ?>
                  
                    </td>
                </tr>
                <tr>
                    <td>Votre commentaire</td>
                    <td>
                        <?php if (isset($_SESSION['form']['comm_client'])) { ?>
                            <textarea name="comm_client" id="comm_client" rows="5" cols="22" value="<?php print $_SESSION['form']['comm_client']; ?>"></textarea>
                            <?php
                        } else {
                            ?>
                            <textarea name="comm_client" id="comm_client" rows="5" cols="22" placeholder="Commentaire" required/> </textarea>
                            <?php
                        }
                        ?>
                   
                    </td>
                </tr>
                <tr>
                    <td>Votre mail</td>
                    <td>
                        <?php if (isset($_SESSION['form']['email'])) { ?>
                            <input type="email" name="email" id="email" value="<?php print $_SESSION['form']['email']; ?>"/>
                            <?php
                        } else {
                            ?>
                            <input type="email" name="email" id="email" placeholder="Email"/>
                            <?php
                        }
                        ?>
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit_reserv" id="submit_reserv" value="Envoyer" />
                        &nbsp;&nbsp;&nbsp;
                        <input type="reset" id="reset" value="Remise à zéro du formulaire" />
                    </td>
                </tr>

            </table>
        </fieldset>
    </form>
</section>