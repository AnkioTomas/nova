<mdui-snackbar closeable class="example-closeable">Photo archived</mdui-snackbar>

<mdui-button>打开 Snackbar</mdui-button>

<script>


    nova.onload = function () {
        var snackbar = document.querySelector(".example-closeable");
        var openButton = snackbar.nextElementSibling;

        openButton.addEventListener("click", () => snackbar.open = true);
        console.log("onload");
        nova.onunload = function () {
            console.log("onunload");
            openButton.removeEventListener("click", () => snackbar.open = true);
        }
    };

</script>