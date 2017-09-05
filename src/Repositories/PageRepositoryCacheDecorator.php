<?php namespace Tukecx\Base\Pages\Repositories;

use Tukecx\Base\Caching\Repositories\Eloquent\EloquentBaseRepositoryCacheDecorator;
use Tukecx\Base\Pages\Repositories\Contracts\PageContract;

class PageRepositoryCacheDecorator extends EloquentBaseRepositoryCacheDecorator implements PageContract
{
    /**
     * @param $data
     * @param array|null $dataTranslate
     * @return array
     */
    public function createPage($data, $dataTranslate = null)
    {
        return $this->afterUpdate(__FUNCTION__, func_get_args());
    }

    /**
     * @param $id
     * @param $data
     * @param array|null $dataTranslate
     * @return array
     */
    public function updatePage($id, $data, $dataTranslate = null)
    {
        return $this->afterUpdate(__FUNCTION__, func_get_args());
    }

    /**
     * @param int|array $id
     * @return array
     */
    public function deletePage($id)
    {
        return $this->afterUpdate(__FUNCTION__, func_get_args());
    }
}
