<?php

namespace Application\Controller;

use Skyline\API\Controller\AbstractAPIActionController;
use Skyline\API\Render\JSONRender;
use Symfony\Component\HttpFoundation\Request;

class WLWApiActionController extends AbstractAPIActionController
{

    public function acceptsAnonymousRequest(Request $request): bool
    {
        // Für dieses in gesichertem Rahmen laufende Projekte werden alle Requests zwecks Tests zugelassen.
        return true;
    }

    public function acceptsCrossOriginRequest(Request $request): bool
    {
        // Ebenfalls werden keine Cross Origin checks durchgeführt. Alles wird akzeptiert.
        return true;
    }

    protected function getDefaultRenderName(): ?string
    {
        // Sollte es dennoch zu Fehlern kommen, soll immer in JSON geantwortet werden.
        return JSONRender::RENDER_NAME;
    }

    protected function enableCsrfCheck(Request $request): bool
    {
        // Damit Skyline CMS schlank bleibt, machen wir keine csrf Prüfungen.
        return false;
    }

    /**
     * @route literal /api/v1/my-api-action
     */
    public function myAPIAction()
    {
        $model = $this->getModel();

        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $model["sent-data"] = $_POST;
        }

        $model["test"] = 23;
    }

    /**
     * @route literal /api/v1/fetch-lines
     */
    public function table_fetch_lines()
    {
        /* From: https://www.stechies.com/fetch-data-from-database-in-php-and-display-in-html-table/
        // 3. example, adapted 
        
        $selectQuery = "SELECT * FROM `tbl_users` ORDER BY `user_id` ASC";
        $result = mysqli_query($connectQuery,$selectQuery);
        if(mysqli_num_rows($result) > 0){
            $result_array = array();
            while($row = mysqli_fetch_assoc($result)){
                array_push($result_array, $row);
            }
            
        }*/

        

        $result_array = array();
        array_push(["t1", "Hallo", "MX34", "5"]);

        $results = ["sEcho" => 1,
        "iTotalRecords" => count($result_array),
        "iTotalDisplayRecords" => count($result_array),
        "aaData" => $result_array ];

        $model = $this->getModel();

        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $model["sent-data"] = $_POST;
        }

        $model["test"] = $results;

        
        // echo json_encode($results);
        
    }

}
}