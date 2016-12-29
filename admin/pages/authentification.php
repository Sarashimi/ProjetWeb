<?php
if (isset($_POST['submit_login'])) {
    $mg = new SeConnecter($db);
    $retour = $mg->estAdmin($_POST['login'], $_POST['password']);
    if ($retour == 1) {
        $_SESSION['admin'] = 1;
        $message = "Authentifié!";
        header('Location: http://localhost/ProjetWebFinal2/admin/index.php');
    } else {
        $message = $retour;
        $message = "Données non connues de notre systeme. Pour nous contacter passé par le formulaire contact en cliquant sur 'Annuler'";
    }
}
?>
<section id="message"><?php if (isset($message)) print $message; ?></section>
<fieldset id="fieldset_login">
    <legend class="txtAuth">Authentifiez-vous</legend>
    <form action="<?php print $_SERVER['PHP_SELF']; ?>" method='post' id="form_auth">
        <table class='tabAuth'>
            <tr>
                <td id="auth">Login </td>
                <td><input type="text" id="login" name="login" /></td>
            </tr>
            <tr>
                <td id="auth">Password </td>
                <td><input type="password" id="password" name="password" /></td>
            </tr>
            <tr>
                <td colspan="2" class='bAth'>
                    <input type="submit" name="submit_login" id="submit_login" value="Login" />
                    <input type="reset" id="annuler" value="Annuler" />
                </td>	
            </tr>
        </table>	
    </form>
</fieldset>


