<div class="modal" tabindex="-1" id="getDrivingLicenseDataModal">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title fs-4">
                    Informacije o vozačkoj dozvoli:
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                @if(is_null($drivingLicenseData) || !property_exists($drivingLicenseData, 'brojVozackeDozvole'))
                    <p>Informacije o vozačkoj dozvoli nisu pronađene!</p>
                @else
                    <p><strong>Broj vozačke dozvole:</strong> {{ $drivingLicenseData->brojVozackeDozvole }}</p>
                    <p><strong>Kategorije vozila:</strong> {{ implode(', ', unserialize($drivingLicenseData->katergorijeVozila)) }}</p>
                    <p><strong>Datum izdavanja:</strong> {{ $drivingLicenseData->datumIzdavanja ?: 'N/A' }}</p>
                    <p><strong>Datum isteka:</strong> {{ $drivingLicenseData->datumIsteka ?: 'N/A' }}</p>
                    <p><strong>Broj kaznenih poena:</strong> {{ $drivingLicenseData->brojKaznenihPoena }}</p>
                    <p><strong>Status vozačke dozvole:</strong> {{ $drivingLicenseData->statusVozackeDozvole }}</p>
                    <p><strong>Odobrio službenik:</strong> {{ $drivingLicenseData->odobrioSluzbenik ?: 'N/A' }}</p>
                @endif
            </div>
        </div>
    </div>
</div>
