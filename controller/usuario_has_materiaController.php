<?php
						include_once substr(getcwd(), 0,26).'\entity\usuario_has_materia.php';
						include_once substr(getcwd(), 0,26).'\mapper\usuario_has_materiaMapper.php';
                        include_once substr(getcwd(), 0,26).'\core\Render.php';

						class usuario_has_materiaController{

							/**
						     * Permite guardar un objeto tipo usuario_has_materia.
						     * La informacion llego por post asumiendo la estructura de las entidades .
						     *
						     */
							public function crear(){
								$usuario_has_materia       = new usuario_has_materia($_POST['data']);
						        $usuario_has_materiaMapper = new usuario_has_materiaMapper();
						        var_dump($usuario_has_materiaMapper->crearusuario_has_materia($usuario_has_materia));
							}
							public function listar(){;
								$usuario_has_materiaMapper = new usuario_has_materiaMapper();
								$usuario_has_materia = $usuario_has_materiaMapper->listarusuario_has_materia();
								$render = new Render('listados/usuario_has_materiaList',$usuario_has_materia);
                                $render->mostrar();
							}

							public function actualizar(){

							}

							 public function eliminar(){
                                $usuario_has_materia = new usuario_has_materia();

                                $usuario_has_materia->setusuario_codigo($_POST['data']['usuario_codigo']);
$usuario_has_materia->setmateria_codigo($_POST['data']['materia_codigo']);

                                $usuario_has_materiaMapper = new usuario_has_materiaMapper();
                                $usuario_has_materiaMapper->eliminar($usuario_has_materia);
                            }

                            public function formeliminar() {
                            $render = new Render('formuEliminar/usuario_has_materiaEliminar');
                            $render->mostrar();
                            }

                            public function crearForm() {
                            $render = new Render('formulario/usuario_has_materiaform');
                            $render->mostrar();
                            }
						}