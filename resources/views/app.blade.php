<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Jeune-info</title>
  <link rel="stylesheet" href="{{ asset('css/template/app.css') }}">

</head>
<body>
  <section class="page">
    <!-- Barre de navigation -->
    <nav>
      <div class="onglets">
        <a href="/" class="active">Actualités</a>
        <a href="/nos-produits">Nos produits</a>
        <a href="#">Nous contacter</a>
      </div>

      <div class="buttons">
        <a href="/login"><button class="login">J'ai déjà un compte</button></a>
        <a href="/register"><button class="register">S'enregistrer</button></a>

      </div>

    </nav>
    <!-- Fin de la barre de navigation -->

    <!-- Header -->
    <header>
      <h1>Jeunesse, laissez-nous occupez de tout</h1>
    </header>
    <!-- Fin du header -->

    <!-- Informations -->

    <!-- Fin des informations -->
  </section>

  <div class="main">
      {{-- <div class="container">
        <p>
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas vel nulla orci. Sed tristique sollicitudin neque, et condimentum tellus accumsan ac. Duis in nisl vel elit semper molestie sed at dui. Etiam non justo aliquet, interdum felis sed, pulvinar turpis. Maecenas iaculis, massa eu pulvinar vulputate, mi sem elementum odio, sed volutpat erat diam condimentum nisi. Integer aliquet lectus eu sem dignissim commodo. Cras vitae augue ut ipsum cursus rhoncus quis eu purus. Quisque bibendum nunc turpis, sit amet ultrices erat congue ut. In rhoncus tristique leo a feugiat. Etiam dignissim justo at urna porta venenatis. Nulla posuere ipsum lacus, nec accumsan tortor rutrum in. Sed eget scelerisque felis. Pellentesque vitae turpis ante. Suspendisse potenti.

            Curabitur sem sem, euismod ut convallis non, maximus nec tortor. In scelerisque nisi ipsum, eget placerat ante feugiat in. Nullam nec diam sagittis, hendrerit nulla eget, congue nisi. Nam malesuada metus vel eleifend laoreet. Donec tristique metus eu ex mattis sodales. In ornare suscipit euismod. Phasellus ut ultrices nibh, vel viverra ex. Nulla convallis luctus tortor. Etiam nec suscipit enim. Sed mollis lacinia scelerisque. Curabitur auctor vel arcu at cursus. Aliquam vitae ligula libero. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; In hac habitasse platea dictumst.

            Vestibulum sit amet porta nisl. Fusce euismod ornare fermentum. Sed vehicula sapien sed mattis convallis. Donec sit amet sem ut felis mattis pharetra et sollicitudin metus. Suspendisse ullamcorper enim eget auctor volutpat. Suspendisse laoreet tortor nec scelerisque porta. Nulla facilisi. In fermentum felis vitae odio congue sagittis ut nec odio. Aenean mattis augue id finibus tristique. Vestibulum tincidunt consequat congue. Aliquam ullamcorper ultricies fermentum. Morbi venenatis dignissim est. Donec et elementum risus. Nulla vel est quis mi interdum elementum.
          </p>
      </div> --}}
      @yield('content')
  </div>

  <!-- Pied de page -->
  <footer>
      <h5>Des questions ? Appelez le (+261) 34 73 124 42</h5>
      <div class="colonnes">
        <div class="colonne">
          <p>Relations clients</p>
          <p>Relations Investisseurs</p>
          <p>Modes de lecture</p>
          <p>Mentions légales</p>
        </div>
        <div class="colonne">
          <p>Centre d'aide</p>
          <p>Les meilleurs graphistes</p>
          <p>Entreprise mondiale</p>
          <p>Chiffre d'affaire</p>
          <p>Les meilleurs peintres</p>
        </div>
        <div class="colonne">
          <p>FAQ</p>
          <p>Recrutement</p>
          <p>Conditions d'utilisation</p>
          <p>Nous contacter</p>
        </div>
        <div class="colonne">
          <p>Compte</p>
          <p>S'enregistrer</p>
          <p>Se connecter</p>
          <p>Nous contacter</p>
        </div>
      </div>
      <p>Fenohery Manjaka</p>
    </footer>
  <!-- Fin du pied de page -->
</body>
</html>
