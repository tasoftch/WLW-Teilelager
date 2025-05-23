<?php

namespace Application\Controller;

use DateTime;
use Skyline\API\Controller\AbstractAPIActionController;
use Skyline\PDO\SQLite;
use Symfony\Component\HttpFoundation\Request;

class BestandAPIActionController extends AbstractAPIActionController
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

		if($amount) {
			$PDO->inject("INSERT INTO BESTAND (material, lager, date, amount) VALUES ($material_id, $lager_id, ?, ?)")->send([
				$amount,
				$date
			]);
		} else
			throw new \RuntimeException("No amount transmitted", 400);
	}
}