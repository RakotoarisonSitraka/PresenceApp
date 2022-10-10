@extends('layouts.app')
@section('titre')
Statistique des employés
@endsection
@section('content')
<main class="mainn">
    <div class="card-header Stat">
        <h6 class="h6">Statistique</h6>
    </div>
    <div class="cards">
        <div class="card-single">
            <div>
                <h2>{{$mpiasa}}</h2>
                <small>Nombres des employés</small>
            </div>
            <div>
                <span class="fa-solid fa-user"></span>
            </div>
        </div>
        <div class="card-single">
            <div>
                <h2>5</h2>
                <small>Ville</small>
            </div>
            <div>
                <span class="fa fa-house"></span>
            </div>
        </div>

        <div class="card-single">
            <div>
                <h2>{{$users}}</h2>
                <small>Administrateurs</small>
            </div>
            <div>
                <span class="fa-solid fa-user"></span>
            </div>
        </div>

        <div class="card-single">
            <div>
                <h2>6</h2>
                <small>Roles</small>
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