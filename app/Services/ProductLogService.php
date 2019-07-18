<?php

namespace App\Services;

use App\ProductLog;

class ProductLogService
{
    public function getByProduct($id = 0, $from = '', $to = '')
    {
        $query = ProductLog::with('product', 'user')->where('product_id' , '=', $id);
        if (!empty($from)) {
            $query->whereDate('created_at', '>=', date('Y-m-d', strtotime($from)));
        }

        if (!empty($to)) {
            $query->whereDate('created_at', '<=', date('Y-m-d', strtotime($to)));
        }
        return $query->get();
    }
}