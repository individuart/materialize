<?php

namespace Individuart\Materialize\Models;

use Illuminate\Support\Facades\Lang;

use Model;

/**
 * Carousel Model.
 */
class Carousel extends Model
{
    use \October\Rain\Database\Traits\Validation;
    use \October\Rain\Database\Traits\Sortable; //necesito esta clase para reordenar en el listado

    /**
     * @var string the database table used by the model
     */
    public $table = 'individuart_materialize_carousels';

    /**
     * @var array Relations
     */
    public $hasOne = [];
    public $hasMany = [
        'carousel_items' => ['Individuart\Materialize\Models\CarouselItem'],
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

    public function listTypes($keyValue = null, $fieldName = null)
    {
        return [
            '1' => Lang::get('individuart.materialize::lang.backend.default'),
            '2' => Lang::get('individuart.materialize::lang.backend.full_width'),
            '3' => Lang::get('individuart.materialize::lang.backend.full_screen'),
        ];
    }

    public function scopePublished($query)
    {
        return $query->where('published', true);
    }
}
