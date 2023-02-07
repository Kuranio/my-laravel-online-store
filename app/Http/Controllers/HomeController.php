<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {
        $viewData = [];
        $viewData["title"] = "Página principal - Tienda online";
        return view('home.index')->with("viewData", $viewData);
    }

    public function about() {
        $viewData = [];
        $viewData["title"] = "shinjiku - Acerca de nosotros";
        $viewData["subtitle"] = "Acerca de nosotros";
        $viewData["description"] = "Esto es una pagina acerca de...";
        $viewData["author"] = "Desarrollado por Raul";

        return view ("home.about")->with("viewData", $viewData);
    }

    public function configuracion()
    {
        $viewData = [];
        $viewData["title"] = "Configuración - E Code";
        $viewData["subtitle"] = "Configuración";
        return view("home.configuracion")->with("viewData", $viewData);
    }

    public function sesion(Request $request)
    {
        session([
            'encabezado' => $request->input('encabezado'),
            'letra' => $request->input('letra')
        ]);
        return redirect()->route('home.index');
    }

    public function contacto() {
        return view("home.contacto");
    }
}
