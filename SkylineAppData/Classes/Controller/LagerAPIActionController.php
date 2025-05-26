<?php

namespace Application\Controller;

use Skyline\API\Controller\AbstractAPIActionController;
use Skyline\PDO\SQLite;
use Symfony\Component\HttpFoundation\Request;

class LagerAPIActionController extends AbstractAPIActionController
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

	/**
	 * @route literal /api/v1/lager-list
	 */
	public function listLagerAction() {
		/** @var SQLite $PDO */
		$PDO = $this->PDO;
		$model = $this->getModel();

		$desc = "";

		switch (strtolower($_GET['order'] ?? "")) {
			case 'name':
			case 'description':
				$order = strtolower($_GET['order']);
				$desc = isset($_GET['desc']) ? "DESC" : "";
				break;
			default:
				$order = "";
		}

		$model['lager'] = iterator_to_array(
			$PDO->select("SELECT * FROM LAGER ORDER BY $order $desc")
		);
	}

	/**
	 * @route literal /api/v1/lager-add
	 */
	public function addLagerAction() {
		/** @var SQLite $PDO */
		$PDO = $this->PDO;

		$PDO->inject("INSERT INTO LAGER (name, description) VALUES (?, ?)")->send([
			$_POST["name"] ?? NULL,
			$_POST["description"] ?? NULL
		]);

		$model = $this->getModel();
		$model["lager_id"] = $PDO->lastInsertId("LAGER");
	}

	/**
	 * @route literal /api/v1/lager-change
	 */
	public function changeLagerAction() {
		/** @var SQLite $PDO */
		$PDO = $this->PDO;

		$lager_id = $_GET["lager_id"] ?? 0;
		$MAT = $PDO->selectOne("SELECT * FROM LAGER WHERE id = ?", [$lager_id]);
		if(!$MAT)
			throw new \RuntimeException("No lager found", 404);

		$PDO->inject("UPDATE LAGER SET name=?, description=? WHERE id = {$MAT['id']}")->send([
			$_POST["name"] ?? NULL,
			$_POST["description"] ?? NULL
		]);
	}


	/**
	 * @route literal /api/v1/lager-delete
	 */
	public function deleteLagerAction() {
		/** @var SQLite $PDO */
		$PDO = $this->PDO;

		$lager_id = $_GET["lager_id"] ?? 0;
		$PDO->inject("DELETE FROM LAGER WHERE id = ?")->send([$lager_id]);
		$PDO->inject("DELETE FROM BESTAND WHERE lager = ?")->send([$lager_id]);
	}
}