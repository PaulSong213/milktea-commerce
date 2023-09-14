<html>
<div class="p-3 rounded mb-3 check-form d-none bg-white shadow" >

    <!-- Bank -->
    <div class="mb-3">
        <label class="form-label" for="bankName">Bank</label>
        <input type="text" id="bankName" name="bankName" class="form-control fw-bold fs-5  rounded px-2" placeholder="Enter Bank" required>
    </div>

    <!-- Check # -->
    <div class="mb-3">
        <label class="form-label" for="checkNo">Check #</label>
        <input type="text" id="checkNo" name="checkNo" class="form-control fw-bold fs-5  rounded px-2" placeholder="Enter Check #" required>
    </div>

    <!-- Check Date -->
    <div class="mb-3">
        <label class="form-label" for="checkDate">Check Date</label>
        <input type="date" id="checkDate" name="checkDate" class="form-control fw-bold fs-5  rounded px-2" placeholder="Enter Check Date" required>
    </div>

    <!-- Check Amount -->
    <div class="mb-3">
        <label class="form-label" for="checkAmount">Check Amount</label>
        <input type="number" min="1" id="checkAmount" name="checkAmount" class="form-control fw-bold fs-5  rounded px-2" placeholder="Enter Check Amount" required>
    </div>


</div>

<script>
    $(document).ready(function() {
        const now = new Date();
        const formattedDate = now.toISOString().substr(0, 10);
        $("#checkDate").val(formattedDate);
    });
</script>

</html>