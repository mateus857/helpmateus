<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    // Campos que podem ser preenchidos em massa
    protected $fillable = [
        'title',
        'date',
        'description',
        'completed'
    ];

    // Defina a tabela associada ao model (se necessário)
    protected $table = 'tasks';

    // Se você não estiver usando timestamps (created_at e updated_at)
    public $timestamps = true;
}
