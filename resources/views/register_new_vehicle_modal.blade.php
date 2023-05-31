<div class="modal" tabindex="-1" id="registerNewVehicleModal">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title fs-4">
                    Zahtev za registraciju novog vozila:
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="post" accept-charset="UTF-8" action="{{
                                            route('vehicleRegistrationRequest')}}">

                    @csrf <!-- {{ csrf_field() }} -->

                    <div class="form-group mb-2 mx-1">
                        <label for="brand">Marka:</label>
                        <input type="text" class="form-control text-center mt-2" id="brand"
                               name="brand" required>
                    </div>
                    <div class="form-group mb-2 mx-1">
                        <label for="model">Model:</label>
                        <input type="text" class="form-control text-center mt-2" id="model"
                               name="model" required>
                    </div>
                    <div class="form-group mb-2 mx-1">
                        <label for="year">Godina proizvodnje:</label>
                        <input type="number" class="form-control text-center mt-2" id="year"
                               name="year" min="1900" max="2099" required>
                    </div>
                    <div class="form-group mb-2 mx-1">
                        <label for="color">Boja:</label>
                        <input type="text" class="form-control text-center mt-2" id="color"
                               name="color" required>
                    </div>
                    <div class="form-group mb-2 mx-1">
                        <label for="engine_power">Snaga motora:</label>
                        <input type="number" class="form-control text-center mt-2"
                               id="engine_power" name="engine_power" min="1" max="10000"
                               required>
                    </div>
                    <div class="form-group mb-2 mx-1">
                        <label for="max_speed">Maksimalna brzina:</label>
                        <input type="number" class="form-control text-center mt-2"
                               id="max_speed" name="max_speed" min="1" max="500" required>
                    </div>
                    <div class="form-group mb-2 mx-1">
                        <label for="num_of_seats">Broj sedišta:</label>
                        <input type="number" class="form-control text-center mt-2"
                               id="num_of_seats" name="num_of_seats" min="1" max="100"
                               required>
                    </div>
                    <div class="form-group mb-2 mx-1">
                        <label for="weight">Težina:</label>
                        <input type="number" class="form-control text-center mt-2" id="weight"
                               name="weight" min="1" max="100000" required>
                    </div>
                    <div class="form-group mb-2 mx-1">
                        <label for="vehicle_type">Tip vozila:</label>
                        <select class="form-select mt-2" id="vehicle_type"
                                name="vehicle_type" required>
                            <option value="PUTNICKO_VOZILO" selected>Putničko vozilo</option>
                            <option value="TERETNO_VOZILO">Teretno vozilo</option>
                            <option value="AUTOBUS">Autobus</option>
                            <option value="KAMION">Kamion</option>
                            <option value="MOTORNI_BICIKL">Motorni bicikl</option>
                            <option value="SKUTER">Skuter</option>
                            <option value="MOTORNO_TRICIKLO">Motorno triciklo</option>
                            <option value="MOTORNI_CETVOROCIKL">Motorno četvorociklo</option>
                            <option value="PRIKLJUCNO_VOZILO">Priključno vozilo</option>
                            <option value="SPECIJALNO_VOZILO">Specijalno vozilo</option>
                        </select>
                    </div>
                    <div class="d-flex flex-row-reverse mx-1">
                        <button type="submit" class="btn text-white fs-5 px-5 mt-3 w-100"
                                style="background-color: #EF5350;">Podnesi zahtev
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
