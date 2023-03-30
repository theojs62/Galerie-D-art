<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commentary extends Model
{
    use HasFactory;

    /**
     * @var string $table Nom de la table.
     */
    protected $table = 'commentaries';

    /**
     * @var array Données pouvant être données par un formulaire.
     */
    protected $fillable=[
        'title_commentary',
        'text_commentary',
    ];

    public function visitor(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return  $this->belongsTo(Visitor::class);
    }

    public  function artwork(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Artwork::class);
    }
}
