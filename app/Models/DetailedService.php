<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailedService extends Model
{

protected $fillable = [

'title',
'slug',
'hero_description',
'full_description',
'overview',
'architecture_image',
'technologies',
'benefits',
'use_cases',
'faqs'

];

protected $casts = [

'technologies' => 'array',
'benefits' => 'array',
'use_cases' => 'array',
'faqs' => 'array'

];

}
