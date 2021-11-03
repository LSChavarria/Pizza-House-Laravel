<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function findUser($id) {
        return User::findorFail($id);
    }

    public function getAllUsers() {
        return User::all();
    }

    public function insertUser($request) {
        $user = new User;
        $user->name = $request->name;
        $user->direccion = $request->direccion;
        $user->referencia = $request->referencia;
        $user->rol = $request->rol;
        $user->email = $request->email;
        $user->password = $request->password;
        return $user->save() ? true : false;
    }

    public function updateUser($request) {
        $user = $this->findUser($request->id);
        $user->name = $request->name;
        $user->direccion = $request->direccion;
        $user->referencia = $request->referencia;
        $user->rol = $request->rol;
        $user->email = $request->email;
        $user->password = $request->password;
        return $user->save() ? true : false;
    }

    public function deleteUser($id) {
        return $this->findUser($id)->delete() ? true : false;
    }

    public function validarEmailUnico($email) {
        return User::where('email', $email)->exists();
    }

}
