<?php

namespace Application\Controller;

use Skyline\API\Controller\AbstractAPIActionController;
use Skyline\API\Render\JSONRender;
use Symfony\Component\HttpFoundation\Request;

class WLWApiActionController extends AbstractAPIActionController
{
    public function acceptsAnonymousRequest(Request $request): bool
    {
        return true;
    }

    public function acceptOrigin(Request $request, bool &$requireCredentials = false): bool
    {
        return true;
    }

    /**
     * @route literal /api/v1/my-api-action
     */
    public function myAPIAction()
    {
        $this->preferRender(JSONRender::RENDER_NAME);
        $model = $this->getModel();

        $model["test"] = 23;
    }
}