<?php
						include_once substr(getcwd(), 0,26).'\entity\usuario.php';
						include_once substr(getcwd(), 0,26).'\mapper\usuarioMapper.php';
                        include_once substr(getcwd(), 0,26).'\core\Render.php';

						class usuarioController{

							/**
						     * Permite guardar un objeto tipo usuario.
						     * La informacion llego por post asumiendo la estructura de las entidades .
						     *
						     */
							public function crear(){
								$usuario       = new usuario($_POST['data']);
						        $usuarioMapper = new usuarioMapper();
						        var_dump($usuarioMapper->crearusuario($usuario));
							}
							public function listar(){;
								$usuarioMapper = new usuarioMapper();
								$usuario = $usuarioMapper->listarusuario();
								$render = new Render('listados/usuarioList',$usuario);
                                $render->mostrar();
							}

							public function actualizar(){

							}

							 public function eliminar(){
                                $usuario = new usuario();

                                $usuario->setcodigo($_POST['data']['codigo']);

                                $usuarioMapper = new usuarioMapper();
                                $usuarioMapper->eliminar($usuario);
                            }

                            public function formeliminar() {
                            $render = new Render('formuEliminar/usuarioEliminar');
                            $render->mostrar();
                            }

                            public function crearForm() {
                            $render = new Render('formulario/usuarioform');
                            $render->mostrar();
                            }
						}