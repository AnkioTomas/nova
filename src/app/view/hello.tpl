<mdui-snackbar closeable class="example-closeable">Photo archived</mdui-snackbar>

<mdui-button>打开 Snackbar</mdui-button>

<script>
    const snackbar = document.querySelector(".example-closeable");
    const openButton = snackbar.nextElementSibling;

    openButton.addEventListener("click", () => snackbar.open = true);
</script>