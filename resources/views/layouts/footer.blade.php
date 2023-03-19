<footer class="py-4 bg-light mt-auto">
  <div class="container-fluid px-4">
    <div class="d-flex align-items-center justify-content-between small">
      <div class="text-muted">Copyright &copy; 5Pints Productions <label id="copyRight_data"></label></div>
      <div>
      </div>
    </div>
  </div>
  <script>
    $(document).ready(function() {
      let date_now = new Date();
      $('#copyRight_data').html(date_now.getFullYear());
    })
  </script>
</footer>