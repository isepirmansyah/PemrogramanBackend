<?php
class Hewan
{
    public $hewan;

    public function __construct($data = array('Kelinci', 'Ikan', 'Sapi'))
    {
        $this->hewan = $data;
    }

    public function index()
    {
        foreach ($this->hewan as $hw) {
            echo $hw . "</br>";
        }
    }

    public function store($data)
    {
        array_push($this->hewan, $data);
    }

    public function update($index, $data)
    {
        $this->hewan[$index] = $data;
    }

    public function destroy($index)
    {
        unset($this->hewan[$index]);
    }
}

$hewan = new Hewan();

echo 'Index - Menampilkan Seluruh Hewan <br>';
echo $hewan->index();
echo "<br />";

echo 'Store - Menambahkan Hewan Baru (Singa) <br>';
echo $hewan->store('Burung');
echo $hewan->index();
echo "<br />";

echo 'Update - Mengupdate Hewan <br>';
echo $hewan->update(1, 'Gajah');
echo $hewan->index();
echo "<br />";

echo 'Destroy - Menghapus Hewan <br>';
echo $hewan->destroy(0);
echo $hewan->index();
echo "<br />";