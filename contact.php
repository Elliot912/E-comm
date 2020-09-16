<?php

// include 'nav.phtml';

 ?>


<h1 class="title-formulaire">Nous contacter</h1>

<form class="generic-form" method="post">
  <fieldset>
    <label for="title">Formulaire de contact</label>
    <br>
    <label>Renseignez votre prénom</label>
    <input type="text" name="prenom" placeholder="Votre prénom" required>
    <br>
    <label>Renseignez votre nom</label>
    <input type="text" name="nom" placeholder="Votre nom" required>

    <br>
    <label>Votre email</label>
    <input type="email" name="email" placeholder="Votre mail" required>

    <br>
    <label>Votre requette</label>
    <br>
    <textarea name="message" placeholder="Votre question/demande" required></textarea>
    <input type="submit" value="OK">
  </fieldset>
</form>
