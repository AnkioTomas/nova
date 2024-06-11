<mdui-snackbar closeable class="example-closeable">Photo archived</mdui-snackbar>

<mdui-button>打开 Snackbar</mdui-button>

<script>


    nova.onload = function () {
        const snackbar = document.querySelector(".example-closeable");
        const openButton = snackbar.nextElementSibling;

        function openSnackbar() {
            snackbar.open = true;
        }

        openButton.addEventListener("click", openSnackbar);
        console.log("onload");
        nova.onunload = function () {
            console.log("onunload");
            openButton.removeEventListener("click", openSnackbar);
        }
    };

</script>