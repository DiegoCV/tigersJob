<?php
						include_once substr(getcwd(), 0,26).'\entity\estados.php';
						include_once substr(getcwd(), 0,26).'\mapper\estadosMapper.php';
                        include_once substr(getcwd(), 0,26).'\core\Render.php';

						class estadosController{

							/**
						     * Permite guardar un objeto tipo estados.
						     * La informacion llego por post asumiendo la estructura de las entidades .
						     *
						     */
							public function crear(){
								$estados       = new estados($_POST['data']);
						        $estadosMapper = new estadosMapper();
						        var_dump($estadosMapper->crearestados($estados));
							}
							public function listar(){;
								$estadosMapper = new estadosMapper();
								$estados = $estadosMapper->listarestados();
								$render = new Render('listados/estadosList',$estados);
                                $render->mostrar();
							}

							public function actualizar(){

							}

							 public function eliminar(){
                                $estados = new estados();

                                $estados->setid($_POST['data']['id']);

                                $estadosMapper = new estadosMapper();
                                $estadosMapper->eliminar($estados);
                            }

                            public function formeliminar() {
                            $render = new Render('formuEliminar/estadosEliminar');
                            $render->mostrar();
                            }

                            public function crearForm() {
                            $render = new Render('formulario/estadosform');
                            $render->mostrar();
                            }
						}