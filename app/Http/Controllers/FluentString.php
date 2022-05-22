<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

class FluentString extends Controller
{
  public function index()
  {
    $string1 = Str::of('welcome to in this world')->after('welcome to');
    echo $string1 . "<br />";
  }
}
