<?php
						include_once substr(getcwd(), 0,26).'\entity\horario.php';
						include_once substr(getcwd(), 0,26).'\mapper\horarioMapper.php';
                        include_once substr(getcwd(), 0,26).'\core\Render.php';

						class horarioController{

							/**
						     * Permite guardar un objeto tipo horario.
						     * La informacion llego por post asumiendo la estructura de las entidades .
						     *
						     */
							public function crear(){
								$horario       = new horario($_POST['data']);
						        $horarioMapper = new horarioMapper();
						        var_dump($horarioMapper->crearhorario($horario));
							}
							public function listar(){;
								$horarioMapper = new horarioMapper();
								$horario = $horarioMapper->listarhorario();
								$render = new Render('listados/horarioList',$horario);
                                $render->mostrar();
							}

							public function actualizar(){

							}

							 public function eliminar(){
                                $horario = new horario();

                                $horario->setid($_POST['data']['id']);

                                $horarioMapper = new horarioMapper();
                                $horarioMapper->eliminar($horario);
                            }

                            public function formeliminar() {
                            $render = new Render('formuEliminar/horarioEliminar');
                            $render->mostrar();
                            }

                            public function crearForm() {
                            $render = new Render('formulario/horarioform');
                            $render->mostrar();
                            }
						}