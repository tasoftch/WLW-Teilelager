<?php

namespace Application\Controller;

use Skyline\API\Controller\AbstractAPIActionController;
use Skyline\API\Render\JSONRender;
use Skyline\PDO\SQLite;
use Symfony\Component\HttpFoundation\Request;
use TASoft\Util\Record\RecordTransformerAdapter;
use TASoft\Util\Record\StackByTransformer;

class MaterialAPIActionController extends AbstractAPIActionController
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

	protected function buildSQLFilter() {
		/** @var SQLite $PDO */
		$PDO = $this->PDO;

		$search = $_GET["search"] ?? "";
		if(!$search)
			return "";

		$theIDs = false;

		$words = preg_split("/[\s,]+/i", $search);
		foreach($words as $word) {
			$list = [];
			foreach($PDO->select("SELECT DISTINCT KEYWORD.material_id FROM KEYWORD WHERE value LIKE ?", [$word]) as $rec) {
				$list[] = $rec['material_id'];
			}

			if(false === $theIDs) {
				$theIDs = $list;
			} else {
				$theIDs = array_intersect($theIDs, $list);
			}
		}

		if($theIDs)
			return " WHERE MATERIAL.id IN (". join(",", $theIDs) .")";
		return "";
	}

	/**
	 * @route literal /api/v1/material-list
	 */
	public function listMaterialAction() {
		/** @var SQLite $PDO */
		$PDO = $this->PDO;

		$from = $_GET['von'] ?? 0;
		$count = $_GET["anzahl"] ?? 10;
		$order = urldecode( $_GET["order"] ?? 'name' );

		$sql = "SELECT id FROM MATERIAL";
		$sql .= $filter = $this->buildSQLFilter();

		if($order == 'name' || $order == 'description')
			$sql .= sprintf(" ORDER BY `%s` %s", $order, isset($_GET['desc']) ? "DESC" : '');
		$sql .= " LIMIT $from, $count";

		$model = $this->getModel();

		$list = [];
		foreach($PDO->select($sql) as $rec) {
			$list[] = $rec['id'];
		}

		$model["list"] = $list;
		$model['from'] = $from;
		$model['count'] = $count;
		$model["total"] = $PDO->selectFieldValue("SELECT COUNT(id) as c FROM MATERIAL $filter", 'c');
	}

	/**
	 * @route literal /api/v1/material-fetch
	 */
	public function fetchMaterialAction() {
		/** @var SQLite $PDO */
		$PDO = $this->PDO;

		$material_id = $_GET["material_id"] ?? 0;
		$MAT = [];
		foreach($PDO->select("SELECT
    MATERIAL.id,
    MATERIAL.name,
    MATERIAL.description,
    LAGER.id as lager_id,
    LAGER.name as lager,
    SUM(amount) as bestand,
    MAX(date) as letzte_aenderung
FROM MATERIAL
    LEFT JOIN BESTAND ON material = MATERIAL.id
    LEFT JOIN LAGER ON lager = LAGER.id
WHERE MATERIAL.id = ?
GROUP BY LAGER.id", [$material_id]) as $record) {
			$MAT["id"] = $record["id"];
			$MAT["name"] = $record["name"];
			$MAT["description"] = $record["description"];

			if($record['lager_id']) {
				$MAT["lager"][] = [
					'id' => $record['lager_id'],
					'name' => $record['lager'],
					'bestand' => $record['bestand'],
					'zugriff' => date("d.m.Y G:i:s", $record["letzte_aenderung"]/1000)
				];
			}
		}

		if(!$MAT)
			throw new \RuntimeException("No material found", 404);

		$model = $this->getModel();
		$model["material"] = $MAT;
	}

	/**
	 * @route /api/v1/material-keyword-clear
	 */
	public function clearKeywordsAction() {
		/** @var SQLite $PDO */
		$PDO = $this->PDO;

		$material_id = $_GET["material_id"] ?? 0;
		$MAT = $PDO->selectOne("SELECT * FROM MATERIAL WHERE id = ?", [$material_id]);
		if(!$MAT)
			throw new \RuntimeException("No material found", 404);

		$PDO->inject("DELETE FROM KEYWORD WHERE material_id = ?")->send([
			$material_id
		]);
	}


	/**
	 * @route literal /api/v1/material-keyword-add
	 */
	public function addKeywordAction() {
		/** @var SQLite $PDO */
		$PDO = $this->PDO;

		$material_id = $_GET["material_id"] ?? 0;
		$word = $_GET['keyword'] ?? "";

		$MAT = $PDO->selectOne("SELECT * FROM MATERIAL WHERE id = ?", [$material_id]);
		if(!$MAT)
			throw new \RuntimeException("No material found", 404);

		if($word) {
			$PDO->inject("INSERT INTO KEYWORD (material_id, value) VALUES ({$MAT['id']}, ?)")->send([
				strtolower($word)
			]);
		} else {
			throw new \RuntimeException("No keyword transmitted", 404);
		}
	}

	/**
	 * @route literal /api/v1/material-change
	 */
	public function materialChangeAction() {
		/** @var SQLite $PDO */
		$PDO = $this->PDO;

		$material_id = $_GET["material_id"] ?? 0;
		$MAT = $PDO->selectOne("SELECT * FROM MATERIAL WHERE id = ?", [$material_id]);
		if(!$MAT)
			throw new \RuntimeException("No material found", 404);

		$PDO->inject("UPDATE MATERIAL SET name=?, description=? WHERE id = {$MAT['id']}")->send([
			$_POST["name"] ?? NULL,
			$_POST["description"] ?? NULL
		]);
	}

	/**
	 * @route literal /api/v1/material-delete
	 */
	public function deleteMaterialAction() {
		/** @var SQLite $PDO */
		$PDO = $this->PDO;

		$material_id = $_GET["material_id"] ?? 0;
		$PDO->inject("DELETE FROM KEYWORD WHERE material_id = ?")->send([$material_id]);
		$PDO->inject("DELETE FROM MATERIAL WHERE id = ?")->send([$material_id]);
		$PDO->inject("DELETE FROM BESTAND WHERE material = ?")->send([$material_id]);
	}

	/**
	 * @route literal /api/v1/material-add
	 */
	public function materialAddAction() {
		/** @var SQLite $PDO */
		$PDO = $this->PDO;

		$PDO->inject("INSERT INTO MATERIAL (name, description) VALUES (?, ?)")->send([
			$_POST["name"] ?? NULL,
			$_POST["description"] ?? NULL
		]);

		$model = $this->getModel();
		$model["material_id"] = $PDO->lastInsertId("MATERIAL");
	}
}