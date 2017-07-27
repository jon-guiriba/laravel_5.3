<?php
namespace App\Infrastructure\Dao;

use App\Models\Image;
interface iImageDao {
    
    public function getAll();

    public function getById($id);

    public function insertOrUpdate(Image $image);

    public function delete($id);

}