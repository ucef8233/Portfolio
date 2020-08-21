<section id="propos" class="main__propos">
  <pre class="code__propos">
<code class="code">
<span class="code__ligne"><span class="code__braket1"></span></span>
<span class="code__ligne">  <span class="code__ligne--vide"> </span></span>
<span class="code__ligne">..<span class="code__var">Nom</span> <span class="code__value"><?= $infos[0]['nom'] ?></span> </span>
<span class="code__ligne">..<span class="code__var">Titre</span>  <span class="code__value"><?= $infos[0]['titre'] ?></span> </span>
<span class="code__ligne">..<span class="code__var">Email</span><span class="code__value"><?= $infos[0]['mail'] ?></span> </span>
<span class="code__ligne">..<span class="code__var">Adresse</span> <span class="code__value"><?= $infos[0]['adress'] ?></span> </span>
<span class="code__ligne">  <span class="code__ligne--vide"> </span></span>
<span class="code__ligne">..<span class="code__var">Mes expériences</span> <span class="code__braket1">   </span> </span>
<span class="code__ligne">  <span class="code__ligne--vide"> </span></span>
<?php
foreach ($experiances as $experiance) : ?>
<span class="code__ligne">....<span class="code__cle"><?= $experiance['date'] ?></span> <span class="code__value"><?= $experiance['description'] ?></span> </span>
<?php endforeach; ?>
<span class="code__ligne"><span class="code__braket2">    </span></span>
<span class="code__ligne">  <span class="code__ligne--vide"> </span></span>
<span class="code__ligne">..<span class="code__var">Competences_technique</span> [<?php
                                                                                  foreach ($langages as $langage) : ?>
<span class="code__value"><?= $langage['langage'] ?></span><?php endforeach; ?>] </span>
<span class="code__ligne">  <span class="code__ligne--vide"> </span></span>
<span class="code__ligne">..<span class="code__var">SoftSkils</span> [ </span>
<?php
foreach ($softskills as  $softskill) : ?>
<span class="code__ligne">....<span class="code__value"><?= $softskill['softskills'] ?></span> </span>
<?php endforeach; ?>
<span class="code__ligne">..]<span class="code__ligne--vide"> </span></span>
<span class="code__ligne">..<span class="code__var">Education</span> <span class="code__braket1"></span></span>
<span class="code__ligne">  <span class="code__ligne--vide"> </span></span>
<?php foreach ($etudes as  $etude) : ?>
<span class="code__ligne">....<span class="code__cle"><?= $etude['date'] ?></span> <span class="code__value"><?= $etude['description'] ?></span> </span>
<?php endforeach; ?>
<span class="code__ligne"><span class="code__braket2">   </span></span>
<span class="code__ligne"><span class="code__braket2"></span></span>
</code>
</pre>
</section>
</main>