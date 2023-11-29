@if (session()->has('success'))
    <div style="width: fit-content; border-radius: 15px" id="successMessage" class="alert alert-success">
        {{ session()->get('success') }}</div>
    <script>
        // Get the success message element
        var successMessage = document.getElementById('successMessage');

        // Hide the success message after 3 seconds (3000 milliseconds)
        setTimeout(function() {
            successMessage.style.display = 'none';
        }, 3000); // 3000 milliseconds = 3 seconds
    </script>
@endif
