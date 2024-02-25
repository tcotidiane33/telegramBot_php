<script>
  $(document).ready(function() {
    $('#modal_description').on('show.bs.modal', function(event) {
      var button = $(event.relatedTarget); // Button that triggered the modal
      var title = button.data('title'); // Extract info from data-* attributes
      var description = button.data('description');
      var modal = $(this);
      modal.find('.modal-title').text(title);
      modal.find('#bookTitle').text(title); // Mise à jour du titre du livre
      modal.find('#bookDescription').text(description); // Mise à jour de la description du livre
    });
  });
</script>
