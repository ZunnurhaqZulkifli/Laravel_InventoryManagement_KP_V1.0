<?php
use koolreport\widgets\google\BarChart;
use \koolreport\widgets\koolphp\Table;
?>
<html>
    <head>
    <title>My Report</title>
    </head>
    <body>
        <h1>It works</h1>
        <?php
        Table::create([
            "dataSource"=>$this->dataStore("sales")
        ]);

        BarChart::create(array(
            "dataStore"=>$this->dataStore('sales_by_customer'),
            "width"=>"100%",
            "height"=>"500px",
            "columns"=>array(
                "customerName"=>array(
                    "label"=>"Customer"
                ),
                "dollar_sales"=>array(
                    "type"=>"number",
                    "label"=>"Amount",
                    "prefix"=>"$",
                    "emphasis"=>true
                )
            ),
            "options"=>array(
                "title"=>"Sales By Customer",
            )
        ));
        ?>
        <?php
        ?>
    </body>
</html>
