<?php

$_db_ = mysqli_connect("database","admin","heslo","film_cave");

function dbQuery(string $query): bool|mysqli_result
{
    global $_db_;
    return @$_db_->query($query);
}

// bezpečné uzavření řetězu do uvozovek pro SQL
function dbEscape(string $s): string
{
    global $_db_;
    return "'" . mysqli_real_escape_string($_db_, $s) . "'";
}

// autentikace uživatele
function authUser(string $jmeno, string $heslo): bool
{
    $jmeno = dbEscape($jmeno);
    $heslo = dbEscape($heslo);

    if ($result = dbQuery("select id from uzivatele where jmeno=$jmeno and heslo=$heslo")) {
        if ($result->num_rows) {
            // fetch_all() vrací pole polí (řádky, a každá má políčka)
            // [[$id]] je dekonstrukce: vezme první hodnotu z první řádky
            [[$id]] = $result->fetch_all();
            if ($id)
                return true;
        }
    }

    return false;
}