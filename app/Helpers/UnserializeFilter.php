<?php

namespace App\Helpers;

class UnserializeFilter
{
    /**
     * @var array
     */
    private $filters = array();

    /**
     * @var string
     */
    private $order = array();

    /**
     * @param $search
     * @return array
     */
    public function getFilters($search)
    {
        $search = explode(';', $search);

        foreach ($search as $val) {
            $tmp = explode(':', $val);
            $this->filters[$tmp[0]] = $tmp[1];
        }

        return $this->filters;
    }

    /**
     * @param $request
     * @return array|string
     */
    public function getOrder($request)
    {
        $arrOrders = $request->has('order') ? explode(';', $request->get('order')) : array();

        foreach ($arrOrders as $val) {
            $tmp = explode(':', $val);
            $this->order[$tmp[0]] = $tmp[1];
        }

        return $this->order;
    }
}
