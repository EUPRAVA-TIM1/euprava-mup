<div class="modal" tabindex="-1" id="renewDrivingLicenseModal">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title fs-4">
                    Obnavljanje vozačke dozvole:
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="post" accept-charset="UTF-8" action="{{ route('renewDrivingLicenseRequest') }}">
                    @csrf <!-- {{ csrf_field() }} -->
                    <!-- Form fields -->
                    <div class="form-group mb-2 mx-1">
                        @props(['drivingLicenseData'])
                        @php
                            $categories = ['AM', 'A1', 'A2', 'A', 'B1', 'B', 'BE', 'C1', 'C1E', 'C', 'CE', 'D1',
                                'D1E', 'D', 'DE', 'F', 'M'];
                            $selectedValues = [];
                            if(isset($drivingLicenseData->katergorijeVozila))  {
                                $categoriesArray = unserialize($drivingLicenseData->katergorijeVozila);
                                $selectedValues = array_values($categoriesArray);
                            }
                        @endphp

                        @if(is_null($drivingLicenseData) || !property_exists($drivingLicenseData, 'brojVozackeDozvole')
                            || $drivingLicenseData->statusVozackeDozvole != "AKTIVNA")
                            <p>Vozačku dozvolu nije moguće obnoviti!</p>
                        @else
                            <label for="categories">Kategorije vozila:</label>
                            <select class="form-select mt-2" id="categories"
                                    name="categories[]" required multiple>
                                @foreach($categories as $category)
                                    <option value="{{ $category }}" {{ in_array($category, $selectedValues) ?
                                        'selected' : '' }}>{{ $category }}</option>
                                @endforeach
                            </select>

                            <div class="d-flex flex-row-reverse mx-1">
                                <button type="submit" class="btn text-white fs-5 px-5 mt-3 w-100" style="background-color: #EF5350;">Podnesi zahtev</button>
                            </div>
                        @endif
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
