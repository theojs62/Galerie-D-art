<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * La classe Artwork représente le modèle pour les œuvres d'art.
 */
class Artwork extends Model
{
    use HasFactory;

    /**
     * @var string $table Nom de la table.
     */
    protected $table = 'artworks';

    /**
     * @var string[] $fillable Données pouvant être données par un formulaire.
     */
    protected $fillable = [
        'name_artwork',
        'description_artwork',
        'date_artwork',
        'link_artwork'
    ];

    /**
     * Donne l'ensemble des visiteurs auxquels ils ont l'œuvre en favori.
     *
     * @return BelongsToMany L'ensemble des visiteurs auxquels ils ont l'œuvre en favori.
     */
    function visitors(): BelongsToMany
    {
        return $this->belongsToMany(Visitor::class, 'favorite');
    }

    /**
     * Donne l'ensemble des auteurs liés à l'œuvre.
     *
     * @return BelongsToMany L'ensemble des auteurs liés à l'œuvre.
     */
    function authors(): BelongsToMany
    {
        return $this->belongsToMany(Author::class, 'create');
    }

    /**
     * @return HasMany
     */
    public function commentaries(): HasMany
    {
        return $this->hasMany(Commentary::class);
    }
}
