<?php
$class = ($name === $currentCategory) ? 'bg-dark text-light' : 'bg-light text-dark';
?>

<a href="<?= $link ?>"
  class="inline-block py-1.5  md:py-2 px-6  md:px-10   rounded-full border-2 border-solid border-dark hover:scale-105 transition-all ease duration-200 m-2 <?= $class ?>">
  #<?= $name ?></a>
