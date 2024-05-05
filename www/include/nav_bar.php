<!-- Není responzinví! - dodělat -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="index.php"><?=TITLE?></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
      </li>

      <?php if (isUser()) { ?>
        <li class="nav-item">
            <a class="nav-link" href="insert_film.php">Přidej film</a>  <!-- Stránka pro insertování filmů |  POKUD JE LOGGED! -->
        </li>
      <?php } ?>
      
      <li class="nav-item">
        <a class="nav-link" href="login.php"><?=$_SESSION['LoginTITLE']?></a>  <!-- Login stránka -->
      </li>
    </ul>
  </div>
  <div class="navbar-nav ml-auto">
    <a class="nav-link" href="login.php"><?=getJmeno('Uživatel: ')?></a>  <!-- Stránka pro insertování filmů |  POKUD JE LOGGED! -->
  </div>

</nav>
