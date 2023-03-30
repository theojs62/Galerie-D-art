<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use mysql_xdevapi\Table;

class Author extends Model
{
    use HasFactory;

    /**
     * @var string Nom de la variable permettant de reconnaitre les auteurs : authors.
     */
    protected $table='authors';

    /**
     * @var string[] Tableau indiquant les attributs pouvant être modifiable.
     */
    protected $fillable = [
        'firstname_author',
        'lastname_author',
        'nationality_author',
        'date_author'
    ];

    public function artworks(): BelongsToMany
    {
        return $this->belongsToMany(Artwork::class, 'create');
    }

}
