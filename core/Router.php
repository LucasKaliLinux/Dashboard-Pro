<?php

    use classes\FactoryInterface;
    use panel\classes\IsSession;

    class Router{

        private $routs;
        private $factory;
        private $arr;

        public function __construct(FactoryInterface $factory){
            $this->factory = $factory;
            $this->arr = [
                "main"  => [$this, "main"],
                "panel" => [$this, "panel"]
            ];
        }

        public function build($path){
            $rout = $this->arr[$path];
            $class = $this->factory->make($rout());
            $class->index();
        }

        private function main(){
            $this->routs = [
                "home"          => "homeController",
                "contact"       => "contactController",
                "submitHome"    => "submitHomeController",
                "submitContact" => "submitContactController"
            ];

            $page = "home";

            if(isset($_GET["pag"])){

                if(!key_exists($_GET["pag"], $this->routs)){
                    $page = "home";
                }else{
                    $page = $_GET["pag"];
                }
            }

            $class = ucfirst($this->routs[$page]);
            $class = "controllers\\".$class;
            return $class;
        }

        private function panel(){
            $pagesComum = [
                "login"               => "loginController",
                "loggout"             => "loggoutController",
                "home"                => "homeController",
                "registerTestimonial" => "registerTestimonialController",
                "registerService"     => "registerServiceController",
                "registerSlide"       => "registerSlideController",
                "listTestimonial"     => "listTestimonialController",
                "listService"         => "listServiceController",
                "listSlide"           => "listSlideController",
                "addUser"             => "addUserController",
                "editUser"            => "editUserController",
                "editGeneral"         => "editGeneralController",
                "registerCategories"  => "registerCategoriesController",
                "registerNews"        => "registerNewsController",
                "manageCategories"    => "manageCategoriesController",
                "manageNews"          => "manageNewsController"
            ];
            $pagesPost = [
                "submitAddUser"       => "submitAddUserController",
                "submitEditUser"      => "submitEditUserController",
                "submitRegister"      => "submitRegisterController",
                "submitService"       => "submitServiceController",
                "submitSlide"         => "submitSlideController",
                "editTestimonial"     => "editTestimonialController",
                "editService"         => "editServiceController",
                "editSlide"           => "editSlideController",
                "editCategories"      => "editCategoriesController",
                "editNews"            => "editNewsController"
            ];

            $this->routs = array_merge($pagesComum, $pagesPost);
        
            $page = isset($_GET["pag"]) ? $_GET["pag"] : "home";

            if(!IsSession::isSession("login")){
                unset($this->routs);
                $this->routs = [
                    "panel" => "panelController",
                    "login" => "loginController"
                ];
            }

            if(!key_exists($page, $this->routs))
                $page = array_key_first($this->routs);
        
            $class = ucfirst($this->routs[$page]);
            $class = "panel\controllers\\".$class;
            return $class;
        }
    }