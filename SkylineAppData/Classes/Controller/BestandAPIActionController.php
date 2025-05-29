<?php

namespace Application\Controller;

use DateTime;
use Skyline\API\Controller\AbstractAPIActionController;
use Skyline\API\Render\JSONRender;
use Skyline\PDO\SQLite;
use Symfony\Component\HttpFoundation\Request;

class BestandAPIActionController extends AbstractAPIActionController
{
	public function acceptsAnonymousRequest(Request $request): bool
	{
		// Für dieses in gesichertem Rahmen laufende Projekte werden alle Requests zwecks Tests zugelassen.
		return false;
	}

	public function acceptsCrossOriginRequest(Request $request): bool
	{
		// Ebenfalls werden keine Cross Origin checks durchgeführt. Alles wird akzeptiert.
		return true;
	}

    public function acceptOrigin(Request $request, bool &$requireCredentials = false): bool
    {
        $requireCredentials = true;
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
	 * @route literal /api/v1/bestand-buchen
	 */
	public function buchenAction() {
		/** @var SQLite $PDO */
		$PDO = $this->PDO;

		$material_id = $_GET["material_id"] ?? 0;
		$MAT = $PDO->selectOne("SELECT * FROM MATERIAL WHERE id = ?", [$material_id]);
		if(!$MAT)
			throw new \RuntimeException("No material found", 404);

		$lager_id = $_GET["lager_id"] ?? 0;
		$MAT = $PDO->selectOne("SELECT * FROM LAGER WHERE id = ?", [$lager_id]);
		if(!$MAT)
			throw new \RuntimeException("No lager found", 404);

		// Kann positiv (einbuchen) oder negativ (ausbuchen) sein.
		$amount = $_POST['amount'] ?? 0;
		$date = (new Datetime($_POST["date"] ?? 'now'))->format("Y-m-d G:i:s");
		$this->getModel();

		if($amount) {
			$PDO->inject("INSERT INTO BESTAND (material, lager, date, amount) VALUES ($material_id, $lager_id, ?, ?)")->send([
				$date,
				$amount
			]);
		} else
			throw new \RuntimeException("No amount transmitted", 400);
	}
}