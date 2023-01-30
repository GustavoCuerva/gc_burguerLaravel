<form action="/logout" method="post" style="margin: 10px;">
    @csrf
</form>
<script>
    this.closest('form').submit();
</script>