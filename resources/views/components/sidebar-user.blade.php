<!-- Sidebar menu -->
<div class="col-md-2">
    <div class="list-group shadow-sm rounded-3 p-2">
        <a href="{{ url('profile/1/inform') }}" id="inform-nav" class="list-group-item list-group-item-action">
            <i class="bi bi-card-list"></i> My information
        </a>
        <a href="{{ url('profile/1/bills') }}" id="bills-nav" class="list-group-item list-group-item-action">
            <i class="bi bi-person"></i> Your bills
        </a>
        <a href="{{ url('profile/2/buy_request') }}" id="request-nav" class="list-group-item list-group-item-action">
            <i class="bi bi-person"></i> Your requests
        </a>
        <a href="{{ url('profile/1/maintain') }}" id="maintain-nav" class="list-group-item list-group-item-action">
            <i class="bi bi-telephone"></i> Maintainance required
        </a>
        <a href="#" class="list-group-item list-group-item-action">
            <i class="bi bi-box-arrow-right"></i> Log out of account
        </a>
    </div>
    <div class="pl-10">
        Type account: 
        <span style="color: #0363CD; font-weight: 450">
            @if (\App\Models\Resident::where('user_id', Auth::user()->id)->count() > 0)
                @if (\App\Models\Admin\RentingApartment::where('user_id', Auth::user()->id)->count() < 1)
                    Resident - Owner
                @else
                    Resident - Renter
                @endif
            @else
                Normal user
            @endif
        </span>
    </div>
</div>
