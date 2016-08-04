<?php

namespace Bican\Roles\Models;


use Bican\Roles\Traits\Slugable;
use Illuminate\Database\Eloquent\Model;
use Bican\Roles\Traits\RoleHasRelations;
use Bican\Roles\Contracts\RoleHasRelations as RoleHasRelationsContract;

class Role extends Model implements RoleHasRelationsContract
{
    use Slugable, RoleHasRelations;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'slug', 'description', 'level'];

    /**
     * Create a new model instance.
     *
     * @param array $attributes
     * @return void
     */
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        if ($connection = config('roles.connection')) {
            $this->connection = $connection;
        }
    }

    public function permisos2()
    {       
        return $roles = \DB::table('roles')->where('roles.id','=',$this->id)
         ->select('permissions.id','permissions.name')
         ->join('permission_role', 'roles.id', '=', 'permission_role.role_id')
         ->join('permissions','permission_role.permission_id','=','permissions.id')
         ->get();
    }


}
