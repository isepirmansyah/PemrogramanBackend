<?php
class Animal
{
    public $hewan;

    public function __construct($data = array('Ayam', 'Ikan', 'Kucing'))
    {
        $this->hewan = $data;
    }

    public function index()
    {
        foreach ($this->hewan as $hw) {
            echo "- " . $hw . "</br>";
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