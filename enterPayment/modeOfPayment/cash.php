<html>
<div class="p-3 rounded mb-3 cash-form" style="background-color: #002240;">
    <!-- Amount Tendered -->
    <div class="mb-3">
        <label class="form-label" for="ammountTendered">Amount Tendered</label>
        <input type="number" id="ammountTendered" name="ammountTendered" class="form-control fw-bold fs-5  rounded px-2" placeholder="Enter Amount Tendered" required min="1">
    </div>

    <!-- Change Amount -->
    <div class="mb-3">
        <label class="form-label" for="changeAmt">Change Amount</label>
        <input type="number" id="changeAmt" name="changeAmt" class="form-control-plaintext text-white fw-bold fs-5 border border-white rounded px-2" readonly value="0" required>
    </div>
</div>

<script>
    $(document).ready(function() {
        $("#ammountTendered").on('change input', function() {
            console.log('triggered');
            const remainingBalanceInput = $("#remainingBalance");
            var ammountTendered = parseFloat($(this).val());
            if (!ammountTendered) ammountTendered = 0;
            if (!remainingBalanceInput.is(':visible')) return;
            var remainingBalance = parseFloat(remainingBalanceInput.val());
            var change = ammountTendered - remainingBalance;
            $("#changeAmt").val(change);
            console.log(change);
        });

        $("#chargeID").change(function() {
            $("#ammountTendered").trigger('change');
        });
    });
</script>

</html>