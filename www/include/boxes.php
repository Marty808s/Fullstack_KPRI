<?php
// pro zobrazení chyby
function errorBox($text)
{ ?>
    <div class="alert alert-danger m-3">
        <?= $text ?>
    </div>
<?php }

// pro zobrazení úspěchu
function successBox($text)
{ ?>
    <div class="alert alert-success m-3">
        <?= $text ?>
    </div>
<?php }