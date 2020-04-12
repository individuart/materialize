<?php

namespace Individuart\Materialize\Models;

use Model;

/**
 * Collapsible Model.
 */
class Collapsible extends Model
{
    use \October\Rain\Database\Traits\Validation;
    use \October\Rain\Database\Traits\Sortable; //necesito esta clase para reordenar en el listado

    /**
     * @var string the database table used by the model
     */
    public $table = 'individuart_materialize_collapsibles';

    /**
     * @var array Relations
     */
    public $hasOne = [];
    public $hasMany = [
        'collapsible_items' => ['Individuart\Materialize\Models\CollapsibleItem'],
    ];
    public $belongsTo = [];
    public $belongsToMany = [];
    public $morphTo = [];
    public $morphOne = [];
    public $morphMany = [];
    public $attachOne = [];
    public $attachMany = [];

    public $rules = [
        'name' => 'required',
    ];

    /**
     * @var array Guarded fields
     */
    protected $guarded = ['*'];

    /**
     * @var array Fillable fields
     */
    protected $fillable = [];

    public function scopePublished($query)
    {
        return $query->where('published', true);
    }
}
