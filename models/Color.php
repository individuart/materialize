<?php namespace Individuart\Materialize\Models;

use Model;

/**
 * Color Model
 */
class Color extends Model
{

    /**
     * @var string The database table used by the model.
     */
    public $table = 'individuart_materialize_colors';

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
    public $attachOne = [];
    public $attachMany = [];

    public $colors = [
        "" => "default",
        "materialize-red" => "materialize-red",
        "red" => "red",
        "pink" => "pink",
        "purple" => "purple",
        "deep-purple" => "deep-purple",
        "indigo" => "indigo",
        "blue" => "blue",
        "light-blue" => "light-blue",
        "cyan" => "cyan",
        "teal" => "teal",
        "green" => "green",
        "light-green" => "light-green",
        "lime" => "lime",
        "yellow" => "yellow",
        "amber" => "amber",
        "orange" => "orange",
        "deep-orange" => "deep-orange",
        "brown" => "brown",
        "blue-grey" => "blue-grey",
        "grey" => "grey",
        "shades" => "shades",
        "black" => "black",
        "white" => "white",
    ];

    public $color_variants = [
        "" => "default",
        "lighten-5" => "lighten-5",
        "lighten-4" => "lighten-4",
        "lighten-3" => "lighten-3",
        "lighten-2" => "lighten-2",
        "lighten-1" => "lighten-1",
        "darken-1" => "darken-1",
        "darken-2" => "darken-2",
        "darken-3" => "darken-3",
        "darken-4" => "darken-4",
        "accent-1" => "accent-1",
        "accent-2" => "accent-2",
        "accent-3" => "accent-3",
        "accent-4" => "accent-4",

    ];

}