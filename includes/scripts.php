<script>

function openCategoryPosts($id) {

$.ajax({

  url: 'nav-categegory-posts.php',
  type:'POST',
  data: {id: $id},
  success: function (response) {
        $('#hiderow').hide();
        $('#postsBycat').html(response);
      }
});
}
</script>