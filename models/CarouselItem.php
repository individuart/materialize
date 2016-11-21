<?php namespace Individuart\Materialize\Models;

use Model;

/**
 * CarouselItem Model
 */
class CarouselItem extends Model
{

    use \October\Rain\Database\Traits\Validation;
    use \October\Rain\Database\Traits\Sortable; //necesito esta clase para reordenar en el listado


    /**
     * @var string The database table used by the model.
     */
    public $table = 'individuart_materialize_carousel_items';

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
        'carousel' => ['Individuart\Materialize\Carousel']
    ];
    public $belongsToMany = [];
    public $morphTo = [];
    public $morphOne = [];
    public $morphMany = [];
    public $attachOne = [
        'carousel_item_image' => ['System\Models\File']
    ];
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


    public function getImageAttribute(){
        $item = CarouselItem::find($this->id);
        if($item->carousel_item_image)
        {
            return '<img src="' . $item->carousel_item_image->getThumb(50, 50, 'crop') . '">';
        }else
        {
            return '';
        }
    }

    public function scopePublished($query)
    {
        return $query->where('published',true);

    }

}