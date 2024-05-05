<?php

require '../prolog.php';
require INC . '/database_connection.php';
require INC . '/base_html.php';

switch (@$_POST['akce']) {
    case 'login':
        if (authUser($jmeno = @$_POST['jmeno'], @$_POST['heslo']))
            setJmeno($jmeno);
            $_SESSION['LoginTITLE'] = 'Profil';
        break;

    case 'logout':
        setJmeno();
        $_SESSION['LoginTITLE'] = 'Přihlaste se ';
        break;
}

// nav až po nastavení jména, aby se zobrazilo
require INC . '/nav_bar.php';

?>

<script>
    function onSubmit(e) {
        // no default submit
        e.preventDefault()

        <?php if (!isUser()) { ?>
            // inputs
            let { jmeno, heslo } = this.elements

            // trim and check
            if ((jmeno.value = jmeno.value.trim()).length < 3) {
                alert('Jméno je krátké')
                return
            }

            // trim and check
            if ('heslo' == (heslo.value = heslo.value.trim())) {
                alert('Heslo nesmí být "heslo"')
                return
            }
        <?php } ?>

        // continue to submit
        this.submit()
    }
</script>

<div class="container my-3">
    <form name="loginForm" class="bg-light p-4 rounded shadow" method="POST">
        <input type="hidden" name="akce" value="<?= isUser() ? 'logout' : 'login' ?>">

        <!-- Only show the login fields if the user is not logged in -->
        <?php if (!isUser()) { ?>
            <h4 class="mb-3">Přihlaste se!</h4>
            <div class="mb-3">
                <input class="form-control" name="jmeno" type="text" placeholder="jméno" required>
            </div>
            <div class="mb-3">
                <input class="form-control" name="heslo" type="password" placeholder="heslo" required>
            </div>
        <?php } ?>

        <!-- Submit button -->
        <button type="submit" class="btn btn-primary">
            <?= isUser() ? 'Odhlásit' : 'Přihlásit' ?>
        </button>
    </form>
</div>

<script>
    document.loginForm.addEventListener('submit', onSubmit)
</script>
