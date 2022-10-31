<?php

include "Animal.php";

$hewan = new Animal();

echo 'Index - Menampilkan Seluruh Hewan <br>';
echo $hewan->index();
echo "<br />";

echo 'Store - Menambahkan Hewan Baru (Singa) <br>';
echo $hewan->store('Singa');
echo $hewan->index();
echo "<br />";

echo 'Update - Mengupdate Hewan <br>';
echo $hewan->update(1, 'Kura-Kura');
echo $hewan->index();
echo "<br />";

echo 'Destroy - Menghapus Hewan <br>';
echo $hewan->destroy(0);
echo $hewan->index();
echo "<br />";