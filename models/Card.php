<?php namespace Individuart\Materialize\Models;

use Model;

/**
 * Card Model
 */
class Card extends Model
{

    use \October\Rain\Database\Traits\Validation;

    /**
     * @var string The database table used by the model.
     */
    public $table = 'individuart_materialize_cards';

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
    public $belongsTo = [];
    public $belongsToMany = [];
    public $morphTo = [];
    public $morphOne = [];
    public $morphMany = [];
    public $attachOne = [
        'card_image' => ['System\Models\File']
    ];
    public $attachMany = [];

    public $rules = [
        'name' => 'required',
        'title' => 'required'
    ];

    /**
     * Softly implement the TranslatableModel behavior.
     */
    public $implement = ['@RainLab.Translate.Behaviors.TranslatableModel'];
    /**
     * @var array Attributes that support translation, if available.
     */
    public $translatable = ['title','description','link_text'];

    public function getImageAttribute(){
        $item = Card::find($this->id);
        if($item->card_image)
        {
            return '<img src="' . $item->card_image->getThumb(50, 50, 'crop') . '">';
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