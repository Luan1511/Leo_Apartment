<div class="col-md-6">
    <div class="shadow-sm rounded-3 p-4">
        <h3 class="mb-4 text-center">MAINTAINANCE REQUIRED</h3>
        <div class="table-container mb-20 border pt-10 pl-10 pr-10">
            <h5 class="title-content mb-20">Create maintainance request</h5>
            <form action="{{ route('createMaintainRequestHandle') }}" method="POST" class="pl-20 pr-20 mb-20"
                enctype="multipart/form-data">
                @csrf
                <div class="form-group mt-40">
                    <label for="request-type">Report type:</label>
                    <div class="d-flex" style="justify-content: space-between">
                        <select class="form-control col-5" id="request-type" name="request_type">
                            <option value="">Select type</option>
                            <option value="Device">Device</option>
                            <option value="Structure">Structure</option>
                            {{-- <option value="System">System request</option> --}}
                            {{-- <option value="employees">Employees request</option> --}}
                        </select>
                        <select class="form-control col-5" id="apartment" name="apartment">
                            <option value="">Select your apartment</option>
                        </select>
                    </div>
                </div>
                <div class="form-group mt-40">
                    <label for="date-range">Maintenance required on:</label>
                    <div class="input-group">
                        <input type="date" class="form-control" id="date-range" name="date"
                            placeholder="Select date range">
                    </div>

                    <div class="form-group mt-40">
                        <label for="request-name">Content:</label>
                        <input type="text" class="form-control" id="request-name" name="content"
                            placeholder="Content..." required>
                    </div>

                    <div class="form-group mt-40">
                        <label for="request-name">Image:</label>
                        <input type="file" class="form-control" id="request-file" name="image" required>
                        <div class="d-flex" style="gap: 10px; align-items: center">
                            <input type="checkbox" name="" id="" style="width: 20px" required>
                            <span style="font-size: 14px">I have read and agree that I will be responsible for
                                everything I have submitted.</span>
                        </div>
                        <div class="form-group">
                            <input type="submit" class="brand-btn" value="Create request">
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script> --}}
<script>
    $(document).ready(function() {
        $.ajax({
            url: '{{ route('getMyApartment') }}',
            type: 'GET',
            dataType: 'json',
            success: function(data) {
                $.each(data.data, function(index, apartment) {
                    $('#apartment').append($('<option>', {
                        value: apartment.id,
                        text: apartment.apartment_number
                    }));
                });
            },
            error: function() {}
        });
    });

    document.addEventListener('DOMContentLoaded', function() {
        $('#inform-nav').removeClass('active-nav-user');
        $('#bills-nav').removeClass('active-nav-user');
        $('#request-nav').removeClass('active-nav-user');
        $('#maintain-nav').addClass('active-nav-user');
    });
</script>
