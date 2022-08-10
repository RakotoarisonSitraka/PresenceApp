@extends('layouts.app')
@section('titre')
    Enregistrement
@endsection
@section('content')
    <div class="page-content">
        <div class="wizard-v6-content">
            <div class="wizard-form">
                <center>
                    <span class="fa fa-registered F"></span><span class="myHead">Enregistrement d'employee</span></a></li>
                    {{-- <div class="myHead">
                    <i class="fa fa-registered myHead"></i>
                    <p >Enregistrement</p>
                   </div> --}}
                </center>
                <form class="form-register division" id="form-register" action="#" method="post">
                    <div id="form-total">
                        <!-- SECTION 1 -->
                        <h2>
                            <p class="step-icon"><span>1</span></p>
                            <span class="step-text">Information personnel</span>
                        </h2>
                        <section>
                            <div class="inner">
                                <div class="form-heading">
                                    <h3>Information personnel</h3>
                                    <span>1/3</span>
                                </div>
                                <div class="form-row">
                                    <div class="form-holder">
                                        <label class="form-row-inner">
                                            <input type="text" class="form-control" id="first_name" name="first_name"
                                                required>
                                            <span class="label">Nom</span>
                                        </label>
                                    </div>
                                    <div class="form-holder">
                                        <label class="form-row-inner">
                                            <input type="text" class="form-control" id="last_name" name="last_name"
                                                required>
                                            <span class="label">Prenom</span>
                                        </label>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-holder">
                                        <label class="form-row-inner">
                                            <input type="text" class="form-control" id="phone" name="phone"
                                                required>
                                            <span class="label">Telephone</span>
                                        </label>
                                    </div>
                                    <div class="form-holder">
                                        <label class="form-row-inner">
                                            <input type="Email" name="your_email_1" id="your_email_1" class="form-control"
                                                required>
                                            <span class="label">E-Mail</span>
                                        </label>
                                    </div>

                                </div>
                                <!-- <div class="form-row form-row-date">
                    <div class="form-holder form-holder-2">
                     <label for="date" class="special-label">Date of Birth:</label>
                     <select name="date" id="date" class="form-control">
                      <option value="15" selected>15</option>
                      <option value="16">16</option>
                      <option value="17">17</option>
                      <option value="18">18</option>
                      <option value="19">19</option>
                     </select>
                     <select name="month" id="month" class="form-control">
                      <option value="Jan" selected>Jan</option>
                      <option value="Feb">Feb</option>
                      <option value="Mar">Mar</option>
                      <option value="Apr">Apr</option>
                      <option value="May">May</option>
                     </select>
                     <select name="year" id="year" class="form-control">
                      <option value="2018" selected>2018</option>
                      <option value="2017">2017</option>
                      <option value="2016">2016</option>
                      <option value="2015">2015</option>
                      <option value="2014">2014</option>
                      <option value="2013">2013</option>
                     </select>
                    </div>
                   </div> -->
                                <div class="form-row">
                                    <div class="form-holder form-holder-2">
                                        <label class="form-row-inner">
                                            <input type="text" class="form-control" id="address" name="address"
                                                required>
                                            <span class="label">Addresse</span>
                                        </label>
                                    </div>
                                    <div class="form-holder form-holder-2">
                                        <label class="form-row-inner">
                                            <input type="text" class="form-control" id="address" name="address"
                                                required>
                                            <span class="label">CIN</span>
                                        </label>
                                    </div>
                                    <div class="form-holder form-holder-2">
                                        <label class="form-row-inner">
                                            <input type="text" class="form-control" id="address" name="address"
                                                required>
                                            <span class="label">Age</span>
                                        </label>
                                    </div>
                                </div>

                            </div>
                        </section>
                        <!-- SECTION 2 -->
                        <h2>
                            <p class="step-icon"><span>2</span></p>
                            <span class="step-text">Domaine</span>
                        </h2>
                        <section>
                            <div class="inner">
                                <div class="form-heading">
                                    <h3>Domaine</h3>
                                    <span>2/3</span>
                                </div>
                                <!-- <div class="form-images">
                    <img src="images/wizard_v6.jpg" alt="wizard_v6">
                   </div> -->
                                <div class="form-row">
                                    <div class="form-holder form-holder-2">
                                        <label for="room" class="special-label-1">Section </label>
                                        <select name="room" id="room" class="form-control">
                                            <option value="Chef de projet" selected>Chef de projet</option>
                                            <option value="Web marketing" selected>Web marketing</option>
                                            <option value="Développement" selected>Développement</option>
                                            <option value="Web Design">Web Design</option>
                                            <option value="E-Commerce">E-Commerce</option>
                                            <option value="Responsable commercial">Responsable commercial</option>
                                            <option value="Responsable Informatique">Responsable Informatique</option>
                                            <option value="Responsable de communication"> Responsable de communication
                                            </option>
                                            <option value="Responsable Administratif et Financier">Responsable
                                                Administratif et Financier</option>
                                            <option value="Referencement web & SEO">Referencement web & SEO</option>
                                            <option value="Branding">Branding</option>
                                        </select>
                                        <span class="select-btn">
                                            <i class="zmdi zmdi-chevron-down"></i>
                                        </span>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-holder">
                                        <label for="time" class="special-label-1">Position </label>
                                        <select name="time" id="time" class="form-control">
                                            <option value="Développeurs Web">Développeurs Web</option>
                                            <option value="Développeurs Mobile">Développeurs Mobile</option>
                                            <option value="Intégrateur Web">Intégrateur Web</option>
                                            <option value="Infographiste">Infographiste</option>
                                            <option value="Gestionnaire de contenu">Gestionnaires de contenu</option>
                                            <option value="Commercial">Commercial</option>
                                            <option value="Technicien de surface">Technicien de surface</option>
                                            <option value="Assistant RH">Assistant RH</option>

                                        </select>
                                        <span class="select-btn">
                                            <i class="zmdi zmdi-chevron-down"></i>
                                        </span>
                                    </div>
                                    <div class="form-holder">
                                        <label for="time" class="special-label-1">Sexe</label>
                                        <select name="time" id="time" class="form-control">
                                            <option value="Développeurs Web">Homme</option>
                                            <option value="Développeurs Mobile">Femelle</option>
                                        </select>
                                        <span class="select-btn">
                                            <i class="zmdi zmdi-chevron-down"></i>
                                        </span>
                                    </div>
                                    {{-- <div class="form-holder">
                                        <label for="day" class="special-label-1">Organization Day</label>
                                        <input type="text" name="day" class="day" id="day"
                                            placeholder="15 / 08 / 2018">
                                    </div> --}}
                                </div>
                            </div>
                        </section>
                        <!-- SECTION 3 -->
                        <h2>
                            <p class="step-icon"><span>3</span></p>
                            <span class="step-text">Photo</span>
                        </h2>
                        <section>
                            <div class="inner">
                                <div class="form-heading">
                                    <h3>Photo de profil</h3>
                                    <span>3/3</span>
                                </div>
                                <div class="form-group my-0">
                                    <input type="file" name="" id="file"
                                        @error('Sary') is-invalid @enderror>
                                    <label for="file" class="lab">
                                        <i class="fa-solid fa-image File"></i>
                                        Inserer une photo
                                    </label>
                                </div>
                            </div>
                            <center>
                                <button class="btn btn-primary btnsave">Enregistrer</button>
                            </center>
                    </div>

                    </section>
            </div>
            </form>
        </div>
    </div>
    </div>
@endsection
