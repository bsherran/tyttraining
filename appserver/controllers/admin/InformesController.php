<?php

class InformesController implements IController {

    private $view;
    private $config;
    private $subviewpath = "admin/";

    public function __construct() {
        $this->view = new View();
        $this->config = Config::singleton();
        require "{$this->config->get("entities")}Area.php";
        require "{$this->config->get("entities")}Nivel.php";
        require "{$this->config->get("entities")}Leccion.php";
        require "{$this->config->get("entities")}Pregunta.php";
        require "{$this->config->get("models")}AreaModel.php";
        require "{$this->config->get("models")}NivelModel.php";
        require "{$this->config->get("models")}LeccionModel.php";
        require "{$this->config->get("models")}PreguntaModel.php";
    }

    public function index() {
        $entity = new Area();
        $id = ($_REQUEST["areaId"]);
        $entity->setAreId($id);
        $m = new AreaModel();
        $r = $m->getById($entity);
        if ($r->status === 200) {
            $vars = [];
            $vars["entity"] = $r->data;
            $this->view->show("admin/informes/reportesSupAdmin.php", $vars);
        }
    }
    public function exportarXLS() {
        $mArea = new AreaModel();
        $r = $mArea->get(null);
        $html = "<table>";
        $html .= "<tr>";
        $html .= "<td>Id</td>";
        $html .= "<td>Nombre</td>";
        $html .= "<td>Imagen</td>";
        $html .= "</tr>";
        foreach ($r->data as $area) {
            $area instanceof Area;
            $html .= "<tr height='100'>";
            $html .= "<td height='100'>{$area->getAreId()}</td>";
            $html .= "<td height='100'>{$area->getAreNombre()}</td>";
            $html .= "<td height='100'><img src='{$this->config->get('rassets')}areas/{$area->getAreImagen()}' width='80' heigth='80' /></td>";
            $html .= "</tr>";
        }
        $html .= "</table>";
        header('Content-type: application/vnd.ms-excel');
        header("Content-Disposition: attachment; filename=ReporteAreas.xls");
        header("Pragma: no-cache");
        header("Expires: 0");
        echo $html;
    }

    public function listar() {
        $entity = new Area();
        $mArea = new AreaModel();
        $r = $mArea->get($entity);
        /*         * * */
        foreach ($r->data as $area) {
            $ran = $mArea->getCantidadNivelesByArea($area->getAreId());
            $area->setCantidadNiveles($ran->data->cantidad);
            $ral = $mArea->getCantidadLeccionesByArea($area->getAreId());
            $area->setCantidadLecciones($ral->data->cantidad);
            $rap = $mArea->getCantidadPreguntaByArea($area->getAreId());
            $area->setCantidadPreguntas($rap->data->cantidad);
            $rar = $mArea->getCantidadRespuestaByArea($area->getAreId());
            $area->setCantidadRespuestas($rar->data->cantidad);
        }
        $vars["data"] = $r->data;
        $this->view->show("admin/informes/reportesSupAdmin.php", $vars);
    }

    public function getGraphByIdArea() {
        if(intval($_REQUEST["total"])===0)
            $_REQUEST["total"] = 1;
       
        
        
        require "{$this->config->get("libs")}jpgraph/src/jpgraph.php";
        require "{$this->config->get("libs")}jpgraph/src/jpgraph_pie.php";
        require "{$this->config->get("libs")}jpgraph/src/jpgraph_pie3d.php";
        // Some data
        $data = array($_REQUEST["resuelto"], ($_REQUEST["total"] + $_REQUEST["resuelto"]));

// Create the Pie Graph.
        $graph = new PieGraph(250, 200);
        $graph->SetShadow();

// Set A title for the plot
        $graph->title->Set($_REQUEST["area"]);
        $graph->title->SetFont(FF_VERDANA, FS_BOLD, 18);
        $graph->title->SetColor("#01908c");
        $graph->legend->Pos(0.1, 0.2);

// Create 3D pie plot
        $p1 = new PiePlot3d($data);
        $p1->SetTheme("sand");
        $p1->SetCenter(0.4);
        $p1->SetSize(80);

// Adjust projection angle
        $p1->SetAngle(45);

// Adjsut angle for first slice
        $p1->SetStartAngle(45);

// Display the slice values
        $p1->value->SetFont(FF_ARIAL, FS_BOLD, 11);
        $p1->value->SetColor("#ff8c56");

// Add colored edges to the 3D pie
// NOTE: You can't have exploded slices with edges!
        $p1->SetEdge("#ff8c56");

$p1->SetLegends(array("Resueltas","Total"));

        $graph->Add($p1);
        $graph->Stroke();
    }

}
