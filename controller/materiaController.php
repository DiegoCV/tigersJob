<?php
						include_once substr(getcwd(), 0,26).'\entity\materia.php';
						include_once substr(getcwd(), 0,26).'\mapper\materiaMapper.php';
                        include_once substr(getcwd(), 0,26).'\core\Render.php';

						class materiaController{

							/**
						     * Permite guardar un objeto tipo materia.
						     * La informacion llego por post asumiendo la estructura de las entidades .
						     *
						     */
							public function crear(){
								$materia       = new materia($_POST['data']);
						        $materiaMapper = new materiaMapper();
						        var_dump($materiaMapper->crearmateria($materia));
							}
							public function listar(){;
								$materiaMapper = new materiaMapper();
								$materia = $materiaMapper->listarmateria();
								$render = new Render('listados/materiaList',$materia);
                                $render->mostrar();
							}

							public function actualizar(){

							}

							 public function eliminar(){
                                $materia = new materia();

                                $materia->setcodigo($_POST['data']['codigo']);

                                $materiaMapper = new materiaMapper();
                                $materiaMapper->eliminar($materia);
                            }

                            public function formeliminar() {
                            $render = new Render('formuEliminar/materiaEliminar');
                            $render->mostrar();
                            }

                            public function crearForm() {
                            $render = new Render('formulario/materiaform');
                            $render->mostrar();
                            }
						}