<?php

namespace App\Interfaces;

interface ProductRepositoryInterface
{
    public function all();
    public function create($value);
    public function update($id,$value);
    public function delete($id);
}
