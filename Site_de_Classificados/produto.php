<?php require "pages/header.php"; ?>
<?php
require_once "classes/anuncios.class.php";
require_once "classes/usuarios.class.php";

if (isset($_GET["id"]) && !empty($_GET["id"])) {
    $a = new Anuncios();
    $id = addslashes($_GET["id"]);
    $info = $a->getAnuncio($id);
} else {
?>
    <script type="text/javascript">
        window.location.href = "index.php";
    </script>
<?php
    exit;
}

?>
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-4">
            <div class="carousel slide" data-ride="carousel" id="meuCarousel">
                <div class="carousel-inner" role="listbox">
                    <?php foreach ($info["fotos"] as $chave => $foto) : ?>
                        <div class="item <?php echo ($chave == '0') ? 'active' : ''; ?>">
                            <img src="assets/images/anuncios/<?php echo $foto["url"]; ?>" alt="">
                        </div>
                    <?php endforeach; ?>
                </div>
                <a class="left carousel-control" href="#meuCarousel" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="right carousel-control" href="#meuCarousel" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
        <div class="col-sm-8">
            ...
        </div>
    </div>
</div>
<?php require "pages/footer.php"; ?>

<!-- CONTINUAR NO MINUTO 7:38 -->