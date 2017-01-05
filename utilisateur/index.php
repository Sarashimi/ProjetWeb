
<?php
include ('./lib/php/Jliste_include.php');
$db = connexion::getInstance($dsn, $user, $pass);
session_start();
$styles = array();
$i2 = 0;
foreach (glob('./admin/lib/css/*.css') as $css) {
    $styles[$i2] = $css;
    $i2++;
}
$scripts = array();
$i = 0;
foreach (glob('../admin/lib/js/jquery/*.js') as $js) {
    $fichierJs[$i] = $js;
    $i++;
}
?>

<html>
    <head>
        <meta charset="utf-8">
        <title> Piece pour tous </title>        
        <link rel="stylesheet" type="text/css" href="./admin/lib/css/bootstrap-3.3.5-dist/css/bootstrap.min.css"/>
        <link rel="stylesheet" type="text/css" href="./admin/lib/css/bootstrap-3.3.5-dist/css/bootstrap-theme.min.css"/>
        <?php
        foreach ($styles as $css) {
            ?><link rel="stylesheet" type="text/css" href="<?php print $css; ?>"/>
            <?php
        }
        ?>
        <link rel="stylesheet" type="text/css" href="../utilisateur/lib/css/p_style.css" />
        <link rel="stylesheet" type="text/css" href="../admin/lib/css/style_pc.css" />
        <link rel="stylesheet" type="text/css" href="../admin/lib/css/mediaqueries.css" />

        <?php
        foreach ($fichierJs as $js) {
            ?><script type="text/javascript" src="<?php print $js; ?>"></script>
            <?php
        }
        ?>
        <script type="text/javascript" src="../admin/lib/js/jquery/jquery-validation-1.13.1/dist/jquery.validate.js"></script>   
        <script type="text/javascript" src="../admin/lib/js/fonctionsJquery.js"></script>     

    </head>
    <body>

        <section id="all_all">
            <header>
                <img src="../admin/images/banniere.jpg" alt="Banniere" id="image_header"/>
            </header>
            <section id="exemple">
                <div class="exemple" id="ex2">
                    <ul class="nav">
                        <?php
                        if (file_exists('./lib/php/Jmenu.php')) {
                            include ('./lib/php/Jmenu.php');
                        }
                        ?>
                    </ul >
                </div>
            </section>
            <section id="all">
                <div class="exemple" id="ex2">
                    <?php
                    //arrivee sur le site 
                    if (!isset($_SESSION['page'])) {
                        $_SESSION['page'] = "accueil";
                    }  //choix parmi le menu
                    if (isset($_GET['page'])) {
                        $_SESSION['page'] = $_GET['page'];
                    }
                    $_SESSION['page'] = './pages/' . $_SESSION['page'] . '.php';
                    if (file_exists($_SESSION['page'])) {
                        include ($_SESSION['page']);
                    }
                    ?>
                </div>
            </section>
            <p id="face">
            <iframe src="http://www.facebook.com/plugins/like.php?href=http://www.example.com/page.html&layout=box_count&show_faces=true&width=65&action=like&font=arial&colorscheme=light&height=65" 
  scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:65px; height:65px; margin-top:3px;" allowTransparency="true"></iframe></p>
            <footer id="footerAc">
                Copyright 2016  bryan.gerin@condorcet.be
            </footer>
    </body>
</html>
