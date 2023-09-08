<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    // ...

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'usuarios'; // Aquí especifica el nombre de tu tabla personalizada

    // ...
}
