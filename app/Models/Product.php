<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'description', 'image', 'price'];

    public function getID(): int{
        return $this -> attributes["id"];
    }

    public function setName(String $name): void{
        $this -> attributes["name"] = $name;
    }

    public function getName(): String{
        return $this -> attributes["name"];
    }

    public function setDescription(String $description): void{
        $this -> attributes["description"] = $description;
    }

    public function getDescription(): String{
        return $this -> attributes["description"];
    }

    public function setImage(String $image): void{
        $this -> attributes["image"] = $image;
    }

    public function getImage(): String{
        return $this -> attributes["image"];
    }

    public function setPrice(float $price): void{
        $this -> attributes["price"] = $price;
    }

    public function getPrice(): float{
        return $this -> attributes["price"];
    }
}
