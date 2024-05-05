<?php
require '../prolog.php';
require INC . '/base_html.php';
require INC . '/nav_bar.php';
require INC . '/boxes.php';
require INC . '/xmlTools.php';
?>
<h1>Přidávání filmů</h1>

<div class="d-flex justify-content-center m-3">
    <form class="bg-light border rounded p-3 mb-4" enctype="multipart/form-data" method="POST">
        <div class="mb-5">
            Nahrajte Váš oblíbený film:
        </div>
        <div class="mb-3">
            <input title="tt" id="fileInput" name="xml" type="file" accept="text/xml" data-max-file-size="2M" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Odeslat</button>
    </form>
</div>

<?php

if (($xmlFile = @$_FILES['xml']) && ($tmpName = @$xmlFile['tmp_name'])) {
    $isValid = xmlValidate($tmpName, XML . '/film.xsd');
    if (!$isValid)
        errorBox('XML soubor není validní.');
    else {
        $film = $xmlFile['name'];
        $target = FILMS . "/$film";
        if (file_exists($target))
            errorBox('Film už máme v evidenci!.');
        elseif (rename($tmpName, $target))
            successBox("OK -/$film - nahráno");

    }
}