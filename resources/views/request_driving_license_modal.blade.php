<div class="modal" tabindex="-1" id="driverLicenseRequestModal">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title fs-4">
                    Zahtev za izdavanje vozačke dozvole:
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="post" accept-charset="UTF-8" action="{{ route('driverLicenseRequest') }}">
                    @csrf <!-- {{ csrf_field() }} -->

                    <!-- Form fields -->
                    <div class="form-group mb-2 mx-1">
                        <label for="categories">Kategorije vozila:</label>
                        <select class="form-select mt-2" id="categories"
                                name="categories[]" required multiple>
                            <option value="AM">AM</option>
                            <option value="A1">A1</option>
                            <option value="A2">A2</option>
                            <option value="A">A</option>
                            <option value="B1" selected>B1</option>
                            <option value="B" selected>B</option>
                            <option value="BE">BE</option>
                            <option value="C1">C1</option>
                            <option value="C1E">C1E</option>
                            <option value="C">C</option>
                            <option value="CE">CE</option>
                            <option value="D1">D1</option>
                            <option value="D1E">D1E</option>
                            <option value="D">D</option>
                            <option value="DE">DE</option>
                            <option value="F">F</option>
                            <option value="M" selected>M</option>
                        </select>
                    </div>

                    <div class="d-flex flex-row-reverse mx-1">
                        <button type="submit" class="btn text-white fs-5 px-5 mt-3 w-100" style="background-color: #EF5350;">Podnesi zahtev</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
