<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SalesReportController extends \koolreport\KoolReport
{
    protected settings()
    {
        return array(
            "dataSources" =>array(
                "automaker"=>array(
                    "connectionString" => "mysql:"
                )
            )
        )   
    }
}
