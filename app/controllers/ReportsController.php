<?php

use GirafftShop\Orders\Forms\GenerateReportForm;
use GirafftShop\Orders\Forms\GetTopSellingForm;

class ReportsController extends BaseController {

    private $generateReportForm;
    private $getTopSellingForm;

    function __construct(GenerateReportForm $generateReportForm, GetTopSellingForm $getTopSellingForm)
    {
        $this->generateReportForm = $generateReportForm;
        $this->getTopSellingForm = $getTopSellingForm;
    }

    public function showDashboard()
    {
        return View::make('control_panel.dashboard');
    }

    public function createDailySales()
    {
        return View::make('control_panel.reports.create_daily_sales');
    }

    public function showDailySales()
    {
        $this->generateReportForm->validate(Input::all());

        $processedDate = date('Y-m-d',strtotime(Input::get('date')));

        $rows =
            DB::select( DB::raw(
                "SELECT item_upc, category, price, stock, SUM(quantity) as quantity
                 FROM orders, purchase_items, items
                 WHERE date ='" . $processedDate . "' AND upc = item_upc AND receiptId = order_receiptId
                 GROUP BY item_upc
                 ORDER BY category"
            ));

        // get categories

        $categories = [];

        foreach ($rows as $row)
        {
            if(!in_array($row->category, $categories)){
                $categories[] = $row->category;
            }
        }

        $groupedRows = [];

        foreach ($categories as $category)
        {
            $rowsOfCategory = array_where($rows, function($key, $value) use ($category) {
               return $value->category == $category;
            });
            $groupedRows = array_add($groupedRows, $category, $rowsOfCategory);
        }


        $data['groupedRows'] = $groupedRows;
        $data['date'] = $processedDate;

        return View::make('control_panel.reports.daily_sales', $data);
    }

    public function createTopSelling()
    {
        return View::make('control_panel.reports.create_top_selling');
    }

    public function showTopSelling()
    {
        $this->getTopSellingForm->validate(Input::all());

        $processedDate = date('Y-m-d',strtotime(Input::get('date')));
        $numberOfRows = Input::get('numberOfRows');

        $data['rows'] =
            DB::select( DB::raw(
                "SELECT title, company, stock, SUM(quantity) as quantity
                 FROM orders, purchase_items, items
                 WHERE date ='" . $processedDate . "' AND upc = item_upc AND receiptId = order_receiptId
                 GROUP BY item_upc
                 ORDER BY SUM(quantity) DESC LIMIT " . $numberOfRows
            ));

        $data['date'] = $processedDate;

        return View::make('control_panel.reports.top_selling', $data);

    }
} 