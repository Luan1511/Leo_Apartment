@extends('Admins.admin.layout-admin')

@section('content')
    <div class="form-container mb-20">
        <div class="title-content">Add apartment</div>

        <form action="addHandle" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="number" class="form-label">Number</label>
                    <input type="text" class="form-control" id="number" name="number" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="type" class="form-label">Type</label>
                    <select class="form-select" id="type" name="type" required>
                        <option value="">Select a type</option>
                        <option value="2">Casual</option>
                        <option value="1">V.I.P</option>
                        <option value="3">Studio</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3 mb-3">
                    <label for="floor" class="form-label">Floor</label>
                    <select class="form-select" id="floor" name="floor" required>
                        <option value="">Select floor</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                    </select>
                </div>
                <div class="col-md-3 mb-3"></div>
                <div class="col-md-2 mb-3">
                    <label for="bathroom" class="form-label">Bathroom</label>
                    <input type="text" class="form-control" id="bathroom" name="bathroom" required>
                </div>
                <div class="col-md-2 mb-3">
                    <label for="bedroom" class="form-label">Bedroom</label>
                    <input type="text" class="form-control" id="bedroom" name="bedroom" required>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 mb-3">
                    <label for="area" class="form-label">Area</label>
                    <li style="display: flex; align-items: center"><input type="text" class="value-price"
                            style="width: 75px !important; background-color: white; border-radius: 3px" name="area" id="area">
                    </li>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="price_per_month" class="form-label">Price per month</label>
                    <input type="text" class="form-control" id="price_per_month" name="price_per_month" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="price_sale" class="form-label">Price sale</label>
                    <input type="text" class="form-control" id="price_sale" name="price_sale" required>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea class="form-control" id="description" name="description"></textarea>
                </div>
            </div>
            <div class="row">
                <div class="col-md-5 mb-3">
                    <label for="image" class="form-label">Main image</label>
                    <input type="file" class="form-control" id="image" name="images[]" style="height: 61px">
                </div>
                <div class="col-md-7 mb-3">
                    <label for="image" class="form-label">Sub images</label>
                    <div class="row">
                        <div class="col-md-4">
                            <input type="file" class="form-control" id="image_1" name="images[]"
                                style="height: 61px; padding: 6px; font-size: 10px">
                        </div>
                        <div class="col-md-4">
                            <input type="file" class="form-control" id="image_2" name="images[]"
                                style="height: 61px; padding: 6px; font-size: 10px">
                        </div>
                        <div class="col-md-4">
                            <input type="file" class="form-control" id="image_3" name="images[]"
                                style="height: 61px; padding: 6px; font-size: 10px">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row d-flex" style="justify-content: center;">
                <button type="submit" class="col-5 col-md-3 btn btn-primary w-100 mt-10"
                    style="font-weight: 500; box-shadow: 1px 1px 4px rgba(0, 0, 0, 0.126);">Add apartment</button>
            </div>
        </form>
    </div>

    <script>
        // Area range
        $('.value-price').change(function() {
            var value = $(this).val();
            if (isNaN(value) || value < 20000 || value > 100000) {

            } else {
                $('#price-range').val(value);
            }
        });
        $('.value-price').val($('#price-range').val());
        $('#price-range').change(function() {
            var value = $(this).val();
            $('.value-price').val(value);
        });
    </script>
@endsection
