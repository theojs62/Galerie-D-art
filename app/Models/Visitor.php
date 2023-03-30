<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Visitor extends Model {
    use HasFactory;

    /**
     * Assignment base.
     * @var
     */
    protected $table = "visitors";

    /**
     * Assignment des attributs.
     * @var string[] attributs.
     */
    protected $fillable = [
        'firstname_visitor',
        'lastname_visitor',
        'link_avatar'
    ];

    /**
     * @return BelongsToMany
     */
    public function artworks(): BelongsToMany
    {
        return $this->belongsToMany(Artwork::class, 'favorite');
    }

    /**
     * Donne l'utilisateur liée à ce compte.
     *
     * @return HasOne
     */
    public function user(): HasOne
    {
        return $this->hasOne(User::class);
    }

    /**
     * @return HasMany
     */
    public function commentaries(): HasMany
    {
        return $this->hasMany(Commentary::class);
    }
}
