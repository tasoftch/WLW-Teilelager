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
}