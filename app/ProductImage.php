<?php

namespace App;

// use Illuminate\Database\Eloquent\Model;
use Codesleeve\Stapler\ORM\StaplerableInterface;
use Codesleeve\Stapler\ORM\EloquentTrait;

use Eloquent;

class ProductImage extends Eloquent implements StaplerableInterface
{
    //
    use EloquentTrait;

    protected $fillable = ['product_id', 'image'];

	public function __construct(array $attributes = array()) {
		$this->hasAttachedFile('image', [
			'styles' => [
				'medium' => '300x300',
				'thumb' => '100x100'
			]
		]);

		parent::__construct($attributes);
	}

    public function product()
    {
        return $this->belongsTo('App\Product');
    }
}
