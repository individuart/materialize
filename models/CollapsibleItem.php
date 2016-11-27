<?php namespace Individuart\Materialize\Models;

use Model;

/**
 * CollapsibleItem Model
 */
class CollapsibleItem extends Model
{

    use \October\Rain\Database\Traits\Validation;
    use \October\Rain\Database\Traits\Sortable; //necesito esta clase para reordenar en el listado


    /**
     * @var string The database table used by the model.
     */
    public $table = 'individuart_materialize_collapsible_items';

    /**
     * @var array Guarded fields
     */
    protected $guarded = ['*'];

    /**
     * @var array Fillable fields
     */
    protected $fillable = [];

    /**
     * @var array Relations
     */
    public $hasOne = [];
    public $hasMany = [];
    public $belongsTo = [
        'collapsible' => ['Individuart\Materialize\Collapsible']
    ];
    public $belongsToMany = [];
    public $morphTo = [];
    public $morphOne = [];
    public $morphMany = [];
    public $attachOne = [];
    public $attachMany = [];

    public $rules = [
        'name' => 'required'
    ];

    /**
     * Softly implement the TranslatableModel behavior.
     */
    public $implement = ['@RainLab.Translate.Behaviors.TranslatableModel'];
    /**
     * @var array Attributes that support translation, if available.
     */
    public $translatable = ['title','description'];



    public function scopePublished($query)
    {
        return $query->where('published',true);

    }

}