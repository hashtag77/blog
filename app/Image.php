<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model implements \Czim\Paperclip\Contracts\AttachableInterface
{
    use \Czim\Paperclip\Model\PaperclipTrait;

    protected $table='images'; 
    public $primarykey='id';

    public function album(){
        return $this->belongsTo('App\Album');
    }

    public function __construct(array $attributes = [])
    {
        $this->hasAttachedFile('image', [
            'styles' => [
				'medium' => '300x300',
				'thumb' => '100x100'
			]
        ]);
        parent::__construct($attributes);   
    }
}