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

    public function acceptsCrossOriginRequest(Request $request): bool
    {
        return false;
    }

    protected function getDefaultRenderName(): ?string
    {
        return JSONRender::RENDER_NAME;
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