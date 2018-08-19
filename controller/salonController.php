<?php
						include_once substr(getcwd(), 0,26).'\entity\salon.php';
						include_once substr(getcwd(), 0,26).'\mapper\salonMapper.php';
                        include_once substr(getcwd(), 0,26).'\core\Render.php';

						class salonController{

							/**
						     * Permite guardar un objeto tipo salon.
						     * La informacion llego por post asumiendo la estructura de las entidades .
						     *
						     */
							public function crear(){
								$salon       = new salon($_POST['data']);
						        $salonMapper = new salonMapper();
						        var_dump($salonMapper->crearsalon($salon));
							}
							public function listar(){;
								$salonMapper = new salonMapper();
								$salon = $salonMapper->listarsalon();
								$render = new Render('listados/salonList',$salon);
                                $render->mostrar();
							}

							public function actualizar(){

							}

							 public function eliminar(){
                                $salon = new salon();

                                $salon->setid($_POST['data']['id']);

                                $salonMapper = new salonMapper();
                                $salonMapper->eliminar($salon);
                            }

                            public function formeliminar() {
                            $render = new Render('formuEliminar/salonEliminar');
                            $render->mostrar();
                            }

                            public function crearForm() {
                            $render = new Render('formulario/salonform');
                            $render->mostrar();
                            }
						}