@extends('layouts.app')
@section('titre')
    Présence des employés
@endsection
@section('content')
    <main class="mainn">
        <div class="cards">
            <div class="card-single">
                <div>
                    <h2>2.000.000</h2>
                    <small>Ventes</small>
                </div>
                <div>
                    <span class="fa fa-shopping-cart"></span>
                </div>
            </div>
            <div class="card-single">
                <div>
                    <h2>+30</h2>
                    <small>Stock</small>
                </div>
                <div>
                    <span class="fa fa-newspaper"></span>
                </div>
            </div>

            <div class="card-single">
                <div>
                    <h2>58</h2>
                    <small>Fournisseur</small>
                </div>
                <div>
                    <span class="fa fa-outdent"></span>
                </div>
            </div>

            <div class="card-single">
                <div>
                    <h2>20k</h2>
                    <small>Communauté</small>
                </div>
                <div>
                    <span class="fa fa-newspaper"></span>
                </div>
            </div>
          
        </div>
        <div class="composant">
            <div class="ventes">
                <div class="case">
                    <div class="header-case">
                        <h2>Listes</h2>
                        <button class="buttonn">
                            Voir plus <span class="fa fa-arrow-right"></span>
                        </button>
                    </div>
                    <div class="body-case">
                        <div class="tableau">
                            <table width="100%">
                                <thead>
                                    <tr>
                                        <td>lolo</td>
                                        <td>lili</td>
                                        <td>lala</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>klaa</td>
                                        <td>lady</td>
                                        <td><span class="status-produit color-one">mass</span></td>
                                    </tr>
                                    <tr>
                                        <td>klaa</td>
                                        <td>lady</td>
                                        <td><span class="status-produit color-two">mass</span></td>
                                    </tr>
                                    <tr>
                                        <td>klaa</td>
                                        <td>lady</td>
                                        <td><span class="status-produit color-three">mass</span></td>
                                    </tr>
                                    <tr>
                                        <td>klaa</td>
                                        <td>lady</td>
                                        <td><span class="status-produit color-four">mass</span></td>
                                    </tr>
                                    <tr>
                                        <td>klaa</td>
                                        <td>lady</td>
                                        <td><span class="status-produit color-five">mass</span></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>


    </main>
@endsection
