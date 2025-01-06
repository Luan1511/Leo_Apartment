<style>
    #calendar {
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
    }

    .month {
        width: 100px;
        height: 50px;
        display: flex;
        justify-content: center;
        align-items: center;
        border: 1px solid #ccc;
        border-radius: 5px;
        font-weight: bold;
        text-align: center;
    }

    .payment-frame {
        display: none;
        border: 1px solid #ccc;
        padding: 15px;
        border-radius: 5px;
        background-color: #f9f9f9;
        width: 300px;
    }

    .payment-frame h3 {
        margin-top: 0;
    }

    .btn-pay {
        margin-top: 10px;
        background-color: green;
        color: white;
        border: none;
        padding: 10px 20px;
        border-radius: 5px;
        cursor: pointer;
    }

    .btn-cancel {
        margin-top: 10px;
        background-color: gray;
        color: white;
        border: none;
        padding: 10px 20px;
        border-radius: 5px;
        cursor: pointer;
    }

    .btn-pay:disabled {
        background-color: gray;
        cursor: not-allowed;
    }
</style>

<div class="container mt-40">
    <h4 class="text-center mb-20">Detail rent bill ID: {{ $id }}</h4>
    <div id="calendar" style="display: flex; flex-wrap: wrap; gap: 10px;"></div>
    <div class="row mt-40">
        <p class="text-dark"><i>Note:</i> <br>
            <b style="color: gray">Gray:</b> Not paid yet. <br>
            <b class="text-success">Green:</b> Paid.
        </p>
    </div>
</div>
<div class="col-md-4 mt-40">
    <div class="payment-frame" id="paymentFrame">
        <h4>Payment for <span id="selectedMonth"></span></h4>
        <p>Amount: <b>${{ $apartment->apartment->price_per_month }} </b></p>
        <button class="btn-pay" id="payButton">Pay</button>
        <button class="btn-cancel" id="cancelButton">Cancel</button>
    </div>
</div>

<script>
    function loadRentalCalendar(rentingId) {
        $.ajax({
            url: `/rentings/${rentingId}/calendar`,
            type: 'GET',
            success: function(response) {
                renderCalendar(response.months, rentingId);
            },
            error: function(error) {
                alert('Error loading calendar');
                console.error(error);
            }
        });
    }

    function renderCalendar(months, rentingId) {
        const $calendar = $('#calendar');
        $calendar.empty(); // Xóa lịch cũ

        months.forEach(monthData => {
            const $monthDiv = $('<div></div>')
                .addClass('month')
                .text(monthData.month);

            // Màu sắc tháng
            if (monthData.isPaid) {
                $monthDiv.css({
                    'background-color': 'green',
                    'color': 'white'
                });
            } else {
                $monthDiv.css({
                    'background-color': 'gray',
                    'color': 'white',
                    'cursor': 'pointer'
                });
            }

            // Thêm sự kiện khi nhấn vào tháng
            $monthDiv.on('click', function() {
                if (!monthData.isPaid) {
                    showPaymentFrame(monthData.month, rentingId);
                }
            });

            $calendar.append($monthDiv);
        });
    }

    function showPaymentFrame(month, rentingId) {
        $('#paymentFrame').show();
        $('#selectedMonth').text(month);

        // Gắn sự kiện Pay
        $('#payButton').off('click').on('click', function() {
            markMonthAsPaid(rentingId, month);
            Swal.fire({
                icon: 'success',
                title: 'Paid!',
                text: 'Thank for paying!',
                timer: 2000,
                showConfirmButton: false
            });
        });

        $('#cancelButton').off('click').on('click', function() {
            $('#paymentFrame').hide();
        });
    }

    function markMonthAsPaid(rentingId, month) {
        $.ajax({
            url: `/rentings/${rentingId}/mark-paid`,
            type: 'POST',
            data: {
                month: month,
                _token: '{{ csrf_token() }}'
            },
            success: function(response) {
                if (response.success) {
                    loadRentalCalendar(rentingId);
                } else {
                    alert('Failed to mark month as paid');
                }
            },
            error: function(error) {
                alert('Error marking month as paid');
                console.error(error);
            }
        });
    }

    $(document).ready(function() {
        const renntingId = {{ $id }};
        loadRentalCalendar(renntingId);
    });

    async function parentFunction() {
        await Swal.fire({
            title: 'Welcome!',
            text: 'This is a notification with an image and a link.',
            imageUrl: 'https://upload.wikimedia.org/wikipedia/commons/d/d0/QR_code_for_mobile_English_Wikipedia.svg',
            imageWidth: 350,
            imageHeight: 300,
            html: `
            <p>Click <a href="{{ url('/') }}" target="_blank" style="color: blue; text-decoration: underline;">here</a> to visit the page.</p>
        `,
            showConfirmButton: true,
            confirmButtonText: 'Close'
        });
        console.log('User closed the notification. Continue the parent function.');
        // ma();
    }
</script>
