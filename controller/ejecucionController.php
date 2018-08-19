<?php
						include_once substr(getcwd(), 0,26).'\entity\ejecucion.php';
						include_once substr(getcwd(), 0,26).'\mapper\ejecucionMapper.php';
                        include_once substr(getcwd(), 0,26).'\core\Render.php';

						class ejecucionController{

							/**
						     * Permite guardar un objeto tipo ejecucion.
						     * La informacion llego por post asumiendo la estructura de las entidades .
						     *
						     */
							public function crear(){
								$ejecucion       = new ejecucion($_POST['data']);
						        $ejecucionMapper = new ejecucionMapper();
						        var_dump($ejecucionMapper->crearejecucion($ejecucion));
							}
							public function listar(){;
								$ejecucionMapper = new ejecucionMapper();
								$ejecucion = $ejecucionMapper->listarejecucion();
								$render = new Render('listados/ejecucionList',$ejecucion);
                                $render->mostrar();
							}

							public function actualizar(){

							}

							 public function eliminar(){
                                $ejecucion = new ejecucion();

                                $ejecucion->setid($_POST['data']['id']);

                                $ejecucionMapper = new ejecucionMapper();
                                $ejecucionMapper->eliminar($ejecucion);
                            }

                            public function formeliminar() {
                            $render = new Render('formuEliminar/ejecucionEliminar');
                            $render->mostrar();
                            }

                            public function crearForm() {
                            $render = new Render('formulario/ejecucionform');
                            $render->mostrar();
                            }
						}