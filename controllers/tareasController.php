<?php

class tareasController extends AppController
{
	public function __construct(){
		parent::__construct();
	}

	public function index(){
		$tareas = $this->loadmodel("tarea");
		$this->_view->tareas = $tareas->getTareas();

		$this->_view->titulo = "Listado de tareas";
		$this->_view->renderizar("index");
	}
    
    public function agregar(){

		if ($_POST) {
			$tareas = $this->loadmodel("tarea");
            if ($tareas->guardar($_POST)) {
                $this->_messages->success(
                    'Tarea guardada correctamente',
                    $this->redirect(array("controller"=>"tareas"))
                );
            }
		}

		$categorias = $this->loadmodel("categoria");
		$this->_view->categorias = $categorias->getCategorias();

		$this->_view->titulo = "Agregar tarea";
		$this->_view->renderizar("agregar");
	}
    
    public function editar($id=null){
        if($_POST){
            $tareas = $this->loadmodel("tarea");
            
            if ($tareas->actualizar($_POST)) {
                $this->_view->flashMessage = "Datos guardados correctamente...";
                $this->redirect(array("controller"=>"tareas"));
            }else{
                $this->_view->flashMessage = "Error al guardar los datos...";

                $this->redirect(array("controller"=>"tareas", "action"=>"editar/".$id)
                );
            }     
        }
        $tareas = $this->loadmodel("tarea");
        $this->_view->tarea = $tareas->buscarPorId($id);
        
        $categorias = $this->loadmodel("categoria");
		$this->_view->categorias = $categorias->getCategorias();
        
        $this->_view->titulo = "Editar tarea";
		$this->_view->renderizar("editar");
        
    }

    public function eliminar($id){
    	$tarea = $this->loadmodel("tarea");
    	$registro = $tarea->buscarPorId($id);

    	if (!empty($registro)) {
    		$tarea->eliminarPorId($id);

            $this->_messages->success('Tarea eliminada correctamente', $this->redirect(array("controller"=>"tareas"))
            );
        }
    }

    
    public function cambiarEstado($id, $status){
        $tarea = $this->loadmodel("tarea");
        
        if ($status=="off") {
            $estado = 0;
        }elseif ($status=="on") {
            $estado=1;
        }

        $tarea->status($id, $estado);
        $this->redirect(array("controller"=>"tareas"));
    }
}

