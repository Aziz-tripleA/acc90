<?php

namespace App\Transformers;

use App\Models\Category;
use App\Models\IcoRegulation;
use App\Models\Industry;
use League\Fractal\TransformerAbstract;

class IndustryTransformer extends TransformerAbstract
{
    /**
     * List of resources to automatically include
     *
     * @var array
     */
    protected $defaultIncludes = [
        //
    ];

    /**
     * List of resources possible to include
     *
     * @var array
     */
    protected $availableIncludes = [
    ];

    private $single = false;

    public function __construct($single = false)
    {
        $this->single = $single;
    }

    /**
     * A Fractal transformer.
     *
     * @param Industry $industry
     * @return array
     */
    public function transform(Industry $industry): array
    {
        $data = [
            'id' => $industry->id,
            'title' => $industry->name,
            'description' => $industry->description,
            //'image'=> asset($industry->cover->getUrl())
        ];

        if ($this->single) {

            $data = array_merge($data, $this->statuses($industry));
        }
        return $data;
    }

    public function statuses(Industry $industry): array
    {
        $categories = Category::query()->get();
        $result = [];
        foreach ($categories as $category){
            $statuses = array();
            $cat['id'] = $category->id;
            $cat['name'] = $category->name;
            $status = $category->statuses()->where('industry_id',$industry->id)->get();
            //dd($status);
            $cat['statuses'] = $status?fractal($status, new StatusesTransformer())->toArray()['data']:[];
            //dd($statuses);
            $result['categories'][] = $cat;
        }
        return $result;
    }
}
