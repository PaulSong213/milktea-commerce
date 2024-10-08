<html>
<div class="p-3 rounded mb-3 cash-form bg-white shadow" >
    <!-- Amount Tendered -->
    <div class="mb-3">
        <label class="form-label" for="amountTendered">Amount Tendered</label>
        <input type="number" id="amountTendered" name="amountTendered" class="form-control fw-bold fs-5  rounded px-2" placeholder="Enter Amount Tendered" required min="1">
    </div>

    <!-- Change Amount -->
    <div class="mb-3">
        <label class="form-label" for="changeAmt">Change Amount</label>
        <input type="number" id="changeAmt" name="changeAmt" class="form-control-plaintext fw-bold fs-5 border border-secondary rounded px-2" readonly value="0" required>
    </div>
</div>

<script>
    $(document).ready(function() {
        $("#amountTendered").on('change input', function() {
            console.log('triggered');
            const remainingBalanceInput = $("#remainingBalance");
            var amountTendered = parseFloat($(this).val());
            if (!amountTendered) amountTendered = 0;
            if (!remainingBalanceInput.is(':visible')) return;
            var remainingBalance = parseFloat(remainingBalanceInput.val());
            var change = amountTendered - remainingBalance;
            $("#changeAmt").val(change);
            console.log(change);
        });

        $("#chargeID").change(function() {
            $("#amountTendered").trigger('change');
        });
    });
</script>

</html>